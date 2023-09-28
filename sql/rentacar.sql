-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Eyl 2023, 21:44:32
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rentacar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac`
--

CREATE TABLE `arac` (
  `a_id` int(11) NOT NULL,
  `mr_id` int(11) NOT NULL COMMENT 'markaid',
  `m_id` int(11) NOT NULL COMMENT 'modelid',
  `uretim_yili` year(4) NOT NULL,
  `a_resim` varchar(500) NOT NULL,
  `a_musait` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 ise musait 0 musait değil',
  `yolcu_kapasite` int(11) NOT NULL,
  `bagaj_kapasitesi` int(11) NOT NULL,
  `yakit_tur` int(11) NOT NULL COMMENT '1-benzin,2-lpg,3-benzin/lpg,4-dizel,5-elektrik,6-hybrid',
  `vites_tur` int(11) NOT NULL COMMENT '1-manuel,2-yarıotamatik,3-otomatik,4-triptonik',
  `a_kategori` int(11) NOT NULL COMMENT '1-ekonomik,2-ortasınıf,3-üstsınıf,4-vip',
  `klima_tur` int(11) NOT NULL COMMENT '1-otomatik(dijital),2-manuel',
  `ofis_id` int(11) NOT NULL COMMENT 'ofisid',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `arac`
--

INSERT INTO `arac` (`a_id`, `mr_id`, `m_id`, `uretim_yili`, `a_resim`, `a_musait`, `yolcu_kapasite`, `bagaj_kapasitesi`, `yakit_tur`, `vites_tur`, `a_kategori`, `klima_tur`, `ofis_id`, `updated_at`, `created_at`) VALUES
(3, 1, 1, '2016', 'storage/img/dacia-sandero1695507986.png', 1, 5, 500, 4, 1, 1, 1, 1, '2023-09-23 22:26:26', NULL),
(14, 1, 1, '1991', 'storage/img/dacia-sanderoo1695508173.png', 1, 5, 200, 2, 1, 1, 1, 1, '2023-09-23 22:29:33', '2023-09-16 23:27:16'),
(15, 4, 4, '2017', 'storage/img/renault-clio1695507353.png', 1, 5, 300, 1, 1, 2, 1, 1, '2023-09-23 22:15:53', '2023-09-23 22:15:53'),
(16, 5, 5, '2017', 'storage/img/volkswagen-passat1695507411.png', 1, 5, 300, 4, 3, 2, 1, 1, '2023-09-23 22:16:51', '2023-09-23 22:16:51'),
(17, 6, 6, '2017', 'storage/img/hyundai-i201695507689.png', 1, 5, 250, 1, 2, 2, 1, 1, '2023-09-23 22:21:29', '2023-09-23 22:21:29'),
(18, 4, 8, '2017', 'storage/img/renault-fluence1695507756.png', 1, 5, 200, 4, 2, 1, 1, 1, '2023-09-23 22:22:36', '2023-09-23 22:22:36'),
(19, 5, 7, '2017', 'storage/img/volkswagen-golf1695507808.png', 1, 5, 300, 4, 3, 1, 1, 1, '2023-09-23 22:23:28', '2023-09-23 22:23:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac_fiyati`
--

CREATE TABLE `arac_fiyati` (
  `a_fiyat_id` int(11) NOT NULL COMMENT 'aracfiyatı',
  `para_birim_id` int(11) NOT NULL,
  `arac_id` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `gun_baslangic` int(11) NOT NULL,
  `gun_bitis` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `arac_fiyati`
--

INSERT INTO `arac_fiyati` (`a_fiyat_id`, `para_birim_id`, `arac_id`, `fiyat`, `gun_baslangic`, `gun_bitis`, `updated_at`, `created_at`) VALUES
(2, 1, 14, 900, 4, 7, '2023-09-08 19:09:51', '2023-09-08 19:09:51'),
(3, 1, 14, 800, 8, 11, '2023-09-10 07:49:37', '2023-09-10 07:49:37'),
(7, 1, 14, 900, 1, 3, '2023-09-08 19:09:51', '2023-09-08 19:09:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac_ofis`
--

CREATE TABLE `arac_ofis` (
  `ofis_id` int(11) NOT NULL,
  `ofis_name` varchar(500) NOT NULL,
  `ilce_id` int(11) NOT NULL COMMENT 'ilid',
  `ofis_maps` varchar(500) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `arac_ofis`
--

INSERT INTO `arac_ofis` (`ofis_id`, `ofis_name`, `ilce_id`, `ofis_maps`, `updated_at`, `created_at`) VALUES
(1, 'Merkez', 1, 'test maps', NULL, NULL),
(4, 'merkez', 4, 'kdcmddv', '2023-09-18 08:48:41', '2023-09-18 08:48:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(11) NOT NULL COMMENT 'ayarlar',
  `adres` varchar(500) NOT NULL,
  `tel` bigint(20) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `e_posta` varchar(250) NOT NULL,
  `maps` varchar(500) NOT NULL,
  `face` varchar(500) NOT NULL,
  `twitter` varchar(500) NOT NULL,
  `linkedin` varchar(500) NOT NULL,
  `gmail` varchar(500) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `adres`, `tel`, `logo`, `e_posta`, `maps`, `face`, `twitter`, `linkedin`, `gmail`, `updated_at`, `created_at`) VALUES
(1, 'denizli/kale', 5453155802, 'storage/img/logo1694900475.jpg', 'sb@gmail.com', 'izmir/buca', 'sinanbedir.facebook', 'sinanbedir.twitter', 'sinanbedir.linkedin', 'sb@gmail.com', '2023-09-16 18:41:15', '2023-09-10 11:50:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber_duyuru`
--

CREATE TABLE `haber_duyuru` (
  `haber_id` int(11) NOT NULL,
  `haber_adi` varchar(300) NOT NULL,
  `unique_name` varchar(500) NOT NULL,
  `haber_resim` varchar(300) NOT NULL,
  `haber_icerik` text NOT NULL,
  `yayin_tarihi` datetime NOT NULL,
  `begen` int(11) DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haber_duyuru`
--

INSERT INTO `haber_duyuru` (`haber_id`, `haber_adi`, `unique_name`, `haber_resim`, `haber_icerik`, `yayin_tarihi`, `begen`, `updated_at`, `created_at`) VALUES
(1, 'Rent a Car Sitesi', 'rent-a-car-sitesi', 'storage/img/haber11695555048.jpg', 'Son model kiralık araçlarımız ile turlarınızın tadını arttıracak olan İstanbul Vip Araç Kiralama, müşteri ilişkilerinde sürekli kendini geliştiren personelleri ile daima müşteri odaklı hizmet vermektedir. İstanbul Vip Kiralama da firmanızı araç filosu satın alma masraflarından da kurtarabilirsiniz. Uzun vadeli araç kiralama fırsatı ile firmanızın filosunu oluşturabilir, araç için yapacağınız masrafları firma bünyesinde başka şekillerde değerlendirme fırsatı yakalayabilirsiniz. Daha geniş hizmet yelpazesi için İstanbul Vip Oto Kiralama web sayfasını ziyaret ediniz.', '2023-09-07 00:00:00', 0, '2023-09-24 08:59:13', NULL),
(5, 'Oto Kiralama Sitesi', 'oto-kiralama-sitesi', 'storage/img/haber21695555030.jpg', 'İstanbul Vip rent a car, aile tipine uygun araçlara sahip geniş bir araç filosuna sahiptir. Ayrıca şehir içi ulaşım istekleriniz dahilinde firma size istediğiniz durumunda şoförlü araç kiralama hizmeti de sunmaktadır. Bunun dışında yapacağınız gezi veya turlar için özel araç tahsil etmenin yolu yine İstanbul Vip rent a car dan geçiyor. Son model kiralık araçlarımız ile turlarınızın tadını arttıracak olan İstanbul Vip Araç Kiralama, müşteri ilişkilerinde sürekli kendini geliştiren personelleri ile daima müşteri odaklı hizmet vermektedir. İstanbul Vip Kiralama da firmanızı araç filosu satın alma masraflarından da kurtarabilirsiniz. Uzun vadeli araç kiralama fırsatı ile firmanızın filosunu oluşturabilir, araç için yapacağınız masrafları firma bünyesinde başka şekillerde değerlendirme fırsatı yakalayabilirsiniz. Daha geniş hizmet yelpazesi için İstanbul Vip Oto Kiralama web sayfasını ziyaret ediniz.', '2023-09-17 00:00:00', 0, '2023-09-24 09:08:43', '2023-09-16 19:40:13'),
(6, 'Havalimanı Transfer Sitesi', 'havalimani-transfer-sitesi', 'storage/img/haber31695555064.jpg', 'İstanbul da Ailenizle bir tatile, akraba veya memleket ziyaretine gideceğiniz anda günübirlik dahi olsa güvenilir hizmet vermekte olan İstanbul Vip rent a car, aile tipine uygun araçlara sahip geniş bir araç filosuna sahiptir. Ayrıca şehir içi ulaşım istekleriniz dahilinde firma size istediğiniz durumunda şoförlü araç kiralama hizmeti de sunmaktadır. Bunun dışında yapacağınız gezi veya turlar için özel araç tahsil etmenin yolu yine İstanbul Vip rent a car dan geçiyor. Son model kiralık araçlarımız ile turlarınızın tadını arttıracak olan İstanbul Vip Araç Kiralama, müşteri ilişkilerinde sürekli kendini geliştiren personelleri ile daima müşteri odaklı hizmet vermektedir. İstanbul Vip Kiralama da firmanızı araç filosu satın alma masraflarından da kurtarabilirsiniz. Uzun vadeli araç kiralama fırsatı ile firmanızın filosunu oluşturabilir, araç için yapacağınız masrafları firma bünyesinde başka şekillerde değerlendirme fırsatı yakalayabilirsiniz. Daha geniş hizmet yelpazesi için İstanbul Vip Oto Kiralama web sayfasını ziyaret ediniz.', '2023-09-24 00:00:00', 0, '2023-09-24 09:09:26', '2023-09-24 08:22:43'),
(7, 'Vip Araç Kiralama Sitesi', 'vip-arac-kiralama-sitesi', 'storage/img/haber41695555078.jpg', 'Rent A Car kaskosuna sahip araçlar ile birçok alanda hizmet veren İstanbul Vip Oto Kiralama nın hizmetlerini özet olarak şu başlıklar altında sıralayabiliriz. İstanbul da Ailenizle bir tatile, akraba veya memleket ziyaretine gideceğiniz anda günübirlik dahi olsa güvenilir hizmet vermekte olan İstanbul Vip rent a car, aile tipine uygun araçlara sahip geniş bir araç filosuna sahiptir. Ayrıca şehir içi ulaşım istekleriniz dahilinde firma size istediğiniz durumunda şoförlü araç kiralama hizmeti de sunmaktadır. Bunun dışında yapacağınız gezi veya turlar için özel araç tahsil etmenin yolu yine İstanbul Vip rent a car dan geçiyor. Son model kiralık araçlarımız ile turlarınızın tadını arttıracak olan İstanbul Vip Araç Kiralama, müşteri ilişkilerinde sürekli kendini geliştiren personelleri ile daima müşteri odaklı hizmet vermektedir. İstanbul Vip Kiralama da firmanızı araç filosu satın alma masraflarından da kurtarabilirsiniz. Uzun vadeli araç kiralama fırsatı ile firmanızın filosunu oluşturabilir, araç için yapacağınız masrafları firma bünyesinde başka şekillerde değerlendirme fırsatı yakalayabilirsiniz. Daha geniş hizmet yelpazesi için İstanbul Vip Oto Kiralama web sayfasını ziyaret ediniz.', '2023-09-09 00:00:00', 0, '2023-09-24 09:09:35', '2023-09-24 08:23:26'),
(8, 'Şoförlü Araç Kiralama Sitesi', 'soforlu-arac-kiralama-sitesi', 'storage/img/haber51695555112.jpg', 'İstanbul un önde gelen araç kiralama şirketleri arasında yer edinmeyi başarmış bir oto kiralama firmasıdır. Rent A Car kaskosuna sahip araçlar ile birçok alanda hizmet veren İstanbul Vip Oto Kiralama nın hizmetlerini özet olarak şu başlıklar altında sıralayabiliriz. İstanbul da Ailenizle bir tatile, akraba veya memleket ziyaretine gideceğiniz anda günübirlik dahi olsa güvenilir hizmet vermekte olan İstanbul Vip rent a car, aile tipine uygun araçlara sahip geniş bir araç filosuna sahiptir. Ayrıca şehir içi ulaşım istekleriniz dahilinde firma size istediğiniz durumunda şoförlü araç kiralama hizmeti de sunmaktadır. Bunun dışında yapacağınız gezi veya turlar için özel araç tahsil etmenin yolu yine İstanbul Vip rent a car dan geçiyor. Son model kiralık araçlarımız ile turlarınızın tadını arttıracak olan İstanbul Vip Araç Kiralama, müşteri ilişkilerinde sürekli kendini geliştiren personelleri ile daima müşteri odaklı hizmet vermektedir. İstanbul Vip Kiralama da firmanızı araç filosu satın alma masraflarından da kurtarabilirsiniz. Uzun vadeli araç kiralama fırsatı ile firmanızın filosunu oluşturabilir, araç için yapacağınız masrafları firma bünyesinde başka şekillerde değerlendirme fırsatı yakalayabilirsiniz. Daha geniş hizmet yelpazesi için İstanbul Vip Oto Kiralama web sayfasını ziyaret ediniz.', '2023-09-09 00:00:00', 0, '2023-09-24 09:09:51', '2023-09-24 08:24:27'),
(9, 'Transfer Sitesi Yaptırmak', 'transfer-sitesi-yaptirmak', 'storage/img/haber61695555127.jpg', 'İstanbul Havalimanın da hizmet veren ve bir araç kiralama firmasından beklentini fazlasını karşılayan sektörde edindiği sağlam müşteri memnuniyeti sayesinde İstanbul un önde gelen araç kiralama şirketleri arasında yer edinmeyi başarmış bir oto kiralama firmasıdır. Rent A Car kaskosuna sahip araçlar ile birçok alanda hizmet veren İstanbul Vip Oto Kiralama nın hizmetlerini özet olarak şu başlıklar altında sıralayabiliriz. İstanbul da Ailenizle bir tatile, akraba veya memleket ziyaretine gideceğiniz anda günübirlik dahi olsa güvenilir hizmet vermekte olan İstanbul Vip rent a car, aile tipine uygun araçlara sahip geniş bir araç filosuna sahiptir. Ayrıca şehir içi ulaşım istekleriniz dahilinde firma size istediğiniz durumunda şoförlü araç kiralama hizmeti de sunmaktadır. Bunun dışında yapacağınız gezi veya turlar için özel araç tahsil etmenin yolu yine İstanbul Vip rent a car dan geçiyor. Son model kiralık araçlarımız ile turlarınızın tadını arttıracak olan İstanbul Vip Araç Kiralama, müşteri ilişkilerinde sürekli kendini geliştiren personelleri ile daima müşteri odaklı hizmet vermektedir. İstanbul Vip Kiralama da firmanızı araç filosu satın alma masraflarından da kurtarabilirsiniz. Uzun vadeli araç kiralama fırsatı ile firmanızın filosunu oluşturabilir, araç için yapacağınız masrafları firma bünyesinde başka şekillerde değerlendirme fırsatı yakalayabilirsiniz. Daha geniş hizmet yelpazesi için İstanbul Vip Oto Kiralama web sayfasını ziyaret ediniz.', '2023-09-15 00:00:00', 0, '2023-09-24 09:09:58', '2023-09-24 08:25:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `il`
--

CREATE TABLE `il` (
  `il_id` int(11) NOT NULL,
  `il_name` varchar(250) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `il`
--

INSERT INTO `il` (`il_id`, `il_name`, `updated_at`, `created_at`) VALUES
(1, 'izmir', NULL, NULL),
(2, 'Denizli', '2023-09-10 15:24:19', '2023-09-10 15:24:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilce`
--

CREATE TABLE `ilce` (
  `ilce_id` int(11) NOT NULL,
  `ilce_name` varchar(250) NOT NULL,
  `il_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilce`
--

INSERT INTO `ilce` (`ilce_id`, `ilce_name`, `il_id`, `updated_at`, `created_at`) VALUES
(1, 'Buca', 1, '2023-09-18 06:57:01', NULL),
(3, 'kale', 2, '2023-09-18 06:57:43', '2023-09-18 06:57:43'),
(4, 'tavas', 2, '2023-09-18 08:41:37', '2023-09-18 08:41:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim_mesajlari`
--

CREATE TABLE `iletisim_mesajlari` (
  `ilet_id` int(11) NOT NULL COMMENT 'iletişim',
  `ad_soyad` varchar(350) NOT NULL,
  `e_posta` varchar(300) NOT NULL,
  `konu` varchar(250) NOT NULL,
  `mesaj` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim_mesajlari`
--

INSERT INTO `iletisim_mesajlari` (`ilet_id`, `ad_soyad`, `e_posta`, `konu`, `mesaj`, `updated_at`, `created_at`) VALUES
(1, 'Sinan Bedir', 'sinanbedir@gmail.com', 'Arac kira fiyatı ', 'Araç fiyatı güncel mi?', NULL, NULL),
(4, 'sinan bedir', 'sb', 'asasasasc', 'scascacvasc', '2023-09-21 04:53:40', '2023-09-21 04:53:40'),
(5, 'sinan bedir', 'hg', 'yeni', 'yeniiiii', '2023-09-21 04:55:48', '2023-09-21 04:55:48'),
(6, 'sinan bedir', 'hg', 'sinaper', 'sinaperr', '2023-09-21 04:57:48', '2023-09-21 04:57:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kiralanan_arac`
--

CREATE TABLE `kiralanan_arac` (
  `id` int(11) NOT NULL,
  `arac_id` int(11) NOT NULL,
  `alis_yeri_id` int(11) NOT NULL,
  `donus_yeri_id` int(11) NOT NULL COMMENT 'aracverilen',
  `alis_tarihi` datetime NOT NULL,
  `donus_tarihi` datetime NOT NULL,
  `kiralanan_fiyat` double NOT NULL,
  `toplam_tutar` double NOT NULL,
  `navigasyon` int(11) NOT NULL,
  `sofor_hizmeti` int(11) NOT NULL,
  `bebek_koltugu` int(11) NOT NULL,
  `yol_haritasi` int(11) NOT NULL,
  `para_birim_id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `rez_kod` varchar(8) NOT NULL,
  `onay` int(11) DEFAULT NULL,
  `red_nedeni` text DEFAULT NULL COMMENT 'onay o ise red nedeni girilecek',
  `dropoff` int(11) NOT NULL COMMENT '1.ofise bırkmıyor,0 ise ofise bırakacak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kiralanan_arac`
--

INSERT INTO `kiralanan_arac` (`id`, `arac_id`, `alis_yeri_id`, `donus_yeri_id`, `alis_tarihi`, `donus_tarihi`, `kiralanan_fiyat`, `toplam_tutar`, `navigasyon`, `sofor_hizmeti`, `bebek_koltugu`, `yol_haritasi`, `para_birim_id`, `musteri_id`, `updated_at`, `created_at`, `rez_kod`, `onay`, `red_nedeni`, `dropoff`) VALUES
(6, 14, 1, 1, '2023-09-07 00:00:00', '2023-09-08 00:00:00', 900, 3200, 0, 1, 0, 0, 1, 6, '2023-09-25 16:26:35', '2023-09-18 05:16:50', '', 2, 'lastik tamir bekliyor', 0),
(7, 14, 1, 1, '2023-09-19 00:00:00', '2023-09-28 00:00:00', 900, 900, 0, 0, 0, 0, 1, 6, '2023-09-25 16:22:01', '2023-09-18 05:21:06', '', 2, 'teker patladı', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

CREATE TABLE `languages` (
  `language_id` int(11) NOT NULL,
  `lang_name` varchar(250) NOT NULL,
  `lang_kod` varchar(100) NOT NULL,
  `resim` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`language_id`, `lang_name`, `lang_kod`, `resim`, `updated_at`, `created_at`) VALUES
(1, 'Türkçe', 'tr', 'storage/img/tr1695567099.png', '2023-09-24 11:51:39', NULL),
(2, 'İngilizce', 'en', 'storage/img/eng1695567111.png', '2023-09-24 11:51:52', NULL),
(4, 'Almanca', 'de', 'storage/img/deu1695567139.png', '2023-09-24 11:52:19', '2023-09-16 19:57:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

CREATE TABLE `marka` (
  `mr_id` int(11) NOT NULL,
  `mr_isim` varchar(250) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `marka`
--

INSERT INTO `marka` (`mr_id`, `mr_isim`, `updated_at`, `created_at`) VALUES
(1, 'Dacia', NULL, NULL),
(2, 'Mercedes', '2023-09-10 17:28:31', '2023-09-10 17:28:26'),
(4, 'Renault', '2023-09-23 19:13:10', '2023-09-23 19:13:10'),
(5, 'Volkswagen', '2023-09-23 19:13:40', '2023-09-23 19:13:40'),
(6, 'Hyundai', '2023-09-23 19:18:53', '2023-09-23 19:18:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model`
--

CREATE TABLE `model` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(250) NOT NULL,
  `mr_id` int(11) NOT NULL COMMENT 'markaid',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `model`
--

INSERT INTO `model` (`m_id`, `m_name`, `mr_id`, `updated_at`, `created_at`) VALUES
(1, 'Sandero', 1, NULL, NULL),
(2, 'Duster', 1, '2023-09-10 18:04:05', '2023-09-10 18:04:00'),
(4, 'Clio', 4, '2023-09-23 19:13:58', '2023-09-23 19:13:58'),
(5, 'Passat', 5, '2023-09-23 19:14:09', '2023-09-23 19:14:09'),
(6, 'i20', 6, '2023-09-23 19:19:10', '2023-09-23 19:19:10'),
(7, 'Golf', 5, '2023-09-23 19:20:07', '2023-09-23 19:20:07'),
(8, 'Fluence', 4, '2023-09-23 19:20:35', '2023-09-23 19:20:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `mus_id` int(11) NOT NULL COMMENT 'musteriid',
  `mus_adi` varchar(250) NOT NULL,
  `mus_soyadi` varchar(250) NOT NULL,
  `d_tarih` date NOT NULL,
  `cep_tel` bigint(20) NOT NULL,
  `ucus_notlari` text DEFAULT NULL,
  `e_posta` varchar(250) NOT NULL,
  `ozel_notlar` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`mus_id`, `mus_adi`, `mus_soyadi`, `d_tarih`, `cep_tel`, `ucus_notlari`, `e_posta`, `ozel_notlar`, `updated_at`, `created_at`) VALUES
(1, 'Sinan', 'Bedir', '1995-08-21', 5453155802, 'Gayet süperdi.', 'Sb@gmail.com', 'En son aldığım clio sol ön tekerlek hava kacırıyor.', NULL, NULL),
(5, 'yeni', 'yeni', '1997-09-11', 5555555555, 'jtfhtfhv', 'sb', 'nvhjvb', '2023-09-21 13:53:55', '2023-09-21 13:51:58'),
(6, 'sinan', 'bedir', '1995-08-21', 5453155802, 'sdcawlkdcmkasdn', 'sinanbedir1907@gmail.com', 'wdcwddc', '2023-09-21 14:08:10', '2023-09-21 13:59:46'),
(9, 'aliiiiiiiiiiiiiiiiiiiiiiiiiii', 'bedirich', '2023-09-26', 5555555555, NULL, 'ali@gmail.com', NULL, '2023-09-26 16:56:57', '2023-09-26 08:24:43'),
(10, 'yasin', 'turko', '2023-09-12', 5555555555, NULL, 'yasin@gmail.com', NULL, '2023-09-26 09:51:58', '2023-09-26 09:51:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `para_birimi`
--

CREATE TABLE `para_birimi` (
  `para_birim_id` int(11) NOT NULL,
  `para_name` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `para_birimi`
--

INSERT INTO `para_birimi` (`para_birim_id`, `para_name`, `updated_at`, `created_at`) VALUES
(1, 'TRY', '2023-09-24 11:43:24', NULL),
(2, 'USD', '2023-09-24 11:43:06', NULL),
(3, 'EUR', '2023-09-24 11:43:34', '2023-09-10 18:19:06'),
(5, 'SAR', '2023-09-24 11:43:52', '2023-09-24 11:43:52'),
(6, 'RUB', '2023-09-24 11:44:09', '2023-09-24 11:44:09'),
(7, 'GBP', '2023-09-24 11:44:25', '2023-09-24 11:44:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon_extralari`
--

CREATE TABLE `rezervasyon_extralari` (
  `rez_id` int(11) NOT NULL COMMENT 'rezervasyonid',
  `navigasyon` double NOT NULL,
  `sofor_hizmeti` double NOT NULL,
  `bebek_koltugu` double NOT NULL,
  `yol_haritasi` double NOT NULL,
  `para_birim_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `dropoff` double NOT NULL COMMENT 'arac ofise bırakmama ücreti'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rezervasyon_extralari`
--

INSERT INTO `rezervasyon_extralari` (`rez_id`, `navigasyon`, `sofor_hizmeti`, `bebek_koltugu`, `yol_haritasi`, `para_birim_id`, `updated_at`, `created_at`, `dropoff`) VALUES
(5, 200, 700, 200, 200, 1, '2023-09-18 09:23:09', '2023-09-18 09:23:09', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(11) NOT NULL,
  `sayfa_baslik` varchar(250) NOT NULL,
  `icerik` text NOT NULL,
  `description` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `title` varchar(250) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_baslik`, `icerik`, `description`, `keywords`, `title`, `updated_at`, `created_at`) VALUES
(1, 'Hakkımızda', '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Rent A Car Sitesi;</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Yurt dışından gelen ve yurt i&ccedil;indeki m&uuml;şterilerimize kolaylık ve ayrıcalıklar sağlamakta olup, havalimanina &uuml;cretsiz ara&ccedil; teslimi ve alımı yapmaktadır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Ekonomik sınıftan l&uuml;x sınıfa kadar bir&ccedil;ok otomobil, VİP ve Suv ara&ccedil;larıyla sizlere en iyi kiralama hizmetini verebilmek i&ccedil;in yoğun ve titiz bir şekilde &ccedil;alışmaktadır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Kiraladığınız her t&uuml;r marka ara&ccedil;larımız i&ccedil;in tecr&uuml;beli ve profesyonel şof&ouml;rleriyle de sizlere en kaliteli ve g&uuml;venilir hizmeti vermektedir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Siz değerli m&uuml;şterilerimizin 7/24 havalimanın da karşılama ve kiraladığı ara&ccedil; teslimini yapmaktadır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Yurt i&ccedil;i ve Yurt dışından gelen m&uuml;şterilerimize transfer ayrıcalığı da sunmaktadır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Rezervasyon sayfamızdan otomobillerin &ouml;zelliklerini, fiyatlarını inceleyebilir ve kiralama ile ilgili +90 544 324 00 60 telefon numaramızdan ayrıntılı bilgilere ulaşabilirsiniz.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Rent A Car Sitesi olarak ;</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px; background-color: #f8f8f8; font-family: Tahoma;\">Siz değerli m&uuml;şterilerimize kaliteli, konforlu ve g&uuml;venilir hizmeti sağlamak i&ccedil;in hassasiyetle &ccedil;alışmaktadır.</span></p>', '<p>seo-hakkımızda</p>', 'araç,kiralıkaraç,rentacar', 'Hakkımızda', '2023-09-20 07:35:05', NULL),
(2, 's.s.s.', '<p class=\"tt margin-tp-5\" style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">En az ara&ccedil; kiralama s&uuml;resi nedir ?</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">En az kiralama s&uuml;resi 24 saatir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p class=\"tt\" style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Ara&ccedil; kiralayabilmek i&ccedil;in s&uuml;r&uuml;c&uuml; belgesi ve kiralama yaşı sınırlamaları nelerdir?</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">En az 2 yıl ge&ccedil;erli s&uuml;r&uuml;c&uuml; belgesine sahip olmak ve &uuml;st sınıf ara&ccedil; kiralamalarında en az 25 yaşında olma koşulları aranır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p class=\"tt\" style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Sigorta &ccedil;eşitleri ve kapsamları nelerdir ?</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">Sigortaların ge&ccedil;erlilikleri, Trafik kaza, Hırsızlık ve Akol raporlarının ibraz edilmemesi ve/veya aracın alkol, uyuşturucu etkisi altında kullanılması ve/veya yasal hız sınırlarının aşılması halinde kendiliğinden ortadan kalkar. Cam, ayna ve far kırılması, lastiklerin yarılması ile kullanım hatalarından doğacak zararlar, sigorta kapsamı dışında tutulmuştur.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p class=\"tt\" style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Kiraladığım aracı benden başka biri kullanabilir mi ?</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">&Uuml;nye Rent a Car aracını kiralayan dışındaki 3. şahısların kullanımları, ancak s&uuml;r&uuml;c&uuml; belgesi ve kimlik belgelerinin &Uuml;nye Rent a Car yetkilisi tarafından kira s&ouml;zleşmesine kaydı halinde m&uuml;mk&uuml;nd&uuml;r.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p class=\"tt\" style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Uzun s&uuml;reli kiralama koşulları nelerdir ?</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">30 g&uuml;n ve &uuml;zeri ara&ccedil; kiralama ihtiya&ccedil;larınız i&ccedil;in 0 (538) 224 2492 numaralı telefonumuzu arayabilirsiniz.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p class=\"tt\" style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Ek Hizmetleriniz nelerdir ?</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">GPS(Navigasyon cihazı) : Rezervasyon esnasında talep edilmesi halinde ek &uuml;cret karşılığında temin edilebilir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">OGS cihazı : Kiralama s&uuml;resi boyunca 5 TL.hizmet bedeli karşılığında temin edilebilir. Kullanım &uuml;cretleri ayrıca tahsil edilir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">Bebek Koltuğu : Rezervasyon sırasında istenilmesi halinde ek &uuml;cret karşılığında sağlanabilir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">Teslim ve Bırakma : &Uuml;nye Rent a Car istasyonlarının bulundukları merkezlerde istenilen yere ara&ccedil; teslimi ve / veya bırakılması 20 Euro karşılığında sağlanmaktadır. &Uuml;nye Rent a Car Ara&ccedil; Kiralama istasyonlarının bulunmadığı yerlerde km başına 0,30 Euro hesaplanır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p class=\"tt\" style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">&Ouml;deme şekilleri nedir?</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: medium;\">&Ouml;demeler ge&ccedil;erlilikleri &Uuml;nye Rent a Car tarafından kabul edilen kredi kartlarıyla yapılabilir. Se&ccedil;ilen &ouml;deme t&uuml;r&uuml;ne bakılmaksızın, yaklaşık kira bedeli ara&ccedil; teslimi sırasında tahsil edilecek, kesin hesaplama kira bitiminde yapılacaktır. Kira bedeline ek olarak kredi kartından ara&ccedil; grubuna g&ouml;re değişen tutarlarda depozit ama&ccedil;lı provizyon alınır.</span></p>', '<p>s.s.s.</p>', 'araç kiralama,araç,kiralık araç,uygun fiyatlı kiralık araç', 's.s.s.', '2023-09-20 08:12:02', '2023-09-20 04:36:17'),
(3, 'Filo Kiralama', '<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Filo Kiralama Neden Daha Avantajlı?</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Bir ara&ccedil; satın almaya karar verdiğinizde, toplu nakit &ccedil;ıkışı yapmanız veya ihtiyacınız olan nakit i&ccedil;in kredi kullanmanız gerekir. Masraflarınız bununla da bitmez. Satın aldığınız aracın sigorta, vergi, bakım, onarım, lastik değişimi gibi maliyetleri ek masraflar olarak karşınıza &ccedil;ıkar. Ayrıca, aracınızın ikinci el satış değerinin belirsizliği de sizin i&ccedil;in bir risk unsuru olacaktır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Aracınızı uzun s&uuml;reli kiralamanız halinde ise oluşacak toplam maliyet, yalnızca aracınızın aylık kiraları kadardır. &Uuml;stelik, hem aracınızın ikinci el değerinin belirsizliği riskinden korunmuş olur, hem de aracınızın satın alımından, ikinci el satışına kadarki t&uuml;m işlemlerini zahmetsizce y&uuml;r&uuml;tm&uuml;ş olursunuz. Kiralama kapsamında alacağınız uygun maliyetli ek hizmetleri de hesaba kattığınızda, uzun s&uuml;reli ara&ccedil; kiralamak satın almaya kıyasla sizin i&ccedil;in daha avantajlı bir &ccedil;&ouml;z&uuml;m olacaktır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Kolay Ara&ccedil; Yenileme</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Ara&ccedil;ların yenilenmesi s&uuml;recinde satış işlemleri ile ilgilenmez, ikinci el değer değişimi riskine karşı tam koruma sağlarsınız.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Aylık Sabit Taksitler</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Ara&ccedil; satın almak yerine kiralamanız durumunda herhangi bir peşinat &ouml;demesi ve satın alım bedelleri ile ilgili toplu nakit &ccedil;ıkışı yapmanıza gerek kalmaz. &Ouml;demelerinizi &ouml;nceden belirlenmiş sabit kiralar halinde ger&ccedil;ekleştirirsiniz.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Kasko, Sigorta ve Motorlu Taşıtlar Vergisi &Ouml;demeleri</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Ara&ccedil;ların kasko, trafik sigortası ve Motorlu Taşıtlar Vergisi &ouml;demeleri, kiralama kapsamına dahil edilerek zamanında ve eksiksiz olarak tarafımızca yapılır. Aracınızı satın aldığınızda &ouml;demek zorunda kaldığınız, fakat kanunen kabul edilmeyen gider olan Motorlu Taşıtlar Vergisi &ouml;demeleri, ara&ccedil;larınızı bizden kiralamanız durumunda size ek bir y&uuml;k olmaktan &ccedil;ıkar.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">KDV Avantajı</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Aracın doğrudan satın alınması halinde, KDV bir maliyet unsuru olarak karşınıza &ccedil;ıkar ve KDV indiriminde kullanılamaz. Kiralama halinde ise faturadaki KDV nin tamamı indirilecek KDV olarak kullanabilir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">G&uuml;&ccedil;l&uuml; Bilan&ccedil;o G&ouml;r&uuml;n&uuml;m&uuml;</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Ara&ccedil; kiralamak bilan&ccedil;onuzun g&ouml;r&uuml;n&uuml;m&uuml;ne olumlu katkı sağlar. Banka kredisi ile satın almadan farklı olarak, şirketiniz &ouml;deme planında yer alan ve vadesi gelmemiş ileri tarihli kira bedelleri bilan&ccedil;onuzda mali bor&ccedil;larınız altında yer almaz ve bor&ccedil;lanma kapasitenizi de olumsuz etkilemez.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><span style=\"box-sizing: border-box; font-weight: bold; margin: 0px; padding: 0px;\">Zaman Y&ouml;netimi</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; color: #333333; font-size: 15px; background-color: #ffffff; padding: 0px; font-family: Tahoma;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Ara&ccedil; ihtiyacınızı gidermek ve filonuzu y&ouml;netmek i&ccedil;in zaman harcamayın. Filo kiralama hizmeti size &ouml;nemli oranda zaman tasarrufu sağlar ve ana iş kolunuza konsantrasyonunuzu g&uuml;&ccedil;lendirir.</span></p>', '<p>Filo Kiralama</p>', 'araç kiralama,araç,kiralık araç,uygun fiyatlı kiralık araç', 'Filo Kiralama', '2023-09-20 08:11:13', '2023-09-20 04:38:39'),
(4, 'Kiralama Koşulları', '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">KİRALAMA S&Uuml;RESİ</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">En kısa kiralama s&uuml;resi 24 saattir. Teslim gecikmelerinde her ek saat i&ccedil;in g&uuml;nl&uuml;k &uuml;cretin 1/3 &uuml; alınır. Toplam 3 saati aşan gecikmelerde tam g&uuml;n &uuml;creti alınır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">UZUN S&Uuml;RELİ KİRALAMALAR</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Uzun s&uuml;reli kiralama i&ccedil;in en az kiralama s&uuml;resi 30 g&uuml;nd&uuml;r. &Ouml;zel fiyat uygulanır. Kiralama fiyatı ve koşullarına ilişkin bilgi i&ccedil;in +90 544 324 00 60 numaramızdan Bizleri arayabilirsiniz.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">ARA&Ccedil; TESLİM ALMA - ARA&Ccedil; BIRAKMA</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">24 saat kesintisiz hizmet veren D&uuml;zce Vip Oto Kiralama dilediğiniz g&uuml;n ve saatte aracınızı teslim alabilirsiniz.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">S&Uuml;R&Uuml;C&Uuml; BELGESİ - KULLANIM YAŞI</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">En az&nbsp; 25 yaş yaşını dolmurmuş olma mecburiyeti vardır.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">İLAVE S&Uuml;R&Uuml;C&Uuml;</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Kiracı dışında aracın başkası tarafından kullanılabilmesi ancak s&uuml;r&uuml;c&uuml; belgesi ve kullanım yaşı kurallarına uygun s&uuml;r&uuml;c&uuml;lerin ge&ccedil;erli kimlik ve ehliyetlerinin s&ouml;zleşmeye kaydı ile m&uuml;mk&uuml;nd&uuml;r. Başka kayıt yoksa ve kazanın kaydı olmayan s&uuml;r&uuml;c&uuml; tarafından yapıldığı tespit edilirse sigortalar ge&ccedil;ersiz olur.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">FİYATLARA DAHİL OLAN - OLMAYAN HUSUSLAR</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">Fiyatlara ara&ccedil;ların sınırsız kilometre kullanım hakkı, ara&ccedil; bakım giderleri ve kasko dahildir. Yakıt, k&ouml;pr&uuml;,otoyol &uuml;cretleri, trafik cezaları ile sigortalar , tek y&ouml;n &uuml;creti, ara&ccedil; teslim etme ve teslim alma &uuml;cretleri, bebek koltuğu gibi ekstra talepler ve Katma Değer Vergisi (KDV)fiyatlara dahil değilidir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">OTO KİRALAMA FİYAT VE KOŞULLARI İLE TARİFEDE BELİRTİLEN ARA&Ccedil; TİPLERİNİ &Ouml;NCEDEN HABER VERMEKSİZİN DEĞİŞTİRME HAKKINI SAKLI TUTAR.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 16px;\">TRAFİK CEZALARI</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; background-color: #ffffff;\"><span style=\"box-sizing: border-box; font-size: 16px;\">T&uuml;rkiye deki trafik yasaları otoyollarda en &ccedil;ok 120km. , şehirlerarası yollarda 90km. ve şehiri&ccedil;lerinde ise 50km. hıza izin vermektedir. Park ederken PARK YASAĞI işaretlerine uyunuz. Trafik yasalarına uyulmamasından ve kiracının kusurundan doğabilecek hareketlere uygulanacak trafik cezaları ve yasal sorumluluklar kiracıya aittir. Ara&ccedil; bırakıldıktan sonra D&uuml;zce Vip Oto Kiralamaya ulaşan trafik cezaları kiracıya yansıtılır ve ilgili tutar nakit olarak veya kredi kartı ile kiracıdan tahsil edilir. Ara&ccedil;ların hangi nedenle olursa olsun resmi veya yerel makamlar tarafından tutulması nedeni ile ge&ccedil;ecek zaman s&ouml;zleşme s&uuml;resi i&ccedil;inde kabul edilir.</span></p>', '<p>Kiralama Koşulları</p>', 'araç kiralama,araç,kiralık araç,uygun fiyatlı kiralık araç', 'Kiralama Koşulları', '2023-09-20 08:11:46', '2023-09-20 04:30:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `sli_id` int(11) NOT NULL COMMENT 'sliderid',
  `resim` varchar(300) NOT NULL,
  `sli_baslik` varchar(300) NOT NULL,
  `sli_aciklama` text NOT NULL,
  `sli_aciklama2` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`sli_id`, `resim`, `sli_baslik`, `sli_aciklama`, `sli_aciklama2`, `updated_at`, `created_at`) VALUES
(1, 'storage/img/anasayfa11695504009.jpg', 'Slider1', 'Slider1 Açıklama', 'Slider1 Açıklama2', '2023-09-23 18:20:09', NULL),
(6, 'storage/img/anasyafa21695503996.jpg', 'drhssgs', 'sgs', 'segse', '2023-09-23 18:19:56', '2023-09-16 20:03:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transfer_hizmet`
--

CREATE TABLE `transfer_hizmet` (
  `t_id` int(11) NOT NULL COMMENT 'thizmet',
  `alis_yeri` int(11) NOT NULL,
  `donus_yeri` int(11) NOT NULL,
  `mesafe` int(11) NOT NULL,
  `kisi_baslangic` int(11) NOT NULL,
  `kisi_bitis` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `para_birim_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `transfer_hizmet`
--

INSERT INTO `transfer_hizmet` (`t_id`, `alis_yeri`, `donus_yeri`, `mesafe`, `kisi_baslangic`, `kisi_bitis`, `fiyat`, `para_birim_id`, `updated_at`, `created_at`) VALUES
(1, 1, 3, 300, 1, 4, 1000, 1, '2023-09-09 16:10:14', '2023-09-09 11:17:52'),
(2, 1, 3, 300, 5, 8, 2000, 1, '2023-09-18 08:42:08', '2023-09-18 08:42:08'),
(4, 1, 3, 300, 9, 15, 3000, 1, NULL, NULL),
(5, 1, 3, 300, 16, 30, 5000, 1, NULL, NULL),
(6, 1, 4, 200, 1, 4, 900, 1, '2023-09-09 16:10:14', '2023-09-09 11:17:52'),
(7, 1, 4, 200, 5, 8, 1800, 1, '2023-09-09 16:10:14', '2023-09-09 11:17:52'),
(8, 1, 4, 200, 9, 15, 2700, 1, '2023-09-09 16:10:14', '2023-09-09 11:17:52'),
(9, 1, 4, 200, 16, 30, 5000, 1, '2023-09-09 16:10:14', '2023-09-09 11:17:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transfer_rezarvasyon`
--

CREATE TABLE `transfer_rezarvasyon` (
  `tra_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `mus_id` int(11) NOT NULL,
  `rez_kod` varchar(8) DEFAULT NULL,
  `onay` int(11) DEFAULT NULL COMMENT 'null ise onay bekliyor\r\n1 ise onaylandı\r\n0 ise red edildi',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `alis_tarihi` date NOT NULL,
  `donus_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `transfer_rezarvasyon`
--

INSERT INTO `transfer_rezarvasyon` (`tra_id`, `t_id`, `mus_id`, `rez_kod`, `onay`, `updated_at`, `created_at`, `alis_tarihi`, `donus_tarihi`) VALUES
(1, 1, 1, '125rt856', NULL, '2023-09-21 13:53:55', '2023-09-21 13:53:55', '0000-00-00', '0000-00-00'),
(2, 1, 6, '125rt856', NULL, '2023-09-21 13:59:46', '2023-09-21 13:59:46', '0000-00-00', '0000-00-00'),
(3, 8, 6, NULL, NULL, '2023-09-21 14:08:10', '2023-09-21 14:08:10', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `translate`
--

CREATE TABLE `translate` (
  `translate_id` int(11) NOT NULL,
  `unic_name` text NOT NULL,
  `name` text NOT NULL,
  `language_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `translate`
--

INSERT INTO `translate` (`translate_id`, `unic_name`, `name`, `language_id`, `updated_at`, `created_at`) VALUES
(3, 'Computer Programmer', 'Bilgisayar Programcısı', 1, NULL, NULL),
(4, 'Computer Programmer', 'Computer Programmer', 2, NULL, NULL),
(5, 'Profil', 'Profil', 1, NULL, NULL),
(6, 'Çıkış', 'Çıkış', 1, NULL, NULL),
(7, 'Araçlar', 'Araçlar', 1, NULL, NULL),
(8, 'Haberler', 'Haberler', 1, NULL, NULL),
(9, 'Mesajlar', 'Mesajlar', 1, NULL, NULL),
(10, 'Kiralanan Araçlar', 'Kiralanan Araçlar', 1, NULL, NULL),
(11, 'Müşteriler', 'Müşteriler', 1, NULL, NULL),
(13, 'Slider', 'Slider', 1, NULL, NULL),
(14, 'Transferler', 'Transferler', 1, NULL, NULL),
(15, 'Genel Ayarlar', 'Genel Ayarlar', 1, NULL, NULL),
(16, 'Araç Fiyatları', 'Araç Fiyatları', 1, NULL, NULL),
(17, 'Araç Ofisleri', 'Araç Ofisleri', 1, NULL, NULL),
(18, 'Ayarlar', 'Ayarlar', 1, NULL, NULL),
(19, 'İl', 'İl', 1, NULL, NULL),
(20, 'Diller', 'Diller', 1, NULL, NULL),
(21, 'Markalar', 'Markalar', 1, NULL, NULL),
(22, 'Modeller', 'Modeller', 1, NULL, NULL),
(23, 'Para Birimleri', 'Para Birimleri', 1, NULL, NULL),
(24, 'Rezarvasyon Extraları', 'Rezarvasyon Extraları', 1, NULL, NULL),
(25, 'Çeviri', 'Çeviri', 1, NULL, NULL),
(26, 'Araç', 'Araç', 1, '2023-09-11 10:14:02', '2023-09-11 10:14:02'),
(27, 'Sayfalar', 'Sayfalar', 1, NULL, NULL),
(28, 'İlce', 'İlce', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(200) NOT NULL,
  `sifre` varchar(200) NOT NULL,
  `kullanici_adi` varchar(200) NOT NULL,
  `e_posta` varchar(300) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `ad_soyad`, `sifre`, `kullanici_adi`, `e_posta`, `updated_at`, `created_at`) VALUES
(1, 'sinan bedir', '25d55ad283aa400af464c76d713c07ad', 'sinanbedir', 'sinanbedir1907@gmail.com', '2023-09-16 17:10:09', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL COMMENT 'uyeid',
  `uye_adi` varchar(250) NOT NULL,
  `uye_soyadi` varchar(250) NOT NULL,
  `d_tarih` date NOT NULL,
  `cep_tel` bigint(20) NOT NULL,
  `e_posta` varchar(250) NOT NULL,
  `password` varchar(300) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_adi`, `uye_soyadi`, `d_tarih`, `cep_tel`, `e_posta`, `password`, `updated_at`, `created_at`) VALUES
(5, 'sinan', 'bedir', '1995-08-21', 5453155802, 'sinanbedir1907@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2023-09-28 04:56:11', '2023-09-25 08:24:32'),
(8, 'aliiiiiiiiiiiiiiiiiiiiiiiiiii', 'bedirich', '2023-09-26', 5555555555, 'ali@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', '2023-09-26 16:56:57', '2023-09-26 08:24:43'),
(9, 'yasin', 'turko', '2023-09-12', 5555555555, 'yasin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2023-09-26 09:51:58', '2023-09-26 09:51:58');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arac`
--
ALTER TABLE `arac`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `ofis_id` (`ofis_id`),
  ADD KEY `mr_id` (`mr_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Tablo için indeksler `arac_fiyati`
--
ALTER TABLE `arac_fiyati`
  ADD PRIMARY KEY (`a_fiyat_id`),
  ADD KEY `arac_id` (`arac_id`),
  ADD KEY `para_birim_id` (`para_birim_id`);

--
-- Tablo için indeksler `arac_ofis`
--
ALTER TABLE `arac_ofis`
  ADD PRIMARY KEY (`ofis_id`),
  ADD KEY `arac_ofis_ibfk_1` (`ilce_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `haber_duyuru`
--
ALTER TABLE `haber_duyuru`
  ADD PRIMARY KEY (`haber_id`);

--
-- Tablo için indeksler `il`
--
ALTER TABLE `il`
  ADD PRIMARY KEY (`il_id`);

--
-- Tablo için indeksler `ilce`
--
ALTER TABLE `ilce`
  ADD PRIMARY KEY (`ilce_id`),
  ADD KEY `il_id` (`il_id`);

--
-- Tablo için indeksler `iletisim_mesajlari`
--
ALTER TABLE `iletisim_mesajlari`
  ADD PRIMARY KEY (`ilet_id`);

--
-- Tablo için indeksler `kiralanan_arac`
--
ALTER TABLE `kiralanan_arac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arac_id` (`arac_id`),
  ADD KEY `alis_yeri_id` (`alis_yeri_id`),
  ADD KEY `donus_yeri_id` (`donus_yeri_id`),
  ADD KEY `para_birim_id` (`para_birim_id`),
  ADD KEY `musteri_id` (`musteri_id`);

--
-- Tablo için indeksler `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Tablo için indeksler `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`mr_id`);

--
-- Tablo için indeksler `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `mr_id` (`mr_id`);

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`mus_id`);

--
-- Tablo için indeksler `para_birimi`
--
ALTER TABLE `para_birimi`
  ADD PRIMARY KEY (`para_birim_id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `rezervasyon_extralari`
--
ALTER TABLE `rezervasyon_extralari`
  ADD PRIMARY KEY (`rez_id`),
  ADD KEY `para_birim_id` (`para_birim_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sli_id`);

--
-- Tablo için indeksler `transfer_hizmet`
--
ALTER TABLE `transfer_hizmet`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `para_birim_id` (`para_birim_id`),
  ADD KEY `transfer_hizmet_ibfk_2` (`alis_yeri`),
  ADD KEY `transfer_hizmet_ibfk_3` (`donus_yeri`);

--
-- Tablo için indeksler `transfer_rezarvasyon`
--
ALTER TABLE `transfer_rezarvasyon`
  ADD PRIMARY KEY (`tra_id`),
  ADD KEY `mus_id` (`mus_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Tablo için indeksler `translate`
--
ALTER TABLE `translate`
  ADD PRIMARY KEY (`translate_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac`
--
ALTER TABLE `arac`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `arac_fiyati`
--
ALTER TABLE `arac_fiyati`
  MODIFY `a_fiyat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'aracfiyatı', AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `arac_ofis`
--
ALTER TABLE `arac_ofis`
  MODIFY `ofis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ayarlar', AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `haber_duyuru`
--
ALTER TABLE `haber_duyuru`
  MODIFY `haber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `il`
--
ALTER TABLE `il`
  MODIFY `il_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ilce`
--
ALTER TABLE `ilce`
  MODIFY `ilce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim_mesajlari`
--
ALTER TABLE `iletisim_mesajlari`
  MODIFY `ilet_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'iletişim', AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `kiralanan_arac`
--
ALTER TABLE `kiralanan_arac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `languages`
--
ALTER TABLE `languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `marka`
--
ALTER TABLE `marka`
  MODIFY `mr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `model`
--
ALTER TABLE `model`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `mus_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'musteriid', AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `para_birimi`
--
ALTER TABLE `para_birimi`
  MODIFY `para_birim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon_extralari`
--
ALTER TABLE `rezervasyon_extralari`
  MODIFY `rez_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'rezervasyonid', AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `sayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `sli_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'sliderid', AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `transfer_hizmet`
--
ALTER TABLE `transfer_hizmet`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'thizmet', AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `transfer_rezarvasyon`
--
ALTER TABLE `transfer_rezarvasyon`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `translate`
--
ALTER TABLE `translate`
  MODIFY `translate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'uyeid', AUTO_INCREMENT=10;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `arac`
--
ALTER TABLE `arac`
  ADD CONSTRAINT `arac_ibfk_1` FOREIGN KEY (`ofis_id`) REFERENCES `arac_ofis` (`ofis_id`),
  ADD CONSTRAINT `arac_ibfk_2` FOREIGN KEY (`mr_id`) REFERENCES `marka` (`mr_id`),
  ADD CONSTRAINT `arac_ibfk_3` FOREIGN KEY (`m_id`) REFERENCES `model` (`m_id`);

--
-- Tablo kısıtlamaları `arac_fiyati`
--
ALTER TABLE `arac_fiyati`
  ADD CONSTRAINT `arac_fiyati_ibfk_1` FOREIGN KEY (`arac_id`) REFERENCES `arac` (`a_id`),
  ADD CONSTRAINT `arac_fiyati_ibfk_2` FOREIGN KEY (`para_birim_id`) REFERENCES `para_birimi` (`para_birim_id`);

--
-- Tablo kısıtlamaları `arac_ofis`
--
ALTER TABLE `arac_ofis`
  ADD CONSTRAINT `arac_ofis_ibfk_1` FOREIGN KEY (`ilce_id`) REFERENCES `ilce` (`ilce_id`);

--
-- Tablo kısıtlamaları `ilce`
--
ALTER TABLE `ilce`
  ADD CONSTRAINT `ilce_ibfk_1` FOREIGN KEY (`il_id`) REFERENCES `il` (`il_id`);

--
-- Tablo kısıtlamaları `kiralanan_arac`
--
ALTER TABLE `kiralanan_arac`
  ADD CONSTRAINT `kiralanan_arac_ibfk_1` FOREIGN KEY (`arac_id`) REFERENCES `arac` (`a_id`),
  ADD CONSTRAINT `kiralanan_arac_ibfk_2` FOREIGN KEY (`alis_yeri_id`) REFERENCES `arac_ofis` (`ofis_id`),
  ADD CONSTRAINT `kiralanan_arac_ibfk_3` FOREIGN KEY (`donus_yeri_id`) REFERENCES `arac_ofis` (`ofis_id`),
  ADD CONSTRAINT `kiralanan_arac_ibfk_4` FOREIGN KEY (`para_birim_id`) REFERENCES `para_birimi` (`para_birim_id`),
  ADD CONSTRAINT `kiralanan_arac_ibfk_5` FOREIGN KEY (`musteri_id`) REFERENCES `musteri` (`mus_id`);

--
-- Tablo kısıtlamaları `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`mr_id`) REFERENCES `marka` (`mr_id`);

--
-- Tablo kısıtlamaları `rezervasyon_extralari`
--
ALTER TABLE `rezervasyon_extralari`
  ADD CONSTRAINT `rezervasyon_extralari_ibfk_1` FOREIGN KEY (`para_birim_id`) REFERENCES `para_birimi` (`para_birim_id`);

--
-- Tablo kısıtlamaları `transfer_hizmet`
--
ALTER TABLE `transfer_hizmet`
  ADD CONSTRAINT `transfer_hizmet_ibfk_1` FOREIGN KEY (`para_birim_id`) REFERENCES `para_birimi` (`para_birim_id`),
  ADD CONSTRAINT `transfer_hizmet_ibfk_2` FOREIGN KEY (`alis_yeri`) REFERENCES `ilce` (`ilce_id`),
  ADD CONSTRAINT `transfer_hizmet_ibfk_3` FOREIGN KEY (`donus_yeri`) REFERENCES `ilce` (`ilce_id`);

--
-- Tablo kısıtlamaları `transfer_rezarvasyon`
--
ALTER TABLE `transfer_rezarvasyon`
  ADD CONSTRAINT `transfer_rezarvasyon_ibfk_1` FOREIGN KEY (`mus_id`) REFERENCES `musteri` (`mus_id`),
  ADD CONSTRAINT `transfer_rezarvasyon_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `transfer_hizmet` (`t_id`);

--
-- Tablo kısıtlamaları `translate`
--
ALTER TABLE `translate`
  ADD CONSTRAINT `translate_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`language_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
