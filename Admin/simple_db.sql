-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 12:28 PM
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
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `tipe` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `tipe`) VALUES
(1, 'admin1', 'admin1', 'admin');

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
  `fotoDokumen` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaanjemputsampah`
--

INSERT INTO `permintaanjemputsampah` (`id`, `idUser`, `namaAcara`, `notelp`, `alamat`, `kecamatan`, `kelurahan`, `tanggal`, `waktu`, `perkiraanBeratSampah`, `fotoDokumen`, `Status`) VALUES
(1, 0, 'Seminar', '082111222333', 'jl simpang remujung', 'lowokwaru', 'jatimulyo', '2020-03-16', '00:00:00', 3, 'plastikimg.jpg', ''),
(2, 0, 'Seminar', '082777666555', 'jl remujung', 'lowokwaru', 'jatimulyo', '2020-03-16', '00:00:00', 5, 'sampahimg.jpg', ''),
(3, 0, 'Seminar', '081444555666', 'jl sukarno hatta', 'lowokwaru', 'jatimulyo', '2020-03-16', '00:00:00', 2, 'kertasimg.jpg', '');

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
(2, 442, 322, 120, 542),
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
(33, 2, 1, 2, 12, '2019-11-21');

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
(4, '5e5e5661022bb3.09538814', 'User', 'Ilmi', '+6282245927609', '8sT526OTomVSwXBFhHGbwZoDTRJiMDI0NTczOGMx', 'b0245738c1', '2020-03-03 20:06:41', NULL),
(5, '5e69ddec7c91f5.03620519', 'User', 'Ss', '0851111111', 'BBPGClVVL4f7so+4mlIOlvv91mE0MzliNjE2ZDMy', '439b616d32', '2020-03-12 13:59:56', NULL),
(6, '5e69de3f519d58.28196891', 'Sukarelawan', 'Saya', '082245123456', 'tCMHf7Bh2x8imNnos98Iz3F5Zbg3MDM1NWFhYWFj', '70355aaaac', '2020-03-12 14:01:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `permintaanjemputsampah`
--
ALTER TABLE `permintaanjemputsampah`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permintaanjemputsampah`
--
ALTER TABLE `permintaanjemputsampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksisampah`
--
ALTER TABLE `transaksisampah`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaksitukarpoin`
--
ALTER TABLE `transaksitukarpoin`
  MODIFY `idTukarPoin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
