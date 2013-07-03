-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-07-2013 a las 02:52:12
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cantInmuebles`()
BEGIN
  SELECT 'Number of records: ', count(*) from inmueble;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cierto_inmueble`(IN `ambienten` INT(11), IN `ciudad` INT(11), IN `operacionn` VARCHAR(45), IN `monedan` VARCHAR(45), IN `preciomin` FLOAT(11), IN `preciomax` FLOAT(11), IN `tipo` INT(11))
BEGIN
    SELECT * FROM inmueble WHERE id_tipo = tipo AND
    ambientes = ambienten AND
    id_ciudad = ciudad AND
    operacion = operacionn AND
    moneda = monedan AND
    precio > preciomin AND
    precio < preciomax;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recorrer_categorias`()
    NO SQL
select * from categoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recorrer_ciudades`()
    NO SQL
select * from ciudad$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `traerInmuebles`()
BEGIN

    SELECT * FROM inmueble;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nombre`) VALUES
(1, 'casas'),
(2, 'departamentos'),
(3, 'locales'),
(4, 'lotes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`) VALUES
(1, 'Ramos Mejia'),
(2, 'Moron'),
(3, 'Tapiales'),
(4, 'Castelar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE IF NOT EXISTS `inmueble` (
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
  KEY `fk_ciudad_idx` (`id_ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`cod`, `id_cat`, `id_tipo`, `ambientes`, `direccion`, `id_ciudad`, `descripcion`, `operacion`, `moneda`, `precio`, `fecha_publi`, `id_markers`) VALUES
(3, 1, 1, 3, 'Tuyuti 1234', 1, 'Casa', 'Alquiler', 'pesos', 12221, '2013-07-02', 1),
(4, 1, 1, 3, 'Donovan 1234', 1, 'Casa', 'Venta', 'pesos', 5000, '2013-07-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Marker1', 'Tuyuti 1234', 1.000000, 2.000000, 'latitid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `fk_categoria` (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`, `id_cat`) VALUES
(1, 'casa', 1),
(2, 'chalet', 1),
(3, 'triplex', 1),
(4, 'departamento', 2),
(5, 'duplex', 2),
(6, 'PH', 2),
(7, 'local', 3),
(8, 'lote', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `mail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `fk_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_markers` FOREIGN KEY (`id_markers`) REFERENCES `markers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
