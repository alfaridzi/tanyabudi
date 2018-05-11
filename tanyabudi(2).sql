-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2018 pada 12.31
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanyabudi`
--

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `id_user`, `title`, `info`, `jam`, `tanggal`, `created_at`, `updated_at`) VALUES
(7, 1, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '21:05', '19-04-2018', '2018-04-19 21:05:25', '2018-04-19 21:05:25'),
(10, 1, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran Umroh plus 10 hari', '21:10', '19-04-2018', '2018-04-19 21:10:03', '2018-04-19 21:10:03'),
(11, 1, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran Umroh plus 10 hari', '21:10', '19-04-2018', '2018-04-19 21:10:04', '2018-04-19 21:10:04'),
(12, 1, 'pembayaran Wisata', 'Melakukan pembayaran Wisata jepang musim semi', '21:10', '19-04-2018', '2018-04-19 21:10:55', '2018-04-19 21:10:55'),
(13, 1, 'Penambahan saldo tabungan', 'Melakukan Penambahan saldo Tabungan sebesar Rp.10.000.000', '23:19', '19-04-2018', '2018-04-19 23:19:22', '2018-04-19 23:19:22'),
(14, 1, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '05:05', '20-04-2018', '2018-04-20 05:05:02', '2018-04-20 05:05:02'),
(15, 5, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '05:07', '20-04-2018', '2018-04-20 05:07:34', '2018-04-20 05:07:34'),
(17, 5, 'Penambahan saldo tabungan', 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.920.000', '05:15', '20-04-2018', '2018-04-20 05:15:54', '2018-04-20 05:15:54'),
(18, 5, 'Pembayaran sedekah', 'Melakukan pembayaran Sedekah idul fitri', '06:14', '20-04-2018', '2018-04-20 06:14:08', '2018-04-20 06:14:08'),
(19, 6, 'pembayaran Wisata', 'Melakukan pembayaran Wisata jepang musim semi', '08:27', '20-04-2018', '2018-04-20 08:27:40', '2018-04-20 08:27:40'),
(20, 6, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran Umroh plus 10 hari', '08:28', '20-04-2018', '2018-04-20 08:28:33', '2018-04-20 08:28:33'),
(21, 6, 'Penambahan saldo tabungan', 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.10.000.000', '08:30', '20-04-2018', '2018-04-20 08:30:18', '2018-04-20 08:30:18'),
(22, 6, 'Penambahan saldo tabungan', 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.9.000.000', '08:36', '20-04-2018', '2018-04-20 08:36:25', '2018-04-20 08:36:25'),
(23, 6, 'pembayaran Wisata', 'Melakukan pembayaran Wisata jepang musim semi', '08:37', '20-04-2018', '2018-04-20 08:37:43', '2018-04-20 08:37:43'),
(24, 6, 'Pembayaran sedekah', 'Melakukan pembayaran Sedekah jariyah', '08:38', '20-04-2018', '2018-04-20 08:38:20', '2018-04-20 08:38:20'),
(25, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:28', '08-05-2018', '2018-05-08 23:28:16', '2018-05-08 23:28:16'),
(26, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:35', '08-05-2018', '2018-05-08 23:35:49', '2018-05-08 23:35:49'),
(27, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:36', '08-05-2018', '2018-05-08 23:36:55', '2018-05-08 23:36:55'),
(28, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:37', '08-05-2018', '2018-05-08 23:37:56', '2018-05-08 23:37:56'),
(29, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:39', '08-05-2018', '2018-05-08 23:39:43', '2018-05-08 23:39:43'),
(30, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:40', '08-05-2018', '2018-05-08 23:40:48', '2018-05-08 23:40:48'),
(31, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:41', '08-05-2018', '2018-05-08 23:41:35', '2018-05-08 23:41:35'),
(32, 12, 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '23:41', '08-05-2018', '2018-05-08 23:41:45', '2018-05-08 23:41:45'),
(33, 12, 'Pembayaran pulsa dan ppob', 'AX50 08977171166 Akan diproses', '14:18', '11-05-2018', '2018-05-11 14:18:43', '2018-05-11 14:18:43'),
(34, 12, 'Pembayaran pulsa dan ppob', 'GB50 089677871651 Akan diproses', '14:27', '11-05-2018', '2018-05-11 14:27:25', '2018-05-11 14:27:25'),
(35, 12, 'Pembayaran TRXGJ20201805115740', 'GJ20 08976661716 Akan diproses', '14:28', '11-05-2018', '2018-05-11 14:28:48', '2018-05-11 14:28:48'),
(36, 1, 'Penambahan saldo tabungan', 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.920.000', '15:45', '11-05-2018', '2018-05-11 15:45:32', '2018-05-11 15:45:32'),
(37, 1, 'Penambahan saldo bayar bayar', 'Melakukan Request Penambahan saldo bayar bayar sebesar Rp.320.000', '15:48', '11-05-2018', '2018-05-11 15:48:22', '2018-05-11 15:48:22'),
(38, 1, 'Pembayaran TRXPLN500201805114645', 'PLN500 9818117899 08967771615 Akan diproses', '16:22', '11-05-2018', '2018-05-11 16:22:44', '2018-05-11 16:22:44');



--
-- Struktur dari tabel `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_payment`
--

INSERT INTO `tbl_payment` (`id_user`, `id_prod`, `jumlah_pembayaran`, `tgl_pembayaran`, `foto`, `status`, `created_at`, `updated_at`, `id`, `counter`) VALUES
(12, 1, 20500000, '2018-05-08', '1525822895.jpg', 0, '2018-05-08 23:41:35', '2018-05-08 23:41:35', 'TRX11.20180508.12', 1),
(12, 1, 20500000, '2018-05-08', '1525822905.jpg', 0, '2018-05-08 23:41:45', '2018-05-08 23:41:45', 'TRX21.20180508.12', 2),
(17, 18, 500000, '0000-00-00', '1526027022.jpg', 0, '2018-05-11 15:23:44', '2018-05-11 15:23:44', 'TRX317.20180511.17', 3),
(1, 3910, 920000, '2018-05-20', '1526028183.jpg', 0, '2018-05-11 15:43:03', '2018-05-11 15:43:03', 'TRX4tabungan.20180511.1', 4),
(1, 3910, 920000, '2018-05-20', '1526028332.jpg', 0, '2018-05-11 15:45:32', '2018-05-11 15:45:32', 'TRX5tabungan.20180511.1', 5),
(1, 3911, 320000, '2018-05-28', '1526028502.jpg', 0, '2018-05-11 15:48:22', '2018-05-11 15:48:22', 'TRX6topup.20180511.1', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `desc_prod` text,
  `gambar` varchar(255) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `nama`, `harga`, `desc_prod`, `gambar`, `type`, `created_at`, `updated_at`) VALUES
(1, 'paket haji 9 hari', 20500000, 'paket ini khusus untuk yg 9 hari saja', '', 1, NULL, NULL),
(2, 'paket hai 15 hari', 30100000, 'paket haji 2 minggu lebih sehari, cocok untuk yang ingin berpetualang.', '', 1, NULL, NULL),
(3, 'Umroh plus 10 hari', 19800000, 'Paket ini wajib untuk yg pertama kali mau ke mekkah', '', 2, NULL, NULL),
(4, 'Wisata jepang musim semi', 10200000, 'Untuk wibu sangat cocok..', '', 3, NULL, NULL),
(6, 'Sedekah jariyah', NULL, 'Sedekah berbagi bersama', '', 4, NULL, NULL),
(7, 'Sedekah idul fitri', NULL, 'Sedekah di bulan kemenangan', '', 4, NULL, NULL),
(8, 'Sedekah fitrah', NULL, 'Menuju kemenangan yg suci', '', 4, NULL, NULL),
(9, 'Haji 10 Hari', 10000000, 'Haji 10 Hari', 'haji-10-hari-ROFvL.jpg', 1, '2018-04-28 17:36:32', '2018-04-28 18:32:05'),
(10, 'Umroh 10 Hari', 25000000, 'Umroh 10 Hari', 'umroh-10-hari-vzwFe.png', 2, '2018-04-28 17:41:37', '2018-04-28 17:41:37'),
(11, 'Wisata Bali', 1000000, 'wisata bali', 'wisata-bali-bOn0G.jpg', 3, '2018-04-28 17:57:25', '2018-04-28 17:57:25'),
(12, 'sedekah 1', NULL, 'sedekah 1', '', 4, '2018-04-28 18:00:57', '2018-04-28 18:00:57'),
(13, 'Basic', 100000, 'Paket Produk', NULL, 5, '2018-05-04 07:55:56', '2018-05-04 08:00:18'),
(14, 'Paket Haji 2018', 20000000, 'Ini paket', '-WL581.png', 1, '2018-05-04 10:20:05', '2018-05-04 10:20:05'),
(15, 'Paket Umroh 2018', 1000000, 'umroh 1', 'paket-umroh-2018-6Gp8D.png', 2, '2018-05-04 11:24:59', '2018-05-04 11:24:59'),
(16, 'Pro', 3500000, 'nope', NULL, 5, '2018-05-04 08:26:59', '2018-05-04 08:42:11'),
(18, 'medium', 500000, 'nope', NULL, 5, '2018-05-04 08:41:03', '2018-05-04 08:41:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_referal_bonus`
--

CREATE TABLE `tbl_referal_bonus` (
  `id` int(11) NOT NULL,
  `nama_ref` varchar(255) NOT NULL,
  `bonus` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_referal_bonus`
--

INSERT INTO `tbl_referal_bonus` (`id`, `nama_ref`, `bonus`, `created_at`, `updated_at`) VALUES
(1, 'perusahaan', 100000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'agen', 500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'cashback', 300000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tabungan`
--

CREATE TABLE `tbl_tabungan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tabungan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tabungan`
--

INSERT INTO `tbl_tabungan` (`id`, `id_user`, `tabungan`, `created_at`, `updated_at`) VALUES
(1, 1, 10000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 5, 920000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 19000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');


-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_register` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket` int(11) NOT NULL,
  `referal_main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nohp`, `referal`, `status`, `type`, `email`, `password`, `remember_token`, `token_register`, `paket`, `referal_main`, `created_at`, `updated_at`) VALUES
(1, 'Ripki', '083818206627', NULL, 1, 1, 'rifki.alfaridzi@yahoo.com', '$2y$10$AKav/FapZ8cy3QKLlfjL0eJVgXgqSKExgbbf9O2t/usCJ02SgZztm', 'LHugIiQdCKwJgYe2yFKwcookRujdbBhYIXGUSFCKeGo4eywlIdr26R5dkqQB', '0', 0, '', '2018-04-19 10:54:13', '2018-04-19 10:54:13'),
(3, 'Riska', '089677661716', NULL, 1, 1, 'riska@mail.com', '$2y$10$DWbIanOL32j92CRUFqJYY.4rbnCkUX2FhNq.TMS5PQGGn53oj.mP.', NULL, '0', 0, '', '2018-04-19 11:15:25', '2018-04-30 20:57:41'),
(4, 'Riski aprilio', '087811117876', 'FGque', 1, 1, 'alfrdz@yahoo.com', '$2y$10$1Aigih6oEenZIEQjM7xa6.dJUaVAHVv5gbTB8SEHRCifDp5hPw0/C', NULL, '0', 0, '', '2018-04-19 21:30:59', '2018-04-19 21:30:59'),
(5, 'Alfaridzi', '083811106564', 'FGHJ89U', 1, 1, 'alfaridzi46@gmail.com', '$2y$10$siUDg2nemTmg3dyOpv9SYuoYYJu23K6afzrg9ZsFKyRY4mMtl7m/G', 'US8NiKTD0taBDrKvrmUCn15oTID5VVLrUJXKlsIBcjN46brCChkXamAFDRNT', '0', 0, '', '2018-04-19 21:54:54', '2018-04-19 21:54:54'),
(6, 'Ridwan alamsyah', '089638232930', NULL, 1, 1, 'ridwanalamsyah96@gmail.com', '$2y$10$5VQxU32CyVYMlCS9j/vwAOT6KYxuUek2oWfj1kfW7FYYIsxCKDq.S', 'vkdi0SIKRUk3t76KJvjt0RHyZRPzJOmSdaAwPugzQ7n0leI26XS5UrBm04to', '0', 0, '', '2018-04-20 00:04:06', '2018-04-20 00:04:06'),
(7, 'muhammad', '089976776566', NULL, 1, 1, 'alfaridzi@mail.co', '$2y$10$VbRI5V1GroReckQmXthpn.LGE9SnKhzLuAlviKDfjT0kj9KYA5BAG', 'EgTv9urxInOtgsQctdkref4zOF1gDNuESPawJ4HvaNc7y3Lka0dv99m4LHpw', '0', 0, '', '2018-04-20 03:06:32', '2018-04-20 03:06:32'),
(8, 'sadas', '91283', NULL, 0, 2, 'sadn@gmail.com', '$2y$10$JEPrNM1C1KOFs7/3yHRj7emXjRMBb9nFeXwP6xOtLgMy6vHdEBvqS', NULL, '0', 0, '', '2018-04-27 18:29:18', '2018-04-30 20:49:38'),
(9, 'Subarjo', '089281291', NULL, 1, 2, 'subarjo@gmail.com', '$2y$10$O5XRfy.trDJK4istq3ewPOJ2h0KFHHg6ksLg1qXpuBfbm/md48YkC', NULL, '0', 0, '', '2018-04-27 18:30:03', '2018-04-27 18:30:03'),
(10, 'berrak', '0896777287', NULL, 0, 2, 'alfaridzi48@kmlkm.com', '$2y$10$waZzTJ.BTfpdvEQtHsJWS.GLfuD08xJ/SUBdh4CxjxtZCwDgtMSky', NULL, '6h7Slguur4hgaTWHV7a5JcOLayPkJKwzGT0OO1bxtDPOiNFAweXyZN3a7F5OBfkd6fECev57oqHYDe9cGBqukEqjPj34jX1RPnyEV9Ja0kmk7NYasvL3ijW5eeDZJK3bNFJxChCPO18qLsJ9q1f6zruE1j73DuwbhQ2RslDuQ84MZMAcFJaROoRJOBIr15', 0, '', '2018-05-04 02:00:19', '2018-05-04 02:00:19'),
(13, 'Mail', '0897771617', NULL, 0, 2, 'mail@nauk.co', '$2y$10$x9Ki3aO5crpAUhu9ol5WOOA371iguXzF5ruePCzczAKJj1lbqgCRG', NULL, '0IMiCCcsS5gcqgGVQ615oPEjEYF6YNiwbwqGzC9bsbxWaRHAnOK2TFMnhGw0gyuFZiSqIOUdYZrNVStdQpjq5bJavuxO8r87mqOlX04xuEZjcS3W7Y826TcJRbAUQm925gDXvaIhEtkpkbH86lk1HiFGL3ivUkTaksTs0Oxn9nuluABhKQReGsecjIqeNg', 13, '', '2018-05-11 07:44:55', '2018-05-11 07:44:55'),
(16, 'Rikatsu', '089677651615', NULL, 0, 2, 'rikatsu96@gmail.com', '$2y$10$B9voJ/mR/HtUywUBAoxy.OzIVVxUrIaANZOObFRYIsnrb/NJvXONC', NULL, 'rif5vJMUjMzeUaJNAI75nYe2FCqUtIVD7hyvUIaTHs3pcycdQLAcD10nhkIXhtVlWIbK90QVTp5NNo10jthxOSdZApKlLOIvneIMoDDGxYwy0GNxDVIXMDtnhA6wcXFUdmlvbVvRJGMNpMU6Y4xiFlH0JIj2HCRuNN6cb1xdBhuvGoCb6itu6sGBAWNWJJ', 13, '', '2018-05-11 07:50:20', '2018-05-11 07:50:20'),
(17, 'Rifki alfaridzi', '083818298817', NULL, 0, 2, 'alfaridzi48@gmail.com', '$2y$10$ZxLigx/NqQ2mdcf1CYDgNO6oZh5wmCVt.upncKdwPMIMhLT4lM7XS', NULL, 'X8SBjccTje0uvUTEkdWVyDphaJAJIpY2orQOg6uwWcdL9CO93oBR3oiStHOFpNslcUhU43tJyhq8WyI0BzDk3AHzF3uUXPZpM8dVBcyMvkh4mlbsYWUGnQyscuepOy5beHkKcAu3HyQL23Lh61aiNrMyYPRTpWA9SZeQCCZvWUzH1tkw17TDk38yAXVKql', 18, '', '2018-05-11 08:14:07', '2018-05-11 08:14:07'),
(18, 'rizkiii', '08977771816', NULL, 1, 2, 'alfaridzi48@mail.co', '$2y$10$k1Wb5wNwYSw2E3ESsN5n0.y5BPV2QFN4pbDeShRXtYvFIiEs7MXPC', NULL, 'NSm4Z2kuwAf22un5IeGlZobo9QofGUixnMQpB2KswG9dDdIxlPJ5EyFho5avUS69LwSZcbdlH8Q2W4tOqURGsBdoKS3MPOPaCCCx9xPE9xspRM0rpOFUomXgwWRxlL5QMOBmUW3QEVTQbg5LzQxYcJHm7jhMRYrDK0P7AllfnSjnSh39BwQlp4OrndwuBr', 18, '11', '2018-05-11 09:51:24', '2018-05-11 09:51:24'),
(19, 'bot', '08976661716', NULL, 1, 2, 'alfaridi38@ya.com', '$2y$10$U8n2sDPSv08uJQsXgZF8hOZj59ivv6gRZwbBo6B5jgv59SgF6JCH.', NULL, 'gWDagI3NLPUuUG4iZOhNfAA61Tc0WqqfZ3A0qXQHJhxQQMqdFZkk1lTex9DZ2YYTb9dH7QKktyVnxiKSMwWaNmH4bBZ97pBuauYumarIkKRuE2AMU6OFNjpWTgaAdNNf1yF8n9rqL4P87FyJRoLcnYVv1jf5ptUvPWE3762gvbkSyG5Lz8BOiozpIfz30m', 16, '6dEPPHi2pp', '2018-05-11 09:52:52', '2018-05-11 09:52:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indeks untuk tabel `tbl_halaman_bantuan`
--
ALTER TABLE `tbl_halaman_bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indeks untuk tabel `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indeks untuk tabel `tbl_jamaah`
--
ALTER TABLE `tbl_jamaah`
  ADD PRIMARY KEY (`id_jamaah`);

--
-- Indeks untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tbl_kloter`
--
ALTER TABLE `tbl_kloter`
  ADD PRIMARY KEY (`id_kloter`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tbl_paspor`
--
ALTER TABLE `tbl_paspor`
  ADD PRIMARY KEY (`id_paspor`);

--
-- Indeks untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_referal_bonus`
--
ALTER TABLE `tbl_referal_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tabungan`
--
ALTER TABLE `tbl_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_temp_tabungan`
--
ALTER TABLE `tbl_temp_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id_booking` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_bus`
--
ALTER TABLE `tbl_bus`
  MODIFY `id_bus` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_jamaah`
--
ALTER TABLE `tbl_jamaah`
  MODIFY `id_jamaah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id_kamar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kloter`
--
ALTER TABLE `tbl_kloter`
  MODIFY `id_kloter` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_paspor`
--
ALTER TABLE `tbl_paspor`
  MODIFY `id_paspor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_referal_bonus`
--
ALTER TABLE `tbl_referal_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_tabungan`
--
ALTER TABLE `tbl_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_temp_tabungan`
--
ALTER TABLE `tbl_temp_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `id_voucher` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
