<body>
    <div class="product-container">
        <?php
        if (isset($img_src)) {
            if (!file_exists(FCPATH . $img_src)) {
                $img_src = "/assets/img/missing_product.jpg";
            }
            echo "<img class='product_img' src='$img_src' alt='Product Image'>";
        } else {
            echo "<img class='product_img' src='/assets/img/missing_product.jpg' alt='Product Image'>";
        }
        ?>
        <div class='product_info'>
            <?php
            if (isset($name)) {
                echo "<span class='product_name'>" . htmlspecialchars($name) . "</span>";
            } else {
                echo "<span class='product_name'>NomProduit</span>";
            }

            if (isset($desc)) {
                echo "<span class='product_desc'>" . htmlspecialchars($desc) . "</span>";
            } else {
                echo "<span class='product_desc'>Desc Produit</span>";
            }
            ?>
            <div class='price-qtt-container'>
                <a href="/product/purchase?id=<?=$id?>" class="purchase_product" id="purchase_<?=$id?>" >
                    <?php if (isset($price)) {
                        echo "<span class='product_price'>" . htmlspecialchars($price) . " €</span>";
                    } else {
                        echo "<span class='product_price'>Prix Produit</span>";
                    }?>
                </a>
                <?php if (isset($quantity)) {
                    echo "<span class='product_qtt'>Restant: ". htmlspecialchars($quantity) ."</span>";
                } else {
                    echo "<span class='product_qtt'>Quantité Produit</span>";
                } ?>
            </div>
        </div>
    </div>
</body>