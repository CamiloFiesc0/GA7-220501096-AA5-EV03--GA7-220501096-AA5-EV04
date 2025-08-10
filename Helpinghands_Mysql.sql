-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: helpinghands
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago` (
  `numfactura` int NOT NULL AUTO_INCREMENT,
  `metodopago` varchar(255) DEFAULT NULL,
  `estadopago` varchar(255) DEFAULT NULL,
  `valor` int DEFAULT NULL,
  `idservicio` int DEFAULT NULL,
  PRIMARY KEY (`numfactura`),
  KEY `_idx` (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (2,'Efectivo','aprobado',20000,1);
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicio` (
  `idasignado` int NOT NULL AUTO_INCREMENT,
  `estadoservicio` varchar(255) DEFAULT NULL,
  `distancia` varchar(255) DEFAULT NULL,
  `idsolicitud` int NOT NULL,
  PRIMARY KEY (`idasignado`),
  KEY `idsolicitud_idx` (`idsolicitud`) /*!80000 INVISIBLE */
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (2,'Listo','5km',2),(3,'critio','1km',1),(4,'abierto','10km',1);
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `prioridad` varchar(255) DEFAULT NULL,
  `pago` int DEFAULT NULL,
  `idusuario` int DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
INSERT INTO `solicitud` VALUES (14,'Nuevo trabajo','Bogotá','2025-07-24','alta',50000,1),(21,'Trabajo como desarrollador','calle75#110c01','24/07/2025','2',20000,1);
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `edad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (0,'','','','camilofiesc','',''),(1,'prueba','156185','prueba','camilo','',NULL),(2,'Camilo Fiesco','3195709902','calle75#110c-01','camilofiesco1@hotmail.es','cfiesco65','27'),(2020,'camilo','','','','',''),(5678,'cacs','','','','',''),(7777,'ca','1234567','werftghj','camilofiesco1@hotmail.es','','30'),(123456,'CAMILO','','','','',''),(191919,'prueba','123456','villas','camilo@gmail.com','1566888','12'),(191983,'',NULL,'','','',NULL),(202020,'prueba','123456','villas','camilo@gmail.com','1566888','12'),(666666,'Camilo Pruebas','1234567','calle75#110c01','camilofiesco1@hotmail.es','F13sc065$julio','28'),(7777777,'Juan jose sierra','1234567','calle75#110c01','camilofiesco1@hotmail.es','F13sc065$julio','28'),(88888888,'Camilo fiesco','1234567','calle75#110c01','camilofiesco1@hotmail.es','F13sc065$julio','28'),(123456897,'Camilo','24734','fgfgdgg','camilo@email.com','nnvndnvdf','21'),(888888888,'Camilo Fiesco Ruiz','3195709902','calle75N110 01','camilo.fiesco@hotmail.com','12345678','27'),(999999999,'camilo fiesco ','1234567','calle 71bis#21','camilofiesco1@hotmail.es','','26'),(1015415426,'prueba prueba','12345678','calle75c','camilofiesco@gmail.com','12345678','22'),(1234567666,'cc','','','','','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-27 23:20:06
