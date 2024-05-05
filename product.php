<?php include "./include/top.php" ?>

<style>
    .message {
        display: none;
        z-index: 999999;
        position: fixed;
        top: 20px;
        right: 10px;
    }
</style>

<div class="message"></div>

<img src="./img/carousel-1.jpg" alt="" class="w-100">

<div class="w-cards">

    <?php

    $stmt_products = $conn->prepare("SELECT * FROM product");
    $stmt_products->execute();

    $result_products = $stmt_products->fetchAll(PDO::FETCH_ASSOC);

    $stmt_cart = $conn->prepare("SELECT * FROM sepet");
    $stmt_cart->execute();

    $result_cart = $stmt_cart->fetchAll(PDO::FETCH_ASSOC);

    $stmt_favorite = $conn->prepare("SELECT * FROM favori");
    $stmt_favorite->execute();

    $result_favorite = $stmt_favorite->fetchAll(PDO::FETCH_ASSOC);

    if (count($result_products) > 0) {
        foreach ($result_products as $row_product) {
            $cartIconClass = ''; // Sepet ikonu rengi
            $heartIconClass = ''; // Favori ikonu rengi

            // Sepetteki ürünler arasında ise sepet ikonunu sarı yap
            foreach ($result_cart as $row_cart) {
                if ($row_product['product_id'] == $row_cart['urun_id']) {
                    $cartIconClass = 'text-warning'; // Sarı renk sınıfı
                    break;
                }
            }

            // Favoriye eklenen ürünler arasında ise favori ikonunu sarı yap
            foreach ($result_favorite as $row_favorite) {
                if ($row_product['product_id'] == $row_favorite['urun_id']) {
                    $heartIconClass = 'text-warning'; // Sarı renk sınıfı
                    break;
                }
            }
    ?>
            <div class="w-card d-flex flex-row mt-5">
                <div class="w-card-i"><img src="img/<?php echo $row_product['image_url'] ?>" alt="" style="width:100px"></div>
                <div class="w-card-body">
                    <div class="w-card-title"><?php echo $row_product['product_name'] ?></div>
                    <div class="w-card-detail">
                        <i class="fa fa-clock"></i> 18.00-19.00
                    </div>
                </div>
                <div class="w-card-i ml-auto">
                    <?php
                    if (isset($_SESSION['mail'])) {
                    ?>
                        <i class="fas fa-shopping-cart <?php echo $cartIconClass ?>" onclick="cartToggle(this, '<?php echo $_SESSION['mail'] ?>','<?php echo $row_product['product_name'] ?>', '<?php echo $row_product['price'] ?>', '<?php echo $row_product['category'] ?>', '<?php echo $row_product['product_id'] ?>')"></i>
                        <i class="fa fa-heart <?php echo $heartIconClass ?>" onclick="heartToggle(this, '<?php echo $_SESSION['mail'] ?>', '<?php echo $row_product['product_name'] ?>', '<?php echo $row_product['price'] ?>', '<?php echo $row_product['category'] ?>', '<?php echo $row_product['product_id'] ?>')"></i>
                    <?php
                    } else {
                    ?>
                        <a href="login.php" class="btn btn-warning">Login</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>

<?php include "./include/bottom.php" ?>