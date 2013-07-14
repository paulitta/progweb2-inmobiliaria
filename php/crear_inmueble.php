<?php

	include_once("sesionActiva.php");
	include_once("timeLogout.php");
	include_once("conexion.php");
	$conexion = new mysqli ($server,$username,$password,$database);
	
	if($conexion){
										
		$insercion = $conexion -> query ("insert into inmueble (id_cat, id_tipo, ambientes, direccion, id_ciudad, descripcion, operacion, moneda, precio, fecha_publi, latitud, longitud) 
										values (".$_REQUEST["catego"].",".$_REQUEST["tipo"].",".$_REQUEST["ambientes"].",'".$_REQUEST["direccion"]."','1',
										'".$_REQUEST["descripcion"]."','".$_REQUEST["operacion"]."','".$_REQUEST["moneda"]."',".$_REQUEST["precio"].",CURDATE(),'123456',
										'123456')");
	
		$conexion->close();
		
		$_SESSION["mensaje"] = "Se ha creado correctamente";
		include_once("inmueble_nuevo.php");
				
	}
	else{
		echo "No ". $conexion->connect_error;			
	}

?>