-- PHPMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2024 at 07:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `panen_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_panen`
--

CREATE TABLE `hasil_panen` (
  `no_panen` varchar(20) NOT NULL,
  `user` varchar(4) NOT NULL,
  `blok` varchar(3) NOT NULL,
  `metode` varchar(10) NOT NULL,
  `matang` int(11) NOT NULL,
  `mentah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_panen`
--

INSERT INTO `hasil_panen` (`no_panen`, `user`, `blok`, `metode`, `matang`, `mentah`) VALUES
('2405240001.001', '0001', '001', 'manual', 10, 5),
('2405240001.002', '0001', '002', 'manual', 15, 10),
('2405240001.003', '0001', '003', 'mekanis', 20, 10),
('2405240001.004', '0001', '004', 'mekanis', 10, 20),
('2405240001.005', '0002', '005', 'manual', 15, 10),
('2405240001.006', '0002', '006', 'mekanis', 10, 10),
('2405240001.007', '0002', '007', 'manual', 15, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD PRIMARY KEY (`no_panen`);

--
-- Updating data in table `hasil_panen`
--

UPDATE hasil_panen
SET matang = 25, mentah = 15
WHERE no_panen = '2405240001.001';

--
-- Deleting data in table `hasil_panen`
--

DELETE FROM hasil_panen
WHERE no_panen = '2405240001.002';

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
