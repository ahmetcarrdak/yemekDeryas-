<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yemek Deryası</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <img src="./img/loader.gif" alt="">
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0">Yemek Deryası</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Anasayfa</a>
                <a href="product.php" class="nav-item nav-link">Yemekler</a>
                <a href="store.php" class="nav-item nav-link">Restorantlar</a>
            </div>
            <div class=" d-none d-lg-flex">
                <?php if (isset($_SESSION['yemekDeryasıKullaniciOturumu'])) { ?>
                    <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle" style="cursor: pointer;margin-right:5px;" onclick="window.location = 'user/index.php'">
                        <i class="fas fa-user text-primary"></i>
                    </div>
                <?php } else { ?>
                    <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle" style="cursor: pointer;margin-right:5px;" onclick="window.location = 'login.php'">
                        <i class="fas fa-sign-in-alt text-primary"></i>
                    </div>
                <?php } ?>
                <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle" style="cursor: pointer;" id="shopping-card-button">
                    <i class="fas fa-shopping-cart text-primary"></i>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="shopping-card-bg"></div>
    <div class="shopping-card">
        <div class="cross">
            <i class="fas fa-times text-primary"></i>
        </div>
        <hr>
        <?php if (isset($_SESSION['yemekDeryasıKullaniciOturumu'])) { ?>
            <div class="search">
                <input type="text">
                <i class="fas fa-search text-primary"></i>
            </div>
            <hr>
            <div style="border-bottom:1px solid #ddd"></div>
            <div class="items">
                <?php
                $kullaniciadi = $_SESSION["mail"];
                $stmt = $conn->prepare("SELECT * FROM sepet WHERE kullanici_adi='$kullaniciadi'");
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($result) > 0) {
                    foreach ($result as $row) {
                ?>
                        <div class="item">
                            <div class="item-img">
                                <img src="../img/dish-1.png" alt="">
                            </div>
                            <div class="item-body">
                                <div class="item-title"><?php echo $row['urun_adi'] ?> &nbsp; <span class="text-primary">x<?php echo $row['urun_adedi'] ?></span></div>
                                <div class="item-price">₺<?php echo $row['urun_fiyati'] ?></div>
                            </div>
                        </div>
                <?php }
                } else {
                    echo "<span class='text-primary'>Sepette veri bulunmamaktadır.</span>";
                } ?>
            </div>
            <div class="buttons">
                <a href="shoppingCard.php">Sepeti Görüntüle</a>
                <a href="payment.php">Ödeme Yap</a>
            </div>
        <?php } else { ?>
            <div class="text-primary" style="border-bottom:1px solid #ddd;">Lütfen Oturum Açınız Yada Kayıt Olunuz</div>
            <div class="buttons">
                <a href="login.php">Giriş Yap</a>
                <a href="signUp.php">Kayıt Ol</a>
            </div>
        <?php } ?>
    </div>