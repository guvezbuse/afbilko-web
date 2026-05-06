-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Haz 2025, 11:26:37
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `afbilko`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `profil_foto` varchar(255) DEFAULT NULL,
  `adsoyad` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sifre` varchar(100) NOT NULL,
  `rol` enum('afetzede','gönüllü','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `profil_foto`, `adsoyad`, `email`, `sifre`, `rol`) VALUES
(1, NULL, 'Hatice Duran', 'haticedrnn34@gmail.com', '$2y$10$hDt7pqayaRneIYnNRy2.L.khy4KaXgvNlHwprMT3Xg8ZYIwfSbfcS', 'afetzede'),
(2, NULL, 'buse güvez', 'haticedrnn34@gmail.com', '$2y$10$RZAsLUI.d8lYCNn5mtA3RuSLPoVi9FWSB7.Ydpdcfsyzehj3ilzqS', 'gönüllü'),
(3, NULL, 'satuk buğra', 'satukbugra@gmail.com', '$2y$10$eHJOXpv3zYt6EIcUr5Kxq.9WDoC9FkDRkYWg.4HJmN//U7lU.CKOm', 'afetzede'),
(4, NULL, 'selin bostancı', 'selinbostanci@gmail.com', '$2y$10$26Chv6V9wodrEobxYXcks.z/uU/iNMBma6ebgm.QGqskM3NA9Jh7q', 'gönüllü'),
(5, NULL, 'Ali Buğra Kaya', 'alibugrakaya@gmail.com', '$2y$10$GagiybHO5xnG/8LzijiwUe7fAOLRKSWm/gC120bd5N9ZjdOUWXvAC', 'afetzede'),
(6, NULL, 'Elif Ece Duran', 'elif@gmail.com', '$2y$10$kDOu28otwNw/udosT8eH8OF4kJdPo8MaIkq7BVWwFi3vysXUj7qO.', 'gönüllü'),
(7, NULL, 'Kıvanç Tatlıtuğ', 'kivanctatlitug@gmail.com', '$2y$10$xs6b8reNnPbExZPwDV2K/O5CGRpvBqWM.p0v8DTVJFbnnViRP0Uyi', 'gönüllü'),
(8, NULL, 'Halil İbrahim Çakırca', 'ibrahimhalil@gmail.com', '$2y$10$yoRkv2U11GbsTnA7T4zZK.RgHUv8hTISbRMPeErW7kftjXN8rF/p2', 'afetzede'),
(9, NULL, 'Buse güvez', 'buseguvez@gmail.com', '$2y$10$b3FlBChKNn9tXsbjJdzSV.9kMYXzM6eastAfajYGQhNmvJKopYV32', 'afetzede'),
(10, NULL, 'selin bostancı', 'selin12bostanci@gmail.com', '$2y$10$7ECStcf039vTa334CEgf8uF.jNRPnq7MM6zRVpyeiWEBKthqzDjWe', 'afetzede');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yardim_talepleri`
--

CREATE TABLE `yardim_talepleri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adsoyad` varchar(50) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `konum` varchar(100) NOT NULL,
  `il` varchar(20) NOT NULL,
  `yardim_turu` varchar(20) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `aciklama` varchar(100) NOT NULL,
  `durum` varchar(20) NOT NULL DEFAULT 'Bekleniyor',
  `islem` varchar(100) DEFAULT NULL,
  `karsilayan_gonullu_id` int(11) DEFAULT NULL,
  `karsilama_tarihi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yardim_talepleri`
--

INSERT INTO `yardim_talepleri` (`id`, `user_id`, `adsoyad`, `telefon`, `konum`, `il`, `yardim_turu`, `tarih`, `aciklama`, `durum`, `islem`, `karsilayan_gonullu_id`, `karsilama_tarihi`) VALUES
(1, 1, 'Hatice Duran', '78204020', 'Tuzla', 'İstanbul', 'Barınma', '2025-05-28 10:50:04', '', 'Karşılandı', '', 2, '2025-05-28 11:50:36'),
(2, 3, 'satuk buğra', '555555555', 'pınarbaşı mah. macit sok. 28/2 Sincan/Ankara', 'Ankara', 'Sağlık', '2025-06-01 11:13:28', '50 kişilik sargı bezi ve batikon lazım', 'Karşılandı', '', 4, '2025-06-01 12:14:32'),
(3, 5, 'ali buğra', '888888888', 'aydınlı mah berra sok no 11', 'İstanbul', 'Diğer', '2025-06-01 11:15:57', 'Ağrı kesici lazım', 'Karşılandı', '', 6, '2025-06-01 12:17:52'),
(4, 8, 'Halil İbrahim Çakırca', '633214753', 'incirlik mah. başkomutan sok. no 15', 'Eskişehir', 'Gıda', '2025-06-01 11:20:49', 'konserve yemek lazım', 'Karşılandı', '', 7, '2025-06-01 12:21:21'),
(5, 9, 'buse güvez', '13456789', 'yeni mahalle şifa sok. no 20', 'Bartın', 'Barınma', '2025-06-01 11:23:28', 'çadır lazım 50 kişilik', 'Karşılandı', '', 7, '2025-06-01 12:26:13'),
(6, 9, 'selin bostancı', '86966', 'vişnelik sok no 16', 'izmir', 'Kurtarma', '2025-06-01 11:25:03', 'Göçük altında kalındı', 'Karşılandı', '', 4, '2025-06-01 12:25:40');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yardim_talepleri`
--
ALTER TABLE `yardim_talepleri`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `yardim_talepleri`
--
ALTER TABLE `yardim_talepleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
