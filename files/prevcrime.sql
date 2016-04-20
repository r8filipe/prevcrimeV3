-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for prevcrimeapp
CREATE DATABASE IF NOT EXISTS `prevcrimeapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `prevcrimeapp`;


-- Dumping structure for table prevcrimeapp.auth_sessions
CREATE TABLE IF NOT EXISTS `auth_sessions` (
  `id` varchar(40) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table prevcrimeapp.auth_sessions: 1 rows
DELETE FROM `auth_sessions`;
/*!40000 ALTER TABLE `auth_sessions` DISABLE KEYS */;
INSERT INTO `auth_sessions` (`id`, `user_id`, `login_time`, `modified_at`, `ip_address`, `user_agent`) VALUES
	('2500ceb61958d89f0ba843abd7097de737ce29c6', 293823889, '2016-04-19 01:08:26', '2016-04-19 00:19:07', '::1', 'Chrome 49.0.2623.112 on Windows 10');
/*!40000 ALTER TABLE `auth_sessions` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table prevcrimeapp.categories: ~5 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`, `icon`) VALUES
	(1, 'Acessibilidade', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'acessibilidade'),
	(2, 'Condições Ambientais', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ambiental'),
	(3, 'Controlo e Vigilância', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vigilancia'),
	(4, 'Estrutura de Espaços', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'espacos'),
	(5, 'Visibilidade', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'visibilidade');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table prevcrimeapp.ci_sessions: 0 rows
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.denied_access
CREATE TABLE IF NOT EXISTS `denied_access` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table prevcrimeapp.denied_access: 0 rows
DELETE FROM `denied_access`;
/*!40000 ALTER TABLE `denied_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `denied_access` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category_id` int(10) unsigned NOT NULL,
  `local_type_id` int(10) unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `obs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_sub_category_id_foreign` (`sub_category_id`),
  KEY `events_local_type_id_foreign` (`local_type_id`),
  CONSTRAINT `events_local_type_id_foreign` FOREIGN KEY (`local_type_id`) REFERENCES `local_types` (`id`),
  CONSTRAINT `events_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table prevcrimeapp.events: ~0 rows (approximately)
DELETE FROM `events`;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.ips_on_hold
CREATE TABLE IF NOT EXISTS `ips_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table prevcrimeapp.ips_on_hold: 0 rows
DELETE FROM `ips_on_hold`;
/*!40000 ALTER TABLE `ips_on_hold` DISABLE KEYS */;
/*!40000 ALTER TABLE `ips_on_hold` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.local_types
CREATE TABLE IF NOT EXISTS `local_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table prevcrimeapp.local_types: ~10 rows (approximately)
DELETE FROM `local_types`;
/*!40000 ALTER TABLE `local_types` DISABLE KEYS */;
INSERT INTO `local_types` (`id`, `local`, `created_at`, `updated_at`) VALUES
	(1, 'Quidem non.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(2, 'Explicabo vel.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(3, 'Dolores at.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(4, 'Quia provident.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(5, 'Iure est.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(6, 'Fuga.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(7, 'Ipsum qui.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(8, 'Sit iste.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(9, 'Qui ea.', '2016-04-17 11:35:59', '2016-04-17 11:35:59'),
	(10, 'Quaerat error.', '2016-04-17 11:35:59', '2016-04-17 11:35:59');
/*!40000 ALTER TABLE `local_types` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.login_errors
CREATE TABLE IF NOT EXISTS `login_errors` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table prevcrimeapp.login_errors: 2 rows
DELETE FROM `login_errors`;
/*!40000 ALTER TABLE `login_errors` DISABLE KEYS */;
INSERT INTO `login_errors` (`ai`, `username_or_email`, `ip_address`, `time`) VALUES
	(4, 'r8filipe', '::1', '2016-04-19 14:06:00'),
	(5, 'r8filipe', '::1', '2016-04-19 14:06:10');
/*!40000 ALTER TABLE `login_errors` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.password_reminders
CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table prevcrimeapp.password_reminders: ~0 rows (approximately)
DELETE FROM `password_reminders`;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table prevcrimeapp.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `photos_event_id_foreign` (`event_id`),
  CONSTRAINT `photos_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table prevcrimeapp.photos: ~0 rows (approximately)
DELETE FROM `photos`;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `occurrence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table prevcrimeapp.sub_categories: ~18 rows (approximately)
DELETE FROM `sub_categories`;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` (`id`, `occurrence`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'Estado dos arruamentos', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Estado dos passeios', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Lixo disperso', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Degradação habitaçional', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'Degradação das áreas públicas comuns', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Sinais de Vandalismo/Vandalismo', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'Camaras de Vigilância', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'Patrulhamento', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'Transeuntes', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'Residentes/Moradores', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'Delimitação de passagens pedonais', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 'Areas Espaços de confinamento', 4, '0000-00-00 00:00:00', '2016-04-20 01:14:46'),
	(13, 'Becos sem saída', 4, '2016-04-20 01:16:20', '2016-04-20 01:17:03'),
	(14, 'Iluminacao', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'Barreiras Fisicas', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'Esquinas cegas', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 'Locais cegos', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 'Distribuição de iluminação', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.username_or_email_on_hold
CREATE TABLE IF NOT EXISTS `username_or_email_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table prevcrimeapp.username_or_email_on_hold: 0 rows
DELETE FROM `username_or_email_on_hold`;
/*!40000 ALTER TABLE `username_or_email_on_hold` DISABLE KEYS */;
/*!40000 ALTER TABLE `username_or_email_on_hold` ENABLE KEYS */;


-- Dumping structure for table prevcrimeapp.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) unsigned NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table prevcrimeapp.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
	(293823889, 'henrique', 'henrique@example.com', 9, '0', '$2y$11$QFZxiFpNW560CR3cM6Q0w.92bPf8F/fXJ8.ZYUOlDZ4FCeno4QW3m', NULL, NULL, NULL, '2016-04-19 14:08:53', '2016-04-19 01:08:18', '2016-04-19 13:08:53'),
	(451341239, 'skunkbot', 'skunkbot@example.com', 9, '0', '$2y$11$mL3LErEpEUSseO8syYi1R.bcHJipxZP356mDdFToVA/3vOWgMGndm', NULL, NULL, NULL, '2016-04-17 16:54:51', '2016-04-17 13:49:39', '2016-04-17 15:54:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for trigger prevcrimeapp.ca_passwd_trigger
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `ca_passwd_trigger` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
     IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
         SET NEW.passwd_modified_at = NOW();
     END IF;
 END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
