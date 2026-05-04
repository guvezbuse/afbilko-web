<?php
session_start();

// Eğer kullanıcı giriş yapmamışsa ya da afetzede değilse erişemez
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'afetzede') {
    echo '<!DOCTYPE html>
    <html lang="tr">
    <head><meta charset="UTF-8"><title>Erişim Reddedildi</title></head>
    <body style="font-family:Arial; background-color:#f9f9f9; padding:30px; text-align:center;">
      <div style="max-width:500px; margin:auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color:#8e1616;">Erişim Reddedildi</h2>
        <p>Bu sayfaya yalnızca <strong>afetzede</strong> girişi yapan kullanıcılar erişebilir.</p>
        <a href="giris.php" style="display:inline-block; margin-top:20px; background:#8e1616; color:#fff; padding:10px 20px; text-decoration:none; border-radius:5px;">Giriş Yap</a>
      </div>
    </body>
    </html>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Yardım Talep Formu - AFBİLKO</title>
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
    main {
      padding: 40px;
      max-width: 600px;
      margin: auto;
      background: rgba(255,255,255,0.9);
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      color: rgb(142, 22, 22);
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input, select, textarea {
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
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
    }
    button:hover {
      background-color: #a61717;
    }
  </style>
</head>
<body>
  <div style="position: absolute; top: 20px; right: 20px;">
  <a href="AFBİLKO.php" style="background-color: rgb(142, 22, 22); color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Ana Sayfa</a>
</div>

  <div class="arkaplan"></div>
  <header>Yardım Talep Formu</header>
  <main>
    <h2>Lütfen aşağıdaki formu doldurun</h2>
    <form action="yardim_kaydet.php" method="post">
      <label for="adsoyad">Ad Soyad:</label>
      <input type="text" id="adsoyad" name="adsoyad" required>

      <label for="telefon">Telefon:</label>
      <input type="tel" id="telefon" name="telefon" required>

      <label for="konum">Adres:</label>
      <input type="text" id="konum" name="konum" required>

      <label for="yardim_turu">Yardım Türü:</label>
      <select id="yardim_turu" name="yardim_turu" required>
        <option value="">Seçiniz</option>
        <option value="Barınma">Barınma</option>
        <option value="Gıda">Gıda</option>
        <option value="Sağlık">Sağlık</option>
        <option value="Kurtarma">Kurtarma</option>
        <option value="Diğer">Diğer</option>
      </select>

      <label for="il">İl:</label>
      <select id="il" name="il" required>
        <option value="">Seçiniz</option>
        <option value="Ankara">Ankara</option>
        <option value="Bartın">Bartın</option>
        <option value="İstanbul">İstanbul</option>
        <option value="izmir">İzmir</option>
        <option value="Eskişehir">Eskişehir</option>
        <option value="Diğer">Diğer</option>
      </select>

      <label for="aciklama">Açıklama:</label>
      <textarea id="aciklama" name="aciklama" rows="4"></textarea>

      <button type="submit">Talep Gönder</button>
    </form>
  </main>
</body>
</html>