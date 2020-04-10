-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 08:08 AM
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
-- Table structure for table `konversiharga`
--

CREATE TABLE `konversiharga` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(10) NOT NULL,
  `harga` float NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konversiharga`
--

INSERT INTO `konversiharga` (`id_jenis`, `nama_jenis`, `harga`, `poin`) VALUES
(1, 'kertas', 4000, 4000),
(2, 'plastik', 5000, 5000);

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
(1, 2, 'Seminar Nasional HMA', '085790737556', 'Polinema. Gedung Aula Pertamina', 'Lowokwaru', 'Jatimulyo', '2020-03-24', '17:22:00', 6, 'http://192.168.43.10:8080/simple_api/upload/DokumenPenunjang/2_2020-03-24_semnas.jpg', '2_2020-03-24_semnas', 'terima', '2020-03-23'),
(2, 2, 'Seminar Nasional HME', '085123144213', 'Polinema. Aula Pertamina', 'Lowokwaru', 'Jatimulyo', '2020-03-26', '17:28:00', 6, 'http://192.168.43.10:8080/simple_api/upload/DokumenPenunjang/2_2020-03-26_gogo.jpg', '2_2020-03-26_gogo', 'terima', '2020-03-23'),
(3, 2, 'Promnight HMTI', '085132456121', 'jalan soekarno', 'Kedungkandang', 'Arjowinangun', '2020-03-25', '23:21:00', 9, 'http://192.168.43.10:8080/simple_api/upload/DokumenPenunjang/2_2020-03-25_Promnight HMTI.jpg', '2_2020-03-25_Promnight HMTI', 'tolak', '2020-03-23');

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
(2, 990, 862, 128, 1090),
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
(62, 2, 1, 1, 21, '2020-03-31'),
(63, 2, 1, 2, 8, '2020-03-31');

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

--
-- Dumping data for table `transaksitukarpoin`
--

INSERT INTO `transaksitukarpoin` (`idTukarPoin`, `idUser`, `idPenjual`, `poin`, `created_at`) VALUES
(1, 2, 3, 20, '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `tugasjemputsampah`
--

CREATE TABLE `tugasjemputsampah` (
  `id` int(11) NOT NULL,
  `idJemput` int(11) NOT NULL,
  `idSukarelawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugasjemputsampah`
--

INSERT INTO `tugasjemputsampah` (`id`, `idJemput`, `idSukarelawan`) VALUES
(1, 1, 3),
(2, 2, 4);

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
(3, '5e5bd50eb32916.06646042', 'Sukarelawan', 'Nina', '+6289656964705', 'J8tX3Q1SMpl9bNWeIN9xsNcBm4EyZGQ3ODI4ZDgx', '2dd7828d81', '2020-03-01 22:30:22', NULL),
(4, '5e67cefaee8800.78492478', '1', '2', '1', '27tTNsl2ew8CxCgg7xTP4FGVXdMxZDMyOWZlODU5', '1d329fe859', '2020-03-11 00:31:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `konversiharga`
--
ALTER TABLE `konversiharga`
  ADD PRIMARY KEY (`id_jenis`);

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
-- Indexes for table `tugasjemputsampah`
--
ALTER TABLE `tugasjemputsampah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idJemput` (`idJemput`),
  ADD KEY `idSukarelawan` (`idSukarelawan`);

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
-- AUTO_INCREMENT for table `permintaanjemputsampah`
--
ALTER TABLE `permintaanjemputsampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksisampah`
--
ALTER TABLE `transaksisampah`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `transaksitukarpoin`
--
ALTER TABLE `transaksitukarpoin`
  MODIFY `idTukarPoin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tugasjemputsampah`
--
ALTER TABLE `tugasjemputsampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Constraints for table `tugasjemputsampah`
--
ALTER TABLE `tugasjemputsampah`
  ADD CONSTRAINT `tugasjemputsampah_ibfk_1` FOREIGN KEY (`idJemput`) REFERENCES `permintaanjemputsampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugasjemputsampah_ibfk_2` FOREIGN KEY (`idSukarelawan`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
