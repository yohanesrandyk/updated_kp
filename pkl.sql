-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2018 at 03:04 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_perusahaan`
--

CREATE TABLE `bidang_perusahaan` (
  `id_bidang` int(3) NOT NULL,
  `bidangperusahaan` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_perusahaan`
--

INSERT INTO `bidang_perusahaan` (`id_bidang`, `bidangperusahaan`, `created_at`, `updated_at`) VALUES
(1, 'Manufacture', '2017-12-20 06:13:46', '0000-00-00 00:00:00'),
(2, 'Agriculture', '2018-01-02 03:58:40', '0000-00-00 00:00:00'),
(3, 'Education', '2018-02-27 22:53:00', '2018-02-27 22:53:00'),
(4, 'Software Engineering', '2018-03-09 17:39:50', '2018-03-09 17:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `mulai` time DEFAULT NULL,
  `selesai` time DEFAULT NULL,
  `bentuk_kegiatan` text NOT NULL,
  `hasil_pencapaian` text,
  `keterangan` text,
  `paraf` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id`, `divisi`, `mulai`, `selesai`, `bentuk_kegiatan`, `hasil_pencapaian`, `keterangan`, `paraf`, `created_at`) VALUES
(1, 31, 'Front End', '10:20:00', '14:00:00', 'Nothing', 'Tidak ada', NULL, 0, '2018-04-14 03:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(1) NOT NULL,
  `jurusan` varchar(35) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Rekayasa Perangkat Lunak', '2018-02-27 05:56:19', '2018-02-28 06:26:28'),
(2, 'Multimedia', '2018-02-27 05:56:19', '2018-02-28 06:26:32'),
(3, 'Tenkik Kerja Jaringan', '2018-02-27 05:56:32', '2018-02-28 06:26:45'),
(4, 'Pemasaran', '2018-02-27 05:56:32', '2018-02-28 06:26:50'),
(5, 'Administrasi Perkantoran', '2018-02-27 23:23:06', '2018-02-27 23:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `kaprog`
--

CREATE TABLE `kaprog` (
  `id_kaprog` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaprog`
--

INSERT INTO `kaprog` (`id_kaprog`, `id`, `id_jurusan`) VALUES
(1, 11, 1),
(2, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `datang` time DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `ket` text,
  `paraf` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id`, `divisi`, `datang`, `pulang`, `ket`, `paraf`, `created_at`) VALUES
(1, 31, 'Front End', '10:11:00', '16:00:00', 'Hadir', 0, '2018-04-14 03:40:26');

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
(3, '2018_01_11_040044_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemb_rayon`
--

CREATE TABLE `pemb_rayon` (
  `id_pemb` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_rayon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemb_rayon`
--

INSERT INTO `pemb_rayon` (`id_pemb`, `id`, `id_rayon`) VALUES
(1, 17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id_persyaratan` int(11) NOT NULL,
  `nis` int(8) DEFAULT NULL,
  `bantara` int(1) DEFAULT NULL,
  `nilai` int(1) DEFAULT NULL,
  `keuangan` int(1) DEFAULT NULL,
  `kesiswaan` int(1) DEFAULT NULL,
  `cbt_prod` int(1) DEFAULT NULL,
  `kehadiran_pengayaan_pkl` int(1) DEFAULT NULL,
  `lulus_ujikelayakan` int(1) DEFAULT NULL,
  `perpustakaan` int(1) DEFAULT NULL,
  `surat_persyaratan` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id_persyaratan`, `nis`, `bantara`, `nilai`, `keuangan`, `kesiswaan`, `cbt_prod`, `kehadiran_pengayaan_pkl`, `lulus_ujikelayakan`, `perpustakaan`, `surat_persyaratan`, `created_at`, `updated_at`) VALUES
(1, 11505277, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2018-03-14 23:26:22', '2018-04-13 19:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(4) NOT NULL,
  `id_bidang` int(3) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `perusahaan` varchar(50) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text,
  `kode_pos` int(5) DEFAULT NULL,
  `telp` varchar(14) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `id_bidang`, `id_area`, `perusahaan`, `kota`, `alamat`, `kode_pos`, `telp`, `website`, `email`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 'Auditsi', 'Jakarta', 'Grogol, Slipi, Jakarta Barat', 17890, '021590981', 'auditsi.com', 'auditsi@outlock.com', 1, '2017-12-29 20:26:38', '2018-01-16 04:08:24'),
(6, 2, 1, 'IPB', 'Bogor', 'Jln. Raden Saleh', 16123, '083819700038', 'ipb.ac.id', 'ipbbogor@gmail.com', 1, '2018-01-01 21:00:38', '2018-01-16 04:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id_rayon` int(11) NOT NULL,
  `rayon` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`id_rayon`, `rayon`) VALUES
(1, 'Tajur 1'),
(2, 'Tajur 2'),
(3, 'Tajur 3'),
(4, 'Tajur 4'),
(5, 'Wikrama 1'),
(6, 'Cicurug 3');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
(1, 'BKK', '2017-12-19 04:54:08', '2018-02-28 05:21:37'),
(2, 'Kepala Program', '2017-12-19 04:54:08', '2018-02-28 05:21:43'),
(3, 'Siswa', '2017-12-19 04:54:27', '2018-02-28 05:21:47'),
(4, 'Pembimbing Rayon', '2018-02-27 05:44:47', '0000-00-00 00:00:00'),
(5, 'Pembimbing Pramuka', '2018-02-27 05:44:47', '0000-00-00 00:00:00'),
(6, 'Perpustakaan', '2018-02-27 05:45:31', '0000-00-00 00:00:00'),
(7, 'Kesiswaan', '2018-02-27 05:45:31', '0000-00-00 00:00:00'),
(8, 'Keuangan', '2018-02-27 05:45:49', '0000-00-00 00:00:00'),
(9, 'Kurikulum', '2018-04-16 11:43:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(3) NOT NULL,
  `rombel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `rombel`, `created_at`, `updated_at`) VALUES
(1, 'RPL XI - 1', '2018-02-28 03:34:21', '2018-02-28 06:25:53'),
(2, 'RPL XI - 2', '2018-02-28 03:34:21', '2018-02-28 06:25:58'),
(3, 'TKJ XI - 1', '2018-02-27 23:22:50', '2018-02-28 06:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id_session` int(11) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `nama_sesi` varchar(50) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(8) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_rayon` int(2) DEFAULT NULL,
  `id_jurusan` int(1) DEFAULT NULL,
  `id_rombel` int(3) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `id_perusahaan` int(4) DEFAULT NULL,
  `status_perusahaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id`, `id_area`, `id_rayon`, `id_jurusan`, `id_rombel`, `agama`, `jk`, `id_perusahaan`, `status_perusahaan`) VALUES
(11505277, 31, 1, 5, 1, 2, 'Kristen Katolik', 'L', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_typesurat` int(1) DEFAULT NULL,
  `id_perusahaan` int(4) DEFAULT NULL,
  `nomersurat` varchar(255) DEFAULT NULL,
  `isi` text,
  `tgl_keluar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_typesurat`, `id_perusahaan`, `nomersurat`, `isi`, `tgl_keluar`, `created_at`, `updated_at`) VALUES
(5, 3, 6, 'B.001/Surat Pengantar/Perusahaan', '15;2017 / 2018;Iin Muliana', '01/03/2018', '2018-03-13 00:04:52', '2018-03-13 00:04:52'),
(6, 4, 6, 'B.002/Surat Pengantar/IPB', '03 Mar 2018;08 Jun 2018;Iin Muliana', '01/03/2018', '2018-03-13 00:26:52', '2018-03-13 00:26:52'),
(7, 1, 6, 'B.002/Surat Permohonan/Permohonan PKL', '7;Januari;Juli;2017;085782683146;086782683146;randykurniayanto@gmail.com;Iin Mulyani', '01/03/2018', '2018-03-13 00:40:50', '2018-03-13 00:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `type_surat`
--

CREATE TABLE `type_surat` (
  `id_typesurat` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_role` int(2) DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `bop` varchar(25) DEFAULT NULL,
  `bod` date DEFAULT NULL,
  `alamat` text,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `username`, `nama`, `password`, `email`, `remember_token`, `telp`, `bop`, `bod`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(15, 2, 'julianamansur', 'Juliana Mansur', '$2y$10$mUGcgSiaS/CXo0Xs8LYKo.FQ1LrK3P/nBizFXcsJJQMkN7rO3hb6C', 'julianamansur@gmail.com', 'W8jOi4PNoG3XGxOECLy3HExbxtSiEVl2bmoDuf2gPT28CIN9KPPzzvfGJHGw', '08132842647', 'Bogor', '1990-08-08', 'Bogor', 0, '2018-02-27 23:28:49', '2018-04-16 12:41:42'),
(17, 4, 'komalasari', 'Komalasari', '$2y$10$LwhgsTpSd0UQeDMkfQ.y8usL4cAyoPLgcOEw4cwsU/unMEKfShM5C', 'komalasari@gmail.com', 'nUxCVNdOViqvyyJKoqvyIBH3sJjfhiTq2VUCo4glVoNbehzwEJVsftCmZJAV', '8437434892', 'Bogor', '1979-07-07', 'Bogor', 0, '2018-02-27 23:59:05', '2018-04-14 02:31:47'),
(18, 5, 'ceceperik', 'Cecep Erik Kurniawan', '$2y$10$k7mSQX2fmye.mFC1/ZOAc.O3ZjZF5r07yn7ave.gbKtynpF1OVmeW', 'ceceperik@gmail.com', 'goniEGuf2UE9ARsQbEfkBfIUbr2MdQdk12LAadgaBgjTusn42eoso47rTyd7', '084394298924', 'Bogor', '1980-09-08', 'Bogor', 0, '2018-02-28 00:00:20', '2018-03-14 11:23:07'),
(20, 7, 'budiono', 'Budiono', '$2y$10$MydE6XbXOFly1pT/ByAEaeL1lkqiH7k4XJqS6TVf8XXNBoCa9uCOK', 'budiono@gmail.com', 'Zn3mkHFzEXX76TfcIl4m1FVpYvrgKvF7AOVtN1R5irynxbIIfMrE5sDcdtSH', '08427428478', 'Bogor', '1980-08-08', 'Bogor', 0, '2018-02-28 00:02:27', '2018-03-14 12:05:32'),
(27, 8, 'lia1234', 'Lia', '$2y$10$6NbVd5KipvhqRjSYEysDT.GnYK8Q7ANtrl75hQjLlN52.pk8o6XsC', 'lia@gmail.com', NULL, '0812345678', 'Bogor', '1212-12-12', 'Bogor Selatan', 0, '2018-03-14 04:56:41', '2018-03-14 04:56:41'),
(28, 1, 'silvi', 'Silvi', '$2y$10$mD7S/nyFndFkFy9vV.iIUuh/UTYfWjllIaYTzfOw3owLgoCeX6H36', 'silvi@gmail.com', 'PPcRnyV3ZTi8C98WMtfinvxF381g5DhyB3kbR2zi7fmcdeRSVs212tc2Rk4d', '0890567456', 'Bogor', '1212-12-12', 'Bogor', 0, '2018-03-14 05:04:08', '2018-04-16 12:16:03'),
(29, 6, 'zakaria', 'Zakaria', '$2y$10$ZuZ6pgVYsjBVtTytgqsdzu9Z0u96k7TXA5t49QrYtkEvkomB6sBaC', 'zakaria@gmail.com', 'YKnlaFeJpDBmPX7vCy4htyiaUDXVpSHHT087oVqd6Xn7BY2n3BGIDpzwhWah', '0978765675', 'Bogor', '1211-12-12', 'Bogor', 0, '2018-03-14 05:05:00', '2018-04-14 02:33:42'),
(31, 3, 'yohanes', 'Yohanes Randy Kurnianto', '$2y$10$DZtB56lQam8MpgPaDtO/y.h6EVaj43SL1dkpCw/bEsQxAW1gYy31y', 'randykurniayanto@gmail.com', 'FwvbZV77jZg8t6E3IvyTwHo3csw4ccmVUxQ8ZrUnDsqUvZnOitpia8s3Nuvc', '085782683146', 'Bogor', '2000-05-16', 'Kp. Sukajaya, Cipaku, Bogor Selatan', 5, '2018-03-14 23:26:22', '2018-04-16 12:38:35'),
(32, 9, 'kurikulum', 'Kurikulum', '$2y$10$mPiYim0OLZyFErDyKSPQP.4egO7jaPk93j0msCBaJtli.JJz/okd6', 'kurikulum@gmail.com', 'omdgA357v8ywvcP7dbKXNdCTto4upuwO7jXqCnhoJMBqPBx0kI403kdINcic', '0819208921', 'Bogor', '2000-11-01', 'Bogor', 0, '2018-04-16 04:50:44', '2018-04-16 12:38:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_perusahaan`
--
ALTER TABLE `bidang_perusahaan`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kaprog`
--
ALTER TABLE `kaprog`
  ADD PRIMARY KEY (`id_kaprog`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemb_rayon`
--
ALTER TABLE `pemb_rayon`
  ADD PRIMARY KEY (`id_pemb`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id_persyaratan`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`),
  ADD UNIQUE KEY `nama_sesi` (`nama_sesi`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_rayon` (`id_rayon`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_rombel` (`id_rombel`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_typesurat` (`id_typesurat`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `type_surat`
--
ALTER TABLE `type_surat`
  ADD PRIMARY KEY (`id_typesurat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_perusahaan`
--
ALTER TABLE `bidang_perusahaan`
  MODIFY `id_bidang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kaprog`
--
ALTER TABLE `kaprog`
  MODIFY `id_kaprog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemb_rayon`
--
ALTER TABLE `pemb_rayon`
  MODIFY `id_pemb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id_persyaratan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id_rayon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `type_surat`
--
ALTER TABLE `type_surat`
  MODIFY `id_typesurat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD CONSTRAINT `relasiSiswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE;

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `relasiBidang` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_perusahaan` (`id_bidang`) ON DELETE SET NULL;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `relasiJurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE SET NULL,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `relasiRole` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
