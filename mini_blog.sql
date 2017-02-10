-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Janvier 2017 à 21:32
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mini_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `mb_article`
--

CREATE TABLE `mb_article` (
  `id_article` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `fk_id_user` int(11) NOT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mb_article`
--

INSERT INTO `mb_article` (`id_article`, `title`, `content`, `status`, `date`, `fk_id_user`, `date_update`) VALUES
(1, 'Premier article', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n</body>\r\n</html>', 1, '2017-01-31', 1, NULL),
(2, 'Bienvenue', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consequatur aperiam temporibus, labore maiores, asperiores fugiat necessitatibus illum ut optio repudiandae nisi praesentium magni debitis consequuntur fugit molestiae minima officiis.<br /><br />Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis vitae, rem quae doloremque eveniet dicta nostrum aperiam dolor velit itaque accusantium cupiditate porro nisi pariatur a quo sit dolores laudantium.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente recusandae temporibus possimus facilis perspiciatis enim, adipisci minima cupiditate, laborum dolore omnis quasi eligendi aut veritatis aspernatur cumque quisquam ratione in.</p>\r\n</body>\r\n</html>', 1, '2017-01-31', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mb_comments`
--

CREATE TABLE `mb_comments` (
  `id_comment` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  `fk_id_article` int(11) NOT NULL,
  `fk_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mb_comments`
--

INSERT INTO `mb_comments` (`id_comment`, `content`, `status`, `date`, `fk_id_article`, `fk_id_user`) VALUES
(1, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Mon premier commentaire</p>\r\n</body>\r\n</html>', 1, '2017-01-31 20:41:26', 1, 1),
(2, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Commentaire anonyme d\'une personne non connect&eacute;e :)</p>\r\n</body>\r\n</html>', 1, '2017-01-31 22:15:45', 1, -1);

-- --------------------------------------------------------

--
-- Structure de la table `mb_users`
--

CREATE TABLE `mb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mb_users`
--

INSERT INTO `mb_users` (`id_user`, `username`, `password`, `status`, `admin`) VALUES
(1, 'admin', '$2y$10$LCgopU0FIclSvOy/IBF4keSUW6Y7GAwQabgFLGZRdChMlCplbmhoK', 1, 1),
(2, 'user', '$2y$10$kwdHNlddk6gSPCdaXzA1ju6E4VV0qMIj6cXWCpb5XMXDPXuoh0L0.', 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mb_article`
--
ALTER TABLE `mb_article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `mb_comments`
--
ALTER TABLE `mb_comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `mb_users`
--
ALTER TABLE `mb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mb_article`
--
ALTER TABLE `mb_article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mb_comments`
--
ALTER TABLE `mb_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mb_users`
--
ALTER TABLE `mb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
