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
    }
    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }
    input, select {
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
    }
  </style>
</head>
<body>

<header>Kayıt Ol</header>
<div style="position: absolute; top: 20px; right: 20px;">
  <a href="AFBİLKO.php" style="background-color: rgb(142, 22, 22); color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Ana Sayfa</a>
</div>

<main>
  <form action="kayit_et.php" method="post">
    <label for="adsoyad">Ad Soyad:</label>
    <input type="text" id="adsoyad" name="adsoyad" required>

    <label for="email">E-posta:</label>
    <input type="email" id="email" name="email" required>

    <label for="sifre">Şifre:</label>
    <input type="password" id="sifre" name="sifre" required>

    <label for="rol">Rol:</label>
    <select id="rol" name="rol" required>
      <option value="afetzede">Afetzede</option>
      <option value="gönüllü">Gönüllü</option>
    </select>

    <button type="submit">Kayıt Ol</button>
  </form>
  <a class="link" href="giris.php">Zaten hesabınız var mı? Giriş yap</a>
</main>

</body>
</html>