<?php
session_start();

// Giriş kontrolü
if (!isset($_SESSION['user_id'])) {
    header("Location: giriş_yap.php");
    exit;
}

// Veritabanı bağlantısı
$baglanti = new mysqli("localhost", "root", "", "afbilko");
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

// POST verilerini al
$adsoyad = trim($_POST['adsoyad'] ?? '');
$telefon = trim($_POST['telefon'] ?? '');
$konum = trim($_POST['konum'] ?? '');
$yardim_turu = trim($_POST['yardim_turu'] ?? '');
$aciklama = trim($_POST['aciklama'] ?? '');
$il = trim($_POST['il'] ?? '');
$durum = 'Bekleniyor';
$islem = '';

// Zorunlu alanlar kontrolü
if (empty($adsoyad) || empty($telefon) || empty($konum) || empty($yardim_turu) || empty($il)) {
    $mesaj = "<span class='hata'>❌ Lütfen zorunlu alanları doldurun!</span>";
} else {
    $user_id = $_SESSION['user_id'];
    $tarih = date("Y-m-d H:i:s");

    $stmt = $baglanti->prepare("
        INSERT INTO yardim_talepleri (
            user_id, adsoyad, telefon, konum, yardim_turu, aciklama, tarih, il, durum, islem
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "isssssssss", 
        $user_id, $adsoyad, $telefon, $konum, $yardim_turu, $aciklama, $tarih, $il, $durum, $islem
    );

    if ($stmt->execute()) {
        $mesaj = "<span class='basarili'>✅ Yardım talebiniz başarıyla alındı.</span>";
    } else {
        $mesaj = "<span class='hata'>❌ Hata: " . htmlspecialchars($stmt->error) . "</span>";
    }

    $stmt->close();
}

$baglanti->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Yardım Talebi Sonuç</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff;
    }

    .arkaplan {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-image: url('img/yardim-arka.jpg'); 
      background-size: cover;
      background-position: center;
      opacity: 0.2;
      filter: blur(2px);
      z-index: -1;
    }

    header {
      background-color: rgb(142, 22, 22);
      color: white;
      padding: 15px 30px;
      font-size: 28px;
    }

    .top-right-button {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1000;
    }

    .top-right-button a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      font-size: 16px;
      font-family: 'Segoe UI', sans-serif;
    }

    main {
      padding: 40px;
      max-width: 600px;
      margin: auto;
      background: rgba(255,255,255,0.9);
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
      margin-top: 40px;
    }

    .basarili {
      color: green;
      font-size: 20px;
      font-weight: bold;
    }

    .hata {
      color: red;
      font-size: 20px;
      font-weight: bold;
    }

    .geri-link {
      margin-top: 20px;
      display: inline-block;
      text-decoration: none;
      background-color: rgb(142, 22, 22);
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
    }

    .geri-link:hover {
      background-color: #a61717;
    }
  </style>
</head>
<body>
  <div class="arkaplan"></div>

  <div class="top-right-button">
    <a href="AFBİLKO.php">Ana Sayfa</a>
  </div>

  <header>Yardım Talebi</header>

  <main>
    <?= $mesaj ?>
    <br><br>
    <a href="yardim_talep_formu.php" class="geri-link">← Yeni Talep Oluştur</a>
  </main>
</body>
</html>
