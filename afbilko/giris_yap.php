<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <title>Giriş Yap - AFBİLKO</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background-color: #f7f7f7;
    }
    header {
      background-color: rgb(142, 22, 22);
      color: white;
      padding: 15px 30px;
      font-size: 26px;
    }
    main {
      max-width: 400px;
      margin: 40px auto;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    .message-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 15px;
    }
    .link {
      margin-top: 15px;
      display: block;
      text-align: center;
      color: rgb(142, 22, 22);
      font-weight: 600;
      text-decoration: none;
    }
  </style>
</head>
<body>

<header>Giriş Yap</header>

<main>

<?php


$baglanti = new mysqli("localhost", "root", "", "afbilko");
if ($baglanti->connect_error) {
  die('<div class="message-error">Bağlantı hatası: ' . htmlspecialchars($baglanti->connect_error) . '</div>');
}

$girdi = trim($_POST['girdi'] ?? '');
$sifre = $_POST['sifre'] ?? '';
$rol = $_POST['rol'] ?? '';


if (empty($girdi) || empty($sifre) || empty($rol)) {
  echo '<div class="message-error">Lütfen tüm alanları doldurun!</div>';
  echo '<a class="link" href="giris.php">← Geri dön</a>';
  exit;
}

$stmt = $baglanti->prepare("SELECT id, adsoyad, email, sifre, rol, profil_foto FROM kullanicilar WHERE (adsoyad = ? OR email = ?) AND rol = ?");
$stmt->bind_param("sss", $girdi, $girdi, $rol);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $kullaniciBilgi = $result->fetch_assoc();

  if (password_verify($sifre, $kullaniciBilgi['sifre'])) {
    $_SESSION['user_id'] = $kullaniciBilgi['id'];
    $_SESSION['adsoyad'] = $kullaniciBilgi['adsoyad'];
    $_SESSION['email'] = $kullaniciBilgi['email'];
    $_SESSION['rol'] = $kullaniciBilgi['rol'];
    $_SESSION['profil_foto'] = $kullaniciBilgi['profil_foto'] ?? 'uploads/default-profile.png';

    header("Location: profil.php");
    exit;
  } else {
    echo '<div class="message-error">kullanıcı adı veya Şifre yanlış!</div>';
    echo '<a class="link" href="giris.php">← Geri dön</a>';
  }
} else {
  echo '<div class="message-error">Kullanıcı bulunamadı!</div>';
  echo '<a class="link" href="giris.php">← Geri dön</a>';
}
$_SESSION['profil_foto'] = $kullaniciBilgi['profil_foto'] ?? 'uploads/default-profile.png';



$stmt->close();
$baglanti->close();
?>

</main>
</body>
</html>
