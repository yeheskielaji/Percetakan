-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 03:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
