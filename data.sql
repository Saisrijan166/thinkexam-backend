-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: mysqldb
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.24.04.1

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
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('5c785c036466adea360111aa28563bfd556b5fba','i:1;',1741253408),('5c785c036466adea360111aa28563bfd556b5fba:timer','i:1741253408;',1741253408);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidatefiles`
--

LOCK TABLES `candidatefiles` WRITE;
/*!40000 ALTER TABLE `candidatefiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidatefiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` (`id`, `email`, `password`, `name`, `enrollment`, `date_of_registration`, `phone`, `dob`, `gender`, `school_name`, `year`, `session`, `address`, `country`, `state`, `city`, `pincode`, `group`, `other_selection`, `status`, `created_at`, `updated_at`) VALUES (1,'john.doe@example.com','123456','John Doe','ENR001','2023-01-10','1234567890','1998-05-21','male','Greenwood High',2022,'Morning','123 Main St','USA','California','Los Angeles','90001','A','Option1','active','2025-02-01 04:30:00','2025-03-06 03:53:05'),(2,'jane.smith@example.com','123456','Jane Smith','ENR002','2023-02-15','2345678901','1997-08-12','female','Hilltop School',2021,'Evening','456 Oak St','USA','Texas','Dallas','75001','B','Option2','inactive','2025-02-02 05:30:00','2025-03-06 03:53:16'),(3,'mike.jones@example.com','123456','Mike Jones','ENR003','2023-03-20','3456789012','2000-11-05','male','Sunrise Academy',2023,'Afternoon','789 Pine St','Canada','Ontario','Toronto','M4B 1B3','A','Option3','active','2025-02-03 06:30:00','2025-03-06 03:53:26'),(4,'susan.lee@example.com','123456','Susan Lee','ENR004','2023-04-10','4567890123','1999-02-25','female','Maple Leaf School',2020,'Morning','321 Elm St','USA','New York','New York','10001','C','Option4','active','2025-02-04 04:00:00','2025-03-06 03:53:38'),(5,'chris.wilson@example.com','123456','Chris Wilson','ENR005','2023-05-05','5678901234','2001-06-15','male','Blue Ridge High',2019,'Evening','654 Cedar St','UK','England','London','EC1A 1BB','B','Option1','inactive','2025-02-05 05:00:00','2025-03-06 03:53:48'),(6,'jon.doe@example.com','12345677890','John Doe','ENR001','2023-01-10','1234567890','1998-05-21','male','Greenwood High',2022,'Morning','123 Main St','USA','California','Los Angeles','90001','A','Option1','active','2025-02-01 04:30:00','2025-03-06 05:42:26'),(7,'jae.smith@example.com','12345677890','Jane Smith','ENR002','2023-02-15','2345678901','1997-08-12','female','Hilltop School',2021,'Evening','456 Oak St','USA','Texas','Dallas','75001','B','Option2','inactive','2025-02-02 05:30:00','2025-02-02 05:30:00'),(8,'mie.jones@example.com','12345677890','Mike Jones','ENR003','2023-03-20','3456789012','2000-11-05','male','Sunrise Academy',2023,'Afternoon','789 Pine St','Canada','Ontario','Toronto','M4B 1B3','A','Option3','active','2025-02-03 06:30:00','2025-02-03 06:30:00'),(9,'susn.lee@example.com','12345677890','Susan Lee','ENR004','2023-04-10','4567890123','1999-02-25','female','Maple Leaf School',2020,'Morning','321 Elm St','USA','New York','New York','10001','C','Option4','active','2025-02-04 04:00:00','2025-02-04 04:00:00'),(10,'chis.wilson@example.com','12345677890','Chris Wilson','ENR005','2023-05-05','5678901234','2001-06-15','male','Blue Ridge High',2019,'Evening','654 Cedar St','UK','England','London','EC1A 1BB','B','Option1','inactive','2025-02-05 05:00:00','2025-02-05 05:00:00'),(11,'emma.johnson@example.com','fjdsv','Emma Johnson','ENR006','2023-06-10','6789012345','1998-09-10','female','Sunrise High School',2018,'Morning','456 Birch St','Canada','British Columbia','Vancouver','V6B 1A1','C','Option2','active','2025-02-06 05:30:00','2025-02-06 05:30:00'),(12,'daniel.brown@example.com','kdfkjskd','Daniel Brown','ENR007','2023-07-15','7890123456','1996-12-20','male','Riverdale Academy',2017,'Afternoon','789 Maple St','USA','Florida','Miami','33101','A','Option3','inactive','2025-02-07 06:45:00','2025-02-07 06:45:00'),(13,'olivia.williams@example.com','yutyu','Olivia Williams','ENR008','2023-08-20','8901234567','2000-04-05','female','Hillview College',2022,'Morning','654 Walnut St','UK','England','Manchester','M1 1AA','B','Option1','active','2025-02-08 04:15:00','2025-02-08 04:15:00'),(14,'liam.miller@example.com','yyuu','Liam Miller','ENR009','2023-09-25','9012345678','1995-11-30','male','Northview Academy',2016,'Evening','123 Spruce St','Canada','Quebec','Montreal','H2X 1Y6','C','Option4','inactive','2025-02-09 08:50:00','2025-02-09 08:50:00'),(15,'sophia.taylor@example.com','iug','Sophia Taylor','ENR010','2023-10-10','0123456789','1997-07-22','female','Brookfield High',2019,'Afternoon','321 Aspen St','USA','Illinois','Chicago','60601','A','Option3','active','2025-02-10 03:00:00','2025-02-10 03:00:00'),(16,'srijan@gmail.com','12345678',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2025-03-06 06:06:56','2025-03-06 06:06:56'),(17,'sai@gmail.com','1235678i',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2025-03-06 06:07:07','2025-03-06 06:07:07');
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `eventtables`
--

LOCK TABLES `eventtables` WRITE;
/*!40000 ALTER TABLE `eventtables` DISABLE KEYS */;
INSERT INTO `eventtables` (`id`, `event_name`, `event_code`, `exam_event_type`, `event_type`, `event_opening`, `event_closing`, `event_date`, `created_at`, `updated_at`) VALUES (1,'Math Olympiad 2025','EO-001','Online','Competition','2025-04-01','2025-04-10','2025-04-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(2,'Science Fair 2025','EO-002','Offline','Exhibition','2025-05-01','2025-05-10','2025-05-07','2025-03-06 02:37:08','2025-03-06 02:37:08'),(3,'Coding Championship 2025','EO-003','Online','Competition','2025-06-01','2025-06-05','2025-06-03','2025-03-06 02:37:08','2025-03-06 02:37:08'),(4,'Music Festival 2025','EO-004','Offline','Event','2025-07-01','2025-07-10','2025-07-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(5,'Art Exhibition 2025','EO-005','Offline','Exhibition','2025-08-01','2025-08-10','2025-08-07','2025-03-06 02:37:08','2025-03-06 02:37:08'),(6,'Sports Day 2025','EO-006','Offline','Event','2025-09-01','2025-09-10','2025-09-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(7,'Chess Tournament 2025','EO-007','Online','Competition','2025-10-01','2025-10-05','2025-10-03','2025-03-06 02:37:08','2025-03-06 02:37:08'),(8,'Annual Tech Expo 2025','EO-008','Offline','Exhibition','2025-11-01','2025-11-10','2025-11-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(9,'International Dance Show 2025','EO-009','Offline','Event','2025-12-01','2025-12-10','2025-12-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(10,'Photography Contest 2025','EO-010','Online','Competition','2025-01-01','2025-01-10','2025-01-07','2025-03-06 02:37:08','2025-03-06 02:37:08'),(11,'Film Screening 2025','EO-011','Offline','Event','2025-02-01','2025-02-10','2025-02-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(12,'Poetry Slam 2025','EO-012','Offline','Event','2025-03-01','2025-03-10','2025-03-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(13,'Innovation Summit 2025','EO-013','Online','Conference','2025-04-01','2025-04-05','2025-04-03','2025-03-06 02:37:08','2025-03-06 02:37:08'),(14,'Tech Startup Showcase 2025','EO-014','Offline','Exhibition','2025-05-01','2025-05-10','2025-05-07','2025-03-06 02:37:08','2025-03-06 02:37:08'),(15,'Fashion Show 2025','EO-015','Offline','Event','2025-06-01','2025-06-05','2025-06-03','2025-03-06 02:37:08','2025-03-06 02:37:08'),(16,'Digital Art Showcase 2025','EO-016','Online','Exhibition','2025-07-01','2025-07-10','2025-07-05','2025-03-06 02:37:08','2025-03-06 02:37:08'),(17,'Cooking Contest 2025','EO-017','Offline','Competition','2025-08-01','2025-08-10','2025-08-07','2025-03-06 02:37:08','2025-03-06 02:37:08'),(18,'Debate Championship 2025','EO-018','Online','Competition','2025-09-01','2025-09-05','2025-09-03','2025-03-06 02:37:08','2025-03-06 02:37:08'),(19,'Leadership Seminar 2025','EO-019','Offline','Conference','2025-10-01','2025-10-05','2025-10-03','2025-03-06 02:37:08','2025-03-06 02:37:08'),(20,'Global Business Forum 2025','EO-020','Offline','Conference','2025-11-01','2025-11-10','2025-11-05','2025-03-06 02:37:08','2025-03-06 02:37:08');
/*!40000 ALTER TABLE `eventtables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_01_22_202336_create_tests_table',1),(5,'2025_01_27_183745_create_eventtables_table',1),(6,'2025_01_29_092531_create_candidates_table',1),(7,'2025_01_31_181542_create_reports_table',1),(8,'2025_02_02_055104_create_candidatefiles_table',1),(9,'2025_02_05_102534_create_table1_table',1),(10,'2025_02_18_065437_create_password_reset_tokens_table',2),(11,'2025_02_18_065437_create_personal_access_tokens_table',2),(12,'2025_02_18_065437_create_reports_table',3),(13,'2025_02_18_065437_create_sessions_table',3),(14,'2025_02_18_065437_create_students_table',3),(15,'2025_02_18_065437_create_table1_table',3),(16,'2025_02_18_065437_create_teststables_table',4),(17,'2025_02_18_065437_create_users_table',4),(18,'2025_02_18_065437_create_reports_table',10),(19,'2025_02_18_065437_create_sessions_table',11),(20,'2025_02_18_065437_create_students_table',11),(21,'2025_02_18_065437_create_table1_table',12),(22,'2025_02_18_065437_create_teststables_table',12),(23,'2025_02_18_065437_create_users_table',13),(24,'2025_03_07_072817_create_cache_table',0),(25,'2025_03_07_072817_create_cache_locks_table',0),(26,'2025_03_07_072817_create_candidatefiles_table',0),(27,'2025_03_07_072817_create_candidates_table',0),(28,'2025_03_07_072817_create_eventtables_table',0),(29,'2025_03_07_072817_create_failed_jobs_table',0),(30,'2025_03_07_072817_create_job_batches_table',0),(31,'2025_03_07_072817_create_jobs_table',0),(32,'2025_03_07_072817_create_password_reset_tokens_table',0),(33,'2025_03_07_072817_create_personal_access_tokens_table',0),(34,'2025_03_07_072817_create_reports_table',0),(35,'2025_03_07_072817_create_sessions_table',0),(36,'2025_03_07_072817_create_students_table',0),(37,'2025_03_07_072817_create_teststables_table',0),(38,'2025_03_07_072817_create_users_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES (2,'App\\Models\\User',3,'Myapp','862fcdd70bd8e66688fc11b805375d6ef98c7c373afe5362065fdca761b53c49','[\"*\"]','2025-03-07 07:24:53',NULL,'2025-03-06 09:29:08','2025-03-07 07:24:53');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` (`id`, `name`, `start_date`, `end_date`, `email`, `group`, `test_attempts`, `correct`, `incorrect`, `skipped`, `marks`, `rank`, `credibility_score`, `total_ufm`, `suspended_count`, `verified_image`, `candidate_image_1`, `candidate_image_2`, `test_end_by_proctor`, `ip_address`, `created_at`, `updated_at`) VALUES (1,'John Doe','2025-03-06 09:14:15','2025-03-06 10:14:15','john@example.com','Group A',3,10,5,2,80,2,21.00,0,0,'reports/image1.png','reports/image1.png','reports/image1.png','Yes','192.168.1.1','2025-03-06 09:14:15','2025-03-06 09:14:15'),(2,'John Doe','2024-01-01 10:00:00','2024-01-01 12:00:00','john@example.com','Group A',3,15,5,2,80,1,95.50,0,0,'reports/image1.png','reports/image1.png','reports/image1.png','Yes','192.168.1.1','2025-03-06 11:26:44','2025-03-06 11:26:44'),(3,'Jane Smith','2024-01-02 11:00:00','2024-01-02 13:00:00','jane@example.com','Group B',2,10,8,4,60,2,33.00,1,1,'reports/image2.jpg','reports/image2.jpg','reports/image2.jpg','No','192.168.1.2','2025-03-06 11:26:44','2025-03-06 11:26:44'),(4,'Alice Brown','2024-01-03 09:30:00','2024-01-03 11:30:00','alice@example.com','A',4,18,3,1,90,3,97.00,0,0,'reports/image3.jpg','reports/image3.jpg','reports/image3.jpg','Yes','192.168.1.3','2025-03-06 11:26:44','2025-03-06 11:26:44'),(5,'Bob Johnson','2024-01-04 14:00:00','2024-01-04 16:00:00','bob@example.com','C',3,12,7,3,70,4,55.00,1,0,'reports/image4.jpg','reports/image4.jpg','reports/image4.jpg','No','192.168.1.4','2025-03-06 11:26:44','2025-03-06 11:26:44'),(6,'Charlie White','2024-01-05 10:15:00','2024-01-05 12:15:00','charlie@example.com','D',5,20,2,0,95,5,42.00,0,0,'reports/image5.jpg','reports/image5.jpg','reports/image5.jpg','Yes','192.168.1.5','2025-03-06 11:26:44','2025-03-06 11:26:44'),(7,'John Doe','2024-01-01 10:00:00','2024-01-01 12:00:00','john@example.com','A',3,15,5,2,80,1,69.00,0,0,'reports/image1.png','reports/image1.png','reports/image1.png','Yes','192.168.1.1','2025-03-06 11:29:37','2025-03-06 11:29:37'),(8,'Jane Smith','2024-01-02 11:00:00','2024-01-02 13:00:00','jane@example.com','B',2,10,8,4,60,2,10.00,1,1,'reports/image2.jpg','reports/image2.jpg','reports/image2.jpg','No','192.168.1.2','2025-03-06 11:29:37','2025-03-06 11:29:37'),(9,'Alice Brown','2024-01-03 09:30:00','2024-01-03 11:30:00','alice@example.com','A',4,18,3,1,90,3,97.00,0,0,'reports/image3.jpg','reports/image3.jpg','reports/image3.jpg','Yes','192.168.1.3','2025-03-06 11:29:37','2025-03-06 11:29:37'),(10,'Bob Johnson','2024-01-04 14:00:00','2024-01-04 16:00:00','bob@example.com','C',3,12,7,3,70,4,88.50,1,0,'reports/image4.jpg','reports/image4.jpg','reports/image4.jpg','No','192.168.1.4','2025-03-06 11:29:37','2025-03-06 11:29:37'),(11,'Charlie White','2024-01-05 10:15:00','2024-01-05 12:15:00','charlie@example.com','C',5,20,2,0,95,5,99.00,0,0,'reports/image5.jpg','reports/image5.jpg','reports/image5.jpg','Yes','192.168.1.5','2025-03-06 11:29:37','2025-03-06 11:29:37'),(12,'Eve Adams','2024-01-06 09:45:00','2024-01-06 11:45:00','eve@example.com','A',2,8,10,6,50,6,75.00,2,1,'reports/image2.jpg','reports/image2.jpg','reports/image2.jpg','No','192.168.1.6','2025-03-06 11:29:37','2025-03-06 11:29:37'),(13,'Frank Martin','2024-01-07 15:00:00','2024-01-07 17:00:00','frank@example.com','C',3,14,6,4,78,7,58.00,0,0,'reports/image3.jpg','reports/image3.jpg','reports/image3.jpg','Yes','192.168.1.7','2025-03-06 11:29:37','2025-03-06 11:29:37'),(14,'Eve Adams','2024-01-06 09:45:00','2024-01-06 11:45:00','eve@example.com','B',2,8,10,6,50,6,23.00,2,1,'reports/image2.jpg','reports/image2.jpg','reports/image2.jpg','No','192.168.1.6','2025-03-06 11:30:32','2025-03-06 11:30:32'),(15,'Frank Martin','2024-01-07 15:00:00','2024-01-07 17:00:00','frank@example.com','A',3,14,6,4,78,7,92.50,0,0,'reports/image4.jpg','reports/image4.jpg','reports/image4.jpg','Yes','192.168.1.7','2025-03-06 11:30:32','2025-03-06 11:30:32'),(16,'Eve Adams','2024-01-06 09:45:00','2024-01-06 11:45:00','eve@example.com','A',2,8,10,6,50,6,1.00,2,1,'reports/image2.jpg','reports/image2.jpg','reports/image2.jpg','No','192.168.1.6','2025-03-06 11:31:05','2025-03-06 11:31:05'),(17,'Frank Martin','2024-01-07 15:00:00','2024-01-07 17:00:00','frank@example.com','C',3,14,6,4,78,7,92.50,0,0,'reports/image4.jpg','reports/image4.jpg','reports/image4.jpg','Yes','192.168.1.7','2025-03-06 11:31:05','2025-03-06 11:31:05');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `teststables`
--

LOCK TABLES `teststables` WRITE;
/*!40000 ALTER TABLE `teststables` DISABLE KEYS */;
INSERT INTO `teststables` (`id`, `name`, `start_date`, `end_date`, `status`, `question`, `level`, `candidate`, `product`, `category`, `template`, `version`, `created_at`, `updated_at`) VALUES (1,'Test 1','2025-01-01','2025-01-10','Active',50,'Beginner',100,'Product A','Category 1','Template 1','v1.0','2025-03-06 02:31:31','2025-03-06 02:31:31'),(2,'Test 2','2025-02-01','2025-02-10','Inactive',30,'Intermediate',200,'Product B','Category 2','Template 2','v2.0','2025-03-06 02:31:31','2025-03-06 02:31:31'),(3,'Test 3','2025-03-01','2025-03-10','Active',40,'Beginner',150,'Product C','Category 3','Template 3','v1.1','2025-03-06 02:31:31','2025-03-06 02:31:31'),(4,'Test 4','2025-04-01','2025-04-10','Inactive',25,'Advanced',120,'Product D','Category 1','Template 4','v2.0','2025-03-06 02:31:31','2025-03-06 02:31:31'),(5,'Test 5','2025-05-01','2025-05-10','Active',55,'Beginner',140,'Product E','Category 2','Template 5','v1.0','2025-03-06 02:31:31','2025-03-06 02:31:31'),(6,'Test 6','2025-06-01','2025-06-10','Active',35,'Intermediate',130,'Product F','Category 3','Template 6','v2.1','2025-03-06 02:31:31','2025-03-06 02:31:31'),(7,'Test 7','2025-07-01','2025-07-10','Inactive',20,'Advanced',125,'Product G','Category 1','Template 7','v1.2','2025-03-06 02:31:31','2025-03-06 02:31:31'),(8,'Test 8','2025-08-01','2025-08-10','Active',60,'Beginner',110,'Product H','Category 2','Template 8','v1.3','2025-03-06 02:31:31','2025-03-06 02:31:31'),(9,'Test 9','2025-09-01','2025-09-10','Active',45,'Intermediate',105,'Product I','Category 3','Template 9','v2.0','2025-03-06 02:31:31','2025-03-06 02:31:31'),(10,'Test 10','2025-10-01','2025-10-10','Inactive',50,'Advanced',135,'Product J','Category 1','Template 10','v1.4','2025-03-06 02:31:31','2025-03-06 02:31:31'),(11,'Test 11','2025-11-01','2025-11-10','Active',70,'Beginner',145,'Product K','Category 2','Template 11','v2.2','2025-03-06 02:31:31','2025-03-06 02:31:31'),(12,'Test 12','2025-12-01','2025-12-10','Active',30,'Intermediate',115,'Product L','Category 3','Template 12','v1.0','2025-03-06 02:31:31','2025-03-06 02:31:31'),(13,'Test 13','2025-01-15','2025-01-25','Inactive',45,'Advanced',125,'Product M','Category 1','Template 13','v1.5','2025-03-06 02:31:31','2025-03-06 02:31:31'),(14,'Test 14','2025-02-15','2025-02-25','Active',50,'Beginner',130,'Product N','Category 2','Template 14','v2.0','2025-03-06 02:31:31','2025-03-06 02:31:31'),(15,'Test 15','2025-03-15','2025-03-25','Inactive',55,'Intermediate',120,'Product O','Category 3','Template 15','v1.7','2025-03-06 02:31:31','2025-03-06 02:31:31');
/*!40000 ALTER TABLE `teststables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES (1,'sai@gmail.com','$2y$12$TBvDy81W9W/T0lEEwRel6.OUwdS1/2KoI5VsQA9ioq73yUCVDfYri','2025-03-06 02:17:48','2025-03-06 02:17:48'),(3,'srijan@gmail.com','$2y$12$E9y0KbLdCZwlg0AFOLEWNO9DesnxNBrfZ6mptp0xl9ZQ8rCGqbCr2','2025-03-06 03:58:39','2025-03-06 03:58:39');
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

-- Dump completed on 2025-03-07 12:58:32
