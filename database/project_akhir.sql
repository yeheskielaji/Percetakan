-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 02:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjangid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(3) NOT NULL,
  `catatanorder` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`keranjangid`, `username`, `total_harga`, `productid`, `quantity`, `catatanorder`) VALUES
(1, 'andra', 8000000, 1, 2, 'bang');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderstatusid` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderstatusid`, `waktu`, `username`, `total_harga`) VALUES
(1, '2022-11-26 16:56:18', 'user', 12000000),
(2, '2022-11-26 17:17:49', 'user', 6000000),
(3, '2022-11-26 17:27:33', 'user', 110000000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `foto` text NOT NULL,
  `penjelasan` varchar(105) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `price`, `foto`, `penjelasan`) VALUES
(1, 'Auto Clave', 4000000, 'autoclave.jpg', 'Autoclave adalah salah satu alat laboratorium yang digunakan untuk mensterilkan alat-alat laboratorium se'),
(2, 'Automated Defibrillator', 2000000, 'automateddefibrillator.jpg', 'AED sendiri merupakan sebuah alat medis yang dapat menganalisis irama jantung '),
(11, 'Face Mask', 50000, 'facemask.png', 'Alat medis yang menyediakan metode untuk mentransfer gas pernafasan oksigen'),
(14, 'Blood Test Kit', 50000, 'blood.jpg', 'Untuk mengambil darah pada jari untuk pemeriksaan di laboratorium atau alat test darah.'),
(15, 'Bed Screen', 1750000, 'BedScreen.jpg', 'Bed Screen atau skerem merupakan pembatas ruangan yang digunakan diruang rawat inap rumah sakit'),
(16, 'Co Analyzer', 500000, 'CoAnalyzer.jpg', 'Untuk membantu setiap orang yang ingin mengetahui seberapa banyak tingkat CO ada di tubuh mereka'),
(17, 'Hot Water Bag', 25000, 'hotwaterbag.jpg', 'Untuk tujuan memberikan kehangatan pada otot.'),
(18, 'Infusion Pump', 27500000, 'infusionpump.png', 'Pompa infus adalah alat medis yang digunakan untuk mengalirkan cairan ke dalam tubuh pasien secara terken'),
(19, 'Inhaler', 20000, 'inhaler.jpg', 'Inhaler merupakan obat hirup yang mengantarkan obat ke paru-paru untuk meredakan gejala asma.'),
(20, 'Kursi Roda', 1500000, 'kursiroda.jpg', 'Kursi roda digunakan oleh orang yang sulit atau tidak mungkin berjalan karena sakit'),
(21, 'Masker Medis', 20000, 'maskermedis.jpg', 'Masker medis adalah produk kesehatan untuk menutupi hidung dan mulut pemakainya'),
(22, 'Medicine Trolley', 12000000, 'medicinetrolley.jpg', 'Lemari dorong  yang bertujuan untuk menyimpan dan mengangkut obat-obatan'),
(23, 'Meja Operasi', 150000000, 'mejaoperasi.jpg', 'meja tempat pasien berbaring selama prosedur pembedahan'),
(24, 'P3K', 150000, 'p3k.jpg', 'Kotak P3K berperan penting untuk kebutuhan medis darurat'),
(25, 'Pulse Oxymeter', 0, 'pulseoxymeter.jpg', '80000'),
(26, 'Scoop Stertcher', 4000000, 'ScoopStertcher.jpg', 'Perangkat yang digunakan khusus untuk memindahkan orang yang terluka'),
(27, 'Stetoskop', 8000000, 'stetoskop.jpg', 'Digunakan untuk mengirimkan suara bervolume rendah seperti detak jantung ke telinga'),
(28, 'Termometer', 25000, 'termometer.jpg', 'Perangkat yang digunakan untuk mengukur suhu tubuh manusia atau hewan'),
(29, 'X-Ray', 200000000, 'xray.png', 'Digunakan untuk menelisik kondisi tulang dan sendi'),
(30, 'Alcohol Swabs', 30000, 'AlcoholSwabs.jpeg', 'merupakan kapas yang dilapisi dengan alkohol murni, steril dan dikemas secara individual');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telp` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `telp`, `alamat`, `level`) VALUES
('adit', 'adit', 2147483647, 'sfdgsfgadfgdfgadfgafdgafg', ''),
('admin', 'admin', 812345678, 'wates, kulon progo', 'admin'),
('aji', 'aji', 2147483647, 'assadadsasda', 'admin'),
('andra', '123', 123, '123', ''),
('user', 'user', 82131414, 'jepara, jawa tengah', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjangid`),
  ADD KEY `username` (`username`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderstatusid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `orderstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`);

--
-- Constraints for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD CONSTRAINT `orderstatus_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
