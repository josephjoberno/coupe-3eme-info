-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2021 at 07:06 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `football`
--
CREATE DATABASE footballV1;
USE FOOTBALLV1;

-- --------------------------------------------------------

--
-- Table structure for table `ClassementA`
--

CREATE TABLE `ClassementA` (
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
-- Dumping data for table `ClassementA`
--

INSERT INTO `ClassementA` (`id`, `nomEquipe`, `matchJouer`, `matchGagner`, `matchPerdu`, `matchNull`, `butPour`, `butContre`, `difference`, `point`) VALUES
(1, 'Bresil', 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Italie', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Portugal', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Espagne', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ClassementB`
--

CREATE TABLE `ClassementB` (
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
-- Dumping data for table `ClassementB`
--

INSERT INTO `ClassementB` (`id`, `nomEquipe`, `matchJouer`, `matchGagner`, `matchPerdu`, `matchNull`, `butPour`, `butContre`, `difference`, `point`) VALUES
(2, 'Argentine', 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Allemagne', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'France', 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Haiti', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
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
-- Dumping data for table `equipe`
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
-- Table structure for table `GroupeA`
--

CREATE TABLE `GroupeA` (
  `id` int(11) NOT NULL,
  `teteDeSerieA1` varchar(25) NOT NULL,
  `teteDeSerieA2` varchar(25) NOT NULL,
  `teteDeSerieA3` varchar(25) NOT NULL,
  `teteDeSerieA4` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GroupeA`
--

INSERT INTO `GroupeA` (`id`, `teteDeSerieA1`, `teteDeSerieA2`, `teteDeSerieA3`, `teteDeSerieA4`) VALUES
(228, 'Bresil', 'Italie', 'Espagne', 'Portugal');

-- --------------------------------------------------------

--
-- Table structure for table `GroupeB`
--

CREATE TABLE `GroupeB` (
  `id` int(11) NOT NULL,
  `teteDeSerieB1` varchar(25) NOT NULL,
  `teteDeSerieB2` varchar(25) NOT NULL,
  `teteDeSerieB3` varchar(25) NOT NULL,
  `teteDeSerieB4` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GroupeB`
--

INSERT INTO `GroupeB` (`id`, `teteDeSerieB1`, `teteDeSerieB2`, `teteDeSerieB3`, `teteDeSerieB4`) VALUES
(221, 'Argentine', 'France', 'Allemagne', 'Haiti');

-- --------------------------------------------------------

--
-- Table structure for table `MatchE`
--

CREATE TABLE `MatchE` (
  `id` int(11) NOT NULL,
  `matchEQ` varchar(25) NOT NULL,
  `equipe1` int(11) NOT NULL,
  `equipe2` int(11) NOT NULL,
  `EGagner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MatchE`
--

INSERT INTO `MatchE` (`id`, `matchEQ`, `equipe1`, `equipe2`, `EGagner`) VALUES
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ClassementA`
--
ALTER TABLE `ClassementA`
  ADD KEY `FK_id` (`id`);

--
-- Indexes for table `ClassementB`
--
ALTER TABLE `ClassementB`
  ADD KEY `FK_id_CB` (`id`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `GroupeA`
--
ALTER TABLE `GroupeA`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `GroupeB`
--
ALTER TABLE `GroupeB`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MatchE`
--
ALTER TABLE `MatchE`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `GroupeA`
--
ALTER TABLE `GroupeA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `GroupeB`
--
ALTER TABLE `GroupeB`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `MatchE`
--
ALTER TABLE `MatchE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ClassementA`
--
ALTER TABLE `ClassementA`
  ADD CONSTRAINT `FK_id` FOREIGN KEY (`id`) REFERENCES `equipe` (`id`);

--
-- Constraints for table `ClassementB`
--
ALTER TABLE `ClassementB`
  ADD CONSTRAINT `FK_id_CB` FOREIGN KEY (`id`) REFERENCES `equipe` (`id`);
