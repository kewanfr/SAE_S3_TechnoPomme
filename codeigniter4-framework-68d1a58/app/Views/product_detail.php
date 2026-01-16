<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($product['name']) ?> - TechnoPomme</title>
    <link rel="stylesheet" href="/assets/style/product/detail.css">
</head>
<body>
    <?= view('header') ?>
    
    <a href="/products" class="back-link">← Retour au catalogue</a>
    
    <div class="product-detail-container">
        <div class="product-detail-content">
            <div class="product-image-container">
                <?php
                $img = $product['img_src'] ?? '/assets/img/missing_product.jpg';
                if (!file_exists(FCPATH . $img)) {
                    $img = "/assets/img/missing_product.jpg";
                }
                ?>
                <img class='product-detail-image' src='<?= $img ?>' alt='<?= esc($product['name']) ?>'>
            </div>
            
            <div class="product-info-section">
                <div>
                    <h1 class="product-title"><?= esc($product['name']) ?></h1>
                    <div style="margin-top: 15px;">
                        <?php if (!empty($product['category'])): ?>
                            <span class="category-badge"><?= esc($product['category']) ?></span>
                        <?php endif; ?>
                        
                        <?php if (!empty($product['format'])): ?>
                            <span class="format-badge"><?= esc($product['format']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="product-description">
                    <?= esc($product['desc']) ?>
                </div>
                
                <?php
                $tvaRate = $product['tva_rate'] ?? 20.0;
                $priceTTC = $product['price'];
                $priceHT = $priceTTC / (1 + $tvaRate / 100);
                ?>
                
                <div class="price-section">
                    <div style="flex: 1;">
                        <div style="font-size: 14px; color: #8b4513; margin-bottom: 5px;">Prix HT: <?= number_format($priceHT, 2, ',', ' ') ?> €</div>
                        <div style="display: flex; align-items: baseline; gap: 10px;">
                            <span class="price-label">Prix TTC:</span>
                            <span class="price-value"><?= number_format($priceTTC, 2, ',', ' ') ?> €</span>
                        </div>
                        <div style="font-size: 12px; color: #888; margin-top: 5px;">TVA <?= number_format($tvaRate, 1) ?>%</div>
                    </div>
                </div>
                
                <?php
                $quantity = $product['quantity'];
                $stockClass = $quantity > 10 ? '' : ($quantity > 0 ? 'low-stock' : 'out-of-stock');
                $stockTextClass = $quantity > 10 ? '' : ($quantity > 0 ? 'low' : 'out');
                ?>
                <div class="stock-info <?= $stockClass ?>">
                    <span class="stock-text <?= $stockTextClass ?>">
                        <?php if ($quantity > 10): ?>
                            ✓ En stock (<?= $quantity ?> disponibles)
                        <?php elseif ($quantity > 0): ?>
                            ⚠️ Stock limité (<?= $quantity ?> restants)
                        <?php else: ?>
                            ✗ Rupture de stock
                        <?php endif; ?>
                    </span>
                </div>
                
                <?php if (!empty($product['tags'])): ?>
                    <div>
                        <h3 style="color: #8b4513; margin-bottom: 10px;">Tags</h3>
                        <div class="tags-section" style="max-height: 90px; overflow-y: auto;">
                            <?php foreach (explode(',', $product['tags']) as $tag): ?>
                                <span class="tag"><?= esc(trim($tag)) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="add-to-cart-section">
                    <label for="qty" style="font-weight: bold; color: #8b4513;">Quantité:</label>
                    <input 
                        type="number" 
                        class="qty-input" 
                        value="1" 
                        min="1" 
                        max="<?= $quantity ?>" 
                        id="qty-<?= $product['id'] ?>"
                        <?= $quantity <= 0 ? 'disabled' : '' ?>
                    >
                    <button 
                        onclick="addToCart(<?= $product['id'] ?>, this)" 
                        class="add-to-cart-btn"
                        <?= $quantity <= 0 ? 'disabled' : '' ?>
                    >
                        <?= $quantity > 0 ? 'Ajouter au panier' : 'Indisponible' ?>
                    </button>
                    <span class="cart-feedback">✓ Ajouté !</span>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        async function addToCart(productId, button) {
            const qtyInput = document.getElementById('qty-' + productId);
            const quantity = parseInt(qtyInput.value);
            const feedback = button.nextElementSibling;
            
            try {
                const response = await fetch('/cart/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                });
                
                const data = await response.json();
                
                if (data.redirect) {
                    alert(data.message || 'Vous devez être connecté pour ajouter au panier');
                    window.location.href = data.redirect;
                    return;
                }
                
                if (data.success) {
                    feedback.style.display = 'inline';
                    button.textContent = '✓ Ajouté !';
                    
                    // Met à jour le compteur du panier (si la fonction existe)
                    if (typeof updateCartCount === 'function') {
                        updateCartCount();
                    }
                    
                    setTimeout(() => {
                        button.textContent = 'Ajouter au panier';
                        feedback.style.display = 'none';
                    }, 2000);
                } else {
                    alert(data.message || 'Erreur lors de l\'ajout au panier');
                }
            } catch (error) {
                console.error('Erreur:', error);
                alert('Erreur lors de l\'ajout au panier');
            }
        }
    </script>
</body>
</html>
