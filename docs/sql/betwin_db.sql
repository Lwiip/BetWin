-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Mai 2016 à 14:11
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `betwin_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `id_users` int(11) NOT NULL,
  `id_events` int(11) NOT NULL,
  `betting_money` int(11) NOT NULL,
  `odds` float NOT NULL,
  `which_team` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_users`,`id_events`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table des paris des menbres';

--
-- Contenu de la table `bets`
--

INSERT INTO `bets` (`id_users`, `id_events`, `betting_money`, `odds`, `which_team`, `result`) VALUES
(28, 16, 10, 1.5, 'PSG', 'Lyon'),
(28, 17, 50, 1.24, 'Spurs', ''),
(28, 19, 200, 2.04, 'France', ''),
(28, 20, 50, 2.1, 'Lyon', ''),
(28, 21, 10, 1.5, 'Chicago Bulls', 'Chicago Bulls'),
(28, 22, 105, 1.4, 'Spurs', 'Chicago Bulls'),
(28, 23, 50, 1.28, 'Spurs', ''),
(28, 24, 40, 1.56, 'Lakers', ''),
(28, 27, 20, 1.48, 'St-Etienne	\r\n', ''),
(28, 28, 20, 1.71, 'Arsenal', ''),
(28, 29, 50, 3.21, 'Tsonga', ''),
(28, 30, 100, 1.35, 'Serena Williams', ''),
(31, 17, 1000, 1.57, 'Spurs', ''),
(31, 18, 100, 1.58, 'Nadal', ''),
(33, 23, 50, 1.14, 'Spurs', ''),
(33, 24, 5, 1.45, 'Lakers', ''),
(33, 25, 10, 4.38, 'France', ''),
(33, 26, 20, 1.26, 'Real Madrid', ''),
(33, 27, 10, 2.14, 'LOSC', '');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `odds1_init` float NOT NULL,
  `odds2_init` float NOT NULL,
  `bettors1` int(11) NOT NULL,
  `bettors2` int(11) NOT NULL,
  `sport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `championship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateofbet` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table des rencontres en cours' AUTO_INCREMENT=31 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `team1`, `team2`, `odds1_init`, `odds2_init`, `bettors1`, `bettors2`, `sport`, `championship`, `dateofbet`) VALUES
(23, 'Spurs', 'Chicago Bulls', 1.28, 1.89, 10, 7, 'Basket', 'NBA', '2016-05-17'),
(24, 'Lakers', 'Miami heat', 1.56, 1.48, 6, 3, 'Basket', 'NBA', '2016-05-17'),
(25, 'France', 'USA', 4.85, 1.11, 5, 6, 'Basket', 'JO', '2016-05-17'),
(26, 'PSG', 'Real Madrid', 2.14, 1.26, 10, 13, 'Football', 'Coupes des champions', '2016-05-17'),
(27, 'St-Etienne	\r\n', 'LOSC', 1.47, 2.14, 11, 7, 'Football', 'Ligue 1', '2016-05-17'),
(28, 'Arsenal', 'Manchester United', 1.58, 1.42, 6, 5, 'Football', 'Coupes des champions', '2016-05-17'),
(29, 'Tsonga', 'Nadal', 2.58, 1.24, 10, 15, 'Tennis', 'Roland Garros', '2016-05-17'),
(30, 'Serena Williams', 'Venus Williams', 1.32, 1.89, 10, 6, 'Tennis', 'Wimbledon', '2016-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `gender` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table des users inscrits' AUTO_INCREMENT=34 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `address`, `email`, `money`, `gender`) VALUES
(28, 'Louis', 'a7871a76fdde32d9f9aec8c185f464b3', 'Louis', 'Louis', 'Louis', 'louis@louis.louis', 220, 'male'),
(31, 'test', 'f032f27ee18f9de67a3bb9c16eae57b3', 'test', 'test', 'test', 'test_test@gmail.com', 900, 'male'),
(32, 'jdfjfnfd', '3544b5c45fb641928f6d9d54708e4f20', 'lfkfjffd', 'jkfjkfnkjfnj', '', 'bon@fhfudj', 0, ''),
(33, 'BonjourBonjour', '6b7e510aae7aada14f0a9c586a7a9515', 'Bonjour', 'Bonjour', '', 'bonjour@bonjourbonjour', 75, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
