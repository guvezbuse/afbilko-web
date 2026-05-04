<?php
session_start();

// Giriş kontrolü
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'gönüllü') {
    header("Location: giris_yap.php");
    exit;
}

// Veritabanı bağlantısı
$baglanti = new mysqli("localhost", "root", "", "afbilko");
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['talep_id'])) {
    $talep_id = (int)$_POST['talep_id'];
    $gonullu_id = (int)$_SESSION['user_id'];

    // Hem durum hem de karsilayan gonullu id güncelleniyor
    $sql = "UPDATE yardim_talepleri 
            SET durum = 'Karşılandı', karsilayan_gonullu_id = ? 
            WHERE id = ?";

            $sql = "UPDATE yardim_talepleri 
        SET durum = 'Karşılandı', 
            karsilayan_gonullu_id = ?, 
            karsilama_tarihi = NOW() 
        WHERE id = ?";


    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("ii", $gonullu_id, $talep_id);

    if ($stmt->execute()) {
        header("Location: yardim_talepleri_filtreleme.php");
        exit;
    } else {
        echo "<h2 style='color: red;'>❌ Hata: " . htmlspecialchars($stmt->error) . "</h2>";
    }

    $stmt->close();
} else {
    echo "<h2 style='color: red;'>❌ Geçersiz talep ID.</h2>";
}

$baglanti->close();
?>
