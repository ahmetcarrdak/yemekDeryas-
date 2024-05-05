<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "yemekDeryası";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #echo "Veritabanına bağlantı başarılı";
} catch (PDOException $e) {
    #echo "Bağlantı hatası: " . $e->getMessage();
}

session_start();