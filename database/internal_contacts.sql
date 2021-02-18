-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 okt 2020 om 11:15
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.10

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
-- Tabelstructuur voor tabel `internal_contacts`
--

CREATE TABLE `internal_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` int(10) NOT NULL,
  `function` varchar(150) CHARACTER SET utf8 NOT NULL,
  `description` varchar(700) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `internal_contacts`
--

INSERT INTO `internal_contacts` (`id`, `name`, `email`, `phone`, `function`, `description`) VALUES
(2, 'inci yesiltepe', 'inciyesiltepe@gmail.com', 654330752, 'HR', ''),
(3, 'Jan Janssen', 'Jansteen@gmail.com', 654330752, 'vertrouwenspersoon', 'ik ben er voor al jouw klachten');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `internal_contacts`
--
ALTER TABLE `internal_contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `internal_contacts`
--
ALTER TABLE `internal_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
