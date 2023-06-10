-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 10:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `desainer`
--

CREATE TABLE `desainer` (
  `desainerid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desainer`
--

INSERT INTO `desainer` (`desainerid`, `username`) VALUES
(1, 'desain');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `keranjangid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(3) NOT NULL,
  `nego` int(10) NOT NULL,
  `file` text NOT NULL,
  `desainerid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`keranjangid`, `username`, `total_harga`, `productid`, `quantity`, `nego`, `file`, `desainerid`, `status`) VALUES
(1, 'andra', 8000000, 1, 2, 0, 'bang', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `price`, `foto`) VALUES
(1, 'Auto Clave', 4000000, 'autoclave.jpg'),
(2, 'Automated Defibrillator', 2000000, 'automateddefibrillator.jpg'),
(11, 'Face Mask', 50000, 'facemask.png'),
(14, 'Blood Test Kit', 50000, 'blood.jpg'),
(15, 'Bed Screen', 1750000, 'BedScreen.jpg'),
(16, 'Co Analyzer', 500000, 'CoAnalyzer.jpg'),
(17, 'Hot Water Bag', 25000, 'hotwaterbag.jpg'),
(18, 'Infusion Pump', 27500000, 'infusionpump.png'),
(19, 'Inhaler', 20000, 'inhaler.jpg'),
(20, 'Kursi Roda', 1500000, 'kursiroda.jpg'),
(21, 'Masker Medis', 20000, 'maskermedis.jpg'),
(22, 'Medicine Trolley', 12000000, 'medicinetrolley.jpg'),
(23, 'Meja Operasi', 150000000, 'mejaoperasi.jpg'),
(24, 'P3K', 150000, 'p3k.jpg'),
(25, 'Pulse Oxymeter', 0, 'pulseoxymeter.jpg'),
(26, 'Scoop Stertcher', 4000000, 'ScoopStertcher.jpg'),
(27, 'Stetoskop', 8000000, 'stetoskop.jpg'),
(28, 'Termometer', 25000, 'termometer.jpg'),
(29, 'X-Ray', 200000000, 'xray.png'),
(30, 'Alcohol Swabs', 30000, 'AlcoholSwabs.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('adit', 'adit', ''),
('admin', 'admin', 'admin'),
('aji', 'aji', 'admin'),
('andra', '123', ''),
('desain', 'desain', 'desain'),
('user', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desainer`
--
ALTER TABLE `desainer`
  ADD PRIMARY KEY (`desainerid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`keranjangid`),
  ADD KEY `username` (`username`),
  ADD KEY `productid` (`productid`),
  ADD KEY `desainerid` (`desainerid`);

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
-- AUTO_INCREMENT for table `desainer`
--
ALTER TABLE `desainer`
  MODIFY `desainerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `keranjangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desainer`
--
ALTER TABLE `desainer`
  ADD CONSTRAINT `desainer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`),
  ADD CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`desainerid`) REFERENCES `desainer` (`desainerid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
