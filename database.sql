-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: tutorlink_gs7
-- ------------------------------------------------------
-- Server version	8.0.41

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
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
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
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
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
-- Table structure for table `class_levels`
--

DROP TABLE IF EXISTS `class_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_levels`
--

LOCK TABLES `class_levels` WRITE;
/*!40000 ALTER TABLE `class_levels` DISABLE KEYS */;
INSERT INTO `class_levels` VALUES (1,'Lớp 1','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(2,'Lớp 2','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(3,'Lớp 3','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(4,'Lớp 4','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(5,'Lớp 5','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(6,'Lớp 6','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(7,'Lớp 7','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(8,'Lớp 8','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(9,'Lớp 9','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(10,'Lớp 10','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(11,'Lớp 11','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(12,'Lớp 12','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(13,'Đại học','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL);
/*!40000 ALTER TABLE `class_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `connects`
--

DROP TABLE IF EXISTS `connects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `connects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_user` int DEFAULT NULL,
  `confirm_teacher` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connects`
--

LOCK TABLES `connects` WRITE;
/*!40000 ALTER TABLE `connects` DISABLE KEYS */;
INSERT INTO `connects` VALUES (1,'1','14','4',NULL,NULL,1,1,2,'2026-02-17 14:34:13','2026-03-02 14:34:13'),(2,'2','15','5',NULL,NULL,0,1,1,'2026-02-21 14:34:13','2026-03-02 14:34:13'),(3,'4','16','7',NULL,NULL,0,0,1,'2026-02-23 14:34:13','2026-03-02 14:34:13'),(4,'6','18','8',NULL,NULL,1,1,2,'2026-02-26 14:34:13','2026-03-02 14:34:13');
/*!40000 ALTER TABLE `connects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Hoàng Văn Bình','0933456789','Tôi muốn tìm gia sư dạy kèm Toán cho con trai học lớp 5 ở quận Hoàng Mai. Xin liên hệ lại.','2026-02-27 14:34:13','2026-03-02 14:34:13'),(2,'Trần Thị Nga','0944567890','Tôi là gia sư muốn đăng ký nhưng gặp lỗi khi tạo tài khoản. Cần hỗ trợ.','2026-03-01 14:34:13','2026-03-02 14:34:13'),(3,'Nguyễn Đức Long','0955678901','Website rất hay. Tôi muốn hỏi về chi phí thuê gia sư IELTS dạy tại nhà.','2026-02-25 14:34:13','2026-03-02 14:34:13');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `districts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,'Ba Đình','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(2,'Hoàn Kiếm','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(3,'Hai Bà Trưng','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(4,'Đống Đa','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(5,'Cầu Giấy','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(6,'Thanh Xuân','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(7,'Hoàng Mai','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(8,'Long Biên','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(9,'Nam Từ Liêm','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(10,'Bắc Từ Liêm','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(11,'Tây Hồ','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(12,'Hà Đông','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(13,'Thanh Trì','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(14,'Gia Lâm','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(15,'Đông Anh','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(16,'Sóc Sơn','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(17,'Hoài Đức','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(18,'Thanh Oai','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(19,'Thường Tín','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(20,'Phú Xuyên','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(21,'Đan Phượng','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(22,'Phúc Thọ','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(23,'Quốc Oai','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(24,'Thạch Thất','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(25,'Chương Mỹ','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(26,'Ba Vì','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(27,'Mỹ Đức','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(28,'Ứng Hòa','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(29,'Mê Linh','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(30,'Sơn Tây','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL);
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
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
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'14','4','5','Thầy An dạy Toán rất hay, con trai tôi tiến bộ rõ rệt sau 1 tháng học. Phương pháp dạy dễ hiểu, rất tận tâm.','2026-02-25 14:34:13','2026-03-02 14:34:13',NULL),(2,'18','8','5','Thầy Mạnh dạy Tin học rất chuyên nghiệp. Tôi đã học được Python cơ bản chỉ sau 2 tuần. Rất hài lòng!','2026-02-28 14:34:13','2026-03-02 14:34:13',NULL),(3,'16','7','4','Cô Mai Anh dạy Hóa tốt, con gái tôi hiểu bài hơn nhiều. Chỉ là đôi khi cô đến trễ 10 phút.','2026-02-27 14:34:13','2026-03-02 14:34:13',NULL),(4,'15','5','5','Cô Ngọc dạy Tiếng Anh tuyệt vời. Con gái tôi từ không dám nói chuyện bằng tiếng Anh giờ đã tự tin giao tiếp. Rất hài lòng!','2026-02-26 14:34:13','2026-03-02 14:34:13',NULL),(5,'14','6','4','Thầy Nam dạy Lý khá tốt, giải thích rõ ràng. Nhưng thời gian học đôi khi không cố định.','2026-02-24 14:34:13','2026-03-02 14:34:13',NULL);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histories`
--

LOCK TABLES `histories` WRITE;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
INSERT INTO `histories` VALUES (1,'14','500','Nạp tiền qua VNPay','2026-02-10 14:34:13','2026-02-10 14:34:13'),(2,'15','300','Nạp tiền qua VNPay','2026-02-12 14:34:13','2026-02-12 14:34:13'),(3,'16','500','Nạp tiền qua VNPay','2026-02-15 14:34:13','2026-02-15 14:34:13'),(4,'16','300','Nạp tiền qua VNPay','2026-02-23 14:34:13','2026-02-23 14:34:13'),(5,'17','200','Nạp tiền qua VNPay','2026-02-18 14:34:13','2026-02-18 14:34:13'),(6,'18','1000','Nạp tiền qua VNPay','2026-02-20 14:34:13','2026-02-20 14:34:13'),(7,'4','200','Nạp tiền qua VNPay','2026-02-16 14:34:13','2026-02-16 14:34:13'),(8,'5','200','Nạp tiền qua VNPay','2026-02-17 14:34:13','2026-02-17 14:34:13'),(9,'6','300','Nạp tiền qua VNPay','2026-02-19 14:34:13','2026-02-19 14:34:13'),(10,'8','500','Nạp tiền qua VNPay','2026-02-21 14:34:13','2026-02-21 14:34:13'),(11,'14','-100','Thuê gia sư','2026-02-15 14:34:13','2026-03-02 14:34:13'),(12,'4','-50','Nhận lớp - Job #1','2026-02-16 14:34:13','2026-03-02 14:34:13'),(13,'14','50','Hoàn tiền kết nối thành công','2026-02-17 14:34:13','2026-03-02 14:34:13'),(14,'15','-100','Thuê gia sư','2026-02-20 14:34:13','2026-03-02 14:34:13'),(15,'5','-50','Nhận lớp - Job #2','2026-02-21 14:34:13','2026-03-02 14:34:13'),(16,'16','-100','Thuê gia sư','2026-02-27 14:34:13','2026-03-02 14:34:13'),(17,'16','-100','Thuê gia sư','2026-02-22 14:34:13','2026-03-02 14:34:13'),(18,'7','-50','Nhận lớp - Job #4','2026-02-23 14:34:13','2026-03-02 14:34:13'),(19,'17','-100','Thuê gia sư','2026-02-18 14:34:13','2026-03-02 14:34:13'),(20,'17','100','Hoàn tiền - Gia sư từ chối Job #5','2026-02-19 14:34:13','2026-03-02 14:34:13'),(21,'18','-100','Thuê gia sư','2026-02-24 14:34:13','2026-03-02 14:34:13'),(22,'8','-50','Nhận lớp - Job #6','2026-02-25 14:34:13','2026-03-02 14:34:13'),(23,'18','50','Hoàn tiền kết nối thành công','2026-02-26 14:34:13','2026-03-02 14:34:13'),(24,'18','-100','Thuê gia sư','2026-02-28 14:34:13','2026-03-02 14:34:13'),(25,'14','-100','Thuê gia sư','2026-03-01 14:34:13','2026-03-02 14:34:13');
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_send_emails`
--

DROP TABLE IF EXISTS `history_send_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_send_emails` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_send_emails`
--

LOCK TABLES `history_send_emails` WRITE;
/*!40000 ALTER TABLE `history_send_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_send_emails` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_02_09_001112_create_roles_table',1),(5,'2026_02_09_001113_create_class_levels_table',1),(6,'2026_02_09_001113_create_schools_table',1),(7,'2026_02_09_001113_create_subjects_table',1),(8,'2026_02_09_001113_create_time_slots_table',1),(9,'2026_02_09_001114_create_districts_table',1),(10,'2026_02_09_001114_create_rank_salaries_table',1),(11,'2026_02_09_001216_add_profile_columns_to_users_table',1),(12,'2026_02_09_001310_create_teacher_class_table',1),(13,'2026_02_09_001310_create_teacher_subject_table',1),(14,'2026_02_09_001310_create_teachers_table',1),(15,'2026_02_09_001311_create_contacts_table',1),(16,'2026_02_09_001311_create_feedback_table',1),(17,'2026_02_09_001311_create_histories_table',1),(18,'2026_02_09_001311_create_transactions_table',1),(19,'2026_02_09_001311_create_tutor_jobs_table',1),(20,'2026_02_09_001312_create_connects_table',1),(21,'2026_02_09_001312_create_history_send_emails_table',1);
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
-- Table structure for table `rank_salaries`
--

DROP TABLE IF EXISTS `rank_salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rank_salaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rank_salaries`
--

LOCK TABLES `rank_salaries` WRITE;
/*!40000 ALTER TABLE `rank_salaries` DISABLE KEYS */;
INSERT INTO `rank_salaries` VALUES (1,'100k-150k/buổi','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(2,'150k-200k/buổi','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(3,'200k-300k/buổi','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(4,'300k-500k/buổi','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(5,'500k+/buổi','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL);
/*!40000 ALTER TABLE `rank_salaries` ENABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2026-03-02 14:34:09','2026-03-02 14:34:09'),(2,'ctv','2026-03-02 14:34:09','2026-03-02 14:34:09'),(3,'teacher','2026-03-02 14:34:09','2026-03-02 14:34:09'),(4,'user','2026-03-02 14:34:09','2026-03-02 14:34:09');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schools` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (1,'Đại học Giao thông Vận tải','2026-03-02 14:34:10','2026-03-02 14:34:10'),(2,'Đại học Bách khoa Hà Nội','2026-03-02 14:34:10','2026-03-02 14:34:10'),(3,'Đại học Quốc gia Hà Nội','2026-03-02 14:34:10','2026-03-02 14:34:10'),(4,'Đại học Sư phạm Hà Nội','2026-03-02 14:34:10','2026-03-02 14:34:10'),(5,'Đại học Kinh tế Quốc dân','2026-03-02 14:34:10','2026-03-02 14:34:10'),(6,'Đại học Ngoại thương','2026-03-02 14:34:10','2026-03-02 14:34:10'),(7,'Đại học Y Hà Nội','2026-03-02 14:34:10','2026-03-02 14:34:10'),(8,'Đại học Công nghệ - ĐHQGHN','2026-03-02 14:34:10','2026-03-02 14:34:10'),(9,'Học viện Tài chính','2026-03-02 14:34:10','2026-03-02 14:34:10'),(10,'Học viện Ngân hàng','2026-03-02 14:34:10','2026-03-02 14:34:10');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
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
INSERT INTO `sessions` VALUES ('wXrGDqArAx3KYUjS1gmtyIYzOGRdOl5uUXSdy4pv',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlpqMlFJWWtOTVd1UXFKV0pWblo2bE1QSmt4VXdLQm1OdjRGYk44SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90dXRvcnMvMTEiO3M6NToicm91dGUiO3M6MTE6InR1dG9ycy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1772462060);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Toán','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(2,'Lý','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(3,'Hóa','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(4,'Sinh','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(5,'Văn','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(6,'Sử','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(7,'Địa','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(8,'Tiếng Anh','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(9,'Tin học','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(10,'IELTS','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(11,'TOEIC','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(12,'Tiếng Nhật','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(13,'Tiếng Trung','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(14,'Tiếng Hàn','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(15,'Ngữ văn','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(16,'Khoa học tự nhiên','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(17,'Khoa học xã hội','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_class`
--

DROP TABLE IF EXISTS `teacher_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_class` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TeacherID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ClassID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_class`
--

LOCK TABLES `teacher_class` WRITE;
/*!40000 ALTER TABLE `teacher_class` DISABLE KEYS */;
INSERT INTO `teacher_class` VALUES (1,'4','10','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(2,'4','11','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(3,'4','12','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(4,'5','9','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(5,'5','10','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(6,'5','11','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(7,'5','12','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(8,'5','13','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(9,'6','7','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(10,'6','8','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(11,'6','9','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(12,'6','10','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(13,'6','11','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(14,'7','10','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(15,'7','11','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(16,'7','12','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(17,'8','10','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(18,'8','11','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(19,'8','12','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(20,'8','13','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(21,'9','6','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(22,'9','7','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(23,'9','8','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(24,'9','9','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(25,'9','10','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(26,'9','11','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(27,'9','12','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(28,'10','13','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(29,'11','6','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(30,'11','7','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(31,'11','8','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(32,'11','9','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(33,'12','11','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(34,'12','12','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(35,'12','13','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(36,'13','10','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(37,'13','11','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(38,'13','12','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL);
/*!40000 ALTER TABLE `teacher_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_subject`
--

DROP TABLE IF EXISTS `teacher_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_subject` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `TeacherID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SubjectID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_subject`
--

LOCK TABLES `teacher_subject` WRITE;
/*!40000 ALTER TABLE `teacher_subject` DISABLE KEYS */;
INSERT INTO `teacher_subject` VALUES (1,'4','1','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(2,'4','3','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(3,'5','8','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(4,'5','10','2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(5,'6','1','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(6,'6','2','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(7,'7','3','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(8,'7','4','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(9,'8','9','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(10,'9','5','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(11,'9','6','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(12,'9','15','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(13,'10','12','2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(14,'11','1','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(15,'12','1','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(16,'13','7','2026-03-02 14:34:12','2026-03-02 14:34:12',NULL);
/*!40000 ALTER TABLE `teacher_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int DEFAULT NULL,
  `citizen_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_tutor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `DistrictID` int DEFAULT NULL,
  `Certificate` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_slots`
--

DROP TABLE IF EXISTS `time_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `time_slots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_slots`
--

LOCK TABLES `time_slots` WRITE;
/*!40000 ALTER TABLE `time_slots` DISABLE KEYS */;
INSERT INTO `time_slots` VALUES (1,'Sáng (7h-9h)','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(2,'Sáng (9h-11h)','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(3,'Chiều (14h-16h)','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(4,'Chiều (16h-18h)','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL),(5,'Tối (19h-21h)','2026-03-02 14:34:09','2026-03-02 14:34:09',NULL);
/*!40000 ALTER TABLE `time_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'14','500','VNPay','VNP20260101001','success','2026-02-10 14:34:13','2026-02-10 14:34:13'),(2,'15','300','VNPay','VNP20260105002','success','2026-02-12 14:34:13','2026-02-12 14:34:13'),(3,'16','500','VNPay','VNP20260107003','success','2026-02-15 14:34:13','2026-02-15 14:34:13'),(4,'16','300','VNPay','VNP20260120004','success','2026-02-23 14:34:13','2026-02-23 14:34:13'),(5,'17','200','VNPay','VNP20260110005','success','2026-02-18 14:34:13','2026-02-18 14:34:13'),(6,'18','1000','VNPay','VNP20260115006','success','2026-02-20 14:34:13','2026-02-20 14:34:13'),(7,'4','200','VNPay','VNP20260108007','success','2026-02-16 14:34:13','2026-02-16 14:34:13'),(8,'5','200','VNPay','VNP20260109008','success','2026-02-17 14:34:13','2026-02-17 14:34:13'),(9,'6','300','VNPay','VNP20260110009','success','2026-02-19 14:34:13','2026-02-19 14:34:13'),(10,'8','500','VNPay','VNP20260112010','success','2026-02-21 14:34:13','2026-02-21 14:34:13');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor_jobs`
--

DROP TABLE IF EXISTS `tutor_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutor_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_jobs`
--

LOCK TABLES `tutor_jobs` WRITE;
/*!40000 ALTER TABLE `tutor_jobs` DISABLE KEYS */;
INSERT INTO `tutor_jobs` VALUES (1,'14','4','Toán','Lớp 12',1,'Con trai tôi học lớp 12, cần gia sư dạy Toán để luyện thi đại học. Học 3 buổi/tuần vào tối.','2026-02-15 14:34:13','2026-02-16 14:34:13',NULL),(2,'15','5','Tiếng Anh','Lớp 11',1,'Con gái tôi cần học Tiếng Anh giao tiếp và luyện IELTS. Hiện tại đang học lớp 11.','2026-02-20 14:34:13','2026-02-21 14:34:13',NULL),(3,'16','6','Lý','Lớp 10',0,'Cần gia sư dạy Vật lý cho con trai tôi. Cháu học lớp 10 trường chuyên, cần người dạy nâng cao.','2026-02-27 14:34:13','2026-02-27 14:34:13',NULL),(4,'16','7','Hóa','Lớp 12',1,'Con gái tôi học lớp 12, cần luyện thi Hóa học để thi vào trường Y.','2026-02-22 14:34:13','2026-02-23 14:34:13',NULL),(5,'17','9','Văn','Lớp 9',2,'Con gái tôi học lớp 9, cần gia sư dạy Văn để chuẩn bị thi chuyên Văn.','2026-02-18 14:34:13','2026-02-19 14:34:13',NULL),(6,'18','8','Tin học','Lớp 12',1,'Tôi muốn học lập trình Python cơ bản. Hiện là sinh viên năm 1 cần bổ sung kiến thức Tin học.','2026-02-24 14:34:13','2026-02-25 14:34:13',NULL),(7,'18','11','Toán','Lớp 8',0,'Em trai tôi học lớp 8, Toán yếu cần gia sư kèm. Học 2 buổi/tuần.','2026-02-28 14:34:13','2026-02-28 14:34:13',NULL),(8,'14','10','Tiếng Nhật','Đại học',0,'Tôi muốn học tiếng Nhật từ đầu. Mục tiêu đạt N4 trong 6 tháng.','2026-03-01 14:34:13','2026-03-01 14:34:13',NULL);
/*!40000 ALTER TABLE `tutor_jobs` ENABLE KEYS */;
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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `school_id` int DEFAULT NULL,
  `Citizen_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_id` int DEFAULT NULL,
  `exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_tutor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `DistrictID` int DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Certificate` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Certificate_public` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_accept` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin GS7','admin',NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin@gs7.com',NULL,'$2y$12$/192TOqLKI7pr8EbMsPk4ODT6FJvSyFjwCxu2k0vgqSmc5XjopyLO',NULL,'2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(2,'Phạm Minh Đức','ctv','Nam',NULL,NULL,'0912345678','15 Nguyễn Trãi, Thanh Xuân, Hà Nội','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ctv01@gs7.com',NULL,'$2y$12$zyoyOk4LffPacqsj265J6.9bv14tuDTasGPnlbLy3ASqhuGCNnsje',NULL,'2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(3,'Lê Thị Hoa','ctv','Nữ',NULL,NULL,'0912345679','20 Lê Duẩn, Đống Đa, Hà Nội','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ctv02@gs7.com',NULL,'$2y$12$j0SZAzcb9wjvLbhKkjfLXeFnWU9CCCmiuM6lFsOYSBtmo6E2rEQFK',NULL,'2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(4,'Nguyễn Văn An','teacher','Nam',NULL,NULL,'0987654321','10 Cầu Giấy, Cầu Giấy, Hà Nội','200',1,'001099012345','Cử nhân',NULL,NULL,2,'3 năm dạy Toán cấp 3','Gia sư','Giáo viên có 3 năm kinh nghiệm dạy Toán cấp 3. Tốt nghiệp Đại học Giao thông Vận tải với bằng giỏi. Phương pháp dạy dễ hiểu, tận tâm với học sinh.',NULL,1,5,NULL,NULL,NULL,NULL,'Admin GS7',NULL,NULL,'2026-01-31 21:34:10','giasu01@gs7.com',NULL,'$2y$12$.NIISgtDNe1DobNsLgS4pO4VbRTJr5tT1kHHj6xo5AwRZ9JF0jxQS',NULL,'2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(5,'Trần Thị Bích Ngọc','teacher','Nữ',NULL,NULL,'0987654322','25 Thái Hà, Đống Đa, Hà Nội','150',4,'001099012346','Thạc sĩ',NULL,NULL,3,'5 năm dạy Tiếng Anh','Gia sư','Thạc sĩ Ngôn ngữ Anh, Đại học Sư phạm Hà Nội. 5 năm kinh nghiệm luyện thi IELTS và dạy Tiếng Anh giao tiếp. Nhiều học sinh đạt IELTS 7.0+.',NULL,1,4,NULL,NULL,NULL,NULL,'Admin GS7',NULL,NULL,'2026-02-05 21:34:10','giasu02@gs7.com',NULL,'$2y$12$spmQmhSxkeCUo5hzzf7RLOPkFnca6UzMo9.8ZW5MhbHn4en/rMUK.',NULL,'2026-03-02 14:34:10','2026-03-02 14:34:10',NULL),(6,'Lê Hoàng Nam','teacher','Nam',NULL,NULL,'0987654323','30 Kim Mã, Ba Đình, Hà Nội','300',2,'001099012347','Kỹ sư',NULL,NULL,2,'2 năm dạy Lý và Toán','Gia sư','Kỹ sư Điện tử - Viễn thông, Đại học Bách khoa Hà Nội. Dạy kèm Vật lý và Toán cho học sinh cấp 2 và cấp 3. Dạy logic, bắt đầu từ nền tảng.',NULL,1,1,NULL,NULL,NULL,NULL,'Phạm Minh Đức',NULL,NULL,'2026-02-10 21:34:10','giasu03@gs7.com',NULL,'$2y$12$K2tw4LMgYphGyvR74T4xl.mxk80h/DVp6LBG/adwDJTRg58fWn8rW',NULL,'2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(7,'Phạm Thị Mai Anh','teacher','Nữ',NULL,NULL,'0987654324','5 Hoàng Quốc Việt, Cầu Giấy, Hà Nội','100',3,'001099012348','Cử nhân',NULL,NULL,3,'4 năm dạy Hóa học','Gia sư','Cử nhân Hóa học, Đại học Quốc gia Hà Nội. 4 năm dạy kèm Hóa học cấp 3, chuyên luyện thi đại học. Nhiều học sinh đỗ vào trường Y và Bách khoa.',NULL,1,5,NULL,NULL,NULL,NULL,'Admin GS7',NULL,NULL,'2026-02-15 21:34:10','giasu04@gs7.com',NULL,'$2y$12$XU6oRSe9bkonACvgeCyhnOKx.Wa3h.73o3foPTU.tPFoVip5f0dT6',NULL,'2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(8,'Vũ Đức Mạnh','teacher','Nam',NULL,NULL,'0987654325','40 Xuân Thủy, Cầu Giấy, Hà Nội','500',8,'001099012349','Thạc sĩ',NULL,NULL,4,'6 năm dạy Tin học','Gia sư','Thạc sĩ Công nghệ thông tin. 6 năm kinh nghiệm dạy Tin học văn phòng, lập trình Python và C++. Dạy từ cơ bản đến nâng cao, phù hợp mọi trình độ.',NULL,1,10,NULL,NULL,NULL,NULL,'Lê Thị Hoa',NULL,NULL,'2026-02-20 21:34:10','giasu05@gs7.com',NULL,'$2y$12$Qnb59HbwjXrtlCopUc44Tuk60hcCUIqQ1NIaZPecEpxEBbDGEwnVi',NULL,'2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(9,'Hoàng Thị Lan Hương','teacher','Nữ',NULL,NULL,'0987654326','18 Đội Cấn, Ba Đình, Hà Nội','180',4,'001099012350','Cử nhân',NULL,NULL,2,'3 năm dạy Văn và Sử','Gia sư','Cử nhân Sư phạm Ngữ văn. Dạy Văn và Sử cho học sinh cấp 2 và cấp 3. Phương pháp dạy sáng tạo, giúp học sinh yêu thích môn Văn và đạt điểm cao.',NULL,1,7,NULL,NULL,NULL,NULL,'Admin GS7',NULL,NULL,'2026-02-12 21:34:10','giasu06@gs7.com',NULL,'$2y$12$SuaqH/ALGhHiUwFgeWAYP.NDWTPCTW0mSMDiAdrVBZE5WRSM0oJZG',NULL,'2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(10,'Đặng Quang Huy','teacher','Nam',NULL,NULL,'0987654327','55 Nguyễn Chí Thanh, Đống Đa, Hà Nội','120',6,'001099012351','Cử nhân',NULL,NULL,3,'2 năm dạy Tiếng Nhật','Gia sư','Tốt nghiệp cử nhân Ngoại thương, chứng chỉ JLPT N2. 2 năm kinh nghiệm dạy tiếng Nhật từ N5 đến N3. Giảng dạy kết hợp văn hóa Nhật Bản.',NULL,1,4,NULL,NULL,NULL,NULL,'Phạm Minh Đức',NULL,NULL,'2026-02-18 21:34:10','giasu07@gs7.com',NULL,'$2y$12$tlU4N3UdvnPw1a6utzxmU.4UEurzfGsa3eK3krd7oVW4BUXN.ICSa',NULL,'2026-03-02 14:34:11','2026-03-02 14:34:11',NULL),(11,'Nguyễn Thị Thanh Huyền','teacher','Nữ',NULL,NULL,'0987654328','22 Trần Duy Hưng, Cầu Giấy, Hà Nội','250',5,'001099012352','Thạc sĩ',NULL,NULL,2,'4 năm dạy Toán cấp 2','Gia sư','Thạc sĩ Toán ứng dụng, Đại học Kinh tế Quốc dân. Chuyên dạy Toán cấp 2, giúp học sinh nắm vững kiến thức nền tảng và phát triển tư duy logic.',NULL,1,12,NULL,NULL,NULL,NULL,'Admin GS7',NULL,NULL,'2026-02-08 21:34:10','giasu08@gs7.com',NULL,'$2y$12$hCSH3xWn0jAwMIdoABNBBuaD2oyKOdMOTYUNThSgxq2X7b.p4ghJa',NULL,'2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(12,'Bùi Văn Thành','teacher','Nam',NULL,NULL,'0987654329','60 Lê Văn Lương, Thanh Xuân, Hà Nội','0',9,'001099012353','Cử nhân',NULL,NULL,1,'1 năm dạy Toán','Gia sư','Sinh viên mới tốt nghiệp Học viện Tài chính. 1 năm kinh nghiệm dạy kèm Toán và Kinh tế vi mô cho sinh viên đại học.',NULL,0,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'giasu09@gs7.com',NULL,'$2y$12$u9W56f1gkK.dqitJ/DwlQ.8NKzPDeqY9Cbgy12cUXwVYwcxWPgv5G',NULL,'2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(13,'Đỗ Thị Phương Thảo','teacher','Nữ',NULL,NULL,'0987654330','35 Tây Sơn, Đống Đa, Hà Nội','0',4,'001099012354','Cử nhân',NULL,NULL,1,'2 năm dạy Địa lý','Gia sư','Cử nhân Sư phạm Địa lý, Đại học Sư phạm Hà Nội. 2 năm kinh nghiệm dạy Địa lý cấp 3, phương pháp giảng dạy trực quan bằng bản đồ và sơ đồ tư duy.',NULL,0,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'giasu10@gs7.com',NULL,'$2y$12$NjMrCKh70whK/kU0IT7hYu33fgFVsUmbbr44o9TvcSsukZvukjiAq',NULL,'2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(14,'Trần Văn Hùng','user','Nam',NULL,NULL,'0901234561','8 Phố Huế, Hai Bà Trưng, Hà Nội','500',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'phuhuynh01@gs7.com',NULL,'$2y$12$spIhdG3ob9GiuYteQ8opdOovJ.Bb3GQqilc8bWHMddwUH1gIdefyG',NULL,'2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(15,'Nguyễn Thị Lan','user','Nữ',NULL,NULL,'0901234562','45 Láng Hạ, Đống Đa, Hà Nội','300',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'phuhuynh02@gs7.com',NULL,'$2y$12$4weW3ltFgFzXDVGcw75aSeuS1r.JvWtzDR.5aIZzlb21/svIh7Sqi',NULL,'2026-03-02 14:34:12','2026-03-02 14:34:12',NULL),(16,'Lê Quang Vinh','user','Nam',NULL,NULL,'0901234563','12 Hoàng Hoa Thám, Ba Đình, Hà Nội','800',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'phuhuynh03@gs7.com',NULL,'$2y$12$.o0o1EVQfJngp7n8VtKo.uFm83NuBZNMX.Go7JtLfa8uVzcEC6Xoe',NULL,'2026-03-02 14:34:13','2026-03-02 14:34:13',NULL),(17,'Phạm Thị Thu Hà','user','Nữ',NULL,NULL,'0901234564','70 Trường Chinh, Thanh Xuân, Hà Nội','200',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'phuhuynh04@gs7.com',NULL,'$2y$12$dMm5ALv/DzGiOu8ol/FvUezdH9ujrZqKzEoyRuEG0Chx2lCqqdNX6',NULL,'2026-03-02 14:34:13','2026-03-02 14:34:13',NULL),(18,'Võ Minh Tuấn','user','Nam',NULL,NULL,'0901234565','33 Nguyễn Phong Sắc, Cầu Giấy, Hà Nội','1000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'phuhuynh05@gs7.com',NULL,'$2y$12$dqpr2JzNb4cwzi6bvxOpGO3ggewmA8w/kgeqhLVn96cYLWd7pZASC',NULL,'2026-03-02 14:34:13','2026-03-02 14:34:13',NULL);
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

-- Dump completed on 2026-03-02 22:26:13
