<?php
$host = "localhost";
$kullanici = "root";
$sifre = "";
$veritabani = "afbilko"; 

$conn = mysqli_connect($host, $kullanici, $sifre, $veritabani);

if (!$conn) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
}
?>
