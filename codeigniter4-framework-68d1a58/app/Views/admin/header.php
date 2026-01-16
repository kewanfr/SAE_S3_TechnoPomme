<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - TechnoPomme</title>
    <link rel="stylesheet" href="/assets/style/admin/admin.css">
</head>
<body>
    <div class="admin-header">
        <a href="/" class="back-link">← Retour au site</a>
        
        <a href="/" style="text-decoration: none; color: white;">
            <h1>Administration TechnoPomme</h1>
        </a>
        <div class="admin-nav">
            <nav>
                <a href="/admin">Dashboard</a>
                
                <?php 
                $userRoles = session()->get('user_roles') ?? [];
                $hasPermission = function($permission) use ($userRoles) {
                    foreach ($userRoles as $role) {
                        $roleEnum = \App\Enums\RoleInterne::tryFrom($role);
                        if ($roleEnum && $roleEnum->hasPermission($permission)) {
                            return true;
                        }
                    }
                    return false;
                };
                ?>
                
                <?php if ($hasPermission('manage_products')): ?>
                    <a href="/admin/products">Produits</a>
                <?php endif; ?>
                
                <?php if ($hasPermission('view_orders')): ?>
                    <a href="/admin/orders">Commandes</a>
                <?php endif; ?>
                
                <?php if ($hasPermission('manage_stock')): ?>
                    <a href="/admin/stock">Stock</a>
                <?php endif; ?>
                
                <?php if ($hasPermission('manage_users')): ?>
                    <a href="/admin/users">Utilisateurs</a>
                <?php endif; ?>
                
            </nav>
            <div class="user-info">
                <div class="user-details">
                    <div class="username"><?= esc(auth()->user()->username ?? 'Utilisateur') ?></div>
                    <div class="roles">
                        <?php 
                        $userRoles = session()->get('user_roles') ?? ['client'];
                        foreach ($userRoles as $role): 
                        ?>
                            <span class="role-badge"><?= esc(ucfirst($role)) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <a href="/logout" class="btn-logout">Déconnexion</a>
            </div>
        </div>
    </div>
    <div class="admin-container">
