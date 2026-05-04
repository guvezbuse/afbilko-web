<?php
session_start();

// Oturum verilerini temizle
$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Çıkış Yapıldı</title>
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

  <header>Çıkış Yapıldı</header>

  <main>
    <span class="basarili">✅ Başarıyla çıkış yaptınız</span>
    <br><br>
    <a href="giris.php" class="geri-link">← Giriş Yap</a>
  </main>
</body>
</html>
