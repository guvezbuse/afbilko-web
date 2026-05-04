<!DOCTYPE html>
<html lang="tr-TR">
<head>
  <meta charset="UTF-8" />
  <title>AFBİLKO - Ana Sayfa</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .top-bar {
      background-color: #8e1616;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 20px;
      font-family: sans-serif;
      font-size: 10px;
      height: 15px;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 10;
    }

    .top-bar-right {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 10px;
      margin-left: auto;
    }

    .top-bar a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

.bayrak-ataturk {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 0;
 
}

.bayrak-ataturk img {
  width: 45px;
  height: 25px;
  object-fit: contain;
  margin: 0;
  left: -5px;
}

.bayrak-ataturk img + img {
  margin-left: -25px; 
  position: relative;
}



    body {
      margin: 0;
      font-family: 'Segoe UI', serif;
      background-color: #f5f5f5;
    }

    .background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('Görseller/harita.jpeg');
      background-size: cover;
      background-position: center;
      z-index: -1;
    }

    header {
      display: flex;
      align-items: center;
      padding: 10px 20px;
      background-color: rgba(255, 255, 255, 0.85);
      margin-top: 30px; 
    }

    header img {
      width: 80px;
      height: 80px;
      margin-right: 20px;
    }

    header h1 {
      color: rgb(142, 22, 22);
      font-size: 36px;
      margin: 0;
    }

    nav {
      background-color: rgba(142, 22, 22, 0.95);
      display: flex;
      flex-wrap: wrap;
      padding: 0 60px;
    }

    nav .menu-item {
      position: relative;
    }

    nav a {
      display: block;
      padding: 20px 30px;
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 17px;
    }

    nav a:hover {
      background-color: #8a1a1a;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: rgba(142, 22, 22, 0.95);
      min-width: 200px;
      z-index: 1;
      top: 100%;
      left: 0;
    }

    .dropdown-content a {
      padding: 15px 20px;
      font-size: 16px;
    }

    .menu-item:hover .dropdown-content {
      display: block;
    }

    main {
      padding: 60px 100px;
    }

    .section-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      background: transparent;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .info-box {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .info-box:hover {
      transform: translateY(-5px);
    }

    .info-box img {
      width: 64px;
      height: 64px;
      margin-bottom: 15px;
    }

    .info-box h3 {
      color: #8e1616;
      margin-bottom: 10px;
    }

    .info-box p {
      font-size: 16px;
      line-height: 1.5;
      color: #333;
    }

    .info-box a {
      display: inline-block;
      margin-top: 10px;
      color: #8e1616;
      font-weight: bold;
      text-decoration: none;
    }

    .info-box a:hover {
      text-decoration: underline;
    }

    /* Yeni eklenen bölümler */
    section.full-width {
      background:#fff5f5;
      padding: 20px;
      margin-top: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      grid-column: 1 / -1;
      color: #333;
    }

    section.full-width h2 {
      color: #8e1616;
      margin-bottom: 15px;
    }

    section.full-width ul {
      list-style:none;
      padding-left:0;
    }

    section.full-width ul li {
      margin-bottom: 8px;
    }

    section.full-width a {
      color: #8e1616;
      font-weight: bold;
      text-decoration: none;
    }

    section.full-width a:hover {
      text-decoration: underline;
    }

    section.full-width article {
      margin-bottom: 15px;
      border-left: 5px solid #8e1616;
      padding-left: 15px;
    }

    section.full-width dl dt {
      font-weight: bold;
      margin-top: 15px;
    }

    section.full-width dl dd {
      margin-left: 15px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="top-bar">
    <div class="top-bar-right">
      <a href="https://www.turkiye.gov.tr" target="_blank">e-Devlet ↗</a>
      <a href="https://www.icisleri.gov.tr" target="_blank">İçişleri Bakanlığı ↗</a>
      

      <div class="bayrak-ataturk">
        <img src="Görseller/bayrak.png" alt="Bayrak" />
        <img src="Görseller/ataturk.png" alt="Atatürk" />
      </div>
    </div>
  </div>

  <div class="background"></div>

  <header>
    <img src="Görseller/logo22.png" alt="logo" />
    <h1>AFBİLKO</h1>
  </header>

  <nav>
    <div class="menu-item">
      <a href="#">AFETLER ▼</a>
      <div class="dropdown-content">
        <a href="afetler_deprem.html" target="_blank">Deprem</a>
        <a href="afetler_yangın.html" target="_blank">Yangın</a>
        <a href="afetler_sel.html" target="_blank">Sel</a>
        <a href="afetler_heyelan.html" target="_blank">Heyelan</a>
      </div>
    </div>
    <div class="menu-item">
      <a href="#">YARDIM TALEP ▼</a>
      <div class="dropdown-content">
        <a href="yardim_talep_formu.php" target="_blank">Yardım Formu</a>
      </div>
    </div>
    <div class="menu-item">
      <a href="#">GÖNÜLLÜLÜK ▼</a>
      <div class="dropdown-content">
        <a href="yardim_talepleri_filtreleme.php" target="_blank">Yardım Talepleri</a>
      </div>
    </div>
    <div class="menu-item">
      <a href="#">TOPLANMA ALANLARI ▼</a>
      <div class="dropdown-content">
        <a href="toplanma_alanlari.html" target="_blank">Harita</a>
      </div>
    </div>
    <div class="menu-item">
      <a href="#">GİRİŞ/KAYIT ▼</a>
      <div class="dropdown-content">
        <a href="giris.php" target="_blank">Giriş Yap</a>
        <a href="kayit.php" target="_blank">Yeni Kayıt</a>
      </div>
    </div>
    <div class="menu-item">
      <a href="#">HAKKIMIZDA ▼</a>
      <div class="dropdown-content">
        <a href="hakkimizda_misyon.php">Misyon</a>
        <a href="hakkimizda_vizyon.php">Vizyon</a>
      </div>
    </div>
    <div class="menu-item">
  <a href="#"><i class="fas fa-user-circle"></i> PROFİL ▼</a>
  <div class="dropdown-content">
    <a href="profilim.php">Profilim</a>
    <a href="cikis.php">Çıkış Yap</a>
  </div>
</div>
  </nav>

  <main>
    <div class="section-grid">
      <div class="info-box">
        <img src="Görseller/logo22.png" alt="AFBİLKO Nedir" />
        <h3>AFBİLKO Nedir?</h3>
<p>Afet Bilgilendirme ve Koordinasyon Sistemi ile yardım ve gönüllülük hızlı şekilde organize edilir.</p>
<a href="anasayfa_afbilko_nedir.php">Devamını oku →</a>
</div>

  <div class="info-box">
    <img src="Görseller/afet.jpeg" alt="Afet Bilinci" />
    <h3>Afet Bilinci</h3>
    <p>Afet öncesinde, sırasında ve sonrasında bilinçli hareket etmek hayat kurtarır. Hazırlıklı toplum daha güçlüdür.</p>
    <a href="anasayfa_afet_bilinci.php">Devamını oku →</a>
  </div>

  <div class="info-box">
    <img src="Görseller/yardımlaşmaa.jpg" alt="Yardımlaşma" />
    <h3>Yardımlaşma</h3>
    <p>Birlikte hareket etmek, kriz zamanlarında güveni ve dayanışmayı artırır. El uzatmak umut olur.</p>
    <a href="anasayfa_yardimlasma.php">Devamını oku →</a>
  </div>

  <div class="info-box">
    <img src="Görseller/gönüllülük.jpg" alt="Gönüllülük" />
    <h3>Gönüllülük</h3>
    <p>Gönüllü olmak topluma destek vermek demektir. Sen de destek ol, fark yarat.</p>
    <a href="anasayfa_gonulluluk.php">Devamını oku →</a>
  </div>

  <div class="info-box">
    <img src="Görseller/psikolojikdestek.jpeg" alt="Psikolojik Destek" />
    <h3>Psikolojik Destek</h3>
    <p>Afet sonrası stresle başa çıkma yöntemleri...</p>
    <a href="anasayfa_psikolojik_destek.php">Devamını oku →</a>
  </div>

  <div class="info-box">
    <img src="Görseller/afet_cantasipng.png" alt="Afet Çantası" />
    <h3>Afet çantası nasıl hazırlanır?</h3>
    <p>Afet anında gerekli temel malzemelerin listesini öğrenin.</p>
    <a href="anasayfa_afet_cantasi.php">Devamını oku →</a>
  </div>
</div>
</main> 
</body>
</html>