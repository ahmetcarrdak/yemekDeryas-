<?php
include("./../include/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['mail'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM customer WHERE mail = :username AND sifre = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "onay";
        $_SESSION['yemekDeryasıKullaniciOturumu'] = true;
        $_SESSION['mail'] = $username;
    } else {
        echo "Kullanıcı adı veya şifre yanlış!";
    }
} else {
    echo "POST verisi bulunamadı";
}
