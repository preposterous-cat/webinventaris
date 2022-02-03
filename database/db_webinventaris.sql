-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 03:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webinventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Lord', 'LordKing123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `kondisi` enum('Baru','Bekas') NOT NULL,
  `biaya_stn` int(50) NOT NULL,
  `biaya_total` int(50) NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `jenis` enum('Sarana','Prasarana') NOT NULL,
  `diunggah` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `bm_terakhir` datetime DEFAULT NULL,
  `bk_terakhir` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `supplier`, `stok`, `kondisi`, `biaya_stn`, `biaya_total`, `sumber`, `jenis`, `diunggah`, `tanggal`, `bm_terakhir`, `bk_terakhir`) VALUES
(5, 'Kursi', 'PT Matemathics', 60, 'Bekas', 400000, 0, 'Hibah', 'Sarana', 'Admin', '2021-07-05 03:22:56', '2021-07-12 14:05:23', '2021-07-08 12:25:30'),
(6, 'Meja', 'PT Fisika Farma', 100, 'Bekas', 1000300000, 0, 'Hutang', 'Sarana', 'Admin', '2021-07-06 13:24:23', '2021-07-11 18:24:59', '2021-07-12 14:05:42'),
(8, 'Lemari', 'PT Astonout', 30, 'Baru', 2500000, 0, 'Hibah', 'Sarana', 'ryoumei - Pengelola Barang', '2021-07-10 13:46:04', '2021-07-10 14:21:29', '2021-07-11 18:25:25'),
(9, 'Bon Cabe', 'PT Matemathics', 15, 'Baru', 20000, 300000, 'Uang Kas', 'Sarana', 'Admin', '2021-08-29 10:12:56', NULL, NULL),
(10, 'Bon Cabe', 'PT Deep Learning', 25, 'Baru', 10000, 150000, 'Hibah', 'Sarana', 'Admin', '2021-08-29 10:58:03', '2021-08-29 14:14:36', NULL),
(11, 'Kursi', 'PT Astonout', 120, 'Baru', 100000, 20000000, 'Uang Kas', 'Sarana', 'Admin', '2021-08-29 13:51:09', '2021-08-29 13:58:57', NULL),
(12, 'Obeng', 'PT Matemathics', 10, 'Baru', 40000, 400000, 'Hutang', 'Prasarana', 'sasaki3 - Staff', '2021-08-29 16:58:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_bk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `diunggah` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_bk`, `id_barang`, `nama_barang`, `supplier`, `jumlah`, `keterangan`, `diunggah`, `tanggal`) VALUES
(2, 6, 'Meja', 'PT Fisika Farma', 50, 'Rusak', 'Admin', '2021-07-08 12:28:58'),
(3, 3, 'Pena', 'PT Fisika Farma', 10, 'Rusak dan Patah', 'simohayha - Sekretar', '2021-07-10 00:41:45'),
(4, 8, 'Lemari', 'PT Astonout', 5, 'Rusak', 'ruby123 - Sekretaris', '2021-07-10 14:22:16'),
(5, 8, 'Lemari', 'PT Astonout', 10, 'Rusak', 'simohayha - Sekretaris', '2021-07-11 18:25:25'),
(6, 6, 'Meja', 'PT Fisika Farma', 10, 'Rusak', 'Admin', '2021-07-12 14:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_bm` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `biaya` int(100) NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `diunggah` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_bm`, `id_barang`, `nama_barang`, `supplier`, `jumlah`, `biaya`, `sumber`, `diunggah`, `tanggal`) VALUES
(4, 3, 'Pena', 'PT Fisika Farma', 10, 200000, 'Uang Kas', 'Admin', '2021-07-05 23:36:27'),
(5, 5, 'Kursi', 'PT Matemathics', 5, 200000, 'Hibah', 'Admin', '2021-07-06 00:06:55'),
(6, 6, 'Meja', 'PT Fisika Farma', 40, 100000, 'Hutang', 'Admin', '2021-07-06 13:27:24'),
(9, 5, 'Kursi', 'PT Matemathics', 10, 200000, 'Uang Kas', 'Admin', '2021-07-08 00:28:54'),
(10, 5, 'Kursi', 'PT Matemathics', 10, 100000, 'Hibah', 'simohayha - Sekretaris', '2021-07-10 00:19:31'),
(11, 8, 'Lemari', 'PT Astonout', 5, 500000, 'Hibah', 'ruby123 - Sekretaris', '2021-07-10 14:21:29'),
(12, 6, 'Meja', 'PT Fisika Farma', 20, 200000, 'Uang Kas', 'simohayha - Sekretaris', '2021-07-11 18:24:59'),
(13, 5, 'Kursi', 'PT Matemathics', 10, 100000, 'Hibah', 'Admin', '2021-07-12 14:05:23'),
(14, 11, 'Kursi', 'PT Astonout', 20, 20000000, 'Uang Kas', 'Admin', '2021-08-29 13:52:17'),
(15, 11, 'Kursi', 'PT Astonout', 20, 20000000, 'Uang Kas', 'Admin', '2021-08-29 13:58:57'),
(16, 10, 'Bon Cabe', 'PT Deep Learning', 5, 200000, 'Hibah', 'Admin', '2021-08-29 14:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id_histori` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_histori`
--

INSERT INTO `tb_histori` (`id_histori`, `username`, `tanggal`) VALUES
(1, 'Lord', '2021-07-08 23:16:57'),
(2, 'Lord', '2021-07-09 00:01:28'),
(12, 'sasaki', '2021-07-09 02:22:17'),
(13, 'sasaki', '2021-07-09 02:35:03'),
(14, 'sasaki', '2021-07-09 10:52:57'),
(15, 'Lord', '2021-07-09 14:31:23'),
(16, 'sasaki', '2021-07-09 21:00:55'),
(17, 'sasaki', '2021-07-09 22:09:09'),
(18, 'sasaki', '2021-07-09 22:32:35'),
(19, 'sasaki2', '2021-07-09 22:42:36'),
(20, 'sasaki2', '2021-07-09 22:42:44'),
(21, 'sasaki2', '2021-07-09 22:43:12'),
(22, 'sasaki2', '2021-07-09 22:43:23'),
(23, 'sasaki2', '2021-07-09 22:45:20'),
(24, 'sasaki2', '2021-07-09 22:45:30'),
(25, 'sasaki2', '2021-07-09 22:45:34'),
(26, 'sasaki2', '2021-07-09 22:45:46'),
(27, 'sasaki2', '2021-07-09 22:48:16'),
(28, 'sasaki', '2021-07-09 22:56:17'),
(29, 'sasaki2', '2021-07-09 23:07:36'),
(30, 'sasaki2', '2021-07-09 23:13:26'),
(31, 'sasaki2', '2021-07-09 23:41:04'),
(32, 'sasaki3', '2021-07-09 23:44:17'),
(33, 'sasaki3', '2021-07-09 23:55:38'),
(34, 'simohayha', '2021-07-09 23:59:00'),
(35, 'sasaki3', '2021-07-10 02:24:04'),
(36, 'sasaki3', '2021-07-10 02:28:38'),
(37, 'sasaki3', '2021-07-10 02:28:56'),
(38, 'simohayha', '2021-07-10 02:39:46'),
(39, 'ryoumei', '2021-07-10 13:44:15'),
(40, 'ruby123', '2021-07-10 14:20:55'),
(41, 'Lord', '2021-07-10 16:15:12'),
(42, 'simohayha', '2021-07-11 16:47:28'),
(43, 'simohayha', '2021-07-11 18:18:08'),
(44, 'ruby123', '2021-07-11 18:18:48'),
(45, 'sasaki3', '2021-07-11 18:19:12'),
(46, 'sasaki3', '2021-07-11 18:19:20'),
(47, 'sasaki3', '2021-07-11 18:19:58'),
(48, 'simohayha', '2021-07-11 18:23:21'),
(49, 'sasaki3', '2021-07-11 18:27:48'),
(50, 'Lord', '2021-07-11 18:29:39'),
(51, 'Lord', '2021-07-12 11:59:55'),
(52, 'sasaki3', '2021-07-12 12:11:22'),
(53, 'simohayha', '2021-07-12 12:28:13'),
(54, 'sasaki3', '2021-07-12 14:00:21'),
(55, 'sasaki3', '2021-07-12 14:00:31'),
(56, 'simohayha', '2021-07-12 14:04:15'),
(57, 'Lord', '2021-07-13 11:41:49'),
(58, 'sasaki3', '2021-07-15 11:35:40'),
(59, 'sasaki3', '2021-07-15 11:35:47'),
(60, 'Lord', '2021-07-15 11:41:40'),
(61, 'Lord', '2021-07-17 09:45:50'),
(62, 'simohayha', '2021-07-17 09:47:04'),
(63, 'simohayha', '2021-07-25 14:02:58'),
(64, 'Lord', '2021-07-25 14:11:01'),
(65, 'Lord', '2021-07-25 15:40:50'),
(66, 'simohayha', '2021-08-19 20:59:38'),
(67, 'simohayha', '2021-08-19 21:01:56'),
(68, 'sasaki3', '2021-08-19 21:05:03'),
(69, 'Lord', '2021-08-29 09:20:08'),
(70, 'simohayha', '2021-08-29 16:35:25'),
(71, 'ruby3', '2021-08-29 16:44:25'),
(72, 'ruby123', '2021-08-29 16:44:42'),
(73, 'sasaki3', '2021-08-29 16:45:02'),
(74, 'simohayha', '2021-08-29 16:59:38'),
(75, 'simohayha', '2021-08-30 09:02:08'),
(76, 'simohayha', '2021-08-30 16:50:43'),
(77, 'simohayha', '2021-08-30 17:06:30'),
(78, 'sasaki3', '2021-08-30 17:07:12'),
(79, 'sasaki3', '2021-08-30 17:07:40'),
(80, 'Lord', '2021-08-30 17:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_sup` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_sup`, `alamat`, `nomor`) VALUES
(2, 'PT Matemathics', 'Jl. X Nomor Y Kec XCV', '08958383667'),
(4, 'PT Deep Learning', 'Jalan X nomor V kecamatan NBV Kabupaten OVW', '08958382369'),
(5, 'PT Astonout', 'Jl. X Nomor C Kecamatan ABC Kabupaten Z', '09876543632');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bagian` enum('Staff','Sekretaris') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `username`, `bagian`, `password`) VALUES
(7, 'Sasaki Kyoujiro', 'sasaki3', 'Staff', '$2y$10$5yKpWAlhxFGc4ysmRpJzQuWV.i6dorO1Ep1/9DAN1Zdlg9tNTs2r2'),
(8, 'Simo Hayha', 'simohayha', 'Sekretaris', '$2y$10$cXxL0ZXKn6qrM7jEJ75/xuYiMaomqzsIMQMg5Vu8eeC3T.37OT92a'),
(9, 'Ryoumei Sukuna', 'ryoumei', 'Staff', '$2y$10$VYJA2WzhiEa3kTW67vCP1uPshDW/hxstzv5ofOAU.OMOKIETd.reK'),
(10, 'Ruby', 'ruby123', 'Sekretaris', '$2y$10$APV4Xau1KzIcs9Zeq8VVLOJmaYs7DBBw/zY9acVNqQuKsf1Yfe/nu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indexes for table `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_bm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
