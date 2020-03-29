-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 11:31 PM
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
(33, 0, 'This is an unpublished post that nobody can see.', '<p>Dolor sit amet consectetur adipisicing elit. Optio qui eveniet earum dolores, iste, velit quidem, magnam quisquam odio doloremque adipisci doloribus? Enim, impedit consequuntur. Recusandae nisi facere quo dolor eius impedit magnam ipsam error nemo, velit harum quos iure possimus eveniet eos placeat adipisci veritatis tempora porro quia necessitatibus.</p><p>Quod minima rem fugiat ab, necessitatibus rerum inventore explicabo, bcaecati cum iste quidem amet, eius hic animi asperiores doloribus quas quisquam dolorem, non quaerat alias quod, eos nesciunt. Voluptate quia optio, cupiditate odio iste facilis culpa sint eligendi earum cumque est reprehenderit illo, reiciendis cum aliquid. Maiores, sit laudantium repellat suscipit error quaerat hic debitis fugiat dolorem.</p><p>Minima rem fugiat ab, necessitatibus rerum inventore explicabo, saepe fuga architecto cumque nobis quas aspernatur, eos in doloribus amet alias possimus est. Vero </p><p>asperiores quam ipsam atque. Optio cum corrupti sunt nobis neque assumenda veniam maxime commodi incidunt perferendis quam aliquid enim, accusantium vero sequi sit. Aspernatur eaque ut esse optio.</p><p>Rem fugiat ab, necessitatibus rerum inventore explicabo, saepe fuga architecto cumque nobis quas aspernatur, eos in doloribus amet alias possimus est. Vero asperiores quam ipsam atque. Optio cum corrupti sunt nobis neque assumenda veniam maxime commodi incidunt perferendis quam aliquid enim, accusantium vero sequi sit. Aspernatur eaque ut esse optio.</p>', '2020-03-27 20:16:15', '2020-03-29 23:30:03', 'bDCjTEs.jpg', ''),
(55, 1, 'This post contains a Google Map example.', '<p>Facere quo dolor eius impedit magnam ipsam error nemo, velit harum quos iure possimus eveniet eos placeat adipisci veritatis tempora porro quia necessitatibus. Coloribus nim, impedit consequuntur.</p><p>Minima rem fugiat ab, necessitatibus rerum inventore explicabo, saepe fuga architecto cumque nobis quas aspernatur, eos in doloribus amet alias possimus est. Vero asperiores quam ipsam atque. Optio cum corrupti sunt nobis neque assumenda veniam maxime commodi incidunt perferendis quam aliquid enim, accusantium vero sequi sit. Aspernatur eaque ut esse optio.</p>', '2020-03-28 15:19:30', '2020-03-29 23:08:22', '28_byousoku_5_centimetre_comix_wave_scenic_shinkai_makoto_train.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2032.3200737936415!2d17.48267831633615!3d59.37768598167573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTnCsDIyJzM5LjciTiAxN8KwMjknMDUuNSJF!5e0!3m2!1sen!2sse!4v1585402877054!5m2!1sen!2sse\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(56, 1, 'This post contains a youtube link.', '<p>Obcaecati cum iste quidem amet, eius hic animi asperiores doloribus quas quisquam dolorem, non quaerat alias quod, eos nesciunt. Voluptate quia optio, cupiditate odio iste facilis culpa sint eligendi earum cumque est reprehenderit illo, reiciendis cum aliquid. Maiores, sit laudantium repellat suscipit error quaerat hic debitis fugiat dolorem.</p><p> Recusandae nisi facere quo dolor eius impedit magnam ipsam error nemo, velit harum quos iure possimus eveniet eos placeat adipisci veritatis tempora porro quia necessitatibus. Coloribus? Enim, impedit consequuntur.</p><p>Quod minima rem fugiat ab, necessitatibus rerum inventore explicabo, saepe fuga architecto cumque nobis quas aspernatur, eos in doloribus amet alias possimus est. Vero asperiores quam ipsam atque. Optio cum corrupti sunt nobis neque assumenda veniam maxime commodi incidunt perferendis quam aliquid enim, accusantium vero sequi sit. Aspernatur eaque ut esse optio.</p>', '2020-03-28 15:24:55', '2020-03-29 23:11:03', '53QVnnF.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XLN802KwdQA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(117, 1, 'Obcaecati cum iste quidem amet, eius hic animi asperiores doloribus.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio qui eveniet earum dolores, iste, velit quidem, magnam quisquam odio doloremque adipisci doloribus? Enim, impedit consequuntur. Recusandae nisi facere quo dolor eius impedit magnam ipsam error nemo, velit harum quos iure possimus eveniet eos placeat adipisci veritatis tempora porro quia necessitatibus.</p><p>Obcaecati cum iste quidem amet, eius hic animi asperiores doloribus quas quisquam dolorem, non quaerat alias quod, eos nesciunt. Voluptate quia optio, cupiditate odio iste facilis culpa sint eligendi earum cumque est reprehenderit illo, reiciendis cum aliquid. Maiores, sit laudantium repellat suscipit error quaerat hic debitis fugiat dolorem.</p><p>Quod minima rem fugiat ab, necessitatibus rerum inventore explicabo, saepe fuga architecto cumque nobis quas aspernatur, eos in doloribus amet alias possimus est. Vero asperiores quam ipsam atque. Optio cum corrupti sunt nobis neque assumenda veniam maxime commodi incidunt perferendis quam aliquid enim, accusantium vero sequi sit. Aspernatur eaque ut esse optio.</p>', '2020-03-29 20:18:44', '2020-03-29 23:10:39', '0r7qN8U.png', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
