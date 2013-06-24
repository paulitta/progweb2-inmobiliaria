 <?php 

/*********************************************
____________OBJETO BASE DE DATOS
*********************************************/
 class Bdd{

  var $conexion;
  var $servidor = 'localhost';
  var $usuario = 'root';
  var $contrasenia = '';
  var $baseDeDatos = 'inmobiliaria';
  var $tablaImg = 'imgdb';
  
      function Bdd() {

        $this->conexion = mysql_connect($this->servidor,$this->usuario,$this->contrasenia)
        or  die("Problemas en la conexion");

        mysql_select_db($this->baseDeDatos)
        or  die("Problemas en la selección de la base de datos");
      }     

      function insertarCasa($catego, $tipo, $ambientes, $ciudad, $operacion, $moneda, $preciomin, $preciomax) {
        $consulta = "insert into inmueble (descripcion,ambientes,direccion,operacion,moneda) values('";
    $consulta.= $catego."','". $ambientes ."','". $ciudad ."','". $operacion ."','". $moneda ."');"; 
        if(mysql_query($consulta)){
          return mysql_affected_rows();
        }
        else
          return -1;
      }

      function buscarCasa($catego,$tipo,$ambientes,$ciudad,$operacion,$moneda,$preciomin,$preciomax){
        $consulta = "select * from inmueble where descripcion = '".$catego."' and ambientes ='". $ambientes ."' and ciudad'". $ciudad ."' and operacion'". $operacion ."' and moneda ='". $moneda ."')"; 
        $registros = mysql_query($consulta);

            while ($reg=mysql_fetch_array($registros))
            {
               $nom=$reg['direccion'];
               echo $nom;
                /*echo "<a href='pag/bigimage.php?img=$nom'><img class=\"resz\" src=\"pag/$nom\"></a>";
                en el caso que el parametro se pase por url la img se muestra con echo "<img src='".$_GET['img']."' />";*/
            }
      }
      
      function recorrerCategorias(){
        $consulta = "select * from categoria";
        $registros = mysql_query($consulta);

            while ($reg=mysql_fetch_array($registros))
            {
               $nom=$reg['nombre'];
               echo "<option value=".$reg['id_cat'].">".$nom."</option>";
             }
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

        /*insertamos en la bdd para poder sacarla depsues con su direccion local*/
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
