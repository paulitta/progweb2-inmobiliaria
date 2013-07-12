-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2013 a las 16:54:32
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`) VALUES
(1, 'San Justo'),
(2, 'Capital Federal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(45) NOT NULL,
  `id_inmueble` int(11) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `fk_inmueble_idx` (`id_inmueble`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE IF NOT EXISTS `inmueble` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `ambientes` int(11) DEFAULT NULL,
  `direccion` varchar(45) CHARACTER SET latin1 NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `descripcion` varchar(300) CHARACTER SET latin1 NOT NULL,
  `operacion` varchar(45) CHARACTER SET latin1 NOT NULL,
  `moneda` varchar(45) CHARACTER SET latin1 NOT NULL,
  `precio` float NOT NULL,
  `fecha_publi` date NOT NULL,
  `latitud` varchar(20) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_cate_idx` (`id_cat`),
  KEY `fk_tipo_idx` (`id_tipo`),
  KEY `fk_ciudad_idx` (`id_ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`cod`, `id_cat`, `id_tipo`, `ambientes`, `direccion`, `id_ciudad`, `descripcion`, `operacion`, `moneda`, `precio`, `fecha_publi`, `latitud`, `longitud`) VALUES
(1, 1, 1, 3, 'Florencio Varela 1903', 1, 'Linda facu', 'venta', 'pesos', 1000000, '2013-07-12', '-34.66987', '-58.562218');

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
  `mail` varchar(45) NOT NULL,
  `administrador` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='			' AUTO_INCREMENT=3 ;


--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `password`, `mail`, `administrador`) VALUES
(1, 'pepe', '12345', 'pepe@test.com', 'SI'),
(2, 'pau', '54321', 'pau@test.com', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_inmueble` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
