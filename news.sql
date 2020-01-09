-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 jan. 2020 à 01:18
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `proj`
--

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `dateParution` date NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`, `dateParution`, `url`) VALUES
(2, 'Pompier', 'Les pompiers de Clermont se battent \r\n\r\ne\r\ngrg\r\nr\r\n\r\n\r\nger\r\n', '2020-01-07', 'https://www.lamontagne.fr/photoSRC/Gw--/manifestion-greve-pompier-sdis_3798268.jpeg'),
(3, 'ET est de retour', 'C\'était donc vrai !!!!!\r\n\r\n\r\nEt \r\nest \r\nlà \r\n!!!!', '2020-01-07', 'https://www.francoischarron.com/images/youtube/Pdgk3ERKdug.jpg'),
(18, 'NOUVELLE NEWS !!!', 'Voici un super news avec un gif !!', '2020-01-08', 'https://media3.giphy.com/media/l46C93LNM33JJ1SMw/giphy.gif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
