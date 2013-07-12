<!DOCTYPE html>
<html lang="en">
<head>
    <title>Propiedades</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/slider.css">
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
    <script>
		$(document).ready(function(){
			$('.form-1').jqTransform();	/*PLUGIN PARA EMBELLECER EL FORM. NO DEJA USAR AJAX.*/				   	
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
		include_once("sesionActiva.php");
		include_once("timeLogout.php");
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
        <nav>
            <ul class="menu">
                <li><a href="../php/index.php">Propiedades</a></li>
                <li><a href="../php/servicios.php">Servicios</a></li>
                <li><a href="../php/sucursales.html">Sucursales</a></li>
                <li><a href="../php/sobre_nosotros.html">Sobre Nosotros</a></li>
                <li><a href="../php/contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content"><div class="ic"></div>
    <div class="container_12">	
		<div class="grid_izq">
        

        <h2 class="top-1 p3">Cree un inmueble:</h2>
        <!-- Doble columna -->
         <div class="wrap block-2">
		 
			<form id="form1" class="form-1 bot-1" action="php/select-search.php" method="post" enctype="multipart/form-data">
                        <fieldset>
						<div class="select-1">
							<label>Categoria</label>
							<select id="catego" onclick="recargarCategorias();" required>
								<?php
                                $busqueda->recorrerCategorias();
                                ?>
							</select>   
						</div>
				
						<!-- Este tiene que cambiar en base a la opción anterior -->
						<div id="tipos" class="select-1">
							
						</div>
				
						<!--Este div debe quedar deshabilitado si se elige como opción Locales y Lotes-->
						<div class="select-1">
							<label>Ambientes</label>
							<input type="text" id="ambiente" name="ambiente" class="ambiente"/>
						</div>
				
						<div class="select-1">
							<label>Ciudad</label>
							<select name="ciudad">
                                <?php
                                $busqueda->recorrerCiudades();
                                ?>
                            </select>  

							Agregar...
						</div>
						
						<div class="select-1">
							<label>Dirección</label>
							<input type="text" id="ambiente" name="ambiente" class="ambiente"/>

						</div>
						
				
						<div class="select-1">
							<label>Operacion</label>
							<select name="operacion" >
								<option value="0">Todos</option>
								<option value="venta">Venta</option>
								<option value="alquiler">Alquiler</option>
								<option value="alquiler temporario">Alquiler Temporario</option>
							</select>   
						</div>	

						<div class="select-1">
							<label>Moneda</label><br/>
							  	<input type="radio" checked="" value="todas" name="moneda" id=""/><span>Todas</span>
							  	<input type="radio" value="pesos" name="moneda" id=""/><span>Pesos</span>
							  	<input type="radio" value="dolares" name="moneda" id=""/><span>Dolares</span>
						</div>


						<div class="select-1">
							<label for="preciomin">Precio</label>
							<input type="text" id="preciomin" name="preciomin" class="precios"/>	
						</div>
						
						<div class="select-1">
							<label>Descripción</label></br>
							<textarea rows="4" cols="50"></textarea>	
						</div>
						
						<div class="select-1">
							<label>Subir imagen</label><br/>
							  	<input name="file" type="file"  onChange="ver(form.file.value)"> 
						</div>
						

                        <div class=""><a onClick="document.getElementById('form1').submit()" class="button">Crear Inmueble</a>
                        <div class="clear"></div>
                        </fieldset>
					</form>
        </div>

        </div> 

		<!--
        <div class="wrap block-1">			
			<div class="grid_der">                
				<div class="left-1">
    
					<h2 class="top-4 p3"><a href="../php/registro.php">Registrar Usuario</a></h2>
					
					<h2 class="top-4 p3">Edite o elimine un inmueble</h2>
					
				</div>
				
			</div>
			<div class="clear"></div>
		
        </div> -->
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