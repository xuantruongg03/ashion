-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: demo1
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `cart_quantity` int NOT NULL,
  `product_detail` varchar(50) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (15,2,2,1,NULL,250000),(16,2,1,1,NULL,200000),(17,4,1,1,NULL,200000),(21,1,1,1,NULL,200000);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_phone` varchar(50) NOT NULL,
  `order_total_price` float(20,5) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_address` varchar(200) NOT NULL,
  `order_note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  `payment_method` varchar(45) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'A','0981793201',6000000.00000,'Chờ xử lý','123','','2024-04-01 14:26:56','2024-04-01 14:26:56',1,2,''),(2,1,'A','0981793201',400000.00000,'Chờ xử lý','A','','2024-04-02 04:35:29','2024-04-02 04:35:29',1,2,''),(3,2,'Tạ Phạm Công','0347276151',250000.00000,'Chờ xử lý','Tuy Phước, Bình Định','','2024-04-03 04:38:08','2024-04-03 04:38:08',2,1,''),(4,1,'Tạ Phạm Công','0347276151',200000.00000,'Chờ xử lý','Tuy Phước, Bình Định','','2024-04-03 06:42:11','2024-04-03 06:42:11',2,1,'');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `product_image_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `image_tag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`product_image_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/435805/item/vngoods_58_435805.jpg?width=320','avt'),(2,1,'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/435805/sub/vngoods_435805_sub7.jpg?width=750',NULL),(3,1,'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/435805/sub/goods_435805_sub13.jpg?width=750',NULL),(4,2,'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467212/item/vngoods_11_467212.jpg?width=750','avt'),(5,2,'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467212/sub/vngoods_467212_sub7.jpg?width=750',NULL),(6,2,'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467212/sub/vngoods_467212_sub9.jpg?width=750',NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(400) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int NOT NULL,
  `product_rate` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_trending` tinyint(1) DEFAULT '0',
  `product_best_seller` tinyint(1) DEFAULT '0',
  `product_featured` tinyint(1) DEFAULT '0',
  `product_size` varchar(50) DEFAULT NULL,
  `product_sale` float DEFAULT '0',
  `product_sub_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Áo thun nam','Áo thun nam được làm từ chất liệu cotton 100%, giúp thoát mồ hôi và tạo cảm giác thoải mái cho người mặc. Thiết kế đơn giản nhưng không kém phần lịch lãm, phù hợp cho mọi hoàn cảnh từ hàng ngày đến đi tiệc. Áo có các size từ S đến XL, phù hợp với mọi dáng người. Đặc biệt, áo thun nam này có các màu sắc phong phú như đen, xanh navy, xám, trắng và nhiều màu sắc khác nhau để bạn dễ dàng lựa chọn phong cách.',200000,4,50,'Nam','2024-03-29 15:17:23',1,0,1,'xxs',2,'Áo thun'),(2,'Áo sơ mi nữ','Áo sơ mi nữ với thiết kế tinh tế và chất liệu cotton cao cấp, mang lại sự thoải mái cho người mặc trong mọi hoàn cảnh. Được may tỉ mỉ từ những đường may chắc chắn, áo sơ mi này không chỉ là trang phục thích hợp cho công sở mà còn dễ dàng kết hợp với các trang phục khác như chân váy hoặc quần jean để tạo nên phong cách cá nhân riêng. Sản phẩm có các size từ XS đến L và có sẵn trong các màu sắc như trắng, xanh pastel, hồng, vàng nhat và nhiều màu sắc khác.',250000,5,30,'Nữ','2024-03-29 15:17:23',0,1,0,'l',0,'Áo sơ mi');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'A','B','ABC','$2y$10$n4G8gcHb4DxewBrYx33.s.rWyQk8BMVJLyb0XPd71dpaZnYoZdsVm','user'),(2,'Tạ Phạm','Công','sockkuye','$2y$10$.jpYjwitsQWi2QZGo6Uf6usRhOQbLIC9L.zQe1Z78CvstAkB9HnBy','user'),(3,'Le Thi ','Ni Ni','lethinini1802@gmail.com','$2y$10$IJlQXstq7r3MoUBwx8SBt.JmsZYvG2VCzZ04ALi8rFIjgY6Oqrr8m','user'),(4,'A','A','a','$2y$10$ZUZVPPgEbSUxm6FOc4.Jk.sn/bQAVmTk1Cv5FH.D6Q9jJKx.32AZq','user');
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

-- Dump completed on 2024-05-17 16:48:59
