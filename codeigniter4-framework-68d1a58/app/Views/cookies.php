
<!--
Vue d'affichage du bandeau de consentement aux cookies.
Affiche le bandeau si l'utilisateur n'a pas encore donné son choix.
-->
<?php helper('cookie') ?>

<?php if(get_cookie('acceptcookies') == null): ?>
    <!-- Lien vers le fichier CSS externe pour le bandeau de cookies -->
    <link rel="stylesheet" href="/assets/style/common/cookies.css">
    
    <!-- Bandeau de consentement affiché si le cookie n'existe pas -->
    <div id="cookieBanner">
        <h1>Est-ce que vous acceptez les cookies?</h1>
        <button id="acceptcookies" class="cookie-button">accepter</button>
        <button id="denycookies" class="cookie-button">refuser</button>

        <!-- Script JS pour gérer le clic sur les boutons -->
        <script>
            // Si l'utilisateur accepte, on appelle le contrôleur pour enregistrer le choix
            document.getElementById("acceptcookies").onclick = () => {
                fetch('<?= site_url("cookies/accept") ?>')
                    .then(r => r.json())
                    .then(() => document.getElementById("cookieBanner").remove())
            }

            // Si l'utilisateur refuse, on appelle le contrôleur pour enregistrer le refus
            document.getElementById("denycookies").onclick = () => {
                fetch('<?= site_url("cookies/decline") ?>')
                    .then(r => r.json())
                    .then(() => document.getElementById("cookieBanner").remove())
            }
        </script>
    </div>

<?php endif;?>

