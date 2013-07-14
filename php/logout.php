<?php
include_once("sesionActiva.php"); 
if(isset($_SESSION)){
unset($_SESSION['admin']);
unset($_SESSION['nombre']);
session_destroy();
}header("location:index.php");
?>