    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Buying</title>
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
<div class="main">
<!--==============================header=================================-->
<header>
    <div>
        <h1><a href="index.html"><img src="../images/logo.jpg" alt=""></a></h1>
        <div class="social-icons">
        	<span>Seguinos:</span>
            <a href="https://www.plus.google.com" target="_blank" class="icon-3"></a>
            <a href="https://www.facebook.com" target="_blank" class="icon-2"></a>
            <a href="https://www.twitter.com/" target="_blank" class="icon-1"></a>
        </div>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                    <li><img src="../images/slider-1-small.jpg" alt="" /></li>
                    <li><img src="../images/slider-2-small.jpg" alt="" /></li>
                    <li><img src="../images/slider-3-small.jpg" alt="" /></li>
                </ul>
            </div>	
            <a href="#" class="prev"></a><a href="#" class="next"></a>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="../index.php">Propiedades</a></li>
                <li class="current"><a href="servicios.php">Servicios</a></li>
                <li><a href="sucursales.html">Sucursales</a></li>
                <li><a href="sobre_nosotros.html">Sobre Nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </div>
</header>   
<!--==============================content================================-->
<section id="content"><div class="ic"></div>
    <div class="container_12 pad-1">
    	<h2 class="top-1 p3">Resultados</h2>

    		 <?php
include("busqueda.php");
	$db = new Bdd();

        echo $db->buscarCasa($_REQUEST['tipo'],$_REQUEST['ambientes'],$_REQUEST['ciudad'],$_REQUEST['operacion'],
            $_REQUEST['moneda'],$_REQUEST['preciomin'],$_REQUEST['preciomax']);

        ?>


   
    </div>  
</section> 
</div>    
<!--==============================footer=================================-->
    <footer>
        <p>© 2012 Real Estate</p>
        <p><a rel="nofollow" href="http://templatemonster.com" target="_blank">Website Template</a> by TemplateMonster.com</p>
		<p>Busque m&aacute;s plantillas web gratis <a href="http://www.mejoresplantillasgratis.es" target="_blank">en MPG.es</a>.</p>
    </footer>	    
<script>
	Cufon.now();
</script>
</body>
</html>