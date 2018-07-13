-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 06 Juillet 2018 à 12:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `testjs`
--

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `email`
--

INSERT INTO `email` (`id`, `fid`, `tid`, `message`) VALUES
(1, 1, 2, 'Salam Mustapha, ca va?'),
(3, 1, 2, 'Wach labass?'),
(4, 2, 1, 'salam Rachid kolchi labass, ounta ca va? ach kat3awad?');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id`, `nom`, `email`, `valid`) VALUES
(1, 'Rachid', 'rachid@email.com', 1),
(2, 'Mustapha', 'mustapha@email.com', 1),
(3, 'Said', 'said@email.com', 1),
(4, 'Hmida', 'hmida@email.com', 1),
(11, 'Khalid', 'khalid@email.com', 1),
(17, 'Ahmed', 'ahmed@email.com', 1),
(18, 'Adel', 'adel@email.com', 1),
(19, 'Samir', 'samir@email.com', 1),
(20, 'Nawal', 'nawal@email.com', 1),
(21, 'Jamal', 'jamal@email.com', 1),
(22, 'Issam', 'issam@email.com', 1),
(23, 'Moussa', 'moussa@email.com', 1),
(24, 'Kawtar', 'kawtar@email.com', 1),
(25, 'Amir', 'amir@email.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
