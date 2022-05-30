-- --------------------------------------------------------
-- Hostitel:                     localhost
-- Verze serveru:                10.4.20-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win64
-- HeidiSQL Verze:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportování struktury databáze pro
CREATE DATABASE IF NOT EXISTS `eshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `eshop`;

-- Exportování struktury pro tabulka eshop.products
CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `productsName` varchar(50) NOT NULL,
    `productsPrice` float DEFAULT NULL,
    `productAvailable` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Exportování dat pro tabulku eshop.products: ~2 rows (přibližně)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `productsName`, `productsPrice`, `productAvailable`) VALUES
                                                                                       (1, 'Silver Skulls', 0.0024, 1),
                                                                                       (2, 'Candy Pack', 0.012, 1),
                                                                                       (3, 'Child Hood', 0.0015, 0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Exportování struktury pro tabulka eshop.users
CREATE TABLE IF NOT EXISTS `users` (
    `usersId` int(11) NOT NULL AUTO_INCREMENT,
    `usersName` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
    `usersEmail` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
    `usersPwd` varchar(128) COLLATE utf8mb4_czech_ci NOT NULL,
    `usersRole` varchar(50) COLLATE utf8mb4_czech_ci DEFAULT NULL,
    PRIMARY KEY (`usersId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

-- Exportování dat pro tabulku eshop.users: ~3 rows (přibližně)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersPwd`, `usersRole`) VALUES
    (53, 'admin', 'admin@eshop.cz', '$2y$10$wXsOLd6ZFcolBQYGvdlyye.3kETsuOC.k7zkoWfjqwKlSJj3XWL22', 'admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

