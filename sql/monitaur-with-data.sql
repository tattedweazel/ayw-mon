CREATE DATABASE  IF NOT EXISTS `monitaur` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `monitaur`;
-- MySQL dump 10.13  Distrib 5.6.11, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: monitaur
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `actor` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `created` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379827756'),(2,6,'dave@allyourweb.net','Updated Event Status from $current to $next','1379827982'),(3,6,'dave@allyourweb.net','Updated Event Status from $current to $next','1379828053'),(4,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379828139'),(5,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379828344'),(6,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379828538'),(7,6,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379828583'),(8,6,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379828585'),(9,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379828586'),(10,6,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379828587'),(11,6,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379828588'),(12,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379828596'),(13,6,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379829234'),(14,6,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379829238'),(15,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379829244'),(16,6,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379829246'),(17,6,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379829249'),(18,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379831831'),(19,6,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379831834'),(20,6,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379833554'),(21,6,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379833555'),(22,6,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379833556'),(23,6,'dave@allyourweb.net','This is the first saved message','1379834175'),(24,6,'dave@allyourweb.net','This is now completely functional','1379834195'),(25,6,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379834195'),(26,23,'dave@allyourweb.net','Updated Event Status from Pending to Resolved','1379834415'),(27,23,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379834440'),(28,23,'dave@allyourweb.net','Updated Event Status from Pending to Resolved','1379834441'),(29,23,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379834442'),(30,23,'dave@allyourweb.net','This is done','1379834457'),(31,23,'dave@allyourweb.net','Updated Event Status from Pending to Resolved','1379834461'),(32,28,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834475'),(33,27,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834481'),(34,9,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834493'),(35,9,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379834494'),(36,25,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834500'),(37,11,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834507'),(38,17,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834513'),(39,17,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379834514'),(40,12,'dave@allyourweb.net','No','1379834524'),(41,20,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834536'),(42,20,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379834537'),(43,20,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379834537'),(44,16,'dave@allyourweb.net','Updated Event Status from Pending to Acknowledged','1379834546'),(45,16,'dave@allyourweb.net','Updated Event Status from Acknowledged to Resolved','1379834547'),(46,16,'dave@allyourweb.net','Updated Event Status from Resolved to Pending','1379834547'),(47,5,'dave@allyourweb.net','Updated Event Status from Pending to Resolved','1379835580'),(48,5,'dave@allyourweb.net','Testing testing','1379835585');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('alert','error','notification') NOT NULL,
  `server` varchar(45) DEFAULT NULL,
  `description` mediumtext,
  `details` mediumtext,
  `created` varchar(45) DEFAULT NULL,
  `status` enum('pending','acknowledged','resolved') NOT NULL DEFAULT 'pending',
  `updated` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'error','www.allyourweb.net','This is a sample API created Error','a:1:{s:5:\\\"error\\\";s:56:\\\"here\\\'s a sample error message. See what I can do with it\\\";}','1379756220','pending','1379756220'),(2,'error','www.allyourweb.net','This is a sample API created Error','a:1:{s:5:\\\"error\\\";s:56:\\\"here\\\'s a sample error message. See what I can do with it\\\";}','1379756220','pending','1379756220'),(3,'notification','localhost','User has logged in','a:2:{s:4:\\\"user\\\";s:19:\\\"dave@allyourweb.net\\\";s:4:\\\"time\\\";i:1379762124;}','1379762124','pending','1379762124'),(4,'notification','www.site.com','User has logged in','a:2:{s:4:\\\"user\\\";s:19:\\\"dave@allyourweb.net\\\";s:4:\\\"time\\\";i:1379762293;}','1379762293','pending','1379762293'),(5,'notification','localhost','User has logged in','a:2:{s:4:\\\"user\\\";s:19:\\\"dave@allyourweb.net\\\";s:4:\\\"time\\\";i:1379762644;}','1379762644','resolved','1379835580'),(6,'error','www.allyourweb.net','404','junk','1379763485','resolved','1379834195'),(7,'error','www.allyourweb.net','404','favicon.ico','1379763485','pending','1379763485'),(8,'alert','www.allyourweb.net','404','','1379763543','pending','1379763543'),(9,'alert','www.allyourweb.net','404','O:3:\\\"Red\\\":11:{s:9:\\\"functions\\\";a:21:{i:0;s:11:\\\"__construct\\\";i:1;s:8:\\\"getNodes\\\";i:2;s:7:\\\"getNode\\\";i:3;s:7:\\\"setNode\\\";i:4;s:10:\\\"loadObject\\\";i:5;s:10:\\\"loadScript\\\";i:6;s:10:\\\"fetchModel\\\";i:7;s:6:\\\"router\\\";i:8;s:8:\\\"logEvent\\\";i:9;s:8:\\\"loadPage\\\";i:10;s:6:\\\"widget\\\";i:11;s:4:\\\"show\\\";i:12;s:13:\\\"showFunctions\\\";i:13;s:10:\\\"fourOhFour\\\";i:14;s:5:\\\"inGet\\\";i:15;s:6:\\\"inPost\\\";i:16;s:9:\\\"inSession\\\";i:17;s:14:\\\"setSessionProp\\\";i:18;s:23:\\\"fetchSessionDataByIndex\\\";i:19;s:12:\\\"startSession\\\";i:20;s:13:\\\"forceNoRender\\\";}s:5:\\\"nodes\\\";a:2:{i:0;s:3:\\\"app\\\";i:1;s:4:\\\"junk\\\";}s:7:\\\"request\\\";s:4:\\\"junk\\\";s:4:\\\"page\\\";N;s:8:\\\"fileroot\\\";s:33:\\\"/Library/WebServer/Documents/app/\\\";s:8:\\\"rootNode\\\";s:5:\\\"/app/\\\";s:4:\\\"data\\\";O:4:\\\"Data\\\":3:{s:3:\\\"get\\\";O:4:\\\"Data\\\":0:{}s:4:\\\"post\\\";O:4:\\\"Data\\\":0:{}s:7:\\\"session\\\";O:4:\\\"Data\\\":1:{s:4:\\\"user\\\";O:4:\\\"Data\\\":6:{s:2:\\\"id\\\";s:1:\\\"1\\\";s:7:\\\"display\\\";s:4:\\\"Dave\\\";s:8:\\\"username\\\";s:19:\\\"dave@allyourweb.net\\\";s:8:\\\"password\\\";s:32:\\\"5f4dcc3b5aa765d61d8327deb882cf99\\\";s:6:\\\"access\\\";s:5:\\\"admin\\\";s:13:\\\"authenticated\\\";i:1;}}}s:8:\\\"noRedner\\\";b:0;s:18:\\\"\\0Red\\0listFunctions\\\";b:1;s:7:\\\"toolkit\\\";O:7:\\\"Toolkit\\\":0:{}s:8:\\\"messages\\\";O:8:\\\"Messages\\\":3:{s:9:\\\"functions\\\";a:5:{i:0;s:11:\\\"__construct\\\";i:1;s:7:\\\"addNote\\\";i:2;s:8:\\\"addError\\\";i:3;s:4:\\\"note\\\";i:4;s:5:\\\"error\\\";}s:5:\\\"notes\\\";a:0:{}s:6:\\\"errors\\\";a:0:{}}}','1379763583','resolved','1379834494'),(10,'alert','www.allyourweb.net','404','O:3:\\\"Red\\\":11:{s:9:\\\"functions\\\";a:21:{i:0;s:11:\\\"__construct\\\";i:1;s:8:\\\"getNodes\\\";i:2;s:7:\\\"getNode\\\";i:3;s:7:\\\"setNode\\\";i:4;s:10:\\\"loadObject\\\";i:5;s:10:\\\"loadScript\\\";i:6;s:10:\\\"fetchModel\\\";i:7;s:6:\\\"router\\\";i:8;s:8:\\\"logEvent\\\";i:9;s:8:\\\"loadPage\\\";i:10;s:6:\\\"widget\\\";i:11;s:4:\\\"show\\\";i:12;s:13:\\\"showFunctions\\\";i:13;s:10:\\\"fourOhFour\\\";i:14;s:5:\\\"inGet\\\";i:15;s:6:\\\"inPost\\\";i:16;s:9:\\\"inSession\\\";i:17;s:14:\\\"setSessionProp\\\";i:18;s:23:\\\"fetchSessionDataByIndex\\\";i:19;s:12:\\\"startSession\\\";i:20;s:13:\\\"forceNoRender\\\";}s:5:\\\"nodes\\\";a:2:{i:0;s:3:\\\"app\\\";i:1;s:11:\\\"favicon.ico\\\";}s:7:\\\"request\\\";s:11:\\\"favicon.ico\\\";s:4:\\\"page\\\";N;s:8:\\\"fileroot\\\";s:33:\\\"/Library/WebServer/Documents/app/\\\";s:8:\\\"rootNode\\\";s:5:\\\"/app/\\\";s:4:\\\"data\\\";O:4:\\\"Data\\\":3:{s:3:\\\"get\\\";O:4:\\\"Data\\\":0:{}s:4:\\\"post\\\";O:4:\\\"Data\\\":0:{}s:7:\\\"session\\\";O:4:\\\"Data\\\":1:{s:4:\\\"user\\\";O:4:\\\"Data\\\":6:{s:2:\\\"id\\\";s:1:\\\"1\\\";s:7:\\\"display\\\";s:4:\\\"Dave\\\";s:8:\\\"username\\\";s:19:\\\"dave@allyourweb.net\\\";s:8:\\\"password\\\";s:32:\\\"5f4dcc3b5aa765d61d8327deb882cf99\\\";s:6:\\\"access\\\";s:5:\\\"admin\\\";s:13:\\\"authenticated\\\";i:1;}}}s:8:\\\"noRedner\\\";b:0;s:18:\\\"\\0Red\\0listFunctions\\\";b:1;s:7:\\\"toolkit\\\";O:7:\\\"Toolkit\\\":0:{}s:8:\\\"messages\\\";O:8:\\\"Messages\\\":3:{s:9:\\\"functions\\\";a:5:{i:0;s:11:\\\"__construct\\\";i:1;s:7:\\\"addNote\\\";i:2;s:8:\\\"addError\\\";i:3;s:4:\\\"note\\\";i:4;s:5:\\\"error\\\";}s:5:\\\"notes\\\";a:0:{}s:6:\\\"errors\\\";a:0:{}}}','1379763583','pending','1379763583'),(11,'alert','www.allyourweb.net','404','junk','1379763620','acknowledged','1379834507'),(12,'alert','locathost','404','favicon.ico','1379763620','pending','1379763620'),(13,'alert','www.allyourweb.net','404','favicon.ico','1379763624','pending','1379763624'),(14,'alert','www.allyourweb.net','404','favicon.ico','1379763688','pending','1379763688'),(15,'alert','localhost','404','favicon.ico','1379763780','pending','1379763780'),(16,'alert','www.other.com','404','favicon.ico','1379763788','pending','1379834547'),(17,'alert','www.allyourweb.net','404','localhost','1379764727','resolved','1379834514'),(18,'notification','www.site.com','Test API call','Hand coded JavaScript API call from the console','1379764754','pending','1379764754'),(19,'notification','www.allyourweb.net','Test API call','Hand coded JavaScript API call from the console','1379764806','pending','1379764806'),(20,'alert','www.site.com','404','hfds','1379767166','pending','1379834537'),(21,'notification','www.allyourweb.net','Test Message','Testing the logEvent() JavaScript Event','1379767795','pending','1379767795'),(22,'notification','www.allyourweb.net','Test Message','Testing the logEvent() JavaScript Event','1379767953','pending','1379767953'),(23,'notification','www.site.com','Test Message','Testing the logEvent() JavaScript Event','1379768013','resolved','1379834461'),(24,'alert','www.allyourweb.net','404','ho','1379793272','pending','1379793272'),(25,'alert','www.allyourweb.net','404','notifdsafd','1379795496','acknowledged','1379834500'),(26,'alert','www.allyourweb.net','404','Notifications','1379802030','pending','1379802030'),(27,'alert','www.allyourweb.net','404','a:3:{s:7:\\\"request\\\";s:5:\\\"alsfd\\\";s:4:\\\"file\\\";s:52:\\\"/Library/WebServer/Documents/app/objects/red.obj.php\\\";s:4:\\\"line\\\";i:203;}','1379803571','acknowledged','1379834481'),(28,'alert','www.allyourweb.net','404 - alsfd','a:3:{s:7:\\\"request\\\";s:5:\\\"alsfd\\\";s:4:\\\"file\\\";s:52:\\\"/Library/WebServer/Documents/app/objects/red.obj.php\\\";s:4:\\\"line\\\";i:203;}','1379803614','acknowledged','1379834475'),(29,'alert','www.allyourweb.net','404 - efdsaf','a:3:{s:7:\\\"request\\\";s:6:\\\"efdsaf\\\";s:4:\\\"file\\\";s:52:\\\"/Library/WebServer/Documents/app/objects/red.obj.php\\\";s:4:\\\"line\\\";i:203;}','1379813889','pending','1379813889');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `access` enum('admin','user','viewer') NOT NULL DEFAULT 'viewer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dave','dave@allyourweb.net','5f4dcc3b5aa765d61d8327deb882cf99','admin'),(2,'Jim','jim@allyourweb.net','5f4dcc3b5aa765d61d8327deb882cf99','user'),(3,'Eric','eric@allyourweb.net','5f4dcc3b5aa765d61d8327deb882cf99','viewer'),(4,'Jake','jake@allyourweb.net','5f4dcc3b5aa765d61d8327deb882cf99','admin');
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

-- Dump completed on 2013-09-22  0:52:00
