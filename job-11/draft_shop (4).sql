-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 jan. 2024 à 13:16
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `draft_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Vêtements', 'Tous types de vêtements', '2024-01-08 15:29:21', '2024-01-08 15:29:21'),
(2, 'Vinyles', 'Collection de vinyles musicaux', '2024-01-08 15:29:21', '2024-01-08 15:29:21');

-- --------------------------------------------------------

--
-- Structure de la table `clothing`
--

DROP TABLE IF EXISTS `clothing`;
CREATE TABLE IF NOT EXISTS `clothing` (
  `product_id` int NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `material_fee` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clothing`
--

INSERT INTO `clothing` (`product_id`, `size`, `color`, `type`, `material_fee`) VALUES
(36, 'M', 'Blue', 'T-Shirt', 5);

-- --------------------------------------------------------

--
-- Structure de la table `electronic`
--

DROP TABLE IF EXISTS `electronic`;
CREATE TABLE IF NOT EXISTS `electronic` (
  `product_id` int NOT NULL,
  `brand` varchar(100) NOT NULL,
  `warranty_fee` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `category_id` int DEFAULT NULL,
  `photos` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `quantity`, `created_at`, `updated_at`, `category_id`, `photos`) VALUES
(1, 'T-Shirt Noir', 'T-Shirt noir basique', '19.99', 100, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(2, 'T-Shirt Blanc', 'T-Shirt blanc en coton', '18.99', 120, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(3, 'Jean Bleu', 'Jean bleu classique', '49.99', 80, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(4, 'Casquette', 'Casquette en toile', '15.99', 50, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(5, 'Robe d\'été', 'Robe légère pour l\'été', '29.99', 70, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(6, 'Chemise en lin', 'Chemise en lin légère', '35.99', 60, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(7, 'Nom Modifié', 'Pull chaud pour l\'hiver', '200.00', 40, '2024-01-08 15:30:00', '2024-01-10 10:49:54', 1, '[]'),
(8, 'Veste en cuir', 'Veste en cuir style motard', '89.99', 30, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(9, 'Chaussettes en coton', 'Pack de 5 chaussettes en coton', '9.99', 150, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(10, 'Bonnet en laine', 'Bonnet en laine pour l\'hiver', '12.99', 60, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 1, NULL),
(11, 'Vinyle The Beatles', 'Album Abbey Road des Beatles', '29.99', 40, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(12, 'Vinyle Pink Floyd', 'Album Dark Side of the Moon', '27.99', 35, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(13, 'Vinyle Michael Jackson', 'Album Thriller', '25.99', 45, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(14, 'Vinyle Queen', 'Greatest Hits de Queen', '24.99', 50, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(15, 'Vinyle Bob Dylan', 'Best of Bob Dylan', '22.99', 30, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(16, 'Vinyle Led Zeppelin', 'Led Zeppelin IV', '28.99', 40, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(17, 'Vinyle Nirvana', 'Nevermind de Nirvana', '24.99', 55, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(18, 'Vinyle AC/DC', 'Back in Black d\'AC/DC', '26.99', 50, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(19, 'Vinyle David Bowie', 'The Rise and Fall of Ziggy Stardust', '29.99', 35, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(20, 'Vinyle Fleetwood Mac', 'Rumours de Fleetwood Mac', '23.99', 45, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(21, 'Vinyle The Rolling Stones', 'Exile on Main St.', '27.99', 40, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(22, 'Vinyle The Doors', 'The Doors', '26.99', 30, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(23, 'Vinyle Jimi Hendrix', 'Electric Ladyland de Jimi Hendrix', '28.99', 35, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(24, 'Vinyle The Who', 'Who\'s Next', '25.99', 40, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(25, 'Vinyle Prince', 'Purple Rain de Prince', '27.99', 45, '2024-01-08 15:30:00', '2024-01-08 15:30:00', 2, NULL),
(26, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:26:17', '2024-01-10 10:26:17', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(27, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:26:23', '2024-01-10 10:26:23', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(28, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:27:15', '2024-01-10 10:27:15', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(29, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:27:34', '2024-01-10 10:27:34', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(30, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:35:37', '2024-01-10 10:35:37', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(31, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:35:43', '2024-01-10 10:35:43', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(32, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:48:10', '2024-01-10 10:48:10', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(33, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:49:36', '2024-01-10 10:49:36', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(34, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:49:50', '2024-01-10 10:49:50', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(35, 'Nouveau Produit', 'Description du nouveau produit', '100.00', 10, '2024-01-10 10:49:54', '2024-01-10 10:49:54', 1, '[\"url_photo1.jpg\", \"url_photo2.jpg\"]'),
(36, 'T-Shirt Cool', 'Un T-shirt très cool', '19.99', 100, '2024-01-10 13:59:38', '2024-01-10 13:59:38', 1, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clothing`
--
ALTER TABLE `clothing`
  ADD CONSTRAINT `clothing_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `electronic`
--
ALTER TABLE `electronic`
  ADD CONSTRAINT `electronic_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
