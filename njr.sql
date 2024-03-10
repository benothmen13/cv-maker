-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 03 mars 2024 à 12:37
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `njr`
--

-- --------------------------------------------------------

--
-- Structure de la table `cv1`
--

DROP TABLE IF EXISTS `cv1`;
CREATE TABLE IF NOT EXISTS `cv1` (
  `name` varchar(100) NOT NULL,
  `edu` varchar(500) NOT NULL,
  `work` varchar(500) NOT NULL,
  `skill1` varchar(100) NOT NULL,
  `skill2` varchar(100) NOT NULL,
  `skill3` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cv1`
--

INSERT INTO `cv1` (`name`, `edu`, `work`, `skill1`, `skill2`, `skill3`) VALUES
('chawki', ' :,lii,iyy', 'rtrtrczwrxcry', 'rd', 'cfc', 'esw'),
('fyras', '??L?MK?M', 'ininoin', 'inoinini', 'inoinini', 'inoinini');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `nom` varchar(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom`, `mail`, `password`) VALUES
('mimouni', 'mimouni@gmail.com', 'mimoui'),
('fyras', 'fyras@gmail.com', 'fyras123'),
('kada hamza', 'kada@gmail.com', 'kada123'),
('chawki', 'chawki@gmail.com', 'chawki123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
