-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2025 pada 00.23
-- Versi server: 10.4.32-MariaDB-log
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tormid_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `nama`, `logo`, `created_at`) VALUES
(1, 'Axioo', 'axioo.jpg', '2025-12-22 17:12:53'),
(2, 'Lenovo', 'lenovo.png', '2025-12-22 17:12:53'),
(3, 'Asus', 'asus.png', '2025-12-22 17:12:53'),
(4, 'Acer', 'acer.jpg', '2025-12-22 17:12:53'),
(5, 'MSI', 'msi.png', '2025-12-22 17:12:53'),
(6, 'Microsoft', 'microsoft.jpg', '2025-12-23 16:26:16'),
(7, 'Sony', 'sony.png', '2025-12-23 16:26:16'),
(8, 'Nintendo', 'nintendo.png', '2025-12-23 16:26:16'),
(9, 'Razer', 'razer.jpg', '2025-12-23 16:26:16'),
(10, '8BitDo', '8bitdo.png', '2025-12-23 16:26:16'),
(11, 'SteelSeries', 'steelseries.png', '2025-12-23 16:26:16'),
(12, 'Thrustmaster', 'thrustmaster.jpg', '2025-12-23 16:26:16'),
(13, 'GameSir', 'gamesir.png', '2025-12-23 16:26:16'),
(14, 'HyperX', 'hyperx.png', '2025-12-23 16:26:16'),
(15, 'Logitech', 'logitech.png', '2025-12-23 16:26:16'),
(16, 'Corsair', 'corsair.webp', '2025-12-23 16:26:16'),
(17, 'Sennheiser', 'sennheiser.png', '2025-12-23 16:26:16'),
(18, 'Cooler Master', 'coolermaster.png', '2025-12-23 16:26:16'),
(19, 'Keychron', 'keychron.webp', '2025-12-23 16:26:16'),
(20, 'Varmilo', 'varmilo.png', '2025-12-23 16:26:16'),
(28, 'Epson', 'epson.png', '2025-12-23 17:26:45'),
(29, 'Canon', 'canon.png', '2025-12-23 17:26:45'),
(30, 'HP', 'hp.png', '2025-12-23 17:26:45'),
(31, 'Brother', 'brother.png', '2025-12-23 17:26:45'),
(32, 'Samsung', 'samsung.png', '2025-12-23 17:32:19'),
(33, 'LG', 'lg.jpg', '2025-12-23 17:32:19'),
(38, 'G.Skill', 'gskill.png', '2025-12-23 17:59:10'),
(39, 'Kingston', 'kingston.png', '2025-12-23 17:59:10'),
(40, 'TeamGroup', 'teamgroup.png', '2025-12-23 17:59:10'),
(41, 'Crucial', 'crucial.png', '2025-12-23 17:59:10'),
(42, 'PNY', 'pny.png', '2025-12-23 17:59:10'),
(43, 'Patriot', 'patriot.jpeg', '2025-12-23 17:59:10'),
(44, 'Gigabyte', 'gigabyte.png', '2025-12-23 17:59:10'),
(45, 'ASRock', 'asrock.png', '2025-12-23 17:59:10'),
(46, 'Intel', 'intel.png', '2025-12-23 17:59:10'),
(47, 'AMD', 'amd.webp', '2025-12-23 17:59:10'),
(51, 'EVGA', 'evga.png', '2025-12-23 18:01:47'),
(52, 'Seasonic', 'seasonic.png', '2025-12-23 18:01:47'),
(53, 'Thermaltake', 'thermaltake.png', '2025-12-23 18:01:47'),
(54, 'Be Quiet!', 'bequiet.png', '2025-12-23 18:01:47'),
(55, 'SilverStone', 'silverstone.png', '2025-12-23 18:01:47'),
(56, 'NVIDIA', 'nvidia.png', '2025-12-23 18:01:47'),
(57, 'Sapphire', 'sapphire.png', '2025-12-23 18:01:47'),
(58, 'PowerColor', 'powercolor.png', '2025-12-23 18:01:47'),
(59, 'ZOTAC', 'zotac.png', '2025-12-23 18:01:47'),
(60, 'XFX', 'xfx.png', '2025-12-23 18:01:47'),
(61, 'WD', 'wd.jpg', '2025-12-23 18:01:47'),
(62, 'Seagate', 'seagate.png', '2025-12-23 18:01:47'),
(63, 'Sabrent', 'sabrent.png', '2025-12-23 18:01:47'),
(64, 'ADATA', 'adata.png', '2025-12-23 18:01:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama`, `icon`) VALUES
(1, 'Laptop', 'laptop.jpg'),
(2, 'PC & AIO', 'pcpart.jpg'),
(3, 'Monitor', 'monitor.jpg'),
(4, 'Printer', 'printer.jpg'),
(5, 'Accessories', 'aksesoris.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `nama`, `email`, `pesan`, `created_at`) VALUES
(1, 'Budi Santoso', 'budi@gmail.com', 'Apakah laptop gaming tersedia cicilan?', '2025-12-18 12:53:41'),
(2, 'Siti Aminah', 'siti@yahoo.com', 'Saya butuh rekomendasi laptop editing video.', '2025-12-18 12:53:41'),
(3, 'ad', 'asdafwea@gmail.com', 'adawFA', '2025-12-23 21:28:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `nama`, `alamat`, `total`, `created_at`) VALUES
(2, 7, 'hakim', '4AFFAEGAERWGWERA', 8170000, '2025-12-24 04:28:33'),
(3, 7, 'ad', 'adadw', 15462412, '2025-12-24 06:21:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `produk_nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `produk_nama`, `harga`, `qty`) VALUES
(1, 1, 'ASUS TUF Gaming A15', 13500000, 1),
(2, 2, 'Intel Core i9-14900K', 8150000, 1),
(3, 3, 'ThinkCentre Neo 50s Gen 5 Intel SFF', 15442412, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` enum('Laptop','PC & AIO','Monitor','Printer','Accessories') NOT NULL,
  `kebutuhan` enum('gaming','editing','office') NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_promo` tinyint(1) DEFAULT 0,
  `brand` varchar(50) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `kategori`, `kebutuhan`, `harga`, `deskripsi`, `gambar`, `created_at`, `is_promo`, `brand`, `brand_id`) VALUES
(7, 'Xbox Series S X Controller', 'Accessories', 'gaming', 889000, 'Controller presisi terbaik untuk PC & Steam. Compatible Windows 10 via Bluetooth, Windows lama menggunakan kabel USB Type-C.', 'Xbox Series S X.webp', '2025-12-23 16:27:54', 0, NULL, 6),
(8, 'PS5 DualSense Wireless Controller', 'Accessories', 'gaming', 1174000, 'Controller generasi baru dengan Haptic Feedback dan Adaptive Triggers.', 'PS5 DualSense Wireless Controller.webp', '2025-12-23 16:27:54', 0, NULL, 7),
(9, 'Nintendo Switch Pro Controller', 'Accessories', 'gaming', 920000, 'Controller ergonomis dengan kontrol gerak dan HD Rumble.', 'Nintendo Switch Pro Controller.webp', '2025-12-23 16:27:54', 0, NULL, 8),
(10, 'Razer Wolverine V2 Chroma', 'Accessories', 'gaming', 2298000, 'Controller kabel premium dengan tombol Mecha-Tactile.', 'Razer Wolverine V2 Chroma.webp', '2025-12-23 16:27:54', 0, NULL, 9),
(11, '8BitDo Pro 2 Bluetooth Gamepad', 'Accessories', 'gaming', 749000, 'Gamepad multi-platform Bluetooth, 2.4G, dan USB.', '8BitDo Pro 2 Bluetooth Gamepad.webp', '2025-12-23 16:27:54', 0, NULL, 10),
(12, 'MSI Force GC30 V2', 'Accessories', 'gaming', 449000, 'Gamepad multi-platform dengan Hall-effect trigger.', 'MSI Force GC30 V2.webp', '2025-12-23 16:27:54', 0, NULL, 5),
(13, 'SteelSeries Stratus Duo', 'Accessories', 'gaming', 1755000, 'Controller wireless Bluetooth & 2.4GHz.', 'SteelSeries Stratus Duo.webp', '2025-12-23 16:27:54', 0, NULL, 11),
(14, 'Thrustmaster eSwap Pro', 'Accessories', 'gaming', 2750000, 'Controller modular profesional T-MOD.', 'Thrustmaster eSwap Pro.webp', '2025-12-23 16:27:54', 0, NULL, 12),
(15, 'GameSir T4 Pro', 'Accessories', 'gaming', 408000, 'Gamepad wireless & wired multi-platform.', 'GameSir T4 Pro.webp', '2025-12-23 16:27:54', 0, NULL, 13),
(16, 'Force GC30 Monster Hunter Edition', 'Accessories', 'gaming', 2927418, 'Controller edisi terbatas Monster Hunter.', 'FORCE GC30 MONSTER HUNTER EDITION.png', '2025-12-23 16:27:54', 0, NULL, 5),
(17, 'HyperX Cloud II Wireless', 'Accessories', '', 2398000, 'Headset wireless baterai hingga 120 jam.', 'product_1766520208.webp', '2025-12-23 16:27:54', 0, NULL, 14),
(18, 'SteelSeries Arctis Nova Pro Wireless', 'Accessories', 'gaming', 6378000, 'Headset flagship dengan ANC & dual wireless.', 'SteelSeries Arctis Nova Pro.webp', '2025-12-23 16:27:54', 0, NULL, 11),
(19, 'Razer BlackShark V2 Pro', 'Accessories', 'gaming', 2469000, 'Wireless esports headset ringan.', 'Razer BlackShark V2 Pro.webp', '2025-12-23 16:27:54', 0, NULL, 9),
(20, 'Logitech G Pro X Gaming Headset', 'Accessories', 'gaming', 1299000, 'Headset esports driver PRO-G.', 'Logitech G Pro X Gaming Headset.webp', '2025-12-23 16:27:54', 0, NULL, 15),
(21, 'Corsair HS80 RGB Wireless', 'Accessories', 'gaming', 3999000, 'Headset wireless Dolby Atmos.', 'Corsair HS80 RGB Wireless.webp', '2025-12-23 16:27:54', 0, NULL, 16),
(22, 'Sennheiser Game Zero', 'Accessories', 'gaming', 640000, 'Headset closed-back fokus kompetitif.', 'Sennheiser Game Zero.webp', '2025-12-23 16:27:54', 0, NULL, 17),
(23, 'ASUS ROG Delta S Animate', 'Accessories', 'gaming', 3571000, 'USB gaming headset ESS DAC.', 'ASUS ROG Delta S Animate.webp', '2025-12-23 16:27:54', 0, NULL, 3),
(24, 'Razer Kraken V3 Hypersense', 'Accessories', 'gaming', 899000, 'Headset dengan haptic feedback.', 'Razer Kraken V3 Hypersense.webp', '2025-12-23 16:27:54', 0, NULL, 9),
(25, 'SteelSeries Arctis 7 Plus', 'Accessories', '', 2495000, 'Wireless headset USB-C.', 'product_1766520254.webp', '2025-12-23 16:27:54', 0, NULL, 11),
(26, 'Cooler Master MH751', 'Accessories', 'gaming', 1250000, 'Headset analog 3.5mm balanced.', 'Cooler Master MH751.webp', '2025-12-23 16:27:54', 0, NULL, 18),
(27, 'Keychron Q1 Version 2 QMK Knob', 'Accessories', 'gaming', 2720000, 'Mechanical keyboard CNC aluminum.', 'Keychron Q1 version 2 QMK.webp', '2025-12-23 16:27:54', 0, NULL, 19),
(28, 'Razer BlackWidow V4 Pro', 'Accessories', 'gaming', 3989000, 'Mechanical keyboard flagship Razer.', 'Razer BlackWidow V4 pro.webp', '2025-12-23 16:27:54', 0, NULL, 9),
(29, 'Corsair K70 RGB Tenkeyless', 'Accessories', 'gaming', 2495000, 'Keyboard TKL performa tinggi.', 'Corsair K70 RGB Tenkeyless.webp', '2025-12-23 16:27:54', 0, NULL, 16),
(30, 'Logitech G915 TKL Wireless', 'Accessories', 'gaming', 1699000, 'Keyboard low-profile wireless.', 'Logitech G915 TKL Wireless.webp', '2025-12-23 16:27:54', 0, NULL, 15),
(31, 'SteelSeries Apex Pro TKL', 'Accessories', 'gaming', 6299000, 'Keyboard OmniPoint adjustable.', 'SteelSeries Apex Pro TKL.webp', '2025-12-23 16:27:54', 0, NULL, 11),
(32, 'Lenovo ThinkPad USB Wired Keyboard', 'Accessories', 'gaming', 1179000, 'Keyboard USB klasik ThinkPad.', 'Lenovo ThinkPad USB wired.webp', '2025-12-23 16:27:54', 0, NULL, 2),
(33, 'AXIOO PONGO U100', 'Accessories', 'gaming', 1000000, 'Mechanical keyboard 75% tri-mode.', 'AXIOO PONGO U100.webp', '2025-12-23 16:27:54', 0, NULL, 1),
(34, 'ASUS ROG Strix Flare II Animate', 'Accessories', 'gaming', 2500000, 'Keyboard AniMe Matrix RGB.', 'ASUS ROG Strix Flare II Animate.webp', '2025-12-23 16:27:54', 0, NULL, 3),
(35, 'Varmilo Sakura 87 Mechanical Keyboard', 'Accessories', 'gaming', 2445000, 'Keyboard mechanical desain Sakura.', 'KEYBOARD MECHANICAL Varmilo Sakura 87.webp', '2025-12-23 16:27:54', 0, NULL, 20),
(36, 'MSI VIGOR GK71 Sonic Red Switch', 'Accessories', 'gaming', 1559000, 'Mechanical keyboard MSI Sonic Red.', 'VIGOR GK71 SONIC - RED SWITCHES.png', '2025-12-23 16:27:54', 0, NULL, 5),
(37, 'Logitech G502 X Plus Wireless', 'Accessories', 'gaming', 2269000, 'Mouse wireless HERO 25K RGB.', 'Logitech G502 X Plus Wireless.webp', '2025-12-23 16:27:54', 0, NULL, 15),
(38, 'Razer DeathAdder V3 Pro', 'Accessories', 'gaming', 2199000, 'Mouse esports ultra ringan.', 'Razer DeathAdder V3 Pro.webp', '2025-12-23 16:27:54', 0, NULL, 9),
(39, 'SteelSeries Rival 3', 'Accessories', 'gaming', 699000, 'Mouse gaming wired RGB.', 'SteelSeries Rival 3.webp', '2025-12-23 16:27:54', 0, NULL, 11),
(40, 'Ignix F3 Pro Wireless', 'Accessories', 'gaming', 509000, 'Mouse ultra-ringan 39g tri-mode.', 'Ignix F3 Pro Wireless.webp', '2025-12-23 16:27:54', 0, NULL, 1),
(41, 'Logitech MX Master 3S', 'Accessories', 'gaming', 1755000, 'Mouse produktivitas premium.', 'Logitech MX Master 3S.webp', '2025-12-23 16:27:54', 0, NULL, 15),
(42, 'Lenovo Professional Bluetooth Mouse', 'Accessories', 'gaming', 498000, 'Mouse profesional Bluetooth.', 'Lenovo Professional Bluetooth Rechargeable Mouse.webp', '2025-12-23 16:27:54', 0, NULL, 2),
(43, 'Mouse M101', 'Accessories', 'gaming', 125000, 'Mouse gaming wired murah.', 'Mouse M101.jpg', '2025-12-23 16:27:54', 0, NULL, 1),
(44, 'Predator Cestus 510 Gaming Mouse', 'Accessories', 'gaming', 1079100, 'Mouse gaming switch Omron.', 'Predator Cestus 510 Gaming Mouse.webp', '2025-12-23 16:27:54', 0, NULL, 4),
(45, 'ROG Strix Impact II Moonlight White', 'Accessories', 'gaming', 608000, 'Mouse gaming ergonomis ASUS.', 'ROG Strix Impact II Moonlight White.webp', '2025-12-23 16:27:54', 0, NULL, 3),
(46, 'CLUTCH GM20 ELITE', 'Accessories', 'gaming', 468000, 'Mouse gaming MSI RGB.', 'CLUTCH GM20 ELITE.png', '2025-12-23 16:27:54', 0, NULL, 5),
(47, 'Printer Epson L3210', 'Printer', 'office', 2110000, 'Printer multifungsi EcoTank dengan fitur print, scan, copy. Mampu mencetak hingga 4.500 halaman hitam dan 7.500 halaman warna. Mendukung borderless photo 4R, resolusi tinggi 5760 x 1440 dpi, refill tinta anti tumpah, dan kompatibel Windows & Mac.', 'Printer Epson L3210.webp', '2025-12-23 17:27:06', 0, NULL, 28),
(48, 'Canon PIXMA G3010', 'Printer', 'office', 2038999, 'Printer ink tank multifungsi dengan WiFi, print scan copy, resolusi 4800 x 1200 dpi, kecepatan cetak 8.8 ipm hitam dan 5 ipm warna, serta dukungan berbagai ukuran kertas hingga Legal.', 'Canon PIXMA G3010.webp', '2025-12-23 17:27:06', 0, NULL, 29),
(49, 'HP LaserJet Pro M15W', 'Printer', 'office', 700000, 'Printer laser mono paling ringkas dari HP dengan WiFi, kecepatan cetak 19 ppm, resolusi 600 DPI, hemat daya, dan kompatibel Windows serta Mac.', 'HP LASERJET PRO M15W.jpg', '2025-12-23 17:27:06', 0, NULL, 30),
(50, 'Brother HL-L2365DW', 'Printer', 'office', 900000, 'Printer laser mono dengan duplex otomatis, kecepatan cetak 26 ppm, resolusi HQ 1200 dpi, konektivitas USB LAN Wireless, dan toner hingga 5.000 halaman.', 'Brother HL L2365dw.webp', '2025-12-23 17:27:06', 0, NULL, 31),
(51, 'Epson EcoTank L121', 'Printer', 'office', 1534000, 'Printer ink tank dengan kecepatan cetak 9 ipm hitam dan 4.8 ipm warna, hasil cetak tinggi hingga 7.500 halaman warna, teknologi Heat-Free, dan garansi hingga 2 tahun.', 'Epson EcoTank L121.webp', '2025-12-23 17:27:06', 0, NULL, 28),
(52, 'Canon imageCLASS MF244dw', 'Printer', 'office', 6213000, 'Printer laser multifungsi duplex wireless dengan kecepatan cetak 27 ppm, ADF, RAM 512MB, mobile printing support, dan duty cycle hingga 15.000 halaman per bulan.', 'Canon ImageClass MF244dw.webp', '2025-12-23 17:27:06', 0, NULL, 29),
(53, 'HP Ink Tank 315', 'Printer', 'office', 1850000, 'Printer ink tank dengan kualitas cetak tinggi hingga 4800 x 1200 dpi, kecepatan hingga 19 ppm draft, USB connectivity, dan efisiensi tinta tinggi untuk kebutuhan rumahan.', 'HP Ink Tank 315.webp', '2025-12-23 17:27:06', 0, NULL, 30),
(54, 'Brother DCP-T520W', 'Printer', 'office', 2755000, 'Printer ink tank multifungsi dengan WiFi, kecepatan cetak 17 ipm mono dan 9.5 ipm warna, resolusi tinggi hingga 6.000 dpi, serta kapasitas kertas 150 lembar.', 'Brother DCP-T520W.webp', '2025-12-23 17:27:06', 0, NULL, 31),
(55, 'Canon PIXMA TS307', 'Printer', 'office', 625000, 'Printer inkjet warna dengan resolusi 4800 x 1200 dpi, dukungan berbagai ukuran kertas, cartridge PG-745 & CL-746, cocok untuk kebutuhan cetak harian.', 'Canon PIXMA TS307.webp', '2025-12-23 17:27:06', 0, NULL, 29),
(56, 'Epson WorkForce Pro WF-C5790', 'Printer', 'office', 9800000, 'Printer bisnis multifungsi dengan fitur print scan copy fax, kecepatan hingga 25 ipm, duplex otomatis, keamanan tinggi, dukungan cloud & mobile printing, dan kapasitas kertas besar.', 'Epson Workforce Pro WF-C5790.webp', '2025-12-23 17:27:06', 0, NULL, 28),
(57, 'Lenovo Legion R45w-30', 'Monitor', 'gaming', 9604000, 'Monitor ultrawide 44.5 inci resolusi 5120x1440 dengan aspect ratio 32:9, refresh rate hingga 170Hz, response time 0.5ms MPRT, brightness 450 nits, color gamut 99% sRGB dan 95% DCI-P3, mendukung FreeSync Premium Pro, KVM Switch, PIP/PBP, USB-C 75W, dan desain ergonomis.', 'Lenovo Legion R45w-30.webp', '2025-12-23 17:34:08', 0, NULL, 2),
(58, 'ThinkVision P49w-30', 'Monitor', 'editing', 25800000, 'Monitor profesional 49 inci resolusi 5120x1440 dengan panel IPS, akurasi warna Delta E <2, refresh rate 60Hz, Thunderbolt 4 hingga 100W, KVM switch, True Split, Ethernet, dan cocok untuk workstation dan multitasking berat.', 'ThinkVision P49w-30.webp', '2025-12-23 17:34:08', 0, NULL, 2),
(59, 'Samsung Odyssey G7 32 Inch Curved', 'Monitor', 'gaming', 20279000, 'Monitor gaming curved 1000R dengan resolusi WQHD, refresh rate 240Hz, response time 1ms, QLED panel, Infinity Core Lighting, serta dukungan G-Sync dan FreeSync Premium Pro untuk pengalaman gaming ultra smooth.', 'Samsung Odyssey G7 32inch Curved.webp', '2025-12-23 17:34:08', 0, NULL, 32),
(60, 'LG UltraGear 27GP850-B', 'Monitor', 'gaming', 4690000, 'Monitor gaming IPS 27 inci resolusi QHD dengan refresh rate 165Hz (OC 180Hz), response time 1ms GtG, color gamut DCI-P3 98%, HDR support, dan teknologi NVIDIA G-Sync Compatible.', 'LG UltraGear 27GP850-B.webp', '2025-12-23 17:34:08', 0, NULL, 33),
(61, 'Acer SA243Y 23.8 Inch', 'Monitor', 'office', 1400000, 'Monitor IPS 23.8 inci Full HD dengan refresh rate 120Hz, response time 1ms, desain ultra slim, AdaptiveSync, Flicker-less, BlueLightShield, dan cocok untuk kerja serta hiburan harian.', 'Acer SA243Y.webp', '2025-12-23 17:34:08', 0, NULL, 4),
(62, 'Acer Predator X27U OLED', 'Monitor', 'gaming', 17200000, 'Monitor gaming OLED 26.5 inci resolusi QHD dengan refresh rate 240Hz, response time 0.01ms, contrast ratio 1.500.000:1, HDR peak 1000 nits, FreeSync Premium, dan fitur PIP/PBP serta ergonomis.', 'Acer Predator X27U OLED.webp', '2025-12-23 17:34:08', 0, NULL, 4),
(63, 'ProArt Display 6K PA32QCV', 'Monitor', 'editing', 21365000, 'Monitor profesional 31.5 inci resolusi 6K dengan panel IPS, akurasi warna Delta E <2, 98% DCI-P3, Calman Verified, Thunderbolt 4 96W, Auto KVM, dan desain ergonomis untuk content creator.', 'ProArt Display 6K PA32QCV.webp', '2025-12-23 17:34:08', 0, NULL, 3),
(64, 'ROG Strix OLED XG32UCDS', 'Monitor', 'gaming', 18926000, 'Monitor gaming QD-OLED 32 inci resolusi UHD 4K dengan refresh rate 165Hz, response time 0.03ms, DisplayHDR True Black 400, gamut DCI-P3 99%, OLED Care Pro, dan konektivitas HDMI 2.1 serta USB-C.', 'ROG Strix OLED XG32UCDS.webp', '2025-12-23 17:34:08', 0, NULL, 3),
(65, 'PRO MP273 E14A', 'Monitor', '', 2013000, 'Monitor 27 inci dengan refresh rate 144Hz, AMD FreeSync, sertifikasi TÜV Low Blue Light, teknologi MSI EyesErgo, Anti-Flicker, multiple input HDMI DP VGA, dan desain VESA mount.', 'product_1766520183.png', '2025-12-23 17:34:08', 0, NULL, 5),
(66, 'MEG 342C QD-OLED', 'Monitor', 'gaming', 37092600, 'Monitor gaming ultrawide QD-OLED 34 inci resolusi 3440x1440 dengan refresh rate 175Hz, response time 0.1ms, DisplayHDR True Black 400, Delta E ≤2, PIP/PBP/KVM, dan desain premium MSI MEG.', 'MEG 342C QD-OLED.webp', '2025-12-23 17:34:08', 0, NULL, 5),
(67, 'Corsair Vengeance RGB DDR5 32GB (2x16GB)', 'PC & AIO', 'gaming', 7919000, 'RAM DDR5 32GB performa tinggi dengan RGB, mendukung EXPO & XMP, kecepatan hingga 6000MT/s, latency rendah, cocok untuk gaming dan workstation kelas atas.', 'Corsair Vengeance RGB DDR5 32GB (2x16GB).webp', '2025-12-23 17:59:22', 0, NULL, 16),
(68, 'G.Skill Trident Z5 Neo DDR5 32GB', 'PC & AIO', 'gaming', 6128000, 'RAM DDR5 dual channel 32GB dengan kecepatan 6000MHz CL36, dioptimalkan untuk platform AMD, stabil dan cepat untuk gaming serta produktivitas berat.', 'G.Skill Trident Z5 Neo DDR5 32GB.webp', '2025-12-23 17:59:22', 0, NULL, 38),
(69, 'Kingston FURY Beast DDR4 16GB', 'PC & AIO', 'gaming', 1590000, 'RAM DDR4 16GB 3200MHz dengan desain low-profile, mendukung Intel XMP dan AMD Ryzen, cocok untuk upgrade PC harian dan gaming.', 'Kingston FURY Beast DDR4 16GB.webp', '2025-12-23 17:59:22', 0, NULL, 39),
(70, 'TeamGroup T-Force Delta RGB DDR5', 'PC & AIO', 'gaming', 5955000, 'RAM DDR5 RGB 32GB dengan kecepatan 5600MHz, mendukung XMP 3.0, PMIC stabil, on-die ECC, dan pencahayaan RGB lebar.', 'TeamGroup T-Force Delta RGB DDR5.webp', '2025-12-23 17:59:22', 0, NULL, 40),
(71, 'Crucial Pro DDR5 5600MHz 48GB', 'PC & AIO', 'gaming', 2676000, 'RAM DDR5 kapasitas besar 48GB (2x24GB) dengan kecepatan 5600MT/s, mendukung XMP & EXPO, cocok untuk multitasking dan content creation.', 'Crucial Pro DDR5 5600MHz.webp', '2025-12-23 17:59:22', 0, NULL, 41),
(72, 'PNY XLR8 Gaming EPIC-X RGB DDR4', 'PC & AIO', 'gaming', 1695000, 'RAM DDR4 16GB 3600MHz dengan RGB, mendukung XMP, performa stabil untuk gaming dan penggunaan desktop modern.', 'PNY XLR8 Gaming EPIC-X RGB DDR4.webp', '2025-12-23 17:59:22', 0, NULL, 42),
(73, 'Corsair Dominator Titanium DDR5 32GB', 'PC & AIO', 'gaming', 6809000, 'RAM DDR5 premium 32GB dengan RGB, kecepatan 6000MHz, latency rendah, build solid, cocok untuk PC high-end dan enthusiast.', 'Corsair Dominator Titanium DDR5.webp', '2025-12-23 17:59:22', 0, NULL, 16),
(74, 'G.Skill Ripjaws S5 DDR5 32GB', 'PC & AIO', 'gaming', 5844000, 'RAM DDR5 32GB dual channel 6000MT/s, desain minimalis tanpa RGB, performa tinggi untuk gaming dan workstation.', 'G.Skill Ripjaws S5 DDR5.webp', '2025-12-23 17:59:22', 0, NULL, 38),
(75, 'TeamGroup Elite DDR5 4800MHz', 'PC & AIO', 'gaming', 4048000, 'RAM DDR5 dengan kecepatan 4800MHz, hemat daya 1.1V, mendukung on-die ECC, cocok untuk sistem modern yang stabil.', 'TeamGroup Elite DDR5 4800MHz.webp', '2025-12-23 17:59:22', 0, NULL, 40),
(76, 'Patriot Viper Venom DDR5 16GB', 'PC & AIO', 'gaming', 1026000, 'RAM DDR5 16GB 5600MHz dengan XMP 3.0, performa efisien, cocok untuk upgrade PC generasi terbaru.', 'Patriot Viper Venom DDR5.webp', '2025-12-23 17:59:22', 0, NULL, 43),
(77, 'ASUS ROG Maximus Z790 Hero', '', 'gaming', 12399000, 'Motherboard premium chipset Intel Z790 dengan DDR5 hingga 7800+ OC, PCIe 5.0, VRM kuat, fitur overclocking lengkap, cocok untuk build high-end dan enthusiast.', 'ASUS ROG Maximus Z790 Hero.webp', '2025-12-23 17:59:28', 0, NULL, 3),
(78, 'MSI MPG Z790 Carbon WiFi', '', 'gaming', 8499000, 'Motherboard Intel Z790 dengan DDR5 hingga 7800+ OC, PCIe 5.0, WiFi, 5 slot M.2 termasuk Gen5, performa stabil untuk gaming dan workstation.', 'MSI MPG Z790 Carbon Wifi.webp', '2025-12-23 17:59:28', 0, NULL, 5),
(79, 'Gigabyte X670E Aorus Master', '', 'gaming', 8654000, 'Motherboard AMD AM5 chipset X670E dengan PCIe 5.0, DDR5, VRM kuat, cocok untuk Ryzen 7000 series dan sistem performa tinggi.', 'Gigabyte X670E Aorus Master.webp', '2025-12-23 17:59:28', 0, NULL, 44),
(80, 'ASUS TUF Gaming B650-Plus', '', 'gaming', 4290000, 'Motherboard AMD B650 AM5 dengan DDR5, PCIe 5.0 untuk SSD, WiFi 6, LAN 2.5Gb, build tangguh khas TUF Gaming.', 'ASUS TUF Gaming B650-Plus.webp', '2025-12-23 17:59:28', 0, NULL, 3),
(81, 'ASRock Z790 Steel Legend', '', 'gaming', 4995000, 'Motherboard Intel Z790 dengan DDR5 hingga 6800+ OC, PCIe 5.0, desain solid, konektivitas lengkap, cocok untuk gaming dan produktivitas.', 'ASRock Z790 Steel Legend.webp', '2025-12-23 17:59:28', 0, NULL, 45),
(82, 'MSI MAG B760 Tomahawk WiFi', '', 'gaming', 4115000, 'Motherboard Intel B760 dengan DDR5 hingga 7000+ OC, PCIe 5.0, WiFi 6E, thermal kuat, ideal untuk gaming modern.', 'MSI MAG B760 Tomahawk Wifi.webp', '2025-12-23 17:59:28', 0, NULL, 5),
(83, 'ASUS Prime Z790-P', '', 'gaming', 5179000, 'Motherboard Intel Z790 ATX dengan DDR5, PCIe 5.0, 3 slot M.2, konektivitas lengkap untuk PC performa tinggi.', 'ASUS Prime Z790-P.webp', '2025-12-23 17:59:28', 0, NULL, 3),
(84, 'Gigabyte B550 Gaming X V2', '', 'gaming', 2159000, 'Motherboard AMD B550 AM4 dengan DDR4, PCIe 4.0, cocok untuk Ryzen 3000–5000 series dan build gaming menengah.', 'Gigabyte B550 Gaming X V2.webp', '2025-12-23 17:59:28', 0, NULL, 44),
(85, 'ROG Strix X670E-E Gaming WiFi', '', 'gaming', 7536000, 'Motherboard AMD X670E AM5 dengan DDR5, PCIe 5.0, WiFi, desain ROG premium untuk gaming dan performa ekstrem.', 'ROG Strix X670E-E Gaming Wifi.webp', '2025-12-23 17:59:28', 0, NULL, 3),
(86, 'MSI PRO Z790-A WiFi', '', 'gaming', 4764000, 'Motherboard Intel Z790 dengan DDR5 hingga 7800+ OC, PCIe 5.0, WiFi, cocok untuk workstation dan PC produktivitas.', 'MSI PRO Z790-A Wifi.webp', '2025-12-23 17:59:28', 0, NULL, 5),
(87, 'Intel Core i9-14900K', 'PC & AIO', 'gaming', 8150000, 'Processor flagship Intel generasi ke-14 dengan 24 core dan 32 thread, boost hingga 6.0GHz, mendukung DDR4 & DDR5, PCIe 5.0, cocok untuk gaming ekstrem dan workload berat.', 'Intel Core i9-14900K.png', '2025-12-23 17:59:34', 0, NULL, 46),
(88, 'Intel Core i7-14700K', 'PC & AIO', '', 6430000, 'Processor Intel generasi ke-14 dengan 20 core dan 28 thread, performa tinggi untuk gaming dan multitasking, mendukung DDR4 & DDR5 serta PCIe 5.0.', 'product_1766520080.png', '2025-12-23 17:59:34', 0, NULL, 46),
(89, 'Intel Core i5-14600K', 'PC & AIO', '', 4099000, 'Processor Intel generasi ke-14 dengan 14 core dan 20 thread, performa optimal untuk gaming dan produktivitas, unlocked untuk overclocking.', 'product_1766520067.png', '2025-12-23 17:59:34', 0, NULL, 46),
(90, 'Intel Core i3-14100', 'PC & AIO', '', 2815000, 'Processor entry-level Intel generasi ke-14 dengan 4 core 8 thread, hemat daya dan cocok untuk PC kantor serta penggunaan harian.', 'product_1766520051.png', '2025-12-23 17:59:34', 0, NULL, 46),
(91, 'Intel Core i9-13900KS', 'PC & AIO', '', 12154000, 'Processor Intel edisi spesial dengan boost hingga 6.0GHz, 24 core 32 thread, performa ekstrem untuk gaming dan content creation kelas atas.', 'product_1766520108.png', '2025-12-23 17:59:34', 0, NULL, 46),
(92, 'AMD Ryzen 9 7950X3D', 'PC & AIO', '', 12480000, 'Processor AMD Ryzen 9 dengan teknologi 3D V-Cache, 12 core 24 thread, performa luar biasa untuk gaming dan workload berat berbasis AM5.', 'product_1766520143.png', '2025-12-23 17:59:34', 0, NULL, 47),
(93, 'AMD Ryzen 7 7800X3D', 'PC & AIO', 'gaming', 5559000, 'Processor AMD Ryzen 7 dengan 3D V-Cache, 8 core 16 thread, sangat unggul untuk gaming berkat latensi cache rendah.', 'AMD-Ryzen-7-7800X3D.png', '2025-12-23 17:59:34', 0, NULL, 47),
(94, 'AMD Ryzen 5 7600X', 'PC & AIO', 'gaming', 3874000, 'Processor AMD Ryzen 5 berbasis Zen 4 dengan 6 core 12 thread, performa tinggi untuk gaming modern dan produktivitas.', 'AMD-Ryzen-5-7600X.png', '2025-12-23 17:59:34', 0, NULL, 47),
(95, 'AMD Ryzen 9 5900X', 'PC & AIO', 'gaming', 5777600, 'Processor AMD Ryzen 9 AM4 dengan 12 core 24 thread, performa kuat untuk multitasking, rendering, dan gaming.', 'AMD-Ryzen-9-5900X.png', '2025-12-23 17:59:34', 0, NULL, 47),
(96, 'AMD Ryzen 7 5700X', 'PC & AIO', 'gaming', 1679520, 'Processor AMD Ryzen 7 AM4 dengan 8 core 16 thread, efisien dan bertenaga untuk gaming serta kerja harian.', 'AMD-Ryzen-7-5700X.png', '2025-12-23 17:59:34', 0, NULL, 47),
(97, 'Corsair RM850x 850W Gold', '', 'gaming', 2670000, 'PSU fully modular 850W dengan sertifikasi Cybenetics Gold, standar ATX 3.1, dukungan PCIe 5.1 dan konektor native 12V-2x6, kapasitor Jepang 105°C, kipas 140mm FDB low-noise dengan Zero RPM mode, dan garansi 10 tahun.', 'Corsair RM850x 850W Gold.webp', '2025-12-23 18:01:57', 0, NULL, 16),
(98, 'EVGA SuperNOVA 850GT 80 Plus Gold', '', 'gaming', 2465000, 'Power supply 850W fully modular dengan sertifikasi 80 Plus Gold, kapasitor Jepang, kipas FDB dengan ECO mode, proteksi lengkap OVP UVP OCP OPP SCP OTP, serta manajemen kabel rapi dan garansi 7 tahun.', 'EVGA SuperNOVA 850GT 80 Plus Gold.webp', '2025-12-23 18:01:57', 0, NULL, 51),
(99, 'Seasonic Focus GX-750 Gold', '', 'gaming', 1535000, 'PSU 750W fully modular dengan sertifikasi 80 Plus Gold, kipas FDB fanless hingga 30% load, proteksi lengkap, kabel flat hitam, efisiensi tinggi, dan garansi resmi 10 tahun.', 'Seasonic Focus GX-750 Gold.webp', '2025-12-23 18:01:57', 0, NULL, 52),
(100, 'MSI MPG A1000G PCIE5', '', 'gaming', 2467000, 'Power supply 1000W fully modular bersertifikasi 80 Plus Gold, mendukung PCIe 5.0, kipas 135mm FDB, active PFC, power excursion hingga 235%, dan siap untuk GPU generasi terbaru.', 'MSI MPG A1000G PCIE5.webp', '2025-12-23 18:01:57', 0, NULL, 5),
(101, 'ASUS ROG Thor 1000W Platinum II', '', 'gaming', 5595000, 'PSU premium 1000W sertifikasi 80 Plus Platinum dengan desain ROG, proteksi lengkap, kapasitor berkualitas tinggi, kabel sleeved, pencahayaan RGB, dan paket konektor lengkap untuk sistem high-end.', 'ASUS ROG Thor 1000W Platinum II.webp', '2025-12-23 18:01:57', 0, NULL, 3),
(102, 'Cooler Master V850 Gold V2', 'Accessories', '', 2081600, 'PSU 850W fully modular dengan sertifikasi 80 Plus Gold, kipas 135mm FDB, single +12V rail, efisiensi tinggi, proteksi lengkap, dan cocok untuk PC gaming performa tinggi.', 'Cooler Master V850 Gold V2.webp', '2025-12-23 18:01:57', 0, NULL, 18),
(103, 'Thermaltake Toughpower GF3 1200W', '', 'gaming', 3370000, 'Power supply 1200W bersertifikasi 80 Plus Gold, mendukung PCIe Gen 5 dengan konektor 12+4 pin, kipas fluid bearing 135mm, proteksi lengkap, dan siap untuk build ekstrem.', 'Thermaltake Toughpower GF3 1200W.webp', '2025-12-23 18:01:57', 0, NULL, 53),
(104, 'Be Quiet Straight Power 11 750W', 'Accessories', '', 2455000, 'PSU 750W modular dengan desain low-noise khas Be Quiet!, efisiensi tinggi, topology LLC + DC/DC, operasi senyap, dan daya stabil untuk sistem premium.', 'product_1766519987.webp', '2025-12-23 18:01:57', 0, NULL, 54),
(105, 'SilverStone ST75F-GS 750W', '', 'gaming', 1690000, 'Power supply 750W sertifikasi 80 Plus Gold dengan desain ATX, efisiensi tinggi, kipas 120mm silent fan, proteksi lengkap, dan kompatibel dengan GPU modern.', 'SilverStone ST75F-GS 750W.webp', '2025-12-23 18:01:57', 0, NULL, 55),
(106, 'Corsair SF750 80 Plus Platinum', '', 'gaming', 2805000, 'PSU SFX 750W bersertifikasi 80 Plus Platinum, fully modular, kipas 92mm low-noise dengan Zero RPM mode, kapasitor Jepang, bracket SFX-to-ATX, dan cocok untuk PC ITX performa tinggi.', 'Corsair SF750 80 Plus Platinum.webp', '2025-12-23 18:01:57', 0, NULL, 16),
(107, 'NVIDIA GeForce RTX 4090 Founders Edition', 'PC & AIO', 'gaming', 60000000, 'GPU flagship berbasis arsitektur NVIDIA Ada Lovelace dengan 16384 CUDA Cores, memori GDDR6X 24GB, ray tracing generasi ketiga, DLSS 3.5, performa AI hingga 1321 TOPS, mendukung gaming 4K 240Hz dan 8K 60Hz dengan HDR.', 'NVIDIA GeForce RTX 4090 Founders Edition.jpg', '2025-12-23 18:02:03', 0, NULL, 56),
(108, 'ASUS ROG Strix RTX 4080 Super', 'PC & AIO', 'gaming', 21720000, 'VGA gaming premium RTX 4080 SUPER dengan 16GB GDDR6X, clock tinggi hingga 2670MHz, desain ROG Strix pendinginan besar, dukungan ray tracing, DLSS 3, dan AURA SYNC RGB.', 'ASUS ROG Strix RTX 4080 Super.webp', '2025-12-23 18:02:03', 0, NULL, 3),
(109, 'MSI Gaming X Slim RTX 4070 Ti', 'PC & AIO', 'gaming', 16895000, 'RTX 4070 Ti SUPER dari MSI dengan desain Slim, 16GB GDDR6X, boost clock hingga 2670MHz, konsumsi daya efisien, pendinginan optimal, dan performa tinggi untuk gaming 1440p hingga 4K.', 'MSI Gaming X Slim RTX 4070 Ti.webp', '2025-12-23 18:02:03', 0, NULL, 5),
(110, 'AMD Radeon RX 7900 XTX', 'PC & AIO', 'gaming', 16952375, 'GPU flagship AMD RDNA 3 dengan 24GB GDDR6, DisplayPort 2.1, performa tinggi untuk gaming 4K, dukungan ray tracing, dan bandwidth besar dengan memory bus 384-bit.', 'AMD Radeon RX 7900 XTX.webp', '2025-12-23 18:02:03', 0, NULL, 47),
(111, 'Sapphire Pulse Radeon RX 7800 XT', 'PC & AIO', 'gaming', 9075350, 'VGA AMD RX 7800 XT berbasis RDNA 3 dengan 16GB GDDR6, performa solid untuk gaming 4K, pendinginan triple fan, dan efisiensi daya optimal.', 'Sapphire Pulse Radeon RX 7800 XT.webp', '2025-12-23 18:02:03', 0, NULL, 57),
(112, 'Gigabyte GeForce RTX 4060 Ti Eagle', 'PC & AIO', 'gaming', 5592000, 'RTX 4060 Ti dengan desain Eagle, 8GB GDDR6, DLSS 3, ray tracing, konsumsi daya rendah, dan cocok untuk gaming 1080p hingga 1440p.', 'Gigabyte GeForce RTX 4060 Ti Eagle.webp', '2025-12-23 18:02:03', 0, NULL, 44),
(113, 'PowerColor Hellhound RX 7600', 'PC & AIO', 'gaming', 3791667, 'GPU AMD RX 7600 dengan 8GB GDDR6, performa efisien untuk gaming 1080p, desain Hellhound pendinginan optimal, dan konsumsi daya rendah.', 'PowerColor Hellhound RX 7600.webp', '2025-12-23 18:02:03', 0, NULL, 58),
(114, 'ASUS Dual GeForce RTX 3060', 'PC & AIO', 'gaming', 4930000, 'VGA RTX 3060 12GB GDDR6 dengan desain dual fan, ray tracing dan DLSS, cocok untuk gaming modern dan content creation.', 'ASUS Dual GeForce RTX 3060.webp', '2025-12-23 18:02:03', 0, NULL, 3),
(115, 'ZOTAC Gaming RTX 4070 Super', 'PC & AIO', 'gaming', 8532470, 'RTX 4070 Ti SUPER dari ZOTAC dengan 16GB GDDR6X, IceStorm 2.0 cooling, performa tinggi untuk gaming 1440p dan 4K, serta dukungan DLSS 3.', 'ZOTAC Gaming RTX 4070 Super.webp', '2025-12-23 18:02:03', 0, NULL, 59),
(116, 'XFX Speedster QICK 319 RX 6700 XT', 'PC & AIO', 'gaming', 5788000, 'VGA AMD RX 6700 XT dengan 12GB GDDR6, desain triple fan Speedster QICK, performa kuat untuk gaming 1440p, dan pendinginan agresif.', 'XFX Speedster QICK 319 RX 6700 XT.webp', '2025-12-23 18:02:03', 0, NULL, 60),
(117, 'Samsung 990 Pro 2TB NVMe M.2', 'PC & AIO', 'editing', 4917000, 'SSD NVMe Gen4 kelas flagship dengan kecepatan baca hingga 7450MB/s dan tulis 6900MB/s, menggunakan Samsung V-NAND, controller in-house, daya tahan tinggi hingga 1200TBW, ideal untuk gaming dan profesional.', 'Samsung 990 Pro 2TB NVMe M.2.webp', '2025-12-23 18:02:17', 0, NULL, 32),
(118, 'WD Black SN850X 1TB NVMe', 'PC & AIO', 'editing', 2671000, 'SSD NVMe PCIe Gen4 berperforma tinggi dengan kecepatan baca hingga 7300MB/s, dirancang untuk PC gaming dan PlayStation 5, latency rendah dan endurance 600TBW.', 'WD Black SN850X 1TB NVMe.webp', '2025-12-23 18:02:17', 0, NULL, 61),
(119, 'Seagate Barracuda 2TB HDD 7200RPM', 'PC & AIO', 'editing', 1430000, 'Harddisk desktop 3.5 inch dengan kapasitas 2TB, kecepatan 7200RPM, cache besar 256MB, cocok untuk penyimpanan data besar dan sistem PC harian.', 'Seagate Barracuda 2TB HDD 7200RPM.webp', '2025-12-23 18:02:17', 0, NULL, 62),
(120, 'Crucial P5 Plus 1TB Gen4 SSD', 'PC & AIO', 'editing', 2276000, 'SSD NVMe PCIe Gen4 dengan kecepatan baca hingga 5000MB/s, performa stabil untuk gaming dan produktivitas, serta daya tahan 220TBW.', 'Crucial P5 Plus 1TB Gen4 SSD.webp', '2025-12-23 18:02:17', 0, NULL, 41),
(121, 'Kingston NV2 2TB NVMe PCIe 4.0', 'PC & AIO', 'editing', 1671800, 'SSD NVMe PCIe Gen4 kapasitas besar 2TB dengan performa efisien hingga 3500MB/s, cocok untuk upgrade sistem modern dengan harga terjangkau.', 'Kingston NV2 2TB NVMe PCIe 4.0.webp', '2025-12-23 18:02:17', 0, NULL, 39),
(122, 'Samsung 870 EVO 1TB SATA SSD', 'PC & AIO', 'editing', 980000, 'SSD SATA 2.5 inch andalan dengan kecepatan stabil hingga 560MB/s, reliabilitas tinggi, cocok untuk upgrade laptop dan PC lama.', 'Samsung 870 EVO 1TB SATA SSD.webp', '2025-12-23 18:02:17', 0, NULL, 32),
(123, 'WD Blue 2TB HDD Desktop', 'PC & AIO', 'editing', 1138000, 'Harddisk desktop WD Blue dengan kapasitas 2TB, kecepatan 7200RPM, cocok untuk penyimpanan data, multimedia, dan penggunaan harian.', 'WD Blue 2TB HDD Desktop.webp', '2025-12-23 18:02:17', 0, NULL, 61),
(124, 'Sabrent Rocket 4 Plus 2TB', '', 'editing', 9118600, 'SSD NVMe PCIe Gen4 premium dengan kecepatan baca hingga 7100MB/s dan tulis 6600MB/s, performa ekstrem untuk gaming, editing, dan workstation.', 'Sabrent Rocket 4 Plus 2TB.webp', '2025-12-23 18:02:17', 0, NULL, 63),
(125, 'TeamGroup MP34 1TB NVMe', 'PC & AIO', 'editing', 2480000, 'SSD NVMe PCIe Gen3 dengan performa hingga 3400MB/s, endurance tinggi lebih dari 1600TBW, cocok untuk sistem gaming dan produktivitas.', 'TeamGroup MP34 1TB NVMe.webp', '2025-12-23 18:02:17', 0, NULL, 40),
(126, 'ADATA Legend 960 Max 1TB', '', 'editing', 1343000, 'SSD NVMe PCIe Gen4 dengan kecepatan baca hingga 7000MB/s, mendukung PS5, dilengkapi heatsink, efisien dan cepat untuk gaming modern.', 'ADATA Legend 960 Max 1TB.webp', '2025-12-23 18:02:17', 0, NULL, 64),
(127, 'ThinkBook 16 Gen 6 16-inch AMD', 'Laptop', 'office', 31898600, 'Laptop bisnis layar 16 inci 2.5K dengan AMD Ryzen 7000 Series, DDR5 hingga 64GB, dual SSD PCIe Gen4, cocok untuk produktivitas dan profesional.', 'ThinkBook 16 Gen 6 (16 inch AMD).png', '2025-12-23 18:13:04', 0, NULL, 2),
(128, 'ThinkPad T14s Gen 6 Snapdragon X', 'Laptop', 'office', 49000000, 'Laptop bisnis ultra ringan berbasis Snapdragon X Elite, AI Copilot+ PC, baterai awet, WiFi 7, dan keamanan ThinkShield.', 'ThinkPad T14s Gen 6 Snapdragon X.png', '2025-12-23 18:13:04', 0, NULL, 2),
(129, 'Hype R 5 Touch', 'Laptop', 'office', 9299000, 'Laptop touchscreen 14 inci FHD+ dengan Intel Core i5-1235U, RAM 24GB LPDDR5, dan SSD NVMe untuk kerja harian dan multitasking.', 'Hype R 5 Touch.png', '2025-12-23 18:13:04', 0, NULL, 1),
(130, 'Hype R 5 Flip OLED', 'Laptop', 'office', 10399000, 'Laptop 2-in-1 OLED touchscreen dengan Intel Core i5, RAM 24GB LPDDR5, desain fleksibel untuk kerja dan presentasi.', 'Hype R 5 Flip OLED.png', '2025-12-23 18:13:04', 0, NULL, 1),
(131, 'TravelMate P2 TMP214-53G', 'Laptop', 'office', 17799000, 'Laptop bisnis tangguh dengan Intel Core i5 dan NVIDIA MX330, cocok untuk pekerjaan kantor dan mobile.', 'TravelMate P2 (TMP214-53G).png', '2025-12-23 18:13:04', 0, NULL, 4),
(132, 'TravelMate P214-41-G2', 'Laptop', 'office', 12899000, 'Laptop bisnis entry-level dengan Ryzen PRO, fitur keamanan TPM, dan desain kokoh untuk kerja harian.', 'TravelMate P214-41-G2 (TMP214-41-G2).png', '2025-12-23 18:13:04', 0, NULL, 4),
(133, 'ExpertBook P5 P5405', 'Laptop', 'office', 15599000, 'Laptop bisnis ringan dengan Intel Core Ultra, NPU AI hingga 47 TOPS, layar 2.5K 144Hz, dan keamanan kelas enterprise.', 'ExpertBook P5 (P5405).png', '2025-12-23 18:13:04', 0, NULL, 3),
(134, 'ASUS Zenbook DUO 2024 UX8406', 'Laptop', 'office', 29499000, 'Laptop inovatif dual-screen OLED 14 inci, Intel Core Ultra dengan NPU AI, desain tipis dan fleksibel untuk produktivitas tinggi.', 'ASUS Zenbook DUO (2024) UX8406.png', '2025-12-23 18:13:04', 0, NULL, 3),
(135, 'Summit A16 AI+ A3HM Copilot PC', 'Laptop', '', 22899000, 'Laptop AI Copilot+ dengan AMD Ryzen AI 9, layar 16 inci QHD+ 165Hz, fitur keamanan enterprise dan MSI AI Engine.', 'product_1766519921.png', '2025-12-23 18:13:04', 0, NULL, 5),
(136, 'Prestige 13 AI+ Ukiyo-e Edition A2VM Copilot PC', 'Laptop', '', 29889000, 'Laptop ultra ringan premium dengan Intel Core Ultra 9, layar OLED 2.8K, WiFi 7, dan desain eksklusif Ukiyo-e.', 'product_1766519947.png', '2025-12-23 18:13:04', 0, NULL, 5),
(137, 'Legion 7i Gen 10', 'Laptop', 'gaming', 37268000, 'Laptop gaming premium dengan Intel Core Ultra HX, RTX 50 Series, layar OLED 240Hz, performa ekstrem untuk gaming dan kreator.', 'Legion 7i Gen 10.png', '2025-12-23 18:13:22', 0, NULL, 2),
(138, 'Lenovo LOQ 15AHP10', 'Laptop', 'gaming', 18275000, 'Laptop gaming Ryzen dengan RTX 5070 Laptop GPU, layar 165Hz, performa tinggi untuk gamer kompetitif.', 'Lenovo LOQ 15AHP10.png', '2025-12-23 18:13:22', 0, NULL, 2),
(139, 'Pongo Monster X', 'Laptop', 'gaming', 61749000, 'Laptop gaming ekstrem dengan Intel Core i9-14900HX dan RTX 4090, layar 17.3 inci 240Hz untuk performa maksimal.', 'Pongo Monster X.png', '2025-12-23 18:13:22', 0, NULL, 1),
(140, 'Pongo 750', 'Laptop', 'gaming', 14799000, 'Laptop gaming entry-mid dengan Intel Core i7 dan RTX 4050, cocok untuk gaming modern dan multitasking.', 'Pongo 750.png', '2025-12-23 18:13:22', 0, NULL, 1),
(141, 'Nitro V 15 ANV15-41-R2VJ', 'Laptop', '', 9649000, 'Laptop gaming terjangkau dengan Ryzen 5 dan RTX 2050, layar 144Hz untuk gaming FHD.', 'product_1766519858.png', '2025-12-23 18:13:22', 0, NULL, 4),
(142, 'Predator Helios Neo 16 PHN16-72-788Y', 'Laptop', '', 19999000, 'Laptop gaming performa tinggi dengan Intel Core i7-14700HX dan RTX 4050, layar 165Hz 100% sRGB.', 'product_1766519892.png', '2025-12-23 18:13:22', 0, NULL, 4),
(143, 'ROG Zephyrus G14 2025 GA403UH', 'Laptop', 'gaming', 33999000, 'Laptop gaming ringkas 14 inci dengan Ryzen 9, RTX 5050, layar OLED 3K 120Hz.', 'ROG Zephyrus G14 (2025).png', '2025-12-23 18:13:22', 0, NULL, 3),
(144, 'ASUS TUF Gaming A16 2025', 'Laptop', 'gaming', 24699000, 'Laptop gaming tangguh dengan Ryzen 7 dan RTX 5070, layar 2.5K 165Hz untuk gaming kompetitif.', 'ASUS TUF Gaming A16 (2025).png', '2025-12-23 18:13:22', 0, NULL, 3),
(145, 'Stealth 16 Mercedes-AMG Motorsport A13V', 'Laptop', 'gaming', 44900000, 'Laptop gaming premium kolaborasi AMG dengan OLED UHD+, RTX 4070, desain mewah dan performa tinggi.', 'Stealth 16 Mercedes-AMG Motorsport A13V.png', '2025-12-23 18:13:22', 0, NULL, 5),
(146, 'Titan 18 HX Dragon Edition Norse Myth', 'Laptop', 'gaming', 105029000, 'Laptop gaming flagship dengan Intel Core Ultra 9 dan RTX 5090, layar MiniLED 18 inci, performa absolut tanpa kompromi.', 'Titan 18 HX Dragon Edition Norse Myth.png', '2025-12-23 18:13:22', 0, NULL, 5),
(147, 'ThinkCentre Neo 50s Gen 5 Intel SFF', 'PC & AIO', '', 15442412, 'PC bisnis Small Form Factor dengan Intel Core hingga Gen 14, DDR5, WiFi 6E, hemat daya, cocok untuk kantor dan enterprise.', 'product_1766519741.png', '2025-12-23 18:15:05', 1, NULL, 2),
(148, 'Lenovo ThinkCentre M90a Gen 6 24-inch Intel', 'PC & AIO', '', 25355611, 'All-in-One profesional 24 inci dengan Intel Core Ultra, DDR5 hingga 64GB, layar FHD 120Hz, kamera IR, dan fitur keamanan enterprise.', 'product_1766519768.png', '2025-12-23 18:15:05', 1, NULL, 2),
(149, 'Hype Flex 1', 'PC & AIO', '', 4499000, 'PC All-in-One ekonomis dengan Intel N100, layar 23.8 inci FHD 100Hz, cocok untuk kantor, kasir, dan kebutuhan ringan.', 'Hype Flex 1.png', '2025-12-23 18:15:05', 1, NULL, 1),
(150, 'Hype Flex 7 MAX', 'PC & AIO', '', 11199000, 'All-in-One performa tinggi dengan Intel Core i7-13620H, layar 27 inci IPS, RAM 16GB, dan SSD NVMe untuk produktivitas.', 'product_1766519792.png', '2025-12-23 18:15:05', 1, NULL, 1),
(151, 'Nitro 50-656 Core i7 RTX4060', 'PC & AIO', '', 26999000, 'Desktop gaming dengan Intel Core i7 Gen 14 dan RTX 4060, RAM DDR5 dan storage kombinasi SSD + HDD.', 'Nitro 50-656, Core i7 RTX4060.png', '2025-12-23 18:15:05', 1, NULL, 4),
(152, 'Orion 7000 PO7-655 Core Ultra 9 RTX5080', 'PC & AIO', 'gaming', 79999000, 'Desktop gaming flagship dengan Intel Core Ultra 9 dan RTX 5080 GDDR7, RAM 64GB DDR5 dan monitor gaming 27 inci.', 'Orion 7000 PO7-655, Core Ultra 9 RTX5080.png', '2025-12-23 18:15:05', 0, NULL, 4),
(153, 'ASUS V400 AiO 27 V470', 'PC & AIO', '', 14499000, 'All-in-One ASUS 27 inci dengan desain slim bezel, Intel Core i7, DDR5 hingga 64GB, cocok untuk kantor dan kreatif.', 'product_1766519825.png', '2025-12-23 18:15:05', 0, NULL, 3),
(154, 'ROG G700 2025 GM700', 'PC & AIO', 'gaming', 37999000, 'Desktop gaming ROG generasi baru dengan Ryzen 7 9800X3D dan RTX 5070, SSD NVMe PCIe 4.0.', 'ROG G700 (2025) GM700.png', '2025-12-23 18:15:05', 0, NULL, 3),
(155, 'MSI Modern AM242TP 11M', 'PC & AIO', 'office', 12399000, 'All-in-One touchscreen 23.8 inci FHD dengan Intel Tiger Lake, webcam bawaan, cocok untuk kantor dan edukasi.', 'Modern AM242TP 11M.png', '2025-12-23 18:15:05', 0, NULL, 5),
(156, 'MEG Aegis Ti5 12th', 'PC & AIO', '', 112990000, 'Desktop gaming ekstrem dengan Intel Core i9 dan RTX 3090, DDR5, desain futuristik, dan fitur gaming premium.', 'MEG Aegis Ti5 12th.png', '2025-12-23 18:15:05', 1, NULL, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product_tags`
--

INSERT INTO `product_tags` (`product_id`, `tag_id`) VALUES
(7, 3),
(7, 9),
(7, 11),
(7, 13),
(7, 14),
(8, 3),
(8, 6),
(8, 9),
(8, 11),
(8, 14),
(8, 42),
(8, 43),
(8, 49),
(9, 3),
(9, 6),
(9, 9),
(9, 11),
(9, 42),
(9, 43),
(9, 49),
(10, 3),
(10, 6),
(10, 10),
(10, 12),
(10, 13),
(10, 14),
(10, 42),
(10, 43),
(10, 49),
(11, 3),
(11, 9),
(11, 11),
(12, 3),
(12, 10),
(13, 3),
(13, 9),
(13, 11),
(13, 14),
(14, 3),
(14, 6),
(14, 10),
(14, 13),
(14, 14),
(14, 42),
(14, 43),
(14, 49),
(15, 3),
(15, 9),
(15, 11),
(16, 3),
(16, 9),
(16, 14),
(17, 4),
(17, 6),
(17, 9),
(17, 13),
(17, 14),
(17, 42),
(17, 43),
(17, 49),
(17, 50),
(17, 51),
(17, 53),
(17, 57),
(17, 58),
(18, 4),
(18, 6),
(18, 9),
(18, 11),
(18, 14),
(18, 42),
(18, 43),
(18, 49),
(19, 4),
(19, 9),
(19, 13),
(20, 4),
(20, 10),
(20, 13),
(21, 4),
(21, 6),
(21, 9),
(21, 12),
(21, 14),
(21, 42),
(21, 43),
(21, 49),
(22, 4),
(22, 10),
(22, 13),
(23, 4),
(23, 10),
(23, 12),
(23, 14),
(24, 4),
(24, 10),
(24, 12),
(25, 4),
(25, 9),
(25, 14),
(26, 4),
(26, 10),
(27, 1),
(27, 8),
(27, 14),
(28, 1),
(28, 6),
(28, 8),
(28, 12),
(28, 13),
(28, 42),
(28, 43),
(28, 49),
(29, 1),
(29, 8),
(29, 12),
(29, 13),
(30, 1),
(30, 6),
(30, 9),
(30, 14),
(30, 42),
(30, 43),
(30, 49),
(31, 1),
(31, 8),
(31, 13),
(31, 14),
(32, 1),
(32, 6),
(32, 10),
(32, 15),
(32, 42),
(32, 43),
(32, 49),
(33, 1),
(33, 8),
(33, 9),
(34, 1),
(34, 8),
(34, 12),
(34, 14),
(35, 1),
(35, 8),
(35, 14),
(36, 1),
(36, 6),
(36, 8),
(36, 12),
(36, 42),
(36, 43),
(36, 49),
(37, 2),
(37, 6),
(37, 9),
(37, 12),
(37, 14),
(37, 42),
(37, 43),
(37, 49),
(38, 2),
(38, 9),
(38, 13),
(38, 14),
(39, 2),
(39, 10),
(39, 12),
(40, 2),
(40, 6),
(40, 9),
(40, 14),
(40, 42),
(40, 43),
(40, 49),
(41, 2),
(41, 9),
(41, 14),
(41, 15),
(42, 2),
(42, 11),
(42, 15),
(43, 2),
(43, 10),
(44, 2),
(44, 10),
(44, 12),
(44, 13),
(45, 2),
(45, 6),
(45, 10),
(45, 12),
(45, 42),
(45, 43),
(45, 49),
(46, 2),
(46, 10),
(46, 12),
(47, 22),
(47, 23),
(47, 25),
(48, 9),
(48, 22),
(48, 23),
(48, 25),
(49, 6),
(49, 9),
(49, 22),
(49, 24),
(49, 42),
(49, 43),
(49, 49),
(50, 6),
(50, 22),
(50, 24),
(50, 26),
(50, 42),
(50, 43),
(50, 49),
(51, 22),
(51, 23),
(52, 6),
(52, 22),
(52, 24),
(52, 25),
(52, 26),
(52, 27),
(52, 42),
(52, 43),
(52, 49),
(53, 22),
(53, 23),
(54, 6),
(54, 9),
(54, 22),
(54, 23),
(54, 25),
(54, 42),
(54, 43),
(54, 49),
(55, 22),
(55, 23),
(56, 6),
(56, 22),
(56, 23),
(56, 25),
(56, 26),
(56, 27),
(56, 42),
(56, 43),
(56, 49),
(57, 5),
(57, 6),
(57, 42),
(57, 43),
(57, 49),
(58, 5),
(58, 6),
(58, 27),
(58, 42),
(58, 43),
(58, 49),
(59, 5),
(59, 6),
(60, 5),
(60, 6),
(61, 5),
(61, 7),
(62, 5),
(62, 6),
(63, 5),
(64, 5),
(64, 6),
(65, 5),
(65, 7),
(66, 5),
(66, 6),
(74, 6),
(74, 42),
(74, 43),
(74, 49),
(77, 6),
(77, 32),
(77, 33),
(77, 70),
(78, 6),
(78, 32),
(78, 33),
(78, 42),
(78, 43),
(78, 49),
(78, 70),
(80, 6),
(80, 32),
(80, 34),
(80, 69),
(81, 6),
(81, 32),
(81, 33),
(81, 70),
(82, 6),
(82, 42),
(82, 43),
(82, 49),
(83, 6),
(83, 32),
(83, 33),
(83, 70),
(84, 32),
(84, 34),
(84, 68),
(85, 6),
(85, 42),
(85, 43),
(85, 49),
(86, 6),
(86, 32),
(86, 33),
(86, 42),
(86, 43),
(86, 49),
(86, 70),
(87, 6),
(87, 33),
(87, 38),
(87, 71),
(88, 6),
(88, 33),
(88, 38),
(88, 71),
(89, 6),
(89, 33),
(89, 38),
(89, 71),
(90, 6),
(90, 33),
(90, 38),
(90, 71),
(91, 6),
(91, 33),
(91, 38),
(91, 71),
(92, 6),
(92, 34),
(92, 38),
(92, 71),
(92, 72),
(93, 6),
(93, 34),
(93, 38),
(93, 71),
(93, 72),
(94, 6),
(94, 34),
(94, 38),
(94, 71),
(94, 72),
(95, 6),
(95, 34),
(95, 38),
(95, 71),
(95, 72),
(96, 6),
(96, 34),
(96, 38),
(96, 71),
(96, 72),
(97, 6),
(97, 42),
(97, 43),
(97, 49),
(101, 6),
(101, 42),
(101, 43),
(101, 49),
(102, 42),
(103, 6),
(103, 42),
(103, 43),
(103, 49),
(104, 6),
(104, 42),
(104, 43),
(104, 49),
(105, 6),
(105, 42),
(105, 43),
(105, 49),
(107, 6),
(107, 50),
(107, 51),
(107, 52),
(107, 54),
(107, 55),
(108, 6),
(108, 50),
(108, 51),
(108, 52),
(108, 54),
(108, 55),
(109, 6),
(109, 50),
(109, 51),
(109, 52),
(109, 54),
(109, 55),
(110, 6),
(110, 50),
(110, 51),
(110, 53),
(110, 57),
(110, 58),
(111, 6),
(111, 50),
(111, 51),
(111, 53),
(111, 57),
(111, 58),
(112, 6),
(112, 50),
(112, 51),
(112, 52),
(112, 54),
(112, 55),
(113, 6),
(113, 42),
(113, 43),
(113, 49),
(113, 50),
(113, 51),
(113, 53),
(113, 57),
(113, 58),
(114, 6),
(114, 50),
(114, 51),
(114, 52),
(114, 54),
(114, 55),
(115, 6),
(115, 50),
(115, 51),
(115, 52),
(115, 54),
(115, 55),
(116, 6),
(116, 50),
(116, 51),
(116, 53),
(116, 57),
(116, 58),
(118, 6),
(118, 42),
(118, 43),
(118, 49),
(119, 60),
(119, 66),
(120, 59),
(120, 61),
(120, 65),
(120, 66),
(122, 59),
(122, 61),
(122, 65),
(122, 66),
(123, 6),
(123, 42),
(123, 43),
(123, 49),
(123, 60),
(123, 66),
(147, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `nama`) VALUES
(44, '80 Plus Gold'),
(45, '80 Plus Platinum'),
(68, 'AM4'),
(69, 'AM5'),
(34, 'amd'),
(46, 'ATX'),
(11, 'bluetooth'),
(27, 'business'),
(37, 'chipset-b650'),
(36, 'chipset-x670'),
(35, 'chipset-z790'),
(71, 'CPU'),
(30, 'ddr4'),
(31, 'ddr5'),
(54, 'DLSS'),
(26, 'duplex'),
(66, 'Editing'),
(13, 'esports'),
(3, 'gamepad'),
(6, 'gaming'),
(56, 'Gaming 1080p'),
(57, 'Gaming 1440p'),
(58, 'Gaming 4K'),
(50, 'GPU'),
(82, 'hakim'),
(60, 'HDD'),
(4, 'headset'),
(67, 'High Capacity'),
(65, 'High Speed Storage'),
(39, 'high-end'),
(23, 'inkjet'),
(33, 'intel'),
(1, 'keyboard'),
(24, 'laser'),
(70, 'LGA1700'),
(8, 'mechanical'),
(49, 'Modular'),
(5, 'monitor'),
(32, 'motherboard'),
(2, 'mouse'),
(25, 'multifunction'),
(61, 'NVMe'),
(7, 'office'),
(48, 'PCIe 5.0'),
(63, 'PCIe Gen3'),
(62, 'PCIe Gen4'),
(43, 'Power Supply'),
(14, 'premium'),
(22, 'printer'),
(38, 'processor'),
(15, 'productivity'),
(42, 'PSU'),
(53, 'Radeon'),
(29, 'ram'),
(55, 'Ray Tracing'),
(12, 'rgb'),
(52, 'RTX'),
(64, 'SATA'),
(47, 'SFX'),
(59, 'SSD'),
(51, 'VGA'),
(10, 'wired'),
(9, 'wireless'),
(72, 'Workstation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `is_online` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_photo` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `is_online`, `last_login`, `created_at`, `profile_photo`, `about`) VALUES
(2, 'user1', '$2y$10$9RkZ9Z8E0ZPj4XzqkZt3uOXxHfE9lY7H4mF2M4rZq7G1Y9Zt9xq', 'user', 0, NULL, '2025-12-18 12:35:07', NULL, NULL),
(5, '123', '$2y$10$pQvBLhhMgfXxqyfBYZ9X5.8BdAEOPGQn24v36BmXbnSq5OohZvkui', 'user', 1, '2025-12-24 06:21:49', '2025-12-18 14:39:46', 'user_5_1766426504.png', 'bapakku dpr'),
(6, '321', '$2y$10$HtkYUGwlICTzUJSSfShTy.PbiLfZCmxNaZ4J2IhJ4Kkj6O2n4QBSC', 'user', 0, '2025-12-22 19:41:05', '2025-12-22 12:40:50', NULL, NULL),
(7, 'admin', '$2y$10$4BhuiiQWVUF1gMPnKK/sUeY6/jem.AamnzHnsqXfQim6x29RnLw8K', 'admin', 0, '2025-12-24 06:20:53', '2025-12-22 18:44:39', 'user_7_1766519061.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_brands` (`brand_id`);

--
-- Indeks untuk tabel `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `fk_pt_tag` (`tag_id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `fk_pt_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pt_tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
