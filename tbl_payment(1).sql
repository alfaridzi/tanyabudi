-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2018 pada 11.05
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
