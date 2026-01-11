<?php

namespace App\Controllers;

use App\Models\ProductModel;

/**
 * Contrôleur pour la page produits uniquement
 */
class Products extends BaseController
{
    public function index(): string
    {
        $model = new ProductModel();
        
        // Récupère les paramètres de recherche et filtres
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $tag = $this->request->getGet('tag');
        
        // Filtre les produits
        if ($search || $category || $tag) {
            $products = $model->searchAndFilter($search, $category, $tag);
        } else {
            $products = $model->getAllProducts();
        }
        
        $data = [
            "products" => $products,
            "categories" => $model->getCategories(),
            "tags" => $model->getAllTags(),
            "currentSearch" => $search,
            "currentCategory" => $category,
            "currentTag" => $tag
        ];

        return view('products_page', $data);
    }

    public function detail($id): string
    {
        $model = new ProductModel();
        $product = $model->find($id);
        
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $data = [
            'product' => $product
        ];
        
        return view('product_detail', $data);
    }
}
