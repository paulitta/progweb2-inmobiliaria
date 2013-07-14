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
										
		$consulta = $conexion -> query("select count(*) as cantidad from inmueble");
		$obj = $consulta -> fetch_object();
		$inmueble = $obj->cantidad;

		$ruta = "../images/imagenes_subidas/";
		$ruta = $ruta . basename( $_FILES['imagen']['name']);
		if(move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) 
			{
			$arc = $_FILES['imagen']['name'];
			$foto = $conexion -> query("insert into imagen (ruta, id_inmueble) values ('$arc', '$inmueble')");
			$_SESSION["mensaje"] = "Se ha creado correctamente";
			
		} else{
			$_SESSION["mensaje"] = "Hubo un error inesperado";
		}

		$consulta->close();
		$conexion->close();

		include_once("inmueble_nuevo.php");
				
	}
	else{
		echo "No ". $conexion->connect_error;			
	}

?>