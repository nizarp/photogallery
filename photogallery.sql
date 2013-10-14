-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2013 at 06:36 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photogallery`
--
DROP DATABASE `photogallery`;
CREATE DATABASE `photogallery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `photogallery`;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(200) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `description`, `user_id`, `created_on`) VALUES
(1, 'My album', 'Description', 4, '2013-09-20 00:00:00'),
(2, 'Best Album', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius non nulla non rutrum. Nullam gravida pulvinar varius. Donec at vestibulum magna. Nulla euismod orci a tellus vehicula malesuada. Mauris vitae massa ipsum. Vivamus nec pharetra ipsum. Integer vestibulum dolor a felis auctor consectetur. Curabitur ut ligula adipiscing, dapibus urna nec, adipiscing leo.\r\n\r\nUt ut nibh ac ante bibendum ullamcorper. Suspendisse suscipit placerat augue non eleifend. In ante justo, tempus aliquam rhoncus lacinia, rhoncus quis enim. Nunc blandit justo et lorem tempor vulputate. Duis sed mauris libero. Vivamus turpis mauris, porttitor ac purus at, porttitor hendrerit felis. Curabitur faucibus vulputate arcu sed venenatis. Nam vestibulum, eros quis accumsan dapibus, eros velit congue lacus, at fringilla nibh magna ut nisi. In hac habitasse platea dictumst. Pellentesque et sapien non tellus sollicitudin ullamcorper. Donec non varius purus, ut egestas justo. Praesent nec erat porta, interdum quam id, scelerisque velit.', 4, '2013-10-13 17:42:43'),
(3, 'Second One', 'Nulla euismod orci a tellus vehicula malesuada. Mauris vitae massa ipsum. Vivamus nec pharetra ipsum. Integer vestibulum dolor a felis auctor consectetur. Curabitur ut ligula adipiscing, dapibus urna nec, adipiscing leo.\r\n\r\nUt ut nibh ac ante bibendum ullamcorper. Suspendisse suscipit placerat augue non eleifend. In ante justo, tempus aliquam rhoncus lacinia, rhoncus quis enim. Nunc blandit justo et lorem tempor vulputate. Duis sed mauris libero. Vivamus turpis mauris, porttitor ac purus at, porttitor hendrerit felis. Curabitur faucibus vulputate arcu sed venenatis. Nam vestibulum, eros quis accumsan dapibus, eros velit congue lacus, at fringilla nibh magna ut nisi.', 4, '2013-10-13 17:43:20'),
(4, 'Test Title', 'Order rows in join table mysql - Stack Overflow\r\nstackoverflow.com/questions/3734095/order-rows-in-join-table-mysql?\r\nSep 17, 2010 - I have a table with date ranges. I want to look for gaps between these ... If you want the rows in your tables sorted before being joined, you could ...', 4, '2013-10-13 18:34:03'),
(5, 'Test Title', 'Order rows in join table mysql - Stack Overflow', 4, '2013-10-13 18:34:03'),
(6, 'Test Title', 'Order rows in join table mysql - Stack Overflow', 4, '2013-10-13 18:34:03'),
(7, 'Test Title', 'Order rows in join table mysql - Stack Overflow', 4, '2013-10-13 18:34:03'),
(8, 'Test Title', 'Order rows in join table mysql - Stack Overflow', 4, '2013-10-13 18:34:03'),
(9, 'Nulla euismod orci a tellus vehicula malesuada. Mauris vitae massa ipsum. Vivamus nec pharetra ipsum. Integer vestibulum dolor a felis auctor consectetur. Curabitur ut ligula adipiscing, dapibus urna ', 'Order rows in join table mysql - Stack Overflow', 4, '2013-10-13 18:34:03'),
(15, 'My album', 'This is miine....', 6, '2013-10-13 02:36:10'),
(16, 'Album', 'ijijiji', 5, '2013-10-14 01:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `user_id` int(100) NOT NULL,
  `photo_id` int(100) NOT NULL,
  `posted_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `photo_id`, `posted_on`) VALUES
(9, 'My comment', 6, 9, '2013-10-14 07:56:50'),
(8, 'Another comment', 5, 9, '2013-10-14 07:54:31'),
(7, 'Test Comment', 5, 9, '2013-10-14 07:54:20'),
(10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 6, 9, '2013-10-14 07:57:15'),
(11, 'My comment', 6, 12, '2013-10-14 12:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `title`, `photo`, `description`, `user_id`, `album_id`, `created_on`) VALUES
(1, 'My Photo', '/photos/photo_1.jpg', 'Create your HTML5 website for free - no coding or programming skills needed.\r\n\r\nWix provides 100s of fully-customizable, designer-made templates. Use the powerful drag nâ€™ drop Editor to change anything and everything to create something original. Enhance your website by adding popular web Apps & Services, enjoy top-grade hosting and get found on search engines like Google.', 4, 1, '2013-10-13 18:09:28'),
(2, 'Second Photo', '/photos/photo_2.jpg', 'Create your HTML5 website for free - no coding or programming skills needed.\r\n\r\nWix provides 100s of fully-customizable, designer-made templates. Use the powerful drag n’ drop Editor to change anything and everything to create something original. Enhance your website by adding popular web Apps & Services, enjoy top-grade hosting and get found on search engines like Google.', 4, 2, '2013-10-12 18:09:58'),
(3, 'Me too!!!', '/photos/photo_8.jpg', 'Desc', 4, 3, '2012-10-18 18:25:04'),
(4, 'Me too!!!', '/photos/photo_3.jpg', 'Desc', 4, 4, '2012-10-18 18:25:04'),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting', '/photos/photo_4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, 9, '2012-10-18 18:25:04'),
(6, 'Lorem Ipsum is simply dummy text of the printing and typesetting', '/photos/photo_5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, 9, '2012-10-18 18:25:04'),
(7, 'Lorem Ipsum is simply dummy text of the printing and typesetting', '/photos/photo_6.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, 9, '2012-10-18 18:25:04'),
(8, 'Lorem Ipsum is simply dummy text of the printing and typesetting', '/photos/photo_7.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, 9, '2012-10-18 18:25:04'),
(9, 'Lorem Ipsum is simply dummy text of the printing and typesetting', '/photos/photo_9.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 4, 9, '2012-10-18 18:25:04'),
(12, 'jhhkjh', '/photos/20130526_155032.jpg', 'ijijijiji', 5, 15, '2013-10-14 12:20:57'),
(13, 'kjlkjlkjlk', '/photos/20130703_192922-001.jpg', 'aaaaaaaa', 5, 15, '2013-10-14 12:21:22'),
(19, 'mijijijij', '/photos/20130630_125612-001.jpg', 'uuuuuuuuu', 5, 16, '2013-10-14 01:09:11'),
(20, ',iuuiuiui', '/photos/20120129_160041.jpg', 'uhuhuh', 5, 8, '2013-10-14 01:11:49'),
(21, 'uhuhuhu', '/photos/20120129_160413.jpg', 'iniininini', 5, 8, '2013-10-14 01:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rating` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `photo_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `user_id`, `photo_id`) VALUES
(16, 5, 6, 9),
(2, 4, 4, 9),
(3, 4, 4, 9),
(14, 5, 5, 9),
(17, 4, 6, 12),
(18, 5, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `role` enum('adimn,user') NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `contact`, `dob`, `location`, `role`) VALUES
(5, 'admin', '123456', 'Administrator', 'nizarp@gmail.com', '', '2013-10-06', 'Angadippuram', ''),
(4, 'nizarp', '123456', 'Nizar', 'nizarp@gmail.com', '876455445', '1985-05-29', 'Angm', 'adimn,user'),
(6, 'banu', 'banu', 'Banu', '', '', '0000-00-00', '', ''),
(7, 'nizarp', 'sdfsdfsdf', 'sdfsd', '', '', '0000-00-00', '', ''),
(8, 'nizarp', 'sdfsdfsdf', 'sfsd', '', '', '0000-00-00', '', ''),
(9, 'ooooo', 'p[o[o[p', 'wqeqwe', '', '', '2013-10-05', '', ''),
(10, 'asdasda', 'asdasdasd', 'asdasd', '', '', '0000-00-00', '', ''),
(11, 'asdasda', 'asdasdasd', 'asdasd', '', '', '0000-00-00', '', ''),
(12, 'kjokoko', 'okokoko', 'asasd', '', '', '0000-00-00', '', ''),
(13, 'kjkjkjkj', 'kjkjkjk', 'asdasda', '', '', '0000-00-00', '', ''),
(14, 'kjkjkjkj', 'kjkjkjk', 'asdasda', '', '', '0000-00-00', '', ''),
(15, 'lklklkl', 'lklklkl', 'asdasd', '', '', '0000-00-00', '', ''),
(16, 'kokoko', 'okokoko', 'asdasd', '', '', '0000-00-00', '', ''),
(17, 'sunu123', 'password', 'Sunu', 'qa@addthis.com', '', '0000-00-00', '', '');
