-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2012 at 08:56 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbg_posts`
--

CREATE TABLE IF NOT EXISTS `dbg_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etag` varchar(57) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `url_comm` varchar(255) DEFAULT NULL,
  `share` int(11) NOT NULL DEFAULT '0',
  `comms` int(11) NOT NULL DEFAULT '0',
  `plus` int(11) NOT NULL DEFAULT '0',
  `type` enum('share','post') NOT NULL DEFAULT 'post',
  `datainsert` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dbg_posts`
--

INSERT INTO `dbg_posts` (`id`, `etag`, `user_id`, `title`, `content`, `url_comm`, `share`, `comms`, `plus`, `type`, `datainsert`) VALUES
(1, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/a450YYlHI4IsZEvg-wkpyT4HB9s', 1, 'functioneaza !', 'functioneaza !', 'https://plus.google.com/107478352790883449995/posts/gDpd1qt68dT', 0, 0, 0, 'post', '2012-12-08 16:20:05'),
(2, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/jORa0W1O1fhiKs3uEHqbtsG5JBw', 1, 'Postare noua', 'Postare noua', 'https://plus.google.com/107478352790883449995/posts/KYJ4LpFA4o3', 0, 1, 2, 'post', '2012-12-08 10:56:51'),
(3, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/N0CD1n6_6PoV2PYmLeIJIUhIFDY', 1, 'Google plus', 'Google plus', 'https://plus.google.com/107478352790883449995/posts/bKJJsjRraFT', 0, 0, 0, 'post', '2012-12-08 10:56:46'),
(4, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/TgpQhJaRT7AZ_hpORrvqZrFlDdM', 1, 'Text text', 'Text text', 'https://plus.google.com/107478352790883449995/posts/Nzu1XyGYtf3', 0, 0, 0, 'post', '2012-12-08 10:56:42'),
(5, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/OsjI3W-VtyJ5y-aAVlNwIKO_fpg', 1, 'http://payperniche.com/blo', '<a href="http://payperniche.com/blo" class="ot-anchor">http://payperniche.com/blo</a>', 'https://plus.google.com/107478352790883449995/posts/TAvzPKN9Aoi', 0, 0, 0, 'post', '2012-11-23 17:52:03'),
(6, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/L6UMHi9SWvZiSPGVL2RDRSLKpHE', 1, '', '', 'https://plus.google.com/107478352790883449995/posts/LCbHmCgsUHM', 0, 0, 0, 'post', '2012-08-22 17:59:24'),
(7, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/bC5Dnp6AwjYIxaP0H_O-1Ar9jC8', 1, '', '', 'https://plus.google.com/107478352790883449995/posts/V8ktfngoBoC', 0, 0, 0, 'post', '2012-08-19 00:14:05'),
(8, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/p8nO33QPwiG4bpc2Fx_9DQEo9vY', 1, '', '', 'https://plus.google.com/107478352790883449995/posts/5pcVtiTeALX', 0, 0, 0, 'post', '2012-08-16 06:56:28'),
(9, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/YZMusgSQEyCXriZi7qxOnWy9U28', 1, 'Minecraft Seed Generator', 'Minecraft Seed Generator', 'https://plus.google.com/107478352790883449995/posts/ijkEFQo4L33', 0, 0, 0, 'post', '2012-06-13 13:40:04'),
(10, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/MVKvSM3vCBeYyd2xs7ovujFMF_I', 1, '', '', 'https://plus.google.com/107478352790883449995/posts/PoGbHC7CSxt', 0, 0, 0, 'post', '2012-06-05 07:05:33'),
(11, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/2hSARayK7ZmHxVwFP97TlJUsRik', 1, 'Minecraft Mods - by minecraft-elevator', 'Minecraft Mods - by minecraft-elevator', 'https://plus.google.com/107478352790883449995/posts/dyQZFdmx5q5', 0, 0, 0, 'post', '2012-05-30 21:58:34'),
(12, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/uSkWxEEm4vnmsLNpuNoWlFadh90', 1, '', '', 'https://plus.google.com/107478352790883449995/posts/NCLE9Nq59Ww', 0, 0, 0, 'post', '2012-05-30 02:23:40'),
(13, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/rT5eobhBZ-ATQwp1xgzsqefq-CQ', 1, 'Servicii SEO http://icx.ro', 'Servicii SEO <a href="http://icx.ro" class="ot-anchor">http://icx.ro</a>', 'https://plus.google.com/107478352790883449995/posts/PxUPAg2o2xw', 0, 0, 0, 'post', '2012-05-08 04:25:34'),
(14, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/SuUhTZ4CN81SG8OBvM2QPsjLjNY', 1, 'Rose gold wedding rings', 'Rose gold wedding rings', 'https://plus.google.com/107478352790883449995/posts/16HZhxANPav', 0, 0, 0, 'post', '2012-04-30 12:49:42'),
(15, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/-4Z6bYkP7D5x0Q319n-KqQI_qDA', 1, 'http://halo-engagement-rings.com/', '<a href="http://halo-engagement-rings.com/" class="ot-anchor">http://halo-engagement-rings.com/</a>', 'https://plus.google.com/107478352790883449995/posts/YbNXvukjNW5', 0, 0, 0, 'post', '2012-04-30 08:11:15'),
(16, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/y0_lMxWBgh-gwqiuLxp3PSu2LZU', 1, 'http://rose-gold-engagement-rings.org/', '<a href="http://rose-gold-engagement-rings.org/" class="ot-anchor">http://rose-gold-engagement-rings.org/</a>', 'https://plus.google.com/107478352790883449995/posts/j65zhQZytqR', 0, 0, 1, 'post', '2012-04-05 17:19:10'),
(17, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/MPsGKXALhabHOv5dtRq_O4hDNLA', 1, 'My newest SEO experiment, the website isn''t fully functional, but it''s a good way to test how it will...', 'My newest SEO experiment, the website isn&#39;t fully functional, but it&#39;s a good way to test how it will rank from web directories back links, good content, and well researched domains.<br />Check out my website (Youtube Converter, in the footer) and give me a comment about what you think, if it will be or not a real success ?', 'https://plus.google.com/107478352790883449995/posts/hCTcgq7LpiL', 0, 0, 1, 'post', '2012-02-18 17:33:07'),
(19, 'f7U2cUeZRqWrbGtO2t6ZzlW2A8I/uQqvn2myJIKL0DKJMXY9n101ddE', 1, 'Update functie', 'Update functie', 'https://plus.google.com/107478352790883449995/posts/h7zYQNzTW7D', 0, 0, 0, 'post', '2012-12-08 18:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `dbg_users`
--

CREATE TABLE IF NOT EXISTS `dbg_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` varchar(64) COLLATE utf8_romanian_ci NOT NULL COMMENT 'Google ID',
  `firstname` varchar(60) COLLATE utf8_romanian_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_romanian_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_romanian_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_romanian_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_romanian_ci DEFAULT NULL,
  `gurl` varchar(255) COLLATE utf8_romanian_ci DEFAULT NULL COMMENT 'Google url',
  `email` varchar(180) COLLATE utf8_romanian_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_romanian_ci DEFAULT NULL,
  `priority` enum('low','medium','high') COLLATE utf8_romanian_ci NOT NULL DEFAULT 'medium',
  `datainsert` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gid` (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `dbg_users`
--

INSERT INTO `dbg_users` (`id`, `gid`, `firstname`, `lastname`, `fullname`, `gender`, `avatar`, `gurl`, `email`, `phone`, `priority`, `datainsert`) VALUES
(1, '107478352790883449995', 'Doe', 'John', 'John Doe', 'male', 'https://lh4.googleusercontent.com/-TbJPTyRfwTk/AAAAAAAAAAI/AAAAAAAAAIE/OKXlm7KRQ4k/photo.jpg?sz=50', NULL, NULL, NULL, 'medium', '2012-12-08 16:43:30'),
(14, '324432', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'medium', '2012-12-08 21:42:05'),
(15, '545445544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'medium', '2012-12-08 21:43:12'),
(16, '43433443', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'medium', '2012-12-08 21:45:07'),
(24, '111290814146404400956', '', '', NULL, NULL, '', NULL, NULL, NULL, 'medium', '2012-12-08 21:49:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dbg_posts`
--
ALTER TABLE `dbg_posts`
  ADD CONSTRAINT `dbg_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `dbg_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
