-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 05 oct. 2021 à 16:10
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `footballv1`
--
CREATE DATABASE `footballv1`;
USE `footballv1`;
-- --------------------------------------------------------

--
-- Structure de la table `classementa`
--

CREATE TABLE `classementa` (
  `id` int(11) NOT NULL,
  `nomEquipe` varchar(25) NOT NULL,
  `matchJouer` int(11) NOT NULL,
  `matchGagner` int(11) NOT NULL,
  `matchPerdu` int(11) NOT NULL,
  `matchNull` int(11) NOT NULL,
  `butPour` int(11) NOT NULL,
  `butContre` int(11) NOT NULL,
  `difference` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classementa`
--

INSERT INTO `classementa` (`id`, `nomEquipe`, `matchJouer`, `matchGagner`, `matchPerdu`, `matchNull`, `butPour`, `butContre`, `difference`, `point`) VALUES
(1, 'Bresil', 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Allemagne', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Portugal', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'France', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `classementb`
--

CREATE TABLE `classementb` (
  `id` int(11) NOT NULL,
  `nomEquipe` varchar(25) NOT NULL,
  `matchJouer` int(11) NOT NULL,
  `matchGagner` int(11) NOT NULL,
  `matchPerdu` int(11) NOT NULL,
  `matchNull` int(11) NOT NULL,
  `butPour` int(11) NOT NULL,
  `butContre` int(11) NOT NULL,
  `difference` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classementb`
--

INSERT INTO `classementb` (`id`, `nomEquipe`, `matchJouer`, `matchGagner`, `matchPerdu`, `matchNull`, `butPour`, `butContre`, `difference`, `point`) VALUES
(2, 'Argentine', 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Italie', 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Haiti', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Espagne', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nomEquipe` varchar(25) NOT NULL,
  `matchJouer` int(11) NOT NULL,
  `matchGagner` int(11) NOT NULL,
  `matchPerdu` int(11) NOT NULL,
  `matchNull` int(11) NOT NULL,
  `butPour` int(11) NOT NULL,
  `butContre` int(11) NOT NULL,
  `difference` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nomEquipe`, `matchJouer`, `matchGagner`, `matchPerdu`, `matchNull`, `butPour`, `butContre`, `difference`, `point`) VALUES
(1, 'Bresil', 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Argentine', 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Italie', 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Allemagne', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Portugal', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'France', 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Haiti', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Espagne', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `gestionfinal`
--

CREATE TABLE `gestionfinal` (
  `id` int(11) NOT NULL,
  `equipeGagnante` varchar(50) DEFAULT NULL,
  `equipePerdante` varchar(50) DEFAULT NULL,
  `typeMatch` varchar(50) DEFAULT NULL,
  `matchF` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupea`
--

CREATE TABLE `groupea` (
  `id` int(11) NOT NULL,
  `teteDeSerieA1` varchar(25) NOT NULL,
  `teteDeSerieA2` varchar(25) NOT NULL,
  `teteDeSerieA3` varchar(25) NOT NULL,
  `teteDeSerieA4` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupea`
--

INSERT INTO `groupea` (`id`, `teteDeSerieA1`, `teteDeSerieA2`, `teteDeSerieA3`, `teteDeSerieA4`) VALUES
(345, 'Bresil', 'France', 'Allemagne', 'Portugal');

-- --------------------------------------------------------

--
-- Structure de la table `groupeb`
--

CREATE TABLE `groupeb` (
  `id` int(11) NOT NULL,
  `teteDeSerieB1` varchar(25) NOT NULL,
  `teteDeSerieB2` varchar(25) NOT NULL,
  `teteDeSerieB3` varchar(25) NOT NULL,
  `teteDeSerieB4` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupeb`
--

INSERT INTO `groupeb` (`id`, `teteDeSerieB1`, `teteDeSerieB2`, `teteDeSerieB3`, `teteDeSerieB4`) VALUES
(338, 'Argentine', 'Italie', 'Espagne', 'Haiti');

-- --------------------------------------------------------

--
-- Structure de la table `matche`
--

CREATE TABLE `matche` (
  `id` int(11) NOT NULL,
  `matchEQ` varchar(25) NOT NULL,
  `equipe1` int(11) NOT NULL,
  `equipe2` int(11) NOT NULL,
  `EGagner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matche`
--

INSERT INTO `matche` (`id`, `matchEQ`, `equipe1`, `equipe2`, `EGagner`) VALUES
(1, 'match1', 0, 0, 0),
(2, 'match2', 0, 0, 0),
(3, 'match3', 0, 0, 0),
(4, 'match4', 0, 0, 0),
(5, 'match5', 0, 0, 0),
(6, 'match6', 0, 0, 0),
(7, 'match7', 0, 0, 0),
(8, 'match8', 0, 0, 0),
(9, 'match9', 0, 0, 0),
(10, 'match10', 0, 0, 0),
(11, 'match11', 0, 0, 0),
(12, 'match12', 0, 0, 0),
(13, 'match13', 0, 0, 0),
(14, 'match14', 0, 0, 0),
(15, 'match15', 0, 0, 0),
(16, 'match16', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cree_le` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classementa`
--
ALTER TABLE `classementa`
  ADD KEY `FK_id` (`id`);

--
-- Index pour la table `classementb`
--
ALTER TABLE `classementb`
  ADD KEY `FK_id_CB` (`id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gestionfinal`
--
ALTER TABLE `gestionfinal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupea`
--
ALTER TABLE `groupea`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupeb`
--
ALTER TABLE `groupeb`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matche`
--
ALTER TABLE `matche`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `gestionfinal`
--
ALTER TABLE `gestionfinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupea`
--
ALTER TABLE `groupea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT pour la table `groupeb`
--
ALTER TABLE `groupeb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT pour la table `matche`
--
ALTER TABLE `matche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classementa`
--
ALTER TABLE `classementa`
  ADD CONSTRAINT `FK_id` FOREIGN KEY (`id`) REFERENCES `equipe` (`id`);

--
-- Contraintes pour la table `classementb`
--
ALTER TABLE `classementb`
  ADD CONSTRAINT `FK_id_CB` FOREIGN KEY (`id`) REFERENCES `equipe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
