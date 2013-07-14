<?php

include_once("timeLogout.php");
include_once("conexion.php");

// Conectar a la base de datos
mysql_connect ($server, $username, $password);
mysql_select_db($database) or die('Cannot select database');
if ($_POST['username']) {

	//Comprobacion del envio del nombre de usuario y password
	$username=$_POST['username'];
	$password=$_POST['password'];
	if ($password==NULL) {
		echo "La password no fue enviada";
	}else{
		$query = mysql_query("SELECT nombre,apellido,usuario,password, administrador FROM usuario WHERE usuario = '$username'") or die(mysql_error());
		$data = mysql_fetch_array($query);
		if($data['password'] != $password) {
				echo "Login incorrecto";
			}else{
					include_once("sesionActiva.php");
					$_SESSION["admin"] = $data['administrador'];
					$_SESSION["nombre"] = $data['nombre'];
					$_SESSION["apellido"] = $data['apellido'];
					$_SESSION["usuario"] = $data['usuario'];
					$_SESSION['tiempo']=time();
					
					if($_SESSION['admin']=="SI"){
						include_once("administrador.php");
						}else{
							include_once("index.php");
							}
					}
	}
}
?>