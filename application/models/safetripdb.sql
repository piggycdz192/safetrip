CREATE DATABASE  IF NOT EXISTS `safetrip` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `safetrip`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: safetrip
-- ------------------------------------------------------
-- Server version 5.5.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
  `categoryname` varchar(45) NOT NULL,
  `idrisk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoryname_UNIQUE` (`categoryname`),
  KEY `id_risk_idx` (`idrisk`),
  CONSTRAINT `id_risk` FOREIGN KEY (`idrisk`) REFERENCES `risk` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO `category` VALUES(1, 'Overcharging ', 2);
INSERT INTO `category` VALUES(2, 'Contracting', 2);
INSERT INTO `category` VALUES(3, 'Rude Behavior',2);
INSERT INTO `category` VALUES(4, 'Sexual Harassment', 1);
INSERT INTO `category` VALUES(5, 'Kidnapping', 1);
INSERT INTO `category` VALUES(6, 'Attempted Murder', 1);
INSERT INTO `category` VALUES(7, 'Left Behind Items ', 3);
INSERT INTO `category` VALUES(8, 'Refused Boarding', 2);
INSERT INTO `category` VALUES(9, 'Choosing Passengers ', 3);
INSERT INTO `category` VALUES(10, 'Reckless Behavior', 2);


--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platenumber` varchar(6) NOT NULL,
  `report` text NOT NULL,
  `datetime` datetime NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `drivername` varchar(50) DEFAULT NULL,
  `company` varchar(75) DEFAULT NULL,
  `picture` varchar(200),
  PRIMARY KEY (`id`),
  KEY `platenumber_idx` (`platenumber`),
  CONSTRAINT `platenumber` FOREIGN KEY (`platenumber`) REFERENCES `vehicle` (`platenumber`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_category`
--

DROP TABLE IF EXISTS `report_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_category` (
  `idreport` int(11) NOT NULL,
  `idcategory` int(11) NOT NULL,
  PRIMARY KEY (`idreport`,`idcategory`),
  KEY `id_report_idx` (`idreport`),
  KEY `id_category_idx` (`idcategory`),
  CONSTRAINT `id_category` FOREIGN KEY (`idcategory`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_report` FOREIGN KEY (`idreport`) REFERENCES `report` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_category`
--

LOCK TABLES `report_category` WRITE;
/*!40000 ALTER TABLE `report_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `report_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `risk`
--

DROP TABLE IF EXISTS `risk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `risk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risklevel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `risklevel_UNIQUE` (`risklevel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `risk`
--

LOCK TABLES `risk` WRITE;
/*!40000 ALTER TABLE `risk` DISABLE KEYS */;
INSERT INTO `risk` VALUES (1,'high'),(3,'low'),(2,'medium');
/*!40000 ALTER TABLE `risk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `platenumber` varchar(6) NOT NULL,
  `idvehicletype` int(11) NOT NULL,
  PRIMARY KEY (`platenumber`),
  KEY `id_vehicletype_idx` (`idvehicletype`),
  CONSTRAINT `id_vehicletype` FOREIGN KEY (`idvehicletype`) REFERENCES `vehicletype` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicletype`
--

DROP TABLE IF EXISTS `vehicletype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicletype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `typename_UNIQUE` (`typename`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicletype`
--

LOCK TABLES `vehicletype` WRITE;
/*!40000 ALTER TABLE `vehicletype` DISABLE KEYS */;
INSERT INTO `vehicletype` VALUES (1,'Bus'),(2,'Taxi');
/*!40000 ALTER TABLE `vehicletype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-24 19:25:22
