-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2013 a las 17:46:26
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `inmobiliaria`.`categoria` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `inmobiliaria`.`categoria` (`id_cat`, `nombre`) VALUES
(1, 'casas'),
(2, 'departamentos'),
(3, 'locales'),
(4, 'lotes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `inmobiliaria`.`tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `fk_categoria` (`id_cat`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `inmobiliaria`.`tipo` (`id_tipo`, `nombre`, `id_cat`) VALUES
(1, 'casa', 1),
(2 , 'chalet', 1),
(3 , 'triplex', 1),
(4 , 'departamento', 2),
(5 , 'duplex', 2),
(6 , 'PH',2 ),
(7 , 'local', 3),
(8 , 'lote', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `inmobiliaria`.`ciudad` (
   `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
   `nombre` varchar(45) NOT NULL,
   PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE `inmobiliaria`.`markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmobiliaria`.`inmueble` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `ambientes` int(11) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `operacion` varchar(45) NOT NULL,
  `moneda` varchar(45) NOT NULL,
  `precio` float NOT NULL,
  `fecha_publi` date NOT NULL,
  `id_markers` int(11) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_markers_idx` (`id_markers`),
  KEY `fk_cate_idx` (`id_cat`),
  KEY `fk_tipo_idx` (`id_tipo`),
  KEY `fk_ciudad_idx` (`id_ciudad`),
  CONSTRAINT `fk_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cate` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_markers` FOREIGN KEY (`id_markers`) REFERENCES `markers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
   `idusuario` int(11) NOT NULL AUTO_INCREMENT,
   `nombre` varchar(45) NOT NULL,
   `password` varchar(45) NOT NULL,
   `mail` varchar(45) DEFAULT NULL,
   PRIMARY KEY (`idusuario`)
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
