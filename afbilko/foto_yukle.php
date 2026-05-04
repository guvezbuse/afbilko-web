<?php
session_start();
require 'db.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: giris_yap.php");
    exit;
}

if (isset($_FILES['profil_foto']) && $_FILES['profil_foto']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $tmpName = $_FILES['profil_foto']['tmp_name'];
    $fileName = basename($_FILES['profil_foto']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExt, $allowedExts)) {
       
        $newFileName = $_SESSION['user_id'] . '_' . time() . '.' . $fileExt;
        $destination = $uploadDir . $newFileName;

        if (move_uploaded_file($tmpName, $destination)) {
            
            $stmt = $db->prepare("UPDATE kullanicilar SET profil_foto = :profil_foto WHERE id = :id");
            $stmt->execute([
                ':profil_foto' => $destination,
                ':id' => $_SESSION['user_id']
            ]);

            
            $_SESSION['profil_foto'] = $destination;
            $_SESSION['success'] = "Fotoğraf başarıyla yüklendi.";
        } else {
            $_SESSION['error'] = "Fotoğraf yüklenirken bir hata oluştu.";
        }
    } else {
        $_SESSION['error'] = "Sadece JPG, PNG ve GIF formatları yüklenebilir.";
    }
} else {
    $_SESSION['error'] = "Fotoğraf seçilmedi veya yüklenirken hata oluştu.";
}

header("Location: profil.php"); 
exit;
