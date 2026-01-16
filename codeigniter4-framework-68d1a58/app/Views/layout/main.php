<?php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil - TechnoPomme</title>
    <link rel="stylesheet" href="/assets/style/layout/main.css">
</head>
<body>
    <?= view('header') ?>
    <?= view('cookies') ?>
    
    <!-- Section À propos -->
    <div style="background: rgba(255,255,255,0.95); padding: 40px; margin: 20px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); position: relative;">
        <!-- Drapeau breton -->
        <img src="/assets/img/gwenn-ha-du.svg" alt="Gwenn ha du" style="position: absolute; top: 20px; right: 20px; width: 70px; height: auto; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
        
        <h2 style="color: #c41e3a; font-size: 2em; margin-bottom: 20px; text-align: center;">
            🍎 PommeHub - Plateforme de cidreries artisanales
        </h2>
        <div style="max-width: 900px; margin: 0 auto; line-height: 1.8; color: #333;">
            <p style="font-size: 1.1em; margin-bottom: 15px;">
                Bienvenue sur la plateforme PommeHub, filiale de <strong>Technochantier & CIE</strong>, elle regroupe nos produits ainsi que ceux de nos cidreries artisanales partenaires de la région.
                <br /><br />
                Nous sommes <strong>TechnoPomme</strong>, votre cidrerie artisanale de tradition bretonne.
                Nous sommes fiers de perpétuer un savoir-faire ancestral transmis de génération en génération à travers cette cidrerie familiale, nous cultivons nos vergers avec passion depuis plus de 30 ans
                et produisons des cidres, jus de pomme et vinaigres d'exception.


            </p>
            <p style="font-size: 1.1em; margin-bottom: 25px;">
                Nos produits sont élaborés à partir de pommes 100% locales, récoltées à la main et 
                transformées selon des méthodes traditionnelles. Nous privilégions les variétés anciennes 
                et le respect des saisons pour vous offrir des saveurs authentiques.
            </p>
            <p style="font-size: 0.95em; margin-bottom: 15px; color: #666; font-style: italic;">
                <strong>Technochantier & CIE</strong> est notre groupe familial qui regroupe également nos sociétés sœurs : <br />
                <a href="https://technochantier.kewan.fr/" target="_blank" style="text-decoration: none; font-weight: bold;">Technochantier</a> (équipements de chantier innovants), <a href="https://dassault.kewan.fr/" target="_blank" style="text-decoration: none; font-weight: bold;">Dassault Aviation</a>,
                <strong>GlobalBeats</strong> (plateforme musicale), <a href="https://drive.google.com/file/d/13PCXfaCm7-R-S_K38ZEEr_gcUSvgUumz/view?usp=sharing" target="_blank" style="text-decoration: none; font-weight: bold;">Marc&Co</a> (Leader du dosage anisé avec le Ricassou 3000),
                <a href="https://www.canva.com/design/DAGpexFnL78/URfhrRUflnu_joc9DE2KyQ/edit" target="_blank" style="text-decoration: none; font-weight: bold;">Brickophone</a> (smartphone modulaires et facilement réparables) et <strong>RéparEco</strong> (formation de réparations d'équipements électroniques).
            </p>¨
            <p style="font-size: 1.1em; color: #8bc34a; font-weight: bold; text-align: center; margin-top: 20px;">
                🌱 Agriculture responsable • 🍏 Savoir-faire artisanal • 🏆 Qualité premium
            </p>
        </div>
    </div>
    
    <!-- Produits phares -->
    <div style="background: rgba(255,255,255,0.95); padding: 40px 20px; margin: 20px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);">
        <h2 style="color: #c41e3a; font-size: 2em; margin-bottom: 30px; text-align: center; align-items:center;">Nos Produits Phares</h2>
        <div class="products-container" style="margin-bottom: 30px;">
            <?php 
            $featuredProducts = array_slice($products, 0, 8); 
            foreach ($featuredProducts as $product): 
            ?>
                <?= view("products", $product); ?>
            <?php endforeach; ?>
        </div>
        <div style="text-align: center;">
            <a href="/products" style="display: inline-block; padding: 15px 40px; background: #c41e3a; color: white; text-decoration: none; border-radius: 25px; font-weight: bold; font-size: 1.1em; transition: all 0.3s;" onmouseover="this.style.background='#a01828'" onmouseout="this.style.background='#c41e3a'">
                Voir tous nos produits →
            </a>
        </div>
    </div>
    
    <!-- Tous les produits sur la page d'accueil -->
    <div id="all-products" style="margin-top: 40px;">
        <h2 style="color: #8b4513; font-size: 1.8em; margin: 20px; text-align: center; background: rgba(255,255,255,0.8); padding: 20px; border-radius: 10px;">
            Tous nos produits
        </h2>
        
        <div class="products-container">
            <?php foreach ($products as $product): ?>
                <?= view("products", $product); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <?= view('footer') ?>
</body>
</html>
