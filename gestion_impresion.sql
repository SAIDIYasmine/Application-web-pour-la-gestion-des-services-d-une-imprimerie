-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 08 juil. 2019 à 10:45
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_impresion`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `qte` int(50) NOT NULL,
  `prix` float NOT NULL,
  `nom_complet` varchar(50) NOT NULL,
  `tele` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `name`, `qte`, `prix`, `nom_complet`, `tele`) VALUES
(32, 'gestion financiere', 1, 22.5, 'ali ali', 505050505),
(33, 'gestion financiere', 1, 22.5, 'reda reda', 620202020),
(31, 'gestion financiere', 1, 22.5, 'yasmine yasmine', 101010101),
(30, 'gestion financiere', 2, 22.5, 'ilyass ilyass', 505050505),
(26, 'gestion financiere', 2, 22.5, 'yasmine saidi', 654818239),
(27, 'java oriente objet', 1, 12.5, 'yasmine saidi', 654818239),
(28, 'gestion financiere', 2, 22.5, 'yasmine saidi', 654818239),
(29, 'php', 1, 6.25, 'yasmine saidi', 654818239);

-- --------------------------------------------------------

--
-- Structure de la table `commande_cours`
--

DROP TABLE IF EXISTS `commande_cours`;
CREATE TABLE IF NOT EXISTS `commande_cours` (
  `id_user` int(50) NOT NULL,
  `id_cour` int(50) NOT NULL,
  `date_depot` date NOT NULL,
  `date_livraison` date NOT NULL,
  `qte` int(50) NOT NULL,
  PRIMARY KEY (`id_user`,`id_cour`,`date_depot`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande_cours`
--

INSERT INTO `commande_cours` (`id_user`, `id_cour`, `date_depot`, `date_livraison`, `qte`) VALUES
(0, 0, '2001-01-02', '2001-01-02', 0),
(14, 0, '2001-01-02', '2001-01-02', 0),
(11, 0, '2001-01-02', '2001-01-02', 4),
(11, 13, '2001-01-03', '2001-01-03', 4);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_d` int(20) NOT NULL AUTO_INCREMENT,
  `id_prof` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_depot` datetime NOT NULL,
  `nbr_page` int(50) NOT NULL,
  `universite` varchar(50) NOT NULL,
  `ecole` varchar(50) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id_d`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_d`, `id_prof`, `name`, `date_depot`, `nbr_page`, `universite`, `ecole`, `filiere`, `niveau`, `image`, `prix`) VALUES
(1, 18, 'gestion financiere', '2019-07-03 18:21:17', 90, 'med5', 'ENSIAS', 'GL', 'A1', '1', 22.5),
(20, 24, 'machine learning', '2019-07-05 00:57:09', 50, 'med5', 'ENSIAS', 'GL', 'A1', '10', 12.5),
(21, 27, 'big data', '2019-07-05 01:10:17', 80, 'med5', 'ENSIAS', 'EMBI', 'A2', '12', 20),
(5, 19, 'langage c', '2019-07-03 18:29:20', 52, 'med5', 'ENSIAS', 'EMBI', 'A1', '5', 13);

-- --------------------------------------------------------

--
-- Structure de la table `importfiles`
--

DROP TABLE IF EXISTS `importfiles`;
CREATE TABLE IF NOT EXISTS `importfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `format` varchar(11) NOT NULL,
  `couleur` varchar(30) NOT NULL,
  `nbr_copier` varchar(30) NOT NULL,
  `spiral` varchar(30) NOT NULL,
  `date_commande` datetime NOT NULL,
  `date_livraison` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `importfiles`
--

INSERT INTO `importfiles` (`id`, `nom`, `format`, `couleur`, `nbr_copier`, `spiral`, `date_commande`, `date_livraison`) VALUES
(10, '_$PFE PrÃ©sentation.pptx', 'A3', 'avec couleur', '5', 'avec spiral', '2019-07-05 00:53:07', '2019-02-01 01:01:00'),
(9, '_$PFE PrÃ©sentation.pptx', 'A4', 'sans couleur', '8', 'avec spiral', '2019-07-05 00:34:14', '2019-12-31 02:06:00'),
(8, '_$PFE PrÃ©sentation.pptx', 'A4', 'avec couleur', '2', 'avec spiral', '2019-07-04 16:38:09', '2020-01-31 02:01:00'),
(11, 'ENSA.docx', 'A4', 'avec couleur', '5', 'avec spiral', '2019-07-05 01:07:59', '2019-01-01 07:01:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `Prenom`, `Nom`, `mail`, `tel`, `mdp`, `categorie`) VALUES
(27, 'kerzazi', 'nouredine', 'nouredine@gmail.com', '0202020202', 'nouredine', 'professeur'),
(21, 'nada', 'nada', 'nada@gmail.com', '0606060606', 'nada', 'etudiant'),
(25, 'ali', 'ali', 'ali@gmail.com', '0505050505', 'ali', 'etudiant'),
(26, 'reda', 'moumen', 'reda@gmail.com', '0620202020', 'reda', 'etudiant'),
(18, 'abdellah', 'el mnouar', 'abdellahelmnouar@gmail.com', '0507089005', 'abdellah', 'professeur'),
(0, 'admin', 'mohamed', 'admin@gmail.com', '0520154578', 'admin', 'admin'),
(12, 'miloud', 'sefiani', 'miloudsefiani@gmail.com', '0601020304', 'miloud', 'etudiant'),
(11, 'yasmine', 'saidi', 'yasminesaidi@gmail.com', '0654818239', 'yasmine', 'etudiant'),
(22, 'ilyass', 'ilyass', 'ilyass@gmail.com', '0505050505', 'ilyass', 'etudiant'),
(23, 'yasmine', 'saidi', 'yasmine@gmail.com', '0101010101', 'yasmine', 'etudiant'),
(24, 'miloud', 'miloud', 'miliud@gmail.com', '0202020202', 'miloud', 'professeur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
