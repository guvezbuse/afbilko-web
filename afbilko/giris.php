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
    }
    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    /* Radio buttonlar için özel stil */
    .role-options {
      margin-top: 10px;
      display: flex;
      gap: 20px;
    }
    .role-options label {
      font-weight: normal;
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
      font-size: 14px;
    }
    input[type="radio"] {
      cursor: pointer;
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

<header>Giriş Yap</header>
<div style="position: absolute; top: 20px; right: 20px;">
  <a href="AFBİLKO.php" style="background-color: rgb(142, 22, 22); color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Ana Sayfa</a>
</div>

<main>
  
  <form action="giris_yap.php" method="post">

<label for="girdi">Kullanıcı Adı veya E-posta:</label>
<input type="text" id="girdi" name="girdi" required>


    <label for="sifre">Şifre:</label>
    <input type="password" id="sifre" name="sifre" required>

    <label>Rol Seçiniz:</label>
    <div class="role-options">
      <label><input type="radio" name="rol" value="afetzede"> afetzede</label>
      <label><input type="radio" name="rol" value="gönüllü"> gönüllü</label>
    </div>

    <button type="submit">Giriş Yap</button>
  </form>
  <a class="link" href="kayit.php">Hesabınız yok mu? Kayıt olun</a>
</main>

</body>
</html>