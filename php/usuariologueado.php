<?php
session_start();

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
		$query = mysql_query("SELECT nombre,password FROM usuario WHERE nombre = '$username'") or die(mysql_error());
		$data = mysql_fetch_array($query);
		if($data['password'] != $password) {
				echo "Login incorrecto";
			}else{
					$_SESSION["admin"] = $data['nombre'];
					include_once("index.php");
				}
	}
}
?>