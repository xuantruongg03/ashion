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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'https://ae01.alicdn.com/kf/H823a1ba263ff42479e59af81b8d76ae9u/Casual-Blazer-Women-2020-Spring-Autumn-New-Korean-Fashion-Long-sleeve-Short-Suit-Jacket-Women-Slim.jpg','avt'),(2,2,'https://sakurafashion.vn/upload/a/2730-ao-khoac-mang-to-ao-len-co-lo-9953.jpg','avt'),(3,3,'https://misskick.vn/wp-content/uploads/2022/05/ao-so-mi-jean-nu-mac-voi-quan-gi-1.jpg','avt'),(4,4,'https://cdn.vortexs.io/api/images/0bb25f88-a962-4ea8-9c43-f9ce61c53868/1920/w/ao-thun-adlv-basic-white-adlv19ss-ssb-ln2-wht-size-s-50kg-85kg-size-m-80kg-110kg.jpeg','avt'),(5,5,'https://th.bing.com/th/id/OIP.vsyhDUsZ-tvyFdxP7t1VUAHaHa?rs=1&pid=ImgDetMain','avt'),(6,6,'https://media3.scdn.vn/img3/2019/9_8/adgzCx_simg_de2fe0_500x500_maxb.jpg','avt'),(7,7,'https://cdn.shopify.com/s/files/1/0066/6943/4950/products/Lucia-Petal-pond-Vintage-style-Cottagecore-Dress-148_600x600.jpg?v=1664058321','avt'),(8,8,'https://zerdio.com.vn/wp-content/uploads/2022/08/Quan-jean-ong-rong-dang-loe.jpg','avt'),(9,9,'https://cf.shopee.vn/file/9c6e9f3530eb3fcd0e6bbf9d0c6b0ee3','avt'),(10,10,'https://media3.scdn.vn/img4/2020/12_31/ZnmSuDqoPJyV73w6Wjca.jpg','avt'),(11,11,'https://www.ebon.vn/data/product/96/91/95/ao-khoac-gilet-chan-bong-vnxk-ak302-1662697345-358.jpg','avt'),(12,12,'https://static.zara.net/photos/2022/I/0/3/p/3284/750/600/2/w/560/3284750600_6_1_1.jpg?ts=1667227778492','avt'),(13,13,'https://static.zara.net/photos/2022/I/0/3/p/3284/750/600/2/w/560/3284750600_6_1_1.jpg?ts=1667227778492','avt'),(14,14,'https://canifa.com/img/1000/1500/resize/1/t/1ts21s016-sp210-120-2.jpg','avt'),(15,15,'https://down-vn.img.susercontent.com/file/c10261a1b92701c5e3de2694bf2fa2cd','avt'),(16,16,'https://product.hstatic.net/1000290074/product/5637-4_985c587055c7493586142e24027f592e.jpg','avt'),(17,17,'https://namfashion.com/home/wp-content/uploads/2020/06/5d3d22f83b3ac6649f2b-768x960.jpg','avt'),(18,18,'https://cf.shopee.vn/file/699e903e40b346926866ed524f82b45a','avt'),(19,19,'https://th.bing.com/th/id/R.74cac31c7c0e44935a08c8207e5682eb?rik=7OWh8L5ifu6aDA&riu=http%3a%2f%2fkidstyle.com.vn%2fimages%2fdetailed%2f8%2fSJB68005-1_oj2b-5d.jpg&ehk=f3cA7mpvyG4BhttqBnic4nnsO4N7gGA7pCabYz%2bwiPE%3d&risl=&pid=ImgRaw&r=0','avt'),(20,20,'https://www.besanhdieu.com/images/stories/virtuemart/product/QN3049.jpg','avt'),(21,21,'https://th.bing.com/th/id/R.74cac31c7c0e44935a08c8207e5682eb?rik=7OWh8L5ifu6aDA&riu=http%3a%2f%2fkidstyle.com.vn%2fimages%2fdetailed%2f8%2fSJB68005-1_oj2b-5d.jpg&ehk=f3cA7mpvyG4BhttqBnic4nnsO4N7gGA7pCabYz%2bwiPE%3d&risl=&pid=ImgRaw&r=0','avt'),(22,22,'https://my-test-11.slatic.net/p/cd09e8d6073c21fed1e1161d9302a937.jpg','avt'),(23,23,'https://www.besanhdieu.com/images/stories/virtuemart/product/QN293-K.jpg','avt'),(24,24,'https://www.besanhdieu.com/images/stories/virtuemart/product/QN272-12.jpg','avt'),(25,25,'https://ciyfashion.com/wp-content/uploads/2023/11/Ao-so-mi-tron-lua-mau-be.png','avt'),(26,26,'https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/tin-tuc-onpage/ao-so-mi-nu-tay-ngan/ao-so-mi-nu-form-dai-tay-ngan.jpg','avt'),(27,27,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPMrtStquyNn22g6CtOfsIdvQ_xbKcHvp-S8wAazD9d0qP7Hme-o1Wk7MltpbwUEFoVJU&usqp=CAU','avt'),(28,28,' https://pos.nvncdn.com/f06edc-11055/ps/content/20230316_lrXGDuMpVhz2.jpg','avt'),(29,29,'https://bizweb.dktcdn.net/100/399/392/products/ao-polo-nam-chinh-hang-hiddle-phoi-ke-soc-4.jpg?v=1710305999130','avt'),(30,30,'https://salt.tikicdn.com/cache/w1200/ts/product/e7/29/8c/9cf3e420680fffd2058dc2fd2c047075.jpg','avt'),(31,31,'https://bizweb.dktcdn.net/100/405/002/products/82-6bacf6a1-bc57-4773-9c38-230a1c559149.jpg?v=1673320892753','avt'),(32,32,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyfbWlXiFdCZ_uoYWKqozoJ4IyBhUN0zrKUg&usqp=CAU','avt'),(33,33,'https://vn-test-11.slatic.net/p/d08ca787cad6fdfe4b43a3289d2128b6.png','avt'),(34,34,'https://img.lazcdn.com/g/p/c0f97e4befc202cdc6c21d4e90294c60.jpg_720x720q80.jpg','avt'),(35,35,'https://vinakids.vn/hinhanh/sanpham/bd043fe0e8d90d8754c8123.jpg','avt'),(36,36,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR87Jk4b8fspLJxNCPBd5kXjA6OsVgv6KhxmMnMtlMOCnzUBXxITnjkcMyGAmCnp_Jcfv4&usqp=CAU','avt'),(37,37,'https://salt.tikicdn.com/ts/tmp/52/7d/c1/8d2182b5ff54fc80c80dfc0c0a2fd044.jpg','avt'),(38,38,'https://cf.shopee.vn/file/a9fb229df71b6496601f0f70e49bf96f','avt'),(39,39,'https://th.bing.com/th/id/OIP.hnkediJMrdUodA8nyaWg_gAAAA?rs=1&pid=ImgDetMain','avt'),(40,40,'https://cf.shopee.vn/file/fca00e23cb5687719483b055470bca58','avt'),(41,41,'https://cf.shopee.vn/file/524d07829f285dccef007adb4ebbdaec','avt'),(42,42,'https://www.chapi.vn/img/product/2018/7/1/ao-khoac-nam-trung-nien-co-be-jbp-8-new.jpg','avt'),(43,43,'https://salt.tikicdn.com/cache/w1200/ts/product/61/84/da/5f7503223e5f625cabfad861272135f8.jpg','avt'),(44,44,'https://cf.shopee.vn/file/vn-11134207-7qukw-li2t25fyv6ks7e','avt'),(45,45,'https://evara.vn/uploads/plugin/product_items/396/thumb/thumb_350_1.jpg','avt'),(46,46,'https://topcomshop.com/uploads/images/a-athudong/13/12327712157-2104993062.jpg','avt');
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Áo Blazer nữ','Áo Blazer form chiết eo, chất vải tuyết mưa, có mút đệm vai',300000,5,200,'Nữ','2024-05-17 12:43:10',1,1,1,'xxl',50,'Áo'),(2,'Áo khoác măng tô','Áo khoác ấm măng tô dáng dài, dày dặn, kèm đai',300000,5,100,'Nữ','2024-05-17 12:43:10',1,1,1,'xl',50,'Váy'),(3,'Áo sơ mi jean cổ bèo ','Áo sơ mi jean cổ nơ thiết kế tay bồng form rộng',150000,4,100,'Nữ','2024-05-17 12:43:10',1,1,1,'l',50,'Áo'),(4,'Áo thun nữ','Áo thun thêu chữ ALV hot trend, chất vải cotton mát ',150000,5,200,'Nữ','2024-05-17 12:43:10',1,1,1,'xl',50,'Áo'),(5,'Bộ vest công sở','Bộ vest chất vải tuyết mưa dày dặn, mềm mại ít nhăn',400000,5,300,'Nữ','2024-05-17 12:43:10',1,1,1,'xxl',50,'Áo'),(6,'chân váy xếp ly dài','Chân váy xếp ly dài vải mềm',170000,5,200,'Nữ','2024-05-17 12:43:10',1,1,1,'xxxl',50,'Váy'),(7,'Đầm hoa nhí','Đầm hoa nhí dáng chữ A xếp tầng, chất liệu voan, đan',350000,4,100,'Nữ','2024-05-17 12:43:10',0,1,1,'xxxl',50,'Váy'),(8,'Quần jean ống loe','Quần jean nữ ống loe cạp cao ',220000,5,300,'Nữ','2024-05-17 12:43:10',1,1,1,'xl',50,'Quần'),(9,'Quần tây ống suông','Quần tây ống rộng ly lệch 2 bên cập cao hách dáng, chất kiệu gôm hàn cao cấp',260000,5,300,'Nữ','2024-05-17 12:43:10',1,1,1,'xl',50,'Quần'),(10,'Áo hoodie kéo khoá','Áo khoác lông cừu vừa ấm áp vừa phong cách',500000,5,200,'Trẻ em','2024-05-17 12:43:10',0,0,1,'xxxl',0,'Áo'),(11,'Áo khoác bé trai teddy vải','Vải demim màu xanh. Đường cắt hơi rộng thùng thình. Có khoá kéo mở ở phía trước.',600000,5,200,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xxl',0,'Áo'),(12,'Áo khoác gilet chần bông bé gái chống thấm nước','Áo khoác gilet nhồi bông thổng bé gái, áo cổ lửng dáng croptop thời trang dễ dàng mix đồ',479000,4,200,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'l',0,'Áo'),(13,'Áo len dệt kim Jacquard','Chiếc áo dệt kim mềm mại và dẻo dai này giúp sưởi ấm trẻ nhỏ ngay từ những ngày đầu tiên. Tay áo dài, có 3 nút phía trước. Mẫu Jacquard',599000,4,100,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xxl',0,'Áo'),(14,'Áo phông bé gái cotton USA in hình Mickey & Friend','Áo thun cộc tay bé gái in hình nhân vật Mickey, form dáng crop vừa phải tạo sự khoẻ khoắn cá tính cho các bé',199000,5,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xxxl',0,'Áo'),(15,'Áo phông bé trai in Marvel','Áo thun nam 100% cotton',249000,5,300,'Trẻ Em','2024-05-17 12:43:10',0,0,1,'xxl',0,'Áo'),(16,'Đầm váy công chúa Elsa thô ngắn tay bé gái Rabity','Đầm váy công chúa Elsa thô ngắn tay bé gái Rabity chất liệu cotton',369000,4,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xl',0,'Váy'),(17,'Quần jean co giãn','Quần jeans đen với hiệu ứng phai màu ở một số chỗ rất phong cách và cần thiết.',350000,5,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xl',0,'Quần'),(18,'Quần jeans bé gái dáng regular fit','Quần jeans bé gái dáng regular fit, chất liệu co giãn',239000,5,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xxl',0,'Quần'),(19,'Quần jeans bé trai cotton cạp chu dáng jogger','Quần jeans chất liệu cotton, cạp chun luồn dây dệt, gấu bo chun, dáng jogger.',299000,5,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'l',0,'Quần'),(20,'Quần short bé gái cotton cạp chun phối bèo','Quần short jeans bé gái, dáng hơi A, cạp bèo, chất liệu dày dặn.',249000,5,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xl',0,'Quần'),(21,'Quần short bé trai cotton cạp chun in hoạ tiết','Quần short chất liệu 100% cotton, nẹp kéo khoá giả, túi hai bên và một túi sau.',279000,4,300,'Trẻ Em','2024-05-17 12:43:10',1,0,1,'xxl',0,'Quần'),(22,'Quần short denim bé gái cotton','Quần short dành cho bé gái cạp chun phong cách dễ thương, đáng yêu',129000,4,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'l',0,'Quần'),(23,'Quần short kaki bé trai','Quần shorrt kaki bé trai kiểu dáng đơn giản, form dáng regular thoải mái',249000,4,300,'Trẻ Em','2024-05-17 12:43:10',1,1,0,'xxl',50,'Quần'),(24,'Quần thun co giãn mềm mại','Các bé gái thoải mái di chuyển trong chiếc quần mềm mại lạ mắt này',159000,5,300,'Trẻ Em','2024-05-17 12:43:10',1,1,1,'xxxl',0,'Quần'),(25,'Áo sơ mi tay dài','Chất liệu vải thoáng mát, trơn basic, sang trọng',478000,4,70,'Nữ','2024-05-17 12:43:10',1,0,1,'l',50,'Áo'),(26,'Áo sơ mi tay ngắn','Chất liệu trơn màu đen, thiết kế sang trọng, lịch sự',378000,4,100,'Nữ','2024-05-17 12:43:10',1,0,1,'l',50,'Áo'),(27,'Áo thun thêu chữ','Chất liệu vải cotton thoáng mát, style chữ năng động',378000,4,100,'Nữ','2024-05-17 12:43:10',1,0,1,'xxl',50,'Áo'),(28,'Chân váy ngắn','Chất liệu vải cotton thoáng mát, style chữ năng động',548000,4,100,'Nữ','2024-05-17 12:43:10',1,0,1,'xl',50,'Váy'),(29,'Áo polo phối kẻ sọc','Áo Polo kẻ sọc cổ đức thời thượng, giúp khẳng định phong thái mạnh mẽ chuẩn quý anh thời trang và hiện đại.',250000,4,100,'Nam','2024-05-17 12:43:10',1,0,1,'xl',50,'Áo'),(30,'Áo polo phối màu','Thiết kế lựa chọn kiểu dáng Regular trẻ trung, với độ dài vừa phải, thoáng mát, tôn dáng vóc người mặc.',350000,4,100,'Nam','2024-05-17 12:43:10',1,0,0,'xl',50,'Áo'),(31,'Quần tây âu','Chất liệu dày, thiết kế sang trọng tông dáng',499000,4,70,'Nam','2024-05-17 12:43:10',1,0,1,'xxl',50,'Quần'),(32,'Quần thun thêu logo','Thiết kế lịch sự sang trọng với chi tiết chữ logo, chất liệu dày, màu đen',365000,4,70,'Nam','2024-05-17 12:43:10',1,0,1,'xl',50,'Quần'),(33,'Áo khoác dù bé trai','Chất liệu vải thấm hút mồ hồi, chống tia UV, có 4 ngăn túi để dễ dàng linh hoạt',350000,4,60,'Trẻ em','2024-05-17 12:43:10',1,0,1,'xxl',50,'Áo'),(34,'Chân váy len xoè','Zuýp len xòe dài trên gối. Cài bằng khóa kéo phía sau.',450000,4,80,'Trẻ em','2024-05-17 12:43:10',1,0,1,'xl',50,'Váy'),(35,'Chân váy jean trơn','Zuýp jean xòe dài trên gối. Cài bằng khóa kéo phía sau. Thể hiện tính cách năng động',320000,4,80,'Trẻ em','2024-05-17 12:43:10',1,0,1,'l',50,'Váy'),(36,'Quần dài bé trai thể thao','Chất liệu dày thoáng mát, năng động có hình ảnh đăng động',250000,4,80,'Trẻ em','2024-05-17 12:43:10',1,0,1,'l',50,'Quần'),(37,'Áo thun nam','Áo thun 3 lỗ thoáng, mắt vải to tạo sự thoáng mát',80000,5,300,'Nam','2024-05-17 12:43:10',0,1,1,'xxxl',50,'Áo'),(38,'Quần jean nam','Quần jean baggy nam Xanh RETRO ống rộng xuông cạp cao',300000,5,300,'Nam','2024-05-17 12:43:10',1,1,1,'xxl',50,'Quần'),(39,'Áo sơ mi nam','Áo Sơ Mi Nam DIOR Họa Tiết Monogram Begie',300000,5,300,'Nam','2024-05-17 12:43:10',1,1,1,'xxl',50,'Áo'),(40,'Quần tây nam','Quần tây nam Hàn Quốc baggy ống suông vải co giãn hàng xuất khẩu cao cấp',400000,4,200,'Nam','2024-05-17 12:43:10',1,1,1,'xl',50,'Quần'),(41,'Áo polo nam','Áo thun polo nam cổ bẻ YODY vải mắt chim tay ngắn thoáng mát',250000,4,100,'Nam','2024-05-17 12:43:10',1,1,1,'l',50,'Áo'),(42,'Quần kaki nam','Áo kaki nam lớn tuổi phóng cách lính cổ bẻ',200000,5,200,'Nam','2024-05-17 12:43:10',0,1,1,'l',50,'Quần'),(43,'Áo khoác nam','Áo khoác dù nam 2 lớp không nón chạy sọc cánh tay',400000,5,100,'Nam','2024-05-17 12:43:10',0,1,1,'xxxl',50,'Áo'),(44,'Quần jogger nam','Quần Jogger KaKi Nam VICENZO Cao Cấp Co Giãn Cạp Chun Bo',150000,5,250,'Nam','2024-05-17 12:43:10',1,1,1,'xxxl',50,'Quần'),(45,'Áo len nam','Áo khoác lông thỏ mịn dày dặn ấm áp',300000,5,200,'Nam','2024-05-17 12:43:10',1,1,1,'xl',50,'Áo'),(46,'Áo hoodie nam','Áo khoác nam mỏng thu đông STYLEMARVEN thiết kế mũ trùm in loang màu',150000,4,200,'Nam','2024-05-17 12:43:10',1,1,1,'xxl',50,'Áo');
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

-- Dump completed on 2024-05-17 20:06:14
