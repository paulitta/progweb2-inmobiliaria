<?php

	include_once("sesionActiva.php");
	include_once("timeLogout.php");
	include_once("conexion.php");
	$conexion = new mysqli ($server,$username,$password,$database);

	if($conexion){
	
		if($_GET["flag"] == "b"){
		
			$borra1 = $conexion -> query("delete from imagen where id_inmueble=".$_REQUEST["cod"]."");
			
			$borra2 = $conexion -> query("delete from inmueble where cod=".$_REQUEST["cod"]."");
										
					
			$conexion->close();

			include_once("tabla_editarEliminar.php");
					
		}else{
		
			include_once("inmueble_editar.php");

		}
							
	}
	else{
		echo "No ". $conexion->connect_error;			
	}





?>