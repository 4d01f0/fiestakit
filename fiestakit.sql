-- MySQL dump 10.13  Distrib 5.1.28-rc, for apple-darwin9.4.0 (i686)
--
-- Host: localhost    Database: fiestakit
-- ------------------------------------------------------
-- Server version	5.1.28-rc

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `categoria` (
  `categoria_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria_nombre` varchar(255) NOT NULL DEFAULT '',
  `categoria_fcreacion` date DEFAULT NULL,
  `categoria_fmodificacion` date DEFAULT NULL,
  `categoria_idusuario` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`categoria_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `estado` (
  `estado_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado_nombre` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`estado_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (2,'Aguascalientes'),(3,'Baja California'),(4,'Baja California Sur'),(5,'Chiapas'),(6,'Chihuahua'),(7,'Coahuila'),(8,'Colima'),(9,'Distrito Federal'),(10,'Durango'),(11,'Guanajuato'),(12,'Guerrero'),(13,'Hidalgo'),(14,'Jalisco'),(15,'Michoacán'),(16,'Morelos'),(17,'Estado de México'),(18,'Nayarit'),(19,'Nuevo León'),(20,'Oaxaca'),(21,'Puebla'),(22,'Querétaro'),(23,'Quintana Roo'),(24,'San Luis Potosí'),(25,'Sinalos'),(26,'Sonora'),(27,'Tabasco'),(28,'Tamaulipas'),(29,'Tlaxcala'),(30,'Veracruz'),(31,'Yucatán'),(32,'Zacatecas');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `fotos` (
  `fotos_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fotos_idnegocio` varchar(255) NOT NULL DEFAULT '',
  `fotos_path` varchar(100) NOT NULL DEFAULT '',
  `fotos_url` varchar(100) NOT NULL DEFAULT '',
  `fotos_fcreacion` date DEFAULT NULL,
  `fotos_fmodificacion` date DEFAULT NULL,
  `fotos_idusuario` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fotos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `log` (
  `log_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `log_descripcion` varchar(255) NOT NULL DEFAULT '',
  `log_fcreacion` date DEFAULT NULL,
  `log_fmodificacion` date DEFAULT NULL,
  `log_idusuario` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `negocio`
--

DROP TABLE IF EXISTS `negocio`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `negocio` (
  `negocio_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `negocio_nombre` varchar(255) NOT NULL DEFAULT '',
  `negocio_email` varchar(100) NOT NULL DEFAULT '',
  `negocio_pagweb` varchar(100) NOT NULL DEFAULT '',
  `negocio_tel1` varchar(30) NOT NULL DEFAULT '',
  `negocio_tel2` varchar(30) NOT NULL DEFAULT '',
  `negocio_fax` varchar(30) NOT NULL DEFAULT '',
  `negocio_iddir` bigint(20) unsigned NOT NULL DEFAULT '0',
  `negocio_direccion` varchar(255) NOT NULL DEFAULT '',
  `negocio_idcat` bigint(20) unsigned NOT NULL DEFAULT '0',
  `negocio_logo` varchar(255) NOT NULL DEFAULT '',
  `negocio_descripcion1` varchar(255) NOT NULL DEFAULT '',
  `negocio_descripcion2` varchar(255) NOT NULL DEFAULT '',
  `negocio_idpaq` bigint(20) unsigned NOT NULL DEFAULT '0',
  `negocio_fcreacion` date DEFAULT NULL,
  `negocio_fmodificacion` date DEFAULT NULL,
  `negocio_idusuario` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`negocio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `negocio`
--

LOCK TABLES `negocio` WRITE;
/*!40000 ALTER TABLE `negocio` DISABLE KEYS */;
/*!40000 ALTER TABLE `negocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquete`
--

DROP TABLE IF EXISTS `paquete`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `paquete` (
  `paquete_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `paquete_numfotos` varchar(255) NOT NULL DEFAULT '',
  `paquete_especial` tinyint(2) NOT NULL DEFAULT '0',
  `paquete_resalte` tinyint(2) NOT NULL DEFAULT '0',
  `paquete_banner` tinyint(2) NOT NULL DEFAULT '0',
  `paquete_precio` double(10,1) NOT NULL DEFAULT '0.0',
  `paquete_fcreacion` date DEFAULT NULL,
  `paquete_fmodificacion` date DEFAULT NULL,
  PRIMARY KEY (`paquete_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `paquete`
--

LOCK TABLES `paquete` WRITE;
/*!40000 ALTER TABLE `paquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietario`
--

DROP TABLE IF EXISTS `propietario`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `propietario` (
  `propietario_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `propietario_idnegocio` bigint(20) unsigned NOT NULL DEFAULT '0',
  `propietario_fcreacion` date DEFAULT NULL,
  `propietario_fmodificacion` date DEFAULT NULL,
  PRIMARY KEY (`propietario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `propietario`
--

LOCK TABLES `propietario` WRITE;
/*!40000 ALTER TABLE `propietario` DISABLE KEYS */;
/*!40000 ALTER TABLE `propietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `usuario` (
  `usuario_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_login` varchar(255) NOT NULL DEFAULT '',
  `usuario_passwd` varchar(255) NOT NULL DEFAULT '',
  `usuario_nombre` varchar(255) NOT NULL DEFAULT '',
  `usuario_appaterno` varchar(255) NOT NULL DEFAULT '',
  `usuario_apmaterno` varchar(255) NOT NULL DEFAULT '',
  `usuario_email` varchar(100) NOT NULL DEFAULT '',
  `usuario_telefono1` varchar(30) NOT NULL DEFAULT '',
  `usuario_telefono2` varchar(30) NOT NULL DEFAULT '',
  `usuario_fcreacion` date DEFAULT NULL,
  `usuario_fmodificacion` date DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
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

-- Dump completed on 2009-01-10  2:18:53
