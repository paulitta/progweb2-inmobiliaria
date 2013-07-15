<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro Usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/slider.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/jqtransform.css">
    <script src="../js/jquery-1.7.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
   	<script src="../js/jquery-validation-1.11.1/dist/jquery.validate.js"></script>
    <script src="../js/cufon-yui.js"></script>
    <script src="../js/vegur_400.font.js"></script>
    <script src="../js/Vegur_bold_700.font.js"></script>
    <script src="../js/cufon-replace.js"></script>
    <script src="../js/tms-0.4.x.js"></script>
    <script src="../js/jquery.jqtransform.js"></script>
    <script src="../js/FF-cash.js"></script>
    <script src="../js/main.js"></script>
    <script>
		$(document).ready(function(){
			/*$('.registroUsiario').jqTransform();	PLUGIN PARA EMBELLECER EL FORM. NO DEJA USAR AJAX.*/				   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:'.prev',
				nextBu:'.next',
				playBu:false,
				duration:1000,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:false,
				banners:false,
				waitBannerAnimation:false,
				progressBar:false
			});
		});
	</script>
    <script>
$().ready(function() { 
    // Configuramos la validación de los distintos campos del formulario
    $("#registroUsuario").validate({
        // Empezamos por las reglas
      rules: {
            nombre: "required", // Para el campo nombre(nombre) pedimos que sea requerido.
            apellido: "required",  // Lo mismo para el campo apellido.
            username: { // Cuando hay mas de una regla abriremos llaves, aqui validamos username
						required: true, // Tienes que ser requerido
						minlength: 2    // Tiene que tener un tamaño mayor o igual a dos caracteres
					  },

            password: {  // reglas para el campo password
						required: true, // Tienes que ser requerido
						minlength: 5    // Tiene que tener un tamaño mayor o igual a cinco caracteres
          },

            confirm_password: { // reglas para el campo confirm_password
					   required: true, // Tienes que ser requerido
					   minlength: 5,   // Tiene que tener un tamaño mayor o igual a cinco caracteres
					   equalTo: "#password"  // Tiene que ser igual que el campo password y para ello indicamos su id
            },
            email: {  // un nuevo caso es identificar que es un email valido osea que tiene formato de email
					required: true,
					email: true  // para ello el metodo email: true comprobara esta validación
            },
       },
        messages: { // La segunda parte es configurar los mensajes, por lo que tengo que ir indicando para cada campo y cada regla el mensaje que quiero mostrar si no se cumple.
            nombre: "Por favor, introduzca su Nombre",
            apellido: "Por favor, introduzca sus Apellidos",
            username: {
                required: "Por favor, introduzca su Nombre de Usuario",
                minlength: "El Nombre de usuario debe de tener al menos 2 caracteres"
            },
            password: {
                required: "Por favor, introduzca su password",
                minlength: "Su password debe de tener al menos 5 caracteres"
            },
            confirm_password: {
                required: "Por favor, introduzca de nuevo su password",
                minlength: "Su password debe de tener al menos 5 caracteres",
                equalTo: "Las password introducidas no son iguales"
            },
            email: "Por favor, introduzca un email valido",
        }
    });
});

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<div class="main">
<!--==============================header=================================-->
<header>

    <div>
        <h1><a href="../php/index.php"><img src="../images/logo.jpg" alt=""></a></h1>             
        <div class="social-icons">               
        	<span>Seguinos:</span>
            <a href="https://www.plus.google.com" target="_blank" class="icon-3"></a>
            <a href="https://www.facebook.com" target="_blank" class="icon-2"></a>
            <a href="https://www.twitter.com/" target="_blank" class="icon-1"></a>
        </div>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                    <li><img src="../images/slider-1.jpg" alt="" /></li>
                    <li><img src="../images/slider-2.jpg" alt="" /></li>
                    <li><img src="../images/slider-3.jpg" alt="" /></li>
                </ul>
            </div>	
            <a href="#" class="prev"></a><a href="#" class="next"></a>
        </div>
        <nav class="opciones">
            <ul class="menu">
                <li><a href="../php/inmueble_nuevo.php">Crear Inmueble</a></li>
                <li><a href="../php/tabla_editarEliminar.php">Editar / Eliminar Inmueble</a></li>
                <li class="current"><a href="../php/registroUsuario.php">Alta de Usuario</a></li>
            </ul>
        </nav>
    </div>
</header>


<!--==============================content================================-->    
<section id="content"><div class="ic"></div>
	<div class="container_12">	
        <div class="grid_8">
            <h2 class="top-1 p3"> Alta de Usuario </h2>
       		<div class="wrap block-2">
			<form id="registroUsuario" class="form-1 bot-1" action="registroUsuarioQuery.php" method="post">
				<fieldset>
					<div>
						<label for="nombre">Nombre</label>
						<input id="nombre" class="input-text" name="nombre" />
					</div>
					<div>
						<label for="apellido">Apellido</label>
						<input id="apellido" class="input-text" name="apellido" />
					</div>
					<div>
						<label for="username">Nombre de Usuario</label>
						<input id="username" class="input-text" name="username" />
					</div>
					<div>
						<label for="password">Password</label>
						<input id="password" class="input-text" name="password" type="password" />
					</div>
					<div>
						<label for="confirm_password">Repite password</label>
						<input id="confirm_password" class="input-text" name="confirm_password" type="password" />
					</div>
					<div>
					<label for="email">Email</label>
					<input id="email" class="input-text" name="email" />
					</div> 
					
					
					<?php
						@include_once("sesionActiva.php");
						if(isset($_SESSION["admin"]) && $_SESSION["admin"] =="SI" ){
					?>
						<div>
						<label for="administrador">Administrador</label>
						<input id="administrador" class="input-text"  name="administrador" type="checkbox" />
						</div>
					<?php
					}
					?>
					<!--<a onClick="document.getElementById('form1').submit()" class="button">Aceptar</a>-->
					<input class="button" type="submit" value="Aceptar"  />
				</fieldset>
			</form>
			</div>
		
			<?php
				if(isset( $_SESSION['mensaje']))
					{
						echo $_SESSION['mensaje'];
						unset($_SESSION['mensaje']);
					}
			?>
		</div>	
		<div class="clear"></div>
	</div>
</section>
</div>
<!--==============================footer=================================-->
<footer>
    <p>© 2013 Mi Inmobiliaria</p>
    <p>Website made by Paula and Agostina</p>
</footer>	    
<script>
	Cufon.now();    
</script>
</body>
</html>