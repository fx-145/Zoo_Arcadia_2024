-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: zoo_arcadia
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrateur'),(2,'employe'),(3,'veterinaire');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` char(36) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` char(36) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_user_role` (`role_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('1df17562-35f1-11ef-8089-00ce39d0e2bd','admin@mail.fr','$2y$10$BxYMiPZZaXE168twQ3QvFewRKgjYMPVZfdvzP153uC0P8SHeb6qYG'),('3b2b55a0-2d5b-4669-bb0b-ffcc00338b73','joe3@mail.fr','$2y$10$lQQJYH.fREVZlRtHTCf5geuC3lJOl3.18mKVdf/Qh1WBVCV4LKlLW'),('6e0706ef-f509-4d06-ad23-175a2e830833','joe1@mail.fr','$2y$10$KfY75yu.jSst5HGo7V3oN.B8hhT6ejj9wfFpRcDKwmOqcemr0dtlW'),('cc52c759-103c-4c71-a4c0-1c0d543e396b','joe2@mail.fr','$2y$10$0J2Jn6SEc09asVcgV2oS8.0iA5bTSZtp7adxXCotvtkn5/rhb8yU.');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES ('1df17562-35f1-11ef-8089-00ce39d0e2bd',1),('3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',3),('6e0706ef-f509-4d06-ad23-175a2e830833',1),('cc52c759-103c-4c71-a4c0-1c0d543e396b',2);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;




--
-- Table structure for table `vet_passages`
--
--
-- Table structure for table `homes`
--

DROP TABLE IF EXISTS `homes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homes` (
  `home_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_name` varchar(255) NOT NULL,
  `home_description` varchar(2000) NOT NULL,
  PRIMARY KEY (`home_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Table structure for table `animal_pictures`
--

--
-- Dumping data for table `homes`
--

LOCK TABLES `homes` WRITE;
/*!40000 ALTER TABLE `homes` DISABLE KEYS */;
INSERT INTO `homes` VALUES (1,'La Savane','La savane est un ecosysteme unique et diversifie qui se caracterise par ses vastes plaines herbeuses parsemees d\'arbres clairsemes, tels que les acacias et les baobabs. Ce paysage distinctif est le resultat d\'une interaction complexe entre le climat, le sol et la vegetation, offrant un habitat ideal pour une grande variete de faune et de flore'),(2,'La Jungle','La jungle abrite une incroyable diversite d\'especes animales et vegetales. On y trouve des mammiferes, des oiseaux, des reptiles, des amphibiens, des poissons et d\'innombrables insectes'),(3,'Le Marais','Il offre un habitat crucial pour de nombreuses especes et joue un role important dans les cycles de l eau et des nutriments.');
/*!40000 ALTER TABLE `homes` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `animal_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal_pictures` (
  `animal_picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_picture_path` varchar(255) DEFAULT NULL,
  `animal_id` int(11) NOT NULL,
  PRIMARY KEY (`animal_picture_id`),
  KEY `fk_animalpicture` (`animal_id`),
  CONSTRAINT `fk_animalpicture` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal_pictures`
--

LOCK TABLES `animal_pictures` WRITE;
/*!40000 ALTER TABLE `animal_pictures` DISABLE KEYS */;
INSERT INTO `animal_pictures` VALUES (1,'public/images/animaux/SA_Georges.jpg',1),(2,'public/images/animaux/SA_Melman.jpg',2),(3,'public/images/animaux/SA_TopGun.jpg',3),(4,'public/images/animaux/JU_Arthur.jpg',4),(5,'public/images/animaux/JU_Ernest.jpg',5),(6,'public/images/animaux/JU_John.jpg',6),(7,'public/images/animaux/JU_Miguel.jpg',7),(8,'public/images/animaux/JU_Gilbert.jpg',8),(9,'public/images/animaux/JU_Po.jpg',9),(10,'public/images/animaux/JU_Sherkan.jpg',10),(11,'public/images/animaux/JU_Wladimir.jpg',11),(15,'public/images/animaux/MA_Roger.jpg',12),(16,'public/images/animaux/MA_Roger2.jpg',12),(17,'public/images/animaux/MA_Marcel.jpg',13),(18,'public/images/animaux/MA_Marcel2.jpg',13),(19,'public/images/animaux/MA_Edwige.jpg',14),(20,'public/images/animaux/MA_Robert.jpg',15);
/*!40000 ALTER TABLE `animal_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_name` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `home_id` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`),
  KEY `fk_animals` (`home_id`),
  CONSTRAINT `fk_animals` FOREIGN KEY (`home_id`) REFERENCES `homes` (`home_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (1,'Georges','Lion',1),(2,'Melman','Girafe',1),(3,'TopGun','Rhinoceros',1),(4,'Arthur','Gorille',2),(5,'Ernest','Suricate',2),(6,'John','Chimpanze',2),(7,'Miguel','Gorille',2),(8,'Gilbert','Lemurien',2),(9,'Po','Panda',2),(10,'Sherkan','Tigre',2),(11,'Wladimir','Singe',2),(12,'Roger','Raton laveur',3),(13,'Marcel','Perroquet',3),(14,'Edwige','Grue',3),(15,'Robert','Crocodile',3);
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_passages`
--

DROP TABLE IF EXISTS `employee_passages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_passages` (
  `employee_passage_id` int(11) NOT NULL AUTO_INCREMENT,
  `given_type_of_food` varchar(255) NOT NULL,
  `given_food_weight` decimal(6,2) NOT NULL,
  `employee_passage_date_time` datetime NOT NULL,
  `user_id` char(36) NOT NULL,
  `animal_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_passage_id`),
  KEY `fk_emp_passage_one` (`user_id`),
  KEY `fk_emp_passage_two` (`animal_id`),
  CONSTRAINT `fk_emp_passage_one` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `fk_emp_passage_two` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_passages`
--

LOCK TABLES `employee_passages` WRITE;
/*!40000 ALTER TABLE `employee_passages` DISABLE KEYS */;
INSERT INTO `employee_passages` VALUES (1,'poulet',2.00,'2024-07-07 19:59:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',4),(2,'insectes',2.50,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',5),(3,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(4,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(5,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(6,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(7,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(8,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(9,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(10,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(11,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(12,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(13,'boeuf',5.00,'2024-07-07 20:55:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',1),(14,'bananes',2.00,'2024-07-08 15:06:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',4),(15,'bananes',2.00,'2024-07-11 15:00:00','cc52c759-103c-4c71-a4c0-1c0d543e396b',4);
/*!40000 ALTER TABLE `employee_passages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_pictures`
--

DROP TABLE IF EXISTS `home_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_pictures` (
  `home_picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_picture_path` varchar(255) DEFAULT NULL,
  `home_id` int(11) NOT NULL,
  PRIMARY KEY (`home_picture_id`),
  UNIQUE KEY `home_picture_path` (`home_picture_path`),
  KEY `fk_homepicture` (`home_id`),
  CONSTRAINT `fk_homepicture` FOREIGN KEY (`home_id`) REFERENCES `homes` (`home_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_pictures`
--

LOCK TABLES `home_pictures` WRITE;
/*!40000 ALTER TABLE `home_pictures` DISABLE KEYS */;
INSERT INTO `home_pictures` VALUES (1,'public/images/habitats/SA_01.jpg',1),(2,'public/images/habitats/SA_02.jpg',1),(3,'public/images/habitats/JU_01.jpg',2),(4,'public/images/habitats/JU_02.jpg',2),(5,'public/images/habitats/MA_01.jpg',3),(6,'public/images/habitats/MA_02.jpg',3);
/*!40000 ALTER TABLE `home_pictures` ENABLE KEYS */;
UNLOCK TABLES;




--
-- Table structure for table `opening_hours`
--

DROP TABLE IF EXISTS `opening_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opening_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_day` varchar(20) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opening_hours`
--

LOCK TABLES `opening_hours` WRITE;
/*!40000 ALTER TABLE `opening_hours` DISABLE KEYS */;
INSERT INTO `opening_hours` VALUES (1,'lundi','09:02:00','17:00:00'),(2,'mardi','09:00:00','17:12:00'),(3,'mercredi','09:00:00','17:00:00'),(4,'jeudi','09:00:00','17:00:00'),(5,'vendredi','09:00:00','17:00:00'),(6,'samedi','09:00:00','17:00:00'),(7,'dimanche','09:00:00','17:00:00');
/*!40000 ALTER TABLE `opening_hours` ENABLE KEYS */;
UNLOCK TABLES;





--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `service_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Visite du zoo en petit train','Ce petit train est concu pour offrir une experience de voyage agreable dans le zoo, avec des sieges confortables et des compartiments ouverts pour une meilleure vue en toute securite'),(2,'Restauration','Le zoo dispose d un nouveau restaurant panoramique qui satisfera vos papilles'),(3,'Visite des habitats avec un guide','Cette prestation totalement gratuite vous permettra d en savoir beaucoup plus sur les animaux et leur vie au zoo');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `vet_passages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vet_passages` (
  `vet_passage_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_of_food_proposal` varchar(255) NOT NULL,
  `food_weight_proposal` float NOT NULL,
  `vet_passage_date` date NOT NULL,
  `animal_condition` varchar(255) NOT NULL,
  `animal_condition_detail` varchar(255) DEFAULT NULL,
  `home_condition` varchar(255) DEFAULT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` char(36) NOT NULL,
  `home_id` int(11) NOT NULL,
  PRIMARY KEY (`vet_passage_id`),
  KEY `fk_vet_passage_one` (`user_id`),
  KEY `fk_vet_passage_two` (`animal_id`),
  KEY `fk_vet_passage_three` (`home_id`),
  CONSTRAINT `fk_vet_passage_one` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `fk_vet_passage_three` FOREIGN KEY (`home_id`) REFERENCES `homes` (`home_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_vet_passage_two` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vet_passages`
--

LOCK TABLES `vet_passages` WRITE;
/*!40000 ALTER TABLE `vet_passages` DISABLE KEYS */;
INSERT INTO `vet_passages` VALUES (3,'moustiques',10,'2024-07-08','good','bon bon','correct',8,'3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',3),(4,'bananes',10,'2024-07-08','medium','ok moyen','correct',6,'3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',2),(5,'fruits',7,'2024-07-08','good','ok','├ºa va',2,'3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',1),(6,'lotus',8,'2024-07-08','verygood','mange bien','frais',9,'3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',3),(7,'lotus',8,'2024-07-08','verygood','mange bien','frais',9,'3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',3),(8,'bananes',9.5,'2024-07-08','verygood','ok','super',6,'3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',2),(9,'bananes',7,'2024-07-08','good','cool','zehr gut',4,'3b2b55a0-2d5b-4669-bb0b-ffcc00338b73',2);
/*!40000 ALTER TABLE `vet_passages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor_opinions`
--

DROP TABLE IF EXISTS `visitor_opinions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor_opinions` (
  `opinion_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `opinion` text NOT NULL,
  `status` enum('pending','ok','ko') DEFAULT 'pending',
  PRIMARY KEY (`opinion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor_opinions`
--

LOCK TABLES `visitor_opinions` WRITE;
/*!40000 ALTER TABLE `visitor_opinions` DISABLE KEYS */;
INSERT INTO `visitor_opinions` VALUES (1,'Martin','Tr├¿s beau zoo','ok'),(2,'Roger','Superbe zoo','ko'),(3,'supermariokart','avis sur le zoo','ko'),(4,'jumbo 1','superbe ce zoo, belle ballade en famille','ok'),(5,'jumbo 2','magnifique!','ok'),(6,'jumbo 4','magnifique ce super zoo','ok'),(7,'jumbo 12','perfect','ko'),(8,'jumbo 13','perfect zoo','ko'),(9,'jumbo 14','perfect zoooo','ko'),(10,'Tarzan','belle jungle','ok');
/*!40000 ALTER TABLE `visitor_opinions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-15 11:24:11
