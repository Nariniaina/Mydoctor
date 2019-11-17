-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 sep. 2019 à 11:32
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
-- Base de données :  `mydoctor`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_consultation`
--

DROP TABLE IF EXISTS `a_consultation`;
CREATE TABLE IF NOT EXISTS `a_consultation` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `sym_id` int(11) DEFAULT NULL,
  `mal_id` int(11) DEFAULT NULL,
  `con_date` datetime DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL,
  `con_temp` float NOT NULL,
  `con_tension` float NOT NULL,
  `con_poids` int(11) NOT NULL,
  `con_taille` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `pat_id` (`pat_id`),
  KEY `mal_id` (`mal_id`),
  KEY `sym_id` (`sym_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_diplome`
--

DROP TABLE IF EXISTS `t_diplome`;
CREATE TABLE IF NOT EXISTS `t_diplome` (
  `dip_id` int(11) NOT NULL AUTO_INCREMENT,
  `dip_nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`dip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_diplome`
--

INSERT INTO `t_diplome` (`dip_id`, `dip_nom`) VALUES
(1, 'Generale Ankatso'),
(2, 'Chirurgiue institut'),
(3, 'Institut');

-- --------------------------------------------------------

--
-- Structure de la table `t_docteur`
--

DROP TABLE IF EXISTS `t_docteur`;
CREATE TABLE IF NOT EXISTS `t_docteur` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_nom` varchar(30) DEFAULT NULL,
  `doc_prenom` varchar(30) DEFAULT NULL,
  `doc_ddn` date DEFAULT NULL,
  `doc_email` varchar(40) NOT NULL,
  `dip_id` int(11) DEFAULT NULL,
  `sexe_id` int(11) DEFAULT NULL,
  `doc_adresse` varchar(40) DEFAULT NULL,
  `doc_num` varchar(9) NOT NULL,
  `spec_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `doc_specialite` (`spec_id`),
  KEY `doc_sexe` (`sexe_id`),
  KEY `doc_diplome` (`dip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_docteur`
--

INSERT INTO `t_docteur` (`doc_id`, `doc_nom`, `doc_prenom`, `doc_ddn`, `doc_email`, `dip_id`, `sexe_id`, `doc_adresse`, `doc_num`, `spec_id`) VALUES
(1, 'RAMAROSON', 'Mandravarainy', '1983-02-02', 'Mandrava123@gmail.com', 1, 1, 'Ankatso, Sud', '321231231', 1),
(2, 'MIGADRA', 'Mirana', '1978-02-08', 'mig12@gmail.com', 2, 2, 'Anbtata 106', '331231231', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_maladie`
--

DROP TABLE IF EXISTS `t_maladie`;
CREATE TABLE IF NOT EXISTS `t_maladie` (
  `mal_id` int(11) NOT NULL AUTO_INCREMENT,
  `mal_nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`mal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_maladie`
--

INSERT INTO `t_maladie` (`mal_id`, `mal_nom`) VALUES
(1, 'Grippe'),
(2, 'Mal de gorge'),
(3, 'Indigestion'),
(4, 'Fievre'),
(5, 'AVC');

-- --------------------------------------------------------

--
-- Structure de la table `t_patient`
--

DROP TABLE IF EXISTS `t_patient`;
CREATE TABLE IF NOT EXISTS `t_patient` (
  `pat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_nom` varchar(30) DEFAULT NULL,
  `pat_prenom` varchar(30) DEFAULT NULL,
  `pat_ddn` date DEFAULT NULL,
  `sexe_id` int(1) DEFAULT NULL,
  `pat_inscription` date DEFAULT NULL,
  `pat_email` varchar(40) DEFAULT NULL,
  `pat_numero` varchar(9) DEFAULT NULL,
  `pat_poids` int(11) DEFAULT NULL,
  `pat_taille` int(11) DEFAULT NULL,
  `pat_tension` float DEFAULT NULL,
  `pat_adresse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pat_id`),
  KEY `sexe_id` (`sexe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_patient`
--

INSERT INTO `t_patient` (`pat_id`, `pat_nom`, `pat_prenom`, `pat_ddn`, `sexe_id`, `pat_inscription`, `pat_email`, `pat_numero`, `pat_poids`, `pat_taille`, `pat_tension`, `pat_adresse`) VALUES
(1, 'RAMANANTSALAMA', 'Nariniaina', '1994-07-14', 1, '2019-09-10', 'nariniaina.ramanantsalama@esti.mg', '341232131', 57, 157, 13.3, 'Lot 176 Talatamaty'),
(2, 'RAFARAMALALA', 'armana', '1997-02-05', 2, '2019-09-10', 'rafara@gmail.com', '321231231', 0, 0, 0, 'Ambatonakanga'),
(3, 'RAZAFITSARA', 'Sly', '1992-09-05', 1, '2019-09-10', 'razafitsaraslykers@gmail.com', '342321323', 0, 0, 0, 'ANTSAHAVOLA'),
(4, 'RASOLO', 'Marina', '1994-07-15', 1, '2019-09-10', 'rasolo@gmail.com', '341212121', 61, 180, 0, 'Ambodinakanga 123 lot');

-- --------------------------------------------------------

--
-- Structure de la table `t_sexe`
--

DROP TABLE IF EXISTS `t_sexe`;
CREATE TABLE IF NOT EXISTS `t_sexe` (
  `sexe_id` int(11) NOT NULL AUTO_INCREMENT,
  `sexe_nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sexe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_sexe`
--

INSERT INTO `t_sexe` (`sexe_id`, `sexe_nom`) VALUES
(1, 'Homme'),
(2, 'Femme'),
(3, 'Intermediaire');

-- --------------------------------------------------------

--
-- Structure de la table `t_specialite`
--

DROP TABLE IF EXISTS `t_specialite`;
CREATE TABLE IF NOT EXISTS `t_specialite` (
  `spec_id` int(11) NOT NULL AUTO_INCREMENT,
  `spec_nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`spec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_specialite`
--

INSERT INTO `t_specialite` (`spec_id`, `spec_nom`) VALUES
(1, 'Generale'),
(2, 'Cardiologie'),
(3, 'neurologie'),
(4, 'Veine');

-- --------------------------------------------------------

--
-- Structure de la table `t_symptome`
--

DROP TABLE IF EXISTS `t_symptome`;
CREATE TABLE IF NOT EXISTS `t_symptome` (
  `sym_id` int(11) NOT NULL AUTO_INCREMENT,
  `sym_nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sym_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_symptome`
--

INSERT INTO `t_symptome` (`sym_id`, `sym_nom`) VALUES
(1, 'maux de tete'),
(2, 'toux gras');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_name`, `user_password`, `user_date`) VALUES
(1, 'nary', 'uiop', '2019-04-04 09:09:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `a_consultation`
--
ALTER TABLE `a_consultation`
  ADD CONSTRAINT `a_consultation_ibfk_1` FOREIGN KEY (`sym_id`) REFERENCES `t_symptome` (`sym_id`),
  ADD CONSTRAINT `a_consultation_ibfk_3` FOREIGN KEY (`mal_id`) REFERENCES `t_maladie` (`mal_id`),
  ADD CONSTRAINT `a_consultation_ibfk_4` FOREIGN KEY (`pat_id`) REFERENCES `t_patient` (`pat_id`),
  ADD CONSTRAINT `a_consultation_ibfk_5` FOREIGN KEY (`user_name`) REFERENCES `t_user` (`user_name`);

--
-- Contraintes pour la table `t_docteur`
--
ALTER TABLE `t_docteur`
  ADD CONSTRAINT `t_docteur_ibfk_1` FOREIGN KEY (`spec_id`) REFERENCES `t_specialite` (`spec_id`),
  ADD CONSTRAINT `t_docteur_ibfk_2` FOREIGN KEY (`dip_id`) REFERENCES `t_diplome` (`dip_id`),
  ADD CONSTRAINT `t_docteur_ibfk_3` FOREIGN KEY (`sexe_id`) REFERENCES `t_sexe` (`sexe_id`);

--
-- Contraintes pour la table `t_patient`
--
ALTER TABLE `t_patient`
  ADD CONSTRAINT `t_patient_ibfk_1` FOREIGN KEY (`sexe_id`) REFERENCES `t_sexe` (`sexe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
