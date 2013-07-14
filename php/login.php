<?php
include_once("sesionActiva.php");
if(isset($_SESSION["nombre"])){

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
       <p>
         <label>Usuario</label> 
         <input name="username" type="text" id="username" />
       </p>
</div>
   <div class="select-2 last">
   <label>Contraseña</label>
       <input type="password" name="password"  id="password"/>
  </div>
  <div class="select-2 last"></div> 
   <div>
   	<a href="#" onClick="document.getElementById('login').submit()" class="button">Ingresar</a> 
       <a href="registroUsuario.php" class="button"> Registrarse...</a>
 </div>
</form> 
<?php
}
?>