<?php
session_start();
require 'db.php';

// Giriş kontrolü ve rol doğrulama
if (!isset($_SESSION['user_id']) || ($_SESSION['rol'] ?? '') !== 'gönüllü') {
    header("Location: giris_yap.php");
    exit;
}

// Sadece POST isteği ile çalışsın
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adsoyad = trim($_POST['adsoyad'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $sifre = trim($_POST['sifre'] ?? '');

    if ($adsoyad === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Lütfen geçerli bir ad soyad ve email giriniz.";
        header("Location: gonullu_profil.php");
        exit;
    }

    try {
        if ($sifre !== '') {
            // Şifre güncellenecekse:
            $hashed = password_hash($sifre, PASSWORD_DEFAULT);
            $stmt = $db->prepare("UPDATE gonulluler SET adsoyad = :adsoyad, email = :email, sifre = :sifre WHERE id = :id");
            $stmt->execute([
                ':adsoyad' => $adsoyad,
                ':email' => $email,
                ':sifre' => $hashed,
                ':id' => $_SESSION['user_id']
            ]);
        } else {
            // Şifre boşsa sadece adsoyad ve email güncellenir
            $stmt = $db->prepare("UPDATE kullanicilar SET adsoyad = :adsoyad, email = :email WHERE id = :id");
            $stmt->execute([
                ':adsoyad' => $adsoyad,
                ':email' => $email,
                ':id' => $_SESSION['user_id']
            ]);
        }

        // Session güncelle:
        $_SESSION['adsoyad'] = htmlspecialchars($adsoyad, ENT_QUOTES, 'UTF-8');
        $_SESSION['email'] = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $_SESSION['success'] = "Bilgileriniz başarıyla güncellendi.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Veritabanı hatası: " . $e->getMessage();
    }

    header("Location: gonullu_profil.php");
    exit;
} else {
    header("Location: gonullu_profil.php");
    exit;
}
