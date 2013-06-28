	<?php
include("../php/bdd.php");
	$db = new Bdd();

        echo $db->buscarCasa($_REQUEST['ambientes'],$_REQUEST['ciudad'],$_REQUEST['operacion'],
            $_REQUEST['moneda'],$_REQUEST['preciomin'],$_REQUEST['preciomax']);

        ?>