-- MySQL dump 10.13  Distrib 8.4.8, for Linux (x86_64)
--
-- Host: localhost    Database: nine_db
-- ------------------------------------------------------
-- Server version	8.4.8

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
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` VALUES (1,'Kaos Polos','2026-06-19 14:51:00'),(2,'Kaos Distro','2026-06-19 14:51:00'),(3,'Kaos Premium','2026-06-19 14:51:00');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_preorder`
--

DROP TABLE IF EXISTS `tb_preorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_preorder` (
  `id_preorder` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `produk` varchar(200) NOT NULL,
  `id_produk` int DEFAULT NULL,
  `jumlah` int NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `catatan` text,
  `status` enum('pending','diproses','selesai','batal') DEFAULT 'pending',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_preorder`),
  KEY `fk_preorder_produk` (`id_produk`),
  CONSTRAINT `fk_preorder_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_preorder`
--

LOCK TABLES `tb_preorder` WRITE;
/*!40000 ALTER TABLE `tb_preorder` DISABLE KEYS */;
INSERT INTO `tb_preorder` VALUES (2,'fwafwef','0874788238874','fiqhbdr@gmail.com','afaf',7,1,'S','fragg','','pending','2026-06-19 22:16:06'),(3,'dsagag','088848837664','fiqhbdr@gmail.com','afaf',7,1,'S','gergsegse','','pending','2026-06-19 22:17:03');
/*!40000 ALTER TABLE `tb_preorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produk`
--

DROP TABLE IF EXISTS `tb_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int DEFAULT NULL,
  `nama_produk` varchar(200) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT '0',
  `stok_s` int DEFAULT '0',
  `stok_m` int DEFAULT '0',
  `stok_l` int DEFAULT '0',
  `stok_xl` int DEFAULT '0',
  `stok_xxl` int DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produk`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produk`
--

LOCK TABLES `tb_produk` WRITE;
/*!40000 ALTER TABLE `tb_produk` DISABLE KEYS */;
INSERT INTO `tb_produk` VALUES (1,1,'Kaos Polos Hitam',50000.00,100,0,100,0,0,0,NULL,'2026-06-19 14:51:00'),(2,1,'Kaos Polos Putih',50000.00,100,0,100,0,0,0,NULL,'2026-06-19 14:51:00'),(3,2,'Kaos Distro Urban',85000.00,50,0,50,0,0,0,NULL,'2026-06-19 14:51:00'),(4,3,'Kaos Premium Cotton',150000.00,30,0,30,0,0,0,NULL,'2026-06-19 14:51:00'),(7,2,'afaf',234.00,1,1,0,0,0,0,'2cc4043c4e282c7b95433b6c4dba239f.jpeg','2026-06-19 22:01:25');
/*!40000 ALTER TABLE `tb_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'Admin','admin','$2y$12$aDuHU820hUKZQyEAoazRa.rJGJ8pwVwRgn5.ji/ev7dEgPDzV3ex6','admin','2026-06-19 14:51:00'),(2,'Budi','budi','budi123','customer','2026-06-19 14:51:00'),(3,'Siti','siti','siti123','customer','2026-06-19 14:51:00');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-20 13:32:18
