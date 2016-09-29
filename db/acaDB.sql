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
-- Table structure for table `course_batches`
--

DROP TABLE IF EXISTS `course_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_batches`
--

LOCK TABLES `course_batches` WRITE;
/*!40000 ALTER TABLE `course_batches` DISABLE KEYS */;
INSERT INTO `course_batches` VALUES (12,11,2,'2016-08-06','2016-08-06',3),(13,11,3,'2016-08-06','2016-08-06',3),(16,12,2,'2016-08-06','2016-08-06',3),(17,12,3,'2016-08-06','2016-08-06',3),(19,13,2,'2016-08-06','2016-08-06',3),(20,13,3,'2016-08-06','2016-08-06',3),(23,1,2,'2016-08-06','2016-08-06',3),(24,1,3,'2016-08-06','2016-08-06',3);
/*!40000 ALTER TABLE `course_batches` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (2,'Doo','2016-07-22','2016-07-22',3,'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl',1),(3,'B7','2016-07-22','2016-07-22',3,'SSC Student',1),(4,'B1','2016-08-06','2016-08-06',3,'B1',1),(5,'B11','2016-08-06','2016-08-06',3,'',1);
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
  `question` varchar(45) DEFAULT NULL,
  `resetkey` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vxcv','fgdfgbvxc','xcb',0,'2016-07-21 22:11:09','2016-07-21 22:11:09','admin','bxcb','xcbxc','','','',NULL,NULL,NULL),(3,'probir','probir','8f561a807b5dce7f373ba5e6e81553d4036746fb',1,'2016-07-21 22:16:17','2016-08-05 07:57:51','admin','019234456678','belal@yahoo.com','wefsdf','3c83c76eb1ce5d240199882978e8051d.jpg','44d5d3959ef161b20776d2a226ff0663.jpg',1,NULL,NULL),(4,'asdas','asdasd','a80e9dc373347ede93f052a8444d4d7d7c6994bb',1,'2016-07-21 22:24:54','2016-07-21 22:24:54','admin','bcv','rr@ss.com','cvbc','','',NULL,NULL,NULL),(5,'lipi','bcx cvbc','fd7d7d8c051df31e71b93eb76be06b7f12583061',1,'2016-07-21 22:25:29','2016-08-05 07:57:32','admin','cvbc','li@yahoo.com','','','',0,NULL,NULL),(6,'nvn',NULL,'d46d9e224e2789c646b5cf506679f6f956b5478c',1,'2016-07-23 10:42:57','2016-07-23 10:42:57','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'probircfc',NULL,'e650eae7d64b67dc71c03c6494128a09ebea3b0d',1,'2016-07-23 10:47:36','2016-07-23 10:47:36','student',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(8,'probircfccfvbc',NULL,'e650eae7d64b67dc71c03c6494128a09ebea3b0d',1,'2016-07-23 10:49:00','2016-07-29 23:16:25','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'cvxcvd',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-23 10:57:15','2016-07-23 10:57:15','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'dre',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-23 11:15:24','2016-07-23 11:15:24','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'ji',NULL,'22a3cd0567ee3b2f528d33d8c716ab1849bf6235',1,'2016-07-23 11:22:45','2016-07-23 11:22:45','student',NULL,NULL,NULL,'7cbad9264909e9eedcdb2af7c2594451.jpg','655ae69f8c418e52bddffbc405e5f128.jpg',NULL,NULL,NULL),(12,'hy',NULL,'4fa72584ffd35b90fe01cab963aa23415e2faa1f',1,'2016-07-23 11:26:11','2016-07-23 11:26:11','student',NULL,NULL,NULL,'ff943db93b1ed97fe4b8f63cdb01e6bf.jpg','7e35dfe378608cb8e1ce09b57f55f7cf.jpg',NULL,NULL,NULL),(13,'vf',NULL,'d6a3a60c37b502bbb40afcd90a9cb33b8b4d5d63',1,'2016-07-23 11:40:11','2016-07-23 11:40:11','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'dfggdfg',NULL,'3ab39a0b503fcbdc1b057fdaad32b1f63a75c735',1,'2016-07-23 11:48:39','2016-07-23 11:48:39','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'joy',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-23 12:36:19','2016-07-23 12:36:19','student',NULL,NULL,NULL,'d60b3108e8bb91fd40fd389b16bf32a6.jpg','dfdcd436346304703764e399b930ca45.jpg',NULL,NULL,NULL),(16,'sohel',NULL,'9d39ac3a871fab21e273d18969b9c50501fc9abb',1,'2016-07-24 19:56:42','2016-07-24 19:56:42','student',NULL,NULL,NULL,'a7785bfb4112bb28e5d1d3c8ce48633d.jpg','91660b308eda0769d2a2feb322a55c46.jpg',0,NULL,NULL),(30,'shakil',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-25 20:04:01','2016-07-25 20:04:01','student',NULL,NULL,NULL,'d4cd9402333911e59b843c7861b9a1ac.jpg','1db70f8b7a5feaca338b106a6f067666.jpg',NULL,NULL,NULL),(31,'shakilass',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:04:45','2016-07-25 20:04:45','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'sahklo',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:04:59','2016-07-25 20:04:59','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'guru',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-25 20:06:33','2016-07-25 20:06:33','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'gurue',NULL,'029d8845cbed4cf8f59e5cad580ef5753f638462',1,'2016-07-25 20:07:44','2016-07-25 20:07:44','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'deee',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:14:02','2016-07-25 20:14:02','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'fr',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:14:53','2016-07-25 20:14:53','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'fff',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:15:32','2016-07-25 20:15:32','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,'eeee',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:17:07','2016-07-25 20:17:07','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'dasd',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:19:27','2016-07-25 20:19:27','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'dfdf',NULL,'7496bc341451f4d8e795ddbfec0e04a1d111db40',1,'2016-07-25 20:20:15','2016-07-25 20:20:15','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'sagar',NULL,'3cba11b9ddd3ed08121669343b9b35e96aa312d8',1,'2016-07-28 21:41:56','2016-07-28 21:41:56','student',NULL,NULL,NULL,'06404669d71ac7a94bf9c0e502075539.jpg','f37afbf35866f36d69e10e877d087524.jpg',0,NULL,NULL),(44,'am',NULL,'3cba11b9ddd3ed08121669343b9b35e96aa312d8',1,'2016-07-28 22:48:54','2016-07-28 22:48:54','student',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(46,'aro',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-28 22:56:39','2016-07-28 22:56:39','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,'hasib',NULL,'3cba11b9ddd3ed08121669343b9b35e96aa312d8',1,'2016-07-28 23:05:07','2016-07-30 11:01:14','student',NULL,NULL,NULL,'bdcd977fd1f98e620c1f014f459cfe17.jpg','c93cd102b1cf9246123af803a2a443a4.jpg',0,NULL,NULL),(49,'jony',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-29 10:46:25','2016-07-29 10:46:25','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,'prokash',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-29 10:58:13','2016-07-29 11:03:54','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,'ajit',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-29 11:12:27','2016-08-02 18:37:28','student',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(52,'jakir',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-07-29 22:41:37','2016-07-29 22:41:37','student',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(53,'pari',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',0,'2016-07-29 22:46:12','2016-07-29 22:46:12','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'zxcvzxvzxv',NULL,'8245c0f37904ea5caffbc5dfefa0a7000dd3552d',1,'2016-07-31 20:07:30','2016-07-31 20:07:30','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'sdasf',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',0,'2016-08-02 18:41:16','2016-08-02 18:41:16','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,'dfsdf',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-02 18:55:33','2016-08-02 18:55:33','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,'fffff',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-02 18:56:16','2016-08-02 18:57:50','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(58,'numera',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-02 19:29:57','2016-08-02 19:32:15','student',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(59,'rafique',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-02 19:36:34','2016-08-02 19:38:07','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,'jaon',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-03 18:46:13','2016-08-03 18:46:13','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,'ghtyu',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-03 18:49:53','2016-08-03 18:49:53','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,'dfdg',NULL,'ac70979c51310901b03193c992916a079c6f6d86',1,'2016-08-03 18:50:33','2016-08-03 18:50:33','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,'242424',NULL,'ae70f2da77a5c6e6e4fb85771173fb0387019f1e',1,'2016-08-03 18:52:27','2016-08-03 18:52:27','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,'hasibff',NULL,'17603d7af613d4475fd4b0f4077957d60dc3558b',1,'2016-08-03 18:54:48','2016-08-04 17:43:25','student',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,'shakil2',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-03 19:36:00','2016-08-04 17:49:46','student',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(66,'jack','jak','7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-05 08:20:55','2016-08-05 11:27:58','admin','019234456678','dr.Qamrul@yahoo.com','h hh bvcb','5ed064af5bb24780c55ab875e058b344.jpg','577369547d2dded557b3502020c043ba.jpg',NULL,'fff',NULL),(67,'probirs','probir','7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-05 11:34:09','2016-08-05 11:34:09','admin','123233','fli@yahoo.com','ngh','','',NULL,'ffff',NULL),(68,'lolo','jakss','8f561a807b5dce7f373ba5e6e81553d4036746fb',1,'2016-08-05 11:35:51','2016-08-05 12:45:53','admin','','rrd@ss.com','df','','',0,'lolo',''),(69,'jonn',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-05 11:46:22','2016-08-05 12:50:04','student',NULL,NULL,NULL,NULL,NULL,0,'fffe',''),(70,NULL,NULL,'18549b5734f7616966c555e92ed608dfee77ed3c',NULL,'2016-08-05 14:46:28','2016-08-05 14:46:28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(71,'cxc','dd','7e252689dd1c95c869684191b05a6238c46acbe9',0,'2016-08-05 16:29:01','2016-08-05 16:29:01','admin','','dr.ahmed@yahoo.com','','','',NULL,'3434535',NULL),(72,'rahul',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-06 09:00:45','2016-08-06 15:47:37','student',NULL,NULL,NULL,NULL,NULL,0,'life',NULL),(73,'prodip',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-06 09:12:57','2016-08-06 09:12:57','student',NULL,NULL,NULL,NULL,NULL,NULL,'dooo',NULL),(74,'pkkk',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-06 16:56:35','2016-08-06 16:56:35','student',NULL,NULL,NULL,NULL,NULL,NULL,'drr',NULL),(75,'jagg',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-06 16:59:28','2016-08-06 16:59:28','student',NULL,NULL,NULL,NULL,NULL,NULL,'hyy',NULL),(76,'kole',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-07 18:38:23','2016-08-07 18:40:12','student',NULL,NULL,NULL,NULL,NULL,NULL,'hhhh',NULL),(77,'dipika',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-08 19:33:01','2016-09-19 19:17:35','student',NULL,NULL,NULL,NULL,NULL,NULL,'123',NULL),(78,'ffffff',NULL,'7e252689dd1c95c869684191b05a6238c46acbe9',1,'2016-08-09 18:50:34','2016-08-09 18:51:04','student',NULL,NULL,NULL,NULL,NULL,NULL,'dddddd',NULL),(79,'dddddd',NULL,'969dc68379416eb1d2e695a1374b6e0c50afd51d',1,'2016-08-09 18:51:56','2016-08-09 18:51:56','student',NULL,NULL,NULL,NULL,NULL,NULL,'dddee',NULL),(80,'dfsdffgfgfgfg',NULL,'793d627582844a8c94eb26245d1ddd5764908e15',1,'2016-09-28 20:52:43','2016-09-28 20:52:43','student',NULL,NULL,NULL,NULL,NULL,NULL,'dsffgf',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academic_results`
--

DROP TABLE IF EXISTS `academic_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) DEFAULT NULL,
  `exam` varchar(45) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_results`
--

LOCK TABLES `academic_results` WRITE;
/*!40000 ALTER TABLE `academic_results` DISABLE KEYS */;
INSERT INTO `academic_results` VALUES (1,'55','SSC','0000-00-00','5',4),(2,'55','PSC','0000-00-00','1',3),(3,'55','PSC','0000-00-00','5',3),(4,'55','JSC','0000-00-00','5',3);
/*!40000 ALTER TABLE `academic_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `last_payments`
--

DROP TABLE IF EXISTS `last_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `last_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `created` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `last_payments`
--

LOCK TABLES `last_payments` WRITE;
/*!40000 ALTER TABLE `last_payments` DISABLE KEYS */;
INSERT INTO `last_payments` VALUES (4,51,13,6,'2016-08-07',3),(5,51,13,7,'2016-08-07',3),(6,51,12,0,'2016-08-07',3),(8,52,12,30,'2016-08-08',3),(9,53,1,22,'2016-08-09',3),(10,29,1,66,'2016-08-13',3),(11,29,2,NULL,'2016-08-13',3),(12,29,3,6,'2016-08-13',3);
/*!40000 ALTER TABLE `last_payments` ENABLE KEYS */;
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
  `id_number` int(11) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `school` varchar(45) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(45) DEFAULT NULL,
  `name_bn` varchar(100) DEFAULT NULL,
  `passing_year` varchar(15) DEFAULT NULL,
  `gpa` float DEFAULT NULL,
  `board` varchar(45) DEFAULT NULL,
  `roll` varchar(15) DEFAULT NULL,
  `branch` varchar(45) DEFAULT NULL,
  `college` varchar(65) DEFAULT NULL,
  `is_new` tinyint(4) DEFAULT '0',
  `birth_date` date DEFAULT NULL,
  `blood_group` varchar(45) DEFAULT NULL,
  `academic_performance` text,
  `extra_curricular_activities` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'','','','','','','','','',6,NULL,'dfsf@dd.com','2016-07-23','2016-07-23',1,6,3,NULL,NULL,'Eleven',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(2,'','','','','','','','','',6,NULL,'dfsf@dd.com','2016-07-23','2016-07-23',1,7,3,NULL,NULL,'Kg',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(3,'jbvn','bvnvb','bvn','bnvbn','','bvnvbn','bmvnm','','',6,'','bvdfsf@dd.com','2016-07-23','2016-07-29',1,8,3,0,NULL,'Kg',3,NULL,'','',NULL,'','','','',1,NULL,NULL,NULL,NULL),(4,'','','zxczc','czc','zxczxc','czxcz','zxc','','',5,NULL,'sdfds@f.com','2016-07-23','2016-07-23',1,9,7,NULL,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(5,'fgdf','fg','','','','','','','',6,NULL,'dfsdf@dd.com','2016-07-23','2016-07-23',1,10,7,1233,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(6,'jsdfsd','fs','','','','','','','',6,NULL,'sfdfs@f.com','2016-07-23','2016-07-23',1,11,7,2345,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(7,'','','','','','','','','',6,NULL,'dfsdf@dd.com','2016-07-23','2016-07-23',1,12,7,2345,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(8,'','','','','','','','','',5,NULL,'dfsff@dd.com','2016-07-23','2016-07-23',1,13,7,0,NULL,'Ten',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(9,'','','','','','','','','',NULL,NULL,'','2016-07-23','2016-07-23',1,14,7,0,NULL,'One',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(10,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-23','2016-07-23',1,15,7,2334,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(11,'sohel','ss','mokbul ','farmer','ferdousi','house wife','','01711082537','',NULL,NULL,'sohel.sarder@gmail.com','2016-07-24','2016-07-24',1,16,3,305022,NULL,'Eleven',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(12,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-25','2016-07-25',1,17,3,2334,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(13,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-25','2016-07-25',1,29,3,2334,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(14,'jpoo','fx','cvxcv','xcv','xcvx','xcv','zczc','xcv','xcv',8,NULL,'sdfs@f.com','2016-07-25','2016-07-25',1,22,3,2334,NULL,'One',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(15,'shakil','shakil','cbcvb','fvfbcb','cvb','','cbvc','bvc','cbvc',5,NULL,'d@f.vom','2016-07-25','2016-07-25',1,30,3,12345,NULL,'One',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(16,'shakil','shakil','cbcvb','fvfbcb','cvb','','cbvc','bvc','cbvc',5,NULL,'d@f.vom','2016-07-25','2016-07-25',1,31,3,12366,NULL,'One',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(17,'shakil','shakil','cbcvb','fvfbcb','cvb','','cbvc','bvc','cbvc',5,NULL,'d@f.vom','2016-07-25','2016-07-25',1,32,3,12377,NULL,'One',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(18,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,33,3,0,NULL,'Four',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(19,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,34,3,0,NULL,'Four',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(20,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,35,3,0,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(21,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,36,3,0,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(22,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,37,3,0,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(23,'','','','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,38,3,0,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(24,'sdad','','adad','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,39,3,0,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(25,'dfsdf','','sdfsf','','','','','','',NULL,NULL,'','2016-07-25','2016-07-25',1,40,3,0,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(26,'Sagar','Alam','fahad','govt service holder','Amena','Housewife','dhaka ,9/a , 45','01912773995','0192737377643',1,NULL,'sagar@yhaoo.com','2016-07-28','2016-07-28',1,43,3,0,NULL,'Three',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(27,'dg','','sdd','','','','019234456678','01912773995','',NULL,NULL,'dfsf@dd.com','2016-07-28','2016-07-28',1,45,3,0,NULL,'Seven',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(28,'sdd','','dd','','','','','ddd','',5,NULL,'dfsf@dd.com','2016-07-28','2016-07-28',1,47,3,0,NULL,'Nine',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(29,'hasib','mahmud','ahmed','govt service holder','Amena','Housewife','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl','01912773995','0172737377643',5,'Dhaka','dfsf@dd.com','2016-07-28','2016-07-30',1,48,3,555444,'40e397a60eb8d262a5ca568b76a6d8cd.jpg','Four',2,'a897936eee1f34d8de57515259caf046.jpg','Dak','1234',5,'Dhaka','45345345','Banani','NDC',1,NULL,NULL,NULL,NULL),(30,'Nhhd','Nou','fahad','govt service holder','dfsdf','Housewife','dhaka ,9/a , 45','01912773995','0192737377643',NULL,'dfgd dgd','','2016-07-29','2016-07-29',1,49,3,23244,'1a33d729f37d291cef706a629bd310e1.jpg','werwer',2,'33607bc214f05194f247d9faa4d6c2d8.jpg',NULL,'1234',4,'dhaka','45345345','','sdf dgdfg',0,NULL,NULL,NULL,NULL),(31,'prokashh','Singh','gabbar singh','Teacher','Gabbari','Teacher','dhaka ,9/a , 45','123455','5555',NULL,'dfgd dgd','proksh@dd.com','2016-07-29','2016-07-29',1,50,3,45,'5704a9a3fb3ec9b69dda216baf5aea42.jpg','Rajuk',3,'c095c1998aeffb68b1efed1b5e1ed9ec.jpg','prokash','2013',4,'Dhaka','rerer','err','NDC',0,NULL,NULL,NULL,NULL),(32,'Ajit','Alam','cbcvb','fvfbcb','Gabbari g','Housewife','dhaka ,9/a , 45 gt','019127739954','0172737377643',NULL,'Dhaka','ajit@yhaoo.com','2016-07-29','2016-08-02',1,51,3,234,'0b2bd4d1a9e9fcec7383d154698af844.jpg','Model School',3,'6e2ee4b9926434995a86804603d8ee1a.jpg','Ajit','2015',5,'Dhaka','12324','Uttara','NDC',1,NULL,NULL,NULL,NULL),(33,'pari','Pari','Jaki','govt service holder','Amena','','dhaka ,9/a , 45','bvc','0172737377643',NULL,'Khulna','par@yahoo.com','2016-07-29','2016-07-29',1,53,NULL,NULL,'ffd139841418934807a1d2b198685815.jpg','Adarsha',2,'7ca073cf70a495755cd6ba36e39a38c4.jpg','Pari','2013',5,'khulna','12324','Banani','Rajuk College',NULL,NULL,NULL,NULL,NULL),(34,'xvzxv','zxv','xzczxv','Teacher','','Teacher','','','sdsf',1,NULL,'','2016-07-31','2016-07-31',1,54,3,0,'e12971a69f5c26474b9c69a4f1b18eaf.jpg',NULL,NULL,'cbc5d253c97fa3bb80ea49a704b9c4e8.jpg','','2010',NULL,'Dhaka','','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(35,'fsefs','','dsfsdf','Teacher','','Teacher','','','',1,NULL,'','2016-08-02','2016-08-02',1,55,3,0,NULL,NULL,2,NULL,'','2010',NULL,'Dhaka','','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(36,'232','','sdsd','Teacher','sd','Teacher','sd','sdsd','',1,NULL,'','2016-08-02','2016-08-02',1,56,3,0,NULL,NULL,3,NULL,'2323','2010',NULL,'Dhaka','','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(37,'sdfasf','','sdfsf','Teacher','','Teacher','','','',1,NULL,'','2016-08-02','2016-08-02',1,57,3,NULL,NULL,NULL,2,NULL,'sfsdf','2010',NULL,'Dhaka','','Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(38,'numera','','mokbul','Private Service Holder','','Others','','','',8,NULL,'numera@gmail.com','2016-08-02','2016-08-02',1,58,3,NULL,'eec3ae4bc0b12a2dd134d31ea4f8041c.jpg',NULL,3,'d9c86f85af15a71afb40dae15cf591b4.jpg','','2010',NULL,'Dhaka','123456','Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(39,'rafiqu','','mozzmel','Teacher','sofia','Teacher','','01711082537','01711082537',1,NULL,'','2016-08-02','2016-08-02',1,59,3,678,'28d4e907f72b70b96d62b84836a82618.jpg',NULL,3,'8832481e4912a8ae9ae1cbd4e28f0464.jpg','','2010',3.7,'Comilla','987','Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(40,'dfdfd','','dfd','Teacher','df','Teacher','','','',1,NULL,'','2016-08-03','2016-08-03',1,60,NULL,NULL,'885dae7cd2beb1390121671b2a8c1d85.jpg',NULL,2,'fd1d0e913cae2a988c6d4fef0da197d6.jpg','','2010',NULL,'Dhaka','666','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(41,'wedfdg','gsdg','sdfgsdg','Teacher','','Teacher','','','',1,NULL,'','2016-08-03','2016-08-03',1,61,NULL,NULL,NULL,NULL,2,NULL,'sdfgsdg','2010',5,'Dhaka','','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(42,'sdfsf','','sfsf','Teacher','','Teacher','','','',1,NULL,'','2016-08-03','2016-08-03',1,62,NULL,NULL,NULL,NULL,2,NULL,'sf','2010',NULL,'Dhaka','','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(43,'dret','','dfgdfg','Teacher','xcvxxc','Teacher','','xcvx','',1,NULL,'','2016-08-03','2016-08-03',1,63,NULL,NULL,NULL,NULL,3,NULL,'gdfg','2010',NULL,'Dhaka','23456','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(44,'sdfsf','','fsf','Teacher','sfs','Teacher','','','',1,NULL,'','2016-08-03','2016-08-04',1,64,3,0,'71ff16159914242d479a9bd7398fac05.jpg',NULL,2,'db6bbc6b509c005ae84383509514a357.jpg','sdfsf','2010',55,'Dhaka','','Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(45,'shakil23','shakil','gofur1','Teacher','farida','Teacher','','01711082537','01711082537',8,NULL,'shakil@gmail.com','2016-08-03','2016-08-04',1,65,3,546,'d5a046f7853efd51999c77ea8b69b0f7.jpg',NULL,3,'dcb99b8350fc2da17110c4f30ce4e8ba.jpg','','2015',NULL,'Dhaka','01675','Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(46,'jonn','','Jonhu','Teacher','','Teacher','','','',8,NULL,'','2016-08-05','2016-08-05',1,69,69,NULL,'420a17374ecc4fa2cfe3f283b927783f.jpg',NULL,3,'51909a1cc70a3d30c70de3e16d40c010.jpg','','2010',4,'Comilla','45677878','Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(47,'Rahul','Roy','Himel','','jahanara','','dhaka ,9/a , 45 gt','','',1,NULL,'ra@yahoo.com','2016-08-06','2016-08-06',1,72,3,23456,'b42d13217b9d9044b7031cc507dccd2f.jpg',NULL,NULL,'337cf8dc31a0ac111034ec98cec8c702.jpg','','Admission',NULL,NULL,NULL,'Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(48,'prodip','roy','Promoto','Farmer','Dipaly','Housewife','dhaka ,9/a , 45 gt','01912773995','0192737377643',1,NULL,'dfsf@dd.com','2016-08-06','2016-08-06',1,73,3,123456,'c72de4129ee7a6857bfc145afd5fa6a6.jpg',NULL,NULL,'89020a843ef540fd7e2810db6a2c7392.jpg',NULL,'One',NULL,NULL,NULL,'Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(49,'pkkk','','asdasd','','','','','','',1,NULL,'','2016-08-06','2016-08-06',1,74,3,0,NULL,NULL,NULL,NULL,NULL,'Admission',NULL,NULL,NULL,'Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(50,'hhhh','','hhh','','','','','','',1,NULL,'','2016-08-06','2016-08-06',1,75,3,45699,NULL,NULL,NULL,NULL,NULL,'Admission',NULL,NULL,NULL,'Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(51,'kole','','hkjhk','','','','','','',1,NULL,'bvdfsf@dd.com','2016-08-07','2016-08-07',1,76,3,12345,NULL,NULL,NULL,NULL,NULL,'Admission',NULL,NULL,NULL,'Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(52,'dipika','','noren','','','','','01711082537','01711082537',6,NULL,'sohel.sarder@gmail.com','2016-08-08','2016-09-19',1,77,3,30502,NULL,NULL,NULL,NULL,NULL,'HSC',NULL,NULL,NULL,'Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(53,'ffffff','','fffff','','','','','','',1,NULL,'','2016-08-09','2016-08-09',1,78,3,234562,'fc8d16fb27454692e38323aa4e49f337.jpg',NULL,NULL,'2ce11bcf1dbe1707c6f020089f78368b.jpg',NULL,'Admission',NULL,NULL,NULL,'Shantinagar',NULL,1,NULL,NULL,NULL,NULL),(54,'dddddd','','dddddd','','','','','','',1,NULL,'','2016-08-09','2016-08-09',1,79,NULL,NULL,'d8f3fbbb4768bc5418b8b7f27647c92d.jpg',NULL,NULL,'3a7ca11460c070a9cb57b05a67f3d67e.jpg',NULL,'Admission',NULL,NULL,NULL,'Shantinagar',NULL,0,NULL,NULL,NULL,NULL),(55,'sdfsdf','','sdfsd','','','','','','',1,NULL,'sdfs@f.com','2016-09-28','2016-09-28',1,80,3,345678,NULL,NULL,NULL,NULL,NULL,'Admission',NULL,NULL,NULL,'B-',NULL,0,'2016-09-28',NULL,'df','sdf');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,13,2,'2016-07-29',34,3),(2,13,3,'2016-07-29',3,3),(3,13,1,'2016-07-29',3,3),(4,13,2,'2016-07-29',4,3),(5,13,3,'2016-07-29',4,3),(6,13,1,'2016-07-29',-2,3),(7,29,2,'2016-07-29',6,3),(8,29,1,'2016-07-29',6,3),(9,37,1,'2016-08-02',22,3),(10,38,3,'2016-08-02',200,3),(11,38,4,'2016-08-02',900,3),(12,39,1,'2016-08-02',100,3),(13,39,4,'2016-08-02',799,3),(14,39,1,'2016-08-02',NULL,3),(15,39,4,'2016-08-02',NULL,3),(16,45,1,'2016-08-03',34,3),(17,29,1,'2016-08-06',56,3),(18,29,2,'2016-08-06',NULL,3),(19,29,3,'2016-08-06',NULL,3),(20,51,13,'2016-08-07',2,3),(21,51,13,'2016-08-07',2,3),(22,51,13,'2016-08-07',NULL,3),(23,51,13,'2016-08-07',NULL,3),(24,51,12,'2016-08-07',3,3),(25,51,13,'2016-08-07',2,3),(26,51,13,'2016-08-07',2,3),(27,51,12,'2016-08-07',2,3),(28,51,13,'2016-08-07',3,3),(29,51,13,'2016-08-07',5,3),(30,51,12,'2016-08-07',6,3),(31,51,13,'2016-08-07',5,3),(32,51,13,'2016-08-07',5,3),(33,51,12,'2016-08-07',5,3),(34,51,13,'2016-08-07',33,3),(35,51,13,'2016-08-07',33,3),(36,51,12,'2016-08-07',3,3),(37,51,13,'2016-08-07',6,3),(38,51,13,'2016-08-07',7,3),(39,51,12,'2016-08-07',0,3),(40,52,12,'2016-08-08',200,3),(41,52,12,'2016-08-08',30,3),(42,53,1,'2016-08-09',22,3),(43,29,1,'2016-08-13',66,3),(44,29,2,'2016-08-13',NULL,3),(45,29,3,'2016-08-13',6,3);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Physics','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore ',400,1,'2016-07-22','2016-08-06',3,'PH','probir'),(2,'Chemistry','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl',600,1,'2016-07-22','2016-07-22',3,'CHE20330',NULL),(3,'Biology','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore ',400,1,'2016-07-22','2016-07-22',3,'Bio233',NULL),(4,'Math','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore',1000,1,'2016-07-29','2016-07-29',3,'M38','probir'),(5,'English Ist Paper','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore',1000,1,'2016-07-29','2016-07-29',3,'ENG101',NULL),(6,'English 2nd Paper','Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore',1000,1,'2016-07-29','2016-08-03',3,'ENG102','probir'),(7,'sdsd','',NULL,0,'2016-08-05','2016-08-05',3,'',NULL),(8,'Computer','',2000,1,'2016-08-05','2016-08-05',3,'121',NULL),(9,'English','',23345,1,'2016-08-06','2016-08-06',3,'ENG',NULL),(10,'Biology102','',34,1,'2016-08-06','2016-08-06',3,'345',NULL),(11,'sd','',1200,1,'2016-08-06','2016-08-06',3,'sd','probir'),(12,'asdfddf','nrrrrrrrrrrrr',2334,1,'2016-08-06','2016-08-06',3,'dfsd','probir'),(13,'wewe','',133,1,'2016-08-06','2016-08-06',3,'wewe','probir');
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (7,10,1,79,'2016-07-23','2016-07-23 14:44:17',NULL,7,1),(8,10,3,53,'2016-07-23','2016-07-23 14:44:17',NULL,7,1),(9,10,2,12,'2016-07-23','2016-07-23 14:44:17',NULL,7,1),(10,11,1,800,'2016-07-24','2016-07-24 19:58:54',NULL,3,1),(11,11,3,1100,'2016-07-24','2016-07-24 19:58:54',NULL,3,1),(12,13,1,400,'2016-07-25','2016-07-29 13:01:05','2016-07-29',3,1),(13,13,2,447,'2016-07-25','2016-07-29 13:01:05','2016-07-02',3,1),(14,14,1,23,'2016-07-25','2016-07-25 19:18:26',NULL,3,1),(15,14,2,232,'2016-07-25','2016-07-25 19:18:26',NULL,3,1),(16,14,3,2,'2016-07-25','2016-07-25 19:18:26',NULL,3,1),(17,13,3,119,'2016-07-25','2016-07-29 13:01:05','2016-07-26',3,1),(18,26,1,300,'2016-07-28','2016-07-28 22:22:08',NULL,3,1),(19,26,2,500,'2016-07-28','2016-07-28 22:22:08',NULL,3,1),(20,27,1,50,'2016-07-28','2016-07-28 22:52:35',NULL,3,1),(21,27,3,69,'2016-07-28','2016-07-28 22:52:35',NULL,3,1),(22,29,2,107,'2016-07-28','2016-08-13 09:12:06','2016-08-13',3,1),(23,29,1,259,'2016-07-28','2016-08-13 09:12:06','2016-08-30',3,1),(24,30,2,55,'2016-07-29','2016-07-29 10:46:35',NULL,3,1),(25,30,1,5,'2016-07-29','2016-07-29 10:46:35',NULL,3,1),(26,31,2,34,'2016-07-29','2016-07-29 11:03:21',NULL,3,1),(27,31,1,34,'2016-07-29','2016-07-29 11:03:21',NULL,3,1),(28,32,2,70,'2016-07-29','2016-07-29 11:58:42','2016-07-07',3,1),(29,32,1,70,'2016-07-29','2016-07-29 11:58:42','2016-07-27',3,1),(30,37,1,22,'2016-08-02','2016-08-02 18:59:14','2016-08-02',3,1),(31,38,3,200,'2016-08-02','2016-08-02 19:32:35','2016-08-31',3,1),(32,38,4,900,'2016-08-02','2016-08-02 19:32:35','2016-08-23',3,1),(33,39,1,100,'2016-08-02','2016-08-02 19:38:36','2016-08-10',3,1),(34,39,4,799,'2016-08-02','2016-08-02 19:38:36','2016-08-09',3,1),(35,45,1,34,'2016-08-03','2016-08-03 19:41:54','2016-08-09',3,1),(36,29,3,6,'2016-08-06','2016-08-13 09:12:06','2016-08-23',3,1),(37,51,13,54,'2016-08-07','2016-08-07 18:54:58','2016-08-09',3,1),(38,51,13,2,'2016-08-07','2016-08-07 18:38:36','2016-08-25',3,1),(39,51,12,19,'2016-08-07','2016-08-07 18:54:58','2016-08-09',3,1),(40,52,12,230,'2016-08-08','2016-08-08 19:34:41','2016-08-08',3,1),(41,53,1,22,'2016-08-09','2016-08-09 18:50:39','2016-08-09',3,1);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `expired` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notices`
--

LOCK TABLES `notices` WRITE;
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;
INSERT INTO `notices` VALUES (1,'Admission Notice','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. ',NULL,NULL,'2016-08-05',NULL,1),(2,'Result Publication 2016','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available, ',NULL,NULL,'2016-07-29',0,1),(3,'ffghf','hfghf',NULL,'2016-08-05','2016-08-05',3,1);
/*!40000 ALTER TABLE `notices` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_courses`
--

LOCK TABLES `student_courses` WRITE;
/*!40000 ALTER TABLE `student_courses` DISABLE KEYS */;
INSERT INTO `student_courses` VALUES (1,4,1,2,'2016-07-23','2016-07-23'),(2,4,3,2,'2016-07-23','2016-07-23'),(3,5,1,2,'2016-07-23','2016-07-23'),(4,5,2,2,'2016-07-23','2016-07-23'),(5,6,1,2,'2016-07-23','2016-07-23'),(6,6,3,2,'2016-07-23','2016-07-23'),(7,7,1,2,'2016-07-23','2016-07-23'),(8,7,2,2,'2016-07-23','2016-07-23'),(9,8,1,2,'2016-07-23','2016-07-23'),(10,9,1,3,'2016-07-23','2016-07-23'),(14,11,1,3,'2016-07-24','2016-07-24'),(15,11,3,3,'2016-07-24','2016-07-24'),(29,14,1,2,'2016-07-25','2016-07-25'),(30,14,2,2,'2016-07-25','2016-07-25'),(48,13,2,2,'2016-07-25','2016-07-25'),(49,13,3,2,'2016-07-25','2016-07-25'),(50,13,1,2,'2016-07-25','2016-07-25'),(51,17,1,3,'2016-07-25','2016-07-25'),(52,17,2,3,'2016-07-25','2016-07-25'),(53,26,1,2,'2016-07-28','2016-07-28'),(54,26,2,2,'2016-07-28','2016-07-28'),(55,27,1,2,'2016-07-28','2016-07-28'),(56,27,3,2,'2016-07-28','2016-07-28'),(57,28,1,NULL,'2016-07-28','2016-07-28'),(62,30,2,2,'2016-07-29','2016-07-29'),(63,30,1,2,'2016-07-29','2016-07-29'),(66,31,2,3,'2016-07-29','2016-07-29'),(67,31,1,3,'2016-07-29','2016-07-29'),(90,29,1,2,'2016-07-30','2016-07-30'),(91,29,2,2,'2016-07-30','2016-07-30'),(92,29,3,2,'2016-07-30','2016-07-30'),(95,32,2,3,'2016-08-02','2016-08-02'),(96,32,1,3,'2016-08-02','2016-08-02'),(97,36,1,3,'2016-08-02','2016-08-02'),(98,37,1,2,'2016-08-02','2016-08-02'),(99,38,3,3,'2016-08-02','2016-08-02'),(100,38,4,3,'2016-08-02','2016-08-02'),(101,39,1,3,'2016-08-02','2016-08-02'),(102,39,4,3,'2016-08-02','2016-08-02'),(103,45,1,3,'2016-08-03','2016-08-03'),(104,44,2,2,'2016-08-04','2016-08-04'),(105,44,3,2,'2016-08-04','2016-08-04'),(106,49,12,2,'2016-08-06','2016-08-06'),(107,50,12,2,'2016-08-06','2016-08-06'),(110,51,13,2,'2016-08-07','2016-08-07'),(111,51,13,3,'2016-08-07','2016-08-07'),(112,51,12,3,'2016-08-07','2016-08-07'),(114,53,1,2,'2016-08-09','2016-08-09'),(124,52,12,3,'2016-09-19','2016-09-19'),(125,52,13,2,'2016-09-19','2016-09-19'),(126,55,13,2,'2016-09-28','2016-09-28');
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

-- Dump completed on 2016-09-29 18:43:29
