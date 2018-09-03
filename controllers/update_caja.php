
<?php
  require_once("../models/connection.php");
  require_once("../models/caja.php");
  require_once("../models/evento.php");

  $connection = new Connection();
  $connection = $connection->getConnection();
  
  $caja = new Caja(); 
  $evento = new Evento();
  
  $id_caja = $_POST['id_caja'];

  // Quiero tener los eventos de una caja determinada , dado el ID 
  $eventos =  Caja::get_eventos($id_caja);

  echo "Eventos de la caja - > ".$eventos;
  
echo $id_caja;
    // id del usuario ó el usuario  
    $id_usuario = $_SESSION['email'];
    // id  la caja la cuenta se genero el evento 
    echo "Necesitamos el ID de la caja -> ".id_caja;
    // el tipo de evento sobre la caja 
    $tipo_evento = " Actualizacion";
    $fecha = date("Y/m/d");

    $evento->insert($id_usuario, $id_caja , $tipo_evento,$fecha); 


  if(!empty($id_caja)) {

    $rol = $_SESSION['rol'];  

  switch ($rol) {
    case  "admin":
            $descripcion = $_POST['descripcion'];
            $precintoA = $_POST['precintoA'];
            $precintoB = $_POST['precintoB'];
            //$id_sector = $_POST['id_sector'];
            $ubicacion = $_POST['ubicacion'];
            $codigo = $_POST['codigo'];
            $id_categoria = $_POST['id_categoria'];
 
            $evento = new Evento();
            $id_usuario = $_SESSION['email'];
            // id  la caja la cuenta se genero el evento 
            echo "Necesitamos el ID de la caja -> ".id_caja;
            // el tipo de evento sobre la caja 
            $tipo_evento = " Actualizacion Administrador";
            $fecha = date("Y/m/d");
            $evento->insert($id_usuario, $id_caja , $tipo_evento,$fecha); 
            
            $caja->update( $descripcion, $precintoA , $precintoB , $ubicacion ,$codigo,$id_categoria,$id_caja,$evento);


        break;
    case "jefe":
      
           $descripcion = $_POST['descripcion'];
            $precintoA = $_POST['precintoA'];
            $precintoB = $_POST['precintoB'];         
            $id_categoria = $_POST['id_categoria'];
            // modificacion del Jefe de sector 
           
            $evento = new Evento();
            $id_usuario = $_SESSION['email'];
            // id  la caja la cuenta se genero el evento 
            echo "Necesitamos el ID de la caja -> ".id_caja;
            // el tipo de evento sobre la caja 
            $tipo_evento = " Actualizacion Encargador de Sector";
            $fecha = date("Y/m/d");
            $evento->insert($id_usuario, $id_caja , $tipo_evento,$fecha); 
            




            $caja->updateJefe( $descripcion, $precintoA,$precintoB,$id_categoria ,$id_caja,$evento);
        break;
    case "archivador":
            $precintoA = $_POST['precintoA'];
            $precintoB = $_POST['precintoB'];
            $ubicacion = $_POST['ubicacion'];
            // Tengo que traer los eventos que tiene actualmente. 

         $evento = new Evento();
         $id_usuario = $_SESSION['email'];
         // id  la caja la cuenta se genero el evento 
         echo "Necesitamos el ID de la caja -> ".id_caja;
         // el tipo de evento sobre la caja 
         $tipo_evento = " Actualizacion Archivador ";
         $fecha = date("Y/m/d");
         $evento->insert($id_usuario, $id_caja , $tipo_evento,$fecha); 

            
            
        $caja->updateArchivador( $precintoA,$precintoB,$ubicacion ,$id_caja,$evento);
        break;
}

header('location:../views/list_cajas.php');

  } else {
   echo "00000000000000000000000000000 No se pudo realizar las modificaciones  ";
  } 


?>
