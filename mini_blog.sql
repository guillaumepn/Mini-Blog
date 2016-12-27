-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 27 Décembre 2016 à 15:39
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mini_blog`
--
CREATE DATABASE IF NOT EXISTS `mini_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mini_blog`;

-- --------------------------------------------------------

--
-- Structure de la table `mb_article`
--

CREATE TABLE IF NOT EXISTS `mb_article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `fk_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mb_comments`
--

CREATE TABLE IF NOT EXISTS `mb_comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  `fk_id_article` int(11) NOT NULL,
  `fk_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mb_users`
--

CREATE TABLE IF NOT EXISTS `mb_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
