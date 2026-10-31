-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           9.1.0 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.22.0.7382
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table prootrecmm. bg_bgg
CREATE TABLE IF NOT EXISTS `bg_bgg` (
  `bgg_id` int unsigned NOT NULL DEFAULT '0',
  `bgg_age` tinyint unsigned DEFAULT '10',
  `bgg_weight` decimal(5,2) DEFAULT NULL,
  `bgg_average_rating` decimal(5,2) DEFAULT NULL,
  `bgg_play_time_min` smallint unsigned DEFAULT NULL,
  `bgg_play_time_max` smallint unsigned DEFAULT NULL,
  PRIMARY KEY (`bgg_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci ROW_FORMAT=DYNAMIC;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_boardgame_has_mechanisms
CREATE TABLE IF NOT EXISTS `bg_boardgame_has_mechanisms` (
  `fk_bg_id` int unsigned NOT NULL DEFAULT '0',
  `fk_mec_id` tinyint unsigned NOT NULL DEFAULT '0',
  KEY `fk_bg_id` (`fk_bg_id`) USING BTREE,
  KEY `fk_mec_id` (`fk_mec_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_boardgames
CREATE TABLE IF NOT EXISTS `bg_boardgames` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_bgg_id` int unsigned NOT NULL DEFAULT '0',
  `slug` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pre_title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `post_title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `year` year NOT NULL,
  `min_players` tinyint unsigned NOT NULL DEFAULT '2',
  `max_players` tinyint unsigned DEFAULT '4',
  `min_age` tinyint unsigned DEFAULT '10',
  `setup_time` smallint unsigned DEFAULT NULL,
  `rules_time` smallint unsigned DEFAULT NULL,
  `play_time_min` smallint unsigned DEFAULT NULL,
  `play_time_max` smallint unsigned DEFAULT NULL,
  `fk_type_id` tinyint unsigned NOT NULL,
  `fk_theme_id` smallint unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bg_boardgames_bg_themes` (`fk_theme_id`),
  KEY `FK_bg_boardgames_bg_types` (`fk_type_id`),
  CONSTRAINT `FK_bg_boardgames_bg_types` FOREIGN KEY (`fk_type_id`) REFERENCES `bg_types` (`typ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_depuncheur
CREATE TABLE IF NOT EXISTS `bg_depuncheur` (
  `dpc_id` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_bg_id` int unsigned NOT NULL,
  `dpc_url` tinytext,
  `dpc_note` tinyint unsigned DEFAULT NULL,
  PRIMARY KEY (`dpc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_gusandco
CREATE TABLE IF NOT EXISTS `bg_gusandco` (
  `gac_id` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_bg_id` int unsigned DEFAULT NULL,
  `gac_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gac_score` float unsigned DEFAULT NULL,
  `gac_ithem` tinyint unsigned DEFAULT NULL COMMENT 'échelle pour mesurer le thème, l’immersion et la narration',
  `gac_igus` tinyint unsigned DEFAULT NULL COMMENT 'échelle de mesure de l’interaction dans les jeux',
  `gac_ecoscore` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`gac_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_mechanisms
CREATE TABLE IF NOT EXISTS `bg_mechanisms` (
  `mec_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `mec_name` tinytext NOT NULL,
  PRIMARY KEY (`mec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_players
CREATE TABLE IF NOT EXISTS `bg_players` (
  `player_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `player_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_plays
CREATE TABLE IF NOT EXISTS `bg_plays` (
  `pla_id` int unsigned NOT NULL AUTO_INCREMENT,
  `fk_bg_id` int unsigned NOT NULL,
  `pla_date` datetime DEFAULT NULL,
  `pla_json_content` json NOT NULL,
  PRIMARY KEY (`pla_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_plays_wttm
CREATE TABLE IF NOT EXISTS `bg_plays_wttm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `time` smallint unsigned DEFAULT NULL,
  `campaignId` smallint unsigned DEFAULT NULL,
  `campaignChapter` smallint unsigned DEFAULT NULL,
  `campaignSave` smallint unsigned DEFAULT NULL,
  `adventureId` smallint unsigned DEFAULT NULL,
  `_player_id` smallint unsigned DEFAULT NULL,
  `_player_score` smallint unsigned DEFAULT NULL,
  `_player_winner` smallint unsigned DEFAULT NULL,
  `_player_stars` smallint unsigned DEFAULT NULL,
  `_player_missions` smallint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_themes
CREATE TABLE IF NOT EXISTS `bg_themes` (
  `the_id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `the_name` tinytext NOT NULL,
  PRIMARY KEY (`the_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_types
CREATE TABLE IF NOT EXISTS `bg_types` (
  `typ_id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `typ_name` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`typ_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table prootrecmm. bg_vindjeu
CREATE TABLE IF NOT EXISTS `bg_vindjeu` (
  `vj_id` int NOT NULL AUTO_INCREMENT,
  `fk_bg_id` int unsigned DEFAULT NULL,
  `vj_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vj_note` float unsigned DEFAULT NULL,
  `vj_categorie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vj_tps_mise_en_place` tinyint unsigned DEFAULT NULL,
  `vj_tps_regles` tinyint unsigned DEFAULT NULL,
  `vj_tps_partie` smallint unsigned DEFAULT NULL,
  `vj_tps_joueur` tinyint unsigned DEFAULT NULL,
  `vj_meilleur_score` smallint unsigned DEFAULT NULL,
  PRIMARY KEY (`vj_id`) USING BTREE,
  KEY `FK_bg_vindjeu_bg_boardgames` (`fk_bg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Les données exportées n'étaient pas sélectionnées.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
