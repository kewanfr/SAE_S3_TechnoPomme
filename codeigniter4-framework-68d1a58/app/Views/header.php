<head>
    <link rel="stylesheet" href="/assets/style/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<header class="headerbar">
    <div class="header-content">
        <div class="logo">
            <a href="/">
                <img class="logoimg" src="./assets/img/logo.png" alt="logo">
                <span class="logotext separate">PommeHub</span>
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
            <a href="/login" class="login-link">
                <i class="material-symbols-outlined loginicon" style="font-size: 50px;">account_circle</i>
                <span class="login text">
                        Mon compte : <br>
                        <strong>
                            Se connecter
                        </strong>
                    </span>
            </a>
            <a href="./cart.html" class="cart-link">
                <i class="material-symbols-outlined carticon" style="font-size: 50px;">shopping_cart</i>
                <span class="cart text">
                        Mon panier : <br>
                        <strong>
                            7 articles
                        </strong>
                    </span>
            </a>
        </div>
    </div>
    <div class="header-menu">
        <div class="menu menu-container">
            <a href="#about" class="menu about">A propos de nous</a>
        </div>
        <div class="menu menu-container">
            <a href="#products" class="menu products">Nos produits</a>
        </div>
        <div class="menu menu-container">
            <a href="#footer" class="menu contact">Nous contacter</a>
        </div>
        <div class="bottom-separator"></div>
    </div>
</header>

