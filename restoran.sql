-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 05:28 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(4) NOT NULL,
  `no_meja` varchar(5) NOT NULL,
  `status` enum('Kosong','Dalam Pesanan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `status`) VALUES
(1, 'M001', 'Kosong'),
(2, 'M002', 'Kosong'),
(3, 'M003', 'Kosong'),
(4, 'M004', 'Kosong'),
(5, 'M005', 'Kosong'),
(6, 'M006', 'Kosong'),
(7, 'M007', 'Kosong'),
(8, 'M008', 'Kosong'),
(9, 'M009', 'Kosong'),
(10, 'M10', 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `jenis` enum('Makanan','Minuman') NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `status` enum('Tersedia','Kosong') NOT NULL,
  `deskripsi` text NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `jenis`, `nama`, `harga`, `status`, `deskripsi`, `filename`) VALUES
(1, 'Makanan', 'Sate', 15000, 'Tersedia', 'Sate atau satai adalah makanan yang terbuat dari daging yang dipotong kecil-kecil dan ditusuk sedemikian rupa dengan tusukan lidi tulang daun kelapa atau bambu.', 'images/small/2-Sate.jpg'),
(2, 'Makanan', 'Bakso', 25000, 'Tersedia', 'Bakso atau baso adalah jenis bola daging yang lazim ditemukan pada masakan Indonesia.', 'images/small/3-bakso.jpg'),
(3, 'Minuman', 'Jus Advokad', 8000, 'Tersedia', 'Menggunakan krim kocok atau whipping cream, guna menambahkan cita rasa gurih. Sayangnya, krim kocok ini mengandung 30 persen lemak susu', 'images/small/2-jus Advokad.jpg'),
(4, 'Makanan', 'Soto', 20000, 'Tersedia', 'Makanan khas yang konon asalnya dari Cina ini telah menjadi bagian dari makanan masyarakat Indonesia. Dengan menyesuaikan olahan bumbu agar pas dengan lidah orang Indonesia', 'images/small/4-Soto.jpg'),
(5, 'Minuman', 'Teh', 6000, 'Tersedia', 'Teh adolah minuman nan manganduang kafeina, sabuah infusi nan dibuek jo caro menyaduah daun, pucuak daun, atau tangkai daun nan dikariangan dari tanaman Camellia sinensis jo aia angek. Teh nan barasa dari tanaman teh tabagi manjadi ampek kalompok: teh itam, teh oolong, teh ijau, jo teh putiah', 'images/small/4-teh.jpg'),
(6, 'Makanan', 'Nasi Goreng', 15000, 'Tersedia', 'sebuah makanan berupa nasi yang digoreng dan diaduk dalam minyak goreng, margarin, atau mentega.', 'images/small/5-Nasi_Goreng.jpg'),
(7, 'Minuman', 'Kopi', 5000, 'Tersedia', 'Minuman hasil seduhan biji kopi yang telah disangrai dan dihaluskan menjadi bubuk. Kopi merupakan salah satu komoditas di dunia yang dibudidayakan lebih dari 50 negara', 'images/small/5-Kopi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `total_harga` varchar(15) NOT NULL,
  `diskon` varchar(10) NOT NULL,
  `harga_bayar` varchar(15) NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_meja` int(4) NOT NULL,
  `kode_pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `total_harga`, `diskon`, `harga_bayar`, `tgl_pembayaran`, `id_meja`, `kode_pesanan`) VALUES
(9, 'Rp. 46000', 'Rp. 0', 'Rp. 46000', '2022-02-28 01:21:53', 2, '541999d32a98f0551d7a319205bc526b5ed0dec8b6587e2ca924b9e911e541af'),
(10, 'Rp. 165000', 'Rp. 0', 'Rp. 165000', '2022-02-28 01:24:25', 4, '82a9e2110104ac9ca29aa318c4faebcd8262c906ca8592595a6790f818203b5c');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(5) NOT NULL,
  `tgl_pesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah` int(10) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Dalam Pemesanan','Selesai') NOT NULL,
  `id_meja` int(5) NOT NULL,
  `id_menu` int(5) NOT NULL,
  `kode_pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tgl_pesanan`, `jumlah`, `total`, `status`, `id_meja`, `id_menu`, `kode_pesanan`) VALUES
(56, '2022-02-28 12:21:53', 2, 30000, 'Selesai', 2, 1, '541999d32a98f0551d7a319205bc526b5ed0dec8b6587e2ca924b9e911e541af'),
(57, '2022-02-28 12:21:53', 2, 16000, 'Selesai', 2, 3, '541999d32a98f0551d7a319205bc526b5ed0dec8b6587e2ca924b9e911e541af'),
(61, '2022-02-28 12:24:25', 5, 125000, 'Selesai', 4, 2, '82a9e2110104ac9ca29aa318c4faebcd8262c906ca8592595a6790f818203b5c'),
(62, '2022-02-28 12:24:25', 5, 40000, 'Selesai', 4, 3, '82a9e2110104ac9ca29aa318c4faebcd8262c906ca8592595a6790f818203b5c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `status`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'admin@gmail.com', 'admin123', 'kasir', 1, 'Maklon', 'Kuwus Manggrai-Barat', '085253xxxxxx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
