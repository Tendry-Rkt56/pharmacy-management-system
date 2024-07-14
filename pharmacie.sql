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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achat`
--

LOCK TABLES `achat` WRITE;
/*!40000 ALTER TABLE `achat` DISABLE KEYS */;
INSERT INTO `achat` VALUES
(1,'2024-07-13 14:17:28',2500,1,0),
(2,'2024-07-13 21:31:11',45800,2,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES
(1,17,1,1),
(2,31,2,1),
(3,12,20,1),
(4,25,13,1),
(5,23,1,1),
(6,37,34,1),
(7,36,1,1),
(8,18,32,1),
(9,13,32,1),
(10,14,12,1),
(11,30,1,1);
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
(1,'Ciprofloxacine',7000,1,1,4000),
(7,'Amoxicilline',5000,1,1,4000),
(8,'Paracétamol',2000,0,2,4000),
(9,'Ibuprofène',3000,0,2,4000),
(10,'Lisinopril',8000,1,3,0),
(11,'Metformine',4000,1,4,4000),
(12,'Amlodipine',8500,1,3,4000),
(13,'Glipizide',4500,1,4,4000),
(14,'Vitamine C',1500,0,5,4000),
(15,'Vitamine D',2000,0,5,4000),
(16,'Oseltamivir',12000,1,6,4000),
(17,'Acyclovir',10000,1,6,4000),
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
(32,'Remdesivir',15000,1,6,4000),
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Tendry','Rkt','tendry@gmail.com','image/users/instasquare.photoeditor.effect.cutout_2022923191215702-02.jpeg','$2y$10$m42hH3tBkK9FKk3s3e444ulDFMPPRusC26yyM0Av1KkeUvm2vTxce','admin','Ankaraobato, Antananarivo','0342512524'),
(2,'Ronaldos','','ronaldo@gmail.com','','$2y$10$V16vxDGu6AsgwaqQcq4m2.794DtzFfM06uPukWv5KJ4vpvrM5a016','user','Portugal, Lisbonne',NULL),
(3,'Tsanta','Fitia','tsanta@gmail.com','image/users/1595692256902_plus-01.jpeg','$2y$10$cG0rQk4SC4LcM6ZZSLTYY.w1xWIrWDF4Li0X5YM9DE6Ifw8qZKa06','user','Analamanga','0388888888'),
(4,'Ratovo','Eric','eric@gmail.com',NULL,'$2y$10$jdDYCOwXaiO0OOH7FwpJ6Og0YBmFUEpYJfQaavC7XWn2yVVJIZbCq','admin',NULL,NULL),
(5,'Jean ','Yves','yves@gmail.com',NULL,'$2y$10$QKIBnLjmb32YYAKQpLmYsu8TAPiiZL.NJOEXQoZNMeUYwOYfZQdkC','admin',NULL,NULL);
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

-- Dump completed on 2024-07-15  0:31:05
