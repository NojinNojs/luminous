-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for luminous_db
CREATE DATABASE IF NOT EXISTS `luminous_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `luminous_db`;

-- Dumping structure for table luminous_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `sold_count` int DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `featured` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table luminous_db.products: ~0 rows (approximately)
INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount_price`, `image`, `thumbnail`, `rating`, `sold_count`, `location`, `category_id`, `featured`, `created_at`) VALUES
	(5, 'JHT Alat Pembuka Drat Kran Pipa 1/2"-3/4"', 'Pembuka Drat Pipa Rusak 1/2-3/4 INCH', 18500.00, 29888.00, NULL, 'product1.jpg', 4.9, 3000, 'Jakarta Barat', 1, 1, '2024-06-19 10:34:00'),
	(6, 'Alat Pemotong Pipa', 'Alat pemotong pipa yang kuat dan tahan lama', 45000.00, NULL, NULL, 'product2.jpg', 4.7, 1500, 'Bandung', 1, 1, '2024-06-19 10:34:00'),
	(7, 'Kunci Inggris Multifungsi', 'Kunci Inggris multifungsi dengan pegangan nyaman', 75000.00, 69000.00, NULL, 'product3.jpg', 4.8, 500, 'Surabaya', 2, 1, '2024-06-19 10:34:00'),
	(8, 'JHT Alat Pembuka Drat Kran Pipa 1/2"-3/4"', 'Pembuka Drat Pipa Rusak 1/2-3/4 INCH', 18500.00, 29888.00, NULL, 'product1.jpg', 4.9, 3000, 'Jakarta Barat', 1, 1, '2024-06-19 14:48:20'),
	(9, 'Alat Pemotong Pipa', 'Alat pemotong pipa yang kuat dan tahan lama', 45000.00, NULL, NULL, 'product2.jpg', 4.7, 1500, 'Bandung', 1, 1, '2024-06-19 14:48:20'),
	(10, 'Kunci Inggris Multifungsi', 'Kunci Inggris multifungsi dengan pegangan nyaman', 75000.00, 69000.00, NULL, 'product3.jpg', 4.8, 500, 'Surabaya', 2, 1, '2024-06-19 14:48:20'),
	(11, 'JHT Alat Pembuka Drat Kran Pipa 1/2"-3/4"', 'Pembuka Drat Pipa Rusak 1/2-3/4 INCH', 18500.00, 29888.00, NULL, 'product1.jpg', 4.9, 3000, 'Jakarta Barat', 1, 1, '2024-06-19 14:48:26'),
	(12, 'Alat Pemotong Pipa', 'Alat pemotong pipa yang kuat dan tahan lama', 45000.00, NULL, NULL, 'product2.jpg', 4.7, 1500, 'Bandung', 1, 1, '2024-06-19 14:48:26'),
	(13, 'Kunci Inggris Multifungsi', 'Kunci Inggris multifungsi dengan pegangan nyaman', 75000.00, 69000.00, NULL, 'product3.jpg', 4.8, 500, 'Surabaya', 2, 1, '2024-06-19 14:48:26'),
	(14, 'JHT Alat Pembuka Drat Kran Pipa 1/2"-3/4"', 'Pembuka Drat Pipa Rusak 1/2-3/4 INCH', 18500.00, 29888.00, NULL, 'product1.jpg', 4.9, 3000, 'Jakarta Barat', 1, 1, '2024-06-19 14:48:31'),
	(15, 'Alat Pemotong Pipa', 'Alat pemotong pipa yang kuat dan tahan lama', 45000.00, NULL, NULL, 'product2.jpg', 4.7, 1500, 'Bandung', 1, 1, '2024-06-19 14:48:31'),
	(16, 'Kunci Inggris Multifungsi', 'Kunci Inggris multifungsi dengan pegangan nyaman', 75000.00, 69000.00, NULL, 'product3.jpg', 4.8, 500, 'Surabaya', 2, 1, '2024-06-19 14:48:31');

-- Dumping structure for table luminous_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `token_expiry` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table luminous_db.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `email`, `password`, `verified`, `token`, `created_at`, `token_expiry`) VALUES
	(1, 'nojsnojin@gmail.com', '$2y$10$96UEx98MjJ2F7b6T5t7nA.2S3fPWr/6MDrKE.2Vm77XeVXa6Gwydy', 0, 'ee93fd6a537e9b3661315c9186a0c9c2edb7ea145c626928cd4ca883d6ac393392f936256204db0fc2324facf79563c120d3', '2024-06-19 16:34:57', '2024-06-20 16:34:57'),
	(2, 'nojsnojin@gmail.com', '$2y$10$Ej0BTSLU7klUCkjH4Xa1AeoP8Uz0Mxc3ocd79wSfhf.NRzY5.DRtS', 0, 'b37ed1607a99ddbb911fce7ad2aa3ad51418b48e2ae1fd92ac826f691d86055ac90539141a6d65b0398988e7b96633a5c0ec', '2024-06-19 16:36:19', '2024-06-20 16:36:19'),
	(3, 'nojsnojin@gmail.com', '$2y$10$.o5CbB6WL55oCHO5qhovFu36wb1yq.sumlzfT5zn.xLEkb0uUPsv6', 0, '70a95d876492bb9bd4a2d7554d30280fcd2704db0d1eddecd433607b611626aa1218f326f2cc7c781bad206934f1b33e2d92', '2024-06-19 16:40:37', '2024-06-20 16:40:37'),
	(4, 'nojsnojin@gmail.com', '$2y$10$XuI6WVdizm6ZUuVsZINF3uKgp4DeZTanVxupXatJU0PRXKrI6Vbdy', 0, '2f9df6d6c4322d48c593b693de49bd8d68609e4dac309eb2f3676b624e8cfa250769892e382d27d251b5fef8a24d5f2f88bd', '2024-06-19 16:44:58', '2024-06-20 16:44:58'),
	(5, 'muhammadraffiaqsan@gmail.com', '$2y$10$N4QdYcxNAm7v.kYtO/.63usIL/zivw/hja1J6Ld2oKOOF8yTVRfJa', 0, '20da09174b113e40f4d3507af6b9035b41036979429de02fb9949d444e4f3fbdb718667b289dce8e173de17d7e4a7fc40cdd', '2024-06-19 16:48:29', '2024-06-20 16:48:29'),
	(6, 'muhammadraffiaqsan@gmail.com', '$2y$10$dyW8sgay8DKp70rdzzred.QwTkYu7O/0jJcXFkI7McX7XsIBUNsyu', 0, '2cecf2c9d79da47d656c4837f2a3ba4309e0ce7201e895d1b3ac50321c38ea91e395e520f46b66cbcbd98f929e68be0f92a2', '2024-06-19 16:49:33', '2024-06-20 16:49:33'),
	(7, 'muhammadraffiaqsan@gmail.com', '$2y$10$xUZ0ftJPcUidjWBehJ0ux.OhB1Sutel9r664HAt5kiuWLOwEyVqeW', 0, '97c8bfa4de410774c10bb25b9a2a7a9d5d399351f98a4da684b1780814aa831b2c31a06121c2ffa2245d0e9532898665b25a', '2024-06-19 16:53:40', '2024-06-20 16:53:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
