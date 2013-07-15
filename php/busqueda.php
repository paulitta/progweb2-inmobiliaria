 <?php 

/*********************************************
____________OBJETO BUSQUEDA DE INMUEBLES
*********************************************/
 class Busqueda{

  var $conexion;
  var $mysqli;
  var $servidor = 'localhost';
  var $usuario = 'root';
  var $contrasenia = '';
  var $baseDeDatos = 'inmobiliaria';
  var $tablaImg = 'imgdb';
  
  
  
      function Busqueda() {
include_once("../php/conexion.php");

$this->servidor = $server;
$this->usuario = $username;
$this->contrasenia = $password;
$this->baseDeDatos = $database;


        $this->conexion = mysql_connect($this->servidor,$this->usuario,$this->contrasenia)
        or  die("Problemas en la conexion");

        mysql_select_db($this->baseDeDatos)
        or  die("Problemas en la selección de la base de datos");
      }     

      function buscarCasa($catego,$tipo,$ambientes,$ciudad,$operacion,$moneda,$preciomin,$preciomax){
       
      //$consulta = "select * from inmueble where ambientes =".$ambientes." and ciudad = ".$ciudad." and operacion = ".$operacion."and".$moneda.";"
        //$registros = mysql_query('call traer_inmuebles()');
        //$consulta = "call cierto_inmueble(".$ambientes.",".$ciudad.", '".$operacion."' , '".$moneda."' ,".$preciomin.",".$preciomax.",".$tipo.")";
        
        $consulta = "select * from inmueble";
        $contador = 0;

        if ($ambientes != 0) {
          $consulta.="ambientes =".$ambientes;
          $contador++;
        }

         if ($ciudad != 0) {
          if ($contador > 0) {
            $consulta.=" and";
          }
          else {
            $consulta.= " where ";
          }
          $consulta.="ciudad =".$ciudad;
          $contador++;
        }
        if ($tipo != 0) {
          if ($contador > 1) {
            $consulta.=" and";
          }
          else {
            $consulta.= " where ";
          }
          $consulta.="tipo =".$tipo;
          $contador++;
        }
        if ($operacion != 0) {
          if ($contador > 2) {
            $consulta.=" and";
          }
          else {
            $consulta.= " where ";
          }
          $consulta.="operacion =".$operacion;
          $contador++;
        }
        if ($moneda != 0) {
          if ($contador > 3) {
            $consulta.=" and";
          }
          else {
            $consulta.= " where ";
          }
          $consulta.="moneda =".$moneda;
          $contador++;
        }
        if ($preciomin != 0) {
          if ($contador > 0) {
            $consulta.=" and";
          }
          else {
            $consulta.= " where ";
          }
          $consulta.="preciomin =".$preciomin;
          $contador++;
        }
        if ($preciomax != 0) {
          if ($contador > 0) {
            $consulta.=" and";
          }
          else {
            $consulta.= " where ";
          }
          $consulta.="preciomax =".$preciomax;
          $contador++;
        }
      


        $registros = mysql_query($consulta);
        if (mysql_affected_rows()>0){
            while ($reg=mysql_fetch_array($registros))
            {
               $nom="</div><div class='extra-wrap img-margin'><h3>"
               .$reg['descripcion']."</h3><p> en ".$reg['direccion']." ".$reg['operacion'];


                if( isset($_SESSION['nombre'])){

            if ($reg['moneda']=="pesos") {
              $nom .= "<br/><b>$ ";
            }
            else {
              $nom .= "<br/><b>U\$D ";
            }

          $nom .=$reg['precio']. "</b> ";
        }
        else
        {
          $nom .= ".";
        }

                $nom .="</p></div></div>";
                  echo "<div class='wrap'><div class='img-indent'>";
          $this->traerImagen($reg['cod'],190,90); 
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
    

      function ultimasPropiedades(){

$db = new mysqli($this->servidor,$this->usuario,$this->contrasenia, $this->baseDeDatos);
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$query = "call traer_inmuebles()"; 
if ($stmt = $db->prepare($query)) {

    /* execute query */
    $stmt->execute();

    /* store result */
    $stmt->store_result();

    echo '<p>Propiedades en nuestra base de datos: ' . $stmt->num_rows . ".</p>";

    $numFilas = $stmt->num_rows;
    /* free result */
    $stmt->free_result();

    /* close statement */
    $stmt->close();
}
else
{
  echo $db->error;
}  
$db->close();

$numItems = 8;
$numLimite = $numFilas-$numItems;

if ($numFilas>$numItems) {
  
    $registroInmuebles = mysql_query("call ultimos_inmuebles(".$numLimite.")");
    /*$registroInmuebles = mysql_query("select * from inmueble where cod>".$numLimite);*/
        if (mysql_affected_rows()>0){
            while ($regInmuebles=mysql_fetch_array($registroInmuebles))
            {            
               $nom= "
            <a href='opcion_elegida.php?cod=".$regInmuebles['cod']."'>";

            

            $nom.="

            </a>
          <h3>".$regInmuebles['descripcion']."</h3><p> Codigo: ".$regInmuebles['cod']. " ";

          if( isset($_SESSION['nombre'])){

            if ($regInmuebles['moneda']=="pesos") {
              $nom .= "<br/><b>$ ";
            }
            else {
              $nom .= "<br/><b>U\$D ";
            }

          $nom .=$regInmuebles['precio']. "</b> ";
        }

          $nom.="</p>          
          <a href='opcion_elegida.php?cod=".$regInmuebles['cod']."' class='button mas'>+</a></div>"; 
          echo "<div class='ultimas'>";
          $this->traerImagen($regInmuebles['cod'],120,80); 
          echo $nom;
            }
          }
          else
          {
            echo "<p>No hay propiedades actualmente en venta.</p>";
          }
  
}
else{

 $registroInmuebles = mysql_query("call traer_inmuebles()");
        if (mysql_affected_rows()>0){
            while ($reg=mysql_fetch_array($registroInmuebles))
            {             
               $nom= "<div class='ultimas'>
            <a href='opcion_elegida.php?cod=".$reg['cod']."'><img src='../images/page2-img1.jpg' alt='' class='img-border img-margin'></a>
          <h3>".$reg['descripcion']."</h3><p> en ".$reg['direccion']."</p><p> ".$reg['operacion']." ".$reg['precio']." ".$reg['moneda']."</p>
          
          <a href='opcion_elegida.php?cod=".$reg['cod']."' class='button'>+</a>

          </div>"; 
          echo $nom;
            }
          }
          else
          {
            echo "<p>No hay propiedades actualmente en venta.</p>";
          }
        }


      }

        function recorrerCategorias(){

$conexion = new mysqli ($this->servidor,$this->usuario,$this->contrasenia, $this->baseDeDatos);
        
        $opciones = "<option value='0'>Todas</option>";
        if($conexion){
        
          $resultado = $conexion -> query("call recorrer_categorias()"); 
          
          while($row = $resultado->fetch_assoc()){
   $nom=$row['nombre'];
               $opciones.= "<option value=".$row['id_cat'].">".$nom."</option>";
}
echo $opciones;
        
          $resultado->close();
  
          $conexion->close();
              
        }
        else{
          echo "No ". $conexion->connect_error;     
        }
  
      }

      function recorrerCiudades(){

        $conexion = new mysqli ($this->servidor,$this->usuario,$this->contrasenia, $this->baseDeDatos);
        
        $opciones = "<option value='0'>Todas</option>";
        if($conexion){
        
          $resultado = $conexion -> query("call recorrer_ciudades()"); 
          
          
          while($row = $resultado->fetch_assoc()){
   $nom=$row['nombre'];
               $opciones.= "<option value=".$row['id_ciudad'].">".$nom."</option>";
}
echo $opciones;
        
          $resultado->close();
  
          $conexion->close();
              
        }
        else{
          echo "No ". $conexion->connect_error;     
        }
  

        
      }
      
      function recorrerTipos(){
        $consulta = "call tipos()";
        $registros = mysql_query($consulta);

            while ($regTipo=mysql_fetch_array($registros))
            {
               $nom=$regTipo['nombre'];
               echo "<option value=".$regTipo['id_tipo'].">".$nom."</option>";
             }
      }

      function traerImagen($codigoInmueble,$ancho,$alto) {
       /*
        $dirImagen = mysql_query("call direccion_imagen(12)");
        $ruta = mysql_fetch_assoc($dirImagen);
            if($ruta['ruta'] == ""){
            $nom="<img src='../images/imagenes_subidas/".$dirImagen."' />";}
            else{ $nom = "<img src='http://placehold.it/150x100' />"; }
            echo $nom;*/

            
        $conexion = new mysqli ($this->servidor,$this->usuario,$this->contrasenia, $this->baseDeDatos);
        
        if($conexion){
        
          $resultado = $conexion -> query("call direccion_imagen(".$codigoInmueble.")"); 
              
          $obj = $resultado -> fetch_object();         
         
        
          if($conexion->affected_rows >0){
            $nom="<a href='../php/opcion_elegida.php?cod=".$codigoInmueble."'><img src='../images/imagenes_subidas/".$obj->ruta."' class='img-border img-margin' width='".$ancho."' height='".$alto."' /></a>";}
            else{ $nom = "<a href='../php/opcion_elegida.php?cod=".$codigoInmueble."' ><img src='http://placehold.it/".$ancho."x".$alto."' class='img-border img-margin' /></a>"; }
            echo $nom;

          $resultado->close();
  
          $conexion->close();
              
        }
        else{
          echo "No ". $conexion->connect_error;     
        }
      

      }

function __destruct() {
mysql_close($this->conexion);

}

}



/*********************************************
____________OBJETO GENERAR PDF
*********************************************/

class Pdf {

  function Pdf() {

        require('fpdf/fpdf.php');


        $pdf=new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();                      
 
$pdf->SetFont('Arial','B',6);
$pdf->SetXY(5,10);
$pdf->SetFillColor(236,235,236);

$pdf->Cell(10,4,'Codigo',1,0,'L',1);
$pdf->Cell(25,4,'Fecha de publicacion',1,0,'L',1);
$pdf->Cell(20,4,'Categoria',1,0,'L',1);
$pdf->Cell(15,4,'Tipo',1,0,'L',1); 
$pdf->Cell(20,4,'Descripcion',1,0,'L',1);
$pdf->Cell(20,4,'Ciudad',1,0,'L',1);
$pdf->Cell(15,4,'Moneda',1,0,'L',1);
$pdf->Cell(20,4,'Precio',1,0,'L',1);
$pdf->Cell(13,4,'Ambientes',1,0,'L',1);
$pdf->Cell(30,4,'Direccion',1,0,'L',1);     

$pos_y  =   14;
 

    $pdf->SetFont('Arial','B',6);
    $pdf->SetXY(5,$pos_y);
    $pdf->SetFillColor(999,999,999);
    

    $pdf->Cell(10,4,$_REQUEST["cod"],1,0,'L',1);
$pdf->Cell(25,4,$_REQUEST["fecha_publi"],1,0,'L',1);
$pdf->Cell(20,4,$_REQUEST["categoria"],1,0,'L',1);
$pdf->Cell(15,4,$_REQUEST["tipo"],1,0,'L',1); 
$pdf->Cell(20,4,$_REQUEST["descripcion"],1,0,'L',1);
$pdf->Cell(20,4,$_REQUEST["ciudad"],1,0,'L',1);
$pdf->Cell(15,4,$_REQUEST["moneda"],1,0,'L',1);
$pdf->Cell(20,4,$_REQUEST["precio"],1,0,'L',1);
$pdf->Cell(13,4,$_REQUEST["ambientes"],1,0,'L',1);
$pdf->Cell(30,4,$_REQUEST["direccion"],1,0,'L',1);

    $pos_y+=4;

$pdf->Output();

      }     


}
?>
