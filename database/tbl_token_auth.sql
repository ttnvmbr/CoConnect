-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 11:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crosspoints`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token_auth`
--

CREATE TABLE `tbl_token_auth` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `cname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `selector_hash` varchar(255) NOT NULL,
  `is_expired` int(11) NOT NULL DEFAULT 0,
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_token_auth`
--

INSERT INTO `tbl_token_auth` (`id`, `username`, `password_hash`, `cname`, `selector_hash`, `is_expired`, `expiry_date`) VALUES
(1, 'Userlogin', 'cf50a0fd4f103bcd28993492470239a3.fbc0c284345f152ee37a340d0c3ec16d.3395b5717b319d8ad373c64ec52aaf08', 'Userlogin', 'cf50a0fd4f103bcd28993492470239a3.fbc0c284345f152ee37a340d0c3ec16d.3395b5717b319d8ad373c64ec52aaf08', 0, '2020-12-04 10:36:44'),
(19, 'admin', '$2y$10$Z6cp.qgPDGP9msojhmGrM.ktT/DrDyZyF4uHSKCnYaWIa9PO4wekS', 'admin', '$2y$10$EAqILwecipG/1IdPBelvWOoEp2/MljeWbk.t1mupFD1gvJI2rhylO', 1, '2020-11-25 15:49:13'),
(20, 'admin', '$2y$10$zxDd9uM.31MxNjPGmzxpQ.//m8GsNNWI90VaIgj2pnYi6Zy.0jC4C', 'admin', '$2y$10$MAvuJrRb2f0FDSIeh9lkl.Sz0vLd.p2YXP.yparAaXebn/SQsD0su', 1, '2020-11-25 15:49:36'),
(21, 'admin', '$2y$10$p8ic144L0wpgrPEa5L5LNe5d5cZttvyMs.Ue7PUyIyJuaDwYgO4ou', 'admin', '$2y$10$YeaPrYbok8wp0DY4cVsP0eV7egGnJ2mZMfyxeYvY4P9K97QQFchsu', 0, '2020-12-25 15:49:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
