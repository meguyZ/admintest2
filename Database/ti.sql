-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table nova.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class` enum('member','admin') NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nova.accounts: ~0 rows (approximately)

-- Dumping structure for table nova.download
CREATE TABLE IF NOT EXISTS `download` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `dashboard` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nova.download: ~0 rows (approximately)

-- Dumping structure for table nova.oder
CREATE TABLE IF NOT EXISTS `oder` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `accounts` varchar(50) NOT NULL,
  `product` varchar(200) NOT NULL,
  `settings` varchar(100) NOT NULL,
  `accounts_img` varchar(100) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `settings_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table nova.oder: ~1 rows (approximately)
INSERT INTO `oder` (`id`, `accounts`, `product`, `settings`, `accounts_img`, `product_img`, `settings_img`) VALUES
	(3, 'Accounts', 'Product', 'Settings', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by');

-- Dumping structure for table nova.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `noting` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `image_1` varchar(100) NOT NULL,
  `image_2` varchar(100) NOT NULL,
  `image_3` varchar(100) NOT NULL,
  `github` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `discord` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table nova.settings: ~0 rows (approximately)
INSERT INTO `settings` (`id`, `username`, `noting`, `icon`, `image_1`, `image_2`, `image_3`, `github`, `facebook`, `discord`) VALUES
	(1, 'TI DEVELOPER', 'Welcome', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by', 'https://', 'https://', 'https://');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
