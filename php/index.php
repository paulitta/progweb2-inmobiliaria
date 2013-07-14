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
    <script src="../js/jquery-validation-1.11.1/dist/jquery.validate.js"></script>
    <script>
		$(document).ready(function(){
			/*$('.form-1').jqTransform();	PLUGIN PARA EMBELLECER EL FORM. NO DEJA USAR AJAX.*/				   	
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
            $("#form1").validate({
              rules: {
                preciomin: {
                    digits:true
                },
                preciomax: {
                    digits:true
                }
              }
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
		include("../php/busqueda.php");
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
        <nav>
            <ul class="menu">
                <li class="current"><a href="../php/index.php">Propiedades</a></li>
                <li><a href="../php/servicios.php">Servicios</a></li>
                <li><a href="../php/sucursales.html">Sucursales</a></li>
                <li><a href="../php/sobre_nosotros.html">Sobre Nosotros</a></li>
                <li><a href="../php/contacto.html">Contacto</a></li>
                <!--<li><a href="contacts.html">Contacts</a></li>-->
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content"><div class="ic"></div>
    <div class="container_12">	
		<div class="grid_8">
        <?php
			if( isset($_SESSION['nombre'])){
		?>
        	<h2 class="top-1 p3">Bienvenido  <?php  echo $_SESSION['nombre']?>!</h2>
        <?php
			}else{
		?>
        	<h2 class="top-1 p3">Bienvenido!</h2>
        <?php
			}
		?>
        <p class="line-1">Con nosotros usted podrá encontrar el inmueble que estaba buscando de una manera eficiente.</p>
        <!--<p class="line-1">Download the basic package of this <a href="http://blog.templatemonster.com/2012/04/09/free-website-template-real-estate-justslider/" target="_blank" class="link">Real Estate Template</a> (without PSD source) that is available for anyone without registration. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the free template ZIP package to be delivered to.</p>-->
        <!--<h2 class="p4">Buyers. Sellers. Proprietors. Agents.</h2>-->

        <h2 class="p3">Ultimas propiedades</h2>
        <!-- Doble columna -->
         <div class="wrap block-2">
        	<div class="ultimas">
        		<a href="#"><img src="../images/page2-img1.jpg" alt="" class="img-border img-margin"></a>
        	<h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        	</div>
            <div class="ultimas">
            	<a href="#"><img src="../images/page2-img2.jpg" alt="" class="img-border img-margin"></a>
            <h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        </div>
            <div class="ultimas">
            	<a href="#"><img src="../images/page2-img3.jpg" alt="" class="img-border img-margin"></a>
            <h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        </div>
           <div class="ultimas">
           	<a href="#" class="last"><img src="../images/page2-img4.jpg" alt="" class="img-border img-margin"></a>
           <h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        </div>

        <div class="ultimas">
        		<a href="#"><img src="../images/page2-img1.jpg" alt="" class="img-border img-margin"></a>
        	<h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        	</div>
            <div class="ultimas">
            	<a href="#"><img src="../images/page2-img2.jpg" alt="" class="img-border img-margin"></a>
            <h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        </div>
            <div class="ultimas">
            	<a href="#"><img src="../images/page2-img3.jpg" alt="" class="img-border img-margin"></a>
            <h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        </div>
           <div class="ultimas">
           	<a href="#" class="last"><img src="../images/page2-img4.jpg" alt="" class="img-border img-margin"></a>
           <h4 class="">Duplex en palermo</h4>
        	<p>Bellisima propiedad  ubicada en Capital Federal.</p>
        </div>
        </div>

        </div> 


        <div class="wrap block-1">			
			<div class="grid_4">                
				<div class="left-1">
                    <?php 
						include_once("../php/login.php");
					?>
    
					<h2 class="top-4 p3">Buscador</h2>
					<form id="form1" class="form-1 bot-1" action="../php/resultado.php">
                        <fieldset>
						<div class="select-1">
							<label>Categoria</label>
							<select name="catego" onclick="recargarCategorias();" required>
								<?php
                                $busqueda->recorrerCategorias();
                                ?>
							</select>   
						</div>
				
						<!-- Este tiene que cambiar en base a la opción anterior -->
						<div id="tipos" class="select-1">
							<div class='hidden'><label>Tipo</label>
								<select name='tipo' ><option value=0>Todos</option>
								</select></div>
						</div>
				
						<!--Este div debe quedar deshabilitado si se elige como opción Locales y Lotes-->
						<div class="select-1">
							<label>Ambientes</label>
							<select name="ambientes" >
								<option value="0">Todos</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">Mas</option>
							</select>   
						</div>
				
						<div class="select-1">
							<label>Ciudad</label>
							<select name="ciudad" >
                                <?php
                                $busqueda->recorrerCiudades();
                                ?>
                            </select>   
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
							  	<input type="radio" checked="" value="todas" name="moneda" id="" /><span>Todas</span>
							  	<input type="radio" value="pesos" name="moneda" id="" /><span>Pesos</span>
							  	<input type="radio" value="dolares" name="moneda" id="" /><span>Dolares</span>
						</div>


						<div class="select-2">
							<label for="preciomin">Precio min.</label>
							<input type="text" id="preciomin" name="preciomin" class="precios"/>	
						</div>
						<div class="select-2 last">
							<label for="preciomax">Precio max.</label>
							<input type="text" id="preciomax" name="preciomax" class="precios" /> 
						</div>

                        <div class="">
                        <input type="submit" class="button" value="Buscar" />
                        <div class="clear"></div>
                        </fieldset>
					</form>
				</div>
				
			</div>
			<div class="clear"></div>
		
        </div>
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