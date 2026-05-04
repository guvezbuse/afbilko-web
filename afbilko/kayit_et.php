<?php
$baglanti = new mysqli("localhost", "root", "", "afbilko");
if ($baglanti->connect_error) {
  die('<div class="message-error">Bağlantı hatası: ' . htmlspecialchars($baglanti->connect_error) . '</div>');
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8" />
<title>Kayıt Ol - AFBİLKO</title>
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
  label {
    font-weight: bold;
    display: block;
    margin-top: 15px;
  }
  input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 8px;
    border: 1px solid #ccc;
  }
  button {
    margin-top: 20px;
    background-color: rgb(142, 22, 22);
    color: white;
    padding: 10px 20px;
    border: none;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
  }
  button:hover {
    background-color: #a61717;
  }
  .link {
    margin-top: 15px;
    display: block;
    text-align: center;
    color: rgb(142, 22, 22);
    font-weight: 600;
    text-decoration: none;
  }
  .link:hover {
    text-decoration: underline;
  }
  .message-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 15px;
  }
  .message-error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 15px;
  }
</style>
</head>
<body>

<header>Kayıt Ol</header>

<main>

<?php

$adsoyad = $_POST['adsoyad'] ?? '';
$email = $_POST['email'] ?? '';
$sifre = $_POST['sifre'] ?? '';
$rol = $_POST['rol'] ?? 'afetzede';

// Alanların boş olup olmadığını kontrolü
if (!$adsoyad || !$email || !$sifre) {
  echo '<div class="message-error">Lütfen tüm zorunlu alanları doldurun!</div>';
  echo '<a class="link" href="kayit.php">← Geri dön</a>';
  exit;
}

// Aynı e-posta ve rol kombinasyonu zaten kayıtlı mı diye bakıyoruz
$stmt = $baglanti->prepare("SELECT id FROM kullanicilar WHERE email = ? AND rol = ?");
$stmt->bind_param("ss", $email, $rol);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
  echo '<div class="message-error">Bu e-posta ve rol kombinasyonu zaten kayıtlı!</div>';
  echo '<a class="link" href="kayit.php">← Geri dön</a>';
  exit;
}
$stmt->close();

// Şifreyi güvenli hale getirmek için hashledik
$sifreHash = password_hash($sifre, PASSWORD_DEFAULT);

// Kullanıcıyı kaydetme:
$stmt = $baglanti->prepare("INSERT INTO kullanicilar (adsoyad, email, sifre, rol) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $adsoyad, $email, $sifreHash, $rol);

if ($stmt->execute()) {
  echo '<div class="message-success">Kayıt başarılı! Giriş yapabilirsiniz.</div>';
  echo '<a class="link" href="giris.php">→ Giriş sayfasına git</a>';
} else {
  echo '<div class="message-error">Kayıt sırasında hata oluştu: ' . htmlspecialchars($stmt->error) . '</div>';
  echo '<a class="link" href="kayit.php">← Geri dön</a>';
}

$stmt->close();
$baglanti->close();
?>

</main>

</body>
</html>