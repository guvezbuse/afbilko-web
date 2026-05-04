<?php
session_start();

// Giriş ve rol kontrolü
if (!isset($_SESSION['user_id']) || ($_SESSION['rol'] ?? '') !== 'afetzede') {
    header("Location: giris_yap.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  
  <meta charset="UTF-8" />
  <title>Afetzede Profili</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff;
      background-image: url('img/yardim-arka.jpg');
      background-size: cover;
      background-position: center;
      width: 100%;
      height: 100%;
    }
    .container {
      max-width: 700px;
      margin: 40px auto;
      background: rgba(255, 255, 255, 0.95);
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    header {
      background-color: rgb(142, 22, 22);
      color: white;
      padding: 20px 30px;
      font-size: 28px;
      text-align: center;
      border-radius: 12px 12px 0 0;
      margin-bottom: 30px;
    }
    h2, h3 {
      color: rgb(142, 22, 22);
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      color: #333;
    }
    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
      box-sizing: border-box;
    }
    input[type="file"] {
  display: none;
    }

    button {
      margin-top: 25px;
      background-color: rgb(142, 22, 22);
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #a61717;
    }
    .tab-buttons {
      display: flex;
      gap: 12px;
      margin-bottom: 25px;
      justify-content: center;
    }
    .tab-btn {
      padding: 12px 25px;
      cursor: pointer;
      background-color: #ddd;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 15px;
    }
    .tab-btn.active {
      background-color: rgb(142, 22, 22);
      color: white;
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
      animation: fadeIn 0.5s ease forwards;
    }
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    .info div {
      margin-bottom: 8px;
      font-size: 16px;
      color: #444;
    }
    .logout {
      display: inline-block;
      margin-top: 30px;
      background: rgb(142, 22, 22);
      color: white;
      padding: 12px 25px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
    }
    .profile-photo {
      text-align: center;
      margin-bottom: 25px;
    }
    .profile-photo img {
      width: 130px;
      height: 130px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid rgb(142, 22, 22);
    }
    .photo-upload {
      margin-top: 10px;
      text-align: center;
    }
    .photo-upload input[type="file"] {
      font-size: 14px;
      cursor: pointer;
    }
    .message {
      margin-bottom: 15px;
      font-weight: 600;
      color: green;
      text-align: center;
    }
    .error-message {
      color: red;
    }
  </style>
</head>

<div style="position: absolute; top: 20px; left: 20px;">
  <a href="yardim_talep_formu.php" style="background-color: rgb(142, 22, 22); color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Talep Oluştur</a>
</div>

<div style="position: absolute; top: 20px; right: 20px;">
  <a href="AFBİLKO.php" style="background-color: rgb(142, 22, 22); color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Ana Sayfa</a>
</div>

<body>

  <div class="container">
    <header>Afetzede Profili</header>

    <?php if (isset($_SESSION['success'])): ?>
      <div class="message"><?= htmlspecialchars($_SESSION['success']) ?></div>
      <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
      <div class="message error-message"><?= htmlspecialchars($_SESSION['error']) ?></div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="profile-photo">
      <img src="<?= htmlspecialchars($_SESSION['profil_foto'] ?? 'img/default-profile.png') ?>" alt="Profil Fotoğrafı" id="profilFoto">
      <form action="foto_yukle.php" method="post" enctype="multipart/form-data" class="photo-upload">
      <label for="profilInput" class="custom-upload-button">📷 Fotoğraf Yükle</label>
     <input type="file" id="profilInput" name="profil_foto" accept="image/*" onchange="this.form.submit()">
    </form>

    </div>

    <h2>Kullanıcı Bilgileri</h2>
    <div class="info">
      <label>Ad Soyad:</label>
      <div><?= htmlspecialchars($_SESSION['adsoyad'] ?? '') ?></div>

      <label>Email:</label>
      <div><?= htmlspecialchars($_SESSION['email'] ?? '') ?></div>

      <label>Rol:</label>
      <div><?= htmlspecialchars($_SESSION['rol'] ?? '') ?></div>
    </div>

    <div class="tab-buttons">
      <button class="tab-btn active" data-tab="bilgi">Bilgi Güncelleme</button>
      <button class="tab-btn" data-tab="sifre">Şifre Değiştirme</button>
      <button class="tab-btn" data-tab="yardim">Yardım Geçmişi</button>
    </div>

    <div id="bilgi" class="tab-content active">
      <h3>Bilgi Güncelleme</h3>
      <form action="afetzede_bilgi_guncelle.php" method="post">
        <label for="adsoyad">Ad Soyad</label>
        <input type="text" id="adsoyad" name="adsoyad" value="<?= htmlspecialchars($_SESSION['adsoyad'] ?? '') ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>" required>

        <button type="submit">Güncelle</button>
      </form>
    </div>

    <div id="sifre" class="tab-content">
      <h3>Şifre Değiştirme</h3>
      <form action="afetzede_sifre_guncelle.php" method="post">
        <label for="eski_sifre">Eski Şifre</label>
        <input type="password" id="eski_sifre" name="eski_sifre" required>

        <label for="yeni_sifre">Yeni Şifre</label>
        <input type="password" id="yeni_sifre" name="yeni_sifre" required>

        <label for="yeni_sifre_tekrar">Yeni Şifre (Tekrar)</label>
        <input type="password" id="yeni_sifre_tekrar" name="yeni_sifre_tekrar" required>

        <button type="submit">Şifreyi Değiştir</button>
      </form>
    </div>

<div id="yardim" class="tab-content">
  <h3>Yardım Geçmişi</h3>
 
  <?php
  // Veritabanına bağlantı
  $baglanti = new mysqli("localhost", "root", "", "afbilko");
  if ($baglanti->connect_error) {
      echo "<p style='color:red;'>Bağlantı hatası: " . $baglanti->connect_error . "</p>";
  } else {
      $afetzede_id = $_SESSION['user_id'];
      $stmt = $baglanti->prepare("SELECT yardim_turu, il, konum, aciklama, tarih, karsilama_tarihi FROM yardim_talepleri WHERE user_id = ? ORDER BY tarih DESC");
      $stmt->bind_param("i", $afetzede_id);
      $stmt->execute();
      $sonuc = $stmt->get_result();

      if ($sonuc->num_rows > 0) {
          echo "<table style='width:100%; border-collapse: collapse;'>";
          echo "<tr style='background-color:#f2f2f2;'>
                  <th style='border:1px solid #ccc; padding:8px;'>Yardım Türü</th>
                  <th style='border:1px solid #ccc; padding:8px;'>İl</th>
                  <th style='border:1px solid #ccc; padding:8px;'>Adres</th>
                  <th style='border:1px solid #ccc; padding:8px;'>Açıklama</th>
                  <th style='border:1px solid #ccc; padding:8px;'>Talep Tarihi</th>
                  <th style='border:1px solid #ccc; padding:8px;'>Talep Karşılanma Tarihi</th>
                </tr>";

          while ($row = $sonuc->fetch_assoc()) {
              echo "<tr>
                      <td style='border:1px solid #ccc; padding:8px;'>" . htmlspecialchars($row['yardim_turu']) . "</td>
                      <td style='border:1px solid #ccc; padding:8px;'>" . htmlspecialchars($row['il']) . "</td>
                      <td style='border:1px solid #ccc; padding:8px;'>" . htmlspecialchars($row['konum']) . "</td>
                      <td style='border:1px solid #ccc; padding:8px;'>" . htmlspecialchars($row['aciklama']) . "</td>
                      <td style='border:1px solid #ccc; padding:8px;'>" . htmlspecialchars($row['tarih']) . "</td>
                      <td style='border:1px solid #ccc; padding:8px;'>" . 
                         (!empty($row['karsilama_tarihi']) ? htmlspecialchars($row['karsilama_tarihi']) : 'Bekleniyor.') . "</td>
                    </tr>";
          }
          echo "</table>";
      } else {
          echo "<p>Yardım talebiniz bulunmamaktadır.</p>";
      }

      $stmt->close();
      $baglanti->close();
  }
  ?>
  
</div>
    <a href="cikis.php" class="logout">Çıkış Yap</a>
  </div>

  <script>
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        if (button.disabled) return;
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));
        button.classList.add('active');
        const tab = button.getAttribute('data-tab');
        document.getElementById(tab).classList.add('active');
      });
    });
  </script>
 </body>
</html>
