# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.31)
# Base de datos: koyer
# Tiempo de Generación: 2018-04-05 03:55:54 +0000
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
  `es` varchar(80) DEFAULT NULL,
  `en` varchar(80) DEFAULT NULL,
  `imagen` text,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;

INSERT INTO `categorias` (`id_categoria`, `categoria`, `c_date`, `estado`, `es`, `en`, `imagen`)
VALUES
	(1,'Sedan','2017-08-03 17:14:40',1,'Autos tipo Sedan','Type Sedan Car','sedan.jpg'),
	(2,'Pick up 4x4','2017-08-03 17:14:55',1,'Tipo Camioneta','Pick Up Cars','pickup.jpg'),
	(3,'Suv 4X4','2017-08-03 17:15:07',1,'Vehículos SUV','SUV 4x4 Cars','suv.jpg'),
	(4,'Suv 4x4 - 7 pasajeros','2017-08-03 17:15:42',1,'SUV 7 Pasajeros','SUV 7 Passengers','suv7.jpg'),
	(5,'Van Pasajeros','2017-08-03 17:19:44',1,'Van','VAN Passengers','van.jpg'),
	(6,'Suv','2017-08-03 17:19:55',0,'SUV',NULL,NULL),
	(7,'Camionssss','2017-08-03 20:45:38',0,NULL,NULL,NULL);

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
  `edad` int(2) DEFAULT NULL,
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

INSERT INTO `clientes` (`id_cliente`, `rut`, `nombre`, `apellido`, `edad`, `fecha_nacimiento`, `direccion`, `ciudad`, `pais`, `telefono`, `email`, `fecha_registro`)
VALUES
	(1,194241267,'Alejandro','Vargas',NULL,'1996-11-07 00:00:00','Guillermo Wallace 0273','Punta Arenas','Chile',997300915,'ale_seba_vargas@hotmail.com','2017-08-19 17:53:23'),
	(2,85462557,'Henrique','Galvez',NULL,'1978-01-24 00:00:00','Av. España 032','Punta Arenas','Chile',984571265,'h.galvez@gmail.com','2017-08-19 17:55:40'),
	(5,70211517,'Sebastian','Pantoja',NULL,NULL,'guillermo wallace 0371','Punta Arenas','Chile',987654321,'sebastian.sp@hotmail.com','2017-09-04 12:27:39'),
	(6,71651586,'Guillermo','Estrada',NULL,NULL,'guillermo wallace 0371','Puerto Natales','Chile',987654321,'guilleeeg@hotmail.com','2017-09-04 12:29:10'),
	(7,85514656,'Joaquin','Urbina',NULL,NULL,'Capitan guillermo 456','Punta arenas','Chile',987654321,'guilleeeg@hotmail.com','2017-09-04 12:30:32'),
	(9,101618881,'Martine ','van Aarle',NULL,NULL,'3148 School Street','New Haven','Holanda',987654321,'martinevanAarle@gustr.com','2017-09-04 12:34:30'),
	(10,98456127,'Esteban','Dido',NULL,NULL,'Av. Siempreviva','Springfield','Estados Unidos',654987321,'este-bandido@yopmail.pw','2017-09-05 22:57:47'),
	(11,125468229,'Ulises','Rodriguez',NULL,'0000-00-00 00:00:00','Bories 1253','Punta Arenas','Chile',321654987,'u.rodrig@gmail.com','2017-09-08 06:49:58'),
	(12,456789217,'Esteban','Dido',NULL,'0000-00-00 00:00:00','siemprevio 432','chimbarongo','chile',654987456,'locobrayan123@gmil.com','2017-09-28 11:47:43'),
	(13,456789217,'Esteban','Dido',NULL,'0000-00-00 00:00:00','siemprevio 432','chimbarongo','chile',654987456,'locobrayan123@gmil.com','2017-09-28 12:29:59'),
	(14,1238901237,'Eustaquio','Meraccio',34,NULL,'sdafksdlkfnsdlkf','nkjfdg','fgsdadfgvadf',98781233,'ale_sebas_vasasd@safsdadf.vcom','2018-01-11 19:14:26');

/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla combustibles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `combustibles`;

CREATE TABLE `combustibles` (
  `id_combustible` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `combustible` varchar(40) DEFAULT NULL,
  `en` varchar(30) DEFAULT NULL,
  `es` varchar(30) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `combustibles` WRITE;
/*!40000 ALTER TABLE `combustibles` DISABLE KEYS */;

INSERT INTO `combustibles` (`id_combustible`, `combustible`, `en`, `es`, `c_date`, `estado`)
VALUES
	(1,'Gasolina','Gasoline','Gasolina','2017-08-03 16:17:31',1),
	(2,'Diesel','Diesel','Diesel','2017-08-03 16:17:39',1),
	(3,'Eléctrico','Electric','Eléctrico','2017-08-03 20:44:59',1);

/*!40000 ALTER TABLE `combustibles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla descuentos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `descuentos`;

CREATE TABLE `descuentos` (
  `id_descuento` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `descuento` varchar(20) DEFAULT NULL,
  `valor` int(2) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `descuentos` WRITE;
/*!40000 ALTER TABLE `descuentos` DISABLE KEYS */;

INSERT INTO `descuentos` (`id_descuento`, `descuento`, `valor`, `c_date`, `estado`)
VALUES
	(1,'Reseva Web',20,'2017-09-25 15:25:48',1),
	(2,'familiares',10,'2017-09-25 15:42:52',0);

/*!40000 ALTER TABLE `descuentos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla dolares
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dolares`;

CREATE TABLE `dolares` (
  `id_divisa` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `divisa` varchar(20) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_divisa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dolares` WRITE;
/*!40000 ALTER TABLE `dolares` DISABLE KEYS */;

INSERT INTO `dolares` (`id_divisa`, `divisa`, `valor`)
VALUES
	(1,'dolar',650);

/*!40000 ALTER TABLE `dolares` ENABLE KEYS */;
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
  `por_dia` int(2) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_extra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `extras` WRITE;
/*!40000 ALTER TABLE `extras` DISABLE KEYS */;

INSERT INTO `extras` (`id_extra`, `extra`, `precio`, `por_dia`, `c_date`, `estado`)
VALUES
	(1,'Bidón de 20 litros',5000,1,'2017-09-03 19:23:42',1),
	(2,'Silla para bebe',4000,1,'2017-09-03 19:23:59',1),
	(3,'Permiso Internacional para Argentina',75000,0,'2017-09-03 19:25:38',1),
	(4,'Bidon de 30 lts',10000,1,'2017-09-03 20:26:14',0),
	(5,'asdasd',345124,1,'2018-01-11 21:02:04',0),
	(6,'213123',123123,NULL,'2018-01-11 22:04:14',0),
	(7,'GPS',5000,1,'2018-02-09 23:26:19',1);

/*!40000 ALTER TABLE `extras` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla extras_reservas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `extras_reservas`;

CREATE TABLE `extras_reservas` (
  `id_extra_reserva` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_reserva` int(11) DEFAULT NULL,
  `id_extra` int(3) DEFAULT NULL,
  `cantidad` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_extra_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `extras_reservas` WRITE;
/*!40000 ALTER TABLE `extras_reservas` DISABLE KEYS */;

INSERT INTO `extras_reservas` (`id_extra_reserva`, `id_reserva`, `id_extra`, `cantidad`)
VALUES
	(1,0,2,1),
	(2,6,1,1),
	(5,12,1,1),
	(6,12,2,1),
	(7,13,1,1),
	(8,25,1,2),
	(9,25,3,1),
	(10,27,1,1),
	(11,31,1,1),
	(12,32,3,1),
	(13,33,2,1),
	(14,35,1,1),
	(15,36,1,1),
	(16,42,2,1),
	(17,12,3,1),
	(18,22,4,1),
	(19,32,1,2),
	(20,33,3,1),
	(21,35,1,1),
	(22,29,4,1),
	(23,46,2,1),
	(24,46,3,1),
	(25,47,2,1),
	(26,47,3,1),
	(27,49,2,1),
	(28,50,2,1),
	(29,67,1,1),
	(30,67,2,1),
	(31,68,1,1),
	(32,68,3,0),
	(33,68,4,1);

/*!40000 ALTER TABLE `extras_reservas` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla faq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faq`;

CREATE TABLE `faq` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` text,
  `respuesta` text,
  `lang` varchar(2) DEFAULT 'en',
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;

INSERT INTO `faq` (`id`, `pregunta`, `respuesta`, `lang`, `estado`)
VALUES
	(1,'¿Puedo conducir en Chile con la licencia de conducir de mi País o necesito una licencia internacional?','Usted puede conducir en Chile con una licencia válida de su país de origen, no es necesario tener una licencia internacional.','es',1),
	(2,'¿Puedo viajar a Argentina con un Vehículo arrendado?','Usted puede conducir en Chile con una licencia válida de su país de origen, no es necesario tener una licencia internacional.\n','es',0),
	(3,'¿Puedo viajar a Argentina con un Vehículo arrendado?','Sí, se permite el cruce de frontera sólo hacia Argentina con previo pago del permiso y el seguro para cruzar la Frontera, requisitos que nosotros procesamos por usted. Es importante que la intención de salir del país la haga al momento de realizar su cotización.  Para poder procesar la documentación, se requiere copias del pasaporte (o cédula de identidad) y licencia de conducir de cada conductor y el número de pasajeros que cruzarán la frontera en el vehículo. Toda esta información debe ser enviada al menos una semana antes de la fecha de inicio del arriendo.','es',1),
	(4,'¿Puedo devolver el vehículo en el extranjero?','Sí, se puede devolver el vehículo en el extranjero (sólo Argentina) . Para saber valores del lugar en que desea dejar el vehículo debe enviar una cotización por medio de nuestro Formulario o enviándonos un mail a reservas@koyer.cl - cotizaciones@koyer.cl','es',1),
	(5,'¿Cuáles son las condiciones mínimas para arrendar un vehículo?','El arrendatario y los conductores deben tener al menos 23 años de edad. * Poseer una tarjeta de crédito con un cupo mínimo de $600.000 pesos chilenos que quedan como garantía. * Tener una licencia válida de conductor y su cédula de identidad o pasaporte. ','es',1),
	(6,'¿Con cuáles medios de pago puedo hacer la Garantía?','La garantía es de un monto de $600.000 pesos chilenos y puede ser dejada en efectivo o con tarjeta de crédito. En lo referente a la tarjeta de crédito, se realiza una retención del monto a la tarjeta de crédito durante la vigencia del contrato de arriendo (no es un cobro). La garantía se anula cuando el contrato termine','es',1),
	(7,'¿Qué clase de cobertura de seguro está incluida en el arriendo?','Cada uno de nuestros vehículos cuenta con el seguro estándar (obligatorio) y está compuesto por: Daños propios al vehículo. Daños por volcamiento y daños a terceros dentro de Chile. En caso de accidente se encuentran los siguientes deducibles que corren por cuenta del cliente: Por daños propios al vehículo: Hasta 30 UF + IVA * Por volcamiento y daños a terceros dentro de Chile: Hasta 40 UF + IVA * * Monto máximo a pagar en caso de un siniestro; el cobro se hace proporcional al daño del vehículo.','es',1),
	(8,'Mi tarjeta de crédito cubre el seguro CDW ¿Puedo declinar el suyo?','Nuestro seguro es obligatorio y no es posible descontarlo del valor del arriendo.','es',1),
	(9,'¿Puedo elegir color, modelo o marca del vehículo?','No, se confirma categoría del vehículo pero no modelo, marca ni color.','es',1),
	(10,'¿El arriendo tiene algún límite de Kilometraje?','Todos nuestros arriendos incluyen kilometraje ilimitado.','es',1),
	(11,'¿Cuántas personas pueden conducir el vehículo?','Todos nuestros arriendos incluyen conductores ilimitados. Cuando se sale hacia Argentina sólo se permiten 5 conductores por vehículo.','es',1),
	(12,'¿Existe algún horario de entrega de Vehículos?','No, el vehículo puede ser entregado cualquier día de la semana y a cualquier hora sin costo adicional','es',1),
	(13,'Do I need and International Driver License to drive in Chile?','No, It is not necessary to have an International Driver\'s License to drive in Chile. You can use your license from your home country.','en',1),
	(14,'Can I travel to Argentina in a Rental vehicle','Yes, you can cross the border to go to Argentina. However, it is necessary to get a special permit and a mandatory insurance to drive in Argentina. We make this paperwork with an additional charge. You must ask by this service at the moment of request the booking. To process the documentation, we require copies of the passports and driver\'s licenses of each driver and the number of passengers that will be in the vehicle. We must receive this information at leats one week before the start of the rental.','en',1),
	(15,'Can I return the vehicle in Argentina?','Yes, you can pick up and return the vehicle only in Argentina. To know costs of the pickup/return place you must send a Booking Form or send an email to reservas@koyer.cl - cotizaciones@koyer.cl','en',1),
	(16,'What are the minimum conditions for rent a car?','*The renter and drivers must be at least 23 years old. Renters must have a major credit card with CLP $600.000 (about USD 900) available for guarantee purposes. The renter must have a valid national/international driver\'s license and passport.','en',1),
	(17,'With what means can I make the Guarantee?','The guarantee deposit is for $ 600,000 Chilean Pesos and can be left in cash or by credit card. In relation to the credit card, a retention of the amount is made to the credit card during the term of the booking (not a charge). The guarantee deposit is canceled when the rental ends.','en',1),
	(18,'What kind of insurances are included in the booking?','Our vehicles has a standard insurance (mandatory) and consists of: Damage to the vehicle and Damage caused by overturning and damage to third parties within Chile. In the event of an accident, the following deductibles are payable by the customer: For own damages to the vehicle: Up to 30 UF + VAT* For rollover and damage to third parties within Chile: Up to 40 UF + VAT * * Maximum amount to pay in case of an accident; The charge becomes proportional to the damage of the vehicle.','en',1),
	(19,'My credit card covers CDW insurance Can I decline yours?','Our insurance is mandatory and is not possible to deduct it from the value of the rental.','en',1),
	(20,'Can I choose color, model or brand of the vehicle?','No, we confirm vehicle category but not model, brand or color.','en',1),
	(21,'Does the car have any mileage limit?','All our rentals include unlimited mileage.','en',1),
	(22,'How many people can drive the vehicle?','All our rentals in Chile include unlimited drivers. When the vehicle cross the border to Argentina, only 5 drivers per vehicle are allowed.','en',1),
	(23,'Is there a limit hour to pick-up or drop-off the vehicle?','No, the vehicle can be pick-up or drop-off any day of the week and at any time without additional cost. This time must be specified in the lease.','en',1);

/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla imagenes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `imagenes`;

CREATE TABLE `imagenes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
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
	(2,'0',10,'2017-08-27 20:27:34',0);

/*!40000 ALTER TABLE `impuestos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla kilometrajes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kilometrajes`;

CREATE TABLE `kilometrajes` (
  `id_kilometraje` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kilometraje` int(11) DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kilometraje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kilometrajes` WRITE;
/*!40000 ALTER TABLE `kilometrajes` DISABLE KEYS */;

INSERT INTO `kilometrajes` (`id_kilometraje`, `kilometraje`, `id_vehiculo`)
VALUES
	(1,123332,1),
	(2,123444,4),
	(3,1233223,2),
	(4,150000,5),
	(5,160000,2),
	(6,170000,3),
	(7,114223,1),
	(8,1333523,1),
	(9,12333223,1),
	(10,1234444,1),
	(11,123332,3),
	(12,123321,3),
	(13,1244000,3),
	(14,1234566,4),
	(15,3443333,4),
	(16,12222331,3),
	(17,2342,4),
	(18,1223344,1),
	(19,21344232,4);

/*!40000 ALTER TABLE `kilometrajes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla locaciones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locaciones`;

CREATE TABLE `locaciones` (
  `id_locacion` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `locacion` varchar(40) DEFAULT NULL,
  `recargo_entrega` int(11) DEFAULT NULL,
  `recargo_devolucion` int(11) DEFAULT NULL,
  `entrega` tinyint(1) DEFAULT '0',
  `devolucion` tinyint(1) DEFAULT '0',
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_locacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `locaciones` WRITE;
/*!40000 ALTER TABLE `locaciones` DISABLE KEYS */;

INSERT INTO `locaciones` (`id_locacion`, `locacion`, `recargo_entrega`, `recargo_devolucion`, `entrega`, `devolucion`, `c_date`, `estado`)
VALUES
	(1,'Oficina Punta Arenas',0,0,1,1,'2017-08-22 15:00:27',1),
	(2,'Aeropuerto Punta Arenas',0,0,1,1,'2017-08-22 15:00:59',1),
	(3,'Oficina Puerto Natales',0,0,1,1,'2017-08-22 15:02:21',1),
	(4,'Aeropuerto Puerto Natales',0,0,1,1,'2017-08-22 15:02:34',1),
	(5,'Puerto Montt',0,0,0,1,'2017-08-22 15:02:36',1),
	(6,'Calafate',0,0,1,1,'2017-08-22 15:03:11',1),
	(7,'Ushuaia',0,0,0,1,'2017-08-22 15:03:30',1),
	(8,'Santiago',600000,600500,1,NULL,'2018-03-31 15:31:39',0);

/*!40000 ALTER TABLE `locaciones` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla mantenimientos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mantenimientos`;

CREATE TABLE `mantenimientos` (
  `id_mantenimiento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mantenimiento` text,
  `costo` int(11) DEFAULT NULL,
  `id_vehiculo` int(2) DEFAULT NULL,
  `fecha_mantencion` timestamp NULL DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_mantenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `mantenimientos` WRITE;
/*!40000 ALTER TABLE `mantenimientos` DISABLE KEYS */;

INSERT INTO `mantenimientos` (`id_mantenimiento`, `mantenimiento`, `costo`, `id_vehiculo`, `fecha_mantencion`, `c_date`, `estado`)
VALUES
	(1,NULL,35000,2,'2017-08-01 00:00:00','2017-08-14 16:18:46',1),
	(2,NULL,15500,1,'2017-08-09 00:00:00','2017-08-14 16:44:06',1),
	(3,'Cambio de focos',160000,2,'2017-12-10 00:00:00','2017-08-14 18:47:43',1),
	(4,'',21000,5,'2017-08-17 00:00:00','2017-08-14 21:21:16',1),
	(5,'filtro de aceite, paga al mecanico',34000,1,'2017-08-17 00:00:00','2017-08-14 21:22:38',1),
	(6,'Pinos aromaticos',18000,2,'2017-11-15 00:00:00','2017-08-14 21:23:44',1),
	(7,'',400,3,'2017-08-18 00:00:00','2017-08-14 21:24:27',1),
	(8,'',7653,3,'2018-03-05 00:00:00','2017-08-14 21:24:27',1),
	(9,'',3567,3,'2018-03-05 00:00:00','2017-08-14 21:24:27',1),
	(10,'',28545,3,'2018-03-20 00:00:00','2017-08-14 21:24:27',1),
	(11,'',76538,3,'2018-03-08 00:00:00','2017-08-14 21:24:27',1),
	(12,'',21615,3,'2018-03-06 00:00:00','2017-08-14 21:24:27',1);

/*!40000 ALTER TABLE `mantenimientos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla marcas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `id_marca` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;

INSERT INTO `marcas` (`id_marca`, `marca`, `c_date`, `estado`)
VALUES
	(1,'Abarth','2017-09-24 19:18:39',1),
	(2,'Alfa Romeo','2017-09-24 19:18:39',1),
	(3,'Aro','2017-09-24 19:18:39',1),
	(4,'Asia','2017-09-24 19:18:39',1),
	(5,'Asia Motors','2017-09-24 19:18:39',1),
	(6,'Aston Martin','2017-09-24 19:18:39',1),
	(7,'Audi','2017-09-24 19:18:39',1),
	(8,'Austin','2017-09-24 19:18:39',1),
	(9,'Auverland','2017-09-24 19:18:39',1),
	(10,'Bentley','2017-09-24 19:18:39',1),
	(11,'Bertone','2017-09-24 19:18:39',1),
	(12,'Bmw','2017-09-24 19:18:39',1),
	(13,'Cadillac','2017-09-24 19:18:39',1),
	(14,'Chevrolet','2017-09-24 19:18:39',1),
	(15,'Chrysler','2017-09-24 19:18:39',1),
	(16,'Citroen','2017-09-24 19:18:39',1),
	(17,'Corvette','2017-09-24 19:18:39',1),
	(18,'Dacia','2017-09-24 19:18:39',1),
	(19,'Daewoo','2017-09-24 19:18:39',1),
	(20,'Daf','2017-09-24 19:18:39',1),
	(21,'Daihatsu','2017-09-24 19:18:39',1),
	(22,'Daimler','2017-09-24 19:18:39',1),
	(23,'Dodge','2017-09-24 19:18:39',1),
	(24,'Ferrari','2017-09-24 19:18:39',1),
	(25,'Fiat','2017-09-24 19:18:39',1),
	(26,'Ford','2017-09-24 19:18:39',1),
	(27,'Galloper','2017-09-24 19:18:39',1),
	(28,'Gmc','2017-09-24 19:18:39',1),
	(29,'Honda','2017-09-24 19:18:39',1),
	(30,'Hummer','2017-09-24 19:18:39',1),
	(31,'Hyundai','2017-09-24 19:18:39',1),
	(32,'Infiniti','2017-09-24 19:18:39',1),
	(33,'Innocenti','2017-09-24 19:18:39',1),
	(34,'Isuzu','2017-09-24 19:18:39',1),
	(35,'Iveco','2017-09-24 19:18:39',1),
	(36,'Iveco-pegaso','2017-09-24 19:18:39',1),
	(37,'Jaguar','2017-09-24 19:18:39',1),
	(38,'Jeep','2017-09-24 19:18:39',1),
	(39,'Kia','2017-09-24 19:18:39',1),
	(40,'Lada','2017-09-24 19:18:39',1),
	(41,'Lamborghini','2017-09-24 19:18:39',1),
	(42,'Lancia','2017-09-24 19:18:39',1),
	(43,'Land-rover','2017-09-24 19:18:39',1),
	(44,'Ldv','2017-09-24 19:18:39',1),
	(45,'Lexus','2017-09-24 19:18:39',1),
	(46,'Lotus','2017-09-24 19:18:39',1),
	(47,'Mahindra','2017-09-24 19:18:39',1),
	(48,'Maserati','2017-09-24 19:18:39',1),
	(49,'Maybach','2017-09-24 19:18:39',1),
	(50,'Mazda','2017-09-24 19:18:39',1),
	(51,'Mercedes-benz','2017-09-24 19:18:39',1),
	(52,'Mg','2017-09-24 19:18:39',1),
	(53,'Mini','2017-09-24 19:18:39',1),
	(54,'Mitsubishi','2017-09-24 19:18:39',1),
	(55,'Morgan','2017-09-24 19:18:39',1),
	(56,'Nissan','2017-09-24 19:18:39',1),
	(57,'Opel','2017-09-24 19:18:39',1),
	(58,'Peugeot','2017-09-24 19:18:39',1),
	(59,'Pontiac','2017-09-24 19:18:39',1),
	(60,'Porsche','2017-09-24 19:18:39',1),
	(61,'Renault','2017-09-24 19:18:39',1),
	(62,'Rolls-royce','2017-09-24 19:18:39',1),
	(63,'Rover','2017-09-24 19:18:39',1),
	(64,'Saab','2017-09-24 19:18:39',1),
	(65,'Santana','2017-09-24 19:18:39',1),
	(66,'Seat','2017-09-24 19:18:39',1),
	(67,'Skoda','2017-09-24 19:18:39',1),
	(68,'Smart','2017-09-24 19:18:39',1),
	(69,'Ssangyong','2017-09-24 19:18:39',1),
	(70,'Subaru','2017-09-24 19:18:39',1),
	(71,'Suzuki','2017-09-24 19:18:39',1),
	(72,'Talbot','2017-09-24 19:18:39',1),
	(73,'Tata','2017-09-24 19:18:39',1),
	(74,'Toyota','2017-09-24 19:18:39',1),
	(75,'Umm','2017-09-24 19:18:39',1),
	(76,'Vaz','2017-09-24 19:18:39',1),
	(77,'Volkswagen','2017-09-24 19:18:39',1),
	(78,'Volvo','2017-09-24 19:18:39',1),
	(79,'Wartburg','2017-09-24 19:18:39',1);

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
	(1,'DURANGO o similar',23,'2017-08-02 15:11:53',1),
	(2,'EXPLORER o similar',26,'2017-08-02 15:12:18',1),
	(3,'TERRANO o similar',56,'2017-08-02 15:12:32',1),
	(4,'RANGER o similar',26,'2017-08-02 15:13:06',1),
	(5,'EXPLORER o similar',26,'2017-08-02 15:13:31',1),
	(6,'GRAN NOMADE o similar',71,'2017-08-02 15:13:42',1),
	(7,'SWIFT o similar',71,'2017-08-02 15:14:09',1),
	(8,'SAMSUNG SM3 o similar',61,'2017-08-02 15:14:27',1),
	(9,'SYMBOL o similar',61,'2017-08-02 15:14:47',1),
	(10,'4RUNNER o similar',74,'2017-08-02 15:15:04',1),
	(11,'ESCAPE o similar',26,'2017-08-02 15:15:20',1),
	(12,'BT 50 o similar',50,'2017-08-02 15:15:34',1),
	(13,'H1 GRAND STAREK o similar',31,'2017-08-02 15:15:52',1),
	(14,'ECOSPORT o similar',26,'2017-08-02 15:16:19',1),
	(28,'IMPRESA o similar',70,'2017-12-27 19:17:56',1),
	(29,'Punto o similar',25,'2017-12-27 19:28:24',0),
	(30,'EXPLORER LUJO o similar',26,'2017-08-02 15:13:31',1);

/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla reservas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservas`;

CREATE TABLE `reservas` (
  `id_reserva` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_reserva` varchar(20) DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL,
  `fecha_devolucion` timestamp NULL DEFAULT NULL,
  `locacion_entrega` int(11) DEFAULT NULL,
  `locacion_devolucion` int(11) DEFAULT NULL,
  `id_vehiculo` int(2) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_extra_reserva` int(11) DEFAULT NULL,
  `vencimiento_permiso` timestamp NULL DEFAULT NULL,
  `pasajeros` int(2) DEFAULT NULL,
  `nro_vuelo` varchar(20) DEFAULT NULL,
  `direccion_hospedaje` varchar(30) DEFAULT NULL,
  `precio_arriendo_vehiculo` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `abonado` int(11) DEFAULT NULL,
  `estado_arriendo` tinyint(1) DEFAULT '1',
  `pagado` tinyint(1) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  `cotizacion` tinyint(1) DEFAULT '0',
  `transferencia` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;

INSERT INTO `reservas` (`id_reserva`, `codigo_reserva`, `fecha_entrega`, `fecha_devolucion`, `locacion_entrega`, `locacion_devolucion`, `id_vehiculo`, `id_cliente`, `id_extra_reserva`, `vencimiento_permiso`, `pasajeros`, `nro_vuelo`, `direccion_hospedaje`, `precio_arriendo_vehiculo`, `sub_total`, `total`, `abonado`, `estado_arriendo`, `pagado`, `c_date`, `estado`, `cotizacion`, `transferencia`)
VALUES
	(74,'RK20180129EE15','2018-02-06 16:53:00','2018-02-14 16:54:00',2,4,1,1,NULL,NULL,0,'','',320000,320000,380800,NULL,1,NULL,'2018-01-29 16:55:27',1,0,0),
	(75,'RK20180129F1C2','2018-01-17 17:15:00','2018-01-26 17:15:00',2,2,3,1,NULL,NULL,3,'','',360000,360000,428400,NULL,1,NULL,'2018-01-29 17:15:49',1,0,0),
	(76,'RK20180130F9F4','2018-01-26 18:00:00','2018-01-31 15:51:00',1,1,3,1,NULL,NULL,4,'','',160000,160000,190400,NULL,1,NULL,'2018-01-30 15:52:23',1,0,0),
	(77,'RK201802260C3A','2018-03-22 22:38:00','2018-03-28 22:38:00',1,1,1,1,NULL,'2018-05-24 22:38:00',3,'','',192000,192000,228480,NULL,1,NULL,'2018-02-26 22:38:55',0,1,0),
	(78,'RK2018031806C1','2018-03-26 18:23:00','2018-03-30 18:23:00',1,1,1,1,NULL,'2018-05-25 18:24:00',4,'','',128000,128000,152320,NULL,1,NULL,'2018-03-18 18:24:43',1,0,0);

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
	(1,40000,8,'2017-08-04 17:11:55',1),
	(2,60000,13,'2017-09-25 15:55:33',1),
	(3,45000,27,'2017-09-26 02:22:31',1),
	(4,50000,1,'2017-12-27 18:24:04',1),
	(5,60000,2,'2017-12-27 18:24:08',1),
	(6,45000,3,'2017-12-27 18:24:13',1),
	(7,40000,29,'2017-12-27 19:28:24',1);

/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla tarifas_vehiculos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tarifas_vehiculos`;

CREATE TABLE `tarifas_vehiculos` (
  `id_tarifa_vehiculo` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `precio` int(11) DEFAULT NULL,
  `id_modelo` int(4) DEFAULT NULL,
  `c_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_tarifa_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
  `en` varchar(30) DEFAULT NULL,
  `es` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_transmision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `transmisiones` WRITE;
/*!40000 ALTER TABLE `transmisiones` DISABLE KEYS */;

INSERT INTO `transmisiones` (`id_transmision`, `transmision`, `c_date`, `estado`, `en`, `es`)
VALUES
	(1,'Automático','2017-08-03 16:21:01',1,'Automatic','Automático'),
	(2,'Manual','2017-08-03 16:21:08',1,'Manual','Manual'),
	(3,'Manual-Automatico','2017-08-03 16:21:25',1,'Manual-Automatic','Manual-Automático'),
	(4,'Secuencial','2017-08-03 19:49:11',1,'Sequential','Secuencial');

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
  `pasajeros` int(1) DEFAULT '4',
  `imagen` varchar(200) DEFAULT 'default.jpg',
  PRIMARY KEY (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;

INSERT INTO `vehiculos` (`id_vehiculo`, `patente`, `id_modelo`, `id_marca`, `id_transmision`, `id_combustible`, `id_categoria`, `id_tarifa`, `disponible`, `c_date`, `estado`, `pasajeros`, `imagen`)
VALUES
	(1,'BXXD96',8,61,1,1,1,1,1,'2017-08-04 17:10:57',1,4,'default.jpg'),
	(2,'BBHK96',13,31,3,2,5,2,1,'2017-08-07 11:22:23',1,4,'default.jpg'),
	(3,'VV2384',8,61,1,1,1,1,1,'2017-08-13 18:04:46',1,4,'default.jpg'),
	(4,'VV2365',8,61,1,1,1,1,1,'2017-08-13 18:05:11',1,4,'default.jpg'),
	(5,'SFWE98',13,31,2,2,5,2,1,'2017-08-13 18:30:45',1,4,'default.jpg'),
	(6,'FEFE12',8,61,2,1,1,3,1,'2018-03-04 23:12:06',1,4,'default.jpg');

/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla web_faq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `web_faq`;

CREATE TABLE `web_faq` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL,
  `cdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado_pregunta` tinyint(1) DEFAULT '1',
  `lang` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla webpay
# ------------------------------------------------------------

DROP TABLE IF EXISTS `webpay`;

CREATE TABLE `webpay` (
  `id_transaccion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `accountingDate` varchar(10) DEFAULT NULL,
  `buyOrder` varchar(20) DEFAULT NULL,
  `cardNumber` int(20) DEFAULT NULL,
  `cardExpirationDate` int(5) DEFAULT NULL,
  `authorizationCode` int(11) DEFAULT NULL,
  `paymentTypeCode` varchar(20) DEFAULT NULL,
  `responseCode` int(11) DEFAULT NULL,
  `sharesNumber` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `commerceCode` int(15) DEFAULT NULL,
  `buyOrder2` varchar(20) DEFAULT NULL,
  `sessionId` int(11) DEFAULT NULL,
  `transactionDate` timestamp NULL DEFAULT NULL,
  `urlRedirection` text,
  `VCI` varchar(5) DEFAULT NULL,
  `tbk_token` text,
  PRIMARY KEY (`id_transaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `webpay` WRITE;
/*!40000 ALTER TABLE `webpay` DISABLE KEYS */;

INSERT INTO `webpay` (`id_transaccion`, `accountingDate`, `buyOrder`, `cardNumber`, `cardExpirationDate`, `authorizationCode`, `paymentTypeCode`, `responseCode`, `sharesNumber`, `amount`, `commerceCode`, `buyOrder2`, `sessionId`, `transactionDate`, `urlRedirection`, `VCI`, `tbk_token`)
VALUES
	(25,'1220','RK201712208428',5678,NULL,292100,'VD',0,0,333200,2147483647,'RK201712208428',5,'2017-12-20 02:10:42','https://webpay3gint.transbank.cl/filtroUnificado/voucher.cgi','TSY',NULL),
	(26,'1220','RK20171220F226',5678,NULL,0,'VD',-1,0,47600,2147483647,'RK20171220F226',5,'2017-12-20 02:13:42','http://localhost/web.koyer/en/pago/anulado/','TSN',NULL),
	(27,'1220','RK201712201E70',6623,NULL,1213,'VN',0,0,190400,2147483647,'RK201712201E70',5,'2017-12-20 02:22:13','https://webpay3gint.transbank.cl/filtroUnificado/voucher.cgi','TSY',NULL);

/*!40000 ALTER TABLE `webpay` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
