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
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicament`
--

LOCK TABLES `medicament` WRITE;
/*!40000 ALTER TABLE `medicament` DISABLE KEYS */;
INSERT INTO `medicament` VALUES
(1,'Ciprofloxacine',7000,1,1),
(7,'Amoxicilline',5000,1,1),
(8,'Paracétamol',2000,0,2),
(9,'Ibuprofène',3000,0,2),
(10,'Lisinopril',8000,1,3),
(11,'Metformine',4000,1,4),
(12,'Amlodipine',8500,1,3),
(13,'Glipizide',4500,1,4),
(14,'Vitamine C',1500,0,5),
(15,'Vitamine D',2000,0,5),
(16,'Oseltamivir',12000,1,6),
(17,'Acyclovir',10000,1,6),
(18,'Loratadine',3500,0,7),
(19,'Cetirizine',3700,0,7),
(20,'Diclofenac',5000,0,8),
(21,'Prednisolone',8000,1,8),
(22,'Azithromycine',9000,1,1),
(23,'Doxycycline',6500,1,1),
(24,'Naproxen',4000,0,2),
(25,'Aspirin',2500,0,2),
(26,'Hydrochlorothiazide',7000,1,3),
(27,'Valsartan',9500,1,3),
(28,'Glibenclamide',4200,1,4),
(29,'Sitagliptin',9000,1,4),
(30,'Vitamine B12',2500,0,5),
(31,'Multivitamines',3000,0,5),
(32,'Remdesivir',15000,1,6),
(33,'Ribavirin',11000,1,6),
(34,'Fexofenadine',4000,0,7),
(35,'Diphenhydramine',3000,0,7),
(36,'Meloxicam',5000,1,8),
(37,'Ibuprofen',3500,0,8);
/*!40000 ALTER TABLE `medicament` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-10  6:54:19
