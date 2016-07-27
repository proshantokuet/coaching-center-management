CREATE DATABASE  IF NOT EXISTS `academia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `academia`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: academia
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.12.04.1

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
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (2,'Doo','2016-07-22','2016-07-22',3,'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl',1),(3,'B7','2016-07-22','2016-07-22',3,'SSC Student',1);
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `thumbnail` varchar(45) DEFAULT NULL,
  `is_logged` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vxcv','fgdfgbvxc','xcb',0,'2016-07-21 22:11:09','2016-07-21 22:11:09','admin','bxcb','xcbxc','','','',NULL),(2,'cvxcv','bcx cvbc','7e252689dd1c95c869684191b05a6238c46acbe9',0,'2016-07-21 22:14:22','2016-07-21 22:14:22','admin','staff','lollypolly007.mhr@gmail.com','xcvzxv','','',NULL),(3,'probir','probir','7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-21 22:16:17','2016-07-21 22:16:17','admin','019234456678','belal@yahoo.com','wefsdf','3c83c76eb1ce5d240199882978e8051d.jpg','44d5d3959ef161b20776d2a226ff0663.jpg',1),(4,'asdas','asdasd','a80e9dc373347ede93f052a8444d4d7d7c6994bb',1,'2016-07-21 22:24:54','2016-07-21 22:24:54','admin','bcv','rr@ss.com','cvbc','','',NULL),(5,'lipi','bcx cvbc','7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-21 22:25:29','2016-07-21 22:25:29','admin','cvbc','li@yahoo.com','','','',0),(6,'nvn',NULL,'d46d9e224e2789c646b5cf506679f6f956b5478c',1,'2016-07-23 10:42:57','2016-07-23 10:42:57','student',NULL,NULL,NULL,NULL,NULL,NULL),(7,'probircfc',NULL,'e650eae7d64b67dc71c03c6494128a09ebea3b0d',1,'2016-07-23 10:47:36','2016-07-23 10:47:36','student',NULL,NULL,NULL,NULL,NULL,1),(8,'probircfccfvbc',NULL,'e650eae7d64b67dc71c03c6494128a09ebea3b0d',1,'2016-07-23 10:49:00','2016-07-23 10:49:00','student',NULL,NULL,NULL,NULL,NULL,NULL),(9,'cvxcvd',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-23 10:57:15','2016-07-23 10:57:15','student',NULL,NULL,NULL,NULL,NULL,NULL),(10,'dre',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-23 11:15:24','2016-07-23 11:15:24','student',NULL,NULL,NULL,NULL,NULL,NULL),(11,'ji',NULL,'22a3cd0567ee3b2f528d33d8c716ab1849bf6235',1,'2016-07-23 11:22:45','2016-07-23 11:22:45','student',NULL,NULL,NULL,'7cbad9264909e9eedcdb2af7c2594451.jpg','655ae69f8c418e52bddffbc405e5f128.jpg',NULL),(12,'hy',NULL,'4fa72584ffd35b90fe01cab963aa23415e2faa1f',1,'2016-07-23 11:26:11','2016-07-23 11:26:11','student',NULL,NULL,NULL,'ff943db93b1ed97fe4b8f63cdb01e6bf.jpg','7e35dfe378608cb8e1ce09b57f55f7cf.jpg',NULL),(13,'vf',NULL,'d6a3a60c37b502bbb40afcd90a9cb33b8b4d5d63',1,'2016-07-23 11:40:11','2016-07-23 11:40:11','student',NULL,NULL,NULL,NULL,NULL,NULL),(14,'dfggdfg',NULL,'3ab39a0b503fcbdc1b057fdaad32b1f63a75c735',1,'2016-07-23 11:48:39','2016-07-23 11:48:39','student',NULL,NULL,NULL,NULL,NULL,NULL),(15,'joy',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-23 12:36:19','2016-07-23 12:36:19','student',NULL,NULL,NULL,'d60b3108e8bb91fd40fd389b16bf32a6.jpg','dfdcd436346304703764e399b930ca45.jpg',NULL),(16,'sohel',NULL,'9d39ac3a871fab21e273d18969b9c50501fc9abb',1,'2016-07-24 19:56:42','2016-07-24 19:56:42','student',NULL,NULL,NULL,'a7785bfb4112bb28e5d1d3c8ce48633d.jpg','91660b308eda0769d2a2feb322a55c46.jpg',0),(17,NULL,NULL,'',1,'2016-07-25 19:08:16','2016-07-25 19:08:16','student',NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,NULL,'',1,'2016-07-25 19:08:59','2016-07-25 19:08:59','student',NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,NULL,'',1,'2016-07-25 19:14:19','2016-07-25 19:14:19','student',NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,NULL,'',1,'2016-07-25 19:16:57','2016-07-25 19:16:57','student',NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,NULL,'',1,'2016-07-25 19:18:19','2016-07-25 19:18:19','student',NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,NULL,'',1,'2016-07-25 19:18:40','2016-07-25 19:18:40','student',NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,'',1,'2016-07-25 19:21:46','2016-07-25 19:21:46','student',NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,NULL,'',1,'2016-07-25 19:26:09','2016-07-25 19:26:09','student',NULL,NULL,NULL,NULL,NULL,NULL),(25,NULL,NULL,'',1,'2016-07-25 19:33:03','2016-07-25 19:33:03','student',NULL,NULL,NULL,NULL,NULL,NULL),(26,NULL,NULL,'',1,'2016-07-25 19:35:45','2016-07-25 19:35:45','student',NULL,NULL,NULL,NULL,NULL,NULL),(27,NULL,NULL,'',1,'2016-07-25 19:37:35','2016-07-25 19:37:35','student',NULL,NULL,NULL,NULL,NULL,NULL),(28,NULL,NULL,'',1,'2016-07-25 19:56:23','2016-07-25 19:56:23','student',NULL,NULL,NULL,NULL,NULL,NULL),(29,NULL,NULL,'',1,'2016-07-25 20:01:05','2016-07-25 20:01:05','student',NULL,NULL,NULL,NULL,NULL,NULL),(30,'shakil',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-25 20:04:01','2016-07-25 20:04:01','student',NULL,NULL,NULL,'d4cd9402333911e59b843c7861b9a1ac.jpg','1db70f8b7a5feaca338b106a6f067666.jpg',NULL),(31,'shakilass',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:04:45','2016-07-25 20:04:45','student',NULL,NULL,NULL,NULL,NULL,NULL),(32,'sahklo',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:04:59','2016-07-25 20:04:59','student',NULL,NULL,NULL,NULL,NULL,NULL),(33,'guru',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-25 20:06:33','2016-07-25 20:06:33','student',NULL,NULL,NULL,NULL,NULL,NULL),(34,'gurue',NULL,'029d8845cbed4cf8f59e5cad580ef5753f638462',1,'2016-07-25 20:07:44','2016-07-25 20:07:44','student',NULL,NULL,NULL,NULL,NULL,NULL),(35,'deee',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:14:02','2016-07-25 20:14:02','student',NULL,NULL,NULL,NULL,NULL,NULL),(36,'fr',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:14:53','2016-07-25 20:14:53','student',NULL,NULL,NULL,NULL,NULL,NULL),(37,'fff',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:15:32','2016-07-25 20:15:32','student',NULL,NULL,NULL,NULL,NULL,NULL),(38,'eeee',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:17:07','2016-07-25 20:17:07','student',NULL,NULL,NULL,NULL,NULL,NULL),(39,'dasd',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:19:27','2016-07-25 20:19:27','student',NULL,NULL,NULL,NULL,NULL,NULL),(40,'dfdf',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:20:15','2016-07-25 20:20:15','student',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `nick_name` varchar(45) DEFAULT NULL,
  `father_name` varchar(45) DEFAULT NULL,
  `father_occupation` varchar(45) DEFAULT NULL,
  `mother_name` varchar(45) DEFAULT NULL,
  `mother_occupation` varchar(45) DEFAULT NULL,
  `present_address` varchar(200) DEFAULT NULL,
  `contact_student` varchar(100) DEFAULT NULL,
  `contact_guardian` varchar(100) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `id_number` varchar(20) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `edu_level` varchar(45) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'','','','','','','','','',6,NULL,'dfsf@dd.com','2016-07-23','2016-07-23',1,6,3,NULL,NULL,'Eleven',2,NULL),(2,'','','','','','','','','',6,NULL,'dfsf@dd.com','2016-07-23','2016-07-23',1,7,3,NULL,NULL,'Kg',3,NULL),(3,'jbvn','bvnvb','bvn','bnvbn','','bvnvbn','bmvnm','','',6,NULL,'bvdfsf@dd.com','2016-07-23','2016-07-23',1,8,7,NULL,NULL,'Kg',3,NULL),(4,'','','zxczc','czc','zxczxc','czxcz','zxc','','',5,NULL,'sdfds@f.com','2016-07-23','2016-07-23',1,9,7,NULL,NULL,'One',2,NULL),(5,'fgdf','fg','','','','','','','',6,NULL,'dfsdf@dd.com','2016-07-23','2016-07-23',1,10,7,'1233',NULL,'One',2,NULL),(6,'jsdfsd','fs','','','','','','','',6,NULL,'sfdfs@f.com','2016-07-23','2016-07-23',1,11,7,'2345',NULL,'One',2,NULL),(7,'','','','','','','','','',6,NULL,'dfsdf@dd.com','2016-07-23','2016-07-23',1,12,7,'2345',NULL,'One',2,NULL),(8,'','','','','','','','','',5,NULL,'dfsff@dd.com','2016-07-23','2016-07-23',1,13,7,'sdf',NULL,'Ten',2,NULL),(9,'','','','','','','','','',NULL,NULL,'','2016-07-23','2016-07-23',1,14,7,'dfgdfg',NULL,'One',3,NULL),(10,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-23','2016-07-23',1,15,7,'2334',NULL,'One',2,NULL),(11,'sohel','ss','mokbul ','farmer','ferdousi','house wife','','01711082537','',NULL,NULL,'sohel.sarder@gmail.com','2016-07-24','2016-07-24',1,16,3,'0305022',NULL,'Eleven',3,NULL),(12,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-25','2016-07-25',1,17,3,'2334',NULL,'One',2,NULL),(13,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-25','2016-07-25',1,29,3,'2334',NULL,'One',2,NULL),(14,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-25','2016-07-25',1,22,3,'2334',NULL,'One',2,NULL),(15,'shakil','shakil','cbcvb','fvfbcb','cvb','','cbvc','bvc','cbvc',5,NULL,'d@f.vom','2016-07-25','2016-07-25',1,30,3,'1234',NULL,'One',3,NULL),(16,'shakil','shakil','cbcvb','fvfbcb','cvb','','cbvc','bvc','cbvc',5,NULL,'d@f.vom','2016-07-25','2016-07-25',1,31,3,'1234',NULL,'One',3,NULL),(17,'shakil','shakil','cbcvb','fvfbcb','cvb','','cbvc','bvc','cbvc',5,NULL,'d@f.vom','2016-07-25','2016-07-25',1,32,3,'1234',NULL,'One',3,NULL),(18,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,33,3,'',NULL,'Four',NULL,NULL),(19,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,34,3,'',NULL,'Four',NULL,NULL),(20,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,35,3,'',NULL,'',NULL,NULL),(21,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,36,3,'',NULL,'',NULL,NULL),(22,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,37,3,'',NULL,'',NULL,NULL),(23,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,38,3,'',NULL,'',NULL,NULL),(24,'sdad','','adad','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,39,3,'adasd',NULL,'',NULL,NULL),(25,'dfsdf','','sdfsf','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,40,3,'sdfsf',NULL,'',NULL,NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_times`
--

DROP TABLE IF EXISTS `batch_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `suffix` varchar(4) DEFAULT NULL,
  `day` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_times`
--

LOCK TABLES `batch_times` WRITE;
/*!40000 ALTER TABLE `batch_times` DISABLE KEYS */;
INSERT INTO `batch_times` VALUES (13,'00:00:00','00:00:00',NULL,'0','2016-07-22 20:19:45','2016-07-22 20:19:45',1,1),(14,'00:00:00','00:00:00',NULL,'0','2016-07-22 20:19:45','2016-07-22 20:19:45',2,1),(15,'00:00:00','00:00:00',NULL,'Satarday','2016-07-22 20:19:45','2016-07-22 20:19:45',1,1),(30,'00:00:00','00:00:00',NULL,'Satarday','2016-07-22 21:34:22','2016-07-22 21:34:22',1,3),(31,'00:00:00','00:00:00',NULL,'Tuesday','2016-07-22 21:34:22','2016-07-22 21:34:22',3,3),(39,'09:45:00','09:45:00',NULL,'Monday','2016-07-22 22:34:50','2016-07-22 22:34:50',1,2),(40,'10:45:00','03:45:00',NULL,'Monday','2016-07-22 22:34:50','2016-07-22 22:34:50',3,2);
/*!40000 ALTER TABLE `batch_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,'BSI','2016-07-22','2016-07-22','Baridhara',1,'BSI2345',NULL,'probir'),(5,'NotorDem','2016-07-22','2016-07-22','Dhaka Motijheel',1,'NOT20002',NULL,NULL),(6,'Dhaka College','2016-07-22','2016-07-22','DHaka,Tajgao',1,'DHA34555',NULL,NULL),(8,'Rajuk Model Coolege','2016-07-22','2016-07-22','Yttara Dhaka',1,'RAJ23456','probir',NULL);
/*!40000 ALTER TABLE `institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Physics','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore ',400,1,'2016-07-22','2016-07-22',3,'PH','probir'),(2,'Chemistry','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl',600,1,'2016-07-22','2016-07-22',3,'CHE20330',NULL),(3,'Biology','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore ',400,1,'2016-07-22','2016-07-22',3,'Bio233',NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (7,10,1,79,'2016-07-23','2016-07-23 14:44:17',NULL,7,1),(8,10,3,53,'2016-07-23','2016-07-23 14:44:17',NULL,7,1),(9,10,2,12,'2016-07-23','2016-07-23 14:44:17',NULL,7,1),(10,11,1,800,'2016-07-24','2016-07-24 19:58:54',NULL,3,1),(11,11,3,1100,'2016-07-24','2016-07-24 19:58:54',NULL,3,1),(12,13,1,343,'2016-07-25','2016-07-25 20:01:04',NULL,3,1),(13,13,2,343,'2016-07-25','2016-07-25 19:26:20',NULL,3,1),(14,14,1,23,'2016-07-25','2016-07-25 19:18:26',NULL,3,1),(15,14,2,232,'2016-07-25','2016-07-25 19:18:26',NULL,3,1),(16,14,3,2,'2016-07-25','2016-07-25 19:18:26',NULL,3,1),(17,13,3,34,'2016-07-25','2016-07-25 19:26:20',NULL,3,1);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_summaries`
--

DROP TABLE IF EXISTS `payment_summaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_summaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `receivable` double DEFAULT NULL,
  `due` double DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_summaries`
--

LOCK TABLES `payment_summaries` WRITE;
/*!40000 ALTER TABLE `payment_summaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_summaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_courses`
--

DROP TABLE IF EXISTS `student_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_courses`
--

LOCK TABLES `student_courses` WRITE;
/*!40000 ALTER TABLE `student_courses` DISABLE KEYS */;
INSERT INTO `student_courses` VALUES (1,4,1,2,'2016-07-23','2016-07-23'),(2,4,3,2,'2016-07-23','2016-07-23'),(3,5,1,2,'2016-07-23','2016-07-23'),(4,5,2,2,'2016-07-23','2016-07-23'),(5,6,1,2,'2016-07-23','2016-07-23'),(6,6,3,2,'2016-07-23','2016-07-23'),(7,7,1,2,'2016-07-23','2016-07-23'),(8,7,2,2,'2016-07-23','2016-07-23'),(9,8,1,2,'2016-07-23','2016-07-23'),(10,9,1,3,'2016-07-23','2016-07-23'),(14,11,1,3,'2016-07-24','2016-07-24'),(15,11,3,3,'2016-07-24','2016-07-24'),(29,14,1,2,'2016-07-25','2016-07-25'),(30,14,2,2,'2016-07-25','2016-07-25'),(48,13,2,2,'2016-07-25','2016-07-25'),(49,13,3,2,'2016-07-25','2016-07-25'),(50,13,1,2,'2016-07-25','2016-07-25'),(51,17,1,3,'2016-07-25','2016-07-25'),(52,17,2,3,'2016-07-25','2016-07-25');
/*!40000 ALTER TABLE `student_courses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-25 20:22:26