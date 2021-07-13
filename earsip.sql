-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2021 at 06:16 AM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`) VALUES
(1, 'PT. Nihao', 'Jalan Nggronjal No. 34 Cina Taipe'),
(2, 'PT. Jaya Makmur', 'Kediri Raya'),
(3, 'PT. Ngabur', 'Nganjuk'),
(7, 'PT. Rumah Tetangga', 'Kulon Progo, Yogyakarta'),
(9, 'PT Mencari cinta sejati', 'Jln in dulu aja');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_agenda` int(11) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_penerima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` int(2) DEFAULT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registrar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_surat`, `nomor_agenda`, `tanggal_surat`, `tanggal_keluar`, `perihal`, `penerima`, `alamat_penerima`, `lampiran`, `kode`, `keterangan`, `file`, `registrar`) VALUES
(11, '123', 1, '2021-07-17', '2021-07-22', 'perihal', 'kPenerima', 'kAlamat', 4, 'newCode', 'kKeterangan', 'surat_keluar_60e8731f43511.pdf', 'why'),
(12, '123', 2, '2021-07-16', '2021-07-10', 'perihal', 'kPenerima', 'kAlamat', 3, 'waqe', 'kKeterangan', 'surat_keluar_60e660dd1e8e1.pdf', 'and1'),
(13, '123', 1, '2021-07-09', '2020-02-12', 'perihal', 'kPenerima edit', 'kAlamat', 3, 'waqe', 'keterangan', NULL, 'why'),
(14, '13/KL/21', 3, '2021-07-08', '2021-07-11', 'ngungsi', 'yudi', 'kejapanan', 1, '145', 'cek', 'surat_keluar_60ebd9e4517e3.pdf', 'robert'),
(16, 'test', 2, '2021-07-14', '2020-03-13', 'kPerihal', 'kPenerima edit', 'kAlamat', 1, 'waqe', 'kKeterangan', 'surat_keluar_60ed28361e5be.pdf', 'why');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_agenda` int(11) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengirim` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` int(2) DEFAULT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registrar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor_surat`, `nomor_agenda`, `tanggal_surat`, `tanggal_masuk`, `perihal`, `pengirim`, `alamat_pengirim`, `lampiran`, `kode`, `keterangan`, `file`, `alamat_aksi`, `informasi`, `catatan`, `registrar`) VALUES
(17, '123', 1, '2021-07-08', '2021-07-01', 'perihal', 'pengirim2222', 'alamat', 5, 'waqe', 'keterangan', 'surat_masuk_60e65e1e721ea.pdf', NULL, NULL, NULL, 'and1'),
(19, 'GJ/014/KM-2/2021', 3, '2021-07-19', '2021-07-17', 'Permohonan maaf', 'PT. Jus Amma', 'Jl. Pocong RT: 001 RW: 003', 3, '3214', 'Surat keterangan tidak mampu', 'surat_masuk_60e68fdfa24d8.pdf', 'kediri', NULL, NULL, 'and1'),
(20, '22', 4, '2021-07-02', '2021-07-10', 'hahaha', 'adada', 'asssss', 123, '1234', 'aaa', 'surat_masuk_60e695a4a44b9.pdf', '123', '123', '123', 'why'),
(21, '12/KTY/54/21', 4, '2021-07-14', '2021-07-12', 'kunjungan', 'ada', 'malang', 0, '32', 'kerja', NULL, 'qwert', 'hjkl', '12354567', 'robert'),
(24, '123', 1, '2021-07-12', '2020-02-12', 'perihal', 'pengirim2222', 'alamat', 1, 'waqe', 'kKeterangan', NULL, 'wwwwwww', 'wwwwwwwwwww', 'wwwwwwwww', 'why');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(1) DEFAULT NULL COMMENT '1 = super super; 2 = normal user',
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `level`, `gambar`, `id_perusahaan`) VALUES
('admin', 'Mada April', '$2y$10$TKCEkXkuovvQ7He5DB/m8OhfwXuJaMooq4vVrIQCSKkyFeD473lBC', 1, 'gambar_user_60ed1b4ceb143.jpg', NULL),
('and1', 'Andi Epical Glory', '$2y$10$qqmKoCgNMwy01eTPLpb3tuQc1Q1j3CRUksRHerArkkEwJ0YuSywYC', 2, 'gambar_user_60e68f34a4f8e.jpg', 7),
('anu', 'nganu', '$2y$10$BYiSbEVrosK5G6TE2aR4F.OWg9tbYL9YC9IP035BCNocyHojb7ybq', 1, NULL, 1),
('cecak', 'cecak ', '$2y$10$2yqQ4xcEnpH85Ujw72DrNe2ZuidOE.X8LdFq1JrYdhl4VrP3pQGty', 2, 'gambar_user_60ed0e322e564.jpg', 3),
('dewa', 'dewa', '$2y$10$XIw7i/xF3.1sKwF8tZHN7u7C8KCM4fB4OU8MXlR9bbsYp5bTg5zSq', 2, 'default.png', 1),
('kunam', 'namku', '$2y$10$sFSweKCO1G28tQsELUPwTeUsU1l.Eg0QdsR3qH9qifYdek5KOkQIa', 2, 'gambar_user_60ed212f87078.gif', 9),
('robert', 'robert', '$2y$10$FMgBaB4gcDA0r3bAbtUYfuxq8MGaF2QnrQRYERcmVKp53JWAhB9ee', 2, 'gambar_user_60ed007b90dcf.png', 3),
('why', 'Wahyu Rizki A', '$2y$10$QD3vMiOYWZKumAGPbtB7BOx.DdCItqyooSX1td397Um5Hg3ltK5He', 2, 'gambar_user_60ebea74d2382.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrar` (`registrar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrar` (`registrar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `user_ibfk_1` (`id_perusahaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`registrar`) REFERENCES `user` (`username`);

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`registrar`) REFERENCES `user` (`username`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
