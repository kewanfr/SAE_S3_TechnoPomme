<body>
    <!-- TODO: Intégration avec les contrôleurs -->
    <div class="product-container">
        <img class='product_img' src='/assets/img/missing_product.jpg' alt='Product Image'>
        <div class='product_info'>
            <span class="product_name">NomProduit</span>
            <span class="product_desc">DescriptionProduit</span>
            <div class='price-qtt-container'>
                <a href="/product/purchase?id=0" class="purchase_product" id="purchase_<?=$id?>" >
                    <span class='product_price'>Prix Produit</span>
                </a>
                <span class='product_qtt'>Quantité Produit</span>
            </div>
        </div>
    </div>
</body>