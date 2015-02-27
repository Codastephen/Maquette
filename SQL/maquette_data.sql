-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 27 Février 2015 à 09:53
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `maquette`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`Id_contact` int(11) NOT NULL,
  `Id_visite` int(11) NOT NULL,
  `Nom_user` varchar(255) NOT NULL,
  `Heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`Id_contact`, `Id_visite`, `Nom_user`, `Heure`) VALUES
(1, 1, 'scoda@designalsystems.com', '2015-02-27 08:50:16'),
(2, 2, 'scoda@designalsystems.com', '2015-02-27 08:50:40');

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`Id_log` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` text NOT NULL,
  `Id_visiteur` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `log`
--

INSERT INTO `log` (`Id_log`, `date`, `action`, `Id_visiteur`) VALUES
(1, '2015-02-27 08:50:06', 'ARRIVEE', 1),
(2, '2015-02-27 08:50:37', 'ARRIVEE', 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`Id_message` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `datedebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datefin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nom` varchar(255) NOT NULL,
  `statut` varchar(50) NOT NULL DEFAULT 'MEMBRE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`nom`, `statut`) VALUES
('scoda@designalsystems.com', 'SERREFILE'),
('tcomte', 'MEMBRE'),
('tcomte@designalsystems.com', 'SERREFILE');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE IF NOT EXISTS `visite` (
`Id` int(11) NOT NULL,
  `Id_visiteur` int(11) NOT NULL,
  `HeureA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `HeureD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `visite`
--

INSERT INTO `visite` (`Id`, `Id_visiteur`, `HeureA`, `HeureD`) VALUES
(1, 1, '2015-02-27 08:50:06', '2015-02-27 08:51:43'),
(2, 2, '2015-02-27 08:50:37', '2015-02-27 08:51:43');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE IF NOT EXISTS `visiteur` (
`Id_visiteur` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Societe` varchar(30) NOT NULL,
  `code` varchar(4) DEFAULT '',
  `Id_current_visite` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`Id_visiteur`, `Nom`, `Societe`, `code`, `Id_current_visite`) VALUES
(1, 'Edouard Amosse', 'Dell', NULL, NULL),
(2, 'Bill Gates', 'Microsoft', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`Id_contact`);

--
-- Index pour la table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`Id_log`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`Id_message`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `visite`
--
ALTER TABLE `visite`
 ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
 ADD PRIMARY KEY (`Id_visiteur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
MODIFY `Id_contact` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `log`
--
ALTER TABLE `log`
MODIFY `Id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
MODIFY `Id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `visite`
--
ALTER TABLE `visite`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
MODIFY `Id_visiteur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
