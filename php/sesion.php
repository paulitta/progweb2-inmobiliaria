 <?php 
############################################
#              OBJETO SESION               #
############################################

class Sesion{

  function Sesion(){
    session_start();
    $_SESSION['usuario']=$_REQUEST['campousuario'];
    $_SESSION['clave']=$_REQUEST['campoclave'];
  }

}

?>
