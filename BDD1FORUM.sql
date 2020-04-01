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

-- Listage des données de la table forum.message : ~0 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `texte`, `date_creation`, `id_visiteur`, `id_sujet`) VALUES
	(1, 'aussi vite que la musique il faut aller.', '2020-03-30 14:08:13', 1, 1),
	(2, 'La musique apèse le mental. Il faut savoir écouter...', '2020-03-30 14:09:14', 1, 1);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage des données de la table forum.sujet : ~0 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `titre`, `date_creation`, `verrouillage`, `id_visiteur`) VALUES
	(1, 'La musique', '2020-03-30 14:06:33', NULL, 1),
	(2, 'La peinture', '2020-03-30 14:07:16', NULL, 1);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Listage des données de la table forum.visiteur : ~0 rows (environ)
/*!40000 ALTER TABLE `visiteur` DISABLE KEYS */;
INSERT INTO `visiteur` (`id_visiteur`, `pseudonyme`, `adresse_mail`, `mot_de_passe`, `date_inscription`, `role`) VALUES
	(1, 'toto', 'toto67@gmail.com', '1234567Az', '2020-03-30 14:05:34', 'user');
/*!40000 ALTER TABLE `visiteur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
