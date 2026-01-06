<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--<link rel="stylesheet" href="/assets/style/colors.css">
    <link rel="stylesheet" href="/assets/style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">-->
</head>
<?= view('header'); ?>
<?= view('cookies'); ?>
<body>
    <div class="products-container">
        <link rel="stylesheet" href="/assets/style/product.css"
        <?php foreach ($products as $product): //$products est mis quand on appelle la vue dans le controlleur Home.php ?>
            <?= view("products", $product); //l'équivalent d'un echo, parce qu'il faut echo la vue quand on l'appelle dans codeigniter ?>
        <?php endforeach; ?>
    </div>
</body>
<style>
    .products-container {
        display: flex;
        flex-wrap: wrap;
    }
</style>
