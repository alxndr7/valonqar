-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: separala_2
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Cesar Admin','admin@correo.com','ADMINISTRADOR','$2y$10$49C0I2mlBCAiTbvbmu6VL.Vz09YRjeuhilJky.T1.yZkx.Q2bv6TK',NULL,NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_cli` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_nomb_cli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_ape_cli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_dni_cli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_telf_cli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_dir_cli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_est_cli` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cli`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_canchas_negocio`
--

DROP TABLE IF EXISTS `d_canchas_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_canchas_negocio` (
  `n_cod_det_neg` int(11) NOT NULL AUTO_INCREMENT,
  `n_cod_neg` int(11) DEFAULT NULL,
  `n_largo_cancha` decimal(6,2) DEFAULT NULL,
  `n_ancho_cancha` decimal(6,2) DEFAULT NULL,
  `n_num_jug_recomen` tinyint(4) DEFAULT NULL,
  `c_est_cancha` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`n_cod_det_neg`),
  KEY `n_cod_neg_idx` (`n_cod_neg`),
  CONSTRAINT `n_cod_neg` FOREIGN KEY (`n_cod_neg`) REFERENCES `negocio` (`n_cod_neg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_canchas_negocio`
--

LOCK TABLES `d_canchas_negocio` WRITE;
/*!40000 ALTER TABLE `d_canchas_negocio` DISABLE KEYS */;
INSERT INTO `d_canchas_negocio` VALUES (1,1,15.00,25.00,10,'12001'),(2,1,15.00,25.00,10,'12001'),(3,1,20.00,35.00,12,'12001'),(4,2,15.00,25.00,10,'12001'),(5,2,15.00,25.00,10,'12001'),(6,2,20.00,35.00,12,'12001'),(7,3,15.00,25.00,10,'12001'),(8,3,15.00,25.00,10,'12001'),(9,3,20.00,35.00,12,'12001'),(10,4,15.00,25.00,10,'12001'),(11,4,15.00,25.00,10,'12001'),(12,4,20.00,35.00,12,'12001');
/*!40000 ALTER TABLE `d_canchas_negocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deventos`
--

DROP TABLE IF EXISTS `deventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deventos` (
  `n_cod_event` int(11) NOT NULL AUTO_INCREMENT,
  `n_cod_neg` int(11) DEFAULT NULL,
  `n_cod_cancha` int(11) DEFAULT NULL,
  `n_cod_usu` int(11) DEFAULT NULL,
  `n_anio_even` int(11) DEFAULT NULL,
  `n_mes_even` int(11) DEFAULT NULL,
  `n_dia_even` int(11) DEFAULT NULL,
  `n_hora_ini_even` int(11) DEFAULT NULL,
  `n_min_ini_even` int(11) DEFAULT NULL,
  `n_hora_fin_even` int(11) DEFAULT NULL,
  `n_min_fin_even` int(11) DEFAULT NULL,
  `c_est_even` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`n_cod_event`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deventos`
--

LOCK TABLES `deventos` WRITE;
/*!40000 ALTER TABLE `deventos` DISABLE KEYS */;
INSERT INTO `deventos` VALUES (1,1,1,1,2017,6,15,10,0,12,0,'13001'),(2,1,2,1,2017,6,15,10,0,12,0,'13001'),(3,1,3,1,2017,6,15,11,0,13,0,'13001');
/*!40000 ALTER TABLE `deventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distritos`
--

DROP TABLE IF EXISTS `distritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distritos` (
  `n_cod_dist` int(11) NOT NULL AUTO_INCREMENT,
  `c_nom_dist` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`n_cod_dist`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distritos`
--

LOCK TABLES `distritos` WRITE;
/*!40000 ALTER TABLE `distritos` DISABLE KEYS */;
INSERT INTO `distritos` VALUES (1,'Alto Selva Alegre'),(2,'Arequipa'),(3,'Cayma'),(4,'Cerro Colorado'),(5,'Characato'),(6,'Chiguata'),(7,'Jacobo Hunter'),(8,'José Luis Bustamante y River'),(9,'La Joya'),(10,'Mariano Melgar'),(11,'Miraflores'),(12,'Mollebaya'),(13,'Paucarpata'),(14,'Pocsi'),(15,'Polobaya'),(16,'Quequeña'),(17,'Sabandía'),(18,'Sachaca'),(19,'Socabaya'),(20,'Tiabaya'),(21,'Uchumayo'),(22,'Vítor'),(23,'Yanahuara'),(24,'Yarabamba'),(25,'Yura');
/*!40000 ALTER TABLE `distritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_06_06_133545_create_Admins_table',1),(4,'2017_06_07_131821_create_clientes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `negocio`
--

DROP TABLE IF EXISTS `negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `negocio` (
  `n_cod_neg` int(11) NOT NULL AUTO_INCREMENT,
  `c_raz_soc_neg` varchar(100) DEFAULT NULL,
  `c_ruc_neg` varchar(11) DEFAULT NULL,
  `c_tel_neg` varchar(20) DEFAULT NULL,
  `c_dir_neg` varchar(45) DEFAULT NULL,
  `n_num_canchas` tinyint(1) DEFAULT NULL,
  `c_nom_rep_neg` varchar(70) DEFAULT NULL,
  `c_tel_rep_neg` varchar(9) DEFAULT NULL,
  `n_lat_neg` double DEFAULT NULL,
  `n_lon_neg` double DEFAULT NULL,
  `n_comida_neg` tinyint(4) DEFAULT NULL,
  `n_cochera_neg` tinyint(4) DEFAULT NULL,
  `n_prec_min` decimal(5,2) DEFAULT NULL,
  `n_prec_max` decimal(5,2) DEFAULT NULL,
  `t_hora_ini` int(11) DEFAULT NULL,
  `t_min_ini` int(11) DEFAULT NULL,
  `t_hora_fin` int(11) DEFAULT NULL,
  `t_min_fin` int(11) DEFAULT NULL,
  `n_cod_dist` int(11) DEFAULT NULL,
  `c_url_img` varchar(100) DEFAULT NULL,
  `c_est_neg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`n_cod_neg`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `negocio`
--

LOCK TABLES `negocio` WRITE;
/*!40000 ALTER TABLE `negocio` DISABLE KEYS */;
INSERT INTO `negocio` VALUES (1,'Negocio 1','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.373064,-71.56145,1,1,50.00,80.00,10,0,24,0,4,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001'),(2,'Negocio 2','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.360104,-71.562147,1,0,50.00,80.00,10,0,24,0,4,'http://www.grass-sintetico-peru.com/images/slides/slide3_b.jpg','11001'),(3,'Negocio 3','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.376942,-71.525489,1,1,50.00,80.00,10,0,24,0,1,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001'),(4,'Negocio 4','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.379705,-71.520086,0,1,50.00,80.00,10,0,24,0,1,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001'),(5,'Negocio 5','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.395511,-71.523681,1,1,50.00,80.00,10,0,24,0,2,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001'),(6,'Negocio 6','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.397088,-71.530803,0,1,50.00,80.00,10,0,24,0,2,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001'),(7,'Negocio 7','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.402992,-71.531846,1,0,50.00,80.00,10,0,24,0,2,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001'),(8,'Negocio 8','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.36518,-71.545639,1,1,50.00,80.00,10,0,24,0,3,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001');
/*!40000 ALTER TABLE `negocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `id_sol` int(11) NOT NULL AUTO_INCREMENT,
  `c_nom_sol` varchar(45) DEFAULT NULL,
  `c_ape_sol` varchar(45) DEFAULT NULL,
  `c_dni_sol` varchar(8) DEFAULT NULL,
  `c_email_sol` varchar(45) DEFAULT NULL,
  `c_telef_sol` varchar(9) DEFAULT NULL,
  `c_est_sol` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_sol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (1,'Jorge','Rodriguez','12345678','rod@correo.com','987563412','11001'),(2,'Jorge2','Rodriguez2','12345678','rod2@correo.com','987563412','11001'),(3,'Cesar','Palo','12435465','cesar@correo.com','978675645','11001'),(4,'Cesar','Palo','12435465','cesar@correo.com','978675645','11001'),(5,'Cesar','Palo','12435465','cesar@correo.com','978675645','11001'),(6,'Cesar2','Palo2','12435465','cesar@correo.com','978675645','11001'),(7,'Cesar Alexander','Palo  Luque','12435465','cesar@correo.com','978675645','11001'),(8,'Luis','Malaga','56677889','luis@correo.com','956453423','11001'),(9,'Luis','Malaga','56677889','luis@correo.com','956453423','11001');
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_nom_usu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_ape_usu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_dni_usu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_telef_usu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_dir_usu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Cesar','Palo','23456788','987653434','DIreccion','usuario@correo.com','$2y$10$atQ.pzYUDi6Wq1Dn03BV7.Nta4dLK5de3MFyn0BlxSrJVWcH8d8hm','YjOmCUk5LpveuYEV5gCcVOCG9qRuVQaPtDwEOQYSZk5pdoXeE8UKxxvANrIy','2017-06-07 22:48:24','2017-06-13 07:14:27');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'separala_2'
--
/*!50003 DROP PROCEDURE IF EXISTS `paa_listarCanchas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `paa_listarCanchas`()
BEGIN
select * from negocio where c_est_neg = '20001';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `paa_obtenerCanchasPorDistrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `paa_obtenerCanchasPorDistrito`(pa_nCodDist int)
BEGIN

select *  from negocio 
where cEstNeg  = '20001' and nCodDist = pa_nCodDist;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `paa_obtenereventos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `paa_obtenereventos`(pa_nCodNeg int)
BEGIN
select e.n_cod_usu AS 'title', DATE(NOW()) AS 'start', e.n_cod_event AS 'description'  from deventos e where n_cod_neg  = pa_nCodNeg;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `paa_obtenerUbiCancha` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `paa_obtenerUbiCancha`(pa_nCodNeg int)
BEGIN
select n_lat_neg,n_lon_neg from negocio where n_cod_neg = pa_nCodNeg;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pa_obtenerdistritos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_obtenerdistritos`()
BEGIN
select * from distritos;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pa_obtenereventos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_obtenereventos`(pa_n_cod_neg int)
BEGIN

select "Nombre" title, now() start, INTERVAL 1 DAY + now() end   from deventos where n_cod_neg = pa_n_cod_neg;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-14 20:35:44
