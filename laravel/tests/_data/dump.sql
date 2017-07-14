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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
INSERT INTO `failed_jobs` VALUES (1,'database','task','{\"displayName\":\"App\\\\Jobs\\\\Task\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Task\",\"command\":\"O:13:\\\"App\\\\Jobs\\\\Task\\\":5:{s:7:\\\"\\u0000*\\u0000task\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\Task\\\";s:2:\\\"id\\\";i:35;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"task\\\";s:5:\\\"delay\\\";N;}\"}}','Illuminate\\Queue\\MaxAttemptsExceededException: A queued job has been attempted too many times. The job may have previously timed out. in /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:383\nStack trace:\n#0 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(311): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#1 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(267): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#2 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(113): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#3 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Worker->daemon(\'database\', \'task\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(84): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'task\')\n#5 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->fire()\n#6 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(29): call_user_func_array(Array, Array)\n#7 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#9 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/Container.php(539): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#10 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(182): Illuminate\\Container\\Container->call(Array)\n#11 /var/www/html/dev/laravel/vendor/symfony/console/Command/Command.php(264): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#12 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(167): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(869): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#14 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(223): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(130): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(122): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 /var/www/html/dev/laravel/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 {main}','2017-07-13 09:24:07'),(2,'database','task','{\"displayName\":\"App\\\\Jobs\\\\Task\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Task\",\"command\":\"O:13:\\\"App\\\\Jobs\\\\Task\\\":5:{s:7:\\\"\\u0000*\\u0000task\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\Task\\\";s:2:\\\"id\\\";i:34;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"task\\\";s:5:\\\"delay\\\";N;}\"}}','Illuminate\\Queue\\MaxAttemptsExceededException: A queued job has been attempted too many times. The job may have previously timed out. in /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:383\nStack trace:\n#0 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(311): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#1 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(267): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#2 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(113): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#3 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Worker->daemon(\'database\', \'task\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(84): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'task\')\n#5 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->fire()\n#6 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(29): call_user_func_array(Array, Array)\n#7 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#9 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/Container.php(539): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#10 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(182): Illuminate\\Container\\Container->call(Array)\n#11 /var/www/html/dev/laravel/vendor/symfony/console/Command/Command.php(264): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#12 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(167): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(869): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#14 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(223): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(130): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(122): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 /var/www/html/dev/laravel/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 {main}','2017-07-13 09:24:37'),(3,'database','task','{\"displayName\":\"App\\\\Jobs\\\\Task\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Task\",\"command\":\"O:13:\\\"App\\\\Jobs\\\\Task\\\":5:{s:7:\\\"\\u0000*\\u0000task\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\Task\\\";s:2:\\\"id\\\";i:36;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:4:\\\"task\\\";s:5:\\\"delay\\\";N;}\"}}','Exception: process error [END] in /var/www/html/dev/laravel/app/Jobs/Task.php:62\nStack trace:\n#0 [internal function]: App\\Jobs\\Task->handle()\n#1 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(29): call_user_func_array(Array, Array)\n#2 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/Container.php(539): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#6 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(114): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\Task))\n#7 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(102): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\Task))\n#8 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(42): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\Task), false)\n#10 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(69): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#11 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(317): Illuminate\\Queue\\Jobs\\Job->fire()\n#12 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(267): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#13 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(113): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#14 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Worker->daemon(\'database\', \'task\', Object(Illuminate\\Queue\\WorkerOptions))\n#15 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(84): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'task\')\n#16 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->fire()\n#17 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(29): call_user_func_array(Array, Array)\n#18 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#19 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Container/Container.php(539): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(182): Illuminate\\Container\\Container->call(Array)\n#22 /var/www/html/dev/laravel/vendor/symfony/console/Command/Command.php(264): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#23 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Console/Command.php(167): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#24 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(869): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(223): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /var/www/html/dev/laravel/vendor/symfony/console/Application.php(130): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /var/www/html/dev/laravel/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(122): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 /var/www/html/dev/laravel/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 {main}','2017-07-13 09:25:19');
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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_07_10_064138_create_projects_table',1),(4,'2017_07_10_065946_create_tasks_table',2),(5,'2017_07_12_064433_create_jobs_table',3),(6,'2017_07_12_064518_create_failed_jobs_table',4),(7,'2017_07_12_080750_updateTask',5),(8,'2017_07_14_024603_update_task_table',6);
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
INSERT INTO `projects` VALUES (22,'Ron Blanda1','2','Et enim harum minima reiciendis explicabo. Suscipit at quia et non. Praesentium totam tenetur qui voluptatibus aut sunt nulla. Dolorem quia id cupiditate exercitationem quia.h','2017-07-10 07:48:13','2017-07-12 02:37:44'),(23,'Schuyler Maggio','zackery.rempel@example.com','Possimus fugit omnis corporis consequatur quod voluptas. Recusandae ut et cupiditate veniam magnam repudiandae aut. Repellendus a nesciunt eius.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(24,'Camron Dibbert MD','xdubuque@example.com','Corrupti suscipit earum enim illo qui magni officiis. Quibusdam adipisci odit mollitia minus ut deleniti. Est doloremque dolorum repudiandae et.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(25,'Prof. Levi Gutkowski Jr.','zhaley@example.org','Reiciendis id enim animi eum. Animi dolor eaque ut explicabo ullam nisi. Esse dolore sed autem ad repellat recusandae doloremque. Mollitia facere eum quasi labore non illo.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(26,'Nickolas Walker','rice.cecile@example.net','Rerum ipsam atque iusto commodi at. Nulla eveniet totam voluptatem minus. Harum aliquam praesentium rerum impedit voluptatem. Ullam quas sed rerum sunt ad quos.','2017-07-10 07:48:13','2017-07-10 07:48:13'),(27,'vestin','1','script:\r\n    - mkdir tmp\r\n    - cd tmp && echo 1>file','2017-07-11 07:53:39','2017-07-13 09:58:20');
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
  `yml` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'task yml. copy form project when build task',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (11,22,0,'01:46:32','22:47:47','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(12,22,0,'16:32:30','23:19:51','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(13,23,0,'10:34:00','22:57:53','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(14,23,0,'15:50:33','08:33:29','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(15,24,0,'20:04:14','16:04:12','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(16,24,0,'12:09:28','09:41:23','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(17,25,0,'00:34:51','23:02:12','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(18,25,0,'21:54:25','00:22:45','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(19,26,0,'08:04:42','02:11:09','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(20,26,0,'17:27:25','11:08:02','2017-07-10 07:48:13','2017-07-10 07:48:13',''),(21,27,0,NULL,NULL,'2017-07-12 08:20:02','2017-07-12 08:20:02',''),(22,27,0,NULL,NULL,'2017-07-12 08:21:42','2017-07-12 08:21:42',''),(23,27,0,NULL,NULL,'2017-07-12 08:22:12','2017-07-12 08:22:12',''),(24,27,0,NULL,NULL,'2017-07-12 08:22:48','2017-07-12 08:22:48',''),(25,27,0,NULL,NULL,'2017-07-12 08:26:09','2017-07-12 08:26:09',''),(26,27,0,NULL,NULL,'2017-07-12 08:38:07','2017-07-12 08:38:07',''),(27,27,0,NULL,NULL,'2017-07-12 08:39:47','2017-07-12 08:39:47',''),(28,27,0,NULL,NULL,'2017-07-12 08:43:50','2017-07-12 08:43:50',''),(29,27,0,NULL,NULL,'2017-07-12 08:44:23','2017-07-12 08:44:23',''),(30,27,100,'10:06:56','10:06:56','2017-07-12 09:14:36','2017-07-12 10:06:56',''),(31,27,100,'10:06:56','10:06:56','2017-07-12 10:06:42','2017-07-12 10:06:56',''),(32,27,100,'10:10:45','10:10:45','2017-07-12 10:10:44','2017-07-12 10:10:45',''),(33,27,100,'10:16:35','10:16:35','2017-07-12 10:16:34','2017-07-12 10:16:35',''),(34,27,20,'09:23:07',NULL,'2017-07-13 08:46:07','2017-07-13 09:23:07',''),(35,27,-1,'09:23:04',NULL,'2017-07-13 09:04:41','2017-07-13 09:23:07',''),(36,27,-1,'09:25:19',NULL,'2017-07-13 09:25:17','2017-07-13 09:25:19',''),(37,27,100,'09:58:45','09:58:45','2017-07-13 09:58:22','2017-07-13 09:58:45',''),(38,27,100,'02:31:41','02:31:41','2017-07-14 02:31:30','2017-07-14 02:31:41',''),(39,27,100,'02:43:13','02:43:13','2017-07-14 02:43:12','2017-07-14 02:43:13','');
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

-- Dump completed on 2017-07-14  2:54:49
