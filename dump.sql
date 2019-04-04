-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mariaDB
-- Generation Time: Apr 04, 2019 at 12:06 PM
-- Server version: 10.3.13-MariaDB-1:10.3.13+maria~bionic
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t9_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `Contacts`
--

CREATE TABLE `Contacts` (
  `id` int(11) NOT NULL,
  `Vorname` varchar(25) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(25) COLLATE utf8_bin NOT NULL,
  `Number` int(11) NOT NULL,
  `VornameWert` varchar(25) COLLATE utf8_bin NOT NULL,
  `NachnameWert` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Contacts`
--

INSERT INTO `Contacts` (`id`, `Vorname`, `Nachname`, `Number`, `VornameWert`, `NachnameWert`) VALUES
(0, 'Otto', 'Moritz', 532412210, '6886', '667489'),
(1, 'Marie', 'Moritz', 1244689632, '62743', '667489'),
(2, 'Rahman', 'Ali', 153129895, '724626', '254'),
(3, 'Hana', 'Fischer', 13232547, '4262', '3472437');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NamenWert` (`VornameWert`,`NachnameWert`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
