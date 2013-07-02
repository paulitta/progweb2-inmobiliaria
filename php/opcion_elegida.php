<!DOCTYPE html>
<html lang="en">
<head>
    <title>MiInmobiliaria</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider-2.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/jqtransform.css">
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/cufon-yui.js"></script>
    <script src="js/vegur_400.font.js"></script>
    <script src="js/Vegur_bold_700.font.js"></script>
    <script src="js/cufon-replace.js"></script>
    <script src="js/tms-0.4.x.js"></script>
    <script src="js/jquery.jqtransform.js"></script>
    <script src="js/FF-cash.js"></script>
    <script>
		$(document).ready(function(){
			$('.form-1').jqTransform();					   	
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
<div class="main">
<!--==============================header=================================-->
<header>
    <div>
        <h1><a href="index.html"><img src="images/logo.jpg" alt=""></a></h1>
        <div class="social-icons">
        	<span>Seguinos:</span>
            <a href="https://www.plus.google.com" target="_blank" class="icon-3"></a>
            <a href="https://www.facebook.com" target="_blank" class="icon-2"></a>
            <a href="https://www.twitter.com/" target="_blank" class="icon-1"></a>
        </div>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                    <li><img src="images/slider-1-small.jpg" alt="" /></li>
                    <li><img src="images/slider-2-small.jpg" alt="" /></li>
                    <li><img src="images/slider-3-small.jpg" alt="" /></li>
                </ul>
            </div>	
            <a href="#" class="prev"></a><a href="#" class="next"></a>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="index.html">Propiedades</a></li>
                <li><a href="servicios.html">Servicios</a></li>
                <li><a href="sucursales.html">Sucursales</a></li>
                <li><a href="sobre_nosotros.html">Sobre Nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content"><div class="ic"></div>
	<div class="container_12">	
		<div class="grid_8">
	  
			<?PHP
			
			include 'conexion.php';
			
			$conexion = mysql_connect($server,$username,$password);
			
			if($conexion){
			
				mysql_select_db($database);
			
				$sql = "select i.cod, c.nombre as categoria, t.nombre as tipo, i.ambientes, i.direccion, ciu.nombre as ciudad, i.descripcion, i. operacion, i.moneda, i.precio, i.fecha_publi
						from inmueble i, categoria c, tipo t, ciudad ciu
						where i.id_cat = c.id_cat
						and i.id_tipo = t.id_tipo
						and i.id_ciudad = ciu.id_ciudad
						and i.cod = '".$_REQUEST["cod"]."'";
			
				$resultado = mysql_query($sql);
			
				$fila = mysql_fetch_array($resultado);
			
				echo "C&oacutedigo: ";
				echo $fila["cod"];
				echo "<br/><br/>";
			
				echo "Precio: ";
				if ($fila["moneda"] == 'pesos'){
					echo "$";
					echo $fila["precio"];
					echo "<br/><br/>";
				}else{
					echo "U$S";
					echo $fila["precio"];
					echo "<br/><br/>";				
				}

				echo "Categor&iacutea: ";
				echo $fila["categoria"];
				echo "<br/><br/>";
			
				echo "Tipo: ";
				echo $fila["tipo"];
				echo "<br/><br/>";
			
				echo "Operaci&oacuten: ";
				echo $fila["operacion"];
				echo "<br/><br/>";
			
				echo "Ambientes: ";
				echo $fila["ambientes"];
				echo "<br/><br/>";
			
				echo "Direcci&oacuten: ";
				echo $fila["direccion"];
				echo "<br/><br/>";
			
				echo "Ciudad: ";
				echo $fila["ciudad"];
				echo "<br/><br/>";
			
				echo "Descripci&oacuten: ";
				echo $fila["descripcion"];
				echo "<br/><br/>";
			
				echo "Fecha Publicaci&oacuten: ";
				echo $fila["fecha_publi"];
				echo "<br/><br/>";
			
				mysql_free_result($resultado); // libero la memoria del resultado
		
				mysql_close($conexion); // cierro la conexion
			
			}
			else{
				echo "No ". mysql_error();			
			}
			
			?>
        <!--<h2 class="top-1 p3">Home value estimator</h2>
        <div class="wrap">
        	<img src="images/page3-img1.jpg" alt="" class="img-border img-indent">
            <div class="extra-wrap">
            	<p class="color-1 p6">Aenean quis metus lacus, a commodo libero nam lacinia blandit dui vitae malesuada donec </p>
           		<p>Pellentesque scelerisque orci, ac tempor purus vulputate lobortis. Vestibulum porttitor sem mattis eros posuere vitae tristique justo congue curabitur consectetur.</p>
            </div>
        </div>
        <p class="p5">Venenatis aliquam sit amet arcu justo in commodo consectetur lacus ac ultrices cras porta dignissim turpis fermentum porttitor aenean scelerisque nunc vel turpis faucibus vestibulum aenean volutpat iaculis nunc, sed accumsan lacus imperdiet eu.</p>
        <a href="#" class="button">Read more</a>
        <h2 class="top-2 p3">Mortgage center</h2>
        <p class="color-1 p2">Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua at vero eos et accusam.</p>
        <div class="wrap">
        	<img src="images/page3-img2.jpg" alt="" class="img-border img-indent">
            <div class="extra-wrap">
            	<p>Et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat sed diam.</p>
            </div>
        </div>
        <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>-->
		</div>
      <div class="grid_4">
        <div class="left-1">
            <!--PONER LO QUE NECESITO-->
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
		<!--<p>Busque m&aacute;s plantillas web gratis <a href="http://www.mejoresplantillasgratis.es" target="_blank">en MPG.es</a>.</p>-->
    </footer>    
<script>
	Cufon.now();
</script>
</body>
</html>