<?php include "./include/top.php"; ?>


<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="./img/carousel-1.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-3.jpg" alt="">
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Facts Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="fact-item bg-light rounded text-center h-100 p-5">
                    <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                    <p class="mb-2">Years Experience</p>
                    <h1 class="display-5 mb-0" data-toggle="counter-up">50</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="fact-item bg-light rounded text-center h-100 p-5">
                    <i class="fa fa-users fa-4x text-primary mb-4"></i>
                    <p class="mb-2">Skilled Professionals</p>
                    <h1 class="display-5 mb-0" data-toggle="counter-up">175</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="fact-item bg-light rounded text-center h-100 p-5">
                    <i class="fa fa-bread-slice fa-4x text-primary mb-4"></i>
                    <p class="mb-2">Total Products</p>
                    <h1 class="display-5 mb-0" data-toggle="counter-up">135</h1>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.7s">
                <div class="fact-item bg-light rounded text-center h-100 p-5">
                    <i class="fa fa-cart-plus fa-4x text-primary mb-4"></i>
                    <p class="mb-2">Order Everyday</p>
                    <h1 class="display-5 mb-0" data-toggle="counter-up">9357</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Card Start -->
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <a href="#">
                <div class="card">
                    <img src="./img/dish-1.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="card">
                    <img src="./img/dish-2.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="card">
                    <img src="./img/dish-3.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="card">
                    <img src="./img/dish-4.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>
        <div class="col-md-3 mt-3">
            <a href="#">
                <div class="card">
                    <img src="./img/dish-5.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>
        <div class="col-md-3 mt-3">
            <a href="#">
                <div class="card">
                    <img src="./img/dish-6.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>
        <div class="col-md-3 mt-3">
            <a href="#">
                <div class="card">
                    <img src="./img/home-img-3.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>
        <div class="col-md-3 mt-3">
            <a href="#">
                <div class="card">
                    <img src="./img/home-img-1.png" class="card-img-top" alt="..." height="250">
                </div>
            </a>
        </div>

    </div>
</div>
<!-- Card End -->


<div class="container-xxl bg-light my-6 py-6 pt-0">
    <div class="container">
        <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 text-light mb-0">Şehrin Her Yerine Anlık Hizmet</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <div class="d-inline-flex align-items-center text-start">
                        <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                        <div class="ms-4">
                            <p class="fs-5 fw-bold mb-0">Destek Hattımız</p>
                            <p class="fs-1 fw-bold mb-0">+012 345 6789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">// Mağazalar</p>
            <h1 class="display-6 mb-4">Öne Çıkan Mağazalarımızı Keşfedin Aç Kalmayın</h1>
        </div>
        <div class="row g-4">
            <?php

            $stmt = $conn->prepare("SELECT store_name, iban, price_range, logo_url FROM store LIMIT 3");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $row) {
            ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                            <div class="text-center p-4">
                                <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">$<?php echo $row['price_range'] ?></div>
                                <h3 class="mb-3"><?php echo $row['store_name'] ?></h3>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="img-fluid w-100 h-400" src="img/<?php echo $row['logo_url'] ?>" alt="">
                                <div class="product-overlay">
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-eye text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php      }
            } else {
                echo "Veri bulunamadı";
            } ?>
        </div>
    </div>
</div>
<!-- Product End -->

<?php include "./include/bottom.php" ?>