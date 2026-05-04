<?php
session_start();

// Kullanıcı giriş yapmadıysa veya rolü gönüllü değilse erişemez
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'gönüllü') {
    echo '<!DOCTYPE html>
    <html lang="tr">
    <head><meta charset="UTF-8"><title>Erişim Reddedildi</title></head>
    <body style="font-family:Arial; background-color:#f9f9f9; padding:30px; text-align:center;">
      <div style="max-width:500px; margin:auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color:#8e1616;">Erişim Reddedildi</h2>
        <p>Bu sayfaya erişmek için lütfen <strong>gönüllü girişi</strong> yapınız.</p>
        <a href="giris.php" style="display:inline-block; margin-top:20px; background:#8e1616; color:#fff; padding:10px 20px; text-decoration:none; border-radius:5px;">Giriş Yap</a>
      </div>
    </body>
    </html>';
    exit;
}

include 'db_connect.php';

$il = $_GET['il'] ?? '';
$yardim_turu = $_GET['yardim_turu'] ?? '';

$sql = "SELECT * FROM yardim_talepleri WHERE 1=1";

if ($il !== '') {
    $il_safe = mysqli_real_escape_string($conn, $il);
    $sql .= " AND il = '$il_safe'";
}

if ($yardim_turu !== '') {
    $yardim_safe = mysqli_real_escape_string($conn, $yardim_turu);
    $sql .= " AND yardim_turu = '$yardim_safe'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Yardım Talepleri</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f9f9f9;
    }

    h2 {
      color: #8e1616;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }

    select, button {
      padding: 8px 12px;
      font-size: 16px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      background-color: #8e1616;
      color: white;
      cursor: pointer;
      border: none;
    }

    button:hover {
      background-color: #a82020;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .karsilandi {
      background-color: #d4edda;
    }

    .karsilandi td {
      color: #155724;
    }

    .no-data {
      text-align: center;
      color: #666;
      padding: 20px;
    }

    form button[type="submit"] {
      padding: 6px 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div style="position: absolute; top: 20px; right: 20px;">
  <a href="AFBİLKO.php" style="background-color: rgb(142, 22, 22); color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Ana Sayfa</a>
</div>


  <h2>Yardım Talepleri</h2>

  <form method="get" action="yardim_talepleri_filtreleme.php">
    <select name="il">
      <option value="">İl (Tümü)</option>
      <option value="Ankara" <?= $il === 'Ankara' ? 'selected' : '' ?>>Ankara</option>
      <option value="İstanbul" <?= $il === 'İstanbul' ? 'selected' : '' ?>>İstanbul</option>
      <option value="İzmir" <?= $il === 'İzmir' ? 'selected' : '' ?>>İzmir</option>
      <option value="Eskişehir" <?= $il === 'Eskişehir' ? 'selected' : '' ?>>Eskişehir</option>
      <option value="Bartın" <?= $il === 'Bartın' ? 'selected' : '' ?>>Bartın</option>
    </select>

    <select name="yardim_turu">
      <option value="">Yardım Türü (Tümü)</option>
      <option value="Barınma" <?= $yardim_turu === 'Barınma' ? 'selected' : '' ?>>Barınma</option>
      <option value="Gıda" <?= $yardim_turu === 'Gıda' ? 'selected' : '' ?>>Gıda</option>
      <option value="Sağlık" <?= $yardim_turu === 'Sağlık' ? 'selected' : '' ?>>Sağlık</option>
      <option value="Giysi" <?= $yardim_turu === 'Giysi' ? 'selected' : '' ?>>Giysi</option>
      <option value="Kurtarma" <?= $yardim_turu === 'Kurtarma' ? 'selected' : '' ?>>Kurtarma</option>
      <option value="Diğer" <?= $yardim_turu === 'Diğer' ? 'selected' : '' ?>>Diğer</option>
    </select>

    <button type="submit">Filtrele</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>Yardım Türü</th>
        <th>İl</th>
        <th>Adres</th>
        <th>Açıklama</th>
        <th>Tarih</th>
        <th>Durum</th>
        <th>İşlem</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr class="<?= $row['durum'] === 'Karşılandı' ? 'karsilandi' : '' ?>">
            <td><?= htmlspecialchars($row['yardim_turu']) ?></td>
            <td><?= htmlspecialchars($row['il']) ?></td>
            <td><?= htmlspecialchars($row['konum']) ?></td> <!-- ADRES -->
            <td><?= htmlspecialchars($row['aciklama']) ?></td>
            <td><?= htmlspecialchars($row['tarih']) ?></td>
            <td><?= htmlspecialchars($row['durum'] ?? 'Bekleniyor') ?></td>
            <td>
              <?php if ($row['durum'] === 'Bekleniyor' || empty($row['durum'])): ?>
                <form method="post" action="yardim_karsilandi.php" style="margin:0;">
                  <input type="hidden" name="talep_id" value="<?= (int)$row['id'] ?>">
                  <button type="submit">Karşılandı</button>
                </form>
              <?php else: ?>
                ✔
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="7" class="no-data">Filtreye uygun yardım talebi bulunamadı.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

</body>
</html>
