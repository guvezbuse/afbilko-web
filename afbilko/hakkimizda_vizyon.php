<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vizyonumuz - AFBİLKO</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f7f9fc;
      color: #333;
    }

    header {
      background: #8e1616;
      color: white;
      padding: 40px 20px;
      text-align: center;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      padding: 20px;
    }

    .vision-text {
      margin: 30px 0;
      font-size: 18px;
      line-height: 1.6;
    }

    .vision-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
    }

    .card {
      flex: 1 1 300px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      padding: 20px;
      text-align: center;
    }

    .card i {
      font-size: 40px;
      color: #8e1616;
      margin-bottom: 10px;
    }

    blockquote {
      margin-top: 40px;
      font-style: italic;
      color: #555;
      border-left: 4px solid #1a73e8;
      padding-left: 15px;
    }

    footer {
      text-align: center;
      padding: 20px;
      color: #aaa;
      font-size: 14px;
    }
  </style>
</head>
<body>

<header>
  <h1>Vizyonumuz</h1>
  <p>Afetlere karşı bilinçli, dayanıklı ve dijitalleşmiş bir toplum inşa etmek.</p>
</header>

<div style="position: absolute; top: 20px; right: 20px; z-index: 10;">
  <a href="AFBİLKO.php" style="background-color: #8e1616; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Ana Sayfa</a>
</div>

<div class="container">
  <div class="vision-text">
    <p>
      AFBİLKO’nun vizyonu, afetler karşısında daha dirençli, organize ve bilinçli bir toplum oluşturmaktır. 
      Afet anlarında yaşanan bilgi karmaşasını önlemek, koordinasyonu kolaylaştırmak ve yardımları hızlıca yönlendirmek amacıyla 
      dijital teknolojileri etkili şekilde kullanmayı hedefliyoruz.
    </p>
    <p>
      Vizyonumuz; sürdürülebilir afet yönetim kültürünü benimseyen, gönüllülük esasına dayalı, veri odaklı bir yaklaşım ile 
      Türkiye genelinde afet bilincini artırmaktır.
    </p>
    <p>
      Gelecekte afetlere karşı hazırlıklı, organize ve dayanışma içinde hareket edebilen bir toplum için çalışıyoruz.
    </p>
  </div>

  <div class="vision-cards">
    <div class="card">
      <i class="fas fa-network-wired"></i>
      <h3>Dijitalleşme</h3>
      <p>Afet yönetiminde teknolojik çözümleri etkin biçimde kullanmak.</p>
    </div>
    <div class="card">
      <i class="fas fa-users-cog"></i>
      <h3>Toplum Direnci</h3>
      <p>Her bireyin afetler karşısında hazırlıklı ve bilinçli olmasını sağlamak.</p>
    </div>
    <div class="card">
      <i class="fas fa-globe"></i>
      <h3>Yaygın Etki</h3>
      <p>Gönüllü ağını genişleterek her bölgede erişilebilir destek sağlamak.</p>
    </div>
  </div>

  <blockquote>
    “Afet yönetimi sadece müdahale değil, önceden hazırlıklı olmaktır.”
  </blockquote>
</div>

<footer>
  &copy; <?php echo date("Y"); ?> AFBİLKO - Tüm Hakları Saklıdır.
</footer>

</body>
</html>
