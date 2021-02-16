-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 fév. 2021 à 06:58
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location_voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `ID_AGENCE` int(11) NOT NULL,
  `NOM_AGENCE` varchar(100) DEFAULT NULL,
  `ADDRESS_AGENCE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`ID_AGENCE`, `NOM_AGENCE`, `ADDRESS_AGENCE`) VALUES
(1, 'ag1', 'ad1'),
(2, 'ag2', 'ad2'),
(3, 'agence 3', 'addresse 3');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `NUM_CL` int(11) NOT NULL,
  `NOM_CL` varchar(100) DEFAULT NULL,
  `ADD_CL` varchar(100) DEFAULT NULL,
  `TYPE_CL` enum('ent','part') DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`NUM_CL`, `NOM_CL`, `ADD_CL`, `TYPE_CL`, `username`, `email`, `password`) VALUES
(1, 'cl1', 'add1', 'ent', '', '', 'ali'),
(2, 'cl2', 'add2', 'ent', '', '', 'ali'),
(3, 'ali', 'ali', 'part', 'ali', 'ali', '86318e52f5ed4801abe1d13d509443de'),
(4, NULL, NULL, NULL, 'ali2', 'boudjema.ali94@gmail.com', '86318e52f5ed4801abe1d13d509443de'),
(5, NULL, NULL, 'ent', 'sundas', 'sundas.sund@gmail.com', '86318e52f5ed4801abe1d13d509443de');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `NUM_EMP` decimal(8,0) NOT NULL,
  `ID_AGENCE` int(11) NOT NULL,
  `NOM_EMP` varchar(100) DEFAULT NULL,
  `ADDR_EMP` varchar(100) DEFAULT NULL,
  `DATE_EM` date DEFAULT NULL,
  `TYPE_EMP` enum('resp','com','mec') DEFAULT NULL,
  `username` varchar(23) NOT NULL,
  `password` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`NUM_EMP`, `ID_AGENCE`, `NOM_EMP`, `ADDR_EMP`, `DATE_EM`, `TYPE_EMP`, `username`, `password`) VALUES
('111', 1, 'qa', 'aa', '2020-12-14', 'resp', 'ali', '86318e52f5ed4801abe1d13d509443de'),
('333', 2, 'aaa', 'aaa', '2020-12-01', 'resp', 'ab', '86318e52f5ed4801abe1d13d509443de');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_loc` int(11) NOT NULL,
  `date_loc` date NOT NULL,
  `date_fin_loc` date NOT NULL,
  `kelo` double DEFAULT NULL,
  `ID_AGENCE1` int(11) NOT NULL,
  `ID_AGENCE2` int(11) DEFAULT NULL,
  `NUM_CL` int(11) NOT NULL,
  `MATRICULE` varchar(100) NOT NULL,
  `valider` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 pas encore traite ;\r\n1 : refuser \r\n2 : accepter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id_loc`, `date_loc`, `date_fin_loc`, `kelo`, `ID_AGENCE1`, `ID_AGENCE2`, `NUM_CL`, `MATRICULE`, `valider`) VALUES
(1, '2021-02-01', '2021-02-09', 33, 1, 2, 3, 'mat1', 2),
(3, '2021-02-03', '0000-00-00', 1, 1, 1, 3, 'mat2', 1),
(4, '2021-02-01', '2021-02-23', NULL, 1, 3, 4, 'mat1', 1),
(5, '0000-00-00', '0000-00-00', NULL, 1, NULL, 3, 'mat2', 0),
(6, '0000-00-00', '0000-00-00', NULL, 1, NULL, 3, 'mat2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `particulier`
--

CREATE TABLE `particulier` (
  `MATRICULE` varchar(20) DEFAULT NULL,
  `id_par` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `particulier`
--

INSERT INTO `particulier` (`MATRICULE`, `id_par`) VALUES
('azZZZZZ33', 5),
('azZZZZZéé', 4),
('kpokpo', 6),
('mat2', 1),
('mat3', 2),
('mat3', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilitaire`
--

CREATE TABLE `utilitaire` (
  `MATRICULE` varchar(20) DEFAULT NULL,
  `CAPACITE` decimal(10,0) DEFAULT NULL,
  `charGE_MAX` decimal(10,0) NOT NULL,
  `id_ut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilitaire`
--

INSERT INTO `utilitaire` (`MATRICULE`, `CAPACITE`, `charGE_MAX`, `id_ut`) VALUES
('mat1', '12', '3', 1),
('mat2', '12', '3', 2),
('mat3', '3', '2', 3),
('mat1', '12', '3', 4),
('mat1', '23', '23', 5),
('azZZZZZ', '1', '1', 6);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `ID_AGENCE` int(11) NOT NULL,
  `MATRICULE` varchar(20) NOT NULL,
  `DATE_D_ACAHT` date DEFAULT NULL,
  `KELOMETRAGE` decimal(10,0) DEFAULT NULL,
  `model` varchar(34) NOT NULL DEFAULT 'ibiza',
  `marque` varchar(34) NOT NULL DEFAULT 'renault',
  `img` text NOT NULL DEFAULT 'audi.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`ID_AGENCE`, `MATRICULE`, `DATE_D_ACAHT`, `KELOMETRAGE`, `model`, `marque`, `img`) VALUES

(1, 'mat1', '2020-12-01', '1000', 'ibiza', 'renault', 'audi.jpg'),
(1, 'mat2', '2020-12-29', '1000', 'clio', 'renault', 'range2.jpg'),
(1, 'mat3', '2020-12-01', '1233', 'ibiza', 'renault', 'range.jpg'),
(2, 'mat5', NULL, NULL, 'ibiza', 'renault', 'audi.jpg'),
(2, 'mat6', NULL, NULL, 'ibiza', 'renault', 'audi.jpg'),
(2, 'mat7', NULL, NULL, 'ibiza', 'renault', 'audi.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`ID_AGENCE`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`NUM_CL`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`NUM_EMP`),
  ADD KEY `FK_APPARTENIR` (`ID_AGENCE`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_loc`),
  ADD KEY `ID_AGENCE2` (`ID_AGENCE2`),
  ADD KEY `NUM_CL` (`NUM_CL`),
  ADD KEY `MATRICULE` (`MATRICULE`),
  ADD KEY `ID_AGENCE1` (`ID_AGENCE1`);

--
-- Index pour la table `particulier`
--
ALTER TABLE `particulier`
  ADD PRIMARY KEY (`id_par`),
  ADD KEY `MATRICULE` (`MATRICULE`);

--
-- Index pour la table `utilitaire`
--
ALTER TABLE `utilitaire`
  ADD PRIMARY KEY (`id_ut`),
  ADD KEY `MATRICULE` (`MATRICULE`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`MATRICULE`),
  ADD KEY `AK_MATRICULE` (`MATRICULE`),
  ADD KEY `FK_FOURNIR` (`ID_AGENCE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `ID_AGENCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `NUM_CL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id_loc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `particulier`
--
ALTER TABLE `particulier`
  MODIFY `id_par` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilitaire`
--
ALTER TABLE `utilitaire`
  MODIFY `id_ut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_APPARTENIR` FOREIGN KEY (`ID_AGENCE`) REFERENCES `agence` (`ID_AGENCE`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`ID_AGENCE2`) REFERENCES `agence` (`ID_AGENCE`),
  ADD CONSTRAINT `location_ibfk_3` FOREIGN KEY (`NUM_CL`) REFERENCES `clients` (`NUM_CL`),
  ADD CONSTRAINT `location_ibfk_4` FOREIGN KEY (`MATRICULE`) REFERENCES `voiture` (`MATRICULE`),
  ADD CONSTRAINT `location_ibfk_5` FOREIGN KEY (`ID_AGENCE1`) REFERENCES `agence` (`ID_AGENCE`);

--
-- Contraintes pour la table `particulier`
--
ALTER TABLE `particulier`
  ADD CONSTRAINT `particulier_ibfk_1` FOREIGN KEY (`MATRICULE`) REFERENCES `voiture` (`MATRICULE`);

--
-- Contraintes pour la table `utilitaire`
--
ALTER TABLE `utilitaire`
  ADD CONSTRAINT `utilitaire_ibfk_1` FOREIGN KEY (`MATRICULE`) REFERENCES `voiture` (`MATRICULE`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `FK_FOURNIR` FOREIGN KEY (`ID_AGENCE`) REFERENCES `agence` (`ID_AGENCE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
