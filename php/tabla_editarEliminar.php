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
                <li class="current"><a href="../php/tabla_editarEliminar.php">Editar / Eliminar Inmueble</a></li>
                <li><a href="../php/registroUsuario.php">Alta de Usuario</a></li>
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content"><div class="ic"></div>
    <div class="container_12">
		<div class="grid_izq">
			
			<h2 class="top-1 p3">Edite o elimine un inmueble:</h2>
				<form id="form1" class="form-1 bot-1" action="../php/inmueble_editaElimina.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<table width="200" border="1" class="tabla-inmuebles">
							<tr class="tabla-titulo">
								<td>Categoria</td>
								<td>Tipo</td>
								<td>Ambientes</td>
								<td>Direccion</td>
								<td>Ciudad</td>
								<td>Descripcion</td>
								<td>Operacion</td>
								<td>Precio</td>
								<td>Eliminar</td>
								<td>Modificar</td>
							</tr>

							<?php
								include_once("timeLogout.php");
								include_once("conexion.php");
								
								// Conectar a la base de datos
								mysql_connect ($server, $username, $password);
								mysql_select_db($database) or die('Cannot select database');
								
								$query = mysql_query("select i.cod, c.nombre as categoria, t.nombre as tipo, i.ambientes, i.direccion, ciu.nombre as ciudad, i.descripcion, i. operacion, i.moneda, i.precio, i.fecha_publi
														from inmueble i, categoria c, tipo t, ciudad ciu
														where i.id_cat = c.id_cat
														and i.id_tipo = t.id_tipo
														and i.id_ciudad = ciu.id_ciudad") or die(mysql_error());

								while($data = mysql_fetch_array($query))
								{
									$cod = $data['cod'];
									echo "<tr>";
									echo "<td>".$data['categoria']."</td>";
									echo "<td>".$data['tipo']."</td>";
									echo "<td>".$data['ambientes']."</td>";
									echo "<td>".$data['direccion']."</td>";
									echo "<td>".$data['ciudad']."</td>";
									echo "<td>".$data['descripcion']."</td>";
									echo "<td>".$data['operacion']."</td>";
									
									if ($data['moneda'] == 'pesos'){
										echo "<td>$".$data['precio']."</td>";
									}else{
										echo "<td>U$"."S".$data['precio']."</td>";
									}
									
									echo "<td><a href="."../php/inmueble_editaElimina.php?cod=$cod&flag="."b"."><img src="."../images/delete.jpg"."></a></td>";
									echo "<td><a href="."../php/inmueble_editaElimina.php?cod=$cod&flag="."e"."><img src="."../images/edit.png"."></a></td>";
									
									echo " </tr>";	
								}
							?>
						</table>
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