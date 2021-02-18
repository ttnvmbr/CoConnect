-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 11:46 AM
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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(8) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `admin` int(1) NOT NULL,
  `phone` int(40) NOT NULL,
  `functie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `password`, `email`, `cname`, `admin`, `phone`, `functie`) VALUES
(1, 'admin', '$2a$10$0FHEQ5/cplO3eEKillHvh.y009Wsf4WCKvQHsZntLamTUToIBe.fG', 'user@gmail.com', 'test', 0, 0, 0),
(2, 'User', 'b1d4cd1db4d4ed27a98e948be32bd67f.057c6c846718b5d38f31072babfcdd4', 'User@e-mail.com', 'User', 0, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
