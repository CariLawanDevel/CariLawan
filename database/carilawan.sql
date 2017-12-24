-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2017 at 07:25 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carilawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `isi_chat` text NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_event`, `id_member`, `isi_chat`, `posted`) VALUES
(16, 1, 1, 'tes', '2017-12-24 13:19:44'),
(17, 1, 3, 'kenapa bro ?', '2017-12-24 13:22:24'),
(18, 1, 1, 'gak apa\" wkwk', '2017-12-24 13:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `banner_event` varchar(30) NOT NULL,
  `pj_event` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id_event`, `nama_event`, `deskripsi`, `tanggal`, `waktu`, `jumlah_peserta`, `biaya`, `lokasi`, `banner_event`, `pj_event`, `id_kategori`) VALUES
(1, 'Futsal Alumni', 'Futsal untuk Alumni MAN 12 Jakarta', '2017-11-09', '02:00:00', 10, 10000, 'Bandung', '', 1, 1),
(2, 'Badminton Lompat', 'Badminton buat yang suka aja', '2017-11-02', '06:00:00', 2, 50000, 'Jakarta', '', 3, 2),
(3, 'Main Badminton Bareng', 'Latihan badminton buat persiapan universal open', '2017-12-20', '04:00:00', 4, 10000, 'Lapangan MAN 2 Bandung', '61153-', 1, 1),
(4, 'Prepare ISAC', 'Prepare buat lomba ISAC IF', '2017-12-19', '00:00:00', 12, 50000, 'Lapangan Futsal Progresiv', '19275-', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_join`
--

CREATE TABLE `tb_join` (
  `id_join` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tanggal_join` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_join`
--

INSERT INTO `tb_join` (`id_join`, `id_member`, `id_event`, `tanggal_join`) VALUES
(1, 1, 1, '2017-11-01 00:00:00'),
(2, 3, 1, '2017-12-02 00:00:00'),
(4, 4, 2, '2017-12-01 00:00:00'),
(11, 1, 3, '0000-00-00 00:00:00'),
(12, 1, 4, '0000-00-00 00:00:00'),
(13, 4, 3, '2017-12-03 21:00:40'),
(20, 1, 4, '2017-12-19 00:00:00'),
(21, 1, 4, '2017-12-19 00:00:00'),
(24, 16, 3, '2017-12-19 11:43:48'),
(25, 2, 2, '2017-12-24 11:09:58'),
(26, 3, 3, '2017-12-24 13:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Futsal'),
(2, 'Badminton');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hobi` varchar(10) NOT NULL,
  `bio` text NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `hobi`, `bio`, `foto`) VALUES
(1, 'Nikko Eka Saputra', 'L', 'Bandung, Indonesia', '08988190546', 'nikkoeka04@gmail.com', 'Ngoding', 'Lets do It !', '62655-nikko.jpg'),
(2, 'si aa', 'L', 'sdffd', '34234424', '32@ag.sdg', 'sdsf', 'ffdf', '20801-'),
(3, 'Adittya Permana', 'L', 'Jakarta', '085782682533', 'adit@gmail.com', 'Main', 'Keep fighting..', NULL),
(4, 'aku kamu', 'P', 'Bandung, Indonesia', '998', 'aku@kamu.com', 'Baca', 'Oke siap laksanakan.', NULL),
(8, 'Satu dua', 'P', 'Bandung, Jawa Barat', '341421424', 'a@a.com', 'Tes', 'tes', NULL),
(10, 'Satu dua', 'L', 'Bandung, Jawa Barat', '1424414', 'fas@aff.com', 'main', 'Main', NULL),
(15, 'coba', 'L', 'coba', '12', 'coba@coba.coba', 'coba', 'coba', NULL),
(16, 'coba', 'L', 'coba', '12', 'coba@coba.coba', 'coba', 'coba', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(15) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`, `id_member`) VALUES
(1, 'nikkoekasaputra04', 'n1k0fc', 'member', 1),
(2, 'aa', 'aa', 'member', 2),
(3, 'adit', 'adit', 'member', 3),
(4, 'aku', 'aku', 'member', 4),
(16, 'coba', 'cobi', 'member', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_member` (`pj_event`);

--
-- Indexes for table `tb_join`
--
ALTER TABLE `tb_join`
  ADD PRIMARY KEY (`id_join`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_join`
--
ALTER TABLE `tb_join`
  MODIFY `id_join` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_join` (`id_member`),
  ADD CONSTRAINT `tb_chat_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `tb_join` (`id_event`);

--
-- Constraints for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD CONSTRAINT `tb_event_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_event_ibfk_2` FOREIGN KEY (`pj_event`) REFERENCES `tb_member` (`id_member`);

--
-- Constraints for table `tb_join`
--
ALTER TABLE `tb_join`
  ADD CONSTRAINT `tb_join_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`),
  ADD CONSTRAINT `tb_join_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
