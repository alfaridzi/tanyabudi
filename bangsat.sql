/*
Navicat MariaDB Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 100126
Source Host           : localhost:3306
Source Database       : tanyabudi

Target Server Type    : MariaDB
Target Server Version : 100126
File Encoding         : 65001

Date: 2018-05-04 12:36:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_id_index` (`regency_id`),
  CONSTRAINT `districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_06_01_000001_create_oauth_auth_codes_table', '1');
INSERT INTO `migrations` VALUES ('4', '2016_06_01_000002_create_oauth_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2016_06_01_000003_create_oauth_refresh_tokens_table', '1');
INSERT INTO `migrations` VALUES ('6', '2016_06_01_000004_create_oauth_clients_table', '1');
INSERT INTO `migrations` VALUES ('7', '2016_06_01_000005_create_oauth_personal_access_clients_table', '1');
INSERT INTO `migrations` VALUES ('8', '2018_04_19_170905_create_products_table', '2');

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('042dc93fa8f24109886aabce5a254ff88f03dd4e6657e087d1225631bc09020289a86c553a3a78b1', '6', '1', 'MyApp', '[]', '0', '2018-04-20 07:04:06', '2018-04-20 07:04:06', '2019-04-20 07:04:06');
INSERT INTO `oauth_access_tokens` VALUES ('6af969c7d6567370eb7976f9213912e7bcb63c75db927497cbd1076073605396acb4fae9efebaa89', '9', '3', 'MyApp', '[]', '0', '2018-04-28 01:30:03', '2018-04-28 01:30:03', '2019-04-28 01:30:03');
INSERT INTO `oauth_access_tokens` VALUES ('6f44e58beeb70a0b922649865ff4fa043d5cbd2e091edc6065d9d9646a5ab905a7f703c12f969ef0', '7', '1', 'MyApp', '[]', '0', '2018-04-20 10:06:32', '2018-04-20 10:06:32', '2019-04-20 10:06:32');
INSERT INTO `oauth_access_tokens` VALUES ('95d7997398cc3834eecb22935f5557c9301fb73ec5d7d8f9765c3124d5e691d1d84d7ba113f7bb73', '3', '1', 'MyApp', '[]', '0', '2018-04-19 18:15:26', '2018-04-19 18:15:26', '2019-04-19 18:15:26');
INSERT INTO `oauth_access_tokens` VALUES ('b9b7997ae93358ac52783e62ab822c21a997f933246277420e96fcc38fb8326bf3b7f4f1585e5211', '4', '1', 'MyApp', '[]', '0', '2018-04-20 04:31:00', '2018-04-20 04:31:00', '2019-04-20 04:31:00');
INSERT INTO `oauth_access_tokens` VALUES ('c491dd638962200512df34acbe4bea8207ac9ee91ec1212987ba715e5476a4066e2b5c374302306e', '8', '3', 'MyApp', '[]', '0', '2018-04-28 01:29:21', '2018-04-28 01:29:21', '2019-04-28 01:29:21');
INSERT INTO `oauth_access_tokens` VALUES ('e5dec7dff9121715e300b34b5bff2c8d864f5e1f6b4ded17dd67f398c18b34f1e192a7f7ef5fb5f9', '5', '1', 'MyApp', '[]', '0', '2018-04-20 04:54:54', '2018-04-20 04:54:54', '2019-04-20 04:54:54');
INSERT INTO `oauth_access_tokens` VALUES ('eafca2c56dadf5589c74ec5c07d1edda7b0c5b3928ee9daf5fcf2b66b303245f074553ec71d81e8b', '1', '2', null, '[]', '0', '2018-04-19 17:39:21', '2018-04-19 17:39:21', '2019-04-19 17:39:21');
INSERT INTO `oauth_access_tokens` VALUES ('ebe816b0ccaea0b8c5f62fb68d6620219037781c17acc2b888be2e8545e0b300183010c229470d95', '1', '1', 'MyApp', '[]', '0', '2018-04-19 17:36:14', '2018-04-19 17:36:14', '2019-04-19 17:36:14');
INSERT INTO `oauth_access_tokens` VALUES ('f6d52df3cb7426f98bc1b62b3570610656905316b05e95a0ec8e28f992fe1eff2de4c2d213599ee7', '2', '1', 'MyApp', '[]', '0', '2018-04-19 17:54:14', '2018-04-19 17:54:14', '2019-04-19 17:54:14');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, 'Laravel Personal Access Client', 'TA7f8PGuaZtRjcxdqEcxr5KTzg2GGDUqSuhqkwt6', 'http://localhost', '1', '0', '0', '2018-04-19 17:04:15', '2018-04-19 17:04:15');
INSERT INTO `oauth_clients` VALUES ('2', null, 'Laravel Password Grant Client', '8VVSkXuoEoB3ZVVpE6l9J2Whc3Ccuh5kJwqG81j6', 'http://localhost', '0', '1', '0', '2018-04-19 17:04:15', '2018-04-19 17:04:15');
INSERT INTO `oauth_clients` VALUES ('3', null, 'Laravel Personal Access Client', 'VDgCKyAptSiZM0AWrKDsmaIGBlLJWasMDU8mGKIG', 'http://localhost', '1', '0', '0', '2018-04-28 01:28:08', '2018-04-28 01:28:08');
INSERT INTO `oauth_clients` VALUES ('4', null, 'Laravel Password Grant Client', '23q6JYcqjSfiWZjmvDjo2Qee0xaLS9SZcQgLYukj', 'http://localhost', '0', '1', '0', '2018-04-28 01:28:09', '2018-04-28 01:28:09');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2018-04-19 17:04:15', '2018-04-19 17:04:15');
INSERT INTO `oauth_personal_access_clients` VALUES ('2', '3', '2018-04-28 01:28:09', '2018-04-28 01:28:09');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------
INSERT INTO `oauth_refresh_tokens` VALUES ('5df662ebe4a0e2dd5ec0eb5e6f9d47de0d31cd350ba40da1197260f333ba411fbe1f24e1967625a9', 'eafca2c56dadf5589c74ec5c07d1edda7b0c5b3928ee9daf5fcf2b66b303245f074553ec71d81e8b', '0', '2019-04-19 17:39:22');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES ('11', 'ACEH');
INSERT INTO `provinces` VALUES ('12', 'SUMATERA UTARA');
INSERT INTO `provinces` VALUES ('13', 'SUMATERA BARAT');
INSERT INTO `provinces` VALUES ('14', 'RIAU');
INSERT INTO `provinces` VALUES ('15', 'JAMBI');
INSERT INTO `provinces` VALUES ('16', 'SUMATERA SELATAN');
INSERT INTO `provinces` VALUES ('17', 'BENGKULU');
INSERT INTO `provinces` VALUES ('18', 'LAMPUNG');
INSERT INTO `provinces` VALUES ('19', 'KEPULAUAN BANGKA BELITUNG');
INSERT INTO `provinces` VALUES ('21', 'KEPULAUAN RIAU');
INSERT INTO `provinces` VALUES ('31', 'DKI JAKARTA');
INSERT INTO `provinces` VALUES ('32', 'JAWA BARAT');
INSERT INTO `provinces` VALUES ('33', 'JAWA TENGAH');
INSERT INTO `provinces` VALUES ('34', 'DI YOGYAKARTA');
INSERT INTO `provinces` VALUES ('35', 'JAWA TIMUR');
INSERT INTO `provinces` VALUES ('36', 'BANTEN');
INSERT INTO `provinces` VALUES ('51', 'BALI');
INSERT INTO `provinces` VALUES ('52', 'NUSA TENGGARA BARAT');
INSERT INTO `provinces` VALUES ('53', 'NUSA TENGGARA TIMUR');
INSERT INTO `provinces` VALUES ('61', 'KALIMANTAN BARAT');
INSERT INTO `provinces` VALUES ('62', 'KALIMANTAN TENGAH');
INSERT INTO `provinces` VALUES ('63', 'KALIMANTAN SELATAN');
INSERT INTO `provinces` VALUES ('64', 'KALIMANTAN TIMUR');
INSERT INTO `provinces` VALUES ('65', 'KALIMANTAN UTARA');
INSERT INTO `provinces` VALUES ('71', 'SULAWESI UTARA');
INSERT INTO `provinces` VALUES ('72', 'SULAWESI TENGAH');
INSERT INTO `provinces` VALUES ('73', 'SULAWESI SELATAN');
INSERT INTO `provinces` VALUES ('74', 'SULAWESI TENGGARA');
INSERT INTO `provinces` VALUES ('75', 'GORONTALO');
INSERT INTO `provinces` VALUES ('76', 'SULAWESI BARAT');
INSERT INTO `provinces` VALUES ('81', 'MALUKU');
INSERT INTO `provinces` VALUES ('82', 'MALUKU UTARA');
INSERT INTO `provinces` VALUES ('91', 'PAPUA BARAT');
INSERT INTO `provinces` VALUES ('94', 'PAPUA');


-- ----------------------------
-- Table structure for tbl_booking
-- ----------------------------
DROP TABLE IF EXISTS `tbl_booking`;
CREATE TABLE `tbl_booking` (
  `id_booking` int(50) NOT NULL AUTO_INCREMENT,
  `id_jamaah` int(50) DEFAULT NULL,
  `id_paket` int(50) DEFAULT NULL,
  `id_voucher` int(50) DEFAULT NULL,
  `kode_booking` varchar(255) DEFAULT NULL,
  `nomor_transaksi` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `status_pemesan` enum('1','0') DEFAULT '0' COMMENT '0 = Sedang Dipesan, 1 = Telah Diterima',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_booking
-- ----------------------------
INSERT INTO `tbl_booking` VALUES ('1', '1', null, '5', 'BOOVVABYWA6W7F', '21903721904', null, '0', '2018-05-02 02:20:54', '2018-05-02 18:44:43');
INSERT INTO `tbl_booking` VALUES ('2', '2', null, null, 'BOOENLJSLLPCAT', '421894912', null, '1', '2018-05-02 03:39:41', '2018-05-03 19:01:45');
INSERT INTO `tbl_booking` VALUES ('3', '3', null, '6', 'BOORTRP3ZGFSPP', '12421421421', null, '0', '2018-05-03 03:48:03', '2018-05-03 03:48:03');
INSERT INTO `tbl_booking` VALUES ('4', '4', null, '4', 'BOOMLXQAWECF4M', '2138412', null, '0', '2018-05-04 03:49:40', '2018-05-04 03:49:40');

-- ----------------------------
-- Table structure for tbl_bus
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bus`;
CREATE TABLE `tbl_bus` (
  `id_bus` int(50) NOT NULL AUTO_INCREMENT,
  `id_kloter` int(255) DEFAULT NULL,
  `kode_bus` varchar(255) DEFAULT NULL,
  `nama_bus` varchar(255) DEFAULT NULL,
  `seat_bus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_bus
-- ----------------------------
INSERT INTO `tbl_bus` VALUES ('2', '1', 'BSHJ1', 'Bus Haji 1 2018', '20', '2018-05-04 00:12:31', '2018-05-04 00:12:31');

-- ----------------------------
-- Table structure for tbl_divisi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_divisi`;
CREATE TABLE `tbl_divisi` (
  `kode_divisi` varchar(50) NOT NULL,
  `nama_divisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_divisi
-- ----------------------------
INSERT INTO `tbl_divisi` VALUES ('DIV0001', 'Divisi 1', '2018-04-26 11:59:41', '2018-04-26 11:59:49');
INSERT INTO `tbl_divisi` VALUES ('DIV0002', 'Divisi 2', '2018-04-26 13:59:48', '2018-04-26 14:44:19');
INSERT INTO `tbl_divisi` VALUES ('DIV0003', 'Divisi 3', '2018-04-26 14:43:45', '2018-04-26 14:43:56');
INSERT INTO `tbl_divisi` VALUES ('DIV0004', 'Divisi 4', '2018-04-26 14:00:41', '2018-04-26 14:00:41');
INSERT INTO `tbl_divisi` VALUES ('DIV0005', 'Divisi 5', '2018-04-26 14:44:47', '2018-04-26 14:44:47');
INSERT INTO `tbl_divisi` VALUES ('DIV0006', 'Divisi 6', '2018-04-26 14:45:02', '2018-04-26 14:45:02');

-- ----------------------------
-- Table structure for tbl_halaman_bantuan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_halaman_bantuan`;
CREATE TABLE `tbl_halaman_bantuan` (
  `id_bantuan` int(5) NOT NULL,
  `konten` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bantuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_halaman_bantuan
-- ----------------------------
INSERT INTO `tbl_halaman_bantuan` VALUES ('1', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h3>Bantuan 1</h3>\r\n<p>Lorem ipsum dolor sit amet</p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>bantuan 1</li>\r\n<li>bantuan 2</li>\r\n<li>bantuan 1</li>\r\n</ul>\r\n</body>\r\n</html>', '2018-05-01 01:54:59', '2018-05-01 02:58:44');

-- ----------------------------
-- Table structure for tbl_history
-- ----------------------------
DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE `tbl_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_history
-- ----------------------------
INSERT INTO `tbl_history` VALUES ('7', '1', 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '21:05', '19-04-2018', '2018-04-19 21:05:25', '2018-04-19 21:05:25');
INSERT INTO `tbl_history` VALUES ('10', '1', 'Pembayaran Umroh & Haji', 'Melakukan pembayaran Umroh plus 10 hari', '21:10', '19-04-2018', '2018-04-19 21:10:03', '2018-04-19 21:10:03');
INSERT INTO `tbl_history` VALUES ('11', '1', 'Pembayaran Umroh & Haji', 'Melakukan pembayaran Umroh plus 10 hari', '21:10', '19-04-2018', '2018-04-19 21:10:04', '2018-04-19 21:10:04');
INSERT INTO `tbl_history` VALUES ('12', '1', 'pembayaran Wisata', 'Melakukan pembayaran Wisata jepang musim semi', '21:10', '19-04-2018', '2018-04-19 21:10:55', '2018-04-19 21:10:55');
INSERT INTO `tbl_history` VALUES ('13', '1', 'Penambahan saldo tabungan', 'Melakukan Penambahan saldo Tabungan sebesar Rp.10.000.000', '23:19', '19-04-2018', '2018-04-19 23:19:22', '2018-04-19 23:19:22');
INSERT INTO `tbl_history` VALUES ('14', '1', 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '05:05', '20-04-2018', '2018-04-20 05:05:02', '2018-04-20 05:05:02');
INSERT INTO `tbl_history` VALUES ('15', '5', 'Pembayaran Umroh & Haji', 'Melakukan pembayaran paket haji 9 hari', '05:07', '20-04-2018', '2018-04-20 05:07:34', '2018-04-20 05:07:34');
INSERT INTO `tbl_history` VALUES ('17', '5', 'Penambahan saldo tabungan', 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.920.000', '05:15', '20-04-2018', '2018-04-20 05:15:54', '2018-04-20 05:15:54');
INSERT INTO `tbl_history` VALUES ('18', '5', 'Pembayaran sedekah', 'Melakukan pembayaran Sedekah idul fitri', '06:14', '20-04-2018', '2018-04-20 06:14:08', '2018-04-20 06:14:08');
INSERT INTO `tbl_history` VALUES ('19', '6', 'pembayaran Wisata', 'Melakukan pembayaran Wisata jepang musim semi', '08:27', '20-04-2018', '2018-04-20 08:27:40', '2018-04-20 08:27:40');
INSERT INTO `tbl_history` VALUES ('20', '6', 'Pembayaran Umroh & Haji', 'Melakukan pembayaran Umroh plus 10 hari', '08:28', '20-04-2018', '2018-04-20 08:28:33', '2018-04-20 08:28:33');
INSERT INTO `tbl_history` VALUES ('21', '6', 'Penambahan saldo tabungan', 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.10.000.000', '08:30', '20-04-2018', '2018-04-20 08:30:18', '2018-04-20 08:30:18');
INSERT INTO `tbl_history` VALUES ('22', '6', 'Penambahan saldo tabungan', 'Melakukan Request Penambahan saldo Tabungan sebesar Rp.9.000.000', '08:36', '20-04-2018', '2018-04-20 08:36:25', '2018-04-20 08:36:25');
INSERT INTO `tbl_history` VALUES ('23', '6', 'pembayaran Wisata', 'Melakukan pembayaran Wisata jepang musim semi', '08:37', '20-04-2018', '2018-04-20 08:37:43', '2018-04-20 08:37:43');
INSERT INTO `tbl_history` VALUES ('24', '6', 'Pembayaran sedekah', 'Melakukan pembayaran Sedekah jariyah', '08:38', '20-04-2018', '2018-04-20 08:38:20', '2018-04-20 08:38:20');

-- ----------------------------
-- Table structure for tbl_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jabatan`;
CREATE TABLE `tbl_jabatan` (
  `kode_jabatan` varchar(50) NOT NULL,
  `kode_divisi` varchar(50) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `wilayah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jabatan
-- ----------------------------
INSERT INTO `tbl_jabatan` VALUES ('JAB0001', 'DIV0001', 'Jabatan 1', 'Jabatan 1', 'Jakarta', '2018-04-26 15:27:12', '2018-04-26 15:41:14');
INSERT INTO `tbl_jabatan` VALUES ('JAB0002', 'DIV0001', 'Jabatan 2', 'Jabatan 2', 'Jakarta', '2018-04-27 04:27:01', '2018-04-27 04:27:01');

-- ----------------------------
-- Table structure for tbl_jamaah
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jamaah`;
CREATE TABLE `tbl_jamaah` (
  `id_jamaah` int(50) NOT NULL AUTO_INCREMENT,
  `id_bus` int(50) DEFAULT NULL,
  `id_kamar` int(50) DEFAULT NULL,
  `nama_jamaah` varchar(255) DEFAULT NULL,
  `no_hp_jamaah` varchar(255) DEFAULT NULL,
  `status_mahrom` enum('0','1') DEFAULT NULL COMMENT '0 = Bukan Mahrom, 1 = Mahrom',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jamaah`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jamaah
-- ----------------------------
INSERT INTO `tbl_jamaah` VALUES ('1', null, null, 'Didi Kurniawan', '0857210230', null, '2018-05-02 02:20:54', '2018-05-02 17:42:29');
INSERT INTO `tbl_jamaah` VALUES ('2', null, null, 'Kuswadi', '085728429120', null, '2018-05-02 03:39:40', '2018-05-04 02:03:17');
INSERT INTO `tbl_jamaah` VALUES ('3', null, null, 'Subarjo', '0812728172617', null, '2018-05-03 03:48:03', '2018-05-03 03:48:03');
INSERT INTO `tbl_jamaah` VALUES ('4', null, null, 'Rika Sartika', '085728182716', null, '2018-05-04 03:49:40', '2018-05-04 03:49:40');

-- ----------------------------
-- Table structure for tbl_kamar
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kamar`;
CREATE TABLE `tbl_kamar` (
  `id_kamar` int(50) NOT NULL AUTO_INCREMENT,
  `id_kloter` int(50) DEFAULT NULL,
  `kode_kamar` varchar(255) DEFAULT NULL,
  `tipe_kamar` varchar(255) DEFAULT NULL,
  `kuota` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kamar
-- ----------------------------
INSERT INTO `tbl_kamar` VALUES ('1', '1', 'PRE012', 'Premium Deluxe 12', '5', '2018-05-04 03:06:09', '2018-05-04 03:28:49');

-- ----------------------------
-- Table structure for tbl_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_karyawan`;
CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(50) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_karyawan
-- ----------------------------
INSERT INTO `tbl_karyawan` VALUES ('2', 'DIV0001', 'JAB0001', '778822742', 'Rika Sartika', '627162', '2018-04-10', '0', 'Jakarta', '1990-06-13', '02519862817', '0', 'Joglo', 'rika@gmail.com', '31', '3174', '3174010', '3174010001', '08577261726', '2018-04-27 15:12:44', '2018-04-27 15:14:15');

-- ----------------------------
-- Table structure for tbl_kloter
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kloter`;
CREATE TABLE `tbl_kloter` (
  `id_kloter` int(50) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kloter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kloter
-- ----------------------------
INSERT INTO `tbl_kloter` VALUES ('1', 'Kloter 1 Haji 2018', 'FN1990', '2018-08-10', 'Garuda Airlines', 'Udara', '2018-12-14', 'Citilink Airlines', 'H. Masik', '100', '10', '2018-05-02 21:54:28', '2018-05-03 23:08:56');
INSERT INTO `tbl_kloter` VALUES ('2', 'Kloter 2 Haji 2018', 'FN1990', '2018-09-20', 'Expert Airlines', 'Udara', '2018-10-12', 'Expert Airlines', 'H. Masik', '100', '20', '2018-05-03 03:32:12', '2018-05-03 03:32:12');

-- ----------------------------
-- Table structure for tbl_kuota_bus
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kuota_bus`;
CREATE TABLE `tbl_kuota_bus` (
  `id_bus` varchar(255) DEFAULT NULL,
  `id_jamaah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kuota_bus
-- ----------------------------
INSERT INTO `tbl_kuota_bus` VALUES ('2', '1', '2018-05-04 02:04:00', null);

-- ----------------------------
-- Table structure for tbl_kuota_kamar
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kuota_kamar`;
CREATE TABLE `tbl_kuota_kamar` (
  `id_kamar` int(50) DEFAULT NULL,
  `id_jamaah` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kuota_kamar
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_kuota_kloter
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kuota_kloter`;
CREATE TABLE `tbl_kuota_kloter` (
  `id_kloter` int(50) DEFAULT NULL,
  `id_jamaah` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kuota_kloter
-- ----------------------------
INSERT INTO `tbl_kuota_kloter` VALUES ('1', '1', '2018-05-04 01:04:17', null);
INSERT INTO `tbl_kuota_kloter` VALUES ('2', '2', '2018-05-04 02:17:50', null);
INSERT INTO `tbl_kuota_kloter` VALUES ('2', '3', '2018-05-04 02:17:50', null);
INSERT INTO `tbl_kuota_kloter` VALUES ('1', '4', '2018-05-04 03:52:31', null);

-- ----------------------------
-- Table structure for tbl_paket
-- ----------------------------
DROP TABLE IF EXISTS `tbl_paket`;
CREATE TABLE `tbl_paket` (
  `id_paket` int(50) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_paket
-- ----------------------------
INSERT INTO `tbl_paket` VALUES ('1', '1', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_paket` VALUES ('2', '2', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_paket` VALUES ('3', '3', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_paket` VALUES ('4', '9', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_paket` VALUES ('5', '10', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_paket` VALUES ('6', '14', 'perjalanan', '50', '5', 'Meida Travel', '214124124', 'meida-travel-EUeR6.png', '2018-05-31', '2018-08-09', '2018-09-27', '0', '2018-05-04 10:20:05', '2018-05-04 11:15:44');
INSERT INTO `tbl_paket` VALUES ('8', '15', 'perjalanan 1', '70', '12', 'Kertas Travel', '028192112', 'kertas-travel-Lnnks.png', '2018-10-10', '2018-11-05', '2018-12-31', '1', '2018-05-04 11:24:59', '2018-05-04 11:25:22');

-- ----------------------------
-- Table structure for tbl_paspor
-- ----------------------------
DROP TABLE IF EXISTS `tbl_paspor`;
CREATE TABLE `tbl_paspor` (
  `id_paspor` int(50) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_paspor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_paspor
-- ----------------------------
INSERT INTO `tbl_paspor` VALUES ('1', '1', '221941299', 'Didi Kurniawan', '085708721938', 'Jakarta', '2018-05-24', '1', '31', '3174', '3174080', '3174080002', 'saopjfoiasnf', '2018-05-30', '2018-05-31', null, '2018-05-02 02:20:54', '2018-05-02 17:13:59');
INSERT INTO `tbl_paspor` VALUES ('2', '2', '532532', 'Kuswadi', null, null, null, '1', null, null, null, null, null, null, null, null, '2018-05-02 03:39:41', '2018-05-04 02:03:26');
INSERT INTO `tbl_paspor` VALUES ('3', '3', '201293210', 'Subarjo', '0812728172617', null, null, '1', null, null, null, null, null, null, null, null, '2018-05-03 03:48:03', '2018-05-03 03:48:03');
INSERT INTO `tbl_paspor` VALUES ('4', '4', '111827321', 'Rika Sartika', '085728182716', null, null, '0', null, null, null, null, null, null, null, null, '2018-05-04 03:49:40', '2018-05-04 03:49:40');

-- ----------------------------
-- Table structure for tbl_payment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE `tbl_payment` (
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_payment
-- ----------------------------
INSERT INTO `tbl_payment` VALUES ('1', '1', '10500000', '2018-04-19', '1524171925.jpg', '1', '2018-04-19 21:05:25', '2018-04-19 21:05:25', '8');
INSERT INTO `tbl_payment` VALUES ('1', '3', '19800000', '2018-04-19', '1524172202.jpg', '0', '2018-04-19 21:10:02', '2018-04-19 21:10:02', '11');
INSERT INTO `tbl_payment` VALUES ('1', '3', '19800000', '2018-04-19', '1524172204.jpg', '0', '2018-04-19 21:10:04', '2018-04-19 21:10:04', '12');
INSERT INTO `tbl_payment` VALUES ('1', '4', '10200000', '2018-04-19', '1524172255.jpg', '0', '2018-04-19 21:10:55', '2018-04-19 21:10:55', '13');
INSERT INTO `tbl_payment` VALUES ('1', '3910', '10000000', '2018-04-22', '1524179962.jpg', '0', '2018-04-19 23:19:22', '2018-04-19 23:19:22', '14');
INSERT INTO `tbl_payment` VALUES ('1', '1', '20500000', '2018-04-20', '1524200702.jpg', '0', '2018-04-20 05:05:02', '2018-04-20 05:05:02', '15');
INSERT INTO `tbl_payment` VALUES ('5', '1', '20500000', '2018-04-20', '1524200854.jpg', '0', '2018-04-20 05:07:34', '2018-04-20 05:07:34', '16');
INSERT INTO `tbl_payment` VALUES ('5', '3910', '920000', '2018-04-17', '1524201354.jpg', '1', '2018-04-20 05:15:54', '2018-04-20 05:15:54', '18');
INSERT INTO `tbl_payment` VALUES ('5', '7', '120000', '2018-04-20', '1524204848.jpg', '0', '2018-04-20 06:14:08', '2018-04-20 06:14:08', '19');
INSERT INTO `tbl_payment` VALUES ('6', '4', '30600000', '2018-04-20', '1524212859.jpg', '0', '2018-04-20 08:27:39', '2018-04-20 08:27:39', '20');
INSERT INTO `tbl_payment` VALUES ('6', '3', '19800000', '2018-04-20', '1524212913.jpg', '1', '2018-04-20 08:28:33', '2018-04-20 08:28:33', '21');
INSERT INTO `tbl_payment` VALUES ('6', '3910', '10000000', '2018-04-23', '1524213018.jpg', '0', '2018-04-20 08:30:18', '2018-04-20 08:30:18', '22');
INSERT INTO `tbl_payment` VALUES ('6', '3910', '9000000', '2018-04-22', '1524213385.jpg', '0', '2018-04-20 08:36:25', '2018-04-20 08:36:25', '23');
INSERT INTO `tbl_payment` VALUES ('6', '4', '30600000', '2018-04-20', '1524213463.jpg', '0', '2018-04-20 08:37:43', '2018-04-20 08:37:43', '24');
INSERT INTO `tbl_payment` VALUES ('6', '6', '100000', '2018-04-20', '1524213499.jpg', '0', '2018-04-20 08:38:19', '2018-04-20 08:38:19', '25');

-- ----------------------------
-- Table structure for tbl_produk
-- ----------------------------
DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `desc_prod` text,
  `gambar` varchar(255) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_produk
-- ----------------------------
INSERT INTO `tbl_produk` VALUES ('1', 'paket haji 9 hari', '20500000', 'paket ini khusus untuk yg 9 hari saja', '', '1', null, null);
INSERT INTO `tbl_produk` VALUES ('2', 'paket hai 15 hari', '30100000', 'paket haji 2 minggu lebih sehari, cocok untuk yang ingin berpetualang.', '', '1', null, null);
INSERT INTO `tbl_produk` VALUES ('3', 'Umroh plus 10 hari', '19800000', 'Paket ini wajib untuk yg pertama kali mau ke mekkah', '', '2', null, null);
INSERT INTO `tbl_produk` VALUES ('4', 'Wisata jepang musim semi', '10200000', 'Untuk wibu sangat cocok..', '', '3', null, null);
INSERT INTO `tbl_produk` VALUES ('6', 'Sedekah jariyah', null, 'Sedekah berbagi bersama', '', '4', null, null);
INSERT INTO `tbl_produk` VALUES ('7', 'Sedekah idul fitri', null, 'Sedekah di bulan kemenangan', '', '4', null, null);
INSERT INTO `tbl_produk` VALUES ('8', 'Sedekah fitrah', null, 'Menuju kemenangan yg suci', '', '4', null, null);
INSERT INTO `tbl_produk` VALUES ('9', 'Haji 10 Hari', '10000000', 'Haji 10 Hari', 'haji-10-hari-ROFvL.jpg', '1', '2018-04-28 17:36:32', '2018-04-28 18:32:05');
INSERT INTO `tbl_produk` VALUES ('10', 'Umroh 10 Hari', '25000000', 'Umroh 10 Hari', 'umroh-10-hari-vzwFe.png', '2', '2018-04-28 17:41:37', '2018-04-28 17:41:37');
INSERT INTO `tbl_produk` VALUES ('11', 'Wisata Bali', '1000000', 'wisata bali', 'wisata-bali-bOn0G.jpg', '3', '2018-04-28 17:57:25', '2018-04-28 17:57:25');
INSERT INTO `tbl_produk` VALUES ('12', 'sedekah 1', null, 'sedekah 1', '', '4', '2018-04-28 18:00:57', '2018-04-28 18:00:57');
INSERT INTO `tbl_produk` VALUES ('13', 'Basic', '100000', 'Paket Produk', null, '5', '2018-05-04 07:55:56', '2018-05-04 08:00:18');
INSERT INTO `tbl_produk` VALUES ('14', 'Paket Haji 2018', '20000000', 'Ini paket', '-WL581.png', '1', '2018-05-04 10:20:05', '2018-05-04 10:20:05');
INSERT INTO `tbl_produk` VALUES ('15', 'Paket Umroh 2018', '1000000', 'umroh 1', 'paket-umroh-2018-6Gp8D.png', '2', '2018-05-04 11:24:59', '2018-05-04 11:24:59');

-- ----------------------------
-- Table structure for tbl_tabungan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tabungan`;
CREATE TABLE `tbl_tabungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tabungan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tabungan
-- ----------------------------
INSERT INTO `tbl_tabungan` VALUES ('1', '1', '10000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tbl_tabungan` VALUES ('2', '5', '920000', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tbl_tabungan` VALUES ('3', '6', '19000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tbl_temp_tabungan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_temp_tabungan`;
CREATE TABLE `tbl_temp_tabungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tabungan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_temp_tabungan
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_voucher
-- ----------------------------
DROP TABLE IF EXISTS `tbl_voucher`;
CREATE TABLE `tbl_voucher` (
  `id_voucher` int(50) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_voucher`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_voucher
-- ----------------------------
INSERT INTO `tbl_voucher` VALUES ('4', '8', '17385801000', 'WW3215DF432', '1', 'Kertas Voucher', '2000000', '2018-05-30 00:00:00', '2018-05-31 23:59:59', '0', '2018-05-02 00:32:19', '2018-05-02 03:18:03');
INSERT INTO `tbl_voucher` VALUES ('5', '9', '37068042000', 'GLHBQQCA2DC', '2', 'Voucher Haji 2018', '200000000', '2018-05-31 00:00:00', '2018-05-23 23:59:59', '0', '2018-05-02 01:14:32', '2018-05-02 03:18:00');
INSERT INTO `tbl_voucher` VALUES ('6', '9', '97072457000', 'ZAYR9KC5ZGG', '1', 'Voucher Haji 2019', '200000', '2019-06-12 00:00:00', '2018-09-26 23:59:59', '0', '2018-05-02 15:51:01', '2018-05-02 15:51:01');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Ripki', '083818206627', null, '1', '1', 'rifki.alfaridzi@yahoo.com', '$2y$10$AKav/FapZ8cy3QKLlfjL0eJVgXgqSKExgbbf9O2t/usCJ02SgZztm', 'H2CTfGdT1mISFHN27penEsHXcDkUXLqo9Z872MmjF3ZJgf10kJSgZJ1ZXKKd', '2018-04-19 17:54:13', '2018-04-19 17:54:13');
INSERT INTO `users` VALUES ('3', 'Riska', '089677661716', null, '1', '1', 'riska@mail.com', '$2y$10$DWbIanOL32j92CRUFqJYY.4rbnCkUX2FhNq.TMS5PQGGn53oj.mP.', null, '2018-04-19 18:15:25', '2018-05-01 03:57:41');
INSERT INTO `users` VALUES ('4', 'Riski aprilio', '087811117876', 'FGque', '1', '1', 'alfrdz@yahoo.com', '$2y$10$1Aigih6oEenZIEQjM7xa6.dJUaVAHVv5gbTB8SEHRCifDp5hPw0/C', null, '2018-04-20 04:30:59', '2018-04-20 04:30:59');
INSERT INTO `users` VALUES ('5', 'Alfaridzi', '083811106564', 'FGHJ89U', '1', '1', 'alfaridzi46@gmail.com', '$2y$10$siUDg2nemTmg3dyOpv9SYuoYYJu23K6afzrg9ZsFKyRY4mMtl7m/G', 'US8NiKTD0taBDrKvrmUCn15oTID5VVLrUJXKlsIBcjN46brCChkXamAFDRNT', '2018-04-20 04:54:54', '2018-04-20 04:54:54');
INSERT INTO `users` VALUES ('6', 'Ridwan alamsyah', '089638232930', null, '1', '1', 'ridwanalamsyah96@gmail.com', '$2y$10$5VQxU32CyVYMlCS9j/vwAOT6KYxuUek2oWfj1kfW7FYYIsxCKDq.S', 'vkdi0SIKRUk3t76KJvjt0RHyZRPzJOmSdaAwPugzQ7n0leI26XS5UrBm04to', '2018-04-20 07:04:06', '2018-04-20 07:04:06');
INSERT INTO `users` VALUES ('7', 'muhammad', '089976776566', null, '1', '1', 'alfaridzi@mail.co', '$2y$10$VbRI5V1GroReckQmXthpn.LGE9SnKhzLuAlviKDfjT0kj9KYA5BAG', 'EgTv9urxInOtgsQctdkref4zOF1gDNuESPawJ4HvaNc7y3Lka0dv99m4LHpw', '2018-04-20 10:06:32', '2018-04-20 10:06:32');
INSERT INTO `users` VALUES ('8', 'sadas', '91283', null, '0', '2', 'sadn@gmail.com', '$2y$10$JEPrNM1C1KOFs7/3yHRj7emXjRMBb9nFeXwP6xOtLgMy6vHdEBvqS', null, '2018-04-28 01:29:18', '2018-05-01 03:49:38');
INSERT INTO `users` VALUES ('9', 'Subarjo', '089281291', null, '1', '2', 'subarjo@gmail.com', '$2y$10$O5XRfy.trDJK4istq3ewPOJ2h0KFHHg6ksLg1qXpuBfbm/md48YkC', null, '2018-04-28 01:30:03', '2018-04-28 01:30:03');
