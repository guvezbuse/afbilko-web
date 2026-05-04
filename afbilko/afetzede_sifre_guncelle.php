<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || ($_SESSION['rol'] ?? '') !== 'afetzede') {
    header("Location: giris_yap.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eski_sifre = $_POST['eski_sifre'] ?? '';
    $yeni_sifre = $_POST['yeni_sifre'] ?? '';
    $yeni_sifre_tekrar = $_POST['yeni_sifre_tekrar'] ?? '';

    if ($yeni_sifre !== $yeni_sifre_tekrar) {
        $_SESSION['error'] = "Yeni şifreler uyuşmuyor.";
        header("Location: afetzede_profil.php");
        exit;
    }

    if (strlen($yeni_sifre) < 6) {
        $_SESSION['error'] = "Yeni şifre en az 6 karakter olmalı.";
        header("Location: afetzede_profil.php");
        exit;
    }

    // Kullanıcının mevcut hashlenmiş şifresini çek (sifre sütunu: sifre)
    $stmt = $db->prepare("SELECT sifre FROM kullanicilar WHERE id = :id");
    $stmt->execute([':id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($eski_sifre, $user['sifre'])) {
        $_SESSION['error'] = "Eski şifre yanlış.";
        header("Location: afetzede_profil.php");
        exit;
    }

    // Yeni şifreyi hashle
    $yeni_sifre_hash = password_hash($yeni_sifre, PASSWORD_DEFAULT);

    // Veritabanında şifreyi güncelle (şifre sütunu: sifre)
    $update_stmt = $db->prepare("UPDATE kullanicilar SET sifre = :sifre WHERE id = :id");
    $update_stmt->execute([
        ':sifre' => $yeni_sifre_hash,
        ':id' => $_SESSION['user_id']
    ]);

    $_SESSION['success'] = "Şifre başarıyla güncellendi.";
    header("Location: afetzede_profil.php");
    exit;
}
?>