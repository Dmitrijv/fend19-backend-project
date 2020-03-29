-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 12:35 PM
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
  `date_last_edit` datetime DEFAULT NULL,
  `attatched_image` text NOT NULL,
  `media_iframe` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `published`, `title`, `body`, `date_created`, `date_last_edit`, `attatched_image`, `media_iframe`) VALUES
(33, 0, 'aint nobody can see unpublished posts yo!', '<p><em>yes this is dog</em></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-03-27 20:16:15', '2020-03-28 00:17:08', '0', ''),
(35, 1, 'I\'m not going to bed', '', '2020-03-27 22:28:44', '2020-03-28 00:20:21', '0', ''),
(36, 1, 'russian songs', '<p><strong>all night longs</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>https://www.youtube.com/watch?v=X-pJmArulSk&amp;list=RDeqOXv85bAeY&amp;index=6</p>\r\n', '2020-03-27 22:37:03', '2020-03-28 00:21:42', '0', ''),
(53, 1, 'cat', '<p><img alt=\"\" src=\"https://i.imgur.com/ldyYOtI.jpg\" style=\"height:224px; width:224px\" /></p>\r\n', '2020-03-28 14:14:23', '2020-03-28 16:07:16', '0', ''),
(55, 1, 'testing gmap', '<p>hello world</p>\r\n', '2020-03-28 15:19:30', '2020-03-28 16:26:18', 'test.jpeg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2032.3200737936415!2d17.48267831633615!3d59.37768598167573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTnCsDIyJzM5LjciTiAxN8KwMjknMDUuNSJF!5e0!3m2!1sen!2sse!4v1585402877054!5m2!1sen!2sse\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(56, 1, 'testing youtube', '<p>test</p>\r\n', '2020-03-28 15:24:55', '2020-03-28 16:43:20', 'test.jpeg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XLN802KwdQA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(92, 1, 'multi line edit test', '<p>line 1 \r</p><p>\r</p><p>line 2 \r</p><p>\r</p><p>line 3</p>', '2020-03-29 00:51:16', '2020-03-29 01:58:42', 'J3bpjE3.gif', ''),
(93, 1, 'Owe~~', '<p>What a lovely creature!</p>', '2020-03-29 06:47:56', NULL, 'ugglor1.jpg', ''),
(94, 1, 'fire in the hole', '<p>test again</p>', '2020-03-29 06:51:20', NULL, 'ugglor1.jpg', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
