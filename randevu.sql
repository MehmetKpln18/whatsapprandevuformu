-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2020, 23:55:01
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `randevu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_title` text NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_slogan` text NOT NULL,
  `site_description` text NOT NULL,
  `site_keywords` text NOT NULL,
  `site_copright` varchar(255) NOT NULL,
  `site_facebook` varchar(255) NOT NULL,
  `site_twitter` varchar(255) NOT NULL,
  `site_instagram` varchar(255) NOT NULL,
  `site_analytics` text NOT NULL,
  `site_telefon` varchar(255) NOT NULL,
  `site_fax` varchar(255) NOT NULL,
  `site_calsaat` text NOT NULL,
  `site_eposta` text NOT NULL,
  `site_adres` text NOT NULL,
  `site_gorunum` text NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_title`, `site_favicon`, `site_slogan`, `site_description`, `site_keywords`, `site_copright`, `site_facebook`, `site_twitter`, `site_instagram`, `site_analytics`, `site_telefon`, `site_fax`, `site_calsaat`, `site_eposta`, `site_adres`, `site_gorunum`, `updatedAt`) VALUES
(1, 'PHP | Whatsapp Randevu Formu Scripti (Beta v.1) - Yönetim Panelli', 'favicon.png', 'MK Randevu Formu (Beta v.1)', 'MK Randevu Formu (Beta v.1)', 'randevu formu, mehmet kaplan', 'Copyright © 2019 <a target=\"_blank\" title=\"Mehmet Kaplan\" href=\"https://www.mehmetkaplan.net/\">Mehmet Kaplan</a> tarafından kodlanmıştır.', 'https://www.facebook.com/mehmetkplnn', 'https://www.twitter.com/mehmetkpln18', 'https://www.instagram.com/mehmetkpln18', '', '0212 212 12 12', '0212 212 12 12', 'Pazartesi - Cumartesi 08:30 - 20:30', 'deneme@deneme.com', 'Adres buraya gelecek...', '1', '2018-07-28 07:45:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destektalepleri`
--

CREATE TABLE `destektalepleri` (
  `id` int(11) NOT NULL,
  `alanid` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `isim` text NOT NULL,
  `eposta` text NOT NULL,
  `kullanicicevap` text NOT NULL,
  `yoneticicevap` text NOT NULL,
  `durum` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `destektalepleri`
--

INSERT INTO `destektalepleri` (`id`, `alanid`, `baslik`, `isim`, `eposta`, `kullanicicevap`, `yoneticicevap`, `durum`, `tarih`) VALUES
(1, 620, 'Merhaba Destek Sağlarmısınız.', 'Mehmet Kaplan', 'örnek@deneme.com', 'Merhaba Nasıl Sipariş Vereceğim.', 'Destek Sağlandı', '2', '2019-04-11 08:48:07'),
(2, 234, 'Merhaba Destek Sağlarmısınız.', 'Mehmet Kaplan', 'örnek@deneme.com', 'Merhaba Nasıl Sipariş Vereceğim.', 'Yonetici Mesaji Bekleniyor !', '1', '2019-04-12 06:17:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `icerik` text NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yazar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `baslik`, `icerik`, `tarih`, `yazar`) VALUES
(1, 'Mehmet Kaplan', 'Randevu Formu Duyuru Alanı', '2019-04-10 10:38:52', 'Mehmet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `urunresim` varchar(255) NOT NULL,
  `urunbaslik` text NOT NULL,
  `urunicerik` text NOT NULL,
  `urunfiyat` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ekleyen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `urunresim`, `urunbaslik`, `urunicerik`, `urunfiyat`, `tarih`, `ekleyen`) VALUES
(1, '1589666289.jpg', 'Saç Kestirme', 'Hizmet İçeriği', 30, '2019-04-05 17:39:56', 'Mehmet'),
(2, '1589581023.jpg', 'Sakal Kestirme', 'Hizmet İçeriği', 15, '2019-04-10 09:04:05', 'Mehmet'),
(3, 'resimyok.jpg', 'Saç + Sakal Kestirme', 'Hizmet İçeriği', 45, '2019-04-06 10:36:40', 'Mehmet'),
(4, '1589581036.jpg', 'Saç Boyama', 'Hizmet İçeriği', 40, '2019-04-06 10:56:47', 'Mehmet'),
(5, '1589581056.jpg', 'Yüz Bakım', 'Hizmet İçeriği', 30, '2019-04-06 10:56:47', 'Mehmet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

CREATE TABLE `randevular` (
  `id` int(11) UNSIGNED NOT NULL,
  `adsoyad` text COLLATE utf8_turkish_ci NOT NULL,
  `telefon` text COLLATE utf8_turkish_ci NOT NULL,
  `hizmet` text COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` text COLLATE utf8_turkish_ci NOT NULL,
  `randevu_tarihi` date NOT NULL,
  `randevu_saati` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `yoneticicevap` text COLLATE utf8_turkish_ci NOT NULL,
  `durum` text CHARACTER SET utf8 NOT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevular`
--

INSERT INTO `randevular` (`id`, `adsoyad`, `telefon`, `hizmet`, `fiyat`, `randevu_tarihi`, `randevu_saati`, `aciklama`, `yoneticicevap`, `durum`, `createdAt`) VALUES
(1, 'Mehmet Kaplan', '05445444444', 'Saç Kestirme', '30', '2020-05-15', '8:30', 'Açıklama', 'Tamamlanmış', '1', '2020-05-15 00:00:00'),
(2, 'Mehmet Kaplan', '05445444444', 'Sakal Kestirme', '15', '2020-05-15', '9:30', 'Açıklama', 'Onaylı', '1', '2020-05-15 23:59:02'),
(3, 'Mehmet Kaplan', '05445444444', ' Saç + Sakal Kestirme', '45', '2020-05-15', '10:30', 'Açıklama', 'Tamamlanmış', '1', '2020-05-16 00:01:46'),
(4, 'Mehmet Kaplan', '05445444444', 'Saç Boyama', '40', '2020-05-15', '11:30', 'Açıklama', 'Tamamlanmış', '1', '2020-05-16 00:01:53'),
(5, 'Mehmet Kaplan', '05445444444', 'Yüz Bakım', '30', '2020-05-16', '9:00', 'Açıklama', 'Tamamlanmış', '1', '2020-05-16 02:00:03'),
(37, 'Mehmet Kaplan', '05445444444', 'Yüz Bakım', '30', '2020-05-17', '8:30', 'Açıklama', 'İptal', '1', '2020-05-17 05:56:43'),
(38, 'Mehmet Kaplan', '05445444444', 'Yüz Bakım', '30', '2020-05-17', '14:00', 'Açıklama', 'Onaylı', '1', '2020-05-17 23:30:06'),
(40, 'Mehmet Kaplan', '05445444444', 'Saç Kestirme', '30', '2020-05-17', '8:30', 'Açıklama', 'Yeni', '1', '2020-05-18 01:10:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(11) NOT NULL,
  `alanid` text NOT NULL,
  `kullaniciadi` text NOT NULL,
  `email` text,
  `password` text,
  `adiniz` text NOT NULL,
  `aciklama` text NOT NULL,
  `telefon` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`id`, `alanid`, `kullaniciadi`, `email`, `password`, `adiniz`, `aciklama`, `telefon`) VALUES
(1, '', 'demo', 'demo@demo.com', 'demo', 'demo', 'Demo', 'demo');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destektalepleri`
--
ALTER TABLE `destektalepleri`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `destektalepleri`
--
ALTER TABLE `destektalepleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `randevular`
--
ALTER TABLE `randevular`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
