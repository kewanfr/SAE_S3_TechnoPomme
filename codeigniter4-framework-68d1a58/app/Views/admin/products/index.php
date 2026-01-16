<?= view('admin/header') ?>

<div class="header-actions">
    <h2 class="admin-title">Gestion des Produits</h2>
    <a href="/product/add" class="btn btn-success">+ Ajouter</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div>
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><img src="<?= esc($product['img_src']) ?>" alt="<?= esc($product['name']) ?>" class="product-img"></td>
                                <td><?= esc($product['name']) ?></td>
                                <td><?= esc(substr($product['desc'], 0, 50)) ?>...</td>
                                <td><?= number_format($product['price'], 2) ?> €</td>
                                <td><?= $product['quantity'] ?></td>
                                <td><?= !empty($product['is_active']) ? '<span style="color:#28a745;font-weight:bold;">Actif</span>' : '<span style="color:#dc3545;font-weight:bold;">Inactif</span>' ?></td>
                                <td class="actions">
                                    <a href="/admin/products/edit/<?= $product['id'] ?>" class="btn btn-primary">Modifier</a>
                                    <form action="/admin/products/<?= $product['id'] ?>/toggle" method="post" style="display:inline;">
                                        <button type="submit" class="btn" style="background: <?= !empty($product['is_active']) ? '#ffc107' : '#28a745' ?>; color:white;">
                                            <?= !empty($product['is_active']) ? 'Désactiver' : 'Activer' ?>
                                        </button>
                                    </form>
                                    <a href="/admin/products/delete/<?= $product['id'] ?>" class="btn btn-danger" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
        </div>

<?= view('admin/footer') ?>
