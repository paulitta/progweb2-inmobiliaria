<?php 
include_once("sesionActiva.php");
$_SESSION['hora']=time();
/*echo $_SESSION['hora']+10;
echo " mayor ";
echo time();*/
if (time()> ($_SESSION['hora']+10)) 
{ 
session_unset(); 
session_destroy(); 
echo "Lo siento tu sesión ha expirado, has estado mas de 20 minutos inactivo\n"; 
echo '<a href="index.php">Clic aqui para volver a loguearte</a>'; 
// tambien puedes usar un header 
} 
else 
{ 
$_SESSION['hora']=time(); 
}