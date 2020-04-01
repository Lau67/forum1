-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `forum`;

-- Listage de la structure de la table forum. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `texte` varchar(500) COLLATE utf8_bin NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_visiteur` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_visiteur` (`id_visiteur`),
  KEY `id_sujet` (`id_sujet`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_visiteur`) REFERENCES `visiteur` (`id_visiteur`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forum.message : ~2 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `texte`, `date_creation`, `id_visiteur`, `id_sujet`) VALUES
	(1, 'aussi vite que la musique il faut aller.', '2020-03-30 14:08:13', 1, 1),
	(2, 'La musique apèse le mental. Il faut savoir écouter...', '2020-03-30 14:09:14', 1, 1);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table forum. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_creation` datetime NOT NULL,
  `verrouillage` tinyint(1) DEFAULT NULL,
  `id_visiteur` int(11) NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `id_visiteur` (`id_visiteur`),
  CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`id_visiteur`) REFERENCES `visiteur` (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forum.sujet : ~2 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `titre`, `date_creation`, `verrouillage`, `id_visiteur`) VALUES
	(1, 'La musique', '2020-03-30 14:06:33', NULL, 1),
	(2, 'La peinture', '2020-03-30 14:07:16', NULL, 1);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Listage de la structure de la table forum. visiteur
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id_visiteur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresse_mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `mot_de_passe` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_inscription` datetime NOT NULL,
  `role` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_visiteur`),
  UNIQUE KEY `pseudonyme` (`pseudonyme`),
  UNIQUE KEY `mot_de_passe` (`mot_de_passe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forum.visiteur : ~1 rows (environ)
/*!40000 ALTER TABLE `visiteur` DISABLE KEYS */;
INSERT INTO `visiteur` (`id_visiteur`, `pseudonyme`, `adresse_mail`, `mot_de_passe`, `date_inscription`, `role`) VALUES
	(1, 'toto', 'toto67@gmail.com', '1234567Az', '2020-03-30 14:05:34', 'user');
/*!40000 ALTER TABLE `visiteur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
