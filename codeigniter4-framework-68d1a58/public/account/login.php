<?php ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - TechnoPomme - login</title>
    <link rel="stylesheet" href="../assets/style/login.css">
    <link rel="stylesheet" href="../assets/style/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<header class="headerbar">
<div class="header-content">
    <div class="logo">
        <a href="../index.php">
            <img class="logoimg" src="../assets/img/logo.png" alt="logo">
            <span class="logotext">TechnoChantier</span>
        </a>
    </div>
    <div class="navbar">
        <form class="nav" action="http://51.255.50.155/info_request.php" method="post">
            <input type="search" name="search" placeholder="Rechercher des produits sur le site" class="navbar input">
            <button type="submit" class="navbar submit"><span class="material-symbols-outlined search">search</span></button>
        </form>
    </div>
    <div class="header links">
        <div class="small-search-container">
            <i class="material-symbols-outlined small-search" style="font-size: 50px;">search</i>
        </div>
        <a href="#" class="login-link">
            <i class="material-symbols-outlined loginicon" style="font-size: 50px;">account_circle</i>
            <span class="login text">
                        Mon compte : <br>
                        <strong>
                            Se connecter
                        </strong>
                    </span>
        </a>
        <a href="../cart.php" class="cart-link">
            <i class="material-symbols-outlined carticon" style="font-size: 50px;">shopping_cart</i>
            <span class="cart text">
                        Mon panier : <br>
                        <strong>
                            7 articles
                        </strong>
        </a>
    </div>
    <div class="bottom-separator"></div>
</div>
</header>
<div class="login-container login">
    <div class="login-logo">
        <img src="../assets/img/logo.png" alt="logo">
        <span class="connectiontext"> Se connecter </span>
    </div>
    <div class="separator"></div>
    <form class="login-form" action="./authenticator.php?type=login" method="post">
        <div class="form-control email">
            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-control password">
            <label for="password">Mot de Passe :</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-control forgotpassword">
            <span id="forgotpassword">Mot de passe oublié?</span>
        </div>
        <div class="form-control rememberme">
            <input type="checkbox" name="rememberme" id="rememberme">
            <label for="rememberme">Se souvenir de moi</label>
        </div>
        <div class="form-control submit">
            <button type="submit">Se connecter</button>
        </div>
    </form>
    <div class="separator"></div>
    <div class="other-options">
        <span class="signup text">Pas de compte? </span>
        <a href="register.php" class="signup link">S'inscrire</a>
    </div>
</div>
</body>
</html>

