<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit - TechnoPomme</title>
    <link rel="stylesheet" href="/assets/style/product/form.css">
</head>
<body>
    <div class="sidebar">
        <h2>Administration</h2>
        <ul>
            <li><a href="/admin">Tableau de bord</a></li>
            <li><a href="/admin/products" class="active">Produits</a></li>
            <li><a href="/admin/orders">Commandes</a></li>
            <li><a href="/admin/users">Utilisateurs</a></li>
            <li><a href="/admin/stock">Stock</a></li>
            <li><a href="/">Retour au site</a></li>
        </ul>
    </div>
    
    <div class="content">
        <div class="card">
            <h1>Ajouter un produit</h1>
            
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            
            <form action="/product/add/add" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom du produit:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <textarea name="desc" id="desc" rows="4" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="category">Catégorie:</label>
                    <select name="category" id="category">
                        <option value="">-- Sélectionner --</option>
                        <option value="cidres">Cidres</option>
                        <option value="jus">Jus</option>
                        <option value="vinaigre">Vinaigre</option>
                        <option value="accessoires">Accessoires</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="tags">Tags (séparés par des virgules):</label>
                    <input type="text" name="tags" id="tags" placeholder="bio, tradition, brut...">
                    <small style="color: #666; font-size: 0.9em;">Exemples: bio, tradition, monovariétal, doux, brut, artisanal</small>
                </div>
                
                <div class="form-group">
                    <label for="price">Prix (€):</label>
                    <input type="number" name="price" id="price" step="0.01" min="0" required placeholder="ex: 19.99">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantité:</label>
                    <input type="number" name="qtt" id="quantity" min="0">
                </div>
                
                <div class="form-group">
                    <label for="userfile">Image du produit:</label>
                    <input type="file" name="userfile" id="userfile" accept="image/*" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                <a href="/admin/products" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</body>
</html>