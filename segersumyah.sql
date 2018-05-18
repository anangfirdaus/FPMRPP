-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 08:54 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
(1, 'eric', '40953edbf2f4bb9b42323caf9b6ff8d8f117c766'),
(2, 'anang', 'a4df9190139007b6170229b83b4be5fd50bebf8e');

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
('O2DcWm95867', 'Milkshake', 4),
('O2DcWm95867', 'Nasi Goreng', 2),
('vI9PYj43825', 'Es Teh', 1),
('fAXRTk20198', 'Segoe njamoer', 5);

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
(5, 'Mie Goreng', 20000, 'makanan', 'Mie Goreng Segersumyah dibuat dengan adonan mie berkualitas tinggi dan bumbu spesial, menghasilkan rasa gurih dan lezat. Berani diadu!', 'migor.jpg'),
(6, 'Segoe njamoer', 15000, 'makanan', 'Sego njamoer adalah makanan ala nasi onigiri yang berbahan dasar nasi punel dan jamur tiram', 'sego_jamur.jpg'),
(7, 'Soto Ayam', 20000, 'makanan', 'makanan khas Indonesia yang berupa sejenis sup ayam dengan kuah yang berwarna kekuningan. Warna kuning ini dikarenakan oleh kunyit yang digunakan sebagai bumbu', 'photo.jpg'),
(8, 'Rawon', 20000, 'makanan', 'masakan Indonesia berupa sup daging berkuah hitam sebagai campuran bumbu khas yang menggunakan kluwek', 'rawon.jpg'),
(9, 'Kari Ayam', 14000, 'makanan', 'hidangan umum di Asia Selatan, Asia Tenggara, serta di Caribbean (di mana makanan tersebut biasa disebut sebagai \"ayam kari\"', 'kari.jpg'),
(10, 'Bakso', 12000, 'makanan', 'makanan khas Tionghoa Indonesia berupa bola daging yang terbuat dari campuran tepung tapioka dengan daging segar yang digiling', 'bakso.jpg'),
(11, 'Nasi Campur', 20000, 'makanan', 'masakan khas Indonesia. Makanan ini terdiri dari nasi putih yang dihidangkan dengan bermacam-macam lauk-pauk. Lauk yang digunakan adalah sambal goreng, abon, serundeng, tahu goreng, ikan goreng, telur dan lain-lain.', 'nasicampir.jpg'),
(12, 'Es Teh', 7000, 'minuman', 'teh yang didinginkan dengan es batu. Es teh seringkali ditambahkan rasa seperti melati, dan buah-buahan seperti limun, ceri, dan arbei, atau susu. Es teh adalah minuman yang sering diminum saat siang hari karena suhu udara yang panas', 'esteh.jpg'),
(13, 'Es Jeruk', 10000, 'minuman', 'salah satu minuman yang murah meriah, bergizi, simple, juga nikmat. Oleh sebab itu es jeruk sering kali menjadi minuman langgalan untuk orang-orang', 'es-jeruk-tokomesin.jpg'),
(14, 'Es Cincau', 10000, 'minuman', 'sejenis minuman penyegar dengan bahan utama gel yang mirip agar-agar yang dikenal sebagai cincau. Potongan cincau ditambah dengan sirup, santan (atau susu) dan es serut sehingga menjadi minuman penyegar.', 'cincau.jpg'),
(15, 'Es Teler', 20000, 'minuman', 'jenis Kuliner yang murni \"Fresh from Nature\", Tanpa diolah, hanya dipotong dan dibersihkan, lalu di beri kuah rasa sesuai selera dan di minum/makan dingin. Sehingga kandungan Gizi yang terdapat dalam buah yang dipakai otomatis masih baik', 'es-teler_20170526_152050.jpg'),
(16, 'Tahu Isi', 13000, 'snack', 'salah satu gorengan yang diminati hampir semua penduduk asli Indonesia. Rasanya yang gurih dan renyah, menjadikan tahu isi sebagai cemilan kesukaan. Gorengan ini memang mudah dijumpai di berbagai pedagang gorengan pinggir jalan', 'tahu-isi-goreng.jpg'),
(17, 'Roti Bakar', 15000, 'snack', 'Roti bakar merujuk kepada kepingan roti yang dibakar agar garing. Roti bakar panas adalah lebih rangup dan keras dan dapat menampung hias atas dengan lebih baik. Membakar roti juga merupakan cara umum untuk menjadikan roti yang sudah masuk angin lebih sedap rasanya', 'roti.jpg');

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
('anang', 'anang', 'wkjadlwajldjwa', '11/12/2017', 'fAXRTk20198', '392712124', 'Keputih', 'sedang diproses'),
('boyishere', 'Boy', 'ghjgjhgh', '11/12/2017', 'O2DcWm95867', '67868768768', 'Gebang Putih', 'sedang diproses'),
('boyishere', 'Boy', 'wdadwada', '11/12/2017', 'vI9PYj43825', '231312', 'Keputih', 'dikirim');

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
('anang', 'a4df9190139007b6170229b83b4be5fd50bebf8e', 'anang@gmail.com', 'anang', 'anang'),
('boyishere', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'boy@user.com', 'Boy', 'Keputih'),
('boyishere2', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'boy@user.com', 'Boy 2', 'Keputih gg.makan'),
('salim', '55490cd891a0e41ed5babc203cbb6a98c7424f02', 'salim@user.com', 'Salim', 'Jl.Gebang Wetan no.5A');

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
  MODIFY `kode` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
