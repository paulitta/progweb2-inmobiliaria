<?php

// INICIALIZO LAS VARIABLES 
$latitud= "-34.7026798";
$longitud="-58.5778651";
$zoom= "17";
$tipo_mapa = "ROADMAP";
$direccion = "";
$ciudad = "la matanza";

if (isset($_GET["ciudad"])) $ciudad=  urldecode ($_GET["ciudad"]);
else $ciudad="la matanza";

if (isset($_GET["direccion"])) $direccion=  urldecode ($_GET["direccion"]);
else $direccion="";

// LONGITUD Y LATITUD SI ESTAN COMO PARAMETROS LOS COJO
if (isset($_GET["dir"])) $direccion = $_GET["dir"];
if (strlen ($direccion) <= 8) $direccion =""; // SI LA DIRECCION ES MENOR QUE 8 NO LA PROCESO

// LONGITUD Y LATITUD SI ESTAN COMO PARAMETROS LOS COJO
if (isset($_GET["lon"])) $longitud= $_GET["lon"];
if (isset($_GET["lat"])) $latitud= $_GET["lat"];

// ZOOM ENTRE 0 y 19
if (isset($_GET["zoom"])) $zoom= $_GET["zoom"];
if (($zoom<=0) || ($zoom>=20)){ $zoom= "17";}


// TIPO DE MAPA
if (isset($_GET["tipo"])) $tipo_mapa= strtoupper($_GET["tipo"]);

// COMPRUEBO QUE EL TIPO ES UNO DE LOS QUE ACEPTA GOOGLE
if ($tipo_mapa == "SATELLITE") $error=0;
else
  if ($tipo_mapa == "ROADMAP") $error=0;
  else 	
    if ($tipo_mapa == "TERRAIN")$error=0;
    else $tipo_mapa = "HYBRID";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inmueble Nuevo</title>
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
	
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
    </script>
    <script type="text/javascript">
    
    // VARIABLES GLOBALES JAVASCRIPT
    var geocoder;
    var marker;
    var latLng;
    var latLng2;
    var map;
    
    // INICiALIZACION DE MAPA
    function initialize() {
      geocoder = new google.maps.Geocoder();	
      latLng = new google.maps.LatLng(<?php echo $latitud;?> ,<?php echo $longitud;?>);
      map = new google.maps.Map(document.getElementById('mapCanvas'), {
        zoom:<?php echo $zoom;?>,
        center: latLng,
        mapTypeId: google.maps.MapTypeId.<?php echo $tipo_mapa;?>
      });
    
    // CREACION DEL MARCADOR  
        marker = new google.maps.Marker({
        position: latLng,
        title: 'Arrastra el marcador si quieres moverlo',
        map: map,
        draggable: true
      });

    // Escucho el CLICK sobre el mama y si se produce actualizo la posicion del marcador 
         google.maps.event.addListener(map, 'click', function(event) {
         updateMarker(event.latLng);
       });
      
      // Inicializo los datos del marcador
      //    updateMarkerPosition(latLng);
         
          geocodePosition(latLng);
     
      // Permito los eventos drag/drop sobre el marcador
      google.maps.event.addListener(marker, 'dragstart', function() {
        updateMarkerAddress('Arrastrando...');
      });
     
      google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerStatus('Arrastrando...');
        updateMarkerPosition(marker.getPosition());
      });
     
      google.maps.event.addListener(marker, 'dragend', function() {
        updateMarkerStatus('Arrastre finalizado');
        geocodePosition(marker.getPosition());
      });
    }
   
    // Permito la gesti�n de los eventos DOM
    google.maps.event.addDomListener(window, 'load', initialize);
    
    // ESTA FUNCION OBTIENE LA DIRECCION A PARTIR DE LAS COORDENADAS POS
    function geocodePosition(pos) {
      geocoder.geocode({
        latLng: pos
      }, function(responses) {
        if (responses && responses.length > 0) {
          updateMarkerAddress(responses[0].formatted_address);
        } else {
          updateMarkerAddress('No puedo encontrar esta direccion.');
        }
      });
    }
    
    // OBTIENE LA DIRECCION A PARTIR DEL LAT y LON DEL FORMULARIO
    function codeLatLon() { 
          str= document.form_mapa.longitud.value+" , "+document.form_mapa.latitud.value;
          latLng2 = new google.maps.LatLng(document.form_mapa.latitud.value ,document.form_mapa.longitud.value);
          marker.setPosition(latLng2);
          map.setCenter(latLng2);
          geocodePosition (latLng2);
          // document.form_mapa.direccion.value = str+" OK";
    }
    
    // OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
    function codeAddress() {
            var address = document.form_mapa.direccion.value +" , "+ document.form_mapa.ciudad.value;
              geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                 updateMarkerPosition(results[0].geometry.location);
                 marker.setPosition(results[0].geometry.location);
                 map.setCenter(results[0].geometry.location);
               } else {
                alert('ERROR : ' + status);
              }
            });
          }
    
    // OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
    function codeAddress2 (address) {
              
              geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                 updateMarkerPosition(results[0].geometry.location);
                 marker.setPosition(results[0].geometry.location);
                 map.setCenter(results[0].geometry.location);
                 document.form_mapa.direccion.value = address;
               } else {
                alert('ERROR : ' + status);
              }
            });
          }
    
    function updateMarkerStatus(str) {
      document.form_mapa.direccion.value = str;
    }
    
    // RECUPERO LOS DATOS LON LAT Y DIRECCION Y LOS PONGO EN EL FORMULARIO
    function updateMarkerPosition (latLng) {
      document.form_mapa.longitud.value =latLng.lng();
      document.form_mapa.latitud.value = latLng.lat();
    }
    
    function updateMarkerAddress(str) {
      document.form_mapa.direccion.value = str;
    }
    
    // ACTUALIZO LA POSICION DEL MARCADOR
    function updateMarker(location) {
            marker.setPosition(location);
            updateMarkerPosition(location);
            geocodePosition(location);
    
          }
    
    </script>
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
                <li class="current"><a href="../php/inmueble_nuevo.php">Crear Inmueble</a></li>
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
			<?php echo $_SESSION["mensaje"];?>
			<h2 class="top-1 p3">Cree un inmueble:</h2>
			<div class="wrap block-2">
				<form id="form1" class="form-1 bot-1" action="../php/crear_inmueble.php" method="post" enctype="multipart/form-data">
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
							
						</div>
						
						<!--Este div debe quedar deshabilitado si se elige como opción Locales y Lotes-->
						<div class="select-1">
							<label>Ambientes</label>
							<input type="text" id="ambientes" name="ambientes" class="input-text"/>
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
							<input type="text" class="input-text" id="direccion" name="direccion" class="direccion"/>
		
						</div>
						
						
						<div class="select-1">
							<label>Operacion</label>
							<select name="operacion">
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
							<input type="text" class="input-text" id="precio" name="precio" class="precio"/>	
						</div>
						
						<div class="select-1">
							<label>Descripción</label></br>
							<textarea rows="4" cols="50" name="descripcion" class="input-text"></textarea>	
						</div>
						
						<div class="select-1">
							<label>Subir imagen</label><br/>
								<input name="imagen" type="file"> <!--onChange="ver(form.file.value)"--> 
						</div>
						
		
						<!--<div class="">-->
						<a onClick="document.getElementById('form1').submit()" class="button">Crear Inmueble</a>
						<div class="clear"></div>
					</fieldset>
				</form>
			</div>	
		</div>
		
		
		<div class="wrap block-1">
			<div class="grid_der">                
				<div class="left-1">
					
					<div id="mapCanvas" style="width:520px; height:400px; float:right; margin-top:70px;"></div>
				
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