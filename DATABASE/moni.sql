-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 08:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moni`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `nama`, `harga`) VALUES
(1, 'pakaian', 8000.00),
(2, 'sprei', 10000.00),
(3, 'handuk', 9000.00),
(4, 'selimut', 12000.00),
(5, 'karpet kecil', 15000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `status` enum('belum selesai','Proses','Selesai','Dibatalkan') NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `estimasi_selesai` datetime NOT NULL,
  `pakaian` int(11) DEFAULT 0,
  `sprei` int(11) DEFAULT 0,
  `handuk` int(11) DEFAULT 0,
  `selimut` int(11) DEFAULT 0,
  `karpet_kecil` int(11) DEFAULT 0,
  `waktu_masuk` timestamp NULL DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `nomor_hp`, `status`, `total_harga`, `estimasi_selesai`, `pakaian`, `sprei`, `handuk`, `selimut`, `karpet_kecil`, `waktu_masuk`, `aktif`) VALUES
(2, 'Adirana', '683816256254', 'belum selesai', 38000.00, '2024-11-07 00:00:00', 2, 1, 0, 1, 0, '2024-11-06 14:26:39', 1),
(3, 'ALI', '6283816256254', 'Selesai', 38000.00, '2024-11-07 00:00:00', 1, 0, 0, 0, 2, '2024-11-06 14:29:35', 1),
(6, 'ELOY', '6283816256254', 'belum selesai', 17000.00, '2024-11-07 00:00:00', 1, 0, 1, 0, 0, '2024-11-06 15:27:17', 1),
(8, 'adi', '6283816256254@c', 'belum selesai', 8000.00, '2024-11-09 00:00:00', 1, 0, 0, 0, 0, '2024-11-06 08:37:21', 1),
(9, 'Adirana', '6283816256254', 'belum selesai', 8000.00, '2024-11-06 22:39:00', 1, 0, 0, 0, 0, '2024-11-06 15:40:01', 1),
(10, 'adi', '6283816256254@c', 'belum selesai', 8000.00, '2024-11-09 17:00:24', 1, 0, 0, 0, 0, '2024-11-06 10:00:24', 1),
(11, 'adi', '6283816256254@c', 'belum selesai', 8000.00, '2024-11-10 04:11:01', 1, 0, 0, 0, 0, '2024-11-06 21:11:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL,
  `toko_nama` varchar(500) NOT NULL,
  `toko_kota` varchar(250) NOT NULL,
  `toko_alamat` text NOT NULL,
  `toko_tlpn` varchar(250) NOT NULL,
  `toko_wa` varchar(250) NOT NULL,
  `toko_email` varchar(500) NOT NULL,
  `toko_print` int(11) NOT NULL,
  `toko_status` int(11) NOT NULL,
  `toko_ongkir` int(11) NOT NULL,
  `toko_cabang` int(11) NOT NULL,
  `toko_parent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`toko_id`, `toko_nama`, `toko_kota`, `toko_alamat`, `toko_tlpn`, `toko_wa`, `toko_email`, `toko_print`, `toko_status`, `toko_ongkir`, `toko_cabang`, `toko_parent`) VALUES
(1, 'ut', 'Tangerang', 'Gedung Alfa Tower, Lantai 28\r\nJl. Jalur Sutera Barat, Kav. 7-9, Alam Sutera, Tangerang, Indonesia\r\n', '08111012355', '081514678001', 'info@admin.com', 8, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(500) NOT NULL,
  `user_no_hp` varchar(250) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_create` varchar(250) NOT NULL,
  `user_level` varchar(250) NOT NULL,
  `user_status` varchar(250) NOT NULL,
  `user_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_no_hp`, `user_alamat`, `user_email`, `user_password`, `user_create`, `user_level`, `user_status`, `user_cabang`) VALUES
(16, 'superadmin', '081223212915', 'Subang', 'data@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '04 February 2023 11:02:03 am', 'super admin', '1', 0),
(32, 'ADMIN', '083816256254', 'ruko puri\r\nruko', 'admin@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '22 June 2024 3:51:08 am', 'admin', '1', 0),
(37, 'Zefi', '083816256254', 'Bogor', 'zefi@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '22 June 2024 1:53:47 pm', 'Petugas', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
