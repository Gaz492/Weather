-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.13-0ubuntu0.16.04.2 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for weather
CREATE DATABASE IF NOT EXISTS `weather` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `weather`;


-- Dumping structure for table weather.cust_weatherOther
CREATE TABLE IF NOT EXISTS `cust_weatherOther` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `baro` varchar(50) DEFAULT '0',
  `forecast` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index 2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table weather.cust_weatherTemp
CREATE TABLE IF NOT EXISTS `cust_weatherTemp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temp` decimal(4,1) DEFAULT '0.0',
  `humid` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
