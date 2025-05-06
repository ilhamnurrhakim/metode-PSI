-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 11:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_eko`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis_kriteria` enum('Benefit','Cost') NOT NULL,
  `tipe_kriteria` enum('Inputan','Pilihan') NOT NULL,
  `simpan_kriteria` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `jenis_kriteria`, `tipe_kriteria`, `simpan_kriteria`) VALUES
('C1', 'Penghasilan Orang Tua', 'Cost', 'Pilihan', '2024-07-22 07:09:22'),
('C2', 'Prestasi', 'Benefit', 'Pilihan', '2024-07-20 18:58:44'),
('C3', 'Nilai Rata-rata', 'Benefit', 'Inputan', '2024-07-20 18:59:01'),
('C4', 'Penerima KIP', 'Benefit', 'Pilihan', '2024-07-21 17:02:42'),
('C5', 'Penerima PIP', 'Benefit', 'Pilihan', '2024-07-21 17:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` varchar(20) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `periode` int(11) NOT NULL,
  `C1` float NOT NULL,
  `C2` float NOT NULL,
  `C3` float NOT NULL,
  `C4` float NOT NULL,
  `C5` float NOT NULL,
  `simpan_nilai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `nisn`, `periode`, `C1`, `C2`, `C3`, `C4`, `C5`, `simpan_nilai`) VALUES
('2024-072947', '﻿0107410097', 2024, 1, 3, 77.87, 4, 5, '2024-07-22 07:29:47'),
('2024-080615', '0079819217', 2024, 2, 1, 78.75, 5, 5, '2024-07-22 08:06:15'),
('2024-080829', '0102684285', 2024, 4, 1, 80.5, 4, 4, '2024-07-22 08:08:29'),
('2024-080959', '0089697349', 2024, 1, 1, 76.33, 4, 5, '2024-07-22 08:09:59'),
('2024-081143', '0094514980', 2024, 3, 2, 76.25, 4, 5, '2024-07-22 08:11:43'),
('2024-081353', '0098118102', 2024, 3, 1, 78.75, 4, 4, '2024-07-22 08:13:53'),
('2024-081451', '0087871167', 2024, 1, 1, 78.75, 5, 5, '2024-07-22 08:14:51'),
('2024-081615', '0089490855', 2024, 4, 1, 75.75, 5, 5, '2024-07-22 08:16:15'),
('2024-081744', '0114176066', 2024, 3, 1, 74.66, 4, 4, '2024-07-22 08:17:44'),
('2024-081856', '0076918386', 2024, 3, 2, 81.25, 5, 5, '2024-07-22 08:18:56'),
('2024-081958', '0095645380', 2024, 2, 1, 75.5, 4, 5, '2024-07-22 08:19:58'),
('2024-082127', '0064229270', 2024, 2, 1, 78.75, 4, 4, '2024-07-22 08:21:27'),
('2024-082246', '0089128461', 2024, 1, 1, 70.16, 4, 5, '2024-07-22 08:22:46'),
('2024-082401', '0102627385', 2024, 3, 1, 75.25, 4, 5, '2024-07-22 08:24:01'),
('2024-082528', '0098197801', 2024, 2, 3, 80.16, 4, 5, '2024-07-22 08:25:28'),
('2024-082624', '0087114453', 2024, 2, 1, 75.83, 4, 4, '2024-07-22 08:26:24'),
('2024-082735', '0069922719', 2024, 2, 1, 75.71, 4, 5, '2024-07-22 08:27:35'),
('2024-082826', '0091928983', 2024, 2, 3, 75.87, 4, 5, '2024-07-22 08:28:26'),
('2024-084453', '0087106847', 2024, 2, 1, 63.75, 4, 4, '2024-07-22 08:44:53'),
('2024-084553', '0092240161', 2024, 3, 1, 60.83, 5, 5, '2024-07-22 08:45:53'),
('2024-084701', '0111253045', 2024, 3, 4, 75.62, 5, 5, '2024-07-22 08:47:01'),
('2024-084756', '0103687525', 2024, 1, 1, 70.62, 4, 5, '2024-07-22 08:47:56'),
('2024-084922', '0098696033', 2024, 2, 1, 79.12, 4, 5, '2024-07-22 08:49:22'),
('2024-085151', '0102804477', 2024, 3, 1, 80.62, 4, 4, '2024-07-22 08:51:51'),
('2024-085241', '0091844518', 2024, 4, 1, 75.71, 4, 4, '2024-07-22 08:52:41'),
('2024-085339', '0094011681', 2024, 1, 4, 76.25, 4, 5, '2024-07-22 08:53:39'),
('2024-085454', '0081051093', 2024, 2, 1, 75.83, 4, 5, '2024-07-22 08:54:54'),
('2024-085833', '0104416517', 2024, 2, 1, 75.83, 4, 5, '2024-07-22 08:58:33'),
('2024-085927', '0087881889', 2024, 2, 2, 75.83, 5, 5, '2024-07-22 08:59:27'),
('2024-090504', '0085566622', 2024, 2, 1, 75.83, 4, 5, '2024-07-22 09:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `jabatan` enum('Kepala Sekolah','Operator Sekolah') NOT NULL,
  `foto_pengguna` text NOT NULL,
  `simpan_pengguna` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_pengguna`, `jabatan`, `foto_pengguna`, `simpan_pengguna`) VALUES
(1, 'admin', 'admin', 'Andika Eko Putra', 'Operator Sekolah', 'Aprilian Gevindo097346900_1443162687-tut_wuri.jpg', '2024-07-30 17:25:44'),
(5, 'root', 'root', 'SAURMAN,S.Pd,MPd', 'Kepala Sekolah', 'Si AnuScreenshot 2023-05-23 010400.png', '2024-07-30 19:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(15) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jk_siswa` enum('Laki-laki','Perempuan') NOT NULL,
  `simpan_siswa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `jk_siswa`, `simpan_siswa`) VALUES
('0064229270', 'AGUS SAPUTRA', 'Laki-laki', '2024-07-22 07:21:26'),
('0069922719', 'Elfa Novita Bakri', 'Perempuan', '2024-07-22 07:21:26'),
('0076918386', 'Ashiva Ferianengsih', 'Perempuan', '2024-07-22 07:21:26'),
('0079819217', 'ABI SAPUTRA', 'Laki-laki', '2024-07-22 07:21:26'),
('0081051093', 'Rahmat Fadillah', 'Perempuan', '2024-07-22 07:21:26'),
('0085566622', 'Rahmad Rizky', 'Laki-laki', '2024-07-22 07:21:26'),
('0087106847', 'Fadila Harun', 'Laki-laki', '2024-07-22 07:21:26'),
('0087114453', 'DEVINA AULIA PUTRI', 'Perempuan', '2024-07-22 07:21:26'),
('0087871167', 'ADRIAN MAULANA', 'Laki-laki', '2024-07-22 07:21:26'),
('0087881889', 'Zikri Hamdani', 'Laki-laki', '2024-07-22 07:21:26'),
('0089128461', 'Cantika Ameliza Putri', 'Perempuan', '2024-07-22 07:21:26'),
('0089490855', 'AFIF LUQMAN', 'Laki-laki', '2024-07-22 07:21:26'),
('0089697349', 'AQILA PUTRI JOESI', 'Perempuan', '2024-07-22 07:21:26'),
('0091844518', 'Qhairul Fajri', 'Laki-laki', '2024-07-22 07:21:26'),
('0091928983', 'Emelli Ahyana Fitra', 'Perempuan', '2024-07-22 07:21:26'),
('0092240161', 'Fricylha Salsabila', 'Perempuan', '2024-07-22 07:21:26'),
('0094011681', 'Qiara Chintya Riezky', 'Perempuan', '2024-07-22 07:21:26'),
('0094514980', 'ADAM MUHAMMAD RAHMAN', 'Laki-laki', '2024-07-22 07:21:26'),
('0095645380', 'Agupin Fauzian', 'Laki-laki', '2024-07-22 07:21:26'),
('0098118102', 'Adek Olyvia Putri', 'Perempuan', '2024-07-22 07:21:26'),
('0098197801', 'DAFFA YUAN NAUFAL', 'Laki-laki', '2024-07-22 07:21:26'),
('0098696033', 'NOVAL PUTRA JASNEDI', 'Perempuan', '2024-07-22 07:21:26'),
('0102627385', 'CINDY BENITA PUTRI', 'Perempuan', '2024-07-22 07:21:26'),
('0102684285', 'ANISA MAQFIRA', 'Perempuan', '2024-07-22 07:21:26'),
('0102804477', 'PRICILIA AMANDA CINTIA', 'Perempuan', '2024-07-22 07:21:26'),
('0103687525', 'NABILA ANURI', 'Perempuan', '2024-07-22 07:21:26'),
('0104416517', 'Winda Adelya', 'Perempuan', '2024-07-22 07:21:26'),
('0111253045', 'HANIFA BATRISYA FARHANA', 'Perempuan', '2024-07-22 07:21:26'),
('0114176066', 'AFRA NAILAH ADZRA', 'Perempuan', '2024-07-22 07:21:26'),
('﻿0107410097', 'Abel Sahputri', 'Perempuan', '2024-07-22 07:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_sub` varchar(30) NOT NULL,
  `nilai_sub` int(11) NOT NULL,
  `simpan_sub` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub`, `kode_kriteria`, `nama_sub`, `nilai_sub`, `simpan_sub`) VALUES
(17, 'C2', 'Tidak Ada', 1, '2024-07-20 19:07:50'),
(18, 'C2', 'Tingkat Sekolah', 2, '2024-07-20 19:08:06'),
(19, 'C2', 'Tingkat Kecamatan', 3, '2024-07-20 19:08:43'),
(20, 'C2', 'Tingkat Kabupaten', 4, '2024-07-20 19:09:07'),
(21, 'C2', 'Tingkat Provinsi', 5, '2024-07-20 19:09:24'),
(22, 'C4', 'Tidak Menerima', 4, '2024-07-22 07:25:57'),
(23, 'C4', 'Penerima', 5, '2024-07-22 07:25:51'),
(30, 'C1', '0 - 500.000', 1, '2024-07-22 07:23:32'),
(31, 'C1', '500.000 - 999.999', 2, '2024-07-22 07:24:48'),
(32, 'C1', '1.000.000 - 1.999.999', 3, '2024-07-22 07:24:06'),
(33, 'C1', '2.000.000 - 4.999.999', 4, '2024-07-22 07:24:40'),
(34, 'C1', '>= 5.000.000', 5, '2024-07-22 07:25:16'),
(35, 'C5', 'Penerima', 5, '2024-07-22 07:26:18'),
(36, 'C5', 'Tidak Menerima', 4, '2024-07-22 07:26:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
