<?php

namespace App\Controllers;

use App\Models\ProductModel;

/**
 * Contrôleur pour la page produits uniquement
 */
class Products extends BaseController
{
    const PRODUCTS_PER_PAGE = 20;

    public function index(): string
    {
        $model = new ProductModel();
        
        // Récupère les paramètres de recherche et filtres
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $tag = $this->request->getGet('tag');
        $minPrice = $this->request->getGet('min_price');
        $maxPrice = $this->request->getGet('max_price');
        
        // Vérifie le statut de vérification d'âge
        $ageStatus = AgeVerification::getAgeStatus();
        $isUnder18 = AgeVerification::isUnder18();
        
        // Si l'utilisateur a moins de 18 ans, forcer le filtre sur catégories non-alcoolisées
        if ($isUnder18) {
            $nonAlcoolCategories = ['Jus', 'Vinaigres', 'Confitures', 'Coffrets'];
            
            // Si une catégorie est déjà sélectionnée et qu'elle n'est pas dans la liste autorisée
            if ($category && !in_array($category, $nonAlcoolCategories)) {
                $category = null; // Reset la catégorie invalide
            }
            
            // Filtrer uniquement les catégories non-alcoolisées
            if ($search || $tag || $minPrice || $maxPrice) {
                $products = $model->searchAndFilterByCategories($search, $nonAlcoolCategories, $tag, $minPrice, $maxPrice, self::PRODUCTS_PER_PAGE, 0);
                $total = $model->countFilteredByCategories($search, $nonAlcoolCategories, $tag, $minPrice, $maxPrice);
            } else if ($category) {
                $products = $model->searchAndFilter($search, $category, $tag, $minPrice, $maxPrice, self::PRODUCTS_PER_PAGE, 0);
                $total = $model->countFiltered($search, $category, $tag, $minPrice, $maxPrice);
            } else {
                $products = $model->getProductsByCategories($nonAlcoolCategories, self::PRODUCTS_PER_PAGE, 0);
                $total = $model->countByCategories($nonAlcoolCategories);
            }
        } else {
            // Premier chargement normal: 20 produits
            if ($search || $category || $tag || $minPrice || $maxPrice) {
                $products = $model->searchAndFilter($search, $category, $tag, $minPrice, $maxPrice, self::PRODUCTS_PER_PAGE, 0);
                $total = $model->countFiltered($search, $category, $tag, $minPrice, $maxPrice);
            } else {
                $products = $model->getAllActiveProducts(self::PRODUCTS_PER_PAGE, 0);
                $total = $model->countActiveProducts();
            }
        }
        
        $data = [
            "products" => $products,
            "categories" => $model->getCategories(),
            "tags" => $model->getAllTags(),
            "currentSearch" => $search,
            "currentCategory" => $category,
            "currentTag" => $tag,
            "currentMinPrice" => $minPrice,
            "currentMaxPrice" => $maxPrice,
            "totalProducts" => $total,
            "perPage" => self::PRODUCTS_PER_PAGE,
            "ageStatus" => $ageStatus,
            "isUnder18" => $isUnder18
        ];

        return view('products_page', $data);
    }

    /**
     * API JSON pour le scroll infini
     */
    public function loadMore()
    {
        $model = new ProductModel();
        
        $offset = (int) $this->request->getGet('offset');
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $tag = $this->request->getGet('tag');
        $minPrice = $this->request->getGet('min_price');
        $maxPrice = $this->request->getGet('max_price');
        
        // Vérifie le statut de vérification d'âge
        $isUnder18 = AgeVerification::isUnder18();
        
        // Si l'utilisateur a moins de 18 ans, filtrer les produits
        if ($isUnder18) {
            $nonAlcoolCategories = ['Jus', 'Vinaigres', 'Confitures', 'Coffrets'];
            
            if ($search || $tag || $minPrice || $maxPrice) {
                $products = $model->searchAndFilterByCategories($search, $nonAlcoolCategories, $tag, $minPrice, $maxPrice, self::PRODUCTS_PER_PAGE, $offset);
                $total = $model->countFilteredByCategories($search, $nonAlcoolCategories, $tag, $minPrice, $maxPrice);
            } else if ($category && in_array($category, $nonAlcoolCategories)) {
                $products = $model->searchAndFilter($search, $category, $tag, $minPrice, $maxPrice, self::PRODUCTS_PER_PAGE, $offset);
                $total = $model->countFiltered($search, $category, $tag, $minPrice, $maxPrice);
            } else {
                $products = $model->getProductsByCategories($nonAlcoolCategories, self::PRODUCTS_PER_PAGE, $offset);
                $total = $model->countByCategories($nonAlcoolCategories);
            }
        } else {
            if ($search || $category || $tag || $minPrice || $maxPrice) {
                $products = $model->searchAndFilter($search, $category, $tag, $minPrice, $maxPrice, self::PRODUCTS_PER_PAGE, $offset);
                $total = $model->countFiltered($search, $category, $tag, $minPrice, $maxPrice);
            } else {
                $products = $model->getAllActiveProducts(self::PRODUCTS_PER_PAGE, $offset);
                $total = $model->countActiveProducts();
            }
        }
        
        // Génère le HTML pour chaque produit
        $html = '';
        foreach ($products as $product) {
            $html .= view('products', $product);
        }
        
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'count' => count($products),
            'total' => $total,
            'hasMore' => ($offset + count($products)) < $total
        ]);
    }

    public function detail($id): string
    {
        $model = new ProductModel();
        $product = $model->getProductWithTagsById($id);
        
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $data = [
            'product' => $product
        ];
        
        return view('product_detail', $data);
    }
}
