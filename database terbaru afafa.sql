-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2026 at 07:41 PM
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
  `guru_wali` varchar(100) DEFAULT NULL,
  `status_validasi` enum('pending','disetujui') DEFAULT 'pending',
  `pesan_kepsek` text DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL,
  `foto6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_perkembangan`
--

INSERT INTO `laporan_perkembangan` (`id_laporan`, `id_siswa`, `tanggal_lap`, `nilai_aik`, `nilai_cpabp`, `nilai_cpjd`, `nilai_cpdl`, `nilai_p5`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `sakit`, `izin`, `alfa`, `aspek_motorik`, `aspek_kognitif`, `catatan_guru`, `guru_wali`, `status_validasi`, `pesan_kepsek`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`) VALUES
(12, 1, '2026-02-17', 'A', 'A', 'A', 'A', 'A', 2, 2, NULL, 0, 0, 0, NULL, NULL, 'csc', NULL, 'disetujui', '', NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 4, '2026-02-26', 'A', 'A', 'A', 'A', 'A', -0.1, -0.1, NULL, 2, 0, 0, NULL, NULL, 'vcvcx', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 10, '2026-02-26', 'A', 'A', 'A', 'A', 'A', -0.1, -0.1, NULL, 0, 0, 0, NULL, NULL, 'mm', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 6, '2026-02-26', 'A', 'A', 'A', 'A', 'A', -0.1, -0.1, NULL, 0, 0, 0, NULL, NULL, 'kmk', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, '2026-02-26', 'A', 'A', 'A', 'A', 'A', 2, 22, NULL, -3, 0, 0, NULL, NULL, 'sssss2s', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 'mkkmk', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 'ccdc', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 10, '2026-02-26', 'A', 'A', 'A', 'A', 'A', 334, 4343340, NULL, 0, 0, 0, NULL, NULL, 'dcdcd', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, '2026-02-26', 'A', 'A', 'A', 'A', 'A', 3232330000, 23232, NULL, 0, 0, 0, NULL, NULL, 'cccdcdc', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 7, '2026-02-26', 'A', 'A', 'A', 'A', 'A', 232323, 0, NULL, 0, 0, 0, NULL, NULL, ' c c fvfdvcd', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 10, '2026-02-26', 'A', 'A', 'A', 'A', 'A', 0.3, -0.3, NULL, 0, 0, 0, NULL, NULL, 'cdcd', 'cscs', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, '2026-02-26', 'A', 'A', 'A', 'A', 'A', 0.1, -0.1, NULL, 0, 0, 0, NULL, NULL, ',m,m', 'mm', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', -0.1, -0.1, 222, 0, 0, 0, 'ssss', 'sss', 'dscsdcd', 'mm', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', 0.1, 0.1, NULL, 1, 1, 1, NULL, NULL, 'jkjj', 'dss', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', 0.1, 0.1, NULL, -1, -1, -1, NULL, NULL, 'csd', 'cccc', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', 0.2, 0.2, NULL, 2, -2, 2, NULL, NULL, 'asaasa', 'asasas', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', 2222, 2222, 222, 22, 22, 22, NULL, NULL, '222', 'Ibu Guru Ani', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', 222, 222, 222, 22, 222, 22, NULL, NULL, '222', 'Ibu Guru Ani', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', 22, 0, 0, 0, 0, 0, NULL, NULL, '', 'Ibu Guru Ani', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 11, '2026-02-27', 'A', 'A', 'A', 'A', 'A', 22, 22, 2222, 22, 222, 22, NULL, NULL, '222', 'Ibu Guru Ani', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_post` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi_konten` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id_post`, `judul`, `isi_konten`, `gambar`, `id_guru`, `created_at`) VALUES
(2, 'n', 'nb', '1771744864_f3fcd11af281b77357aa.jpg', 2, '2026-02-22 14:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user_ortu` int(11) UNSIGNED DEFAULT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT 'ISLAM',
  `anak_ke` int(11) DEFAULT NULL,
  `nama_orang_tua` varchar(100) DEFAULT NULL,
  `pekerjaan_orang_tua` varchar(100) DEFAULT NULL,
  `alamat_jalan` text DEFAULT NULL,
  `desa_kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT 'JATIBARANG',
  `kabupaten` varchar(100) DEFAULT 'BREBES',
  `provinsi` varchar(100) DEFAULT 'JAWA TENGAH',
  `kelas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user_ortu`, `nama_anak`, `nama_panggilan`, `nis`, `nisn`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `anak_ke`, `nama_orang_tua`, `pekerjaan_orang_tua`, `alamat_jalan`, `desa_kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kelas`) VALUES
(1, 6, 'muhaemin', NULL, NULL, '565', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', 'aa'),
(2, NULL, 'sas', NULL, NULL, '22', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', 'sa'),
(3, NULL, 'muhaeminnn', NULL, NULL, '7687', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', 'aa'),
(4, 5, 'asa', NULL, NULL, '78', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', 'ss'),
(5, NULL, 'sas', 'aa', 'sss', '66', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', '77'),
(6, NULL, 'muhaeminnn', NULL, NULL, '565', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', 'j'),
(7, NULL, 'sas', NULL, NULL, '232', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', '33'),
(8, NULL, 'mmm', NULL, NULL, 'oii09', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', 'km'),
(9, NULL, 'dsad', NULL, NULL, '232', NULL, NULL, NULL, 'ISLAM', NULL, NULL, NULL, NULL, NULL, 'JATIBARANG', 'BREBES', 'JAWA TENGAH', NULL),
(10, NULL, 'dsdfd', 'aa', '3434', '4343', 'Laki-laki', 'Tegal', '2026-02-19', 'ISLAM', 3, 'sfs', 'dvdv', 'vfdv', 'dvd', 'vdv', NULL, NULL, 'TK A'),
(11, NULL, 'panaak', 'dfvf', '42343', '43424', 'Perempuan', 'Tegal', '2026-02-04', 'ISLAM', 43, 'fefe', 'fefe', 'Jl bani arsyad rt 01 rw 03 kel.margasari kec.cimone\r\nkontrakan mamah tari', 'cef', 'ferfe', NULL, NULL, 'KB');

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
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_post`);

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
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
