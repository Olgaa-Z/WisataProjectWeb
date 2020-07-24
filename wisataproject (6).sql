-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 06:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisataproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `foto` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `foto`, `tanggal`, `id_wisata`) VALUES
(3, '1590650143.jpg', '2020-05-28 07:15:43', 1590650143),
(5, '1590721516.jpg', '2020-05-29 03:05:16', 1590721516),
(6, '1590721896.jpg', '2020-05-29 03:11:36', 1590721896),
(7, '1590721955.jpg', '2020-05-29 03:12:35', 1590721955),
(8, '1590722028.jpg', '2020-05-29 03:13:48', 1590722028),
(9, '1590722975.jpg', '2020-05-29 03:29:35', 1590722975),
(10, '1590723402.jpg', '2020-05-29 03:36:42', 1590723402),
(11, '1590724414.jpg', '2020-05-29 03:53:34', 1590724414),
(12, '1593240911.jpg', '2020-06-27 06:55:11', 1593240911),
(13, '1594632383.jpg', '2020-07-13 09:26:24', 1594632383);

-- --------------------------------------------------------

--
-- Table structure for table `history_mutasi_user`
--

CREATE TABLE `history_mutasi_user` (
  `id_mutasi` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `balance` int(11) NOT NULL,
  `note` varchar(200) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_mutasi_user`
--

INSERT INTO `history_mutasi_user` (`id_mutasi`, `date`, `description`, `amount`, `type`, `balance`, `note`, `notelp`) VALUES
(6, '2020-05-22 09:18:41', 'ajyush', 200, 'K', 249000, 'sge', '6285761990862'),
(7, '2020-05-22 09:18:55', 'ajyush', 200, 'D', 248800, 'sge', '6285761990862'),
(8, '2020-05-22 09:19:47', 'ajyush', 200, 'D', 249000, 'sge', '6285761990862'),
(9, '2020-05-22 09:20:02', 'ajyush', 200, 'K', 248800, 'sge', '6285761990862');

-- --------------------------------------------------------

--
-- Table structure for table `request_saldo`
--

CREATE TABLE `request_saldo` (
  `id_request` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `is_done` char(1) NOT NULL DEFAULT 'N',
  `request_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_saldo`
--

INSERT INTO `request_saldo` (`id_request`, `email`, `kode_unik`, `nominal`, `is_done`, `request_timestamp`) VALUES
(1, '', 282, 282, 'N', '2020-06-20 03:32:36'),
(2, '', 282, 282, 'N', '2020-06-20 03:34:22'),
(3, '', 931, 250931, 'N', '2020-06-20 03:48:05'),
(4, '', 944, 90944, 'N', '2020-06-20 04:34:27'),
(5, '', 828, 100828, 'N', '2020-06-20 07:36:45'),
(6, '', 918, 100918, 'N', '2020-06-20 07:36:45'),
(7, '', 755, 100755, 'N', '2020-06-20 07:36:45'),
(8, '', 956, 100956, 'N', '2020-06-20 07:36:46'),
(9, '', 525, 100525, 'N', '2020-06-20 07:36:46'),
(10, '', 370, 100370, 'N', '2020-06-20 07:36:46'),
(11, '', 452, 120452, 'N', '2020-06-20 07:37:52'),
(12, '', 979, 300979, 'N', '2020-06-20 07:40:22'),
(13, '', 788, 300788, 'N', '2020-06-20 07:40:22'),
(14, '', 359, 99359, 'N', '2020-06-20 07:41:53'),
(15, '', 433, 67433, 'N', '2020-06-24 01:42:24'),
(16, '', 828, 58828, 'N', '2020-06-26 04:01:50'),
(17, '', 828, 55828, 'N', '2020-06-26 04:10:19'),
(18, '', 918, 63918, 'N', '2020-06-26 04:10:56'),
(19, '', 755, 33755, 'N', '2020-06-26 04:18:52'),
(20, '', 956, 250956, 'N', '2020-06-26 04:19:08'),
(21, '', 828, 80828, 'N', '2020-06-26 08:24:38'),
(22, '', 828, 47828, 'N', '2020-06-26 08:42:16'),
(23, '', 828, 25828, 'N', '2020-06-27 02:16:54'),
(24, 'zelvi@gmail.com', 828, 88828, 'N', '2020-06-27 07:24:21'),
(25, 'zelvi@gmail.com', 828, 98828, 'N', '2020-07-10 09:24:21'),
(26, 'zelvi@gmail.com', 918, 96918, 'N', '2020-07-10 09:24:43'),
(27, 'zelvi@gmail.com', 918, 96918, 'N', '2020-07-10 09:33:59'),
(28, 'zelvi@gmail.com', 755, 120755, 'N', '2020-07-10 09:34:42'),
(29, 'zelvi@gmail.com', 828, 96828, 'N', '2020-07-10 09:35:05'),
(30, 'zelvi@gmail.com', 828, 85828, 'N', '2020-07-10 09:55:05'),
(31, 'zelvi@gmail.com', 828, 195828, 'N', '2020-07-13 08:01:50'),
(32, 'zelvi@gmail.com', 918, 58918, 'N', '2020-07-13 08:02:25'),
(33, 'zelvi@gmail.com', 828, 69828, 'N', '2020-07-13 08:05:50'),
(34, 'zelvi@gmail.com', 828, 196828, 'N', '2020-07-13 08:07:10'),
(35, 'zelvi@gmail.com', 828, 125828, 'N', '2020-07-13 08:07:43'),
(36, 'zelvi@gmail.com', 828, 98828, 'N', '2020-07-13 08:09:40'),
(37, 'olgamaharanizelvia@gmail.com', 828, 65828, 'N', '2020-07-23 00:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `notelp` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `saldo` int(11) NOT NULL,
  `terdaftar_pada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`notelp`, `nama`, `email`, `alamat`, `saldo`, `terdaftar_pada`) VALUES
('6281220766653', 'nama', 'nama@gmail.com', 'bandung', 0, '2020-06-12 15:57:11'),
('6282236447387', 'Siti Zulaiha', 'sitizulaiha@gmail.com', 'BangunTapan, Sleman', 134500, '2020-06-05 14:55:54'),
('6282391394516', 'olga', 'olgamaharanizelvia@gmail.com', 'sleman', 0, '2020-07-22 15:01:32'),
('62857619908543', 'fwf', 'fbdsn', 'fgmdm', 0, '2020-06-03 11:15:32'),
('6285761990862', 'Zelvi', 'zelvi@gmail.com', 'Sleman', 248800, '0000-00-00 00:00:00'),
('6289622069616', 'sisi', 'sisi', 'sisisi', 0, '2020-06-03 14:51:37'),
('85761990861', 'sigit', 'jsghdf', 'sgdhd', 0, '2020-06-03 11:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notelp` varchar(20) NOT NULL,
  `id_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `deskripsi`, `alamat`, `latitude`, `longitude`, `tanggal`, `notelp`, `id_foto`) VALUES
(1590650143, 'tggfnnhfhnhhn', 'nnhhnnhty', 'gfnyytyttr', 34.0169571, -118.28883059999998, '2020-05-28 07:15:43', '085761990862', ''),
(1590721182, 'ok', 'dbhdbd', 'snbd SD ', 0, 0, '2020-05-29 02:59:42', '085761990862', ''),
(1590721516, 'Malioboro', 'kota wisata jogja', 'Malioboro tugu', 0, 0, '2020-05-29 03:05:16', '085761990862', ''),
(1590721896, 'bb', 'bb', 'bn', 0, 0, '2020-05-29 03:11:36', '085761990862', ''),
(1590721955, '', '', '', 0, 0, '2020-05-29 03:12:35', '085761990862', ''),
(1590722028, 'hfhf', 'tegt', 'grhy', 0, 0, '2020-05-29 03:13:48', '085761990862', ''),
(1590722975, 's', 's', 's', 34.0169571, -118.28883059999998, '2020-05-29 03:29:35', '085761990862', ''),
(1590723402, 'hg', 'hg', 'hg', 0, 0, '2020-05-29 03:36:42', '085761990862', ''),
(1590724414, 'q', 'q', 'q', 34.0169571, -118.28883059999998, '2020-05-29 03:53:34', '085761990862', ''),
(1593240911, 'sigit', 'sigit', 'sigit', -7.7578818, 110.4124283, '2020-06-27 06:55:11', '085761990862', ''),
(1594632383, 'bfvdbv', 'jdvdv', 'jdvdv\n', -7.757920599999999, 110.4123113, '2020-07-13 09:26:23', '085761990862', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `history_mutasi_user`
--
ALTER TABLE `history_mutasi_user`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `request_saldo`
--
ALTER TABLE `request_saldo`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`notelp`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `history_mutasi_user`
--
ALTER TABLE `history_mutasi_user`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_saldo`
--
ALTER TABLE `request_saldo`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1594632384;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
