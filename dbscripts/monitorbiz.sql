-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for monitorbiz
CREATE DATABASE IF NOT EXISTS `monitorbiz` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `monitorbiz`;

-- Dumping structure for table monitorbiz.search_engines
CREATE TABLE IF NOT EXISTS `search_engines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `search_engine_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'This is the ID from the  API',
  `regoin_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  KEY `Index 1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The list of search engines';

-- Dumping data for table monitorbiz.search_engines: ~0 rows (approximately)
DELETE FROM `search_engines`;
/*!40000 ALTER TABLE `search_engines` DISABLE KEYS */;
/*!40000 ALTER TABLE `search_engines` ENABLE KEYS */;

-- Dumping structure for table monitorbiz.search_engine_region
CREATE TABLE IF NOT EXISTS `search_engine_region` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `search_engine_id` int(11) unsigned NOT NULL DEFAULT '0',
  `region_id` int(11) NOT NULL COMMENT 'This is the ID from the API',
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  KEY `Index 1` (`id`),
  KEY `FK_search_engine_region_search_engines` (`search_engine_id`),
  CONSTRAINT `FK_search_engine_region_search_engines` FOREIGN KEY (`search_engine_id`) REFERENCES `search_engines` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='For each  search engine there is none or many regoins';

-- Dumping data for table monitorbiz.search_engine_region: ~0 rows (approximately)
DELETE FROM `search_engine_region`;
/*!40000 ALTER TABLE `search_engine_region` DISABLE KEYS */;
/*!40000 ALTER TABLE `search_engine_region` ENABLE KEYS */;

-- Dumping structure for table monitorbiz.sites
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `site_group_id` int(11) unsigned DEFAULT '1',
  `name` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `today_avg_position` int(11) unsigned DEFAULT NULL,
  `yesterday_avg_position` int(11) unsigned DEFAULT NULL,
  `total_up` int(11) unsigned DEFAULT NULL,
  `total_down` int(11) unsigned DEFAULT NULL,
  `keys_count` int(11) unsigned DEFAULT NULL,
  `process` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The list of sites';

-- Dumping data for table monitorbiz.sites: ~0 rows (approximately)
DELETE FROM `sites`;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;

-- Dumping structure for table monitorbiz.site_search_engines
CREATE TABLE IF NOT EXISTS `site_search_engines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) unsigned NOT NULL,
  `search_engine_id` int(11) unsigned NOT NULL,
  `se_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `region_name` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_code` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `Index 1` (`id`),
  KEY `FK_site_search_engines_sites` (`site_id`),
  KEY `FK_site_search_engines_search_engines` (`search_engine_id`),
  CONSTRAINT `FK_site_search_engines_search_engines` FOREIGN KEY (`search_engine_id`) REFERENCES `search_engines` (`id`),
  CONSTRAINT `FK_site_search_engines_sites` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='This table means the for each sites it is attached to one or more search engines';

-- Dumping data for table monitorbiz.site_search_engines: ~0 rows (approximately)
DELETE FROM `site_search_engines`;
/*!40000 ALTER TABLE `site_search_engines` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_search_engines` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
