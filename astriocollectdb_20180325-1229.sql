-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: astriocollectdb
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.04.1

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `currency_code` varchar(3) NOT NULL DEFAULT 'XAF',
  `opening_balance` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `bank_name` varchar(255) NOT NULL,
  `bank_phone` varchar(255) DEFAULT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,1,'Espèces - Cash','','XAF',0.0000,'Caisse Astrio',NULL,NULL,1,NULL,NULL),(2,1,'ISMACOM Exploitation ','09843-3453-457-5675','XAF',0.0000,'CCA - Credit Communautaire d\'Afrique','+237','Douala',1,1521885977,1521886070),(3,1,'ISMACOM Billing','09843-654645-765-56','XAF',100000.0000,'BICEC','+237','Douala',1,1521886056,1521886056),(4,1,'ISMACOM CC Business','65454-4564-455785-23','XAF',500000.0000,'UBA','+237','Douala',0,1521886141,1521886141);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activitylogs`
--

DROP TABLE IF EXISTS `activitylogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activitylogs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `action` enum('created','updated','deleted') NOT NULL,
  `log_type` varchar(50) NOT NULL,
  `log_type_title` mediumtext NOT NULL,
  `log_type_id` int(11) NOT NULL,
  `changes` mediumtext NOT NULL,
  `log_for` varchar(50) NOT NULL,
  `log_for_id` int(11) NOT NULL,
  `log_for2` varchar(50) NOT NULL,
  `log_for_id2` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitylogs`
--

LOCK TABLES `activitylogs` WRITE;
/*!40000 ALTER TABLE `activitylogs` DISABLE KEYS */;
INSERT INTO `activitylogs` VALUES (1,1,'created','client','Client  #1 : demo user',1,'a:14:{s:10:\"first_name\";s:4:\"demo\";s:9:\"last_name\";s:4:\"user\";s:7:\"user_id\";s:1:\"2\";s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:2:\"78\";s:5:\"email\";s:17:\"demouser@mail.com\";s:8:\"address1\";s:2:\"12\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:3:\"123\";s:10:\"created_at\";i:1521913898;s:2:\"id\";s:1:\"1\";}','Client',1,'User',2,NULL,1521913898,NULL),(2,1,'created','client','Client  #2 : acme demo',2,'a:14:{s:10:\"first_name\";s:4:\"acme\";s:9:\"last_name\";s:4:\"demo\";s:7:\"user_id\";i:4;s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:0:\"\";s:5:\"email\";s:26:\"acme2342123412@outlook.com\";s:8:\"address1\";s:2:\"21\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:2:\"12\";s:10:\"created_at\";i:1521915815;s:2:\"id\";s:1:\"2\";}','Client',2,'User',4,NULL,1521915815,NULL),(3,1,'created','client','Client  #3 : test demo',3,'a:14:{s:10:\"first_name\";s:4:\"test\";s:9:\"last_name\";s:4:\"demo\";s:7:\"user_id\";i:5;s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:1:\"4\";s:5:\"email\";s:17:\"eq123412@mail.com\";s:8:\"address1\";s:2:\"21\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:2:\"12\";s:10:\"created_at\";i:1521916972;s:2:\"id\";s:1:\"3\";}','Client',3,'User',5,NULL,1521916972,NULL),(4,1,'created','client','Client  #4 : testyxyx demosad',4,'a:14:{s:10:\"first_name\";s:8:\"testyxyx\";s:9:\"last_name\";s:7:\"demosad\";s:7:\"user_id\";i:6;s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:1:\"4\";s:5:\"email\";s:20:\"3212312yxy3@mail.com\";s:8:\"address1\";s:2:\"21\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:2:\"12\";s:10:\"created_at\";i:1521917009;s:2:\"id\";s:1:\"4\";}','Client',4,'User',6,NULL,1521917009,NULL),(5,1,'created','client','Client  #5 : testyxsdfsdf demosad',5,'a:14:{s:10:\"first_name\";s:12:\"testyxsdfsdf\";s:9:\"last_name\";s:7:\"demosad\";s:7:\"user_id\";i:7;s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:1:\"4\";s:5:\"email\";s:12:\"xy3@mail.com\";s:8:\"address1\";s:2:\"21\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:2:\"12\";s:10:\"created_at\";i:1521917155;s:2:\"id\";s:1:\"5\";}','Client',5,'User',7,NULL,1521917155,NULL),(6,1,'created','client','Client  #6 : testdemo01 NAME',6,'a:14:{s:10:\"first_name\";s:10:\"testdemo01\";s:9:\"last_name\";s:4:\"NAME\";s:7:\"user_id\";i:8;s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:1:\"0\";s:5:\"email\";s:10:\"my@mail.co\";s:8:\"address1\";s:6:\"Douala\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:2:\"as\";s:10:\"created_at\";i:1521917192;s:2:\"id\";s:1:\"6\";}','Client',6,'User',8,NULL,1521917192,NULL),(7,1,'created','client','Client  #7 : testdemo01asaa NAMEsas',7,'a:14:{s:10:\"first_name\";s:14:\"testdemo01asaa\";s:9:\"last_name\";s:7:\"NAMEsas\";s:7:\"user_id\";s:1:\"9\";s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:1:\"0\";s:5:\"email\";s:11:\"may@mail.co\";s:8:\"address1\";s:6:\"Douala\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:2:\"as\";s:10:\"created_at\";i:1521917536;s:2:\"id\";s:1:\"7\";}','Client',7,'User',9,NULL,1521917536,NULL),(8,1,'created','client','Client  #8 : Tafam Rogo',8,'a:14:{s:10:\"first_name\";s:5:\"Tafam\";s:9:\"last_name\";s:4:\"Rogo\";s:7:\"user_id\";s:2:\"10\";s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:1:\"9\";s:5:\"email\";s:16:\"a.tagne@mail.com\";s:8:\"address1\";s:1:\"1\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:1:\"2\";s:10:\"created_at\";i:1521917645;s:2:\"id\";s:1:\"8\";}','Client',8,'User',10,NULL,1521917645,NULL),(9,1,'created','client','Client  #9 : Step Mbarga',9,'a:14:{s:10:\"first_name\";s:4:\"Step\";s:9:\"last_name\";s:6:\"Mbarga\";s:7:\"user_id\";s:2:\"11\";s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:6:\"2342§\";s:5:\"email\";s:14:\"steph@mail.com\";s:8:\"address1\";s:5:\"12312\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:15:\"193981239032132\";s:10:\"created_at\";i:1521917922;s:2:\"id\";s:1:\"9\";}','Client',9,'User',11,NULL,1521917922,NULL),(10,1,'created','client','Client  #10 : Cosette Essoumam',10,'a:14:{s:10:\"first_name\";s:7:\"Cosette\";s:9:\"last_name\";s:8:\"Essoumam\";s:7:\"user_id\";s:2:\"12\";s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:3:\"098\";s:5:\"email\";s:15:\"costte@mail.com\";s:8:\"address1\";s:2:\"12\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:4:\"2342\";s:10:\"created_at\";i:1521918069;s:2:\"id\";s:2:\"10\";}','Client',10,'User',12,NULL,1521918069,NULL),(11,1,'created','Contribution','12000 XAF',6,'a:12:{s:10:\"company_id\";s:1:\"1\";s:9:\"budget_id\";s:1:\"6\";s:7:\"paid_at\";s:19:\"2018-03-24 09:00:00\";s:6:\"amount\";s:5:\"12000\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";s:1:\"1\";s:11:\"description\";s:16:\"Collecte du jour\";s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:8:\"collecte\";s:10:\"updated_at\";i:1521918198;s:10:\"created_at\";i:1521918198;s:2:\"id\";s:1:\"6\";}','Client',6,'Company',1,NULL,1521918198,NULL),(12,1,'created','Contribution','5000 XAF',7,'a:12:{s:10:\"company_id\";s:1:\"1\";s:9:\"budget_id\";s:2:\"12\";s:7:\"paid_at\";s:19:\"2018-03-23 20:22:01\";s:6:\"amount\";s:4:\"5000\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";s:1:\"1\";s:11:\"description\";s:16:\"Collecte du jour\";s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:3:\"CLT\";s:10:\"updated_at\";i:1521919776;s:10:\"created_at\";i:1521919776;s:2:\"id\";s:1:\"7\";}','Client',12,'Company',1,NULL,1521919776,NULL),(13,1,'created','Contribution','5000 XAF',8,'a:12:{s:10:\"company_id\";s:1:\"1\";s:9:\"budget_id\";s:2:\"12\";s:7:\"paid_at\";s:19:\"2018-03-24 20:22:00\";s:6:\"amount\";s:4:\"5000\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";s:1:\"1\";s:11:\"description\";s:8:\"Collecte\";s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:4:\"test\";s:10:\"updated_at\";i:1521920686;s:10:\"created_at\";i:1521920686;s:2:\"id\";s:1:\"8\";}','Client',12,'Company',1,NULL,1521920686,NULL),(14,1,'created','Contribution','10000 XAF',11,'a:16:{s:10:\"company_id\";s:1:\"1\";s:9:\"budget_id\";s:2:\"10\";s:6:\"status\";s:4:\"paid\";s:10:\"created_by\";s:1:\"1\";s:11:\"category_id\";i:1;s:4:\"type\";s:6:\"credit\";s:7:\"paid_at\";s:19:\"2018-03-25 08:29:01\";s:6:\"amount\";s:5:\"10000\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";s:1:\"1\";s:11:\"description\";s:15:\"demo activities\";s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:16:\"Collecte du jour\";s:10:\"updated_at\";i:1521963872;s:10:\"created_at\";i:1521963872;s:2:\"id\";s:2:\"11\";}','Client',10,'Company',1,NULL,1521963872,NULL),(15,1,'created','Transaction','10000 XAF',16,'a:11:{s:15:\"from_account_id\";i:0;s:13:\"to_account_id\";i:1;s:6:\"amount\";s:5:\"10000\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";i:1;s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:193:\"a:5:{s:6:\"client\";s:16:\"Cosette Essoumam\";s:9:\"reference\";s:16:\"Collecte du jour\";s:11:\"description\";s:15:\"demo activities\";s:6:\"status\";s:4:\"paid\";s:8:\"category\";s:21:\"Collecte Journalière\";}\";s:4:\"type\";i:1;s:10:\"updated_at\";i:1521963872;s:10:\"created_at\";i:1521963872;s:2:\"id\";s:2:\"16\";}','From Account',0,'To Account',1,NULL,1521963872,NULL),(16,1,'created','Contribution','3500 XAF',12,'a:16:{s:10:\"company_id\";s:1:\"1\";s:9:\"budget_id\";s:2:\"10\";s:6:\"status\";s:4:\"paid\";s:10:\"created_by\";s:1:\"1\";s:11:\"category_id\";i:1;s:4:\"type\";s:6:\"credit\";s:7:\"paid_at\";s:19:\"2018-03-25 08:45:01\";s:6:\"amount\";s:4:\"3500\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";s:1:\"1\";s:11:\"description\";s:22:\"test  collecte du jour\";s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:16:\"Collecte du jour\";s:10:\"updated_at\";i:1521964173;s:10:\"created_at\";i:1521964173;s:2:\"id\";s:2:\"12\";}','Client',10,'Company',1,NULL,1521964173,NULL),(17,1,'created','Transaction','3500 XAF',17,'a:11:{s:15:\"from_account_id\";i:0;s:13:\"to_account_id\";i:1;s:6:\"amount\";s:4:\"3500\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";i:1;s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:200:\"a:5:{s:6:\"client\";s:16:\"Cosette Essoumam\";s:9:\"reference\";s:16:\"Collecte du jour\";s:11:\"description\";s:22:\"test  collecte du jour\";s:6:\"status\";s:4:\"paid\";s:8:\"category\";s:21:\"Collecte Journalière\";}\";s:4:\"type\";i:1;s:10:\"updated_at\";i:1521964173;s:10:\"created_at\";i:1521964173;s:2:\"id\";s:2:\"17\";}','From Account',0,'To Account',1,NULL,1521964173,NULL),(18,2,'created','Client','Client  #11 : Léo Paul Tarto',11,'a:14:{s:10:\"first_name\";s:9:\"Léo Paul\";s:9:\"last_name\";s:5:\"Tarto\";s:7:\"user_id\";s:2:\"13\";s:7:\"role_id\";i:6;s:10:\"jobtile_id\";i:6;s:10:\"company_id\";i:1;s:3:\"tel\";s:4:\"+237\";s:5:\"email\";s:18:\"leo.tarto@mail.com\";s:8:\"address1\";s:6:\"Douala\";s:8:\"address2\";s:1:\" \";s:11:\"avatar_file\";s:1:\" \";s:5:\"notes\";s:8:\"détails\";s:10:\"created_at\";i:1521970718;s:2:\"id\";s:2:\"11\";}','Client',11,'User',13,NULL,1521970718,NULL),(19,2,'created','Contribution','12500 XAF',13,'a:16:{s:10:\"company_id\";s:1:\"1\";s:9:\"budget_id\";s:2:\"11\";s:6:\"status\";s:4:\"paid\";s:10:\"created_by\";s:1:\"2\";s:11:\"category_id\";i:1;s:4:\"type\";s:6:\"credit\";s:7:\"paid_at\";s:19:\"2018-03-25 10:42:00\";s:6:\"amount\";s:5:\"12500\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";s:1:\"1\";s:11:\"description\";s:7:\"Dépot \";s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:16:\"Collecte du jour\";s:10:\"updated_at\";i:1521971075;s:10:\"created_at\";i:1521971075;s:2:\"id\";s:2:\"13\";}','Client',11,'Company',1,NULL,1521971075,NULL),(20,2,'created','Transaction','12500 XAF',18,'a:11:{s:15:\"from_account_id\";i:0;s:13:\"to_account_id\";i:1;s:6:\"amount\";s:5:\"12500\";s:13:\"currency_code\";s:3:\"XAF\";s:13:\"currency_rate\";i:1;s:14:\"payment_method\";s:4:\"cash\";s:9:\"reference\";s:183:\"a:5:{s:6:\"client\";s:15:\"Léo Paul Tarto\";s:9:\"reference\";s:16:\"Collecte du jour\";s:11:\"description\";s:7:\"Dépot \";s:6:\"status\";s:4:\"paid\";s:8:\"category\";s:21:\"Collecte Journalière\";}\";s:4:\"type\";i:1;s:10:\"updated_at\";i:1521971075;s:10:\"created_at\";i:1521971075;s:2:\"id\";s:2:\"18\";}','From Account',0,'To Account',1,NULL,1521971075,NULL);
/*!40000 ALTER TABLE `activitylogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `read_by` mediumtext,
  `share_with` mediumtext,
  `title` text NOT NULL,
  `description` mediumtext NOT NULL,
  `file` longtext NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgets`
--

LOCK TABLES `budgets` WRITE;
/*!40000 ALTER TABLE `budgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,1,'Collecte Journalière','Cotisation','#fc4545',1),(2,1,'Depot à terme','Cotisation','#564564',1),(3,1,'Tenue de livret','Frais','#c5c5c5',1),(4,1,'Ouverture de compte','Frais','#f3f3f3',1),(5,1,'Retrait Client','Payment','#333333',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` mediumtext NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `chat_message_id` int(11) DEFAULT NULL,
  `private` tinyint(1) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jobtile_id` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `avatar_file` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'demo','user',2,1,6,6,'78','demouser@mail.com','12',' ',' ','123',NULL,1521913898,NULL),(2,'acme','demo',4,1,6,6,'','acme2342123412@outlook.com','21',' ',' ','12',NULL,1521915815,NULL),(3,'test','demo',5,1,6,6,'4','eq123412@mail.com','21',' ',' ','12',NULL,1521916972,NULL),(4,'testyxyx','demosad',6,1,6,6,'4','3212312yxy3@mail.com','21',' ',' ','12',NULL,1521917009,NULL),(5,'testyxsdfsdf','demosad',7,1,6,6,'4','xy3@mail.com','21',' ',' ','12',NULL,1521917155,NULL),(6,'testdemo01','NAME',8,1,6,6,'0','my@mail.co','Douala',' ',' ','as',NULL,1521917192,NULL),(7,'testdemo01asaa','NAMEsas',9,1,6,6,'0','may@mail.co','Douala',' ',' ','as',NULL,1521917536,NULL),(8,'Tafam','Rogo',10,1,6,6,'9','a.tagne@mail.com','1',' ',' ','2',NULL,1521917645,NULL),(9,'Step','Mbarga',11,1,6,6,'2342§','steph@mail.com','12312',' ',' ','193981239032132',NULL,1521917922,NULL),(10,'Cosette','Essoumam',12,1,6,6,'098','costte@mail.com','12',' ',' ','2342',NULL,1521918069,NULL),(11,'Léo Paul','Tarto',13,1,6,6,'+237','leo.tarto@mail.com','Douala',' ',' ','détails',NULL,1521970718,NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contributions`
--

DROP TABLE IF EXISTS `contributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contributions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `paid_at` datetime NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `currency_rate` decimal(15,8) NOT NULL,
  `description` text NOT NULL,
  `payment_method` enum('cash','cheque','cb','bankwire','ecash','other') NOT NULL,
  `reference` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `type` enum('credit','debit') NOT NULL,
  `status` enum('paid','cancelled','scheduled','partial') NOT NULL DEFAULT 'paid',
  `created_by` int(11) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributions`
--

LOCK TABLES `contributions` WRITE;
/*!40000 ALTER TABLE `contributions` DISABLE KEYS */;
INSERT INTO `contributions` VALUES (1,1,1,'2018-03-24 14:04:00',5000.0000,'XAF',1.00000000,'demo','cash','sdf',1521886283,1521886283,'credit','paid',2,NULL,1),(2,1,1,'2018-03-23 10:00:01',3000.0000,'XAF',1.00000000,'demo','cash','Collecte du jour',1521886686,1521886686,'credit','paid',2,NULL,1),(3,1,1,'2018-03-22 10:00:01',2000.0000,'XAF',1.00000000,'demo','cash','Collecte du jour',1521886805,1521886805,'credit','paid',1,NULL,1),(4,1,1,'2018-03-21 10:00:01',1500.0000,'XAF',1.00000000,'demo','cash','Collecte du jour',1521886957,1521886957,'credit','paid',1,NULL,1),(5,1,1,'2018-03-21 09:00:00',1000.0000,'XAF',1.00000000,'demo','cash','Collecte du jour',1521887075,1521887075,'credit','paid',1,NULL,1),(6,1,6,'2018-03-24 09:00:00',12000.0000,'XAF',1.00000000,'Collecte du jour','cash','collecte',1521918198,1521918198,'credit','paid',1,NULL,1),(7,1,10,'2018-03-23 20:22:01',5000.0000,'XAF',1.00000000,'Collecte du jour','cash','CLT',1521919776,1521920741,'credit','paid',1,NULL,1),(8,1,10,'2018-03-24 20:22:00',5000.0000,'XAF',1.00000000,'Collecte','cash','test',1521920686,1521920731,'credit','paid',2,NULL,1),(9,1,10,'2018-03-25 00:28:00',3000.0000,'XAF',1.00000000,'retrait','cash','demo retrait',1521930686,NULL,'debit','paid',2,NULL,5),(11,1,10,'2018-03-25 08:29:01',10000.0000,'XAF',1.00000000,'demo activities','cash','Collecte du jour',1521963872,1521963872,'credit','paid',1,NULL,1),(12,1,10,'2018-03-25 08:45:01',3500.0000,'XAF',1.00000000,'test  collecte du jour','cash','Collecte du jour',1521964173,1521964173,'credit','paid',1,NULL,1),(13,1,11,'2018-03-25 10:42:00',12500.0000,'XAF',1.00000000,'Dépot ','cash','Collecte du jour',1521971075,1521971075,'credit','paid',2,NULL,1);
/*!40000 ALTER TABLE `contributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jobtile_id` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `avatar_file` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Franck','Elombat',1,1,1,'+237 6 931 279 82','f.elombat@gmail.com','Rue des Paves, Douala','LIT ','profile_franck.png',' - ',NULL,1521125327,NULL,0),(2,'ChanceLine','MOKENG',2,1,4,'+237 6 7538 3026','c.mokeng@gmail.com','Rue des Paves, Douala','LIT ','profile_chance.png',' - ',NULL,1521160337,NULL,1);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` mediumtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location` mediumtext,
  `labels` text,
  `share_with` longtext,
  `color` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `recurring` tinyint(1) NOT NULL,
  `repeat_every` int(11) NOT NULL,
  `no_of_cycles` int(11) NOT NULL,
  `last_start_date` date DEFAULT NULL,
  `repeat_type` enum('days','weeks','months','years') DEFAULT NULL,
  `recurring_dates` longtext NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `paid_at` date NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `currency_rate` decimal(15,8) NOT NULL,
  `reference` text,
  `description` text,
  `payment_method` enum('cash','cheque','cb','bankwire','ecash','other') NOT NULL DEFAULT 'cheque',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_loadings`
--

DROP TABLE IF EXISTS `items_loadings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_loadings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `loading_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_loadings`
--

LOCK TABLES `items_loadings` WRITE;
/*!40000 ALTER TABLE `items_loadings` DISABLE KEYS */;
/*!40000 ALTER TABLE `items_loadings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobtitles`
--

DROP TABLE IF EXISTS `jobtitles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobtitles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobtitles`
--

LOCK TABLES `jobtitles` WRITE;
/*!40000 ALTER TABLE `jobtitles` DISABLE KEYS */;
INSERT INTO `jobtitles` VALUES (1,'DBA',1516977467,1516977467),(2,'IT Support',1516977483,1516977483),(3,'IT Consultant',1516977504,1516977504),(4,'Business Manager',1516977504,1516977504),(5,'Area Sales Supervisor',1516977504,1516977504);
/*!40000 ALTER TABLE `jobtitles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loadings`
--

DROP TABLE IF EXISTS `loadings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loadings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `item_id` int(11) NOT NULL,
  `machenery_id` int(11) NOT NULL,
  `silo_id` int(11) NOT NULL,
  `weight` decimal(10,3) NOT NULL,
  `unit` enum('kt','t','kg','m3') NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `canceled` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loadings`
--

LOCK TABLES `loadings` WRITE;
/*!40000 ALTER TABLE `loadings` DISABLE KEYS */;
/*!40000 ALTER TABLE `loadings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` mediumtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location` mediumtext,
  `labels` text,
  `share_with` longtext,
  `attendance_list` longtext NOT NULL,
  `summary` mediumtext NOT NULL,
  `color` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time NOT NULL,
  `recurring` tinyint(1) NOT NULL,
  `repeat_every` int(11) NOT NULL,
  `no_of_cycles` int(11) NOT NULL,
  `last_start_date` date DEFAULT NULL,
  `repeat_type` enum('days','weeks','months','years') DEFAULT NULL,
  `recurring_dates` longtext NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings_todos`
--

DROP TABLE IF EXISTS `meetings_todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings_todos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) NOT NULL,
  `todo_id` int(11) NOT NULL,
  `action_owner_id` int(11) NOT NULL,
  `contributors` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings_todos`
--

LOCK TABLES `meetings_todos` WRITE;
/*!40000 ALTER TABLE `meetings_todos` DISABLE KEYS */;
/*!40000 ALTER TABLE `meetings_todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `form_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `status` enum('unread','read') NOT NULL,
  `message_id` int(11) DEFAULT NULL,
  `files` longtext NOT NULL,
  `deleted_by_users` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('package','auth','001_auth_create_usertables'),('package','auth','002_auth_create_grouptables'),('package','auth','003_auth_create_roletables'),('package','auth','004_auth_create_permissiontables'),('package','auth','005_auth_create_authdefaults'),('package','auth','006_auth_add_authactions'),('package','auth','007_auth_add_permissionsfilter'),('package','auth','008_auth_create_providers'),('package','auth','009_auth_create_oauth2tables'),('package','auth','010_auth_fix_jointables'),('app','default','001_create_employees'),('app','default','002_create_jobtitles'),('app','default','003_create_activitylogs'),('app','default','004_create_posts'),('app','default','005_create_todos'),('app','default','006_create_announcements'),('app','default','007_create_settings'),('app','default','008_create_messages'),('app','default','009_create_chats'),('app','default','010_create_categories'),('app','default','011_create_items'),('app','default','012_create_vendors'),('app','default','013_create_loadings'),('app','default','014_create_sites'),('app','default','017_create_companies'),('app','default','018_create_transactions'),('app','default','019_create_items_loadings'),('app','default','021_add_company_id_to_employees'),('app','default','022_create_accounts'),('app','default','023_create_budgets'),('app','default','024_create_contributions'),('app','default','025_create_expenses'),('app','default','026_create_events'),('app','default','027_create_meetings'),('app','default','028_create_meetings_todos'),('app','default','029_create_clients'),('app','default','030_add_fields_to_contributions');
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `post_id` int(11) NOT NULL,
  `share_with` text,
  `files` longtext,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL,
  `previous_id` varchar(40) NOT NULL,
  `user_agent` text NOT NULL,
  `ip_hash` char(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  `payload` longtext NOT NULL,
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `previous_id` (`previous_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1f967990f830412abc78cf92dc6ff4eb','1f967990f830412abc78cf92dc6ff4eb','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521972302,1521972302,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"1f967990f830412abc78cf92dc6ff4eb\";s:11:\"previous_id\";s:32:\"1f967990f830412abc78cf92dc6ff4eb\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521972302;s:7:\"updated\";i:1521972302;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"19a14e604c38fae934cbc9be8201afac31021f7f\";}}}'),('1f9a54cce7c2e681a9dd2292b19b3e62','1f9a54cce7c2e681a9dd2292b19b3e62','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977954,1521977954,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"1f9a54cce7c2e681a9dd2292b19b3e62\";s:11:\"previous_id\";s:32:\"1f9a54cce7c2e681a9dd2292b19b3e62\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977954;s:7:\"updated\";i:1521977954;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"3d9db5139f2797fe7dc6129496046605d70ba3b9\";}}}'),('21dc0316131145be21546e0d3dace9fb','21dc0316131145be21546e0d3dace9fb','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977950,1521977950,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"21dc0316131145be21546e0d3dace9fb\";s:11:\"previous_id\";s:32:\"21dc0316131145be21546e0d3dace9fb\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977950;s:7:\"updated\";i:1521977950;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"69eae7de76baa1a55cc4cbf5a1f3fc8b6afc9f52\";}}}'),('280efadfd93cdddf7f7e23853adcc00f','280efadfd93cdddf7f7e23853adcc00f','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977947,1521977947,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"280efadfd93cdddf7f7e23853adcc00f\";s:11:\"previous_id\";s:32:\"280efadfd93cdddf7f7e23853adcc00f\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977947;s:7:\"updated\";i:1521977947;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"ed1d08ff77d02cc7df8f8266d99591e1c498e67b\";}}}'),('2e46a69dd463b2b12c64cd0a58a56f3f','2e46a69dd463b2b12c64cd0a58a56f3f','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521971406,1521971406,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"2e46a69dd463b2b12c64cd0a58a56f3f\";s:11:\"previous_id\";s:32:\"2e46a69dd463b2b12c64cd0a58a56f3f\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521971406;s:7:\"updated\";i:1521971406;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"d477c2410d86489c9974e6a4f2f27179e892818c\";}}}'),('62056610bea2da6003e78048943dadd2','62056610bea2da6003e78048943dadd2','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521972302,1521972302,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"62056610bea2da6003e78048943dadd2\";s:11:\"previous_id\";s:32:\"62056610bea2da6003e78048943dadd2\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521972302;s:7:\"updated\";i:1521972302;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"6eb695e14c57ed773526f2a4f192f5f814bcedc2\";}}}'),('638a314295cff8543525a1589651a64c','638a314295cff8543525a1589651a64c','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977950,1521977950,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"638a314295cff8543525a1589651a64c\";s:11:\"previous_id\";s:32:\"638a314295cff8543525a1589651a64c\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977950;s:7:\"updated\";i:1521977950;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"5e962efcd00b3cc8b895138bf1c856b0773a5f2d\";}}}'),('6563afe5921a648a71a2c27a221d055e','6563afe5921a648a71a2c27a221d055e','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521973199,1521973199,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"6563afe5921a648a71a2c27a221d055e\";s:11:\"previous_id\";s:32:\"6563afe5921a648a71a2c27a221d055e\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521973199;s:7:\"updated\";i:1521973199;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"72ae4c279a5f4f344c81cdb9b269d224dbc89661\";}}}'),('9579d8d463588d694efa75a087f642a3','9579d8d463588d694efa75a087f642a3','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977947,1521977947,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"9579d8d463588d694efa75a087f642a3\";s:11:\"previous_id\";s:32:\"9579d8d463588d694efa75a087f642a3\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977947;s:7:\"updated\";i:1521977947;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"3b2d36823840f27f358b3de8f6f8f80546cd73a6\";}}}'),('9d4b57609e306cb48723fee2992f9930','9d4b57609e306cb48723fee2992f9930','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977913,1521977913,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"9d4b57609e306cb48723fee2992f9930\";s:11:\"previous_id\";s:32:\"9d4b57609e306cb48723fee2992f9930\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977913;s:7:\"updated\";i:1521977913;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"c36dc8ec2695f8eb91b79504a43ce79542e29ae6\";}}}'),('aa10283cf205a4637322e45b67d0d6ff','aa10283cf205a4637322e45b67d0d6ff','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977913,1521977913,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"aa10283cf205a4637322e45b67d0d6ff\";s:11:\"previous_id\";s:32:\"aa10283cf205a4637322e45b67d0d6ff\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977913;s:7:\"updated\";i:1521977913;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"fa1853ce1ae2ab8b37f1a7bf22f186ee65f93e90\";}}}'),('bec52042bb775cc51396c5e3d18a36e4','bec52042bb775cc51396c5e3d18a36e4','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521973203,1521973203,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"bec52042bb775cc51396c5e3d18a36e4\";s:11:\"previous_id\";s:32:\"bec52042bb775cc51396c5e3d18a36e4\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521973203;s:7:\"updated\";i:1521973203;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"6842af799ccdd2857d5c7e9eec028e9341a5caa4\";}}}'),('c1a70e618a62ae4bdb0c5013b5c8d3e1','c1a70e618a62ae4bdb0c5013b5c8d3e1','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521973199,1521973199,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"c1a70e618a62ae4bdb0c5013b5c8d3e1\";s:11:\"previous_id\";s:32:\"c1a70e618a62ae4bdb0c5013b5c8d3e1\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521973199;s:7:\"updated\";i:1521973199;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"605370907297adfbc6d6cd2327fff6556cd9e4ae\";}}}'),('ca402b82dd08411b53f8ac1df7bba96c','24b2039e0d872d6da846236f286ce8f5','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521975029,1521975059,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"ca402b82dd08411b53f8ac1df7bba96c\";s:11:\"previous_id\";s:32:\"24b2039e0d872d6da846236f286ce8f5\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521975029;s:7:\"updated\";i:1521975059;s:7:\"payload\";s:0:\"\";}i:1;a:3:{s:17:\"returning_visitor\";N;s:8:\"username\";s:8:\"c.mokeng\";s:10:\"login_hash\";s:40:\"ba3dbd00be359b0d0f4a22586532d47203eebdd6\";}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"0b9f8b68b37b170135f5ccd06304e92db39eee6b\";}}}'),('db6bcf3c49d7583f124420c537b62170','db6bcf3c49d7583f124420c537b62170','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521977953,1521977953,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"db6bcf3c49d7583f124420c537b62170\";s:11:\"previous_id\";s:32:\"db6bcf3c49d7583f124420c537b62170\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521977953;s:7:\"updated\";i:1521977953;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"7ccf65bbf0441020f6d190535410054eaf4ff70f\";}}}'),('f755faf91d3827473b0d2d091128da18','f755faf91d3827473b0d2d091128da18','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521973203,1521973203,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"f755faf91d3827473b0d2d091128da18\";s:11:\"previous_id\";s:32:\"f755faf91d3827473b0d2d091128da18\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521973203;s:7:\"updated\";i:1521973203;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"354b93618e089089d8858c6d8b2fb1694a90c03c\";}}}'),('fc207eb99eebb8c0b5827ed253c70c04','fc207eb99eebb8c0b5827ed253c70c04','Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0','4869e012aa045958bdf5c461577cf02d',1521971406,1521971406,'a:3:{i:0;a:7:{s:10:\"session_id\";s:32:\"fc207eb99eebb8c0b5827ed253c70c04\";s:11:\"previous_id\";s:32:\"fc207eb99eebb8c0b5827ed253c70c04\";s:7:\"ip_hash\";s:32:\"4869e012aa045958bdf5c461577cf02d\";s:10:\"user_agent\";s:68:\"Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0\";s:7:\"created\";i:1521971406;s:7:\"updated\";i:1521971406;s:7:\"payload\";s:0:\"\";}i:1;a:1:{s:17:\"returning_visitor\";N;}i:2;a:1:{s:29:\"flash::__session_identifier__\";a:2:{s:5:\"state\";s:6:\"expire\";s:5:\"value\";s:40:\"68bcd2c65b3945cd3ba1d1801db1a2604daad28c\";}}}');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(100) NOT NULL,
  `setting_value` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `todos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` mediumtext,
  `labels` text,
  `status` enum('to_do','done','pending') NOT NULL,
  `start_date` date NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todos`
--

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `currency_rate` decimal(15,8) NOT NULL,
  `payment_method` enum('cash','cheque','cb','bankwire','ecash','other') NOT NULL DEFAULT 'cheque',
  `reference` text,
  `type` tinyint(1) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,1,0,3000.0000,'XAF',1.00000000,'cash','0',0,1521918069,NULL,NULL),(2,0,1,5000.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(3,0,1,5000.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(4,0,1,12000.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(5,0,1,5000.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(6,0,1,3000.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(7,0,1,2000.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(8,0,1,1500.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(9,0,1,1000.0000,'XAF',1.00000000,'cash','0',1,NULL,NULL,NULL),(10,1,2,7500.0000,'XAF',1.00000000,'cash','test',0,NULL,NULL,1),(12,1,3,4000.0000,'XAF',1.00000000,'cash','demo',0,NULL,NULL,1),(13,4,2,45000.0000,'XAF',1.00000000,'cash','demo02',0,NULL,NULL,1),(14,1,2,4500.0000,'XAF',1.00000000,'cash','test2123',0,NULL,NULL,1),(15,1,2,30000.0000,'XAF',1.00000000,'cash','transfert',0,1521918399,NULL,NULL),(16,0,1,10000.0000,'XAF',1.00000000,'cash','a:5:{s:6:\"client\";s:16:\"Cosette Essoumam\";s:9:\"reference\";s:16:\"Collecte du jour\";s:11:\"description\";s:15:\"demo activities\";s:6:\"status\";s:4:\"paid\";s:8:\"category\";s:21:\"Collecte Journalière\";}',1,1521963872,1521963872,NULL),(17,0,1,3500.0000,'XAF',1.00000000,'cash','a:5:{s:6:\"client\";s:16:\"Cosette Essoumam\";s:9:\"reference\";s:16:\"Collecte du jour\";s:11:\"description\";s:22:\"test  collecte du jour\";s:6:\"status\";s:4:\"paid\";s:8:\"category\";s:21:\"Collecte Journalière\";}',1,1521964173,1521964173,NULL),(18,0,1,12500.0000,'XAF',1.00000000,'cash','a:5:{s:6:\"client\";s:15:\"Léo Paul Tarto\";s:9:\"reference\";s:16:\"Collecte du jour\";s:11:\"description\";s:7:\"Dépot \";s:6:\"status\";s:4:\"paid\";s:8:\"category\";s:21:\"Collecte Journalière\";}',1,1521971075,1521971075,NULL),(19,1,2,20000.0000,'XAF',1.00000000,'cash','test traansaction vers Compte Exploitation',0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'f.elombat','x7eqOm85uffMxQamQPNwBhNKT/Wq4NQzWHvfmBYEOVk=',100,'f.elombat@gmail.com','1521958118','5c921ad797ecb255f811958fe1edb1b5e679e84d','a:2:{s:8:\"fullname\";s:14:\"Franck Elombat\";s:8:\"jobtitle\";s:3:\"CTO\";}',1521125327,0),(2,'c.mokeng','lk5bOyecMISvGb5wp0PFA3BmSiWh5KYHaRXKcicwEAQ=',70,'c.mokeng@gmail.com','1521970577','ba3dbd00be359b0d0f4a22586532d47203eebdd6','a:1:{s:8:\"fullanme\";s:17:\"Chanceline Mokeng\";}',1521159728,0),(3,'demo.user','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'demouser@mail.com','0','','a:2:{s:8:\"fullname\";s:9:\"demo user\";s:8:\"jobtitle\";s:6:\"Client\";}',1521913898,0),(4,'acme.demo','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'acme2342123412@outlook.com','0','','a:2:{s:8:\"fullname\";s:9:\"acme demo\";s:8:\"jobtitle\";s:6:\"Client\";}',1521915815,0),(5,'test.demo','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'eq123412@mail.com','0','','a:2:{s:8:\"fullname\";s:9:\"test demo\";s:8:\"jobtitle\";s:6:\"Client\";}',1521916972,0),(6,'testyxyx.demosad','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'3212312yxy3@mail.com','0','','a:2:{s:8:\"fullname\";s:16:\"testyxyx demosad\";s:8:\"jobtitle\";s:6:\"Client\";}',1521917009,0),(7,'testyxsdfsdf.demosad','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'xy3@mail.com','0','','a:2:{s:8:\"fullname\";s:20:\"testyxsdfsdf demosad\";s:8:\"jobtitle\";s:6:\"Client\";}',1521917155,0),(8,'testdemo01.NAME','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'my@mail.co','0','','a:2:{s:8:\"fullname\";s:15:\"testdemo01 NAME\";s:8:\"jobtitle\";s:6:\"Client\";}',1521917192,0),(9,'testdemo01asaa.NAMEsas','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'may@mail.co','0','','a:2:{s:8:\"fullname\";s:22:\"testdemo01asaa NAMEsas\";s:8:\"jobtitle\";s:6:\"Client\";}',1521917536,0),(10,'Tafam.Rogo','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'a.tagne@mail.com','0','','a:2:{s:8:\"fullname\";s:10:\"Tafam Rogo\";s:8:\"jobtitle\";s:6:\"Client\";}',1521917645,0),(11,'Step.Mbarga','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'steph@mail.com','0','','a:2:{s:8:\"fullname\";s:11:\"Step Mbarga\";s:8:\"jobtitle\";s:6:\"Client\";}',1521917922,0),(12,'Cosette.Essoumam','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'costte@mail.com','0','','a:2:{s:8:\"fullname\";s:16:\"Cosette Essoumam\";s:8:\"jobtitle\";s:6:\"Client\";}',1521918069,0),(13,'Léo Paul.Tarto','inS/sNDJloUYlXB813FFPSUICPBLdR54w4e1JnK/UPo=',50,'leo.tarto@mail.com','0','','a:2:{s:8:\"fullname\";s:15:\"Léo Paul Tarto\";s:8:\"jobtitle\";s:6:\"Client\";}',1521970718,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_clients`
--

DROP TABLE IF EXISTS `users_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `client_id` varchar(32) NOT NULL DEFAULT '',
  `client_secret` varchar(32) NOT NULL DEFAULT '',
  `redirect_uri` varchar(255) NOT NULL DEFAULT '',
  `auto_approve` tinyint(1) NOT NULL DEFAULT '0',
  `autonomous` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('development','pending','approved','rejected') NOT NULL DEFAULT 'development',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `notes` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_clients`
--

LOCK TABLES `users_clients` WRITE;
/*!40000 ALTER TABLE `users_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_providers`
--

DROP TABLE IF EXISTS `users_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `provider` varchar(50) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `expires` int(12) DEFAULT '0',
  `refresh_token` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_providers`
--

LOCK TABLES `users_providers` WRITE;
/*!40000 ALTER TABLE `users_providers` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_scopes`
--

DROP TABLE IF EXISTS `users_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_scopes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scope` varchar(64) NOT NULL DEFAULT '',
  `name` varchar(64) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `scope` (`scope`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_scopes`
--

LOCK TABLES `users_scopes` WRITE;
/*!40000 ALTER TABLE `users_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_sessions`
--

DROP TABLE IF EXISTS `users_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(32) NOT NULL DEFAULT '',
  `redirect_uri` varchar(255) NOT NULL DEFAULT '',
  `type_id` varchar(64) NOT NULL,
  `type` enum('user','auto') NOT NULL DEFAULT 'user',
  `code` text NOT NULL,
  `access_token` varchar(50) NOT NULL DEFAULT '',
  `stage` enum('request','granted') NOT NULL DEFAULT 'request',
  `first_requested` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `limited_access` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `oauth_sessions_ibfk_1` (`client_id`),
  CONSTRAINT `oauth_sessions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users_clients` (`client_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_sessions`
--

LOCK TABLES `users_sessions` WRITE;
/*!40000 ALTER TABLE `users_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_sessionscopes`
--

DROP TABLE IF EXISTS `users_sessionscopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_sessionscopes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `access_token` varchar(50) NOT NULL DEFAULT '',
  `scope` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  KEY `access_token` (`access_token`),
  KEY `scope` (`scope`),
  CONSTRAINT `oauth_sessionscopes_ibfk_1` FOREIGN KEY (`scope`) REFERENCES `users_scopes` (`scope`),
  CONSTRAINT `oauth_sessionscopes_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `users_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_sessionscopes`
--

LOCK TABLES `users_sessionscopes` WRITE;
/*!40000 ALTER TABLE `users_sessionscopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_sessionscopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-25 12:40:05
