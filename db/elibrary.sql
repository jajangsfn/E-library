-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for elibrary
DROP DATABASE IF EXISTS `elibrary`;
CREATE DATABASE IF NOT EXISTS `elibrary` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `elibrary`;

-- Dumping structure for table elibrary.anggota
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.anggota: ~3 rows (approximately)
DELETE FROM `anggota`;
INSERT INTO `anggota` (`id`, `nama`, `no_identitas`, `jenis_identitas`, `tgl_lahir`, `jenkel`, `created_at`, `updated_at`) VALUES
	(2, 'Putri Tiara Andini Gumilang', '19202034923', 'KTP', '2023-10-28', 'P', '2023-10-27 20:53:13', '2023-10-27 21:06:49'),
	(3, 'Ester Herlina', '28394923949234', 'KTP', '2023-10-28', 'P', '2023-10-27 20:58:42', '2023-10-27 20:58:42'),
	(4, 'Gunawan Ali', '2920309239', 'SIM', '2023-10-28', 'L', '2023-10-27 20:59:42', '2023-10-27 20:59:42');

-- Dumping structure for table elibrary.books
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga_denda` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.books: ~2 rows (approximately)
DELETE FROM `books`;
INSERT INTO `books` (`id`, `judul`, `pengarang`, `tahun_terbit`, `kategori`, `deskripsi`, `stok`, `harga_denda`, `gambar`, `created_at`, `updated_at`) VALUES
	(8, 'Pemrograman Dasar 1', 'Jajang Sofian', '2025', 'Teknologi Komputer', 'Menerangkan Dasar - dasar Pemrograman Secara Detail dan Mudah dimengerti', 23, 1000, '4bexBwOemV3b5XeoiIU9poapKJnmgkyhXQ0XKjrD.png', '2023-10-27 08:07:39', '2023-11-14 05:36:22'),
	(9, 'Kecerdasan Buatan', 'Onno W. Purbo', '2000', 'Teknologi Komputer', 'Buku ini menerangkan Mengenai Definisi, Peranan, Fungsi dan Manfaat Teknologi Kecerdasan Buatan', 100, 2000, 'HS3pjJkfFRvBsBsbFsAYxoJczCkm7MLqDpfPFIgf.png', '2023-10-27 18:40:59', '2023-11-14 05:37:54');

-- Dumping structure for table elibrary.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table elibrary.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.migrations: ~7 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(7, '2023_10_27_092845_create_books_table', 2),
	(9, '2023_10_28_030652_create_anggotas_table', 3),
	(14, '2023_10_28_030240_create_peminjamen_table', 4);

-- Dumping structure for table elibrary.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table elibrary.peminjaman
DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_buku` int NOT NULL,
  `peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kembali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int NOT NULL,
  `denda` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.peminjaman: ~4 rows (approximately)
DELETE FROM `peminjaman`;
INSERT INTO `peminjaman` (`id`, `id_buku`, `peminjam`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_kembali`, `qty`, `denda`, `created_at`, `updated_at`) VALUES
	(2, 9, '2', '2023-10-29', '2023-10-28', '2023-10-29', 1, 2000, '2023-10-29 00:41:31', '2023-10-29 02:51:46'),
	(3, 9, '3', '2023-10-29', '2023-11-01', '2023-10-29', 1, 0, '2023-10-29 02:52:06', '2023-10-29 03:45:46'),
	(6, 9, '2', '2023-10-29', '2023-10-29', '2023-11-14', 2, 68000, '2023-10-29 04:10:31', '2023-11-14 05:34:11'),
	(7, 9, '2', '2023-10-29', '2023-10-29', '2023-11-14', 1, 34000, '2023-10-29 04:14:55', '2023-11-14 05:34:37');

-- Dumping structure for table elibrary.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table elibrary.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elibrary.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Gkla/RTWG2laWzY4LriSqeGUJnbilVmBe6LKb6Ya5vB5id77mLtmG', NULL, '2023-10-21 00:35:50', '2023-10-21 00:35:50'),
	(2, 'admin1', 'admin1@gmail.com', NULL, '$2y$10$.1luQveAjOD8vHjgPzXzde9sEQbrSxW.CXCfGe9VJTb8As/qRUDv6', NULL, '2023-10-27 02:11:25', '2023-10-27 02:11:25'),
	(3, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$6yy0hP4F0UAJiUSm8RcNQOlCIh9y.p8U8nyf7UGx9Xyyzb6EEOnBK', NULL, '2023-10-27 02:12:26', '2023-10-27 02:12:26');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
