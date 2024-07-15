-- MariaDB dump 10.19  Distrib 10.7.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: pharmacie
-- ------------------------------------------------------
-- Server version	10.7.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `achat`
--

DROP TABLE IF EXISTS `achat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime DEFAULT current_timestamp(),
  `total` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `isEffectue` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achat`
--

LOCK TABLES `achat` WRITE;
/*!40000 ALTER TABLE `achat` DISABLE KEYS */;
INSERT INTO `achat` VALUES
(26,'2024-07-15 14:56:32',162000,7,0);
/*!40000 ALTER TABLE `achat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES
(1,'Antibiotiques'),
(2,'Analgésiques'),
(3,'Antihypertenseurs'),
(4,'Antidiabétiques'),
(5,'Suppléments Vitaminiques'),
(6,'Antiviraux'),
(7,'Antihistaminiques'),
(8,'Anti-inflammatoires');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicament_id` int(11) DEFAULT NULL,
  `nombre` float DEFAULT NULL,
  `achat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `medicament_id` (`medicament_id`),
  KEY `achat_id` (`achat_id`),
  CONSTRAINT `details_ibfk_1` FOREIGN KEY (`medicament_id`) REFERENCES `medicament` (`id`) ON DELETE CASCADE,
  CONSTRAINT `details_ibfk_2` FOREIGN KEY (`achat_id`) REFERENCES `achat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES
(36,15,21,26),
(37,16,10,26);
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` float NOT NULL DEFAULT 0,
  `ordonnance` tinyint(1) DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `nombre` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicament`
--

LOCK TABLES `medicament` WRITE;
/*!40000 ALTER TABLE `medicament` DISABLE KEYS */;
INSERT INTO `medicament` VALUES
(1,'Ciprofloxacine',7000,1,1,3998),
(7,'Amoxicilline',5000,1,1,3998),
(8,'Paracétamol',2000,0,2,4000),
(9,'Ibuprofène',3000,0,2,4000),
(10,'Lisinopril',8000,1,3,0),
(11,'Metformine',4000,1,4,4000),
(12,'Amlodipine',8500,1,3,4000),
(13,'Glipizide',4500,1,4,4000),
(14,'Vitamine C',1500,0,5,4000),
(15,'Vitamine D',2000,0,5,3979),
(16,'Oseltamivir',12000,1,6,3990),
(17,'Acyclovir',10000,1,6,3998),
(18,'Loratadine',3500,0,7,0),
(19,'Cetirizine',3700,0,7,4000),
(20,'Diclofenac',5000,0,8,4000),
(21,'Prednisolone',8000,1,8,4000),
(22,'Azithromycine',9000,1,1,4000),
(23,'Doxycycline',6500,1,1,0),
(24,'Naproxen',4000,0,2,4000),
(25,'Aspirin',2500,0,2,4000),
(26,'Hydrochlorothiazide',7000,1,3,4000),
(27,'Valsartan',9500,1,3,4000),
(28,'Glibenclamide',4200,1,4,4000),
(29,'Sitagliptin',9000,1,4,4000),
(30,'Vitamine B12',2500,0,5,4000),
(31,'Multivitamines',3000,0,5,0),
(32,'Remdesivir',15000,1,6,3995),
(33,'Ribavirin',11000,1,6,4000),
(34,'Fexofenadine',4000,0,7,4000),
(35,'Diphenhydramine',3000,0,7,4000),
(36,'Meloxicam',5000,1,8,4000),
(37,'Ibuprofen',3500,0,8,4000);
/*!40000 ALTER TABLE `medicament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `roles` varchar(100) DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(6,'admin','01','admin01@gmail.com','image/users/rdr2-serious-arthur-with-hat-desktop-wallpaper-cover.jpg','$2y$10$u56kkTFDCY5xoOmTBq5YouRy/vNzqiorkiHyX4xV.6sz78LaFQ5ti','admin','LIeu, Bienvenues','034585588'),
(7,'Client','01','client01@gmail.com','image/users/witcher-3-pink-sunset-landscape-aesthetic-desktop-wallpaper-cover.jpg','$2y$10$8hxXnZ0mvTucOOx0cPtvcup7yfTOHTTC264.wq2PTTEMdKUf4i5DC','user','Mahamasina, Antananrico','0346412012');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-15 15:38:19
