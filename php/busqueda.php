 <?php 

/*********************************************
____________OBJETO BUSQUEDA DE INMUEBLES
*********************************************/
 class Busqueda{

  var $conexion;
  var $servidor = 'localhost';
  var $usuario = 'root';
  var $contrasenia = '';
  var $baseDeDatos = 'inmobiliaria';
  var $tablaImg = 'imgdb';
  
  
  
      function Busqueda() {

        $this->conexion = mysql_connect($this->servidor,$this->usuario,$this->contrasenia)
        or  die("Problemas en la conexion");

        mysql_select_db($this->baseDeDatos)
        or  die("Problemas en la selección de la base de datos");
      }     

      function insertarCasa($catego, $tipo, $ambientes, $ciudad, $operacion, $moneda, $precio) {
        $consulta = "insert into `inmueble`(`cod`, `id_cat`, `id_tipo`, `ambientes`, `direccion`, `id_ciudad`, `descripcion`, `operacion`, `moneda`, `precio`, `fecha_publi`, `id_markers`) values('";
    $consulta.= $catego."','". $tipo ."','". $ambientes ."','Tuyuti 1234','". $ciudad ."','Propiedad en venta.','". $operacion ."','". $moneda ."','". $precio ."','24-06-2013')"; 
        if(mysql_query($consulta)){
          return mysql_affected_rows();
        }
        else
          return -1;
      }

      function buscarCasa($tipo,$ambientes,$ciudad,$operacion,$moneda,$preciomin,$preciomax){
       
      //$consulta = "select * from inmueble where ambientes =".$ambientes." and ciudad = ".$ciudad." and operacion = ".$operacion."and".$moneda.";"
        //$registros = mysql_query('call traerInmuebles()');
        $consulta = "call cierto_inmueble(".$ambientes.",".$ciudad.", '".$operacion."' , '".$moneda."' ,".$preciomin.",".$preciomax.",".$tipo.")";
        
        $registros = mysql_query($consulta);
        if (mysql_affected_rows()>0){
            while ($reg=mysql_fetch_array($registros))
            {
               $nom="<div class='wrap'><div class='img-indent'><a href='opcion_elegida.php?cod=".$reg['cod']."'><img class='img-border img-margin' src='http://placehold.it/150x100'></a></div><div class='extra-wrap img-margin'><h3>".$reg['descripcion']."</h3><p> en ".$reg['direccion']." ".$reg['operacion']." ".$reg['precio']." ".$reg['moneda']."</p></div></div>";
               echo $nom;
                /*echo "<a href='pag/bigimage.php?img=$nom'><img class=\"resz\" src=\"pag/$nom\"></a>";
                en el caso que el parametro se pase por url la img se muestra con echo "<img src='".$_GET['img']."' />";*/
            }
          }
          else
          {
            echo "No hubo resultados.";
          }
      }
      
      function recorrerCategorias(){
        $registros = mysql_query('call recorrer_categorias()');

        $opciones = "<option value='0'>Todas</option>";
            while ($reg=mysql_fetch_array($registros))
            {
               $nom=$reg['nombre'];
               $opciones.= "<option value=".$reg['id_cat'].">".$nom."</option>";
             }
             echo $opciones;
      }

      function recorrerCiudades(){
        $registros = mysql_query('call recorrer_ciudades()');
        $opciones = "<option value='0'>Todas</option>";

            while ($reg=mysql_fetch_array($registros))
            {
               $nom=$reg['nombre'];
               $opciones.= "<option value=".$reg['id_ciudad'].">".$nom."</option>";
             }
             echo $opciones;
      }
      
      function recorrerTipos(){
        $consulta = "select * from tipo";
        $registros = mysql_query($consulta);

            while ($reg=mysql_fetch_array($registros))
            {
               $nom=$reg['nombre'];
               echo "<option value=".$reg['id_tipo'].">".$nom."</option>";
             }
      }

      function subirInmueble(){

        /*en otra pagina atras tiene que venir esto 

         <form action="php/upload.php" method="post" enctype="multipart/form-data">
                    <div class="secIzq">Seleccione la imagen:</div>
                    <div class="secDer"><input type="file" name="foto">
                    <input id="enviabutton" type="submit" value="Enviar"></div>
                </form>
  creo que la action tiene que ser esta funcion y no ese upload.php

          */
        copy($_FILES['foto']['tmp_name'],$_FILES['foto']['name']);
        /*La foto se pegó en el servidor con ese copy.*/
        $nom=$_FILES['foto']['name'];
        echo "<img src=\"$nom\">";/*mostramos la imagen*/

        /*insertamos en la base de datos para poder sacarla depsues con su direccion local*/
        mysql_query("insert into ".$this->tablaImg."(dir) values 
           ('$nom')", 
           $conexion) or die("Problemas en el select".mysql_error());
      }      

function borrarImagen(){                    
                        
              $consulta=$_GET['img'];
            mysql_query("delete from ".$this->tablaImg." where dir = '$consulta'");
          
            mysql_close($conexion);
        }

      function __destruct() {
        mysql_close($this->conexion);
      }
}
?>
