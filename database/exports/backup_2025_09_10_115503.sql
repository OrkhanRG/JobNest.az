-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: jobnest
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('jobnest_cache_forgot-password-4TBiMDN16R1pKQpAlUtS1cMGfB2nlARmUNw5FAd0n4ef8jPY5qVbNAc8OGvS','i:115;',1747031116),('jobnest_cache_forgot-password-5CU0fw6lrzKoDeM5VkkqgsWIYlcs7h2LRs8u82g3xXQ3nAtpqrDL869AGUh5','i:115;',1747030933),('jobnest_cache_forgot-password-7gWG81qjskJI3S4uvjHMw1va5uCLHXoylmoJN12Urd7npeIZCCWqjSsKqTfX','i:125;',1746713390),('jobnest_cache_forgot-password-BfqULvhmGsiZ3WACXgDQ497mzhGCbZRtY72Vg9dgmGHDI3gI9vn8PUbpUBca','i:115;',1747035228),('jobnest_cache_forgot-password-Fn19SrDw2gAvxCoCh5Ygg6PDHspQQyw5AmRJ1tP70kog0AvabJQWlHYheJDQ','i:115;',1747051426),('jobnest_cache_forgot-password-gCCbOmhC2ESOLqda37b1dtLQcaJzpDul1uJCMTAvzJ4IEPtLi0HdYadKY7qO','i:125;',1746713470),('jobnest_cache_forgot-password-nKblnNtyq5LzRk0fV3Mq4XczjPBpTAv9EVdMld0D0XPbhgxmgFe1vlKgeuVl','i:115;',1747030907),('jobnest_cache_forgot-password-QKhxnMwybm6GepptkbWLMvt8LNCcyBncBNu7L6RoAmPw8sBP4OQtH5i8uXRM','i:115;',1747031145),('jobnest_cache_forgot-password-RZ1R3MTS8I6cEzWMJbryNbKW8O2PQ4rm0Foklme4zV7FJ7cp5JEniXLkTkdt','i:115;',1747035333),('jobnest_cache_forgot-password-sxcfluu1VvRBobs4ACt8ulmJ4QhNlNfJ1wiEqYKocZbdGsq8CJ28Yytk1ZlW','i:115;',1747048289);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `job_category_id` bigint unsigned DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `city_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_salary` decimal(10,2) DEFAULT NULL,
  `expected_salary` decimal(10,2) DEFAULT NULL,
  `gender` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '''0'' => male, ''1'' => female, ''2'' => other, ''3'' prefer_not_to_say',
  `birth_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_level` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''0'' => student, ''1'' => entry, ''2'' => experienced, ''3'' => manager, ''4'' => senior_manager, ''5'' => executive',
  `years_of_experience` int DEFAULT NULL,
  `preferred_job_types` json DEFAULT NULL,
  `preferred_work_types` json DEFAULT NULL,
  `is_available` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_actively_looking` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `available_from` date DEFAULT NULL,
  `show_profile_to_companies` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `show_contact_info` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `allow_messages` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_featured` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `profile_completion_percentage` int NOT NULL DEFAULT '0',
  `profile_views` int NOT NULL DEFAULT '0',
  `last_active_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `candidates_slug_unique` (`slug`),
  KEY `candidates_user_id_foreign` (`user_id`),
  KEY `candidates_job_category_id_foreign` (`job_category_id`),
  KEY `candidates_city_id_foreign` (`city_id`),
  CONSTRAINT `candidates_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `candidates_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `candidates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (22,70,NULL,NULL,NULL,'candidate-1',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-02 07:05:19','2025-05-02 07:05:19'),(23,72,NULL,NULL,NULL,'test-1',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-02 07:30:30','2025-05-02 07:30:30'),(24,73,NULL,NULL,NULL,'test-2',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-02 08:21:28','2025-05-02 08:21:28'),(25,75,NULL,NULL,NULL,'test-4',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-02 08:39:04','2025-05-02 08:39:04'),(40,97,NULL,NULL,NULL,'harding-cochran-morrow',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-06 11:38:11','2025-05-06 11:38:11'),(41,98,NULL,NULL,NULL,'jolene-steele-schmidt',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-07 10:44:38','2025-05-07 10:44:38'),(42,99,NULL,NULL,NULL,'daria-lowe-mayer',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-07 10:57:15','2025-05-07 10:57:15'),(43,100,NULL,NULL,NULL,'orxan-ismayilov',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-07 12:48:01','2025-05-07 12:48:01'),(44,101,NULL,NULL,NULL,'alfonso-bowers-frost',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 05:34:05','2025-05-08 05:34:05'),(46,105,NULL,NULL,NULL,'ryder-pope-cummings',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:09:49','2025-05-08 07:09:49'),(47,106,NULL,NULL,NULL,'maryam-allison-best',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:11:43','2025-05-08 07:11:43'),(48,107,NULL,NULL,NULL,'fredericka-tillman-osborne',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:25:20','2025-05-08 07:25:20'),(49,108,NULL,NULL,NULL,'basil-donovan-calderon',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:25:53','2025-05-08 07:25:53'),(50,109,NULL,NULL,NULL,'geoffrey-hendrix-frederick',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:29:33','2025-05-08 07:29:33'),(51,110,NULL,NULL,NULL,'tesst-wade',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:38:23','2025-05-08 07:38:23'),(52,111,NULL,NULL,NULL,'reece-zamora-merrill',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:41:59','2025-05-08 07:41:59'),(53,112,NULL,NULL,NULL,'olga-bishop-suarez',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:46:24','2025-05-08 07:46:24'),(54,113,NULL,NULL,NULL,'sybill-compton-sears',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:54:36','2025-05-08 07:54:36'),(55,114,NULL,NULL,NULL,'hanna-foreman-chavez',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 07:59:35','2025-05-08 07:59:35'),(56,115,NULL,NULL,NULL,'jameson-shepherd-schneider',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 08:01:29','2025-05-08 08:01:29'),(57,116,NULL,NULL,NULL,'alexa-whitney-schroeder',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 08:26:16','2025-05-08 08:26:16'),(58,117,NULL,NULL,NULL,'avye-carpenter-hendrix',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 08:29:39','2025-05-08 08:29:39'),(59,118,NULL,NULL,NULL,'harriet-haney-duke',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 08:35:12','2025-05-08 08:35:12'),(60,119,NULL,NULL,NULL,'isaiah-finch-erickson',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 08:40:15','2025-05-08 08:40:15'),(61,120,NULL,NULL,NULL,'yael-santos-pierce',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 10:06:00','2025-05-08 10:06:00'),(62,121,NULL,NULL,NULL,'kermit-mitchell-lopez',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 10:07:05','2025-05-08 10:07:05'),(64,123,NULL,NULL,NULL,'brock-may-rosales',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 10:09:34','2025-05-08 10:09:34'),(65,124,NULL,NULL,NULL,'orlando-weiss-acosta',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 10:10:24','2025-05-08 10:10:24'),(66,125,NULL,NULL,NULL,'aspen-hanson-davis',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-08 10:11:57','2025-05-08 10:11:57'),(67,126,NULL,NULL,NULL,'nina-carson-patrick',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-12 07:02:58','2025-05-12 07:02:58'),(68,127,NULL,NULL,NULL,'bree-michael-english',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-05-12 07:03:29','2025-05-12 07:03:29'),(73,133,NULL,NULL,NULL,'cally-hamilton-test-whitfield',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'1','0','1','1',0,0,NULL,'2025-07-03 11:52:50','2025-07-03 11:52:50');
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint unsigned NOT NULL,
  `lang_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_id_foreign` (`country_id`),
  KEY `cities_lang_id_foreign` (`lang_id`),
  CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cities_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=882 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (663,12,1,'Abşeron rayonu','Abşeron','01','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(664,12,1,'Ağdam rayonu','Ağdam','02','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(665,12,1,'Ağdaş rayonu','Ağdaş','03','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(666,12,1,'Ağcabədi rayonu','Ağcabədi','04','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(667,12,1,'Ağstafa rayonu','Ağstafa','05','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(668,12,1,'Ağsu rayonu','Ağsu','06','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(669,12,1,'Astara rayonu','Astara','07','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(670,12,1,'Balakən rayonu','Balakən','08','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(671,12,1,'Bərdə rayonu','Bərdə','09','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(673,12,1,'Beyləqan rayonu','Beyləqan','11','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(674,12,1,'Biləsuvar rayonu','Biləsuvar','12','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(675,12,1,'Cəbrayıl rayonu','Cəbrayıl','14','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(676,12,1,'Cəlilabad rayonu','Cəlilabad','15','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(677,12,1,'Daşkəsən rayonu','Daşkəsən','16','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(678,12,1,'Dəvəçi rayonu','Dəvəçi','17','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(679,12,1,'Şirvan','Şirvan','18','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(680,12,1,'Füzuli rayonu','Füzuli','19','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(681,12,1,'Gəncə','Gəncə','20','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(682,12,1,'Gədəbəy rayonu','Gədəbəy','21','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(683,12,1,'Goranboy rayonu','Goranboy','22','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(684,12,1,'Göyçay rayonu','Göyçay','23','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(685,12,1,'Hacıqabul rayonu','Hacıqabul','24','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(686,12,1,'Xanlar rayonu','Xanlar','25','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(687,12,1,'Xankəndi','Xankəndi','26','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(688,12,1,'Xaçmaz rayonu','Xaçmaz','27','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(689,12,1,'Xocavənd rayonu','Xocavənd','28','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(690,12,1,'Xızı rayonu','Xızı','29','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(691,12,1,'İmişli rayonu','İmişli','30','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(692,12,1,'İsmayıllı rayonu','İsmayıllı','31','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(693,12,1,'Kəlbəcər rayonu','Kəlbəcər','32','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(694,12,1,'Kürdəmir rayonu','Kürdəmir','33','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(695,12,1,'Qax rayonu','Qax','34','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(696,12,1,'Qazax rayonu','Qazax','35','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(697,12,1,'Qəbələ rayonu','Qəbələ','36','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(698,12,1,'Qobustan rayonu','Qobustan','37','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(699,12,1,'Qusar rayonu','Qusar','38','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(700,12,1,'Qubadlı rayonu','Qubadlı','39','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(701,12,1,'Quba rayonu','Quba','40','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(702,12,1,'Laçın rayonu','Laçın','41','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(703,12,1,'Lənkəran','Lənkəran','42','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(704,12,1,'Lerik rayonu','Lerik','43','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(705,12,1,'Masallı rayonu','Masallı','44','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(706,12,1,'Mingəçevir','Mingəçevir','45','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(707,12,1,'Naftalan','Naftalan','46','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(708,12,1,'Neftçala rayonu','Neftçala','47','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(709,12,1,'Oğuz rayonu','Oğuz','48','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(710,12,1,'Saatlı rayonu','Saatlı','49','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(711,12,1,'Sumqayıt','Sumqayıt','50','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(712,12,1,'Samux rayonu','Samux','51','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(713,12,1,'Salyan rayonu','Salyan','52','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(714,12,1,'Siyəzən rayonu','Siyəzən','53','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(715,12,1,'Sabirabad rayonu','Sabirabad','54','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(716,12,1,'Şəki','Şəki','55','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(717,12,1,'Şamaxı rayonu','Şamaxı','56','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(718,12,1,'Şəmkir rayonu','Şəmkir','57','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(719,12,1,'Şuşa rayonu','Şuşa','58','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(720,12,1,'Tərtər rayonu','Tərtər','59','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(721,12,1,'Tovuz rayonu','Tovuz','60','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(722,12,1,'Ucar rayonu','Ucar','61','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(723,12,1,'Zaqatala rayonu','Zaqatala','62','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(724,12,1,'Zərdab rayonu','Zərdab','63','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(725,12,1,'Zəngilan rayonu','Zəngilan','64','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(726,12,1,'Yardımlı rayonu','Yardımlı','65','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(727,12,1,'Yevlax','Yevlax','66','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(728,12,1,'Babək rayonu','Babək','67','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(729,12,1,'Şərur rayonu','Şərur','68','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(730,12,1,'Ordubad rayonu','Ordubad','69','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(731,12,1,'Naxçıvan şəhəri','Naxçıvan','70','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(732,12,1,'Şahbuz rayonu','Şahbuz','71','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(733,12,1,'Culfa rayonu','Culfa','72','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(734,12,1,'Naxçıvan','Naxçıvan','85','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(735,12,1,'Bakı','Bakı','90','1','2025-08-06 07:10:40','2025-08-06 07:10:40'),(736,493,2,'Абшеронский район','Абшерон','01','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(737,493,2,'Агдамский район','Агдам','02','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(738,493,2,'Агдашский район','Агдаш','03','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(739,493,2,'Агджабединский район','Агджабеди','04','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(740,493,2,'Агстафинский район','Агстафа','05','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(741,493,2,'Агсуинский район','Агсу','06','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(742,493,2,'Астаринский район','Астара','07','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(743,493,2,'Балакенский район','Балакен','08','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(744,493,2,'Бардинский район','Барда','09','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(745,493,2,'Баку','Баку','10','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(746,493,2,'Бейлаганский район','Бейлаган','11','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(747,493,2,'Билясуварский район','Билясувар','12','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(748,493,2,'Джебраильский район','Джебраил','14','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(749,493,2,'Джалилабадский район','Джалилабад','15','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(750,493,2,'Дашкесанский район','Дашкесан','16','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(751,493,2,'Девечинский район','Девечи','17','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(752,493,2,'Ширван','Ширван','18','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(753,493,2,'Физулинский район','Физули','19','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(754,493,2,'Гянджа','Гянджа','20','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(755,493,2,'Гедабейский район','Гедабей','21','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(756,493,2,'Горанбойский район','Горанбой','22','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(757,493,2,'Геокчайский район','Геокчай','23','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(758,493,2,'Хаджигабульский район','Хаджигабул','24','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(759,493,2,'Ханларский район','Ханлар','25','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(760,493,2,'Ханкенди','Ханкенди','26','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(761,493,2,'Хачмазский район','Хачмаз','27','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(762,493,2,'Ходжавендский район','Ходжавенд','28','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(763,493,2,'Хызынский район','Хызы','29','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(764,493,2,'Имишлинский район','Имишли','30','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(765,493,2,'Исмаиллинский район','Исмаилли','31','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(766,493,2,'Кельбаджарский район','Кельбаджар','32','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(767,493,2,'Кюрдамирский район','Кюрдамир','33','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(768,493,2,'Гахский район','Гах','34','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(769,493,2,'Газахский район','Газах','35','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(770,493,2,'Габалинский район','Габала','36','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(771,493,2,'Гобустанский район','Гобустан','37','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(772,493,2,'Гусарский район','Гусар','38','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(773,493,2,'Губадлинский район','Губадлы','39','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(774,493,2,'Губинский район','Губа','40','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(775,493,2,'Лачинский район','Лачин','41','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(776,493,2,'Ленкорань','Ленкорань','42','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(777,493,2,'Лерикский район','Лерик','43','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(778,493,2,'Масаллинский район','Масаллы','44','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(779,493,2,'Мингечаур','Мингечаур','45','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(780,493,2,'Нафталан','Нафталан','46','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(781,493,2,'Нефтчалинский район','Нефтчала','47','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(782,493,2,'Огузский район','Огуз','48','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(783,493,2,'Саатлинский район','Саатлы','49','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(784,493,2,'Сумгаит','Сумгаит','50','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(785,493,2,'Самухский район','Самух','51','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(786,493,2,'Сальянский район','Сальян','52','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(787,493,2,'Сиязаньский район','Сиязань','53','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(788,493,2,'Сабирабадский район','Сабирабад','54','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(789,493,2,'Шеки','Шеки','55','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(790,493,2,'Шамахинский район','Шамахы','56','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(791,493,2,'Шемкирский район','Шемкир','57','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(792,493,2,'Шушинский район','Шуша','58','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(793,493,2,'Тертерский район','Тертер','59','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(794,493,2,'Товузский район','Товуз','60','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(795,493,2,'Уджарский район','Уджар','61','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(796,493,2,'Закатальский район','Закатала','62','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(797,493,2,'Зардабский район','Зардаб','63','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(798,493,2,'Зангиланский район','Зангилан','64','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(799,493,2,'Ярдымлинский район','Ярдымлы','65','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(800,493,2,'Евлах','Евлах','66','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(801,493,2,'Бабекский район','Бабек','67','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(802,493,2,'Шарурский район','Шарур','68','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(803,493,2,'Ордубадский район','Ордубад','69','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(804,493,2,'Город Нахчыван','Нахчыван','70','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(805,493,2,'Шахбузский район','Шахбуз','71','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(806,493,2,'Джульфинский район','Джульфа','72','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(807,493,2,'Нахчыван','Нахчыван','85','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(808,493,2,'Баку','Баку','90','1','2025-08-06 07:12:53','2025-08-06 07:12:53'),(809,253,3,'Absheron District','Absheron','01','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(810,253,3,'Agdam District','Agdam','02','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(811,253,3,'Agdash District','Agdash','03','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(812,253,3,'Agjabadi District','Agjabadi','04','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(813,253,3,'Agstafa District','Agstafa','05','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(814,253,3,'Agsu District','Agsu','06','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(815,253,3,'Astara District','Astara','07','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(816,253,3,'Balakan District','Balakan','08','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(817,253,3,'Barda District','Barda','09','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(818,253,3,'Baku','Baku','10','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(819,253,3,'Beylagan District','Beylagan','11','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(820,253,3,'Bilasuvar District','Bilasuvar','12','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(821,253,3,'Jabrayil District','Jabrayil','14','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(822,253,3,'Jalilabad District','Jalilabad','15','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(823,253,3,'Dashkasan District','Dashkasan','16','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(824,253,3,'Davachi District','Davachi','17','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(825,253,3,'Shirvan','Shirvan','18','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(826,253,3,'Fuzuli District','Fuzuli','19','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(827,253,3,'Ganja','Ganja','20','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(828,253,3,'Gadabay District','Gadabay','21','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(829,253,3,'Goranboy District','Goranboy','22','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(830,253,3,'Goychay District','Goychay','23','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(831,253,3,'Hajigabul District','Hajigabul','24','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(832,253,3,'Khanlar District','Khanlar','25','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(833,253,3,'Khankandi','Khankandi','26','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(834,253,3,'Khachmaz District','Khachmaz','27','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(835,253,3,'Khojavend District','Khojavend','28','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(836,253,3,'Khizi District','Khizi','29','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(837,253,3,'Imishli District','Imishli','30','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(838,253,3,'Ismailli District','Ismailli','31','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(839,253,3,'Kalbajar District','Kalbajar','32','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(840,253,3,'Kurdamir District','Kurdamir','33','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(841,253,3,'Gakh District','Gakh','34','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(842,253,3,'Gazakh District','Gazakh','35','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(843,253,3,'Gabala District','Gabala','36','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(844,253,3,'Gobustan District','Gobustan','37','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(845,253,3,'Gusar District','Gusar','38','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(846,253,3,'Gubadli District','Gubadli','39','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(847,253,3,'Guba District','Guba','40','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(848,253,3,'Lachin District','Lachin','41','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(849,253,3,'Lankaran','Lankaran','42','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(850,253,3,'Lerik District','Lerik','43','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(851,253,3,'Masalli District','Masalli','44','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(852,253,3,'Mingachevir','Mingachevir','45','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(853,253,3,'Naftalan','Naftalan','46','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(854,253,3,'Neftchala District','Neftchala','47','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(855,253,3,'Oguz District','Oguz','48','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(856,253,3,'Saatli District','Saatli','49','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(857,253,3,'Sumgayit','Sumgayit','50','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(858,253,3,'Samukh District','Samukh','51','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(859,253,3,'Salyan District','Salyan','52','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(860,253,3,'Siyazan District','Siyazan','53','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(861,253,3,'Sabirabad District','Sabirabad','54','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(862,253,3,'Shaki','Shaki','55','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(863,253,3,'Shamakhi District','Shamakhi','56','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(864,253,3,'Shamkir District','Shamkir','57','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(865,253,3,'Shusha District','Shusha','58','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(866,253,3,'Tartar District','Tartar','59','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(867,253,3,'Tovuz District','Tovuz','60','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(868,253,3,'Ujar District','Ujar','61','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(869,253,3,'Zagatala District','Zagatala','62','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(870,253,3,'Zardab District','Zardab','63','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(871,253,3,'Zangilan District','Zangilan','64','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(872,253,3,'Yardimli District','Yardimli','65','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(873,253,3,'Yevlakh','Yevlakh','66','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(874,253,3,'Babek District','Babek','67','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(875,253,3,'Sharur District','Sharur','68','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(876,253,3,'Ordubad District','Ordubad','69','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(877,253,3,'Nakhchivan City','Nakhchivan','70','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(878,253,3,'Shahbuz District','Shahbuz','71','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(879,253,3,'Julfa District','Julfa','72','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(880,253,3,'Nakhchivan','Nakhchivan','85','1','2025-08-06 07:14:34','2025-08-06 07:14:34'),(881,253,3,'Baku','Baku','90','1','2025-08-06 07:14:34','2025-08-06 07:14:34');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint unsigned DEFAULT NULL,
  `country_id` bigint unsigned DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `map_address` text COLLATE utf8mb4_unicode_ci,
  `company_size` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 => 1-10, 1 => 11-50, 2 => 51-200, 3 => 201-500, 4 => 501-1000, 5 => 1000+',
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `vacancy_posts_limit` int NOT NULL DEFAULT '5',
  `vacancy_posts_used` int NOT NULL DEFAULT '0',
  `can_see_candidate_contacts` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded_year` year DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_slug_unique` (`slug`),
  KEY `companies_user_id_foreign` (`user_id`),
  KEY `companies_city_id_foreign` (`city_id`),
  CONSTRAINT `companies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (3,71,'JobNest MMC','jobnest-mmc','JobNest Sizin İş yuvanız','+994-(55)-878-37-00','http://jobnest.az/','cv@jobnest.az',735,12,'Baku Rashid Behbudov',40.40284312,49.87063408,'Nariman Narimanov, Bakı, Azerbaijan','0','telecom_it','individual_entrepreneur','1',5,0,'0','JobNest','JobNest - Karyera bizimlə başlayır!','JobNest, telecom_it, JobNest Sizin İş yuvanız',2025,'JobNest - Karyera bizimlə başlayır!','assets/front/custom/images/companies/jobnest-logo-1756982528.png','assets/front/custom/images/companies/jobnest-background-image-1756971351.jpg','2025-05-02 07:15:38','2025-09-04 10:48:35'),(4,74,'Risk Company','risk-company',NULL,NULL,'https://risk.az/','riskcompany@jobnest.az',735,12,'111 Azadlıq Prospekti, Bakı 1007, Azerbaijan',40.38731728,49.84318242,'111 Azadlıq Prospekti, Bakı 1007, Azerbaijan','4','bank_finance','non_profit','1',5,0,'0','Risk Company','Established in 1993, R.I.S.K. Company is one of the leading IT companies in the Central Asia and Caucasus markets providing solutions in IT consultancy, System Integration, IT-outsourcing, Application Development and Geographical Information Systems. R.I.S.K. offers a broad range of innovative solutions for telecom, oil & gas, government & defense, banking & finance and transport sectors.\r\nR.I.S.K. focuses on implementation of large-scale projects of public importance in building ICT Infrastructure, Information Security Systems and Application Platforms. IBM, Dell, Cisco, EMC, Avaya, Oracle, Microsoft, Emerson and other ICT industry leaders are the Company’s official partners.\r\nR.I.S.K. Company’s quality management system is certified according to the international quality standard ISO 9001:2015. R.I.S.K. Company has an active sales operation in more than 20 countries all over the world with registered offices in Azerbaijan, Tajikistan, Georgia.','Risk Company, bank_finance',1999,'Established in 1993, R.I.S.K. Company is one of the leading IT companies in the Central Asia and Caucasus markets providing solutions in IT consultancy, System Integration, IT-outsourcing, Application Development and Geographical Information Systems. R.I.S.K. offers a broad range of innovative solutions for telecom, oil & gas, government & defense, banking & finance and transport sectors.\r\nR.I.S.K. focuses on implementation of large-scale projects of public importance in building ICT Infrastructure, Information Security Systems and Application Platforms. IBM, Dell, Cisco, EMC, Avaya, Oracle, Microsoft, Emerson and other ICT industry leaders are the Company’s official partners.\r\nR.I.S.K. Company’s quality management system is certified according to the international quality standard ISO 9001:2015. R.I.S.K. Company has an active sales operation in more than 20 countries all over the world with registered offices in Azerbaijan, Tajikistan, Georgia.','assets/front/custom/images/companies/risk-company-logo-1757487600.jpg','assets/front/custom/images/companies/risk-company-background-image-1757487600.png','2025-05-02 08:24:05','2025-09-10 07:00:00'),(12,102,'Simbrella','simbrella','First Company in the world to launch Mobile Fintech Services','+994-(12)-404-31-32','https://www.simbrella.com/','baku@simbrella.com',735,12,'Jalil Mammadguluzadeh st. 102 A, City Point Business Centre, AZ1022, Baku, Azerbaijan',40.38261007,49.87013326,'44 Xocalı prospekti, Bakı, Azerbaijan','5','telecom_it','non_profit','1',5,0,'0','Simbrella',NULL,'Simbrella, telecom_it, First Company in the world to launch Mobile Fintech Services',1998,NULL,'assets/front/custom/images/companies/simbrella-logo-1757487890.jpg','assets/front/custom/images/companies/simbrella-background-image-1757487890.png','2025-05-08 07:04:28','2025-09-10 07:04:50'),(14,132,'BestComp Group','bestcomp-group','Trusted by the world’s leading tech companies','+994-(12)-541-47-47','https://bestcomp.net/','bestcomp@jobnest.az',735,12,'31 Hüseyn Cavid Prospekti, Bakı, Azerbaijan',40.37518991,49.81492996,'31 Hüseyn Cavid Prospekti, Bakı, Azerbaijan','5','telecom_it','non_profit','1',5,0,'0','BestComp Group','Our Integrated Management Systems (IMS) at Bestcomp Group CJSC is more than just combining different management systems; it’s a strategic approach that integrates quality, health and safety, information security, and anti-bribery into one unified system.','BestComp Group, telecom_it, Trusted by the world’s leading tech companies',2025,'Our Integrated Management Systems (IMS) at Bestcomp Group CJSC is more than just combining different management systems; it’s a strategic approach that integrates quality, health and safety, information security, and anti-bribery into one unified system.','assets/front/custom/images/companies/bestcomp-group-logo-1757486655.png','assets/front/custom/images/companies/bestcomp-group-background-image-1757486655.jpg','2025-05-30 07:10:48','2025-09-10 06:44:15'),(22,131,'Azerimed LLC','azerimed-llc','Düzgün seçim, sizin sağlamlığınızdır!',NULL,'https://azerimed.com/','azerimedllc@jobnest.az',735,12,'42a Əhməd Rəcəbli, Bakı 1075, Azerbaijan',40.41117964,49.86369500,'42a Əhməd Rəcəbli, Bakı 1075, Azerbaijan','4','telecom_it','qsc','1',5,0,'0','Azerimed LLC','Azəri Med QSC Azərbaycanın ən sürətlə inkişaf edən aparıcı tibbi tədarükçülərindən biridir. Biz xəstəxanalar, apteklər və distribyutorları yüksək keyfiyyətli əczaçılıq məhsulları, qida əlavələri, tibbi cihazlar, sərf materialları və s.ilə təmin edirik. Fəaliyyətimizin mərkəzində insan sağlamlığı dayandığı üçün, böyük məsuliyyət tələb edir və biz peşəkar kadrlarımızın köməyi ilə nəinki Bakıda, həm də Azərbaycanın müxtəlif regionlarında bunun öhdəsindən məharətlə gəlirik. Azəri Med QSC-nin sadə və aydın məqsədi var: insanlara daha yaxşı sağlamlıq yolunda kömək etmək.\r\n\r\n       Qlobal tərəfdaşlarımız və təcrübəli logistik komandamızın köməyi ilə müştərilərimizin ən yüksək keyfiyyət və sərfəli qiymətlərdən faydalanmasını təmin edirik. Həmçinin, tibbi tələblərin yerli, milli və beynəlxalq səviyyələrdə hər zaman vaxtında qarşılanmasına təminat veririk. Azəri Med QSC Roche Diagnostics, Pfizer Export B.V, Novartis Pharma Services AG, Medtronic Trading NL B.V, Sanofi-Aventis SPA, Nature’s Bounty və başqa  dünyada tanınan istehsalçılar ilə əməkdaşlıq edir.\r\n\r\n       Milli apteklər zənciri ilə qabaqcıl müştəri-yönümlü sağlamlıq şirkəti olmaq kimi ortaq bir hədəf ətrafında birləşmişik. Dəyişən istehlakçı ehtiyaclarına əsaslanaraq inkişaf edir və 170-ə yaxın apteklərimiz sayəsində vətəndaşlarımıza olduqları hər yerdə xidmət göstəririk .\r\n\r\n       İnnovasiya və inkişaf, etibarlılıq, humanizm Azəri Med QSC-nin əsas dəyərləridir və məqsədimiz hər kəsin rahat şəkildə əldə edə biləcəyi yüksək keyfiyyətli yeni və çoxşaxəli tibbi məhsullar təklif etməkdir.','Azerimed LLC, telecom_it, Düzgün seçim, sizin sağlamlığınızdır!',2000,'Azəri Med QSC Azərbaycanın ən sürətlə inkişaf edən aparıcı tibbi tədarükçülərindən biridir. Biz xəstəxanalar, apteklər və distribyutorları yüksək keyfiyyətli əczaçılıq məhsulları, qida əlavələri, tibbi cihazlar, sərf materialları və s.ilə təmin edirik. Fəaliyyətimizin mərkəzində insan sağlamlığı dayandığı üçün, böyük məsuliyyət tələb edir və biz peşəkar kadrlarımızın köməyi ilə nəinki Bakıda, həm də Azərbaycanın müxtəlif regionlarında bunun öhdəsindən məharətlə gəlirik. Azəri Med QSC-nin sadə və aydın məqsədi var: insanlara daha yaxşı sağlamlıq yolunda kömək etmək.\r\n\r\n       Qlobal tərəfdaşlarımız və təcrübəli logistik komandamızın köməyi ilə müştərilərimizin ən yüksək keyfiyyət və sərfəli qiymətlərdən faydalanmasını təmin edirik. Həmçinin, tibbi tələblərin yerli, milli və beynəlxalq səviyyələrdə hər zaman vaxtında qarşılanmasına təminat veririk. Azəri Med QSC Roche Diagnostics, Pfizer Export B.V, Novartis Pharma Services AG, Medtronic Trading NL B.V, Sanofi-Aventis SPA, Nature’s Bounty və başqa  dünyada tanınan istehsalçılar ilə əməkdaşlıq edir.\r\n\r\n       Milli apteklər zənciri ilə qabaqcıl müştəri-yönümlü sağlamlıq şirkəti olmaq kimi ortaq bir hədəf ətrafında birləşmişik. Dəyişən istehlakçı ehtiyaclarına əsaslanaraq inkişaf edir və 170-ə yaxın apteklərimiz sayəsində vətəndaşlarımıza olduqları hər yerdə xidmət göstəririk .\r\n\r\n       İnnovasiya və inkişaf, etibarlılıq, humanizm Azəri Med QSC-nin əsas dəyərləridir və məqsədimiz hər kəsin rahat şəkildə əldə edə biləcəyi yüksək keyfiyyətli yeni və çoxşaxəli tibbi məhsullar təklif etməkdir.','assets/front/custom/images/companies/azerimed-llc-logo-1757486137.webp','assets/front/custom/images/companies/azerimed-llc-background-image-1757486137.jpg','2025-09-09 12:02:50','2025-09-10 06:35:37'),(23,129,'Flup Agency','flup-agency','\"FLUP\"-Rəqəmsal trendləri o diqtə edir','+994-(99)-450-70-36','https://flup.agency/','info@flup.az',735,12,'89a Fətəli Xan Xoyski, Bakı, Azerbaijan',40.40261345,49.85468373,'89a Fətəli Xan Xoyski, Bakı, Azerbaijan','1','non_profit','mmc','1',5,0,'0','Flup Agency','Rəqəmsal marketinq və IT xidmətlərimizlə iş proseslərinizi rəqəmsallaşdıraraq daha səmərəli və müasir həllər təqdim edirik. Bizim məqsədimiz, müştərilərimizin rəqiblərindən fərqlənməsinə və bazarda güclü mövqe əldə etməsinə dəstək olmaqdır.','Flup Agency, non_profit, \"FLUP\"-Rəqəmsal trendləri o diqtə edir',2018,'Rəqəmsal marketinq və IT xidmətlərimizlə iş proseslərinizi rəqəmsallaşdıraraq daha səmərəli və müasir həllər təqdim edirik. Bizim məqsədimiz, müştərilərimizin rəqiblərindən fərqlənməsinə və bazarda güclü mövqe əldə etməsinə dəstək olmaqdır.','assets/front/custom/images/companies/flup-agency-logo-1757487006.jpg','assets/front/custom/images/companies/flup-agency-background-image-1757487006.jpg','2025-09-09 12:03:16','2025-09-10 06:50:06'),(24,104,'Sinam','sinam',NULL,NULL,'https://sinam.net/en/','sinam@jobnest.az',735,12,'27a Ələsgər Ələkbərov Küçəsi, Bakı, Azerbaijan',40.36966353,49.81880650,'27a Ələsgər Ələkbərov Küçəsi, Bakı, Azerbaijan','4','telecom_it','asc','1',5,0,'0','Sinam','Since 1994, SINAM Ltd has been driving transformation projects in the government and private sectors, with the use of cutting-edge information and communication technologies (ICT). For nearly two decades, the Company helped its clients to improve governance, increase operational efficiency, and boost financial results.\r\n\r\nToday, SINAM is Trans-Caspian\'s market leader in e-Transformation and e-Government services; in fact, it has been instrumental in the region\'s drive for informatization.','Sinam, telecom_it',1994,'Since 1994, SINAM Ltd has been driving transformation projects in the government and private sectors, with the use of cutting-edge information and communication technologies (ICT). For nearly two decades, the Company helped its clients to improve governance, increase operational efficiency, and boost financial results.\r\n\r\nToday, SINAM is Trans-Caspian\'s market leader in e-Transformation and e-Government services; in fact, it has been instrumental in the region\'s drive for informatization.','assets/front/custom/images/companies/sinam-logo-1757488072.jpg','assets/front/custom/images/companies/sinam-background-image-1757488072.jpg','2025-09-09 12:03:33','2025-09-10 07:07:52'),(25,122,'Kapital Bank','kapital-bank',NULL,NULL,'https://www.kapitalbank.az/','kapitalbank@jobnest.az',735,12,'100 Zərgər Palan, Bakı 1009, Azerbaijan',40.37829483,49.83013616,'100 Zərgər Palan, Bakı 1009, Azerbaijan','5','bank_finance','government_entity','1',5,0,'0','Kapital Bank','Bank haqqında\r\nKapital Bank Azərbaycan Əmanət Bankının varisi kimi 150 ildir ki, uğurla fəaliyyət göstərir. Hazırda Kapital Bank Azərbaycanda ən böyük xidmət şəbəkəsinə malik maliyyə qurumudur. Universal bank olan Kapital Bank 5 milyondan çox fiziki və 22 mindən artıq hüquqi şəxslərə xidmət göstərir. Eyni zamanda, Kapital Bank dövlətin həyata keçirdiyi bir sıra sosial proqramlarda yaxından iştirak edir və real sektorun inkişafı üzrə bir sıra proqramları həyata keçirir.\r\n\r\nStrateji baxışımız\r\nDaha dayanıqlı gələcəyi təmin edən və qabaqсıl dünya trendlərini özündə cəmləşdirən, hər kəsin bir nömrəli maliyyə tərəfdaşına çevrilməkdir.\r\n\r\nMissiyamız\r\nHəyatınızın hər bir dönəmində şəffaf maliyyə tərəfdaşlığımızla ölkəmizin sosial-iqtisadi rifah halını birlikdə yüksəltməkdir.','Kapital Bank, bank_finance',1994,'Bank haqqında\r\nKapital Bank Azərbaycan Əmanət Bankının varisi kimi 150 ildir ki, uğurla fəaliyyət göstərir. Hazırda Kapital Bank Azərbaycanda ən böyük xidmət şəbəkəsinə malik maliyyə qurumudur. Universal bank olan Kapital Bank 5 milyondan çox fiziki və 22 mindən artıq hüquqi şəxslərə xidmət göstərir. Eyni zamanda, Kapital Bank dövlətin həyata keçirdiyi bir sıra sosial proqramlarda yaxından iştirak edir və real sektorun inkişafı üzrə bir sıra proqramları həyata keçirir.\r\n\r\nStrateji baxışımız\r\nDaha dayanıqlı gələcəyi təmin edən və qabaqсıl dünya trendlərini özündə cəmləşdirən, hər kəsin bir nömrəli maliyyə tərəfdaşına çevrilməkdir.\r\n\r\nMissiyamız\r\nHəyatınızın hər bir dönəmində şəffaf maliyyə tərəfdaşlığımızla ölkəmizin sosial-iqtisadi rifah halını birlikdə yüksəltməkdir.','assets/front/custom/images/companies/kapital-bank-logo-1757487284.jpg','assets/front/custom/images/companies/kapital-bank-background-image-1757487284.jpg','2025-09-09 12:03:48','2025-09-10 06:54:44');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_translations`
--

DROP TABLE IF EXISTS `content_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` bigint unsigned NOT NULL,
  `group` blob NOT NULL,
  `key` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content_translations_lang_id_group_key_unique` (`lang_id`,`group`(20),`key`(100)),
  CONSTRAINT `content_translations_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_translations`
--

LOCK TABLES `content_translations` WRITE;
/*!40000 ALTER TABLE `content_translations` DISABLE KEYS */;
INSERT INTO `content_translations` VALUES (1,3,_binary '0x001','slider_title','Find the job that fits your life','1','2025-07-23 11:12:23','2025-07-23 11:41:18'),(2,1,_binary '0x001','slider_title','Həyatınıza uyğun işi tapın','1','2025-07-23 12:23:26','2025-07-23 12:23:26'),(3,4,_binary '0x001','slider_title','Hayatınıza uygun işi bulun','1','2025-07-23 12:23:59','2025-07-23 12:23:59'),(4,2,_binary '0x001','slider_title','Найдите работу, которая подходит вашей жизни','1','2025-07-23 12:24:25','2025-07-23 12:37:35'),(6,3,_binary '0x001','working_process_title','How It Works','1','2025-07-24 06:17:16','2025-07-24 06:17:16'),(7,1,_binary '0x001','working_process_title','Necə işləyir?','1','2025-07-24 06:17:52','2025-07-24 07:53:45'),(8,2,_binary '0x001','working_process_title','Как это работает','1','2025-07-24 06:18:33','2025-07-24 06:18:33'),(9,1,_binary '0x001','working_process_title_small','İş Prosesi','1','2025-07-24 07:43:33','2025-07-24 07:43:33'),(10,3,_binary '0x001','jobs_categories_title_small','Jobs by Categories','1','2025-07-24 07:47:57','2025-07-24 07:47:57'),(11,1,_binary '0x001','jobs_categories_title_small','Kateqoriyalar üzrə İşlər','1','2025-07-24 07:48:17','2025-07-24 07:48:17'),(12,1,_binary '0x001','main','Əsas','1','2025-07-24 11:09:00','2025-07-24 11:09:00'),(13,1,_binary '0x001','vacancies','Vakansiyalar','1','2025-07-24 11:09:29','2025-07-24 11:09:29'),(14,1,_binary '0x001','companies','Şirkətlər','1','2025-07-24 11:10:17','2025-07-24 11:10:17'),(15,1,_binary '0x001','resumes','CV-lər','1','2025-07-24 11:10:49','2025-07-24 11:10:49'),(16,1,_binary '0x001','about_us','Haqqımızda','1','2025-07-24 11:11:29','2025-07-24 11:11:29'),(17,1,_binary '0x001','blogs','Məqalələr','1','2025-07-24 11:11:44','2025-07-24 11:11:44'),(18,1,_binary '0x001','faq','TVS','1','2025-07-24 11:13:12','2025-07-24 11:13:12'),(19,1,_binary '0x001','contact','Əlaqə','1','2025-07-24 11:13:49','2025-07-24 11:13:49'),(27,1,_binary '0x001','profile','Profil','1','2025-09-05 06:14:47','2025-09-05 06:14:47'),(28,1,_binary '0x001','social_network','Sosial şəbəkə','1','2025-09-05 06:15:24','2025-09-05 06:15:24'),(29,1,_binary '0x001','company_name','Şirkət adı','1','2025-09-05 06:17:23','2025-09-05 06:17:23'),(30,1,_binary '0x001','phone','Telefon','1','2025-09-05 06:20:19','2025-09-05 06:20:19'),(31,1,_binary '0x001','email','Email','1','2025-09-05 06:20:32','2025-09-05 06:20:32'),(32,1,_binary '0x001','cv_send_email','CV göndəriləcək email','1','2025-09-05 06:21:03','2025-09-05 06:21:03'),(33,1,_binary '0x001','website','Vebsayt','1','2025-09-05 06:23:32','2025-09-05 06:23:32'),(34,1,_binary '0x001','tagline','Slogan','1','2025-09-05 06:23:42','2025-09-05 06:23:42'),(35,1,_binary '0x001','country','Ölkə','1','2025-09-05 06:24:13','2025-09-05 06:24:13'),(36,1,_binary '0x001','city','Şəhər','1','2025-09-05 06:24:23','2025-09-05 06:24:23'),(37,1,_binary '0x001','full_address','Tam ünvan','1','2025-09-05 06:24:47','2025-09-05 06:24:47'),(38,1,_binary '0x001','location','Məkan','1','2025-09-05 06:25:18','2025-09-05 06:25:18'),(39,1,_binary '0x001','selected_location','Seçilmiş məkan','1','2025-09-05 07:03:04','2025-09-05 07:03:04'),(40,1,_binary '0x001','coordinates','Koordinatlar','1','2025-09-05 07:03:54','2025-09-05 07:03:54'),(41,1,_binary '0x001','industry','Fəaliyyət sahəsi','1','2025-09-05 07:09:31','2025-09-05 07:09:31'),(42,1,_binary '0x001','company_type','Şirkət növü','1','2025-09-05 07:09:54','2025-09-05 07:09:54'),(43,1,_binary '0x001','employee_count','İşçi sayı','1','2025-09-05 07:10:16','2025-09-05 07:10:16'),(44,1,_binary '0x001','founded_year','Təsis İli','1','2025-09-05 07:11:06','2025-09-05 07:11:06'),(45,1,_binary '0x001','company_about','Şirkət haqqında','1','2025-09-05 07:11:33','2025-09-05 07:11:33'),(46,1,_binary '0x001','logo','Logo','1','2025-09-05 07:12:20','2025-09-05 07:12:20'),(47,1,_binary '0x001','background_image','Fon şəkli','1','2025-09-05 07:12:57','2025-09-05 07:12:57'),(48,1,_binary '0x001','save','Yadda saxla','1','2025-09-05 07:13:36','2025-09-05 07:13:36');
/*!40000 ALTER TABLE `content_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_lang_id_foreign` (`lang_id`),
  CONSTRAINT `countries_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=723 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (2,1,'Afqanıstan','af','93','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(3,1,'Albaniya','al','355','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(4,1,'Əlcəzair','dz','213','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(5,1,'Andorra','ad','376','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(6,1,'Anqola','ao','244','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(7,1,'Antiqua və Barbuda','ag','1268','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(8,1,'Argentina','ar','54','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(9,1,'Ermənistan','am','374','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(10,1,'Avstraliya','au','61','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(11,1,'Avstriya','at','43','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(12,1,'Azərbaycan','az','994','1','2025-07-25 06:01:59','2025-07-25 06:01:59'),(13,1,'Bahamalar','bs','1242','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(14,1,'Bəhreyn','bh','973','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(15,1,'Banqladeş','bd','880','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(16,1,'Barbados','bb','1246','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(17,1,'Belarus','by','375','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(18,1,'Belçika','be','32','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(19,1,'Beliz','bz','501','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(20,1,'Benin','bj','229','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(21,1,'Butan','bt','975','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(22,1,'Boliviya','bo','591','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(23,1,'Bosniya və Herseqovina','ba','387','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(24,1,'Botsvana','bw','267','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(25,1,'Braziliya','br','55','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(26,1,'Bruney','bn','673','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(27,1,'Bolqarıstan','bg','359','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(28,1,'Burkina Faso','bf','226','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(29,1,'Burundi','bi','257','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(30,1,'Kamboca','kh','855','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(31,1,'Kamerun','cm','237','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(32,1,'Kanada','ca','1','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(33,1,'Kabo Verde','cv','238','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(34,1,'Mərkəzi Afrika Respublikası','cf','236','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(35,1,'Çad','td','235','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(36,1,'Çili','cl','56','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(37,1,'Çin','cn','86','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(38,1,'Kolumbiya','co','57','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(39,1,'Komor adaları','km','269','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(40,1,'Konqo','cg','242','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(41,1,'Konqo Demokratik Respublikası','cd','243','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(42,1,'Kosta Rika','cr','506','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(43,1,'Fil Dişi Sahili','ci','225','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(44,1,'Xorvatiya','hr','385','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(45,1,'Kuba','cu','53','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(46,1,'Kipr','cy','357','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(47,1,'Çexiya','cz','420','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(48,1,'Danimarka','dk','45','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(49,1,'Cibuti','dj','253','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(50,1,'Dominika','dm','1767','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(51,1,'Dominikan Respublikası','do','1809','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(52,1,'Ekvador','ec','593','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(53,1,'Misir','eg','20','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(54,1,'El Salvador','sv','503','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(55,1,'Ekvatorial Qvineya','gq','240','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(56,1,'Eritreya','er','291','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(57,1,'Estoniya','ee','372','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(58,1,'Efiopiya','et','251','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(59,1,'Fici','fj','679','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(60,1,'Finlandiya','fi','358','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(61,1,'Fransa','fr','33','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(62,1,'Qabon','ga','241','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(63,1,'Qambiya','gm','220','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(64,1,'Gürcüstan','ge','995','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(65,1,'Almaniya','de','49','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(66,1,'Qana','gh','233','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(67,1,'Yunanıstan','gr','30','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(68,1,'Qrenada','gd','1473','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(69,1,'Qvatemala','gt','502','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(70,1,'Qvineya','gn','224','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(71,1,'Qvineya-Bisau','gw','245','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(72,1,'Qayana','gy','592','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(73,1,'Haiti','ht','509','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(74,1,'Honduras','hn','504','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(75,1,'Macarıstan','hu','36','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(76,1,'İslandiya','is','354','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(77,1,'Hindistan','in','91','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(78,1,'İndoneziya','id','62','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(79,1,'İran','ir','98','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(80,1,'İraq','iq','964','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(81,1,'İrlandiya','ie','353','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(82,1,'İsrail','il','972','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(83,1,'İtaliya','it','39','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(84,1,'Yamayka','jm','1876','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(85,1,'Yaponiya','jp','81','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(86,1,'İordaniya','jo','962','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(87,1,'Qazaxıstan','kz','7','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(88,1,'Keniya','ke','254','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(89,1,'Kiribati','ki','686','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(90,1,'Şimali Koreya','kp','850','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(91,1,'Cənubi Koreya','kr','82','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(92,1,'Küveyt','kw','965','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(93,1,'Qırğızıstan','kg','996','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(94,1,'Laos','la','856','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(95,1,'Latviya','lv','371','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(96,1,'Livan','lb','961','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(97,1,'Lesoto','ls','266','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(98,1,'Liberiya','lr','231','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(99,1,'Liviya','ly','218','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(100,1,'Lixtenşteyn','li','423','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(101,1,'Litva','lt','370','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(102,1,'Lüksemburq','lu','352','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(103,1,'Şimali Makedoniya','mk','389','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(104,1,'Madaqaskar','mg','261','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(105,1,'Malavi','mw','265','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(106,1,'Malayziya','my','60','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(107,1,'Maldiv adaları','mv','960','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(108,1,'Mali','ml','223','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(109,1,'Malta','mt','356','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(110,1,'Marşal adaları','mh','692','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(111,1,'Moritaniya','mr','222','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(112,1,'Mavriki','mu','230','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(113,1,'Meksika','mx','52','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(114,1,'Mikroneziya','fm','691','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(115,1,'Moldova','md','373','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(116,1,'Monako','mc','377','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(117,1,'Monqolustan','mn','976','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(118,1,'Monteneqro','me','382','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(119,1,'Mərakeş','ma','212','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(120,1,'Mozambik','mz','258','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(121,1,'Myanmar','mm','95','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(122,1,'Namibiya','na','264','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(123,1,'Nauru','nr','674','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(124,1,'Nepal','np','977','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(125,1,'Niderland','nl','31','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(126,1,'Yeni Zelandiya','nz','64','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(127,1,'Nikaraqua','ni','505','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(128,1,'Niger','ne','227','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(129,1,'Nigeriya','ng','234','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(130,1,'Norveç','no','47','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(131,1,'Oman','om','968','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(132,1,'Pakistan','pk','92','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(133,1,'Palau','pw','680','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(134,1,'Panama','pa','507','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(135,1,'Papua Yeni Qvineya','pg','675','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(136,1,'Paraqvay','py','595','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(137,1,'Peru','pe','51','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(138,1,'Filippin','ph','63','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(139,1,'Polşa','pl','48','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(140,1,'Portuqaliya','pt','351','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(141,1,'Qətər','qa','974','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(142,1,'Rumıniya','ro','40','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(143,1,'Rusiya','ru','7','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(144,1,'Ruanda','rw','250','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(145,1,'Sent Kits və Nevis','kn','1869','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(146,1,'Sent Lusiya','lc','1758','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(147,1,'Sent Vinsent və Qrenadinlər','vc','1784','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(148,1,'Samoa','ws','685','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(149,1,'San Marino','sm','378','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(150,1,'San Tome və Prinsipi','st','239','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(151,1,'Səudiyyə Ərəbistanı','sa','966','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(152,1,'Seneqal','sn','221','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(153,1,'Serbiya','rs','381','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(154,1,'Seyşel adaları','sc','248','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(155,1,'Syerra Leone','sl','232','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(156,1,'Sinqapur','sg','65','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(157,1,'Slovakiya','sk','421','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(158,1,'Sloveniya','si','386','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(159,1,'Solomon adaları','sb','677','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(160,1,'Somali','so','252','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(161,1,'Cənubi Afrika','za','27','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(162,1,'Cənubi Sudan','ss','211','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(163,1,'İspaniya','es','34','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(164,1,'Şri Lanka','lk','94','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(165,1,'Sudan','sd','249','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(166,1,'Surinam','sr','597','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(167,1,'İsveç','se','46','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(168,1,'İsveçrə','ch','41','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(169,1,'Suriya','sy','963','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(170,1,'Tacikistan','tj','992','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(171,1,'Tanzaniya','tz','255','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(172,1,'Tayland','th','66','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(173,1,'Şərqi Timor','tl','670','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(174,1,'Toqo','tg','228','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(175,1,'Tonqa','to','676','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(176,1,'Trinidad və Tobaqo','tt','1868','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(177,1,'Tunis','tn','216','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(178,1,'Türkiyə','tr','90','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(179,1,'Türkmənistan','tm','993','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(180,1,'Tuvalu','tv','688','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(181,1,'Uqanda','ug','256','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(182,1,'Ukrayna','ua','380','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(183,1,'Birləşmiş Ərəb Əmirlikləri','ae','971','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(184,1,'Böyük Britaniya','gb','44','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(185,1,'Amerika Birləşmiş Ştatları','us','1','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(186,1,'Uruqvay','uy','598','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(187,1,'Özbəkistan','uz','998','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(188,1,'Vanuatu','vu','678','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(189,1,'Vatikan','va','379','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(190,1,'Venesuela','ve','58','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(191,1,'Vyetnam','vn','84','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(192,1,'Yəmən','ye','967','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(193,1,'Zambiya','zm','260','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(194,1,'Zimbabve','zw','263','0','2025-07-25 06:01:59','2025-07-25 06:01:59'),(195,1,'Fələstin','ps','970','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(196,1,'Kosovo','xk','383','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(197,1,'Tayvan','tw','886','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(198,1,'Honq Konq','hk','852','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(199,1,'Makao','mo','853','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(200,1,'Qrenlandiya','gl','299','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(201,1,'Faroe adaları','fo','298','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(202,1,'Bermuda','bm','1441','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(203,1,'Cayman adaları','ky','1345','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(204,1,'Virqin adaları (Britaniya)','vg','1284','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(205,1,'Falkland adaları','fk','500','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(206,1,'Cəbəlüttariq','gi','350','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(207,1,'Sent Elena','sh','290','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(208,1,'Turks və Caicos adaları','tc','1649','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(209,1,'Anguilla','ai','1264','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(210,1,'Montserrat','ms','1664','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(211,1,'Puerto Riko','pr','1787','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(212,1,'Virqin adaları (ABŞ)','vi','1340','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(213,1,'Qvam','gu','1671','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(214,1,'Amerika Samoası','as','1684','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(215,1,'Şimali Mariana adaları','mp','1670','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(216,1,'Yeni Kaledoniya','nc','687','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(217,1,'Fransa Polinesiyası','pf','689','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(218,1,'Mayotte','yt','262','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(219,1,'Reunion','re','262','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(220,1,'Martinik','mq','596','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(221,1,'Qvadelupe','gp','590','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(222,1,'Fransa Qvianası','gf','594','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(223,1,'Sent Pyer və Mikelon','pm','508','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(224,1,'Vallis və Futuna','wf','681','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(225,1,'Sent Martin','mf','590','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(226,1,'Sent Bartolome','bl','590','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(227,1,'Aruba','aw','297','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(228,1,'Curacao','cw','599','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(229,1,'Sint Maarten','sx','1721','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(230,1,'Bonaire','bq','599','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(231,1,'Kuk adaları','ck','682','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(232,1,'Niue','nu','683','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(233,1,'Norfolk adası','nf','672','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(234,1,'Pitcairn adaları','pn','64','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(235,1,'Tokelau','tk','690','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(236,1,'Antarktika','aq','672','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(237,1,'Şimali Kipr','nc','90392','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(238,1,'Cənubi Osetiya','so','995','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(239,1,'Abxaziya','ab','995','0','2025-07-25 06:03:59','2025-07-25 06:44:24'),(240,1,'Dağlıq Qarabağ','nk','374','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(241,1,'Pridnestr','md','373','0','2025-07-25 06:03:59','2025-07-25 06:03:59'),(243,3,'Afghanistan','af','93','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(244,3,'Albania','al','355','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(245,3,'Algeria','dz','213','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(246,3,'Andorra','ad','376','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(247,3,'Angola','ao','244','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(248,3,'Antigua and Barbuda','ag','1268','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(249,3,'Argentina','ar','54','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(250,3,'Armenia','am','374','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(251,3,'Australia','au','61','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(252,3,'Austria','at','43','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(253,3,'Azerbaijan','az','994','1','2025-07-25 06:48:21','2025-07-25 06:48:21'),(254,3,'Bahamas','bs','1242','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(255,3,'Bahrain','bh','973','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(256,3,'Bangladesh','bd','880','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(257,3,'Barbados','bb','1246','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(258,3,'Belarus','by','375','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(259,3,'Belgium','be','32','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(260,3,'Belize','bz','501','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(261,3,'Benin','bj','229','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(262,3,'Bhutan','bt','975','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(263,3,'Bolivia','bo','591','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(264,3,'Bosnia and Herzegovina','ba','387','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(265,3,'Botswana','bw','267','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(266,3,'Brazil','br','55','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(267,3,'Brunei','bn','673','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(268,3,'Bulgaria','bg','359','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(269,3,'Burkina Faso','bf','226','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(270,3,'Burundi','bi','257','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(271,3,'Cambodia','kh','855','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(272,3,'Cameroon','cm','237','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(273,3,'Canada','ca','1','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(274,3,'Cape Verde','cv','238','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(275,3,'Central African Republic','cf','236','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(276,3,'Chad','td','235','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(277,3,'Chile','cl','56','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(278,3,'China','cn','86','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(279,3,'Colombia','co','57','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(280,3,'Comoros','km','269','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(281,3,'Congo','cg','242','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(282,3,'Democratic Republic of the Congo','cd','243','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(283,3,'Costa Rica','cr','506','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(284,3,'Ivory Coast','ci','225','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(285,3,'Croatia','hr','385','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(286,3,'Cuba','cu','53','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(287,3,'Cyprus','cy','357','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(288,3,'Czech Republic','cz','420','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(289,3,'Denmark','dk','45','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(290,3,'Djibouti','dj','253','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(291,3,'Dominica','dm','1767','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(292,3,'Dominican Republic','do','1809','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(293,3,'Ecuador','ec','593','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(294,3,'Egypt','eg','20','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(295,3,'El Salvador','sv','503','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(296,3,'Equatorial Guinea','gq','240','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(297,3,'Eritrea','er','291','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(298,3,'Estonia','ee','372','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(299,3,'Ethiopia','et','251','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(300,3,'Fiji','fj','679','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(301,3,'Finland','fi','358','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(302,3,'France','fr','33','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(303,3,'Gabon','ga','241','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(304,3,'Gambia','gm','220','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(305,3,'Georgia','ge','995','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(306,3,'Germany','de','49','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(307,3,'Ghana','gh','233','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(308,3,'Greece','gr','30','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(309,3,'Grenada','gd','1473','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(310,3,'Guatemala','gt','502','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(311,3,'Guinea','gn','224','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(312,3,'Guinea-Bissau','gw','245','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(313,3,'Guyana','gy','592','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(314,3,'Haiti','ht','509','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(315,3,'Honduras','hn','504','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(316,3,'Hungary','hu','36','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(317,3,'Iceland','is','354','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(318,3,'India','in','91','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(319,3,'Indonesia','id','62','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(320,3,'Iran','ir','98','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(321,3,'Iraq','iq','964','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(322,3,'Ireland','ie','353','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(323,3,'Israel','il','972','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(324,3,'Italy','it','39','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(325,3,'Jamaica','jm','1876','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(326,3,'Japan','jp','81','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(327,3,'Jordan','jo','962','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(328,3,'Kazakhstan','kz','7','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(329,3,'Kenya','ke','254','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(330,3,'Kiribati','ki','686','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(331,3,'North Korea','kp','850','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(332,3,'South Korea','kr','82','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(333,3,'Kuwait','kw','965','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(334,3,'Kyrgyzstan','kg','996','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(335,3,'Laos','la','856','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(336,3,'Latvia','lv','371','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(337,3,'Lebanon','lb','961','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(338,3,'Lesotho','ls','266','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(339,3,'Liberia','lr','231','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(340,3,'Libya','ly','218','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(341,3,'Liechtenstein','li','423','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(342,3,'Lithuania','lt','370','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(343,3,'Luxembourg','lu','352','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(344,3,'North Macedonia','mk','389','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(345,3,'Madagascar','mg','261','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(346,3,'Malawi','mw','265','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(347,3,'Malaysia','my','60','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(348,3,'Maldives','mv','960','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(349,3,'Mali','ml','223','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(350,3,'Malta','mt','356','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(351,3,'Marshall Islands','mh','692','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(352,3,'Mauritania','mr','222','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(353,3,'Mauritius','mu','230','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(354,3,'Mexico','mx','52','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(355,3,'Micronesia','fm','691','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(356,3,'Moldova','md','373','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(357,3,'Monaco','mc','377','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(358,3,'Mongolia','mn','976','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(359,3,'Montenegro','me','382','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(360,3,'Morocco','ma','212','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(361,3,'Mozambique','mz','258','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(362,3,'Myanmar','mm','95','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(363,3,'Namibia','na','264','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(364,3,'Nauru','nr','674','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(365,3,'Nepal','np','977','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(366,3,'Netherlands','nl','31','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(367,3,'New Zealand','nz','64','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(368,3,'Nicaragua','ni','505','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(369,3,'Niger','ne','227','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(370,3,'Nigeria','ng','234','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(371,3,'Norway','no','47','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(372,3,'Oman','om','968','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(373,3,'Pakistan','pk','92','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(374,3,'Palau','pw','680','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(375,3,'Panama','pa','507','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(376,3,'Papua New Guinea','pg','675','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(377,3,'Paraguay','py','595','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(378,3,'Peru','pe','51','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(379,3,'Philippines','ph','63','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(380,3,'Poland','pl','48','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(381,3,'Portugal','pt','351','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(382,3,'Qatar','qa','974','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(383,3,'Romania','ro','40','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(384,3,'Russia','ru','7','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(385,3,'Rwanda','rw','250','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(386,3,'Saint Kitts and Nevis','kn','1869','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(387,3,'Saint Lucia','lc','1758','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(388,3,'Saint Vincent and the Grenadines','vc','1784','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(389,3,'Samoa','ws','685','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(390,3,'San Marino','sm','378','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(391,3,'Sao Tome and Principe','st','239','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(392,3,'Saudi Arabia','sa','966','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(393,3,'Senegal','sn','221','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(394,3,'Serbia','rs','381','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(395,3,'Seychelles','sc','248','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(396,3,'Sierra Leone','sl','232','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(397,3,'Singapore','sg','65','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(398,3,'Slovakia','sk','421','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(399,3,'Slovenia','si','386','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(400,3,'Solomon Islands','sb','677','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(401,3,'Somalia','so','252','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(402,3,'South Africa','za','27','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(403,3,'South Sudan','ss','211','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(404,3,'Spain','es','34','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(405,3,'Sri Lanka','lk','94','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(406,3,'Sudan','sd','249','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(407,3,'Suriname','sr','597','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(408,3,'Sweden','se','46','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(409,3,'Switzerland','ch','41','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(410,3,'Syria','sy','963','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(411,3,'Tajikistan','tj','992','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(412,3,'Tanzania','tz','255','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(413,3,'Thailand','th','66','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(414,3,'East Timor','tl','670','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(415,3,'Togo','tg','228','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(416,3,'Tonga','to','676','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(417,3,'Trinidad and Tobago','tt','1868','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(418,3,'Tunisia','tn','216','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(419,3,'Turkey','tr','90','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(420,3,'Turkmenistan','tm','993','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(421,3,'Tuvalu','tv','688','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(422,3,'Uganda','ug','256','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(423,3,'Ukraine','ua','380','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(424,3,'United Arab Emirates','ae','971','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(425,3,'United Kingdom','gb','44','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(426,3,'United States','us','1','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(427,3,'Uruguay','uy','598','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(428,3,'Uzbekistan','uz','998','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(429,3,'Vanuatu','vu','678','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(430,3,'Vatican City','va','379','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(431,3,'Venezuela','ve','58','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(432,3,'Vietnam','vn','84','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(433,3,'Yemen','ye','967','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(434,3,'Zambia','zm','260','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(435,3,'Zimbabwe','zw','263','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(436,3,'Palestine','ps','970','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(437,3,'Kosovo','xk','383','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(438,3,'Taiwan','tw','886','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(439,3,'Hong Kong','hk','852','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(440,3,'Macao','mo','853','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(441,3,'Greenland','gl','299','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(442,3,'Faroe Islands','fo','298','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(443,3,'Bermuda','bm','1441','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(444,3,'Cayman Islands','ky','1345','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(445,3,'British Virgin Islands','vg','1284','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(446,3,'Falkland Islands','fk','500','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(447,3,'Gibraltar','gi','350','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(448,3,'Saint Helena','sh','290','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(449,3,'Turks and Caicos Islands','tc','1649','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(450,3,'Anguilla','ai','1264','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(451,3,'Montserrat','ms','1664','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(452,3,'Puerto Rico','pr','1787','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(453,3,'US Virgin Islands','vi','1340','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(454,3,'Guam','gu','1671','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(455,3,'American Samoa','as','1684','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(456,3,'Northern Mariana Islands','mp','1670','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(457,3,'New Caledonia','nc','687','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(458,3,'French Polynesia','pf','689','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(459,3,'Mayotte','yt','262','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(460,3,'Reunion','re','262','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(461,3,'Martinique','mq','596','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(462,3,'Guadeloupe','gp','590','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(463,3,'French Guiana','gf','594','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(464,3,'Saint Pierre and Miquelon','pm','508','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(465,3,'Wallis and Futuna','wf','681','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(466,3,'Saint Martin','mf','590','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(467,3,'Saint Barthelemy','bl','590','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(468,3,'Aruba','aw','297','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(469,3,'Curacao','cw','599','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(470,3,'Sint Maarten','sx','1721','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(471,3,'Bonaire','bq','599','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(472,3,'Cook Islands','ck','682','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(473,3,'Niue','nu','683','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(474,3,'Norfolk Island','nf','672','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(475,3,'Pitcairn Islands','pn','64','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(476,3,'Tokelau','tk','690','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(477,3,'Antarctica','aq','672','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(478,3,'Northern Cyprus','nc','90392','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(479,3,'South Ossetia','so','995','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(480,3,'Abkhazia','ab','995','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(481,3,'Nagorno-Karabakh','nk','374','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(482,3,'Transnistria','md','373','0','2025-07-25 06:48:21','2025-07-25 06:48:21'),(483,2,'Афганистан','af','93','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(484,2,'Албания','al','355','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(485,2,'Алжир','dz','213','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(486,2,'Андорра','ad','376','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(487,2,'Ангола','ao','244','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(488,2,'Антигуа и Барбуда','ag','1268','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(489,2,'Аргентина','ar','54','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(490,2,'Армения','am','374','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(491,2,'Австралия','au','61','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(492,2,'Австрия','at','43','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(493,2,'Азербайджан','az','994','1','2025-07-25 07:08:15','2025-07-25 07:08:15'),(494,2,'Багамские острова','bs','1242','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(495,2,'Бахрейн','bh','973','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(496,2,'Бангладеш','bd','880','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(497,2,'Барбадос','bb','1246','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(498,2,'Беларусь','by','375','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(499,2,'Бельгия','be','32','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(500,2,'Белиз','bz','501','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(501,2,'Бенин','bj','229','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(502,2,'Бутан','bt','975','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(503,2,'Боливия','bo','591','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(504,2,'Босния и Герцеговина','ba','387','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(505,2,'Ботсвана','bw','267','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(506,2,'Бразилия','br','55','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(507,2,'Бруней','bn','673','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(508,2,'Болгария','bg','359','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(509,2,'Буркина-Фасо','bf','226','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(510,2,'Бурundi','bi','257','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(511,2,'Камбоджа','kh','855','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(512,2,'Камерун','cm','237','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(513,2,'Канада','ca','1','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(514,2,'Кабо-Верде','cv','238','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(515,2,'Центральноафриканская Республика','cf','236','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(516,2,'Чад','td','235','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(517,2,'Чили','cl','56','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(518,2,'Китай','cn','86','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(519,2,'Колумбия','co','57','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(520,2,'Коморские острова','km','269','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(521,2,'Конго','cg','242','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(522,2,'Демократическая Республика Конго','cd','243','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(523,2,'Коста-Рика','cr','506','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(524,2,'Кот-д\'Ивуар','ci','225','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(525,2,'Хорватия','hr','385','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(526,2,'Куба','cu','53','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(527,2,'Кипр','cy','357','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(528,2,'Чехия','cz','420','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(529,2,'Дания','dk','45','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(530,2,'Джибути','dj','253','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(531,2,'Доминика','dm','1767','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(532,2,'Доминиканская Республика','do','1809','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(533,2,'Эквадор','ec','593','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(534,2,'Египет','eg','20','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(535,2,'Сальвадор','sv','503','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(536,2,'Экваториальная Гвинея','gq','240','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(537,2,'Эритрея','er','291','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(538,2,'Эстония','ee','372','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(539,2,'Эфиопия','et','251','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(540,2,'Фиджи','fj','679','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(541,2,'Финляндия','fi','358','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(542,2,'Франция','fr','33','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(543,2,'Габон','ga','241','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(544,2,'Гамбия','gm','220','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(545,2,'Грузия','ge','995','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(546,2,'Германия','de','49','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(547,2,'Гана','gh','233','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(548,2,'Греция','gr','30','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(549,2,'Гренада','gd','1473','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(550,2,'Гватемала','gt','502','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(551,2,'Гвинея','gn','224','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(552,2,'Гвинея-Бисау','gw','245','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(553,2,'Гайана','gy','592','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(554,2,'Гаити','ht','509','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(555,2,'Гондурас','hn','504','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(556,2,'Венгрия','hu','36','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(557,2,'Исландия','is','354','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(558,2,'Индия','in','91','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(559,2,'Индонезия','id','62','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(560,2,'Иран','ir','98','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(561,2,'Ирак','iq','964','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(562,2,'Ирландия','ie','353','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(563,2,'Израиль','il','972','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(564,2,'Италия','it','39','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(565,2,'Ямайка','jm','1876','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(566,2,'Япония','jp','81','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(567,2,'Иордания','jo','962','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(568,2,'Казахстан','kz','7','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(569,2,'Кения','ke','254','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(570,2,'Кирибати','ki','686','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(571,2,'Северная Корея','kp','850','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(572,2,'Южная Корея','kr','82','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(573,2,'Кувейт','kw','965','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(574,2,'Киргизия','kg','996','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(575,2,'Лаос','la','856','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(576,2,'Латвия','lv','371','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(577,2,'Ливан','lb','961','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(578,2,'Лесото','ls','266','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(579,2,'Либерия','lr','231','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(580,2,'Ливия','ly','218','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(581,2,'Лихтенштейн','li','423','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(582,2,'Литва','lt','370','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(583,2,'Люксембург','lu','352','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(584,2,'Северная Македония','mk','389','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(585,2,'Мадагаскар','mg','261','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(586,2,'Малави','mw','265','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(587,2,'Малайзия','my','60','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(588,2,'Мальдивы','mv','960','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(589,2,'Мали','ml','223','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(590,2,'Мальта','mt','356','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(591,2,'Маршалловы острова','mh','692','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(592,2,'Мавритания','mr','222','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(593,2,'Маврикий','mu','230','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(594,2,'Мексика','mx','52','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(595,2,'Микронезия','fm','691','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(596,2,'Молдова','md','373','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(597,2,'Монако','mc','377','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(598,2,'Монголия','mn','976','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(599,2,'Черногория','me','382','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(600,2,'Марокко','ma','212','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(601,2,'Мозамбик','mz','258','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(602,2,'Мьянма','mm','95','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(603,2,'Намибия','na','264','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(604,2,'Науру','nr','674','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(605,2,'Непал','np','977','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(606,2,'Нидерланды','nl','31','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(607,2,'Новая Зеландия','nz','64','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(608,2,'Никарагуа','ni','505','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(609,2,'Нигер','ne','227','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(610,2,'Нигерия','ng','234','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(611,2,'Норвегия','no','47','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(612,2,'Оман','om','968','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(613,2,'Пакистан','pk','92','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(614,2,'Палау','pw','680','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(615,2,'Панама','pa','507','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(616,2,'Папуа — Новая Гвинея','pg','675','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(617,2,'Парагвай','py','595','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(618,2,'Перу','pe','51','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(619,2,'Филиппины','ph','63','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(620,2,'Польша','pl','48','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(621,2,'Португалия','pt','351','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(622,2,'Катар','qa','974','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(623,2,'Румыния','ro','40','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(624,2,'Россия','ru','7','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(625,2,'Руанда','rw','250','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(626,2,'Сент-Китс и Невис','kn','1869','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(627,2,'Сент-Люсия','lc','1758','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(628,2,'Сент-Винсент и Гренадины','vc','1784','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(629,2,'Самоа','ws','685','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(630,2,'Сан-Марино','sm','378','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(631,2,'Сан-Томе и Принсипи','st','239','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(632,2,'Саудовская Аравия','sa','966','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(633,2,'Сенегал','sn','221','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(634,2,'Сербия','rs','381','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(635,2,'Сейшельские острова','sc','248','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(636,2,'Сьерра-Леоне','sl','232','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(637,2,'Сингапур','sg','65','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(638,2,'Словакия','sk','421','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(639,2,'Словения','si','386','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(640,2,'Соломоновы острова','sb','677','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(641,2,'Сомали','so','252','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(642,2,'Южная Африка','za','27','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(643,2,'Южный Судан','ss','211','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(644,2,'Испания','es','34','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(645,2,'Шри-Ланка','lk','94','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(646,2,'Судан','sd','249','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(647,2,'Суринам','sr','597','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(648,2,'Швеция','se','46','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(649,2,'Швейцария','ch','41','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(650,2,'Сирия','sy','963','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(651,2,'Таджикистан','tj','992','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(652,2,'Танзания','tz','255','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(653,2,'Таиланд','th','66','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(654,2,'Восточный Тимор','tl','670','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(655,2,'Того','tg','228','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(656,2,'Тонга','to','676','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(657,2,'Тринидад и Тобаго','tt','1868','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(658,2,'Тунис','tn','216','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(659,2,'Турция','tr','90','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(660,2,'Туркменистан','tm','993','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(661,2,'Тувалу','tv','688','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(662,2,'Уганда','ug','256','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(663,2,'Украина','ua','380','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(664,2,'Объединенные Арабские Эмираты','ae','971','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(665,2,'Великобритания','gb','44','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(666,2,'Соединенные Штаты','us','1','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(667,2,'Уругвай','uy','598','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(668,2,'Узбекистан','uz','998','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(669,2,'Вануату','vu','678','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(670,2,'Ватикан','va','379','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(671,2,'Венесуэла','ve','58','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(672,2,'Вьетнам','vn','84','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(673,2,'Йемен','ye','967','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(674,2,'Замбия','zm','260','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(675,2,'Зимбабве','zw','263','0','2025-07-25 07:08:15','2025-07-25 07:08:15'),(676,2,'Палестина','ps','970','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(677,2,'Косово','xk','383','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(678,2,'Тайвань','tw','886','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(679,2,'Гонконг','hk','852','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(680,2,'Макао','mo','853','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(681,2,'Гренландия','gl','299','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(682,2,'Фарерские острова','fo','298','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(683,2,'Бермуды','bm','1441','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(684,2,'Каймановы острова','ky','1345','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(685,2,'Британские Виргинские острова','vg','1284','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(686,2,'Фолклендские острова','fk','500','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(687,2,'Гибралтар','gi','350','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(688,2,'Остров Святой Елены','sh','290','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(689,2,'Острова Теркс и Кайкос','tc','1649','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(690,2,'Ангилья','ai','1264','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(691,2,'Монтсеррат','ms','1664','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(692,2,'Пуэрто-Рико','pr','1787','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(693,2,'Американские Виргинские острова','vi','1340','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(694,2,'Гуам','gu','1671','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(695,2,'Американское Самоа','as','1684','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(696,2,'Северные Марианские острова','mp','1670','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(697,2,'Новая Каледония','nc','687','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(698,2,'Французская Полинезия','pf','689','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(699,2,'Майотта','yt','262','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(700,2,'Реюньон','re','262','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(701,2,'Мартиника','mq','596','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(702,2,'Гваделупа','gp','590','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(703,2,'Французская Гвиана','gf','594','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(704,2,'Сен-Пьер и Микелон','pm','508','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(705,2,'Уоллис и Футуна','wf','681','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(706,2,'Сен-Мартен','mf','590','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(707,2,'Сен-Бартелеми','bl','590','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(708,2,'Аруба','aw','297','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(709,2,'Кюрасао','cw','599','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(710,2,'Синт-Мартен','sx','1721','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(711,2,'Бонэйр','bq','599','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(712,2,'Острова Кука','ck','682','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(713,2,'Ниуэ','nu','683','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(714,2,'Остров Норфолк','nf','672','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(715,2,'Острова Питкэрн','pn','64','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(716,2,'Токелау','tk','690','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(717,2,'Антарктида','aq','672','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(718,2,'Северный Кипр','nc','90392','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(719,2,'Южная Осетия','so','995','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(720,2,'Абхазия','ab','995','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(721,2,'Нагорный Карабах','nk','374','0','2025-07-25 07:09:18','2025-07-25 07:09:18'),(722,2,'Приднестровье','md','373','0','2025-07-25 07:09:18','2025-07-25 07:09:18');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` float(15,6) DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_default` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'AZN','Azərbaycan manatı','₼',1.000000,'1','1','2025-08-14 07:02:29','2025-08-14 07:09:21'),(2,'TRY','Türk lirəsi','₺',0.041500,'1','0','2025-08-14 07:03:44','2025-08-25 07:18:30'),(4,'USD','ABŞ dolları','$',1.700000,'1','0','2025-08-25 07:20:22','2025-08-25 07:20:30'),(5,'EUR','Avro','€',1.989700,'1','0','2025-08-25 07:21:35','2025-08-25 07:21:41');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_categories`
--

DROP TABLE IF EXISTS `job_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_featured` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_categories_slug_unique` (`slug`),
  KEY `job_categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `job_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_categories`
--

LOCK TABLES `job_categories` WRITE;
/*!40000 ALTER TABLE `job_categories` DISABLE KEYS */;
INSERT INTO `job_categories` VALUES (63,NULL,'Test','test','test desc','assets/admin/custom/images/job_categories/test-1756274998.png','1','1',0,'test seo title','test seo desc','test seo keyword,asd,zxc','2025-08-27 06:09:58','2025-08-27 06:11:38'),(64,NULL,'test 2','test-2-slug-manual','test 2 desc','assets/admin/custom/images/job_categories/test-2-1756275283.png','1','1',1,'test 2 seo title','test 2 seo desc','test 2 seo keyword,asd,zxc,vcx','2025-08-27 06:14:43','2025-08-27 06:14:43'),(65,64,'Marketinq','marketinq',NULL,NULL,'1','0',2,'seo title',NULL,NULL,'2025-08-27 07:30:08','2025-08-27 07:30:08');
/*!40000 ALTER TABLE `job_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_category_translations`
--

DROP TABLE IF EXISTS `job_category_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_category_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_category_id` bigint unsigned NOT NULL,
  `lang_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_category_translations_job_category_id_foreign` (`job_category_id`),
  KEY `job_category_translations_lang_id_foreign` (`lang_id`),
  CONSTRAINT `job_category_translations_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `job_category_translations_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_category_translations`
--

LOCK TABLES `job_category_translations` WRITE;
/*!40000 ALTER TABLE `job_category_translations` DISABLE KEYS */;
INSERT INTO `job_category_translations` VALUES (1,64,1,'Test 2 az','test 2 az desc','asdvxc asd','teasdz zxczx caqd asd','zxc,vba,qwe','2025-08-28 06:29:05','2025-08-28 06:29:05'),(2,64,2,'test 2 ru','asd asdasda sdas','test 2 ru','zxczxc','asdasd,zccc,zzzz','2025-08-28 06:57:59','2025-08-28 06:57:59');
/*!40000 ALTER TABLE `job_category_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_default` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'Azərbaycan','az','Azərbaycanca','1','1',1,'2025-07-15 12:28:52','2025-07-21 05:58:03'),(2,'Русский','ru','Русский','0','0',2,'2025-07-15 12:29:45','2025-09-05 06:14:15'),(3,'English','en','\nEnglish','0','0',3,'2025-07-15 12:30:55','2025-09-05 06:14:18'),(4,'Türk','tr','Türkce','0','0',4,'2025-07-15 13:08:56','2025-07-25 07:09:49');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_04_29_070644_create_roles_table',2),(5,'2025_04_29_080804_create_role_user_table',2),(6,'2025_04_29_081804_create_permissions_table',2),(7,'2025_04_29_081932_create_permission_role_table',2),(8,'2025_04_29_123247_create_cities_table',3),(9,'2025_04_29_124959_create_job_categories_table',3),(10,'2025_04_29_125019_create_candidates_table',3),(11,'2025_04_29_132219_add_surname_column_to_users',4),(12,'2025_04_30_044603_create_companies_table',5),(13,'2025_04_30_050153_create_social_links_table',5),(14,'2025_05_01_072823_add_column_status_to_companies',6),(15,'2025_05_01_073116_add_column_slug_to_companies',6),(16,'2025_05_01_073337_add_column_status_to_candidates',6),(17,'2025_05_01_081356_create_user_verifies_table',7),(18,'2025_05_02_100635_add_column_status_to_users',8),(19,'2025_05_07_161834_add_column_avatar_to_users',9),(20,'2025_05_15_120541_add_column_to_job_categories',10),(21,'2025_07_04_134840_add_column_is_active_to_roles_table',11),(22,'2025_07_07_114419_add_column_is_active_to_permissions_table',12),(23,'2025_07_11_100238_create_languages_table',13),(24,'2025_07_11_101816_create_content_translations_table',14),(25,'2025_07_21_093235_create_content_translations_table',15),(26,'2025_07_24_141709_create_countries_table',16),(27,'2025_07_24_142739_add_new_coumn_to_cities_table',16),(28,'2025_08_11_111502_create_currencies_table',17),(29,'2025_08_15_150446_add_new_columns_to_candidates_table',18),(30,'2025_08_25_150527_add_new_columns_to_companies_table',19),(31,'2025_08_25_163023_add_new_columns_to_job_categories_table',20),(32,'2025_08_27_113429_create_job_category_translations_table',21);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,5,2,NULL,NULL),(2,1,2,NULL,NULL),(4,5,1,NULL,NULL),(6,3,1,NULL,NULL),(7,1,1,NULL,NULL),(8,4,1,NULL,NULL),(9,3,5,NULL,NULL),(10,4,5,NULL,NULL),(11,2,5,NULL,NULL),(12,5,5,NULL,NULL),(13,1,4,NULL,NULL),(14,3,4,NULL,NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=Active, 1=Deactivate',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create_vacancy','Create Vacancy','1','2025-04-29 04:51:58','2025-07-07 08:42:39'),(2,'edit_vacancy','Edit Vacancy','1','2025-04-29 04:51:58','2025-04-29 04:51:58'),(3,'delete_vacancy','Delete Vacancy','1','2025-04-29 04:51:58','2025-04-29 04:51:58'),(4,'edit_user','Edit User','1','2025-04-29 04:51:58','2025-04-29 04:51:58'),(5,'permission_create','Permission Create','1','2025-07-07 11:07:21','2025-07-07 11:07:21');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (24,70,4,NULL,NULL),(25,71,5,NULL,NULL),(26,72,2,NULL,NULL),(27,73,3,NULL,NULL),(28,74,5,NULL,NULL),(29,75,4,NULL,NULL),(51,97,4,NULL,NULL),(52,98,4,NULL,NULL),(53,99,4,NULL,NULL),(54,100,4,NULL,NULL),(55,101,4,NULL,NULL),(56,102,5,NULL,NULL),(59,105,4,NULL,NULL),(60,106,4,NULL,NULL),(61,107,4,NULL,NULL),(62,108,4,NULL,NULL),(63,109,4,NULL,NULL),(64,110,4,NULL,NULL),(65,111,4,NULL,NULL),(66,112,4,NULL,NULL),(67,113,4,NULL,NULL),(68,114,4,NULL,NULL),(69,115,4,NULL,NULL),(70,116,4,NULL,NULL),(71,117,4,NULL,NULL),(72,118,4,NULL,NULL),(73,119,4,NULL,NULL),(74,120,4,NULL,NULL),(75,121,4,NULL,NULL),(77,123,4,NULL,NULL),(78,124,4,NULL,NULL),(79,125,4,NULL,NULL),(80,126,4,NULL,NULL),(81,127,4,NULL,NULL),(84,130,1,NULL,NULL),(86,132,5,NULL,NULL),(88,134,2,NULL,NULL),(95,133,4,NULL,NULL),(96,131,5,NULL,NULL),(97,129,5,NULL,NULL),(98,104,5,NULL,NULL),(99,122,5,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=Active, 1=Deactivate',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  KEY `roles_name_is_active_index` (`name`,`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin','1','2025-04-29 04:51:01','2025-07-07 07:35:24'),(2,'developer','Developer','1','2025-04-29 04:51:01','2025-07-07 05:55:46'),(3,'moderator','Moderator','1','2025-04-29 04:51:01','2025-04-29 04:51:01'),(4,'candidate','Namizəd','1','2025-04-29 04:51:01','2025-04-29 04:51:01'),(5,'company','Şirkət','1','2025-04-29 04:51:01','2025-04-29 04:51:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('T4vDOKvsGY1Aq0Nl3LQVLFupjW5ltmwURADuviRc',72,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVGFQU0JJM0xCZDk3OFozbkFZak1EM3hzYzFGOTBETWFKZ3hZTEhoWSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NzI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9qb2JuZXN0LmF6L2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1747286614);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_links`
--

DROP TABLE IF EXISTS `social_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkable_id` bigint unsigned NOT NULL,
  `linkable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_links`
--

LOCK TABLES `social_links` WRITE;
/*!40000 ALTER TABLE `social_links` DISABLE KEYS */;
INSERT INTO `social_links` VALUES (24,'facebook','https://www.facebook.com/',3,'App\\Models\\Company','2025-09-05 13:03:49','2025-09-05 13:03:49'),(25,'twitter','https://x.com/',3,'App\\Models\\Company','2025-09-05 13:03:49','2025-09-05 13:03:49'),(26,'linkedin','https://linkedin.com/home?originalSubdomain=az',3,'App\\Models\\Company','2025-09-05 13:03:49','2025-09-05 13:03:49'),(27,'whatsapp','https://whatsapp.com/',3,'App\\Models\\Company','2025-09-05 13:03:49','2025-09-05 13:03:49'),(28,'instagram','https://www.instagram.com/',3,'App\\Models\\Company','2025-09-05 13:03:49','2025-09-05 13:03:49'),(29,'youtube','https://www.youtube.com/',3,'App\\Models\\Company','2025-09-05 13:03:49','2025-09-05 13:03:49');
/*!40000 ALTER TABLE `social_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_verifies`
--

DROP TABLE IF EXISTS `user_verifies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_verifies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_verifies`
--

LOCK TABLES `user_verifies` WRITE;
/*!40000 ALTER TABLE `user_verifies` DISABLE KEYS */;
INSERT INTO `user_verifies` VALUES (66,'115','H76kthaP1TPWal416TelJv95oxs9K2RBGPPWiaNVnjguqIppVLVHYz6uXzMk','2025-05-08 13:01:29','2025-05-08 08:01:29','2025-05-08 08:01:29'),(77,'126','4kFzMrsVtUujBouyZbkXucmyYVPO0v3pew8ALnmARbszVIkO2yoUt0rkdlmS','2025-05-12 12:02:58','2025-05-12 07:02:58','2025-05-12 07:02:58'),(78,'127','TxtOClREaUjfFZ91GOjEilYA24cXhMPwOuNSg2ejtEYYzXbcTVVjospXtbDU','2025-05-12 12:03:29','2025-05-12 07:03:29','2025-05-12 07:03:29');
/*!40000 ALTER TABLE `user_verifies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '0=Inactive, 1=Active, 2=Pending',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (70,'Candidate','1','1','candidate@jobnest.az',NULL,'2025-05-02 07:06:39','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','GN5NfJlsnuj9SjBqcSk2zLB4cAPcKQjIv7YUlhKROhfPWhzJbOfxbhOBUoeX','2025-05-02 07:05:19','2025-05-02 07:06:39'),(71,'JobNest','MMC','1','company@jobnest.az',NULL,'2025-05-02 07:16:07','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','oBETOuf12Eu5mUqqk3e0fjsmwhscNZ8X2nVxTLKU3hxRfnH2zVKDfZuETESs','2025-05-02 07:15:38','2025-09-03 13:04:03'),(72,'Orxan','İsmayılov','1','admin@jobnest.az',NULL,'2025-05-02 08:19:24','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','DYkjq8lDiNEMYLmawfJoNn3cOPvjFLJ1AjS5RAvsh3J7X8FXV1T2o18TSWyV','2025-05-02 07:30:30','2025-05-13 05:24:21'),(73,'Editor',NULL,'1','editor@jobnest.az',NULL,'2025-05-02 08:22:05','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','bIbAsYNNCQEGGfSE5boDLDRonw8xcjrSGKi8eQvECy7QsQjTVF3s9O1bIw7H','2025-05-02 08:21:28','2025-05-02 08:22:05'),(74,'Risk Company',NULL,'1','riskcompany@jobnest.az',NULL,'2025-05-02 08:24:25','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','eGjUtZSAeqt5XZ4XrKf5TS3e7E3F2aFFQDrKfE50gDiqicnhsGHOmiHBek0b','2025-05-02 08:24:05','2025-05-02 08:24:25'),(75,'Test','4','1','test4@jobnest.az',NULL,'2025-05-02 08:40:40','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-02 08:39:04','2025-05-02 08:40:40'),(97,'Harding Cochran','Morrow','1','neguwavy@mailinator.com',NULL,'2025-05-07 10:29:52','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-06 11:38:11','2025-05-07 10:29:52'),(98,'Jolene Steele','Schmidt','1','wifo@mailinator.com',NULL,'2025-05-07 11:03:22','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-07 10:44:38','2025-05-07 11:03:22'),(99,'Daria Lowe','Mayer','1','kalybuse@mailinator.com',NULL,'2025-05-07 11:02:43','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-07 10:57:15','2025-05-07 11:02:43'),(100,'Orxan','Ismayilov','1','ismayilovorxan729@gmail.com',NULL,'2025-05-07 12:48:56','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-07 12:48:01','2025-05-07 12:48:01'),(101,'Alfonso Bowers','Frost','1','neqikake@mailinator.com',NULL,'2025-05-08 05:34:15','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 05:34:05','2025-05-08 05:34:15'),(102,'Simbrella',NULL,'1','simbrella@jobnest.az',NULL,'2025-05-08 07:04:39','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','fxzgknocTHWMNFO4kN3FhvQVlLTYvp1ykZ4kI74uSWXyLzRkuRdQF6uF3Uoe','2025-05-08 07:04:28','2025-05-08 07:04:39'),(104,'Sinam',NULL,'1','sinam@jobnest.az',NULL,'2025-05-08 07:07:24','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','iB4tsmwkVGVcA3WQibAM0YC9VxQ37uxpYdPY24eQs3jv5TudaJhYLHojVcvQ','2025-05-08 07:07:17','2025-05-08 07:07:24'),(105,'Ryder Pope','Cummings','1','fohigeb@mailinator.com',NULL,'2025-05-08 07:09:58','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:09:49','2025-05-08 07:09:58'),(106,'Maryam Allison','Best','1','ganexepatu@mailinator.com',NULL,'2025-05-08 07:11:50','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:11:43','2025-05-08 07:11:50'),(107,'Fredericka Tillman','Osborne','1','tazaka@mailinator.com',NULL,'2025-05-08 07:25:27','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:25:20','2025-05-08 07:25:27'),(108,'Basil Donovan','Calderon','1','gyvyj@mailinator.com',NULL,'2025-05-08 07:26:02','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','42aG82eRK8Xq8iCtv55p0IO6Sy0BM7ePCJrVfQeg4ikwITyzfH101QUaL9FA','2025-05-08 07:25:53','2025-05-08 07:26:02'),(109,'Geoffrey Hendrix','Frederick','1','kisu@mailinator.com',NULL,'2025-05-08 07:29:41','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:29:33','2025-05-08 07:29:41'),(110,'TESST','Wade','1','buxubyl@mailinator.com',NULL,'2025-05-08 07:39:10','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:38:23','2025-05-08 07:39:10'),(111,'Reece Zamora','Merrill','1','lydu@mailinator.com',NULL,'2025-05-08 07:42:10','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:41:59','2025-05-08 07:42:10'),(112,'Olga Bishop','Suarez','1','totu@mailinator.com',NULL,'2025-05-08 07:46:31','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:46:24','2025-05-08 07:46:31'),(113,'Sybill Compton','Sears','1','qylyhyf@mailinator.com',NULL,'2025-05-08 07:54:46','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 07:54:36','2025-05-08 07:54:46'),(114,'Hanna Foreman','Chavez','1','solos@mailinator.com',NULL,'2025-05-08 07:59:48','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','oAwoG3Gc55zVnIb2vhgq1nBCYKT87MlkQzKy59dslAnOw0xuWkwdDeekKrqY','2025-05-08 07:59:35','2025-05-12 10:41:15'),(115,'Jameson Shepherd','Schneider','2','gazaji@mailinator.com',NULL,NULL,'$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 08:01:29','2025-05-12 10:39:45'),(116,'Alexa Whitney','Schroeder','1','bugac@mailinator.com',NULL,'2025-05-08 08:26:28','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 08:26:16','2025-05-08 08:26:28'),(117,'Avye Carpenter','Hendrix','1','xuqeza@mailinator.com',NULL,'2025-05-08 08:29:50','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 08:29:39','2025-05-08 08:29:50'),(118,'Harriet Haney','Duke','1','nibiqe@mailinator.com',NULL,'2025-05-08 08:36:04','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 08:35:12','2025-05-08 08:36:04'),(119,'Isaiah Finch','Erickson','1','muhukisof@mailinator.com',NULL,'2025-05-08 08:40:27','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 08:40:15','2025-05-08 08:40:27'),(120,'Yael Santos','Pierce','1','hapu@mailinator.com',NULL,'2025-05-08 10:06:15','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','0zZbpwN9kxpjgKuZOSEDHsHXpZIMKM5ZHfNvSadPH1AwHzmoIuzPt5BvmCgy','2025-05-08 10:06:00','2025-05-08 10:06:15'),(121,'Kermit Mitchell','Lopez','1','wejyx@mailinator.com',NULL,'2025-05-08 10:07:13','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','XTgorTxqrdDpSW3ixUuUVCfigvoCyugnvtddDvLAtrN4SlxDsY7znyWWWaFv','2025-05-08 10:07:05','2025-05-08 10:07:13'),(122,'Kapital Bank',NULL,'1','kapitalbank@jobnest.az',NULL,'2025-05-08 10:08:06','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','nsJreUR8GYqJFh0YWZ3EnlGdhW1iwpOtN2lfmsoh4vz5xO9lEhrFKqqbXUdu','2025-05-08 10:07:59','2025-05-08 10:08:06'),(123,'Brock May','Rosales','1','hihaba@mailinator.com','','2025-05-08 10:09:41','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 10:09:34','2025-05-08 10:09:41'),(124,'Orlando Weiss','Acosta','1','nyfivymuk@mailinator.com',NULL,'2025-05-08 10:10:30','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 10:10:24','2025-05-08 10:10:30'),(125,'Aspen Hanson','Davis','1','fagizan@mailinator.com',NULL,'2025-05-08 10:12:04','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-08 10:11:57','2025-05-08 10:12:04'),(126,'Nina Carson','Patrick','2','bybogylo@mailinator.com',NULL,NULL,'$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-12 07:02:58','2025-05-12 07:02:58'),(127,'Bree Michael','English','2','nufizexetu@mailinator.com',NULL,NULL,'$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-12 07:03:29','2025-05-12 07:03:29'),(129,'Flup Agency',NULL,'1','flupagency@jobnest.az',NULL,'2025-05-12 11:09:43','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','oR5GaqWmFIuMp2BVE2OCvhmjbLQGwt2ZUM4yqa5p3Rc0AW1zJlUCmm4OC9vN','2025-05-12 11:09:06','2025-09-09 12:03:08'),(130,'Sonia Hopkins','Clark','1','qygyl@mailinator.com',NULL,NULL,'$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-30 07:05:51','2025-05-30 07:05:51'),(131,'Azerimed LLC',NULL,'1','azerimedllc@jobnest.az',NULL,'2025-05-08 08:40:27','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','PSTe9UejgbYMJwNKrxFVL1qJ4AZ53A6F9LFqVbhTmwN6tAnEfkqsTGMeCKCk','2025-05-30 07:08:53','2025-09-09 12:02:50'),(132,'BestComp Group',NULL,'1','bestcomp@jobnest.az',NULL,'2025-05-30 07:16:58','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe','k7EVXY9TaVpAUxV4eBULxQPLZo3DURj3mZuqDGIPqTIVXzVHGa1LHOPxlkeY','2025-05-30 07:10:48','2025-09-10 06:44:15'),(133,'Cally Hamilton test','Whitfield','1','rmetunovo1@mailinator.com',NULL,'2025-05-30 07:16:58','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-30 07:16:58','2025-07-04 08:12:34'),(134,'Developer2',NULL,'1','developer2@jobnest.az','assets/admin/custom/images/users/developer2-1751546208.jpg','2025-05-30 07:22:38','$2y$12$h9Aj3nHT/A3BnzJpVAyJMejmSVroSHj/umyz6Wl4gjk13YHnPzYVe',NULL,'2025-05-30 07:22:38','2025-07-04 08:30:40');
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

-- Dump completed on 2025-09-10 11:55:08
