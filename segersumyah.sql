-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 03:02 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `segersumyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(2, 'anang', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_order` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_order`, `nama`, `jumlah`) VALUES
('4Vvyr685042', 'Nasi Goreng', 2),
('cHWK9A87254', 'Nasi Goreng', 4),
('V9vgKa48350', 'Nasi Goreng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kode` int(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(255) NOT NULL,
  `jenis` enum('makanan','minuman','snack') NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode`, `nama`, `harga`, `jenis`, `deskripsi`, `gambar`) VALUES
(2, 'Milkshake', 18000, 'minuman', 'Dibuat dari susu segar dan bahan-bahan pilihan, milkshake kami memberikan kesegaran dan cita rasa tak terlupakan untuk anda.', 'milkshake.jpg'),
(4, 'Nasi Goreng', 20000, 'makanan', 'Diolah dengan rempah-rempah pilihan dan nasi yang berkualitas tinggi. Nasi Goreng Segersumyah dijamin akan membuat anda puas.', 'nasgor.jpg'),
(5, 'Mie Goreng', 20000, 'makanan', 'Mie Goreng Segersumyah dibuat dengan adonan mie berkualitas tinggi dan bumbu spesial, menghasilkan rasa gurih dan lezat. Berani diadu!', 'migor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`username`, `customerName`, `alamat`, `dateCreated`, `id_order`, `phone`, `kelurahan`, `status`) VALUES
('boyishere', 'Boy', 'adwadadwa', '15/05/2018', 'V9vgKa48350', '141421412414', 'Keputih', 'dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `name`, `alamat`) VALUES
('anang', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'anang@gmail.com', 'Anang', 'jalan majumundur'),
('boyishere', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'boy@user.com', 'Boy', 'Keputih'),
('boyishere2', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'boy@user.com', 'Boy 2', 'Keputih gg.makan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `kode` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
