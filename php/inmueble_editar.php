<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar/eliminar Inmueble</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/slider-2.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/jqtransform.css">
    <script src="../js/jquery-1.7.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/cufon-yui.js"></script>
    <script src="../js/vegur_400.font.js"></script>
    <script src="../js/Vegur_bold_700.font.js"></script>
    <script src="../js/cufon-replace.js"></script>
    <script src="../js/tms-0.4.x.js"></script>
    <script src="../js/jquery.jqtransform.js"></script>
    <script src="../js/FF-cash.js"></script>
	<script src="../js/main.js"></script>
    <script src="../js/jquery-validation-1.11.1/dist/jquery.validate.js"></script>
    <script>
		$(document).ready(function(){
			/*$('.form-1').jqTransform();	*/				   	
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
			})		
		});
	</script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
	

</head>
<body>
	
    <?php
		@include_once("sesionActiva.php");
		include_once("timeLogout.php");
		include_once("busqueda.php");
		$busqueda = new Busqueda();
    ?>
	<?php
					
		include_once("conexion.php");
		$conexion = new mysqli ($server,$username,$password,$database);
					
		$resultado = $conexion -> query("select i.cod, i.direccion, ciu.nombre as ciudad, i.descripcion, i. operacion, i.moneda, i.precio
			from inmueble i, ciudad ciu
			where i.id_ciudad = ciu.id_ciudad
			and i.cod = '".$_REQUEST["cod"]."'"); //HACER STORED PROCEDURE
			
		$obj = $resultado -> fetch_object();
						
	?>
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
                <li><a href="../php/registroUsuario.php">Alta de Usuario</a></li>
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content"><div class="ic"></div>
    <div class="container_12">
		<div class="grid_izq">
			
			<h2 class="top-1 p3">Editar el siguiente inmuble:</h2>
			
			Inmueble Nro <?php echo $obj->cod; ?> con direccion en <?php echo $obj->direccion." ".$obj->ciudad; ?>
				<br/><br/>
				<form id="form1" class="form-1 bot-1" action="../php/update_tabla.php?" method="post" enctype="multipart/form-data">
					<fieldset>
						
						<div class="div-oculto">
							<input type="text" name="cod" value="<?php echo $obj->cod; ?>"/>
						</div>
						
						<div class="select-1">
							<label>Descripción</label><br/>
							<textarea rows="4" cols="50" name="descripcion" class="input-text"><?php echo $obj->descripcion; ?></textarea>	
						</div>
						
						<div class="select-1">
							<label>Operacion</label>
							<select name="operacion" >
								<option value="0" selected> </option>
								<option value="venta">Venta</option>
								<option value="alquiler">Alquiler</option>
								<option value="alquiler temporario">Alquiler Temporario</option>
							</select>   
						</div>
						
						<div class="select-1">
							<label>Moneda</label><br/>
								<input type="radio" value="pesos" name="moneda" id="" /><span>Pesos</span>
								<input type="radio" value="dolares" name="moneda" id="" /><span>Dolares</span>
						</div>
						
						<div class="select-1">
							<label for="preciomin">Precio</label>
							<input type="text" class="input-text" id="precio" name="precio" class="precio" value="<?php echo $obj->precio; ?>"/>	
						</div>
						
						
						<?php
						
							$resultado->close();
					
							$conexion->close();

						?>	
						

						<a onClick="document.getElementById('form1').submit()" class="button">Aceptar</a>
						<div class="clear"></div>
					</fieldset>
				</form>	
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