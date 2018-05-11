-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2018 pada 14.57
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
-- Struktur dari tabel `tbl_pulsa`
--

CREATE TABLE `tbl_pulsa` (
  `id_pulsa` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah_pembayaran` varchar(255) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pulsa`
--

INSERT INTO `tbl_pulsa` (`id_pulsa`, `id_user`, `jumlah_pembayaran`, `tgl_pembayaran`, `created_at`, `updated_at`) VALUES
('TRXGB10201805119708', 16, '10925', '2018-05-11', '2018-05-11 19:06:34', '2018-05-11 19:06:34'),
('TRXPLN20201805117260', 16, '20330', '2018-05-11', '2018-05-11 19:05:55', '2018-05-11 19:05:55'),
('TRXSM20201805111397', 16, '19935', '2018-05-11', '2018-05-11 18:59:33', '2018-05-11 18:59:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_pulsa`
--
ALTER TABLE `tbl_pulsa`
  ADD PRIMARY KEY (`id_pulsa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
