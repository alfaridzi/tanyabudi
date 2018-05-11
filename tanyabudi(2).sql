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

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('042dc93fa8f24109886aabce5a254ff88f03dd4e6657e087d1225631bc09020289a86c553a3a78b1', 6, 1, 'MyApp', '[]', 0, '2018-04-20 00:04:06', '2018-04-20 00:04:06', '2019-04-20 07:04:06'),
('6af969c7d6567370eb7976f9213912e7bcb63c75db927497cbd1076073605396acb4fae9efebaa89', 9, 3, 'MyApp', '[]', 0, '2018-04-27 18:30:03', '2018-04-27 18:30:03', '2019-04-28 01:30:03'),
('6cb8e4a125292fd593fa3ad12886849c4ef14a5d87151aa2c323d25f6572abf5ebaf3f0f2d42464e', 16, 3, 'MyApp', '[]', 0, '2018-05-11 07:50:30', '2018-05-11 07:50:30', '2019-05-11 14:50:30'),
('6f44e58beeb70a0b922649865ff4fa043d5cbd2e091edc6065d9d9646a5ab905a7f703c12f969ef0', 7, 1, 'MyApp', '[]', 0, '2018-04-20 03:06:32', '2018-04-20 03:06:32', '2019-04-20 10:06:32'),
('95d7997398cc3834eecb22935f5557c9301fb73ec5d7d8f9765c3124d5e691d1d84d7ba113f7bb73', 3, 1, 'MyApp', '[]', 0, '2018-04-19 11:15:26', '2018-04-19 11:15:26', '2019-04-19 18:15:26'),
('aee63ae75d4c6279f80b092e41b75c69ab1b906d96ea8219d72027742c2f3480bde2cac25c91e869', 18, 3, 'MyApp', '[]', 0, '2018-05-11 09:51:32', '2018-05-11 09:51:32', '2019-05-11 16:51:32'),
('b9b7997ae93358ac52783e62ab822c21a997f933246277420e96fcc38fb8326bf3b7f4f1585e5211', 4, 1, 'MyApp', '[]', 0, '2018-04-19 21:31:00', '2018-04-19 21:31:00', '2019-04-20 04:31:00'),
('c491dd638962200512df34acbe4bea8207ac9ee91ec1212987ba715e5476a4066e2b5c374302306e', 8, 3, 'MyApp', '[]', 0, '2018-04-27 18:29:21', '2018-04-27 18:29:21', '2019-04-28 01:29:21'),
('db4ef1439f21a8aef72d2f1e65f0251b05826a89f32d802d577444cd5df048ec83edf2a2fb0ccdb1', 19, 3, 'MyApp', '[]', 0, '2018-05-11 09:52:57', '2018-05-11 09:52:57', '2019-05-11 16:52:57'),
('e5dec7dff9121715e300b34b5bff2c8d864f5e1f6b4ded17dd67f398c18b34f1e192a7f7ef5fb5f9', 5, 1, 'MyApp', '[]', 0, '2018-04-19 21:54:54', '2018-04-19 21:54:54', '2019-04-20 04:54:54'),
('eafca2c56dadf5589c74ec5c07d1edda7b0c5b3928ee9daf5fcf2b66b303245f074553ec71d81e8b', 1, 2, NULL, '[]', 0, '2018-04-19 10:39:21', '2018-04-19 10:39:21', '2019-04-19 17:39:21'),
('ebe0a3a7787ddcfa30afaf8287ce1706a54ac11cd550c8fbcbb8bc367546e894bd8b399834c23328', 17, 3, 'MyApp', '[]', 0, '2018-05-11 08:14:13', '2018-05-11 08:14:13', '2019-05-11 15:14:13'),
('ebe816b0ccaea0b8c5f62fb68d6620219037781c17acc2b888be2e8545e0b300183010c229470d95', 1, 1, 'MyApp', '[]', 0, '2018-04-19 10:36:14', '2018-04-19 10:36:14', '2019-04-19 17:36:14'),
('f6d52df3cb7426f98bc1b62b3570610656905316b05e95a0ec8e28f992fe1eff2de4c2d213599ee7', 2, 1, 'MyApp', '[]', 0, '2018-04-19 10:54:14', '2018-04-19 10:54:14', '2019-04-19 17:54:14'),
('f886cba710a46e4ff8c42e210ad6c27e69807efc60f76e2291f60dac09adbef36a84727ce9e9a1de', 12, 3, 'MyApp', '[]', 0, '2018-05-04 02:05:53', '2018-05-04 02:05:53', '2019-05-04 09:05:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'TA7f8PGuaZtRjcxdqEcxr5KTzg2GGDUqSuhqkwt6', 'http://localhost', 1, 0, 0, '2018-04-19 10:04:15', '2018-04-19 10:04:15'),
(2, NULL, 'Laravel Password Grant Client', '8VVSkXuoEoB3ZVVpE6l9J2Whc3Ccuh5kJwqG81j6', 'http://localhost', 0, 1, 0, '2018-04-19 10:04:15', '2018-04-19 10:04:15'),
(3, NULL, 'Laravel Personal Access Client', 'VDgCKyAptSiZM0AWrKDsmaIGBlLJWasMDU8mGKIG', 'http://localhost', 1, 0, 0, '2018-04-27 18:28:08', '2018-04-27 18:28:08'),
(4, NULL, 'Laravel Password Grant Client', '23q6JYcqjSfiWZjmvDjo2Qee0xaLS9SZcQgLYukj', 'http://localhost', 0, 1, 0, '2018-04-27 18:28:09', '2018-04-27 18:28:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-04-19 10:04:15', '2018-04-19 10:04:15'),
(2, 3, '2018-04-27 18:28:09', '2018-04-27 18:28:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('5df662ebe4a0e2dd5ec0eb5e6f9d47de0d31cd350ba40da1197260f333ba411fbe1f24e1967625a9', 'eafca2c56dadf5589c74ec5c07d1edda7b0c5b3928ee9daf5fcf2b66b303245f074553ec71d81e8b', 0, '2019-04-19 17:39:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

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
-- Struktur dari tabel `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id_booking` int(50) NOT NULL,
  `id_jamaah` int(50) DEFAULT NULL,
  `id_paket` int(50) DEFAULT NULL,
  `id_voucher` int(50) DEFAULT NULL,
  `kode_booking` varchar(255) DEFAULT NULL,
  `nomor_transaksi` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `status_pemesan` enum('1','0') DEFAULT '0' COMMENT '0 = Sedang Dipesan, 1 = Telah Diterima',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_booking`
--

INSERT INTO `tbl_booking` (`id_booking`, `id_jamaah`, `id_paket`, `id_voucher`, `kode_booking`, `nomor_transaksi`, `nama_pemesan`, `status_pemesan`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 5, 'BOOVVABYWA6W7F', '21903721904', NULL, '0', '2018-05-01 19:20:54', '2018-05-02 11:44:43'),
(2, 2, NULL, NULL, 'BOOENLJSLLPCAT', '421894912', NULL, '1', '2018-05-01 20:39:41', '2018-05-03 12:01:45'),
(3, 3, NULL, 6, 'BOORTRP3ZGFSPP', '12421421421', NULL, '0', '2018-05-02 20:48:03', '2018-05-02 20:48:03'),
(4, 4, NULL, 4, 'BOOMLXQAWECF4M', '2138412', NULL, '0', '2018-05-03 20:49:40', '2018-05-03 20:49:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `id_bus` int(50) NOT NULL,
  `id_kloter` int(255) DEFAULT NULL,
  `kode_bus` varchar(255) DEFAULT NULL,
  `nama_bus` varchar(255) DEFAULT NULL,
  `seat_bus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bus`
--

INSERT INTO `tbl_bus` (`id_bus`, `id_kloter`, `kode_bus`, `nama_bus`, `seat_bus`, `created_at`, `updated_at`) VALUES
(2, 1, 'BSHJ1', 'Bus Haji 1 2018', '20', '2018-05-03 17:12:31', '2018-05-03 17:12:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `kode_divisi` varchar(50) NOT NULL,
  `nama_divisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`kode_divisi`, `nama_divisi`, `created_at`, `updated_at`) VALUES
('DIV0001', 'Divisi 1', '2018-04-26 04:59:41', '2018-04-26 04:59:49'),
('DIV0002', 'Divisi 2', '2018-04-26 06:59:48', '2018-04-26 07:44:19'),
('DIV0003', 'Divisi 3', '2018-04-26 07:43:45', '2018-04-26 07:43:56'),
('DIV0004', 'Divisi 4', '2018-04-26 07:00:41', '2018-04-26 07:00:41'),
('DIV0005', 'Divisi 5', '2018-04-26 07:44:47', '2018-04-26 07:44:47'),
('DIV0006', 'Divisi 6', '2018-04-26 07:45:02', '2018-04-26 07:45:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_halaman_bantuan`
--

CREATE TABLE `tbl_halaman_bantuan` (
  `id_bantuan` int(5) NOT NULL,
  `konten` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_halaman_bantuan`
--

INSERT INTO `tbl_halaman_bantuan` (`id_bantuan`, `konten`, `created_at`, `updated_at`) VALUES
(1, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h3>Bantuan 1</h3>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>bantuan 1</li>\r\n<li>bantuan 2</li>\r\n<li>bantuan 1</li>\r\n</ul>\r\n</body>\r\n</html>', '2018-04-30 18:54:59', '2018-04-30 19:58:44');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `kode_jabatan` varchar(50) NOT NULL,
  `kode_divisi` varchar(50) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `wilayah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`kode_jabatan`, `kode_divisi`, `nama_jabatan`, `deskripsi`, `wilayah`, `created_at`, `updated_at`) VALUES
('JAB0001', 'DIV0001', 'Jabatan 1', 'Jabatan 1', 'Jakarta', '2018-04-26 08:27:12', '2018-04-26 08:41:14'),
('JAB0002', 'DIV0001', 'Jabatan 2', 'Jabatan 2', 'Jakarta', '2018-04-26 21:27:01', '2018-04-26 21:27:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jamaah`
--

CREATE TABLE `tbl_jamaah` (
  `id_jamaah` int(50) NOT NULL,
  `id_bus` int(50) DEFAULT NULL,
  `id_kamar` int(50) DEFAULT NULL,
  `nama_jamaah` varchar(255) DEFAULT NULL,
  `no_hp_jamaah` varchar(255) DEFAULT NULL,
  `status_mahrom` enum('0','1') DEFAULT NULL COMMENT '0 = Bukan Mahrom, 1 = Mahrom',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jamaah`
--

INSERT INTO `tbl_jamaah` (`id_jamaah`, `id_bus`, `id_kamar`, `nama_jamaah`, `no_hp_jamaah`, `status_mahrom`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Didi Kurniawan', '0857210230', NULL, '2018-05-01 19:20:54', '2018-05-02 10:42:29'),
(2, NULL, NULL, 'Kuswadi', '085728429120', NULL, '2018-05-01 20:39:40', '2018-05-03 19:03:17'),
(3, NULL, NULL, 'Subarjo', '0812728172617', NULL, '2018-05-02 20:48:03', '2018-05-02 20:48:03'),
(4, NULL, NULL, 'Rika Sartika', '085728182716', NULL, '2018-05-03 20:49:40', '2018-05-03 20:49:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id_kamar` int(50) NOT NULL,
  `id_kloter` int(50) DEFAULT NULL,
  `kode_kamar` varchar(255) DEFAULT NULL,
  `tipe_kamar` varchar(255) DEFAULT NULL,
  `kuota` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id_kamar`, `id_kloter`, `kode_kamar`, `tipe_kamar`, `kuota`, `created_at`, `updated_at`) VALUES
(1, 1, 'PRE012', 'Premium Deluxe 12', '5', '2018-05-03 20:06:09', '2018-05-03 20:28:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(50) NOT NULL,
  `kode_divisi` varchar(50) DEFAULT NULL,
  `kode_jabatan` varchar(50) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `tanggal_bergabung` date DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL COMMENT '1=aktif, 0=tidak aktif',
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp_rumah` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('1','0') DEFAULT NULL COMMENT '1=laki-laki, 0=perempuan',
  `alamat` text,
  `email` varchar(255) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `kode_divisi`, `kode_jabatan`, `nik`, `nama`, `kode_pos`, `tanggal_bergabung`, `status`, `tempat_lahir`, `tanggal_lahir`, `no_telp_rumah`, `jenis_kelamin`, `alamat`, `email`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `no_hp`, `created_at`, `updated_at`) VALUES
(2, 'DIV0001', 'JAB0001', '778822742', 'Rika Sartika', '627162', '2018-04-10', '0', 'Jakarta', '1990-06-13', '02519862817', '0', 'Joglo', 'rika@gmail.com', '31', '3174', '3174010', '3174010001', '08577261726', '2018-04-27 08:12:44', '2018-04-27 08:14:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kloter`
--

CREATE TABLE `tbl_kloter` (
  `id_kloter` int(50) NOT NULL,
  `nama_kloter` varchar(255) DEFAULT NULL,
  `kode_flight` varchar(255) DEFAULT NULL,
  `tanggal_keberangkatan` varchar(255) DEFAULT NULL,
  `maskapai_keberangkatan` varchar(255) DEFAULT NULL,
  `via` varchar(255) DEFAULT NULL,
  `tanggal_kepulangan` varchar(255) DEFAULT NULL,
  `maskapai_kepulangan` varchar(255) DEFAULT NULL,
  `seat_leader` varchar(255) DEFAULT NULL,
  `total_seat` int(255) DEFAULT NULL,
  `jumlah_hari` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kloter`
--

INSERT INTO `tbl_kloter` (`id_kloter`, `nama_kloter`, `kode_flight`, `tanggal_keberangkatan`, `maskapai_keberangkatan`, `via`, `tanggal_kepulangan`, `maskapai_kepulangan`, `seat_leader`, `total_seat`, `jumlah_hari`, `created_at`, `updated_at`) VALUES
(1, 'Kloter 1 Haji 2018', 'FN1990', '2018-08-10', 'Garuda Airlines', 'Udara', '2018-12-14', 'Citilink Airlines', 'H. Masik', 100, 10, '2018-05-02 14:54:28', '2018-05-03 16:08:56'),
(2, 'Kloter 2 Haji 2018', 'FN1990', '2018-09-20', 'Expert Airlines', 'Udara', '2018-10-12', 'Expert Airlines', 'H. Masik', 100, 20, '2018-05-02 20:32:12', '2018-05-02 20:32:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kuota_bus`
--

CREATE TABLE `tbl_kuota_bus` (
  `id_bus` varchar(255) DEFAULT NULL,
  `id_jamaah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kuota_bus`
--

INSERT INTO `tbl_kuota_bus` (`id_bus`, `id_jamaah`, `created_at`, `updated_at`) VALUES
('2', '1', '2018-05-03 19:04:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kuota_kamar`
--

CREATE TABLE `tbl_kuota_kamar` (
  `id_kamar` int(50) DEFAULT NULL,
  `id_jamaah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kuota_kloter`
--

CREATE TABLE `tbl_kuota_kloter` (
  `id_kloter` int(50) DEFAULT NULL,
  `id_jamaah` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kuota_kloter`
--

INSERT INTO `tbl_kuota_kloter` (`id_kloter`, `id_jamaah`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-05-03 18:04:17', NULL),
(2, 2, '2018-05-03 19:17:50', NULL),
(2, 3, '2018-05-03 19:17:50', NULL),
(1, 4, '2018-05-03 20:52:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(50) NOT NULL,
  `id_produk` int(50) DEFAULT NULL,
  `perjalanan` varchar(255) DEFAULT NULL,
  `kuota` varchar(255) DEFAULT NULL,
  `sekamar` varchar(255) DEFAULT NULL,
  `nama_travel` varchar(255) DEFAULT NULL,
  `id_travel` varchar(255) DEFAULT NULL,
  `gambar_travel` varchar(255) DEFAULT NULL,
  `keberangkatan` date DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `status_paket` enum('0','1') DEFAULT '0' COMMENT '0 = non aktif, 1 = aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `id_produk`, `perjalanan`, `kuota`, `sekamar`, `nama_travel`, `id_travel`, `gambar_travel`, `keberangkatan`, `tanggal_mulai`, `tanggal_akhir`, `status_paket`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 14, 'perjalanan', '50', '5', 'Meida Travel', '214124124', 'meida-travel-EUeR6.png', '2018-05-31', '2018-08-09', '2018-09-27', '0', '2018-05-04 03:20:05', '2018-05-04 04:15:44'),
(8, 15, 'perjalanan 1', '70', '12', 'Kertas Travel', '028192112', 'kertas-travel-Lnnks.png', '2018-10-10', '2018-11-05', '2018-12-31', '1', '2018-05-04 04:24:59', '2018-05-04 04:25:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paspor`
--

CREATE TABLE `tbl_paspor` (
  `id_paspor` int(50) NOT NULL,
  `id_jamaah` int(50) DEFAULT NULL,
  `nomor_paspor` varchar(255) DEFAULT NULL,
  `nama_paspor` varchar(255) DEFAULT NULL,
  `no_hp_paspor` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('1','0') DEFAULT NULL COMMENT '1 = laki-laki, 0 = perempuan',
  `provinsi` varchar(30) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kelurahan` varchar(30) DEFAULT NULL,
  `alamat` text,
  `tanggal_issued` date DEFAULT NULL,
  `tanggal_expired` date DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paspor`
--

INSERT INTO `tbl_paspor` (`id_paspor`, `id_jamaah`, `nomor_paspor`, `nama_paspor`, `no_hp_paspor`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `tanggal_issued`, `tanggal_expired`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '221941299', 'Didi Kurniawan', '085708721938', 'Jakarta', '2018-05-24', '1', '31', '3174', '3174080', '3174080002', 'saopjfoiasnf', '2018-05-30', '2018-05-31', NULL, '2018-05-01 19:20:54', '2018-05-02 10:13:59'),
(2, 2, '532532', 'Kuswadi', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-01 20:39:41', '2018-05-03 19:03:26'),
(3, 3, '201293210', 'Subarjo', '0812728172617', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-02 20:48:03', '2018-05-02 20:48:03'),
(4, 4, '111827321', 'Rika Sartika', '085728182716', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-03 20:49:40', '2018-05-03 20:49:40');

-- --------------------------------------------------------

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
-- Struktur dari tabel `tbl_temp_tabungan`
--

CREATE TABLE `tbl_temp_tabungan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tabungan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `id_voucher` int(50) NOT NULL,
  `id_agen` int(50) DEFAULT NULL,
  `nomor_voucher` varchar(255) DEFAULT NULL,
  `kode_voucher` varchar(255) DEFAULT NULL,
  `kategori` int(255) DEFAULT NULL,
  `nama_voucher` varchar(255) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_akhir` datetime DEFAULT NULL,
  `status_voucher` enum('1','0') DEFAULT '0' COMMENT '0 = Belum Terpakai, 1 = Sudah Terpakai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`id_voucher`, `id_agen`, `nomor_voucher`, `kode_voucher`, `kategori`, `nama_voucher`, `nominal`, `tanggal_mulai`, `tanggal_akhir`, `status_voucher`, `created_at`, `updated_at`) VALUES
(4, 8, '17385801000', 'WW3215DF432', 1, 'Kertas Voucher', '2000000', '2018-05-30 00:00:00', '2018-05-31 23:59:59', '0', '2018-05-01 17:32:19', '2018-05-01 20:18:03'),
(5, 9, '37068042000', 'GLHBQQCA2DC', 2, 'Voucher Haji 2018', '200000000', '2018-05-31 00:00:00', '2018-05-23 23:59:59', '0', '2018-05-01 18:14:32', '2018-05-01 20:18:00'),
(6, 9, '97072457000', 'ZAYR9KC5ZGG', 1, 'Voucher Haji 2019', '200000', '2019-06-12 00:00:00', '2018-09-26 23:59:59', '0', '2018-05-02 08:51:01', '2018-05-02 08:51:01');

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
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
