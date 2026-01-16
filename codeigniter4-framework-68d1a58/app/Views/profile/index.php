
<!-- Inclusion du header commun -->
<?= view('header') ?>

<!-- Lien vers le fichier CSS externe pour la page profil -->
<link rel="stylesheet" href="/assets/style/profile/index.css">

<!--
Page de profil utilisateur
Affiche les informations personnelles et professionnelles, permet la modification du profil et le changement de mot de passe.
-->
<div class="profile-container">
    <!-- Titre principal -->
    <h1 style="color: #8b4513; margin-bottom: 30px;">Mon Profil</h1>
    
    <!-- Affichage des messages de succès -->
    <?php if (session()->has('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>
    
    <!-- Affichage des messages d'erreur -->
    <?php if (session()->has('error')): ?>
        <div class="alert alert-error"><?= session('error') ?></div>
    <?php endif; ?>
    
    <!-- Carte d'informations personnelles -->
    <div class="profile-card">
        <h2 class="profile-title">
            Informations personnelles
            <!-- Badge PRO si le compte est professionnel -->
            <?php if ($user->customer_type === 'professionnel'): ?>
                <span class="badge-pro">PRO</span>
            <?php endif; ?>
        </h2>
        
        <!-- Formulaire de modification des informations personnelles -->
        <form action="/profile/update" method="post">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" value="<?= esc($user->username) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= esc($email) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" value="<?= esc($user->phone ?? '') ?>" placeholder="Ex: 06 12 34 56 78">
            </div>
            
            <div class="form-group">
                <label for="address">Adresse</label>
                <textarea id="address" name="address" rows="3" placeholder="Adresse complète"><?= esc($user->address ?? '') ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="customer_type">Type de compte</label>
                <select id="customer_type" name="customer_type" onchange="toggleProFields()" required>
                    <option value="particulier" <?= $user->customer_type === 'particulier' ? 'selected' : '' ?>>Particulier</option>
                    <option value="professionnel" <?= $user->customer_type === 'professionnel' ? 'selected' : '' ?>>Professionnel</option>
                </select>
            </div>
            
            <!-- Champs professionnels affichés uniquement si "professionnel" -->
            <div id="pro_fields" class="pro-fields" style="display: <?= $user->customer_type === 'professionnel' ? 'block' : 'none' ?>;">
                <h3 style="color: #8b4513; margin-bottom: 15px;">Informations professionnelles</h3>
                
                <div class="form-group">
                    <label for="company_name">Nom de l'entreprise</label>
                    <input type="text" id="company_name" name="company_name" value="<?= esc($user->company_name ?? '') ?>">
                </div>
                
                <div class="form-group">
                    <label for="siret">Numéro SIRET</label>
                    <input type="text" id="siret" name="siret" value="<?= esc($user->siret ?? '') ?>" pattern="[0-9]{14}" placeholder="14 chiffres">
                </div>
                
                <div class="form-group">
                    <label for="tva_number">N° TVA intracommunautaire</label>
                    <input type="text" id="tva_number" name="tva_number" value="<?= esc($user->tva_number ?? '') ?>" placeholder="Ex: FR12345678901">
                </div>
            </div>
            
            <!-- Bouton pour enregistrer les modifications du profil -->
            <button type="submit" class="btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
    
    <!-- Carte pour le changement de mot de passe -->
    <div class="profile-card">
        <h2 class="profile-title">Changer le mot de passe</h2>
        
        <!-- Formulaire de changement de mot de passe -->
        <form action="/profile/password" method="post">
            <div class="form-group">
                <label for="current_password">Mot de passe actuel</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            
            <div class="form-group">
                <label for="new_password">Nouveau mot de passe</label>
                <input type="password" id="new_password" name="new_password" required minlength="8">
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
            </div>
            
            <!-- Bouton pour changer le mot de passe -->
            <button type="submit" class="btn-danger">Changer le mot de passe</button>
        </form>
    </div>
</div>


<!-- Script pour afficher/masquer les champs professionnels selon le type de compte -->
<script>
    function toggleProFields() {
        const customerType = document.getElementById('customer_type').value;
        const proFields = document.getElementById('pro_fields');
        
        if (customerType === 'professionnel') {
            proFields.style.display = 'block';
        } else {
            proFields.style.display = 'none';
        }
    }
</script>

<?= view('footer') ?>
</body>
</html>
