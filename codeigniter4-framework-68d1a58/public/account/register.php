<?php ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | Technochantier - signup</title>
    <link rel="stylesheet" href="../assets/style/register.css">
    <link rel="stylesheet" href="../assets/style/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<header class="headerbar-login">
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
            <a href="../cart.php" class="login-link">
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
    </div>
    <div class="bottom-separator"></div>
</header>
<div class="container login">
    <div class="login-logo">
        <img src="../assets/img/logo.png" alt="logo">
        <span> Créer un compte </span>
    </div>
    <div class="separator"></div>
    <form class="signup-form" id="signupform" action="authenticator.php?type=register" method="post">
        <div class="form username">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form email">
            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form password">
            <label for="password">Mot de Passe :</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form confirmpassword">
            <label for="confirmpassword">Confirmer le mot de passe :</label>
            <input type="password" name="confirmpassword" id="confirmpassword">
        </div>
        <div class="form rememberme">
            <input type="checkbox" name="rememberme" id="rememberme">
            <label for="rememberme">Se souvenir de moi</label>
        </div>
        <div class="form submit" id="signupbutton">
            <button type="submit">Se connecter</button>
        </div>
    </form>
    <div class="separator"></div>
    <div class="other-options">
        <span class="signup text">Déjà un compte? </span>
        <a href="login.php" class="signup link">Se connecter</a>
    </div>
</div>
</body>
</html>
