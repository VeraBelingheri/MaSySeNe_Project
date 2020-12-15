-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Dic 15, 2020 alle 16:36
-- Versione del server: 5.7.31
-- Versione PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `networksecurity`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` varchar(36) NOT NULL,
  `userId` varchar(36) NOT NULL,
  `postId` varchar(36) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_relation` (`postId`),
  KEY `users_relation` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` varchar(36) NOT NULL,
  `userId` varchar(36) NOT NULL,
  `img` text,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_relation` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `trn_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `trn_date`) VALUES
('2128b3ee-ca65-4fb4-a064-7be0f6afc492', 'Alessio', 'alessio@test.it', '40ac753d50a4919bbc11ffa414293491515518aade843d71369a25774699348e3cc412a4a6f7dd7e04373d9c607429a0fdb694f739e70c4a3ab8e610378b76d2', '2020-12-15 02:05:27'),
('5124a063-89ed-4b06-af03-99ed96886483', 'Moreline', 'moreline@test.it', '40ac753d50a4919bbc11ffa414293491515518aade843d71369a25774699348e3cc412a4a6f7dd7e04373d9c607429a0fdb694f739e70c4a3ab8e610378b76d2', '2020-12-02 22:17:52'),
('b009991b-7444-4d57-8b38-15544ee664d1', 'Vera', 'vera@test.it', '40ac753d50a4919bbc11ffa414293491515518aade843d71369a25774699348e3cc412a4a6f7dd7e04373d9c607429a0fdb694f739e70c4a3ab8e610378b76d2', '2020-12-02 18:03:34');

-- --------------------------------------------------------

--
-- Struttura della tabella `users_log`
--

DROP TABLE IF EXISTS `users_log`;
CREATE TABLE IF NOT EXISTS `users_log` (
  `id_user` varchar(36) NOT NULL,
  `token` varchar(36) NOT NULL,
  `timestamp` timestamp NOT NULL,
  UNIQUE KEY `id_user` (`id_user`,`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
