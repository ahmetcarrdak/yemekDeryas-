<?php include "./include/top.php" ?>

<img src="./img/carousel-1.jpg" alt="" class="w-100">

<div class="w-cards">

    <?php

    $stmt = $conn->prepare("SELECT * FROM store");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        foreach ($result as $row) {
    ?>
            <div class="w-card d-flex flex-row mt-5">
                <div class="w-card-i"><img src="img/<?php echo $row['logo_url'] ?>" alt="" style="width:100px"></div>
                <div class="w-card-body">
                    <div class="w-card-title"><?php echo $row['store_name'] ?></div>
                    <div class="w-card-detail">
                        <i class="fa fa-clock"></i> 18.00-19.00
                    </div>
                </div>
                <div class="w-card-i ml-auto">
                    <i class="fas fa-shopping-cart"></i>
                    <i class="fa fa-heart"></i>
                </div>
            </div>
    <?php }
    } ?>
</div>

<?php include "./include/bottom.php" ?>