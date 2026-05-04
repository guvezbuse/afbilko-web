<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: giris.php");
    exit;
}

$rol = $_SESSION['rol'] ?? '';

if ($rol == 'afetzede') {
    header("Location: afetzede_profil.php");
    exit;
} elseif ($rol == 'gönüllü') {
    header("Location: gonullu_profil.php");
    exit;
} else {
    echo "Rol tanımlı değil.";
}