<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/assets/style/colors.css">
    <link rel="stylesheet" href="/assets/style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="color-light children-text-dark main_container">
    <label>Se connecter</label>
    <div class="separator color-primary"></div>

    <form action="/auth/login" method="post">

        <label for="email">E-mail:</label><br>
        <input id="email" type="email" name="email" class="textfield"><br>

        <label for="password">Mot de passe:</label><br>
        <input id="password" type="password" name="password" class="textfield"><br>

        <a href="" class="forgot-password">Mot de passe oublié?</a><br>

        <div class="rememberme">
        <input id="rememberme" type="checkbox" name="rememberme">
        <label for="rememberme">Se souvenir de moi</label><br>
        </div>

        <input id="submit" type="submit" value="Se connecter">
    </form>

    <div class="separator color-primary"></div>

    <span>Pas de compte? <a href="/register">S'inscrire</a></span>
</div>
</body>
</html>