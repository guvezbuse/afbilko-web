<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['rol'])) {
    header("Location: giris.php");
    exit;
}

if ($_SESSION['rol'] === 'afetzede') {
    header("Location: afetzede_profil.php");
} elseif ($_SESSION['rol'] === 'gönüllü') {
    header("Location: gonullu_profil.php");
} else {
    header("Location: giris.php");
}
exit;
