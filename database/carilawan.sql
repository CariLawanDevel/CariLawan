-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2018 at 05:46 PM
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
(1, 2, 5, 'kenapa bro ?', '2018-01-08 23:41:44'),
(2, 2, 5, 'ass', '2018-01-08 23:41:50'),
(3, 2, 5, 'assalamualaikum..', '2018-01-08 23:42:14'),
(4, 2, 1, 'gak apa\"..', '2018-01-08 23:42:44');

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
(1, 'Futsal bareng Alumni MAN 12', 'Buat alumni MAN 12 Jakarta, ayuk gabung ini event, buat ajang silaturahim antar alumni, ditunggu yaa..', '2018-01-12', '09:00:00', 12, 20000, 'Lapangan Futsal Kosambi Baru', 'futsal-1.jpg', 1, 1),
(2, 'Belajar Badminton', 'Buat yang bisa badminton dan lagi kosong waktunya, join yaa, soalnya mau minta ajarin badminton baut persiapan lomba di sekolah.', '2018-01-02', '08:30:00', 2, 0, 'GOR Grogol', 'badminton-1.jpg', 5, 2),
(3, 'Car Free Day Dago', 'Buat yang minggunya free daripada di rumah tidur, mending jogging yukk, ditunggu yaa, titik kumpul di depan gasibu', '2018-01-07', '06:00:00', 8, 10000, 'CFD Dago', 'jogging-1.jpg', 4, 4),
(4, 'Persiapan ISAC', 'Buat anak futsal Informatika UIN Bandung semua angkatan, latihan yuk buat persiapan lomba ISAC.', '2018-01-20', '13:00:00', 12, 20000, 'Lapangan Futsal Mayasari', 'futsal-3.jpg', 15, 1),
(5, 'Voli UIN Bandung vs Jakarta', 'Laga persahabatan antara tim voli UIN Bandung melawan tim voli UIN Jakarta, buat yang pengen nonton langsung merapat', '2018-01-31', '07:00:00', 30, 5000, 'Lapangan Voli UIN Bandung', 'voli-1.jpg', 12, 3),
(6, 'Jogging ke Manglayang', 'Buat yang yang nganggur minggu pagi, langsung berangkat yuk ke manglayang, daripada tidur di kosan', '2018-01-20', '06:00:00', 4, 5000, 'Gunung Manglayang', 'jogging-2.png', 10, 4),
(7, 'Persiapan Universal Open', 'Universal Open adalah ajang lomba yang diadakan oleh Pondok Pesantren Mahasiswa Universal tiap tahunnya, bagi santri universal diharapkan merapat untuk latihan dalam rangka persiapan universal open ini', '2018-01-17', '16:00:00', 12, 7000, 'Lapangan Gomlay', 'voli-2.jpg', 16, 3),
(8, 'Bulutangkis Go', 'Butuh temen nih buat main badminton di wilayah Bandung, buat yang berminat gabung yaa, ditunggu.', '2018-01-16', '19:30:00', 4, 20000, 'GOR Cikutra', 'badminton-2.jpg', 6, 2),
(9, 'Futsalicious Jawa Barat 2017', 'Pertandingan Futsal dalam rangka Bacot Festival untuk tingkat SD, SMP, SMA, Mahasiswa seJawa Barat', '2018-02-03', '08:00:00', 32, 200000, 'Lapangan Futsal Progresiv', 'futsal-2.jpg', 2, 1);

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
(6, 1, 1, '2018-01-02 00:30:14'),
(7, 5, 2, '2018-01-02 00:30:14'),
(8, 4, 3, '2018-01-02 00:30:14'),
(9, 15, 4, '2018-01-02 00:30:14'),
(10, 12, 5, '2018-01-02 00:30:14'),
(11, 10, 6, '2018-01-02 00:30:14'),
(12, 16, 7, '2018-01-02 00:30:14'),
(13, 6, 8, '2018-01-02 00:30:14'),
(14, 2, 9, '2018-01-02 00:30:14'),
(15, 1, 4, '2018-01-02 00:40:30'),
(32, 1, 2, '2018-01-08 23:43:23');

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
(2, 'Badminton'),
(3, 'Voli'),
(4, 'Jogging');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_event` varchar(60) NOT NULL,
  `alamat_lokasi` varchar(60) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `nama_event`, `alamat_lokasi`, `lat`, `lng`, `kategori`) VALUES
(2, 'Futsal bareng Alumni MAN 12', 'Lapangan Futsal Kosambi Baru', -6.18132, 106.719, 'futsal'),
(3, 'Belajar Badminton', 'GOR Grogol', -6.17784, 106.781, 'badminton'),
(4, 'Car Free Day Dago', 'Dago Bandung', -6.87726, 107.617, 'jogging'),
(5, 'Persiapan ISAC', 'Lapangan Futsal Mayasari', -6.93705, 107.718, 'futsal'),
(6, 'Voli UIN Bandung vs Jakarta', 'Lapangan Voli UIN Bandung', -6.93145, 107.719, 'voli'),
(7, 'Jogging ke Manglayang', 'Gunung Manglayang Bandung', -6.87611, 107.744, 'jogging'),
(8, 'Persiapan Universal Open', 'Lapangan Voli Pesantren Gomlay', 0, 0, 'voli'),
(9, 'Bulutangkis Go', 'GOR Cikutra', -6.89334, 107.64, 'badminton'),
(10, 'Futsalicious Jawa Barat 2017', 'Lapangan Futsal Progresiv', -6.93316, 107.686, 'futsal');

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
(1, 'Nikko Eka Saputra', 'L', 'Jakarta', '08988190546', 'nikkoeka04@gmail.com', 'Main', 'Everything can be done..', '37152-nikko.jpg'),
(2, 'Adittya Permana Putra', 'L', 'Jakarta', '087736648298', 'adit@gmail.com', 'Ngaji', 'Lets do it !', 'adit.jpg'),
(3, 'Ivanka Tri Agustin', 'P', 'Bandung', '08983772466', 'ivanka@gmail.com', 'Baca Buku', 'I am Single and very Happy..', 'ivanka.jpg'),
(4, 'Manarul Huda', 'L', 'Purwakarta', '08982737467', 'manarul@gmail.com', 'Kumpul', 'Tidak ada yang tidak mungkin..', 'manar.jpg'),
(5, 'Lili Sholihah', 'P', 'Cirebon', '08988476627', 'lili@gmail.com', 'Novel', 'Siapapun pasti pernah berbuat salah, maka tidak ada hak untuk memojokkan seseorang.', 'lili.png'),
(6, 'Muhammad Rafif', 'L', 'Bekasi', '088478371942', 'rafif@gmail.com', 'Makan', 'Never give up !', 'rafif.jpg'),
(7, 'Muhammad Firman Hidayat', 'L', 'Jakarta', '08982744828', 'firman@gmail.com', 'Ngaji', 'Allah is everything..', 'firman.jpg'),
(8, 'Mawaddah Dila Safitri', 'P', 'Bogor', '08987427374', 'dila@gmail.com', 'Shopping', 'Tidak ada yang tidak mungkin jika Dia sudah berkehendak..', 'dilah.jpg'),
(9, 'Ghina Salsabillah', 'P', 'Lampung', '08937274661', 'ghina@gmail.com', 'Belajar', 'Everything should be perfect..', 'ghina.png'),
(10, 'Hendraky Fernanda Aulia', 'L', 'Bekasi', '089247428387', 'nanda@gmail.com', 'Razia', 'I belief i can fly..', 'hendraky.jpg'),
(11, 'Nidaa ', 'P', 'Bandung', '08642993747', 'nidaa@gmail.com', 'Ngaji', 'Allah dulu, Allah lagi, Allah terus..', 'nidaa.png'),
(12, 'Filza Adriansyah', 'L', 'Jakarta', '08937826477', 'filza@gmail.com', 'Nyanyi', 'Art is beautiful, sing is art, so sing is beautiful..', 'filza.jpg'),
(13, 'Jabal Thoriq', 'L', 'Jawa Timur', '08472836647', 'jabal@gmail.com', 'Gaming', 'Go, go and lets go..', 'jabal.jpg'),
(14, 'Arasya Mutiara', 'P', 'Karawang', '08497371981', 'asya@gmail.com', 'Ngajar', 'It is the best for you..', 'asya.png'),
(15, 'Raka Sulthon', 'L', 'Bekasi', '08988263747', 'raka@gmai.com', 'Tidur', 'Life is never flat', 'raka.png'),
(16, 'Ulumuddin ', 'L', 'Lamongan', '08892747281', 'ulum@gmail.com', 'Baca Buku', 'The book is the key', 'ulum.jpg'),
(17, 'Siti Nurul Aulia', 'P', 'Bandung', '08772466271', 'nurul@gmail.com', 'Masak', 'Never belief a stranger..', 'nurul.jpg');

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
(1, 'nikko', 'nikko', 'member', 1),
(2, 'adit', 'adit', 'member', 2),
(3, 'ivanka', 'ivanka', 'member', 3),
(4, 'manarul', 'manarul', 'member', 4),
(5, 'lili', 'lili', 'member', 5),
(6, 'rafif', 'rafif', 'member', 6),
(7, 'firman', 'firman', 'member', 7),
(8, 'dila', 'dila', 'member', 8),
(9, 'ghina', 'ghina', 'member', 9),
(10, 'nanda', 'nanda', 'member', 10),
(11, 'nidaa', 'nidaa', 'member', 11),
(12, 'filza', 'filza', 'member', 12),
(13, 'jabal', 'jabal', 'member', 13),
(14, 'asya', 'asya', 'member', 14),
(15, 'raka', 'raka', 'member', 15),
(16, 'ulum', 'ulum', 'member', 16),
(17, 'nurul', 'nurul', 'member', 17);

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
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

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
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_join`
--
ALTER TABLE `tb_join`
  MODIFY `id_join` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

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
