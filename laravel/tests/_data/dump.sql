-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: unknow
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.10.1

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_07_10_064138_create_projects_table',1),(4,'2017_07_10_065946_create_tasks_table',2),(5,'2017_07_12_064433_create_jobs_table',3),(6,'2017_07_12_064518_create_failed_jobs_table',4),(7,'2017_07_12_080750_updateTask',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'project name',
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'owner of the project',
  `yml` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'project setting file',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (22,'Ron Blanda1','2','Et enim harum minima reiciendis explicabo. Suscipit at quia et non. Praesentium totam tenetur qui voluptatibus aut sunt nulla. Dolorem quia id cupiditate exercitationem quia.h','2017-07-10 07:48:13','2017-07-12 02:37:44'),(23,'Schuyler Maggio','zackery.rempel@example.com','Possimus fugit omnis corporis consequatur quod voluptas. Recusandae ut et cupiditate veniam magnam repudiandae aut. Repellendus a nesciunt eius.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(24,'Camron Dibbert MD','xdubuque@example.com','Corrupti suscipit earum enim illo qui magni officiis. Quibusdam adipisci odit mollitia minus ut deleniti. Est doloremque dolorum repudiandae et.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(25,'Prof. Levi Gutkowski Jr.','zhaley@example.org','Reiciendis id enim animi eum. Animi dolor eaque ut explicabo ullam nisi. Esse dolore sed autem ad repellat recusandae doloremque. Mollitia facere eum quasi labore non illo.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(26,'Nickolas Walker','rice.cecile@example.net','Rerum ipsam atque iusto commodi at. Nulla eveniet totam voluptatem minus. Harum aliquam praesentium rerum impedit voluptatem. Ullam quas sed rerum sunt ad quos.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(27,'vestin','1','git clone https://github.com/Vestin/game-of-life.git\r\ncd game-of-life\r\ncomposer install','2017-07-11 07:53:39','2017-07-12 03:36:55');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL COMMENT 'project id',
  `status` int(11) NOT NULL COMMENT 'task status',
  `start_time` time DEFAULT NULL COMMENT 'start time',
  `end_time` time DEFAULT NULL COMMENT 'end time',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (11,22,0,'01:46:32','22:47:47','2017-07-10 07:48:13','2017-07-10 07:48:13'),(12,22,0,'16:32:30','23:19:51','2017-07-10 07:48:13','2017-07-10 07:48:13'),(13,23,0,'10:34:00','22:57:53','2017-07-10 07:48:13','2017-07-10 07:48:13'),(14,23,0,'15:50:33','08:33:29','2017-07-10 07:48:13','2017-07-10 07:48:13'),(15,24,0,'20:04:14','16:04:12','2017-07-10 07:48:13','2017-07-10 07:48:13'),(16,24,0,'12:09:28','09:41:23','2017-07-10 07:48:13','2017-07-10 07:48:13'),(17,25,0,'00:34:51','23:02:12','2017-07-10 07:48:13','2017-07-10 07:48:13'),(18,25,0,'21:54:25','00:22:45','2017-07-10 07:48:13','2017-07-10 07:48:13'),(19,26,0,'08:04:42','02:11:09','2017-07-10 07:48:13','2017-07-10 07:48:13'),(20,26,0,'17:27:25','11:08:02','2017-07-10 07:48:13','2017-07-10 07:48:13'),(21,27,0,NULL,NULL,'2017-07-12 08:20:02','2017-07-12 08:20:02'),(22,27,0,NULL,NULL,'2017-07-12 08:21:42','2017-07-12 08:21:42'),(23,27,0,NULL,NULL,'2017-07-12 08:22:12','2017-07-12 08:22:12'),(24,27,0,NULL,NULL,'2017-07-12 08:22:48','2017-07-12 08:22:48'),(25,27,0,NULL,NULL,'2017-07-12 08:26:09','2017-07-12 08:26:09'),(26,27,0,NULL,NULL,'2017-07-12 08:38:07','2017-07-12 08:38:07'),(27,27,0,NULL,NULL,'2017-07-12 08:39:47','2017-07-12 08:39:47'),(28,27,0,NULL,NULL,'2017-07-12 08:43:50','2017-07-12 08:43:50'),(29,27,0,NULL,NULL,'2017-07-12 08:44:23','2017-07-12 08:44:23'),(30,27,100,'10:06:56','10:06:56','2017-07-12 09:14:36','2017-07-12 10:06:56'),(31,27,100,'10:06:56','10:06:56','2017-07-12 10:06:42','2017-07-12 10:06:56'),(32,27,100,'10:10:45','10:10:45','2017-07-12 10:10:44','2017-07-12 10:10:45'),(33,27,100,'10:16:35','10:16:35','2017-07-12 10:16:34','2017-07-12 10:16:35');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2017-07-13  3:14:59
