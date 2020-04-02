-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 05:49 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `notelp`, `foto`) VALUES
(1, 'admin1', 'admin1', '+6281000000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `hargasampah`
--

CREATE TABLE `hargasampah` (
  `id_sampah` int(11) NOT NULL,
  `namaSampah` varchar(10) NOT NULL,
  `hargaSampah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hargasampah`
--

INSERT INTO `hargasampah` (`id_sampah`, `namaSampah`, `hargaSampah`) VALUES
(1, 'kertas', 4000),
(2, 'plastik', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `konversi_poin`
--

CREATE TABLE `konversi_poin` (
  `id` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konversi_poin`
--

INSERT INTO `konversi_poin` (`id`, `poin`, `harga`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permintaanjemputsampah`
--

CREATE TABLE `permintaanjemputsampah` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `namaAcara` varchar(100) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `perkiraanBeratSampah` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Pending',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaanjemputsampah`
--

INSERT INTO `permintaanjemputsampah` (`id`, `idUser`, `namaAcara`, `notelp`, `alamat`, `kecamatan`, `kelurahan`, `tanggal`, `waktu`, `perkiraanBeratSampah`, `image_path`, `image_name`, `Status`, `created_at`) VALUES
(1, 2, 'semnas', '085790737556', 'jalans uhat', 'Lowokwaru', 'Jatimulyo', '2020-03-24', '17:22:00', 6, 'http://192.168.43.10:8080/simple_api/upload/DokumenPenunjang/2_2020-03-24_semnas.jpg', '2_2020-03-24_semnas', 'Pending', '2020-03-23'),
(2, 2, 'gogo', '085123144213', 'jalan senggani', 'Lowokwaru', 'Jatimulyo', '2020-03-26', '17:28:00', 6, 'http://192.168.43.10:8080/simple_api/upload/DokumenPenunjang/2_2020-03-26_gogo.jpg', '2_2020-03-26_gogo', 'Pending', '2020-03-23'),
(3, 2, 'Promnight HMTI', '085132456121', 'jalan soekarno', 'Kedungkandang', 'Arjowinangun', '2020-03-25', '23:21:00', 9, 'http://192.168.43.10:8080/simple_api/upload/DokumenPenunjang/2_2020-03-25_Promnight HMTI.jpg', '2_2020-03-25_Promnight HMTI', 'Pending', '2020-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `totalpoinuser`
--

CREATE TABLE `totalpoinuser` (
  `idUser` int(11) NOT NULL,
  `totalBeratSampah` int(11) NOT NULL,
  `totalBeratKertas` int(11) NOT NULL,
  `totalBeratPlastik` int(11) NOT NULL,
  `totalPoin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalpoinuser`
--

INSERT INTO `totalpoinuser` (`idUser`, `totalBeratSampah`, `totalBeratKertas`, `totalBeratPlastik`, `totalPoin`) VALUES
(2, 961, 841, 120, 1061),
(3, 150, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksisampah`
--

CREATE TABLE `transaksisampah` (
  `idTransaksi` int(11) NOT NULL,
  `idUser` int(100) DEFAULT NULL,
  `noMesin` int(11) NOT NULL,
  `jenisSampah` int(11) NOT NULL,
  `beratSampah` float NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksisampah`
--

INSERT INTO `transaksisampah` (`idTransaksi`, `idUser`, `noMesin`, `jenisSampah`, `beratSampah`, `created_at`) VALUES
(1, 2, 1, 1, 100, '2019-11-05'),
(2, 2, 1, 1, 20, '2019-11-05'),
(3, 2, 1, 1, 70, '2019-11-11'),
(4, 2, 1, 1, 12, '2019-11-11'),
(5, 2, 1, 2, 32, '2019-11-13'),
(17, 2, 1, 2, 16, '2019-11-14'),
(22, 2, 1, 2, 10, '2019-11-14'),
(23, 2, 1, 2, 10, '2019-11-14'),
(24, 2, 1, 2, 10, '2019-11-14'),
(25, 2, 1, 2, 10, '2019-11-14'),
(26, 2, 1, 2, 10, '2019-11-14'),
(27, 2, 1, 2, 10, '2019-11-14'),
(30, 3, 1, 2, 150, '2019-11-14'),
(31, 2, 1, 1, 100, '2019-11-18'),
(32, 2, 1, 1, 20, '2019-11-18'),
(33, 2, 1, 2, 12, '2019-11-21'),
(48, 2, 1, 1, 15, '2020-03-11'),
(49, 2, 1, 1, 15, '2020-03-11'),
(50, 2, 1, 1, 15, '2020-03-11'),
(51, 2, 1, 1, 15, '2020-03-11'),
(52, 2, 1, 1, 100, '2020-03-11'),
(53, 2, 1, 1, 100, '2020-03-11'),
(54, 2, 1, 1, 100, '2020-03-11'),
(55, 2, 1, 1, 100, '2020-03-11'),
(56, 2, 1, 1, 100, '2020-03-11'),
(57, 2, 1, 1, 100, '2020-03-11'),
(58, 2, 1, 1, 100, '2020-03-11'),
(59, 2, 1, 1, 100, '2020-03-11'),
(60, 2, 1, 1, 8, '2020-03-12'),
(61, 2, 1, 1, 111, '2020-03-16'),
(62, 5, 1, 1, 10, '2020-03-31'),
(63, 5, 1, 1, 100, '2020-03-31'),
(64, 5, 1, 1, 100, '2020-03-31'),
(65, 5, 1, 1, 100, '2020-03-31'),
(66, 5, 1, 2, 100, '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `transaksitukarpoin`
--

CREATE TABLE `transaksitukarpoin` (
  `idTukarPoin` int(11) NOT NULL,
  `idUser` int(100) NOT NULL,
  `idPenjual` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `level` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `encrypted_imei` varchar(50) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `unique_id`, `level`, `name`, `nohp`, `encrypted_imei`, `salt`, `created_at`, `updated_at`) VALUES
(2, '5e5751069b4f11.96505932', 'User', 'Berliana Farah Diba', '+6285790737556', 'aRl8Kx0f3NDQqCBJiZISfzAkhIMyOWUyZTg5Y2Vm', '29e2e89cef', '2020-02-27 12:17:58', NULL),
(3, '5e5bd50eb32916.06646042', 'Merchant', 'Nina', '+6289656964705', 'J8tX3Q1SMpl9bNWeIN9xsNcBm4EyZGQ3ODI4ZDgx', '2dd7828d81', '2020-03-01 22:30:22', NULL),
(4, '5e67cefaee8800.78492478', '1', '2', '1', '27tTNsl2ew8CxCgg7xTP4FGVXdMxZDMyOWZlODU5', '1d329fe859', '2020-03-11 00:31:39', NULL),
(5, '5e8229a7822989.77682381', 'User', 'Ilmi', '+6282245927609', 'NBRTs/YjM9JziLkv6DfQqxz27eszOTI4MGM3NjBj', '39280c760c', '2020-03-31 00:17:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `hargasampah`
--
ALTER TABLE `hargasampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indexes for table `konversi_poin`
--
ALTER TABLE `konversi_poin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaanjemputsampah`
--
ALTER TABLE `permintaanjemputsampah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `totalpoinuser`
--
ALTER TABLE `totalpoinuser`
  ADD KEY `totalpoinuser_ibfk_1` (`idUser`);

--
-- Indexes for table `transaksisampah`
--
ALTER TABLE `transaksisampah`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `transaksisampah_ibfk_1` (`idUser`);

--
-- Indexes for table `transaksitukarpoin`
--
ALTER TABLE `transaksitukarpoin`
  ADD PRIMARY KEY (`idTukarPoin`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `nohp` (`nohp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hargasampah`
--
ALTER TABLE `hargasampah`
  MODIFY `id_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konversi_poin`
--
ALTER TABLE `konversi_poin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permintaanjemputsampah`
--
ALTER TABLE `permintaanjemputsampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksisampah`
--
ALTER TABLE `transaksisampah`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `transaksitukarpoin`
--
ALTER TABLE `transaksitukarpoin`
  MODIFY `idTukarPoin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permintaanjemputsampah`
--
ALTER TABLE `permintaanjemputsampah`
  ADD CONSTRAINT `permintaanjemputsampah_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `totalpoinuser`
--
ALTER TABLE `totalpoinuser`
  ADD CONSTRAINT `totalpoinuser_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksisampah`
--
ALTER TABLE `transaksisampah`
  ADD CONSTRAINT `transaksisampah_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksitukarpoin`
--
ALTER TABLE `transaksitukarpoin`
  ADD CONSTRAINT `transaksitukarpoin_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
