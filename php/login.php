<?php
include_once("sesionActiva.php");
if(isset($_SESSION['admin'])){
?>
<form id="logout" class="form-1 top-1">
    <div>
    	<a href="logout.php"class="button">Salir</a> 
    </div>
</form> 	
<?php
}else{
?>
<form id="login" class="form-1 top-1" method= "POST" action = "usuariologueado.php">
	<div class="select-2">
        <label>Usuario</label> 
        <input name="username" type="text" id="username" />  
    </div>
    <div class="select-2 last">
    	<label>Contraseña</label>
        <input type="password" name="password"  id="password"/>
    </div> 
    <div>
    	<a href="#" onClick="document.getElementById('login').submit()" class="button">Entrar</a> 
    </div>
</form> 
<?php
	}
?>