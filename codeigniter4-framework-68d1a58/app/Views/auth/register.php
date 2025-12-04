<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/assets/style/colors.css">
    <link rel="stylesheet" href="/assets/style/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="color-light children-text-dark main_container">
    <label>S'inscrire</label>
    <div class="separator color-primary"></div>

    <div class="errormessage">
        <label>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 1) {
                    echo "Le mot de passe et sa confirmation sont différents.";
                } else if ($_GET['error'] == 2) {
                    echo "Une erreur est survenue lors de la création du compte.";
                } else {
                    echo "unknown error code: " . $_GET['error'];
                }
            }
            ?>
        </label>
    </div>

    <form action="/auth/register" method="post">

        <label for="username">Nom d'utilisateur:</label>
        <input id="username" type="text" name="username" class="textfield">

        <label for="email">E-mail:</label><br>
        <input id="email" type="email" name="email" class="textfield"><br>

        <label for="password">Mot de passe:</label><br>
        <input id="password" type="password" name="password" class="textfield"><br>

        <label for="passwordconf">Confirmez le mot de passe:</label><br>
        <input id="passwordconf" type="password" name="passwordconf" class="textfield"><br>

        <div class="rememberme">
            <input id="rememberme" type="checkbox" name="rememberme">
            <label for="rememberme">Se souvenir de moi</label><br>
        </div>

        <input id="submit" type="submit" value="S'inscrire">
    </form>

    <div class="separator color-primary"></div>

    <span>Déjà un compte? <a href="/login">Se connecter</a></span>
</div>
</body>
</html>