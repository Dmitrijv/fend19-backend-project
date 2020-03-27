-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 12:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_last_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `published`, `title`, `body`, `date_created`, `date_last_edit`) VALUES
(21, 1, 'here comes imbedded garbage', '<p>aloha my google maps broha</p>\r\n\r\n\r\n', '2020-03-26 14:17:06', NULL),
(33, 0, 'aint nobody can see unpublished posts yo!', '<p><em>yes this is dog</em></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-03-27 20:16:15', '2020-03-28 00:17:08'),
(34, 1, 'it went like this', '<p>the world is on fire and there&#39;s noone at the wheel</p>\r\n', '2020-03-27 21:33:43', NULL),
(35, 1, 'I\'m not going to bed', '', '2020-03-27 22:28:44', '2020-03-28 00:20:21'),
(36, 1, 'russian songs', '<p><strong>all night longs</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>https://www.youtube.com/watch?v=X-pJmArulSk&amp;list=RDeqOXv85bAeY&amp;index=6</p>\r\n', '2020-03-27 22:37:03', '2020-03-28 00:21:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
