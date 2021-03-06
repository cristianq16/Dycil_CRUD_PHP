﻿
CREATE DATABASE CRUD;
USE CRUD;
CREATE TABLE `clientes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `vendedor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

#
# Data for table "clientes"
#

REPLACE INTO `clientes` VALUES (17,'juan','Camargo','cristiancq16@gmail.com','3192220416','calle 76 # 32-270','Jose'),(18,'Cristian','Camargo','cristiancq16@gmail.com','3192220416','calle 76 # 32-27','Cristian'),(19,'Cristian','Camargo Quintero','cristiancq16@gmail.com','3192220416','calle 76 # 32-270','juan'),(20,'Daniela','Calderon','cristiancq16@gmail.com','3192220416','calle 76 # 32-270','Cristian'),(21,'daniela','Camargo','cristiancq16@gmail.com','3192220416','calle 76 # 32-270','Cristian'),(23,'hugo','calder','cristiancq16@gmail.com','3192220416','calle 76 # 32-270','Cristian'),(29,'Cristian','Camargo Quintero','cristiancq16@gmail.com','3192220416','calle 76 # 32-270','Cristian');

#
# Structure for table "vendedores"
#

CREATE TABLE `vendedores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `docIdent` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

#
# Data for table "vendedores"
#

REPLACE INTO `vendedores` VALUES (76,'Cristian','Camargo Quintero','114087165','cristiancq16@gmail.co','masculino','2018-10-11');
