<?php
// Veritabanı bağlantısı
include '../include/db.php';

// POST isteğinden gelen verileri alma
if (isset($_POST['mail']) && isset($_POST['product']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['id']) && isset($_POST['f'])) {
    $mail = $_SESSION['mail'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $id = $_POST['id'];
    $f = $_POST['f'];

    if ($f == "card") {
        // Sepet tablosunda ürün id kontrolü yap
        $stmt = $conn->prepare("SELECT * FROM sepet WHERE kullanici_adi = ? AND urun_id = ?");
        $stmt->execute([$mail, $id]);
        $result = $stmt->fetch();

        if ($result) {
            // Ürün sepete ekli, silme işlemi yap
            $stmt = $conn->prepare("DELETE FROM sepet WHERE kullanici_adi = ? AND urun_id = ?");
            $stmt->execute([$mail, $id]);
            echo "<div class='alert alert-danger'>Ürün sepetten çıkarıldı.</div>";
        } else {
            // Ürün sepete ekli değil, ekleme işlemi yap
            $stmt = $conn->prepare("INSERT INTO sepet (kullanici_adi, urun_adi, urun_fiyati, urun_kategori, urun_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$mail, $product, $price, $category, $id]);
            echo "<div class='alert alert-success'>Ürün sepete eklendi.</div>";
        }
    } elseif ($f == "heart") {
        // Favori tablosunda ürün id kontrolü yap
        $stmt = $conn->prepare("SELECT * FROM favori WHERE kullanici_adi = ? AND urun_id = ?");
        $stmt->execute([$mail, $id]);
        $result = $stmt->fetch();

        if ($result) {
            // Ürün favorilere ekli, silme işlemi yap
            $stmt = $conn->prepare("DELETE FROM favori WHERE kullanici_adi = ? AND urun_id = ?");
            $stmt->execute([$mail, $id]);
            echo "<div class='alert alert-danger'>Ürün favorilerden çıkarıldı.</div>";
        } else {
            // Ürün favorilere ekli değil, ekleme işlemi yap
            $stmt = $conn->prepare("INSERT INTO favori (kullanici_adi, urun_adi, urun_fiyati, urun_kategori, urun_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$mail, $product, $price, $category, $id]);
            echo "<div class='alert alert-success'>Ürün favorilere eklendi.</div>";
        }
    }

    // Başarılı yanıt
} else {
    // Hatalı istek yanıtı
    http_response_code(400);
    echo "Hatalı istek.";
}
