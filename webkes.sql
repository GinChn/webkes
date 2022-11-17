-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2022 at 11:26 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webkes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `id_bmi` int(11) NOT NULL,
  `nik` char(10) NOT NULL,
  `usia` int(11) NOT NULL,
  `berat_badan` float NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `langkah`
--

CREATE TABLE `langkah` (
  `id_langkah` int(11) NOT NULL,
  `nik` char(10) NOT NULL,
  `jml_langkah` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nik` char(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nik`, `password`, `id_level`, `nama`, `jenis_kelamin`, `tgl_lahir`, `usia`, `token`, `created_at`) VALUES
('C030320004', '202cb962ac59075b964b07152d234b70', 1, 'Aisyah Ghina', 'Perempuan', '2002-04-17', 20, '2d1d27c30a25603b5d4f77f95559ad4a', '2022-11-17 14:57:26'),
('C030320021', '202cb962ac59075b964b07152d234b70', 1, 'Nurul Wafa', 'Perempuan', '2002-09-05', 20, '1819cd1fc9935e6e8a93935e07976c0d', '2022-11-17 14:58:22'),
('C030320089', '202cb962ac59075b964b07152d234b70', 1, 'Dinda Fitria', 'Perempuan', '2001-12-29', 21, '0ddd9d3087a04afa74bd4d205111473e', '2022-11-17 10:36:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`id_bmi`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `langkah`
--
ALTER TABLE `langkah`
  ADD PRIMARY KEY (`id_langkah`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `id_bmi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langkah`
--
ALTER TABLE `langkah`
  MODIFY `id_langkah` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
