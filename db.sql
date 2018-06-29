-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: database
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `current_invoice`
--

DROP TABLE IF EXISTS `current_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `sale` int(11) unsigned zerofill DEFAULT NULL,
  `total` double DEFAULT NULL,
  `remain_Quantity` double NOT NULL,
  `total_All` double NOT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `current_invoice`
--

LOCK TABLES `current_invoice` WRITE;
/*!40000 ALTER TABLE `current_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `current_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `current_purchases_invoices`
--

DROP TABLE IF EXISTS `current_purchases_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_purchases_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `new_price` double NOT NULL,
  `sale` int(11) unsigned zerofill DEFAULT NULL,
  `total` double DEFAULT NULL,
  `remain_Quantity` double DEFAULT NULL,
  `total_All` double DEFAULT NULL,
  `average_price` double NOT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_id_UNIQUE` (`type_id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `current_purchases_invoices`
--

LOCK TABLES `current_purchases_invoices` WRITE;
/*!40000 ALTER TABLE `current_purchases_invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `current_purchases_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,'فاتورة بيع',700,0,700,1,'2018-04-30',NULL),(2,'فاتورة شراء',0,500,200,1,'2018-04-30',NULL),(3,'فاتورة شراء',0,200,0,2,'2018-04-30',NULL),(4,'فاتورة شراء',0,580,-580,3,'2018-05-01',NULL),(5,'فاتورة بيع',840,0,260,2,'2018-04-29',NULL),(6,'فاتورة شراء',0,23,237,4,'2018-05-02',NULL),(7,'فاتورة بيع',1.5,0,238.5,9,'2018-05-18',NULL),(8,'فاتورة شراء',0,3215,-2976.5,6,'2018-05-18',NULL),(9,'فاتورة شراء',0,1500,-4476.5,5,'2018-05-18',NULL),(10,'فاتورة شراء',0,1213,-5689.5,7,'2018-05-18',NULL),(11,'فاتورة شراء',0,123,-5812.5,8,'2018-05-18',NULL),(12,'فاتورة شراء',0,555,-6367.5,9,'2018-05-18',NULL);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases_invoices`
--

DROP TABLE IF EXISTS `purchases_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_number` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `new_price` double NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `Total` double NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `average_price` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `confirmed` int(10) DEFAULT NULL,
  `cash` int(11) DEFAULT NULL,
  `deferred` int(11) DEFAULT NULL,
  `vendor_customer_name` varchar(45) DEFAULT NULL,
  `vendor_customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases_invoices`
--

LOCK TABLES `purchases_invoices` WRITE;
/*!40000 ALTER TABLE `purchases_invoices` DISABLE KEYS */;
INSERT INTO `purchases_invoices` VALUES (1,'قطن 1','قطن أ',1,'دسته 12 فوطه',1.5,0.12,0,0.12,1,0.81,'2018-05-22',NULL,NULL,1,0,'',6),(2,'قطن 1','قطن أ',1,'دسته 12 فوطه',1.5,0.12,0,0.12,2,0.81,'2018-05-22',NULL,1,0,1,'بب',5),(3,'قطن 1','قطن أ',1,'دسته 12 فوطه',1.5,0.12,0,0.12,3,0.81,'2018-05-22',NULL,NULL,0,1,'banha',6),(4,'قطن 1','قطن أ',1,'دسته 12 فوطه',1.5,0.12,0,0.12,4,0.81,'2018-05-22',NULL,1,0,1,'banha',6),(5,'قطن 1','قطن أ',1,'دسته 12 فوطه',1.5,1500,0,1500,5,750.75,'2018-05-22',NULL,1,0,1,'tickets solution',9);
/*!40000 ALTER TABLE `purchases_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repairs`
--

DROP TABLE IF EXISTS `repairs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repairs` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Barcode` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Quantity` double DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `average_price` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `new_price` double DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`),
  UNIQUE KEY `Barcode_UNIQUE` (`Barcode`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repairs`
--

LOCK TABLES `repairs` WRITE;
/*!40000 ALTER TABLE `repairs` DISABLE KEYS */;
INSERT INTO `repairs` VALUES (107,'قطن 1','قطن أ',116,1.5,'دسته 12 فوطه',NULL,750.75,NULL,1500),(108,'قطن 2','قطن ب',100,0,'علبه 4 فوطه',NULL,16.075,NULL,32.15),(109,'قطن3','قطن',100,0,'',NULL,7.5,NULL,15),(110,'قطن4','قطن4',205,0,'',NULL,0.057761904761905,NULL,0.11552380952381),(111,'قطن5','قطن5',20,0,'',NULL,6.15,NULL,12.3),(112,'قطن6','قطن6',11,0,'',NULL,0,NULL,0),(113,'قطن7','قطن7',11,0,'',NULL,2.5,NULL,5),(114,'قطن8','قطن8',11,0,'',NULL,5,NULL,10),(115,'قطن9','قطن9',11,0,'',NULL,0,NULL,0),(116,'قطن10','قطن10',11,0,'',NULL,0,NULL,0),(117,'قطن11','قطن11',11,0,'',NULL,0,NULL,0),(118,'قطن12','قطن12',11,0,'',NULL,0,NULL,0),(119,'قطن13','قطن13',11,0,'',NULL,0,NULL,0),(120,'قطن14','قطن14',10,0,'',NULL,5.5,NULL,11),(121,'قطن15','قطن15',11,0,'',NULL,0,NULL,0),(122,'قطن16','قطن16',10,0,'',NULL,0,NULL,0),(123,'قطن17','قطن17',10,0,'',NULL,0,NULL,0),(124,'قطن18','قطن18',11,0,'',NULL,0,NULL,0),(125,'قطن19','قطن19',12,0,'',NULL,5.25,NULL,10.5),(128,'قطن20','قطن20',11,0,'',NULL,0,NULL,0),(129,'قطن21','قطن21',11,0,'',NULL,0,NULL,0),(130,'قطن22','قطن22',11,0,'',NULL,0,NULL,0),(131,'قطن23','قطن23',11,0,'',NULL,0,NULL,0),(132,'قطن24','قطن24',34,0,'',NULL,5.5,NULL,11),(133,'قطن25','قطن25',12,0,'',NULL,6.25,NULL,12.5),(134,'قطن26','قطن26',13,0,'',NULL,5,NULL,10),(135,'قطن27','قطن27',11,0,'',NULL,0,NULL,0),(136,'قطن28','قطن28',11,0,'',NULL,0,NULL,0),(137,'قطن29','قطن29',10,0,'',NULL,0,NULL,0),(138,'قطن30','قطن30',11,0,'',NULL,0,NULL,0),(139,'قطن31','قطن31',11,0,'',NULL,0,NULL,0),(140,'قطن32','قطن32',12,0,'',NULL,22,NULL,44),(141,'قطن33','قطن33',11,0,'',NULL,0,NULL,0),(142,'قطن34','قطن34',11,0,'',NULL,0,NULL,0),(143,'قطن35','قطن3',11,0,'',NULL,0,NULL,0),(145,'قطن36','قطن36',11,0,'',NULL,0,NULL,0),(146,'قطن 37','قطن37',1000,0,'',NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `repairs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sells_invoices`
--

DROP TABLE IF EXISTS `sells_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sells_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_number` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `Total` double NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `confirmed` int(11) DEFAULT NULL,
  `cash` int(11) DEFAULT NULL,
  `deferred` int(11) DEFAULT NULL,
  `vendor_customer_name` varchar(45) DEFAULT NULL,
  `vendor_customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sells_invoices`
--

LOCK TABLES `sells_invoices` WRITE;
/*!40000 ALTER TABLE `sells_invoices` DISABLE KEYS */;
INSERT INTO `sells_invoices` VALUES (1,'قطن 1','قطن أ',1,'دسته 12 فوطه',1.5,0,1.5,1,'2018-05-22',NULL,1,0,1,'باهر السيد',7),(2,'قطن 1','قطن أ',1,'دسته 12 فوطه',1.5,0,1.5,2,'2018-05-22',NULL,1,0,1,'باهر السيد',7);
/*!40000 ALTER TABLE `sells_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `usersid_UNIQUE` (`userId`),
  UNIQUE KEY `userEmail_UNIQUE` (`userEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'baher@aiactive.com','682ea49c12f9b5b832c8a5095bd97edd2a0f3ce4979273362e68959ef28d67aa','cairo, Egypt','1220352203',1,'Baher',1),(6,'eng.baher77@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',NULL,NULL,0,'ffff fff',NULL),(7,'eng.baher777@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',NULL,NULL,0,'ffff fff',NULL),(8,'fff@ma.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',NULL,NULL,0,'ffff fff',NULL),(9,'fff@mHa.com','039dd2bea2e857e94a1e30491b353a2ae4fb88d96d893d6a03ac2517086c4605',NULL,NULL,0,'ffff fff',NULL),(10,'fff@mHta.com','039dd2bea2e857e94a1e30491b353a2ae4fb88d96d893d6a03ac2517086c4605',NULL,NULL,0,'ffff fff',NULL),(11,'fff@mHfa.com','27b2c10cd2421b24c00363111ec7fb635abe73b7bf2dabb93255835f0a2ddbab',NULL,NULL,0,'ffff fff',NULL),(12,'fff@mHrfa.com','27b2c10cd2421b24c00363111ec7fb635abe73b7bf2dabb93255835f0a2ddbab',NULL,NULL,0,'ffff fff',NULL),(13,'fff@mlHrfa.com','27b2c10cd2421b24c00363111ec7fb635abe73b7bf2dabb93255835f0a2ddbab',NULL,NULL,0,'ffff fff',NULL),(14,'fff@mlHrjfa.com','27b2c10cd2421b24c00363111ec7fb635abe73b7bf2dabb93255835f0a2ddbab',NULL,NULL,0,'ffff fff',NULL),(15,'fff@mlHsrjfa.com','27b2c10cd2421b24c00363111ec7fb635abe73b7bf2dabb93255835f0a2ddbab',NULL,NULL,0,'ffff fff',NULL),(16,'fff@smHfa.com','e2dbf8f5c4cc151480213d21f95c72aa73a001bce4915b17691ae40952dcd793',NULL,NULL,0,'ffff fff',NULL),(17,'fff@samHfa.com','e2dbf8f5c4cc151480213d21f95c72aa73a001bce4915b17691ae40952dcd793',NULL,NULL,0,'ffff fff',NULL),(18,'fff@smHfsa.com','e2dbf8f5c4cc151480213d21f95c72aa73a001bce4915b17691ae40952dcd793',NULL,NULL,0,'ffff fff',NULL),(19,'fff@smdHfsa.com','8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414',NULL,NULL,0,'ffff fff',NULL),(20,'fff@sdmHfsa.com','e2dbf8f5c4cc151480213d21f95c72aa73a001bce4915b17691ae40952dcd793',NULL,NULL,0,'dff',NULL),(21,'ahmed@gmail.com','8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414',NULL,NULL,1,'Ahmed',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_customer`
--

DROP TABLE IF EXISTS `vendor_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_customer`
--

LOCK TABLES `vendor_customer` WRITE;
/*!40000 ALTER TABLE `vendor_customer` DISABLE KEYS */;
INSERT INTO `vendor_customer` VALUES (1,'المصريه','vendor','تت','01011111','masr@gmail.com',NULL),(2,'te-data','customer','cairo','040111111','data@yahoo.com',NULL),(3,'digital','vendor','mnf,egy','015123456','digi@digi.com',NULL),(4,'hhh','customer','','','hhh',NULL),(5,'بب','vendor','dd','0111111','111111',NULL),(6,'banha','vendor','hhhhh','010000','banha@gmial.coom',NULL),(7,'باهر السيد','customer','','','',NULL),(8,'tickets','vendor','','','',NULL),(9,'tickets solution','vendor','','','',NULL);
/*!40000 ALTER TABLE `vendor_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_customer_balance`
--

DROP TABLE IF EXISTS `vendor_customer_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_customer_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `vendor_customer_payment_value` int(11) DEFAULT NULL,
  `vendor_customer_name` varchar(45) DEFAULT NULL,
  `vendor_customer_id` int(11) DEFAULT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `discription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_customer_balance`
--

LOCK TABLES `vendor_customer_balance` WRITE;
/*!40000 ALTER TABLE `vendor_customer_balance` DISABLE KEYS */;
INSERT INTO `vendor_customer_balance` VALUES (1,'فاتورة شراء',0,0.12,NULL,'banha',6,4,'2018-05-22',NULL,'مورد'),(2,'فاتورة شراء',0,0.12,NULL,'بب',5,2,'2018-05-22',NULL,'مورد'),(3,'فاتورة بيع',1.5,0,NULL,'باهر السيد',7,2,'2018-05-22',NULL,'عميل'),(4,'فاتورة بيع',1.5,0,NULL,'باهر السيد',7,1,'2018-05-22',NULL,'عميل'),(5,'فاتورة شراء',0,1500,NULL,'tickets solution',9,5,'2018-05-22',NULL,'مورد'),(6,'قيد ســـداد',1500,0,NULL,'tickets solution',9,2,'2018-05-22',NULL,NULL);
/*!40000 ALTER TABLE `vendor_customer_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_customer_payment`
--

DROP TABLE IF EXISTS `vendor_customer_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_customer_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `payment` double DEFAULT NULL,
  `vendor_customer_name` varchar(45) DEFAULT NULL,
  `vendor_customer_id` int(11) DEFAULT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `discription` varchar(45) DEFAULT NULL,
  `confirmed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_customer_payment`
--

LOCK TABLES `vendor_customer_payment` WRITE;
/*!40000 ALTER TABLE `vendor_customer_payment` DISABLE KEYS */;
INSERT INTO `vendor_customer_payment` VALUES (20,'فاتورة سداد',1500,'tickets solution',9,2,'2018-05-22',NULL,'vendor',1);
/*!40000 ALTER TABLE `vendor_customer_payment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-23 18:48:16
