<?php

namespace App\Controllers;

use App\Models\ProductModel;

/**
 * Controlleur pour afficher la page d'accueil
 */
class Home extends BaseController
{
    public function index(): string
    {
        $model = new ProductModel();

        $data["products"] = $model->getAllProducts();

        return view('layout/main', $data);
    }
}
