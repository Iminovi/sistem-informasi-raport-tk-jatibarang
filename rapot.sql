-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2026 at 02:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapot`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `wali_kelas` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`, `created_at`, `updated_at`) VALUES
(1, 'a', 'jokowi', '2026-02-17 11:18:02', '2026-02-17 11:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_relasi` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_relasi`, `id_kelas`, `id_siswa`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_perkembangan`
--

CREATE TABLE `laporan_perkembangan` (
  `id_laporan` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `tanggal_lap` date DEFAULT NULL,
  `nilai_aik` varchar(2) DEFAULT NULL,
  `nilai_cpabp` varchar(2) DEFAULT NULL,
  `nilai_cpjd` varchar(2) DEFAULT NULL,
  `nilai_cpdl` varchar(2) DEFAULT NULL,
  `nilai_p5` varchar(2) DEFAULT NULL,
  `berat_badan` float DEFAULT NULL,
  `tinggi_badan` float DEFAULT NULL,
  `lingkar_kepala` float DEFAULT NULL,
  `sakit` int(11) DEFAULT 0,
  `izin` int(11) DEFAULT 0,
  `alfa` int(11) DEFAULT 0,
  `aspek_motorik` text DEFAULT NULL,
  `aspek_kognitif` text DEFAULT NULL,
  `catatan_guru` text DEFAULT NULL,
  `status_validasi` enum('pending','disetujui') DEFAULT 'pending',
  `pesan_kepsek` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_perkembangan`
--

INSERT INTO `laporan_perkembangan` (`id_laporan`, `id_siswa`, `tanggal_lap`, `nilai_aik`, `nilai_cpabp`, `nilai_cpjd`, `nilai_cpdl`, `nilai_p5`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `sakit`, `izin`, `alfa`, `aspek_motorik`, `aspek_kognitif`, `catatan_guru`, `status_validasi`, `pesan_kepsek`) VALUES
(12, 1, '2026-02-17', 'A', 'A', 'A', 'A', 'A', 2, 2, NULL, 0, 0, 0, NULL, NULL, 'csc', 'disetujui', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user_ortu` int(11) UNSIGNED DEFAULT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user_ortu`, `nama_anak`, `nisn`, `kelas`) VALUES
(1, 6, 'muhaemin', '565', 'aa'),
(2, NULL, 'sas', '22', 'sa'),
(3, NULL, 'muhaeminnn', '7687', 'aa'),
(4, 5, 'asa', '78', 'ss'),
(5, NULL, 'sas', '66', '77'),
(6, NULL, 'muhaeminnn', '565', 'j'),
(7, NULL, 'sas', '232', '33'),
(8, NULL, 'mmm', 'oii09', 'km');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','guru','kepsek','orangtua') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `created_at`) VALUES
(1, 'admin1', '123', 'Administrator Utama', 'admin', '2026-02-14 20:59:20'),
(2, 'guru1', '123', 'Ibu Guru Ani', 'guru', '2026-02-14 20:59:20'),
(3, 'kepsek1', '123', 'Bapak Kepala Sekolah', 'kepsek', '2026-02-14 20:59:20'),
(4, 'ortu1', '123', 'Wali Murid Budi', 'orangtua', '2026-02-14 20:59:20'),
(5, 'cukimay', '123', 'Muhaemin Nurhidayat', 'orangtua', '2026-02-14 22:29:25'),
(6, 'ortu muhaemin', '123', 'Muhaemin Nurhidayatd', 'orangtua', '2026-02-14 22:30:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `laporan_perkembangan`
--
ALTER TABLE `laporan_perkembangan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_perkembangan`
--
ALTER TABLE `laporan_perkembangan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Constraints for table `laporan_perkembangan`
--
ALTER TABLE `laporan_perkembangan`
  ADD CONSTRAINT `laporan_perkembangan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
