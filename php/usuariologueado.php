<?php
session_start();
// Configura los datos de tu cuenta
$dbhost='localhost';
$dbusername='root';
$dbuserpass='';
$dbname='inmobiliaria';

// Conectar a la base de datos
mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die('Cannot select database');
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
					/*$query = mysql_query("SELECT nombre,password FROM usuario WHERE nombre = '$username'") or die(mysql_error());
					$row = mysql_fetch_array($query);
					$_SESSION["s_username"] = $row['nombre'];*/
					$_SESSION["s_username"] = $data['nombre'];
					echo "Has sido logueado correctamente ".$_SESSION['s_username']." y puedes acceder al index.php.";
					include_once("index.php");

				}
	}
}
?>