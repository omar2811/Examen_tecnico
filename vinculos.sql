-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 05:14 AM
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
-- Database: `examen_tecnico`
--

-- --------------------------------------------------------

--
-- Table structure for table `vinculos`
--

CREATE TABLE `vinculos` (
  `Menuid` int(11) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `MenuPadreID` int(11) DEFAULT NULL,
  `Posicion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vinculos`
--

INSERT INTO `vinculos` (`Menuid`, `Descripcion`, `url`, `MenuPadreID`, `Posicion`) VALUES
(1, 'All Users', 'DropDown1', 0, 1),
(2, 'Verified', 'item', 1, 1),
(3, 'Banned', 'item', 1, 2),
(4, 'Delete', 'item', 1, 3),
(5, 'Profile', 'nav', 0, 2),
(6, 'Message', 'nav', 0, 3),
(7, 'Accound Settings', 'nav', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vinculos`
--
ALTER TABLE `vinculos`
  ADD PRIMARY KEY (`Menuid`),
  ADD KEY `MenuPadreID` (`MenuPadreID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
