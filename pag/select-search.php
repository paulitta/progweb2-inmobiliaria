	<?php
include("../php/objetos.php");
	$db = new Bdd();

        echo $db->buscarCasa($_REQUEST['catego'],$_REQUEST['tipo'],$_REQUEST['ambientes'],
            $_REQUEST['ciudad'],$_REQUEST['operacion'],$_REQUEST['moneda'],
            $_REQUEST['preciomin']);

        ?>