-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2016 at 04:13 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created`, `modified`, `status`) VALUES
(1, 1, 'Post de Pablo', 'Probando...', '2016-03-04 16:55:34', '2016-03-04 17:08:46', 1),
(2, 2, 'Post de Marcos', 'vuelvo a Editar mi post.', '2016-03-04 17:00:04', '2016-03-04 17:10:18', 1),
(3, 2, 'Post desde api', 'Probando', '2016-04-07 11:57:49', '2016-04-07 15:23:16', 1),
(4, 0, 'Mi Post jquery123', 'Testea el Post jquery', '2016-04-07 13:40:28', '2016-04-07 13:40:28', 1),
(5, 0, 'Post desde api', NULL, '2016-04-07 15:25:48', '2016-04-07 15:26:57', 1),
(6, 0, 'Mi new Post jquery123', 'Testea el Post jquery', '2016-04-07 15:29:53', '2016-04-07 15:29:53', 1),
(7, 0, 'Mi new Post jquery123', 'Testea el Post jquery', '2016-04-07 15:31:21', '2016-04-07 15:31:21', 1),
(8, 0, 'Mi new Post jquery123', 'Testea el Post jquery', '2016-04-07 16:04:48', '2016-04-07 16:04:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `role` enum('admin','author') NOT NULL,
  `bio` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `bio`, `created`, `modified`, `status`) VALUES
(1, 'gpabloandres', '$2a$10$txka8upTFpIIcdTecG0gBeZWdCUuT/BUEyDN7oeAQziyFJWXzxBBS', 'gpabloandres@gmail.com', 'admin', NULL, '2016-03-04 16:53:23', '2016-03-04 16:53:23', 1),
(2, 'fmarcos', '$2a$10$YrHGJm2swYpA6wZbOOX/T.sxff/JUWngbOMChVnnu1XBvio7wENtq', 'fmarcos@gmail.com', 'author', 'Alta de Marcos Flores.', '2016-03-04 16:57:58', '2016-03-04 16:57:58', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
