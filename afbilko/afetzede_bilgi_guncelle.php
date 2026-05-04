<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || ($_SESSION['rol'] ?? '') !== 'afetzede') {
    header("Location: giris_yap.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adsoyad = trim($_POST['adsoyad'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($adsoyad === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Lütfen geçerli bir ad soyad ve email giriniz.";
        header("Location: afetzede_profil.php");
        exit;
    }

    try {
        $stmt = $db->prepare("UPDATE kullanicilar SET adsoyad = :adsoyad, email = :email WHERE id = :id");
        $stmt->execute([
            ':adsoyad' => $adsoyad,
            ':email' => $email,
            ':id' => $_SESSION['user_id']
        ]);
        $_SESSION['adsoyad'] = htmlspecialchars($adsoyad, ENT_QUOTES, 'UTF-8');
        $_SESSION['email'] = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

        $_SESSION['success'] = "Bilgileriniz başarıyla güncellendi.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Veritabanı hatası: " . $e->getMessage();
    }

    header("Location: afetzede_profil.php");
    exit;
} else {
    header("Location: afetzede_profil.php");
    exit;
}
?>