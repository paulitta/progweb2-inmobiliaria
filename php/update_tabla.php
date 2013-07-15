<?php

	include_once("sesionActiva.php");
	include_once("timeLogout.php");
	include_once("conexion.php");
	$conexion = new mysqli ($server,$username,$password,$database);

	if($conexion){
		
			$update = $conexion -> query("update inmueble set descripcion = '". $_REQUEST["descripcion"]."', operacion = '".$_REQUEST["operacion"]."', moneda = '".$_REQUEST["moneda"]."', precio = ".$_REQUEST["precio"]." 
										where cod = ".$_REQUEST["cod"]."");
				
			$conexion->close();

			include_once("tabla_editarEliminar.php");
									
	}
	else{
		echo "No ". $conexion->connect_error;			
	}



?>