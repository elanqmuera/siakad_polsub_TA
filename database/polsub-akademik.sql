-- --------------------------------------------------------
-- Host:                         151.106.118.84
-- Server version:               10.5.20-MariaDB-cll-lve - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table u1273233_siak.daftar_nilais
CREATE TABLE IF NOT EXISTS `daftar_nilais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_tugas` varchar(191) NOT NULL,
  `id_tahun_ajaran` varchar(191) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mata_kuliah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.daftar_nilais: ~9 rows (approximately)
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(10, 'Tugas/Kuis', '1', 1, 12, '2023-06-23 23:11:50', '2023-06-23 23:11:50');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(11, 'UTS', '1', 1, 12, '2023-06-23 23:13:53', '2023-06-23 23:13:53');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(12, 'UAS', '1', 1, 12, '2023-06-23 23:14:44', '2023-06-23 23:14:44');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(13, 'Tugas/Kuis', '1', 2, 13, '2023-06-23 23:29:11', '2023-06-23 23:29:11');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(14, 'UTS', '1', 2, 13, '2023-06-23 23:32:25', '2023-06-23 23:32:25');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(15, 'UAS', '1', 2, 13, '2023-06-23 23:32:57', '2023-06-23 23:32:57');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(16, 'Tugas/Kuis', '1', 2, 13, '2023-06-23 23:36:11', '2023-06-23 23:36:11');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(17, 'Tugas/Kuis', '1', 2, 13, '2023-06-23 23:36:37', '2023-06-23 23:36:37');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(22, 'Tugas/Kuis', '1', 1, 14, '2023-06-23 23:47:21', '2023-06-23 23:47:21');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(23, 'UTS', '1', 1, 14, '2023-06-23 23:47:51', '2023-06-23 23:47:51');
INSERT INTO `daftar_nilais` (`id`, `kategori_tugas`, `id_tahun_ajaran`, `id_kelas`, `id_mata_kuliah`, `created_at`, `updated_at`) VALUES
	(24, 'UAS', '1', 1, 14, '2023-06-23 23:48:21', '2023-06-23 23:48:21');

-- Dumping structure for table u1273233_siak.jadwals
CREATE TABLE IF NOT EXISTS `jadwals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_mata_kuliah_enroll` int(11) DEFAULT NULL,
  `hari` varchar(191) NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.jadwals: ~4 rows (approximately)
INSERT INTO `jadwals` (`id`, `created_at`, `updated_at`, `id_mata_kuliah_enroll`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
	(5, '2023-06-23 22:24:09', '2023-06-23 22:24:09', 12, 'Senin', '08:00:00', '10:00:00');
INSERT INTO `jadwals` (`id`, `created_at`, `updated_at`, `id_mata_kuliah_enroll`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
	(6, '2023-06-23 22:33:54', '2023-06-23 22:33:54', 13, 'Selasa', '10:00:00', '12:00:00');
INSERT INTO `jadwals` (`id`, `created_at`, `updated_at`, `id_mata_kuliah_enroll`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
	(7, '2023-06-23 23:42:45', '2023-06-23 23:42:45', 14, 'Senin', '13:00:00', '17:00:00');
INSERT INTO `jadwals` (`id`, `created_at`, `updated_at`, `id_mata_kuliah_enroll`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
	(8, '2023-06-23 23:43:07', '2023-06-23 23:43:07', 15, 'Rabu', '11:00:00', '13:00:00');
INSERT INTO `jadwals` (`id`, `created_at`, `updated_at`, `id_mata_kuliah_enroll`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
	(9, '2023-06-24 04:50:51', '2023-06-24 08:39:22', 11, 'Jumat', '12:02:00', '11:30:00');

-- Dumping structure for table u1273233_siak.jurusans
CREATE TABLE IF NOT EXISTS `jurusans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_jurusan` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.jurusans: ~4 rows (approximately)
INSERT INTO `jurusans` (`id`, `created_at`, `updated_at`, `nama_jurusan`) VALUES
	(1, NULL, '2023-06-20 11:13:52', 'Manajemen Informatika');
INSERT INTO `jurusans` (`id`, `created_at`, `updated_at`, `nama_jurusan`) VALUES
	(2, NULL, '2023-06-20 11:14:19', 'Agroindustri');
INSERT INTO `jurusans` (`id`, `created_at`, `updated_at`, `nama_jurusan`) VALUES
	(3, NULL, '2023-06-20 11:30:04', 'Kesehatan');
INSERT INTO `jurusans` (`id`, `created_at`, `updated_at`, `nama_jurusan`) VALUES
	(4, '2023-06-20 20:18:42', '2023-06-23 22:10:33', 'Teknik Perawatan dan Perbaikan Mesin');

-- Dumping structure for table u1273233_siak.kehadirans
CREATE TABLE IF NOT EXISTS `kehadirans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.kehadirans: ~2 rows (approximately)
INSERT INTO `kehadirans` (`id`, `created_at`, `updated_at`, `id_jadwal`, `tanggal`) VALUES
	(7, '2023-06-23 22:35:35', '2023-06-23 22:35:35', 6, '2023-06-24');
INSERT INTO `kehadirans` (`id`, `created_at`, `updated_at`, `id_jadwal`, `tanggal`) VALUES
	(8, '2023-06-23 22:45:36', '2023-06-23 22:45:36', 5, '2023-06-24');
INSERT INTO `kehadirans` (`id`, `created_at`, `updated_at`, `id_jadwal`, `tanggal`) VALUES
	(9, '2023-06-24 09:02:05', '2023-06-24 09:02:05', 7, '2023-06-24');

-- Dumping structure for table u1273233_siak.kehadiran_details
CREATE TABLE IF NOT EXISTS `kehadiran_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kehadiran` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `status` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.kehadiran_details: ~2 rows (approximately)
INSERT INTO `kehadiran_details` (`id`, `created_at`, `updated_at`, `id_kehadiran`, `id_mahasiswa`, `status`) VALUES
	(11, '2023-06-23 22:35:35', '2023-06-23 22:37:12', 7, 9, 'Hadir');
INSERT INTO `kehadiran_details` (`id`, `created_at`, `updated_at`, `id_kehadiran`, `id_mahasiswa`, `status`) VALUES
	(12, '2023-06-23 22:45:37', '2023-06-23 23:11:34', 8, 8, 'Sakit');
INSERT INTO `kehadiran_details` (`id`, `created_at`, `updated_at`, `id_kehadiran`, `id_mahasiswa`, `status`) VALUES
	(13, '2023-06-24 09:02:05', '2023-06-24 09:02:39', 9, 8, 'Sakit');

-- Dumping structure for table u1273233_siak.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `nama_kelas` varchar(191) DEFAULT NULL,
  `kode_kelas` varchar(191) DEFAULT NULL,
  `id_dosen_wali` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.kelas: ~2 rows (approximately)
INSERT INTO `kelas` (`id`, `created_at`, `updated_at`, `id_tahun_ajaran`, `nama_kelas`, `kode_kelas`, `id_dosen_wali`, `id_prodi`) VALUES
	(1, '2023-06-20 21:50:19', '2023-06-20 21:50:19', 1, 'Sistem Informasi 1A', 'SI1A', 2, 1);
INSERT INTO `kelas` (`id`, `created_at`, `updated_at`, `id_tahun_ajaran`, `nama_kelas`, `kode_kelas`, `id_dosen_wali`, `id_prodi`) VALUES
	(2, '2023-06-21 15:12:45', '2023-06-21 15:12:45', 1, 'Sistem Informasi 1B', 'SI1B', 3, 1);
INSERT INTO `kelas` (`id`, `created_at`, `updated_at`, `id_tahun_ajaran`, `nama_kelas`, `kode_kelas`, `id_dosen_wali`, `id_prodi`) VALUES
	(3, '2023-06-23 22:00:30', '2023-06-24 08:27:37', 1, 'Keperawatan 1A', 'KPR1A', 4, 1);

-- Dumping structure for table u1273233_siak.kelas_enrolls
CREATE TABLE IF NOT EXISTS `kelas_enrolls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.kelas_enrolls: ~2 rows (approximately)
INSERT INTO `kelas_enrolls` (`id`, `created_at`, `updated_at`, `id_mahasiswa`, `id_kelas`) VALUES
	(1, '2023-06-20 21:53:53', '2023-06-20 21:53:53', 8, 1);
INSERT INTO `kelas_enrolls` (`id`, `created_at`, `updated_at`, `id_mahasiswa`, `id_kelas`) VALUES
	(2, '2023-06-20 22:05:21', '2023-06-20 22:05:21', 9, 2);
INSERT INTO `kelas_enrolls` (`id`, `created_at`, `updated_at`, `id_mahasiswa`, `id_kelas`) VALUES
	(3, '2023-06-21 15:19:10', '2023-06-21 15:19:10', 10, 2);

-- Dumping structure for table u1273233_siak.mahasiswa_mata_kuliah_enrolls
CREATE TABLE IF NOT EXISTS `mahasiswa_mata_kuliah_enrolls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_mata_kuliah_enroll` bigint(20) unsigned NOT NULL,
  `id_mahasiswa` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.mahasiswa_mata_kuliah_enrolls: ~2 rows (approximately)
INSERT INTO `mahasiswa_mata_kuliah_enrolls` (`id`, `id_mata_kuliah_enroll`, `id_mahasiswa`, `created_at`, `updated_at`) VALUES
	(9, 12, 8, '2023-06-23 22:19:41', '2023-06-23 22:19:41');
INSERT INTO `mahasiswa_mata_kuliah_enrolls` (`id`, `id_mata_kuliah_enroll`, `id_mahasiswa`, `created_at`, `updated_at`) VALUES
	(10, 13, 9, '2023-06-23 22:20:20', '2023-06-23 22:20:20');
INSERT INTO `mahasiswa_mata_kuliah_enrolls` (`id`, `id_mata_kuliah_enroll`, `id_mahasiswa`, `created_at`, `updated_at`) VALUES
	(11, 14, 8, '2023-06-23 23:45:23', '2023-06-23 23:45:23');

-- Dumping structure for table u1273233_siak.mata_kuliahs
CREATE TABLE IF NOT EXISTS `mata_kuliahs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_mata_kuliah` varchar(191) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `kode_mata_kuliah` varchar(191) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.mata_kuliahs: ~2 rows (approximately)
INSERT INTO `mata_kuliahs` (`id`, `created_at`, `updated_at`, `nama_mata_kuliah`, `id_prodi`, `kode_mata_kuliah`, `sks`) VALUES
	(9, '2023-06-23 22:14:26', '2023-06-23 22:14:26', 'Kesehatan', 5, 'KSH01', 2);
INSERT INTO `mata_kuliahs` (`id`, `created_at`, `updated_at`, `nama_mata_kuliah`, `id_prodi`, `kode_mata_kuliah`, `sks`) VALUES
	(10, '2023-06-23 22:16:46', '2023-06-23 22:16:46', 'Manajemen Proyek', 1, 'MP01', 2);
INSERT INTO `mata_kuliahs` (`id`, `created_at`, `updated_at`, `nama_mata_kuliah`, `id_prodi`, `kode_mata_kuliah`, `sks`) VALUES
	(11, '2023-06-23 23:41:54', '2023-06-23 23:41:54', 'Pemograman Web', 1, 'PW01', 4);

-- Dumping structure for table u1273233_siak.mata_kuliah_enrolls
CREATE TABLE IF NOT EXISTS `mata_kuliah_enrolls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kelas_enroll` int(11) DEFAULT NULL,
  `id_mata_kuliah` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.mata_kuliah_enrolls: ~4 rows (approximately)
INSERT INTO `mata_kuliah_enrolls` (`id`, `created_at`, `updated_at`, `id_kelas_enroll`, `id_mata_kuliah`, `id_dosen`) VALUES
	(11, '2023-06-23 22:16:24', '2023-06-23 22:16:24', 3, 9, 4);
INSERT INTO `mata_kuliah_enrolls` (`id`, `created_at`, `updated_at`, `id_kelas_enroll`, `id_mata_kuliah`, `id_dosen`) VALUES
	(12, '2023-06-23 22:17:34', '2023-06-23 22:17:34', 1, 10, 2);
INSERT INTO `mata_kuliah_enrolls` (`id`, `created_at`, `updated_at`, `id_kelas_enroll`, `id_mata_kuliah`, `id_dosen`) VALUES
	(13, '2023-06-23 22:17:46', '2023-06-23 22:42:08', 2, 10, 3);
INSERT INTO `mata_kuliah_enrolls` (`id`, `created_at`, `updated_at`, `id_kelas_enroll`, `id_mata_kuliah`, `id_dosen`) VALUES
	(14, '2023-06-23 23:42:05', '2023-06-23 23:42:05', 1, 11, 2);
INSERT INTO `mata_kuliah_enrolls` (`id`, `created_at`, `updated_at`, `id_kelas_enroll`, `id_mata_kuliah`, `id_dosen`) VALUES
	(15, '2023-06-23 23:42:21', '2023-06-23 23:42:21', 2, 11, 3);

-- Dumping structure for table u1273233_siak.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.migrations: ~16 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2023_05_10_141547_create_roles_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2023_06_14_022801_create_jurusans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2023_06_14_022906_create_tahun_ajarans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2023_06_14_022928_create_program_studis_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2023_06_14_022950_create_mata_kuliahs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2023_06_14_023024_create_nilais_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2023_06_14_023049_create_kehadirans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2023_06_14_023131_create_kehadiran_details_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2023_06_14_023151_create_jadwals_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2023_06_14_023224_create_mata_kuliah_enrolls_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2023_06_14_023243_create_kelas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2023_06_14_023301_create_kelas_enrolls_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(14, '2023_06_15_051738_create_mahasiswa_mata_kuliah_enrolls_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(15, '2023_06_16_032217_daftar_nilai', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(16, '2023_06_19_012224_create_perwalians_table', 1);

-- Dumping structure for table u1273233_siak.nilais
CREATE TABLE IF NOT EXISTS `nilais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_daftar_nilai` varchar(191) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.nilais: ~21 rows (approximately)
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(1, '2023-06-20 21:55:47', '2023-06-20 21:55:58', '1', 8, 100);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(2, '2023-06-20 21:56:21', '2023-06-20 21:56:46', '2', 8, 90);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(3, '2023-06-20 21:56:29', '2023-06-20 21:57:06', '3', 8, 70);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(4, '2023-06-20 21:56:31', '2023-06-20 21:56:31', '4', 8, 0);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(5, '2023-06-20 22:20:59', '2023-06-20 22:21:16', '5', 8, 90);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(6, '2023-06-20 22:20:59', '2023-06-20 22:21:16', '5', 9, 50);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(7, '2023-06-21 16:26:46', '2023-06-21 16:26:56', '6', 8, 90);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(8, '2023-06-21 16:27:06', '2023-06-21 16:27:15', '7', 8, 90);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(9, '2023-06-21 19:29:35', '2023-06-21 19:30:59', '8', 8, 40);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(10, '2023-06-23 22:37:33', '2023-06-23 22:37:50', '9', 9, 20);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(11, '2023-06-23 23:11:50', '2023-06-23 23:17:05', '10', 8, 87);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(12, '2023-06-23 23:13:53', '2023-06-23 23:16:37', '11', 8, 80);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(13, '2023-06-23 23:14:44', '2023-06-23 23:16:51', '12', 8, 90);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(14, '2023-06-23 23:29:11', '2023-06-23 23:29:32', '13', 9, 75);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(15, '2023-06-23 23:32:25', '2023-06-23 23:38:01', '14', 9, 20);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(16, '2023-06-23 23:32:57', '2023-06-23 23:39:55', '15', 9, 30);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(17, '2023-06-23 23:36:12', '2023-06-23 23:36:28', '16', 9, 10);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(18, '2023-06-23 23:36:37', '2023-06-23 23:36:45', '17', 9, 15);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(19, '2023-06-23 23:47:22', '2023-06-23 23:47:32', '22', 8, 75);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(20, '2023-06-23 23:47:51', '2023-06-23 23:48:01', '23', 8, 85);
INSERT INTO `nilais` (`id`, `created_at`, `updated_at`, `id_daftar_nilai`, `id_mahasiswa`, `nilai`) VALUES
	(21, '2023-06-23 23:48:22', '2023-06-23 23:48:34', '24', 8, 50);

-- Dumping structure for table u1273233_siak.perwalians
CREATE TABLE IF NOT EXISTS `perwalians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kelas` bigint(20) unsigned NOT NULL,
  `id_mahasiswa` bigint(20) unsigned NOT NULL,
  `keluhan` varchar(191) DEFAULT NULL,
  `balasan` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.perwalians: ~3 rows (approximately)
INSERT INTO `perwalians` (`id`, `id_kelas`, `id_mahasiswa`, `keluhan`, `balasan`, `created_at`, `updated_at`) VALUES
	(1, 1, 8, 'Pak saya mengalami masalah dalam nilai akademik', 'Belajar lagi yang giat jangan malas malasan', '2023-06-20 21:58:45', '2023-06-20 21:59:17');
INSERT INTO `perwalians` (`id`, `id_kelas`, `id_mahasiswa`, `keluhan`, `balasan`, `created_at`, `updated_at`) VALUES
	(2, 1, 8, 'Pak saya mengalami ekonomi sulit', 'coba hubungi bapak siang ya', '2023-06-21 03:17:15', '2023-06-21 03:17:56');
INSERT INTO `perwalians` (`id`, `id_kelas`, `id_mahasiswa`, `keluhan`, `balasan`, `created_at`, `updated_at`) VALUES
	(3, 1, 8, 'Keuangan menipis 2', 'Besok jam 1 keruangan bapak ya', '2023-06-22 03:49:13', '2023-06-24 03:25:48');

-- Dumping structure for table u1273233_siak.program_studis
CREATE TABLE IF NOT EXISTS `program_studis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `nama_prodi` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.program_studis: ~6 rows (approximately)
INSERT INTO `program_studis` (`id`, `created_at`, `updated_at`, `id_jurusan`, `nama_prodi`) VALUES
	(1, NULL, '2023-06-24 04:29:03', 1, 'D-III Sistem Informasi');
INSERT INTO `program_studis` (`id`, `created_at`, `updated_at`, `id_jurusan`, `nama_prodi`) VALUES
	(2, NULL, '2023-06-24 04:29:26', 1, 'D-IV Rekayasa Perangkat Lunak');
INSERT INTO `program_studis` (`id`, `created_at`, `updated_at`, `id_jurusan`, `nama_prodi`) VALUES
	(3, NULL, '2023-06-24 04:30:22', 2, 'D-III Agroindustri');
INSERT INTO `program_studis` (`id`, `created_at`, `updated_at`, `id_jurusan`, `nama_prodi`) VALUES
	(5, NULL, '2023-06-24 04:31:20', 3, 'D-III Keperawatan');
INSERT INTO `program_studis` (`id`, `created_at`, `updated_at`, `id_jurusan`, `nama_prodi`) VALUES
	(6, NULL, '2023-06-24 04:31:57', 4, 'D-III Pemeliharaan Mesin');
INSERT INTO `program_studis` (`id`, `created_at`, `updated_at`, `id_jurusan`, `nama_prodi`) VALUES
	(7, '2023-06-24 04:32:22', '2023-06-24 04:32:22', 4, 'D-IV Teknologi Rekayasa Manufaktur');

-- Dumping structure for table u1273233_siak.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_name` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.roles: ~4 rows (approximately)
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_name`) VALUES
	(1, NULL, NULL, 'admin');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_name`) VALUES
	(2, NULL, NULL, 'dosen');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_name`) VALUES
	(3, NULL, NULL, 'mahasiswa');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_name`) VALUES
	(4, NULL, NULL, 'wali');

-- Dumping structure for table u1273233_siak.tahun_ajarans
CREATE TABLE IF NOT EXISTS `tahun_ajarans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.tahun_ajarans: ~3 rows (approximately)
INSERT INTO `tahun_ajarans` (`id`, `created_at`, `updated_at`, `tahun`, `semester`) VALUES
	(1, NULL, NULL, 2022, 1);
INSERT INTO `tahun_ajarans` (`id`, `created_at`, `updated_at`, `tahun`, `semester`) VALUES
	(2, NULL, NULL, 2023, 2);
INSERT INTO `tahun_ajarans` (`id`, `created_at`, `updated_at`, `tahun`, `semester`) VALUES
	(3, '2023-06-20 11:29:44', '2023-06-24 08:02:52', 2023, 3);

-- Dumping structure for table u1273233_siak.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `identity_number` varchar(191) NOT NULL,
  `id_role` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `id_prodi` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u1273233_siak.users: ~13 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Polsub', 'admin@admin.com', '123412341', '1', '$2y$10$QYhPhfuEOhSXcBWkUnxOoulrdaVzDmRopLnK8wKStX9nvP2qZ6hDG', 'alamat rumah', '12341234', 'Laki-Laki', '1', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(2, 'Dosen SI1', 'dosen1@dosen.com', '123412342', '2', '$2y$10$34r.wIpZr7fdHPg3MsT.9OjdD/8DFxchptMh.C4yU9v8K1Zhdm7Dy', 'alamat rumah', '12341234', 'Laki-Laki', '1', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(3, 'Dosen SI2', 'dosen2@dosen.com', '123412343', '2', '$2y$10$BF0Q2So9TaWSSTj5W8fsAuH37ubWaCGsllwSxLovgA8WvPXe64NvK', 'alamat rumah', '12341234', 'Laki-Laki', '1', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(4, 'Dosen KEP1', 'dosen3@dosen.com', '123412344', '2', '$2y$10$ks/oHrc0Wei6tEnt01bKm.GEh6/4nsHYtd2sQWwNbxtrMl994W2lu', 'alamat rumah', '12341234', 'Laki-Laki', '5', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(5, 'Dosen KEP2', 'dosen4@dosen.com', '123412345', '2', '$2y$10$5szQXouUNKr0H05c38CRjuq50ankpQ.i4Ts0bgL7XMubvj71.P7US', 'alamat rumah', '12341234', 'Laki-Laki', '5', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(6, 'Dosen 5', 'dosen5@dosen.com', '123412346', '2', '$2y$10$08TuRJTrcU8Emj.zqFics.hoqmgoyeMwr102VJ1zDBtndUa.RJp4y', 'alamat rumah', '12341234', 'Laki-Laki', '3', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(7, 'Dosen 6', 'dosen6@dosen.com', '123412347', '2', '$2y$10$/BWI96/9l6jZvE0Q8dkSqeznTtErFJAR0.QAMZWFjMmQ1yA1iuZ5a', 'alamat rumah', '12341234', 'Laki-Laki', '3', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(8, 'Mahasiswa SI1', 'mahasiswa1@mahasiswa.com', '10107040', '3', '$2y$10$i5ccLTR2pIOpEXgAbwsX3.71t/4fGfWi1QNKhxJNOzClqMfsf/4wu', 'alamat rumah', '12341234', 'Laki-Laki', '1', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(9, 'Mahasiswa SI2', 'mahasiswa2@mahasiswa.com', '10107041', '3', '$2y$10$T1Xy8i9gSaYLkdm5bR/Q0.Gfxbx6i2Q7wFNoSUsBoyor6LGekAtQ2', 'alamat rumah', '12341234', 'Laki-Laki', '1', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(10, 'Mahasiswa KEP1', 'mahasiswa3@mahasiswa.com', '1234123410', '3', '$2y$10$DjTVsIEFy5gyxTSjEkrOw.A8Sqj7CrMnn8MW9Fp4rFAUPXufDbIlS', 'alamat rumah', '12341234', 'Laki-Laki', '5', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(11, 'Mahasiswa KEP2', 'mahasiswa4@mahasiswa.com', '1234123411', '3', '$2y$10$fQPCVeiP3RV.Xd4ZVjSHruORRP52xnci6al0ELJMLYtVjFcCsbGyW', 'alamat rumah', '12341234', 'Laki-Laki', '5', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(12, 'Mahasiswa 5', 'mahasiswa5@mahasiswa.com', '1234123412', '3', '$2y$10$2JnllvEjFq5A08WIZgbOFuC7ELwqif/H6MmiTwUp3ejF9T2BDD86m', 'alamat rumah', '12341234', 'Laki-Laki', '3', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `identity_number`, `id_role`, `password`, `address`, `phone_number`, `gender`, `id_prodi`, `created_at`, `updated_at`) VALUES
	(13, 'Mahasiswa 6', 'mahasiswa6@mahasiswa.com', '1234123413', '3', '$2y$10$btNHOd.jb7OWUTKAb0RLTutWsQ9IQAORnJwf5vqj3Q9jl7Pi5Twe.', 'alamat rumah', '12341234', 'Laki-Laki', '3', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
