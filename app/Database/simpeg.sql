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

-- Dumping structure for table simpeg.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table simpeg.jabatan: ~3 rows (approximately)
DELETE FROM `jabatan`;
INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
	(1, 'Manager'),
	(2, 'Staff'),
	(3, 'Intern');

-- Dumping structure for table simpeg.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table simpeg.migrations: ~3 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(10, '2025-05-16-115948', 'App\\Database\\Migrations\\CreateJabatanTable', 'default', 'App', 1747813699, 1),
	(11, '2025-05-16-120000', 'App\\Database\\Migrations\\CreatePegawaiTable', 'default', 'App', 1747814113, 1),
	(12, '2025-05-16-120105', 'App\\Database\\Migrations\\CreateCutiTable', 'default', 'App', 1747814113, 1);

-- Dumping structure for table simpeg.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_jabatan` int NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_hp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','pegawai') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pegawai',
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nomor_hp` (`nomor_hp`),
  KEY `pegawai_id_jabatan_foreign` (`id_jabatan`),
  CONSTRAINT `pegawai_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table simpeg.pegawai: ~3 rows (approximately)
DELETE FROM `pegawai`;
INSERT INTO `pegawai` (`id_pegawai`, `nama_lengkap`, `email`, `password`, `id_jabatan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nomor_hp`, `foto`, `role`) VALUES
	('2303040097', 'Sal Rafi', '1234567890@gmail.com', '$2y$12$y.ErbwoQlZHoOT.voNVUyOr9YDW4Ep4aKYbBeoA9knQqlvSFmlib2', 3, 'Ajibarang', '2025-05-21', 'L', 'lapang', '0895358263629', '/img/usersProfile/1747894181_c329d0a76f048a7f0dee.jpg', 'pegawai'),
	('2303040098', 'Mochamad Faishal Rafi', 'namarafi123@gmail.com', '$2y$12$puZVUjMObrUICAfJwTfSXOrTii/kwYgjRUj.8wHcbwY/zocfhb3da', 1, 'Banyumas', '2005-09-29', 'L', 'Jl. Raya No. 123', '081234567890', '/img/usersProfile/user1.jpeg', 'admin'),
	('2303040099', 'Faishal Rafi', 'a@gmail.com', '$2y$12$i8BA8.oNUbKyZWioX7ymk./JH/sOv7Ft5IbFhcwWgE7N2gRX/smfC', 1, 'Banyumas', '2005-09-29', 'L', 'Jl. Raya No. 123', '08123456789', '/img/usersProfile/defaul.jpg', 'pegawai');

-- Dumping structure for table simpeg.cuti
CREATE TABLE IF NOT EXISTS `cuti` (
  `id_cuti` int NOT NULL AUTO_INCREMENT,
  `id_pegawai` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jenis` enum('tahunan','sakit','ijin','melahirkan','lainnya') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `status` enum('diajukan','disetujui','ditolak') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'diajukan',
  PRIMARY KEY (`id_cuti`),
  KEY `cuti_id_pegawai_foreign` (`id_pegawai`),
  CONSTRAINT `cuti_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table simpeg.cuti: ~1 rows (approximately)
DELETE FROM `cuti`;
INSERT INTO `cuti` (`id_cuti`, `id_pegawai`, `tanggal_mulai`, `tanggal_selesai`, `jenis`, `keterangan`, `status`) VALUES
	(1, '2303040099', '2025-05-07', '2025-05-22', 'sakit', 'demam tinggi', 'diajukan');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
