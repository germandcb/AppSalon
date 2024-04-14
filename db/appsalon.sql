CREATE DATABASE  IF NOT EXISTS `appsalon_mvc`;
USE `appsalon_mvc`;

--
-- Table structure for table `citas`
--
DROP TABLE IF EXISTS `citas`;

CREATE TABLE `citas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuarioId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `citasservicios`
--
DROP TABLE IF EXISTS `citasservicios`;
CREATE TABLE `citasservicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `citaId` int DEFAULT NULL,
  `servicioId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `citaId` (`citaId`),
  KEY `servicioId` (`servicioId`),
  CONSTRAINT `citasservicios_ibfk_3` FOREIGN KEY (`citaId`) REFERENCES `citas` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `citasservicios_ibfk_4` FOREIGN KEY (`servicioId`) REFERENCES `servicios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `citasservicios`
--
LOCK TABLES `citasservicios` WRITE;
/*!40000 ALTER TABLE `citasservicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `citasservicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `servicios`
--
LOCK TABLES `servicios` WRITE;
INSERT INTO `servicios` VALUES (1,'Corte de Cabello Mujer',90.00),(2,'Corte de Cabello Hombre',80.00),(3,'Corte de Cabello Niño',60.00),(4,'Peinado Mujer',80.00),(5,'Peinado Hombre',60.00),(6,'Peinado Niño',60.00),(7,'Corte de Barba',60.00),(8,'Tinte Mujer',300.00),(9,'Unñas',400.00),(10,'Lavado de Cabello',50.00),(11,'Tratamiento Capilar',80.00);
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `token` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--
LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Sara','Bulla','sara@sara.com','$2y$10$tXNb5C.R5RERryJ/PsSkd.uacyzPJb1rJI/TKZ68T9sMTVsMTdYde','2312321321',1,0,'653fccc8e4418');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
