
/*cierto_inmueble*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `cierto_inmueble`(IN `ambienten` INT(11), IN `ciudad` INT(11), IN `operacionn` VARCHAR(45), IN `monedan` VARCHAR(45), IN `preciomin` FLOAT(11), IN `preciomax` FLOAT(11), IN `tipo` INT(11))
BEGIN
    SELECT * FROM inmueble WHERE id_tipo = tipo AND
    ambientes = ambienten AND
    id_ciudad = ciudad AND
    operacion = operacionn AND
    moneda = monedan AND
    precio > preciomin AND
    precio < preciomax;
END;;


/*contar_propiedades*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `contar_propiedades`()
    NO SQL
select count(*) from inmueble;;


/*recorrer_categorias*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `recorrer_categorias`()
    NO SQL
select * from categoria;;


/*recorrer_ciudades*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `recorrer_ciudades`()
    NO SQL
SELECT * 
FROM  `ciudad`;;


/*traer_inmuebles*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_inmuebles`()
BEGIN

    SELECT * FROM inmueble;

END;;

/*traer tipos */

CREATE DEFINER=`root`@`localhost` PROCEDURE `tipos`()
    NO SQL
SELECT *
FROM `tipo`;;