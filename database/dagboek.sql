-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 dec 2020 om 12:00
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
-- Tabelstructuur voor tabel `dagboek`
--

CREATE TABLE `dagboek` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `score` varchar(30) NOT NULL,
  `color` varchar(50) NOT NULL,
  `backgroundColor` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `dagboek`
--

INSERT INTO `dagboek` (`id`, `start`, `title`, `comment`, `score`, `color`, `backgroundColor`, `user_id`) VALUES
(46, '2020-11-17', 'Gebruiker2', 'Gebruiker2', 'Erg goed', 'red', '', 2),
(49, '2020-11-18', 'fdsf', 'fdsf', 'Goed', 'red', '', 2),
(50, '2020-11-18', 'dsfdsd', 'dsf', 'Erg slecht', 'red', '', 1),
(51, '2020-11-19', 'f', 'h', 'Erg goed', 'red', '', 1),
(52, '2020-11-05', 'dfffff', 'fdfsffff', 'Neutraal', 'red', '', 1),
(54, '2020-11-04', 'vv', 'cv', 'Erg goed', 'red', '', 0),
(55, '2020-11-04', 'dfdsfdf', 'f', 'Goed', 'red', '', 0),
(56, '2020-11-04', 'fff', 'fff', 'Neutraal', 'red', '', 0),
(57, '2020-11-11', 'dfdsfdsf', 'sdfdsfd', 'Neutraal', 'red', '', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `dagboek`
--
ALTER TABLE `dagboek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `dagboek`
--
ALTER TABLE `dagboek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
