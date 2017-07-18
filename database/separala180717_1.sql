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
  `c_desc_cancha` varchar(45) DEFAULT NULL,
  `n_largo_cancha` decimal(6,2) DEFAULT NULL,
  `n_ancho_cancha` decimal(6,2) DEFAULT NULL,
  `n_num_jug_recomen` tinyint(4) DEFAULT NULL,
  `c_est_cancha` varchar(5) DEFAULT NULL,
  `c_color_cancha` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`n_cod_det_neg`),
  KEY `n_cod_neg_idx` (`n_cod_neg`),
  CONSTRAINT `n_cod_neg` FOREIGN KEY (`n_cod_neg`) REFERENCES `negocio` (`n_cod_neg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_canchas_negocio`
--

LOCK TABLES `d_canchas_negocio` WRITE;
/*!40000 ALTER TABLE `d_canchas_negocio` DISABLE KEYS */;
INSERT INTO `d_canchas_negocio` VALUES (1,1,'Plataforma A1',15.00,25.00,10,'12001','#9C27B0'),(2,1,'Plataforma B',15.00,25.00,10,'12001','#009688'),(3,1,'Plataforma C',20.00,35.00,12,'12001','#CDDC39'),(4,2,'Cancha 1',15.00,25.00,10,'12001','#4CAF50'),(5,2,'Cancha 2',15.00,25.00,10,'12001','#FF9800'),(6,2,'Cancha 3',20.00,35.00,12,'12001','#AAFFEE'),(7,3,'Plataforma 1',15.00,25.00,10,'12001','#9C27B0'),(8,3,'Plataforma 2',15.00,25.00,10,'12001','#4CAF50'),(9,3,'Plataforma 3',20.00,35.00,12,'12001','#AAFFEE'),(10,4,'Cancha A1',15.00,25.00,10,'12001','#232323'),(11,4,'Cancha B',15.00,25.00,10,'12001','#C4C4C4'),(12,4,'Cancha C',20.00,35.00,12,'12001','#ABABAB'),(13,5,'Cancha A',20.00,40.00,12,'12001','#5B5B5B');
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
  `d_fech_ini_even` datetime DEFAULT NULL,
  `d_fech_fin_even` datetime DEFAULT NULL,
  `c_color_even` varchar(7) DEFAULT NULL,
  `c_icon_even` varchar(10) DEFAULT NULL,
  `c_desc_even` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`n_cod_event`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deventos`
--

LOCK TABLES `deventos` WRITE;
/*!40000 ALTER TABLE `deventos` DISABLE KEYS */;
INSERT INTO `deventos` VALUES (8,2,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-21 13:30:00','2017-06-21 15:30:00','#9C27B0','fa-check','Descripcion del evento'),(9,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-22 19:45:00','2017-06-22 21:45:00','#009688','fa-check','Descripcion del evento'),(10,2,6,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-22 10:00:00','2017-06-22 12:00:00','#CDDC39','fa-check','Descripcion del evento'),(11,2,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-23 20:00:00','2017-06-23 22:00:00','#9C27B0','fa-check','Descripcion del evento'),(12,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-23 10:00:00','2017-06-23 13:00:00','#009688','fa-check','Descripcion del evento'),(13,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-24 18:00:00','2017-06-24 20:00:00','#9C27B0','fa-check','Descripcion del evento'),(14,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-22 16:15:00','2017-06-22 17:15:00','#009688','fa-check','Descripcion del evento'),(15,2,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-22 14:00:00','2017-06-22 18:00:00','#9C27B0','fa-check','Descripcion del evento'),(16,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-23 13:00:00','2017-06-23 15:00:00','#009688','fa-check','Descripcion del evento'),(17,2,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-22 11:15:00','2017-06-22 12:15:00','#9C27B0','fa-check','Descripcion del evento'),(18,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-20 20:15:00','2017-06-20 21:15:00','#009688','fa-check','Descripcion del evento'),(19,2,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-20 11:15:00','2017-06-20 12:15:00','#9C27B0','fa-check','Descripcion del evento'),(20,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-20 11:15:00','2017-06-20 12:15:00','#009688','fa-check','Descripcion del evento'),(21,2,6,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-15 08:15:00','2017-06-15 09:15:00','#CDDC39','fa-check','Descripcion del evento'),(22,2,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-13 20:30:00','2017-06-13 21:30:00','#9C27B0','fa-check','Descripcion del evento'),(23,2,6,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-14 20:45:00','2017-06-14 21:45:00','#CDDC39','fa-check','Descripcion del evento'),(24,2,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-23 12:00:00','2017-06-23 15:00:00','#009688','fa-check','Descripcion del evento'),(25,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-21 20:30:00','2017-06-21 21:30:00','#009688','fa-info','Descripcion del evento'),(26,2,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-21 19:30:00','2017-06-21 22:30:00','#AAFFEE','fa-lock','Descripcion del evento'),(27,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-22 22:45:00','2017-06-22 23:45:00','#AAFFEE','fa-warning','Descripcion del evento'),(28,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-22 10:45:00','2017-06-22 12:45:00','#AAFFEE','fa-check','Descripcion del evento'),(29,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-23 10:45:00','2017-06-23 13:45:00','#009688','fa-check','Descripcion del evento'),(30,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-23 10:45:00','2017-06-23 13:45:00','#009688','fa-warning','Descripcion del evento'),(31,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-23 10:45:00','2017-06-23 13:45:00','#CDDC39','fa-warning','Descripcion del evento'),(32,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-24 20:45:00','2017-06-24 22:45:00','#9C27B0','fa-check','Descripcion del evento'),(34,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13001','2017-06-30 14:30:00','2017-06-30 16:30:00','#009688','fa-check','prueba 1');
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
  `n_cod_prov` int(11) DEFAULT NULL,
  `c_est_prov` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`n_cod_dist`),
  KEY `n_cod_prov_idx` (`n_cod_prov`),
  CONSTRAINT `n_cod_prov` FOREIGN KEY (`n_cod_prov`) REFERENCES `provincias` (`n_cod_prov`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distritos`
--

LOCK TABLES `distritos` WRITE;
/*!40000 ALTER TABLE `distritos` DISABLE KEYS */;
INSERT INTO `distritos` VALUES (1,'Alto Selva Alegre',1,'14001'),(2,'Arequipa',1,'14001'),(3,'Cayma',1,'14001'),(4,'Cerro Colorado',1,'14001'),(5,'Characato',1,'14002'),(6,'Chiguata',1,'14002'),(7,'Jacobo Hunter',1,'14002'),(8,'José Luis Bustamante y River',1,'14002'),(9,'La Joya',1,'14002'),(10,'Mariano Melgar',1,'14002'),(11,'Miraflores',1,'14001'),(12,'Mollebaya',1,'14002'),(13,'Paucarpata',1,'14001'),(14,'Pocsi',1,'14002'),(15,'Polobaya',1,'14002'),(16,'Quequeña',1,'14002'),(17,'Sabandía',1,'14001'),(18,'Sachaca',1,'14001'),(19,'Socabaya',1,'14001'),(20,'Tiabaya',1,'14001'),(21,'Uchumayo',1,'14001'),(22,'Vítor',1,'14002'),(23,'Yanahuara',1,'14001'),(24,'Yarabamba',1,'14002'),(25,'Yura',1,'14002');
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
  `c_url_img` varchar(200) DEFAULT NULL,
  `c_est_neg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`n_cod_neg`),
  KEY `n_cod_dist_idx` (`n_cod_dist`),
  CONSTRAINT `n_cod_dist` FOREIGN KEY (`n_cod_dist`) REFERENCES `distritos` (`n_cod_dist`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `negocio`
--

LOCK TABLES `negocio` WRITE;
/*!40000 ALTER TABLE `negocio` DISABLE KEYS */;
INSERT INTO `negocio` VALUES (1,'Negocio 1','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.373064,-71.56145,1,1,50.00,80.00,10,0,24,0,4,'http://sngperu.pe/wp-content/uploads/2013/07/Canchas-de-grass-sint%C3%A9tico-1-550x220.jpg','11001'),(2,'Negocio 2','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.360104,-71.562147,1,0,50.00,80.00,10,0,24,0,4,'http://www.grass-sintetico-peru.com/images/slides/slide3_b.jpg','11001'),(3,'Negocio 3','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.376942,-71.525489,1,1,50.00,80.00,10,0,24,0,1,'http://www.elcentenariodesanborja.com/img/cancha01.gif','11001'),(4,'Negocio 4','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.379705,-71.520086,0,1,50.00,80.00,10,0,24,0,1,'http://www.cespedelespartano.com/wp-content/uploads/2010/08/199569_1789321345125_1602356729_31693206_3426494_n.jpg','11001'),(5,'Negocio 5','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.395511,-71.523681,1,1,50.00,80.00,10,0,24,0,2,'http://www.cesped-sintetico-greenfields.com/wp-content/uploads/2016/06/cancha-cubierta-celeste.jpg','11001'),(6,'Negocio 6','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.397088,-71.530803,0,1,50.00,80.00,10,0,24,0,2,'http://4.bp.blogspot.com/-pxGrtZN8Dnw/UvqacjDStzI/AAAAAAAAARg/oqp26sOr2_g/s1600/INTERIOR+CANCHA+1.jpg','11001'),(7,'Negocio 7','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.402992,-71.531846,1,0,50.00,80.00,10,0,24,0,2,'http://miaviso.pe/images/2016/05/27/20174/venta-de-grass-sintetico-para-futbol-en-cusco_1.jpg','11001'),(8,'Negocio 8','104606678','054-343536','Jr. pasco 346',3,'Jose Jimenez','976453423',-16.36518,-71.545639,1,1,50.00,80.00,10,0,24,0,3,'http://images.locanto.com.pe/1975141533/POR-OCASION-GRAN-OPORTUNIDAD-SE-VENDE-CANCHA-DE-GRASS-SINTETICO_6.jpg','11001');
/*!40000 ALTER TABLE `negocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_usuario_negocio`
--

DROP TABLE IF EXISTS `p_usuario_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p_usuario_negocio` (
  `n_cod_usuneg` int(11) NOT NULL AUTO_INCREMENT,
  `n_cod_usu` int(11) DEFAULT NULL,
  `n_cod_neg` int(11) DEFAULT NULL,
  PRIMARY KEY (`n_cod_usuneg`),
  KEY `n_cod_neg_idx` (`n_cod_neg`),
  CONSTRAINT `fk_n_cod_neg` FOREIGN KEY (`n_cod_neg`) REFERENCES `negocio` (`n_cod_neg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_usuario_negocio`
--

LOCK TABLES `p_usuario_negocio` WRITE;
/*!40000 ALTER TABLE `p_usuario_negocio` DISABLE KEYS */;
INSERT INTO `p_usuario_negocio` VALUES (1,1,1),(2,2,1);
/*!40000 ALTER TABLE `p_usuario_negocio` ENABLE KEYS */;
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
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `n_cod_prov` int(11) NOT NULL AUTO_INCREMENT,
  `c_nom_prov` varchar(45) DEFAULT NULL,
  `c_est_prov` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`n_cod_prov`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Arequipa','14001'),(2,'Puno','14001');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
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
INSERT INTO `usuarios` VALUES (1,'Cesar','Palo','23456788','987653434','DIreccion','usuario@correo.com','$2y$10$atQ.pzYUDi6Wq1Dn03BV7.Nta4dLK5de3MFyn0BlxSrJVWcH8d8hm','6cCYPC6bFKngpVM7adXQUTZHcTgmicKVbjtkT2bpA6SaV3GDNqyxR6ysdnwo','2017-06-07 22:48:24','2017-06-21 21:48:05');
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
select * from negocio where c_est_neg = '11001';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `paa_listarCanchasNegocio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `paa_listarCanchasNegocio`()
BEGIN
select * from d_canchas_negocio where c_est_cancha = "12001";
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

/*select e.n_cod_usu AS 'title', DATE(NOW()) AS 'start', e.n_cod_event AS 'description' 
from deventos e where n_cod_neg  = pa_nCodNeg;*/
select ev.n_cod_event id,ev.n_cod_neg, ev.n_cod_cancha ,CONCAT( dc.c_desc_cancha," - " ,ev.c_desc_even) title,ev.d_fech_ini_even start, ev.d_fech_fin_even end, dc.c_color_cancha color, ev.c_icon_even icon
 from deventos ev
 join d_canchas_negocio dc
 on ev.n_cod_cancha = dc.n_cod_det_neg
 where ev.n_cod_neg = pa_nCodNeg;
 
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
/*!50003 DROP PROCEDURE IF EXISTS `pa_editarEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_editarEvento`(
pa_cod_event int,
pa_cod_neg int,
pa_cod_cancha int,
pa_cod_usu int,
pa_fech_ini_even datetime,
pa_fech_fin_even datetime,
pa_color_even varchar(7),
pa_icon_even varchar(10),
pa_est_even varchar(5))
BEGIN

UPDATE `deventos`
SET
`n_cod_neg` = pa_cod_neg,
`n_cod_cancha` = pa_cod_cancha,
`n_cod_usu` = pa_cod_usu,
`d_fech_ini_even` = pa_fech_ini_even,
`d_fech_fin_even` = pa_fech_fin_even,
`c_color_even` = pa_color_even,
`c_icon_even` = pa_icon_even,
`c_est_even` = pa_est_even
WHERE `n_cod_event` = pa_cod_event;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pa_insertarEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertarEvento`(
pa_cod_neg int,
pa_cod_cancha int,
pa_cod_usu int,
pa_anio_even int,
pa_mes_even int,
pa_dia_even int,
pa_hora_ini_even int,
pa_min_ini_even int,
pa_hora_fin_even int,
pa_min_fin_even int,
pa_est_even varchar(5)
)
BEGIN

INSERT INTO `separala_2`.`deventos`
(`n_cod_neg`,
`n_cod_cancha`,
`n_cod_usu`,
`n_anio_even`,
`n_mes_even`,
`n_dia_even`,
`n_hora_ini_even`,
`n_min_ini_even`,
`n_hora_fin_even`,
`n_min_fin_even`,
`c_est_even`)
VALUES
(
pa_cod_neg,
pa_cod_cancha,
pa_cod_usu,
pa_anio_even,
pa_mes_even,
pa_dia_even,
pa_hora_ini_even,
pa_min_ini_even,
pa_hora_fin_even,
pa_min_fin_even,
pa_est_even);


select * from separala_2.deventos where n_cod_neg = pa_cod_neg;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pa_insertarEvento2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertarEvento2`(
pa_cod_neg int,
pa_cod_cancha int,
pa_cod_usu int,
pa_fech_ini_even datetime,
pa_fech_fin_even datetime,
pa_color_even varchar(7),
pa_icon_even varchar(10),
pa_est_even varchar(5),
pa_desc_even varchar(120)
)
BEGIN

INSERT INTO deventos
(`n_cod_neg`,
`n_cod_cancha`,
`n_cod_usu`,
`d_fech_ini_even`,
`d_fech_fin_even`,
`c_color_even`,
`c_icon_even`,
`c_est_even`,
`c_desc_even`)


VALUES
(
pa_cod_neg,
pa_cod_cancha,
pa_cod_usu,
pa_fech_ini_even,
pa_fech_fin_even,
pa_color_even,
pa_icon_even,
pa_est_even,
pa_desc_even);

select * from deventos where n_cod_neg = pa_cod_neg;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pa_insertarSolicitud` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertarSolicitud`(
pa_c_nom_sol varchar(45),
pa_c_ape_sol varchar(45),
pa_c_dni_sol varchar(8),
pa_c_email_sol varchar(45),
pa_c_telef_sol varchar(9),
pa_c_est_sol varchar(5))
BEGIN
	insert into solicitudes
    (c_nom_sol,c_ape_sol,c_dni_sol,c_email_sol,c_telef_sol,c_est_sol) values
    (pa_c_nom_sol,pa_c_ape_sol,pa_c_dni_sol,pa_c_email_sol,pa_c_telef_sol,pa_c_est_sol);
    
    select concat(pa_c_nom_sol ,' ',pa_c_ape_sol) as nombres;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pa_obtenercanchas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_obtenercanchas`(id_usuario int)
BEGIN

select * from d_canchas_negocio where n_cod_neg = (select n_cod_neg from p_usuario_negocio where n_cod_usu = id_usuario);

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
/*!50003 DROP PROCEDURE IF EXISTS `pa_obtenerEventoPorId` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_obtenerEventoPorId`(pa_cod_evento int)
BEGIN
		select  n_cod_event, n_cod_cancha,c_icon_even, date(d_fech_ini_even) fecha, DATE_FORMAT(d_fech_ini_even, '%H:%i') hora, DATE_FORMAT(TIMEDIFF(d_fech_fin_even,d_fech_ini_even),'%H') tiempo, c_desc_even from deventos where n_cod_event = pa_cod_evento;
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_obtenereventos`(pa_n_cod_usu int)
BEGIN
select ev.n_cod_event id,CONCAT( dc.c_desc_cancha," - " ,ev.c_desc_even) title,ev.d_fech_ini_even start, ev.d_fech_fin_even end, dc.c_color_cancha color, ev.c_icon_even icon
 from deventos ev
 join d_canchas_negocio dc
 on ev.n_cod_cancha = dc.n_cod_det_neg
 where ev.n_cod_neg = (select n_cod_neg from p_usuario_negocio where n_cod_usu = pa_n_cod_usu);
 /*
select n_cod_event id,c_desc_even title, d_fech_ini_even start, d_fech_fin_even end, c_color_even color, c_icon_even icon
 from deventos ev
 join d_canchas_negocio dc
 on ev.n_cod_cancha = dc.n_cod_det_neg
 where n_cod_neg = (select n_cod_neg from p_usuario_negocio where n_cod_usu = );*/
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

-- Dump completed on 2017-07-18  9:50:27
