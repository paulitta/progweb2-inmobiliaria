    <?php
		include_once("timeLogout.php");
		include_once("conexion.php");
		
	$administrador = "NO";
	
	if(isset($_REQUEST["administrador"])){
		$administrador = "SI";
	}
		// Conectar a la base de datos
		$conexion = new mysqli ($server,$username,$password,$database);
		
		if($conexion){
		
		$resultado = $conexion -> query("select usuario
		from usuario
		where usuario = '".$_REQUEST["username"]."'");
		
		$obj = $resultado -> fetch_object();
		$resultado->close();
		if(isset($obj)){
			$_SESSION["mensaje"] ="el nombre de usuario ya esta siendo utilizado"; 
			}else
				{
					$insercion = $conexion -> query ("insert into usuario (nombre, apellido, usuario, password, mail, administrador) values ('".$_REQUEST["nombre"]."','".$_REQUEST["apellido"]."','".$_REQUEST["username"]."','".$_REQUEST["password"]."','".$_REQUEST["email"]."','$administrador')");
					
					$_SESSION["mensaje"] = $administrador; 
				}
		$conexion->close();
		
		}
		else{
		echo "No ". $conexion->connect_error;	
		}
		include_once("registroUsuario.php");
	?> 