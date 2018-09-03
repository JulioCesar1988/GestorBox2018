<?php
  require_once("../models/connection.php");
  require_once("../models/user.php");
  require_once("../models/caja.php");
  require_once("../models/evento.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
  $descripcion = $_POST['descripcion'];
  $precintoA = $_POST['precintoA'];
  $precintoB = $_POST['precintoB'];
  $mi_sector = $_SESSION['id_sector'];
  $id_sector = $mi_sector;  //$_POST['id_sector'];
  $ubicacion = $_POST['ubicacion'];
  $codigo = $_POST['codigo'];
  $id_categoria = $_POST['id_categoria'];
  
  // Creamos el movimiento de Cracionde la BOX 
  $evento = new Evento();
  $caja = new Caja();  

  if(!empty($descripcion) && !empty($precintoA) && !empty($precintoB)) {
    // Agregamos la caja 
    $id_caja = $caja->insert( $descripcion, $precintoA , $precintoB , $id_sector , $ubicacion ,$codigo,$id_categoria);
    // Agregamos el evento
    echo $id_caja;
    // id del usuario ó el usuario  
    $id_usuario = $_SESSION['email'];
    
    // el tipo de evento sobre la caja 
    $tipo_evento = " Creacion ";
    $fecha = date("Y/m/d");

    $evento->insert($id_usuario, $id_caja,$tipo_evento,$fecha); 
   

     header('location:../views/list_cajas.php');
    
  } else {

    echo "00000000000000000000000000000 fracaso cajaaaaaaa ";
  
  }

?>