-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 02:58 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_04_19_170905_create_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
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
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('042dc93fa8f24109886aabce5a254ff88f03dd4e6657e087d1225631bc09020289a86c553a3a78b1', 6, 1, 'MyApp', '[]', 0, '2018-04-20 00:04:06', '2018-04-20 00:04:06', '2019-04-20 07:04:06'),
('6f44e58beeb70a0b922649865ff4fa043d5cbd2e091edc6065d9d9646a5ab905a7f703c12f969ef0', 7, 1, 'MyApp', '[]', 0, '2018-04-20 03:06:32', '2018-04-20 03:06:32', '2019-04-20 10:06:32'),
('95d7997398cc3834eecb22935f5557c9301fb73ec5d7d8f9765c3124d5e691d1d84d7ba113f7bb73', 3, 1, 'MyApp', '[]', 0, '2018-04-19 11:15:26', '2018-04-19 11:15:26', '2019-04-19 18:15:26'),
('b9b7997ae93358ac52783e62ab822c21a997f933246277420e96fcc38fb8326bf3b7f4f1585e5211', 4, 1, 'MyApp', '[]', 0, '2018-04-19 21:31:00', '2018-04-19 21:31:00', '2019-04-20 04:31:00'),
('e5dec7dff9121715e300b34b5bff2c8d864f5e1f6b4ded17dd67f398c18b34f1e192a7f7ef5fb5f9', 5, 1, 'MyApp', '[]', 0, '2018-04-19 21:54:54', '2018-04-19 21:54:54', '2019-04-20 04:54:54'),
('eafca2c56dadf5589c74ec5c07d1edda7b0c5b3928ee9daf5fcf2b66b303245f074553ec71d81e8b', 1, 2, NULL, '[]', 0, '2018-04-19 10:39:21', '2018-04-19 10:39:21', '2019-04-19 17:39:21'),
('ebe816b0ccaea0b8c5f62fb68d6620219037781c17acc2b888be2e8545e0b300183010c229470d95', 1, 1, 'MyApp', '[]', 0, '2018-04-19 10:36:14', '2018-04-19 10:36:14', '2019-04-19 17:36:14'),
('f6d52df3cb7426f98bc1b62b3570610656905316b05e95a0ec8e28f992fe1eff2de4c2d213599ee7', 2, 1, 'MyApp', '[]', 0, '2018-04-19 10:54:14', '2018-04-19 10:54:14', '2019-04-19 17:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
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
-- Table structure for table `oauth_clients`
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
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'TA7f8PGuaZtRjcxdqEcxr5KTzg2GGDUqSuhqkwt6', 'http://localhost', 1, 0, 0, '2018-04-19 10:04:15', '2018-04-19 10:04:15'),
(2, NULL, 'Laravel Password Grant Client', '8VVSkXuoEoB3ZVVpE6l9J2Whc3Ccuh5kJwqG81j6', 'http://localhost', 0, 1, 0, '2018-04-19 10:04:15', '2018-04-19 10:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-04-19 10:04:15', '2018-04-19 10:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('5df662ebe4a0e2dd5ec0eb5e6f9d47de0d31cd350ba40da1197260f333ba411fbe1f24e1967625a9', 'eafca2c56dadf5589c74ec5c07d1edda7b0c5b3928ee9daf5fcf2b66b303245f074553ec71d81e8b', 0, '2019-04-19 17:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
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
-- Table structure for table `tbl_history`
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
-- Dumping data for table `tbl_history`
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
(24, 6, 'Pembayaran sedekah', 'Melakukan pembayaran Sedekah jariyah', '08:38', '20-04-2018', '2018-04-20 08:38:20', '2018-04-20 08:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
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
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id_user`, `id_prod`, `jumlah_pembayaran`, `tgl_pembayaran`, `foto`, `status`, `created_at`, `updated_at`, `id`) VALUES
(1, 1, 20500000, '2018-04-19', '1524171925.jpg', 1, '2018-04-19 21:05:25', '2018-04-19 21:05:25', 8),
(1, 3, 19800000, '2018-04-19', '1524172202.jpg', 0, '2018-04-19 21:10:02', '2018-04-19 21:10:02', 11),
(1, 3, 19800000, '2018-04-19', '1524172204.jpg', 0, '2018-04-19 21:10:04', '2018-04-19 21:10:04', 12),
(1, 4, 10200000, '2018-04-19', '1524172255.jpg', 0, '2018-04-19 21:10:55', '2018-04-19 21:10:55', 13),
(1, 3910, 10000000, '2018-04-22', '1524179962.jpg', 0, '2018-04-19 23:19:22', '2018-04-19 23:19:22', 14),
(1, 1, 20500000, '2018-04-20', '1524200702.jpg', 0, '2018-04-20 05:05:02', '2018-04-20 05:05:02', 15),
(5, 1, 20500000, '2018-04-20', '1524200854.jpg', 1, '2018-04-20 05:07:34', '2018-04-20 05:07:34', 16),
(5, 3910, 920000, '2018-04-17', '1524201354.jpg', 1, '2018-04-20 05:15:54', '2018-04-20 05:15:54', 18),
(5, 7, 120000, '2018-04-20', '1524204848.jpg', 0, '2018-04-20 06:14:08', '2018-04-20 06:14:08', 19),
(6, 4, 30600000, '2018-04-20', '1524212859.jpg', 0, '2018-04-20 08:27:39', '2018-04-20 08:27:39', 20),
(6, 3, 19800000, '2018-04-20', '1524212913.jpg', 1, '2018-04-20 08:28:33', '2018-04-20 08:28:33', 21),
(6, 3910, 10000000, '2018-04-23', '1524213018.jpg', 0, '2018-04-20 08:30:18', '2018-04-20 08:30:18', 22),
(6, 3910, 9000000, '2018-04-22', '1524213385.jpg', 0, '2018-04-20 08:36:25', '2018-04-20 08:36:25', 23),
(6, 4, 30600000, '2018-04-20', '1524213463.jpg', 0, '2018-04-20 08:37:43', '2018-04-20 08:37:43', 24),
(6, 6, 100000, '2018-04-20', '1524213499.jpg', 0, '2018-04-20 08:38:19', '2018-04-20 08:38:19', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `desc_prod` text,
  `gambar` varchar(255) NOT NULL,
  `type` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `nama`, `harga`, `desc_prod`, `gambar`, `type`, `created_at`, `updated_at`) VALUES
(1, 'paket haji 9 hari', 20500000, 'paket ini khusus untuk yg 9 hari saja', '', 1, NULL, NULL),
(2, 'paket hai 15 hari', 30100000, 'paket haji 2 minggu lebih sehari, cocok untuk yang ingin berpetualang.', '', 1, NULL, NULL),
(3, 'Umroh plus 10 hari', 19800000, 'Paket ini wajib untuk yg pertama kali mau ke mekkah', '', 2, NULL, NULL),
(4, 'Wisata jepang musim semi', 10200000, 'Untuk wibu sangat cocok..', '', 3, NULL, NULL),
(5, 'Kalibata city overview', 120000, 'Berkunjung ke kalibata city yg ramai di jakarta', '', 3, NULL, NULL),
(6, 'Sedekah jariyah', NULL, 'Sedekah berbagi bersama', '', 4, NULL, NULL),
(7, 'Sedekah idul fitri', NULL, 'Sedekah di bulan kemenangan', '', 4, NULL, NULL),
(8, 'Sedekah fitrah', NULL, 'Menuju kemenangan yg suci', '', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tabungan`
--

CREATE TABLE `tbl_tabungan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tabungan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tabungan`
--

INSERT INTO `tbl_tabungan` (`id`, `id_user`, `tabungan`, `created_at`, `updated_at`) VALUES
(1, 1, 10000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 5, 920000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 19000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_tabungan`
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
-- Table structure for table `users`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nohp`, `referal`, `status`, `type`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rifki alfaridzi', '', '', 0, 0, 'alfaridzi48@gmail.com', '$2y$10$SqUlPiMib4Nr7GnlI8oZpuFQG3G61QD6LKMKWx7eAUF2UIqAavu46', 'kPpuTijiBc5e55YSDBehdMZeONsIubooU3jbcLzyCEQVkvCnHjzwUZgcCjCt', '2018-04-19 10:36:12', '2018-04-19 10:36:12'),
(2, 'Ripki', '083818206627', NULL, 1, 1, 'rifki.alfaridzi@yahoo.com', '$2y$10$AKav/FapZ8cy3QKLlfjL0eJVgXgqSKExgbbf9O2t/usCJ02SgZztm', 'H2CTfGdT1mISFHN27penEsHXcDkUXLqo9Z872MmjF3ZJgf10kJSgZJ1ZXKKd', '2018-04-19 10:54:13', '2018-04-19 10:54:13'),
(3, 'Riska', '089677661716', NULL, 1, 1, 'riska@mail.com', '$2y$10$DWbIanOL32j92CRUFqJYY.4rbnCkUX2FhNq.TMS5PQGGn53oj.mP.', NULL, '2018-04-19 11:15:25', '2018-04-19 11:15:25'),
(4, 'Riski aprilio', '087811117876', 'FGque', 1, 1, 'alfrdz@yahoo.com', '$2y$10$1Aigih6oEenZIEQjM7xa6.dJUaVAHVv5gbTB8SEHRCifDp5hPw0/C', NULL, '2018-04-19 21:30:59', '2018-04-19 21:30:59'),
(5, 'Alfaridzi', '083811106564', 'FGHJ89U', 1, 1, 'alfaridzi46@gmail.com', '$2y$10$siUDg2nemTmg3dyOpv9SYuoYYJu23K6afzrg9ZsFKyRY4mMtl7m/G', '5m7jPMvCoufV2PzIKsHA6C8VFJzBA1US7FzRRFrbua2eW3ZotKIxTbUqIFfk', '2018-04-19 21:54:54', '2018-04-19 21:54:54'),
(6, 'Ridwan alamsyah', '089638232930', NULL, 1, 1, 'ridwanalamsyah96@gmail.com', '$2y$10$5VQxU32CyVYMlCS9j/vwAOT6KYxuUek2oWfj1kfW7FYYIsxCKDq.S', 'vkdi0SIKRUk3t76KJvjt0RHyZRPzJOmSdaAwPugzQ7n0leI26XS5UrBm04to', '2018-04-20 00:04:06', '2018-04-20 00:04:06'),
(7, 'muhammad', '089976776566', NULL, 1, 1, 'alfaridzi@mail.co', '$2y$10$VbRI5V1GroReckQmXthpn.LGE9SnKhzLuAlviKDfjT0kj9KYA5BAG', 'EgTv9urxInOtgsQctdkref4zOF1gDNuESPawJ4HvaNc7y3Lka0dv99m4LHpw', '2018-04-20 03:06:32', '2018-04-20 03:06:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tabungan`
--
ALTER TABLE `tbl_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_temp_tabungan`
--
ALTER TABLE `tbl_temp_tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tabungan`
--
ALTER TABLE `tbl_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_temp_tabungan`
--
ALTER TABLE `tbl_temp_tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
