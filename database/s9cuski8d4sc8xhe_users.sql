-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: tuy8t6uuvh43khkk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com    Database: s9cuski8d4sc8xhe
-- ------------------------------------------------------
-- Server version	5.7.23-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `status` enum('user','admin','technician','wait','wait-fix','fixed') NOT NULL,
  `avatar_path` varchar(1000) DEFAULT NULL,
  `certificate_id` varchar(100) DEFAULT NULL,
  `star` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test1@mail.com','$2y$10$zZKOseXKHMh5qs0GcvT5XOTLHvsvM7aVAgcrimxmAydiI98KWeJLG','test1@mail.com','test1@mail.com','male','test1@mail.com','test1@mail.com','test1@mail.com','technician','uploads/2/test1@mail.com/avatar/4.png',NULL,3.5),(2,'test2@mail.com','$2y$10$qZ0UZnPakOhm3Yo7Nv6ryOsnydKm04ThaJP0czneCtQo7ixV0Dc3G','test2@mail.com','test2@mail.com','male','test2@mail.com','test2@mail.com','test2@mail.com','technician','uploads/2/test2@mail.com/avatar/2.jpg',NULL,0),(3,'beam@mail.com','$2y$10$la4V590RCwo6ye0xzIqCRuIlv9SQt0x9wVDrawSLPxNqm9M99L9G2','admin','admin','male','1234','0123456789','12123132','admin','uploads/2/beam@mail.com/avatar/logo.png',NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-29 23:35:39
