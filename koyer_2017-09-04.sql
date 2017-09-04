# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.31)
# Base de datos: koyer
# Tiempo de Generación: 2017-09-04 19:25:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id_categoria` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) DEFAULT '',
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;

INSERT INTO `categorias` (`id_categoria`, `categoria`, `c_date`, `estado`)
VALUES
	(1,'Sedan','2017-08-03 17:14:40',1),
	(2,'Pick up 4x4','2017-08-03 17:14:55',1),
	(3,'Suv 4X4','2017-08-03 17:15:07',1),
	(4,'Suv 4x4 - 7 pasajeros','2017-08-03 17:15:42',1),
	(5,'Van Pasajeros','2017-08-03 17:19:44',1),
	(6,'Suv','2017-08-03 17:19:55',1),
	(7,'Camionssss','2017-08-03 20:45:38',0);

/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla clientes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id_cliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rut` int(11) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `fecha_nacimiento` timestamp NULL DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `telefono` int(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;

INSERT INTO `clientes` (`id_cliente`, `rut`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `ciudad`, `pais`, `telefono`, `email`, `fecha_registro`)
VALUES
	(1,194241267,'Alejandro','Vargas','1996-11-07 00:00:00','Guillermo Wallace 0273','Punta Arenas','Chile',997300915,'ale_seba_vargas@hotmail.com','2017-08-19 17:53:23'),
	(2,85462557,'Henrique','Galvez','1978-01-24 00:00:00','Av. España 032','Punta Arenas','Chile',984571265,'h.galvez@gmail.com','2017-08-19 17:55:40'),
	(5,70211517,'Sebastian','Pantoja',NULL,'guillermo wallace 0371','Punta Arenas','Chile',987654321,'sebastian.sp@hotmail.com','2017-09-04 12:27:39'),
	(6,70211517,'Guillermo','Estrada',NULL,'guillermo wallace 0371','Puerto Natales','Chile',987654321,'guilleeeg@hotmail.com','2017-09-04 12:29:10'),
	(7,70211517,'Joaquin','Urbina',NULL,'Capitan guillermo 456','Punta arenas','Chile',987654321,'guilleeeg@hotmail.com','2017-09-04 12:30:32'),
	(9,70211517,'Martine ','van Aarle',NULL,'3148 School Street','New Haven','Holanda',987654321,'martinevanAarle@gustr.com','2017-09-04 12:34:30');

/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla combustibles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `combustibles`;

CREATE TABLE `combustibles` (
  `id_combustible` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `combustible` varchar(40) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `combustibles` WRITE;
/*!40000 ALTER TABLE `combustibles` DISABLE KEYS */;

INSERT INTO `combustibles` (`id_combustible`, `combustible`, `c_date`, `estado`)
VALUES
	(1,'Gasolina','2017-08-03 16:17:31',1),
	(2,'Diesel','2017-08-03 16:17:39',1),
	(3,'Electrico','2017-08-03 20:44:59',0);

/*!40000 ALTER TABLE `combustibles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla estados_arriendos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `estados_arriendos`;

CREATE TABLE `estados_arriendos` (
  `id_estado_arriendo` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `estado_arriendo` varchar(20) DEFAULT '',
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_estado_arriendo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `estados_arriendos` WRITE;
/*!40000 ALTER TABLE `estados_arriendos` DISABLE KEYS */;

INSERT INTO `estados_arriendos` (`id_estado_arriendo`, `estado_arriendo`, `estado`)
VALUES
	(1,'Disponible',1),
	(2,'En arriendo',1);

/*!40000 ALTER TABLE `estados_arriendos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla estados_pagos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `estados_pagos`;

CREATE TABLE `estados_pagos` (
  `id_estado_pago` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `estado_pago` varchar(30) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_estado_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `estados_pagos` WRITE;
/*!40000 ALTER TABLE `estados_pagos` DISABLE KEYS */;

INSERT INTO `estados_pagos` (`id_estado_pago`, `estado_pago`, `estado`)
VALUES
	(1,'Pagado',1),
	(2,'Cancelado',1);

/*!40000 ALTER TABLE `estados_pagos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla extras
# ------------------------------------------------------------

DROP TABLE IF EXISTS `extras`;

CREATE TABLE `extras` (
  `id_extra` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `extra` varchar(40) DEFAULT NULL,
  `precio` int(7) DEFAULT NULL,
  `stock` int(2) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_extra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `extras` WRITE;
/*!40000 ALTER TABLE `extras` DISABLE KEYS */;

INSERT INTO `extras` (`id_extra`, `extra`, `precio`, `stock`, `c_date`, `estado`)
VALUES
	(1,'Bidón de 20 litros',5000,5,'2017-09-03 19:23:42',1),
	(2,'Silla para bebe',4000,50,'2017-09-03 19:23:59',1),
	(3,'Permiso Internacional para Argentina',75000,10,'2017-09-03 19:25:38',1),
	(4,'Bidon de 30 lts',10000,NULL,'2017-09-03 20:26:14',0);

/*!40000 ALTER TABLE `extras` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla extras_reservas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `extras_reservas`;

CREATE TABLE `extras_reservas` (
  `id_extra_reserva` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_vehiculo` int(3) DEFAULT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  `cantidad` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_extra_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla impuestos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `impuestos`;

CREATE TABLE `impuestos` (
  `id_impuesto` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `impuesto` varchar(20) DEFAULT NULL,
  `valor` int(3) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_impuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `impuestos` WRITE;
/*!40000 ALTER TABLE `impuestos` DISABLE KEYS */;

INSERT INTO `impuestos` (`id_impuesto`, `impuesto`, `valor`, `c_date`, `estado`)
VALUES
	(1,'IVA',19,'2017-08-15 18:24:46',1),
	(2,'A jano',10,'2017-08-27 20:27:34',0);

/*!40000 ALTER TABLE `impuestos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla locaciones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locaciones`;

CREATE TABLE `locaciones` (
  `id_locacion` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `locacion` varchar(40) DEFAULT NULL,
  `id_pais` int(4) DEFAULT NULL,
  `recargo_entrega` int(11) DEFAULT NULL,
  `recargo_devolucion` int(11) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_locacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `locaciones` WRITE;
/*!40000 ALTER TABLE `locaciones` DISABLE KEYS */;

INSERT INTO `locaciones` (`id_locacion`, `locacion`, `id_pais`, `recargo_entrega`, `recargo_devolucion`, `c_date`, `estado`)
VALUES
	(1,'Oficina Punta Arenas',NULL,0,0,'2017-08-22 15:00:27',1),
	(2,'Aeropuerto Punta Arenas',NULL,0,0,'2017-08-22 15:00:59',1),
	(3,'Oficina Puerto Natales',NULL,0,0,'2017-08-22 15:02:21',1),
	(4,'Aeropuerto Puerto Natales',NULL,0,0,'2017-08-22 15:02:34',1),
	(5,'Puerto Montt',NULL,0,0,'2017-08-22 15:02:36',1),
	(6,'Calafate',NULL,0,0,'2017-08-22 15:03:11',1),
	(7,'Ushuaia',NULL,0,0,'2017-08-22 15:03:30',1);

/*!40000 ALTER TABLE `locaciones` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla mantenimientos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mantenimientos`;

CREATE TABLE `mantenimientos` (
  `id_mantenimiento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_mantenimiento` int(2) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `id_vehiculo` int(2) DEFAULT NULL,
  `comentario` text,
  `fecha_mantencion` timestamp NULL DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_mantenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `mantenimientos` WRITE;
/*!40000 ALTER TABLE `mantenimientos` DISABLE KEYS */;

INSERT INTO `mantenimientos` (`id_mantenimiento`, `id_tipo_mantenimiento`, `costo`, `id_vehiculo`, `comentario`, `fecha_mantencion`, `c_date`, `estado`)
VALUES
	(1,1,35000,2,NULL,'2017-08-01 00:00:00','2017-08-14 16:18:46',1),
	(2,3,15500,1,NULL,'2017-08-09 00:00:00','2017-08-14 16:44:06',1),
	(3,3,160000,2,'Cambio de focos',NULL,'2017-08-14 18:47:43',1),
	(4,2,21000,5,'','2022-08-17 00:00:00','2017-08-14 21:21:16',1),
	(5,1,34000,1,'filtro de aceite, paga al mecanico','2001-08-17 00:00:00','2017-08-14 21:22:38',1),
	(6,3,18000,2,'Pinos aromaticos',NULL,'2017-08-14 21:23:44',1),
	(7,1,400,3,'','2017-08-18 00:00:00','2017-08-14 21:24:27',1);

/*!40000 ALTER TABLE `mantenimientos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla marcas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `id_marca` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;

INSERT INTO `marcas` (`id_marca`, `marca`, `c_date`, `estado`)
VALUES
	(1,'Hyunday','2017-07-31 16:50:49',1),
	(2,'Toyota','2017-07-31 16:51:04',1),
	(3,'Suzuki','2017-07-31 16:51:18',1),
	(4,'Renault','2017-07-31 16:51:37',1),
	(5,'Mazda','2017-07-31 16:51:57',1),
	(6,'Ford','2017-07-31 16:52:06',1),
	(7,'Dodge','2017-07-31 16:52:14',1),
	(8,'Nissan','2017-07-31 16:52:22',1),
	(9,'Chevroletsss','2017-08-03 20:38:37',0),
	(10,'Chevrolet','2017-08-12 14:09:48',1);

/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla modelos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `modelos`;

CREATE TABLE `modelos` (
  `id_modelo` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(30) DEFAULT NULL,
  `id_marca` int(4) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `modelos` WRITE;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;

INSERT INTO `modelos` (`id_modelo`, `modelo`, `id_marca`, `c_date`, `estado`)
VALUES
	(1,'DURANGO o similar',7,'2017-08-02 15:11:53',1),
	(2,'EXPLORER o similar',6,'2017-08-02 15:12:18',1),
	(3,'TERRAMO o similar',8,'2017-08-02 15:12:32',1),
	(4,'RANGER o similar',6,'2017-08-02 15:13:06',1),
	(5,'MATRIX o similar',1,'2017-08-02 15:13:31',1),
	(6,'GRAN NOMADE o similar',3,'2017-08-02 15:13:42',1),
	(7,'SWIFT o similar',3,'2017-08-02 15:14:09',1),
	(8,'SAMSUNG SM3 o similar',4,'2017-08-02 15:14:27',1),
	(9,'SYMBOL o similar',4,'2017-08-02 15:14:47',1),
	(10,'4RUNNER o similar',2,'2017-08-02 15:15:04',1),
	(11,'ESCAPE o similar',6,'2017-08-02 15:15:20',1),
	(12,'BT 50 o similar',5,'2017-08-02 15:15:34',1),
	(13,'H1 GRAND STAREK o similar',1,'2017-08-02 15:15:52',1),
	(14,'ECOSPORT o similar',6,'2017-08-02 15:16:19',1),
	(15,'Hummer',NULL,'2017-08-02 20:57:46',0),
	(16,'Yaris',NULL,'2017-08-02 21:06:16',0),
	(17,'Corolla',NULL,'2017-08-02 21:06:50',0),
	(18,'Clio',4,'2017-08-02 21:31:44',0),
	(19,'Sentrado',8,'2017-08-03 20:37:56',0),
	(20,'CRUZE o similar',10,'2017-08-12 14:10:16',0);

/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla paises
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paises`;

CREATE TABLE `paises` (
  `id_pais` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `pais` varchar(30) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla reservas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservas`;

CREATE TABLE `reservas` (
  `id_reserva` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_reserva` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_vehiculo` int(2) DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL,
  `fecha_devolucion` timestamp NULL DEFAULT NULL,
  `locacion_entrega` int(11) DEFAULT NULL,
  `locacion_devolucion` int(11) DEFAULT NULL,
  `km_devolucion` int(11) DEFAULT NULL,
  `id_impuestos` int(11) DEFAULT NULL,
  `id_extra_reserva` int(11) DEFAULT NULL,
  `id_estado_arriendo` int(11) DEFAULT NULL,
  `id_estado_pagado` int(11) DEFAULT NULL,
  `recargos` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;

INSERT INTO `reservas` (`id_reserva`, `codigo_reserva`, `id_cliente`, `id_vehiculo`, `fecha_entrega`, `fecha_devolucion`, `locacion_entrega`, `locacion_devolucion`, `km_devolucion`, `id_impuestos`, `id_extra_reserva`, `id_estado_arriendo`, `id_estado_pagado`, `recargos`, `sub_total`, `total`)
VALUES
	(1,NULL,1,3,'2017-10-01 12:00:00','2017-10-06 11:00:00',1,1,125000,1,NULL,0,0,NULL,NULL,NULL),
	(2,NULL,1,2,'2017-10-30 12:00:00','2017-11-05 12:00:00',1,1,30000,1,NULL,0,0,NULL,NULL,NULL);

/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla tarifas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tarifas`;

CREATE TABLE `tarifas` (
  `id_tarifa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `precio` int(11) DEFAULT NULL,
  `id_modelo` int(3) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tarifas` WRITE;
/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;

INSERT INTO `tarifas` (`id_tarifa`, `precio`, `id_modelo`, `c_date`, `estado`)
VALUES
	(1,56000,8,'2017-08-04 17:11:55',1);

/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla tipos_mantenimientos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tipos_mantenimientos`;

CREATE TABLE `tipos_mantenimientos` (
  `id_tipo_mantenimiento` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `mantenimiento` varchar(30) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_tipo_mantenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tipos_mantenimientos` WRITE;
/*!40000 ALTER TABLE `tipos_mantenimientos` DISABLE KEYS */;

INSERT INTO `tipos_mantenimientos` (`id_tipo_mantenimiento`, `mantenimiento`, `c_date`, `estado`)
VALUES
	(1,'Cambio de aceite','2017-08-08 12:31:25',1),
	(2,'Revision Tecnica','2017-08-08 12:33:14',1),
	(3,'Extras','2017-08-08 12:33:29',1);

/*!40000 ALTER TABLE `tipos_mantenimientos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla transmisiones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transmisiones`;

CREATE TABLE `transmisiones` (
  `id_transmision` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `transmision` varchar(30) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_transmision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `transmisiones` WRITE;
/*!40000 ALTER TABLE `transmisiones` DISABLE KEYS */;

INSERT INTO `transmisiones` (`id_transmision`, `transmision`, `c_date`, `estado`)
VALUES
	(1,'Automatico','2017-08-03 16:21:01',1),
	(2,'Manual','2017-08-03 16:21:08',1),
	(3,'Manual-Automatico','2017-08-03 16:21:25',1),
	(4,'Secuencial','2017-08-03 19:49:11',0),
	(8,'sequencialaaaa','2017-08-03 20:46:17',0);

/*!40000 ALTER TABLE `transmisiones` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `estado`)
VALUES
	(1,'Alejandro','Vargas','avargas','alejo123',1),
	(2,'Yerko','Vera','koyer','koyer1024',1);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla vehiculos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehiculos`;

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `patente` varchar(8) DEFAULT NULL,
  `id_modelo` int(3) DEFAULT NULL,
  `id_marca` int(3) DEFAULT NULL,
  `id_transmision` int(3) DEFAULT NULL,
  `id_combustible` int(3) DEFAULT NULL,
  `id_categoria` int(3) DEFAULT NULL,
  `id_tarifa` int(11) DEFAULT NULL,
  `disponible` int(2) DEFAULT '1',
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;

INSERT INTO `vehiculos` (`id_vehiculo`, `patente`, `id_modelo`, `id_marca`, `id_transmision`, `id_combustible`, `id_categoria`, `id_tarifa`, `disponible`, `c_date`, `estado`)
VALUES
	(1,'BXXD96',8,4,1,1,1,1,1,'2017-08-04 17:10:57',1),
	(2,'BBHK96',13,1,3,2,5,1,1,'2017-08-07 11:22:23',1),
	(3,'VV2384',8,4,1,1,1,1,1,'2017-08-13 18:04:46',1),
	(4,'VV2365',8,4,1,1,1,1,1,'2017-08-13 18:05:11',1),
	(5,'SFWE98',13,1,2,2,5,1,1,'2017-08-13 18:30:45',1);

/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
