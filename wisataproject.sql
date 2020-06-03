-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 05:08 AM
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
(1, '1590649643.jpg', '2020-05-28 07:07:23', 1590649643),
(2, '1590650038.jpg', '2020-05-28 07:13:58', 1590650038),
(3, '1590650143.jpg', '2020-05-28 07:15:43', 1590650143),
(4, '1590721182.jpg', '2020-05-29 02:59:42', 1590721182),
(5, '1590721516.jpg', '2020-05-29 03:05:16', 1590721516),
(6, '1590721896.jpg', '2020-05-29 03:11:36', 1590721896),
(7, '1590721955.jpg', '2020-05-29 03:12:35', 1590721955),
(8, '1590722028.jpg', '2020-05-29 03:13:48', 1590722028),
(9, '1590722975.jpg', '2020-05-29 03:29:35', 1590722975),
(10, '1590723402.jpg', '2020-05-29 03:36:42', 1590723402),
(11, '1590724414.jpg', '2020-05-29 03:53:34', 1590724414);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `notelp` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`notelp`, `nama`, `email`, `alamat`, `saldo`) VALUES
('6285761990862', 'Zelvi', 'zelvi@gmail.com', 'Sleman', 248800);

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
(1590724414, 'q', 'q', 'q', 34.0169571, -118.28883059999998, '2020-05-29 03:53:34', '085761990862', '');

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
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history_mutasi_user`
--
ALTER TABLE `history_mutasi_user`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1590724415;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
