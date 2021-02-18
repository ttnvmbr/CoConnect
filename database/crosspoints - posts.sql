-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 04:53 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `tags` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mood` int(255) NOT NULL,
  `user` int(11) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `title`, `description`, `tags`, `date`, `mood`, `user`, `company`) VALUES
(31, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(32, 'sample header', 'rhtrhrthr', 'abuse', '2020-11-05 11:42:29', 0, 1, 'test'),
(33, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(34, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(35, 'sample header', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pulvinar urna rhoncus justo mollis vulputate. Vivamus et tortor risus. Sed non dolor cursus, fermentum nunc ut, lacinia augue. Nam sed ante a ipsum fermentum posuere sit amet sit amet turpis. Curabitur tincidunt risus turpis, non ornare sapien pharetra nec. Nunc lacinia sapien vitae nibh euismod, quis lobortis odio aliquet. Duis diam turpis, interdum at pulvinar sed, dapibus vitae est.\r\n\r\nEtiam pellentesque purus sollicitudin venenat', 'test', '2020-11-06 21:26:43', 0, 1, 'test'),
(36, 'hthfht', 'hthtfhtth', 'htht', '2020-11-07 00:04:14', -1, 1, 'test'),
(37, 'jtjjtjt', 'jtjtjtfjjtfjt', 'jjjjjj, jjjjjjjjjj, test', '2020-11-07 00:04:31', 1, 1, 'test'),
(38, 'jtjjtjt', 'jtjtjtfjjtfjt', 'jjjjjj, jjjjjjjjjj, test', '2020-11-07 00:04:31', 1, 1, 'test'),
(39, 'hthfht', 'hthtfhtth', 'htht', '2020-11-07 00:04:14', -1, 1, 'test'),
(40, 'sample header', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pulvinar urna rhoncus justo mollis vulputate. Vivamus et tortor risus. Sed non dolor cursus, fermentum nunc ut, lacinia augue. Nam sed ante a ipsum fermentum posuere sit amet sit amet turpis. Curabitur tincidunt risus turpis, non ornare sapien pharetra nec. Nunc lacinia sapien vitae nibh euismod, quis lobortis odio aliquet. Duis diam turpis, interdum at pulvinar sed, dapibus vitae est.\r\n\r\nEtiam pellentesque purus sollicitudin venenat', 'test', '2020-11-06 21:26:43', 0, 1, 'test'),
(41, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(42, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(43, 'sample header', 'rhtrhrthr', 'abuse', '2020-11-05 11:42:29', 0, 1, 'test'),
(44, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(45, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(46, 'sample header', 'rhtrhrthr', 'abuse', '2020-11-05 11:42:29', 0, 1, 'test'),
(47, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(48, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(49, 'sample header', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pulvinar urna rhoncus justo mollis vulputate. Vivamus et tortor risus. Sed non dolor cursus, fermentum nunc ut, lacinia augue. Nam sed ante a ipsum fermentum posuere sit amet sit amet turpis. Curabitur tincidunt risus turpis, non ornare sapien pharetra nec. Nunc lacinia sapien vitae nibh euismod, quis lobortis odio aliquet. Duis diam turpis, interdum at pulvinar sed, dapibus vitae est.\r\n\r\nEtiam pellentesque purus sollicitudin venenat', 'test', '2020-11-06 21:26:43', 0, 1, 'test'),
(50, 'hthfht', 'hthtfhtth', 'htht', '2020-11-07 00:04:14', -1, 1, 'test'),
(51, 'jtjjtjt', 'jtjtjtfjjtfjt', 'jjjjjj, jjjjjjjjjj, test', '2020-11-07 00:04:31', 1, 1, 'test'),
(52, 'jtjjtjt', 'jtjtjtfjjtfjt', 'jjjjjj, jjjjjjjjjj, test', '2020-11-07 00:04:31', 1, 1, 'test'),
(53, 'hthfht', 'hthtfhtth', 'htht', '2020-11-07 00:04:14', -1, 1, 'test'),
(54, 'sample header', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pulvinar urna rhoncus justo mollis vulputate. Vivamus et tortor risus. Sed non dolor cursus, fermentum nunc ut, lacinia augue. Nam sed ante a ipsum fermentum posuere sit amet sit amet turpis. Curabitur tincidunt risus turpis, non ornare sapien pharetra nec. Nunc lacinia sapien vitae nibh euismod, quis lobortis odio aliquet. Duis diam turpis, interdum at pulvinar sed, dapibus vitae est.\r\n\r\nEtiam pellentesque purus sollicitudin venenat', 'test', '2020-11-06 21:26:43', 0, 1, 'test'),
(55, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(56, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(57, 'sample header', 'rhtrhrthr', 'abuse', '2020-11-05 11:42:29', 0, 1, 'test'),
(58, 'sample header', 'hthtfht', 'test', '2020-11-04 10:44:31', 0, 0, 'test'),
(59, 'sample header', 'gyjygjy', 'cum', '2020-11-08 23:22:49', 1, 1, 'test'),
(60, 'sample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample headersample', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vulputate mi metus, nec rutrum dolor commodo sed. Suspendisse risus orci, molestie in sodales nec, volutpat ut nibh. Quisque consectetur pretium leo, a sollicitudin neque vehicula pretium. Nam lacinia in erat accumsan finibus. Mauris sit amet orci placerat enim aliquam viverra. Maecenas sed lorem quis ligula tristique sollicitudin. Fusce tincidunt sed ante non tristique. Phasellus in consequat tortor, eget fermentum magna. Aliquam Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vulputate mi metus, nec rutrum dolor commodo sed. Suspendisse risus orci, molestie in sodales nec, volutpat ut nibh. Quisque consectetur pretium leo, a sollicitudin neque vehicula pretium. Nam lacinia in erat accumsan finibus. Mauris sit amet orci placerat enim aliquam viverra. Maecenas sed lorem quis ligula tristique sollicitudin. Fusce tincidunt sed ante non tristique. Phasellus in consequat tortor, eget fermentum magna. Aliquam Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vulputate mi metus, nec rutrum dolor commodo sed. Suspendisse risus orci, molestie in sodales nec, volutpat ut nibh. Quisque consectetur pretium leo, a sollicitudin neque vehicula pretium. Nam lacinia in erat accumsan finibus. Mauris sit amet orci placerat enim aliquam viverra. Maecenas sed lorem quis ligula tristique sollicitudin. Fusce tincidunt sed ante non tristique. Phasellus in consequat tortor, eget fermentum magna. Aliquam Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vulputate mi metus, nec rutrum dolor commodo sed. Suspendisse risus orci, molestie in sodales nec, volutpat ut nibh. Quisque consectetur pretium leo, a sollicitudin neque vehicula pretium. Nam lacinia in erat accumsan finibus. Mauris sit amet orci placerat enim aliquam viverra. Maecenas sed lorem quis ligula tristique sollicitudin. Fusce tincidunt sed ante non tristique. Phasellus in consequat tortor, eget fermentum magna. Aliquam \r\n', 'abuse, abuse, abuse, abuse', '2020-11-09 15:52:20', -1, 1, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
