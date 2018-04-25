
<?php
  
  require_once("../models/connection.php");
  require_once("../models/caja.php");

  $connection = new Connection();
  $connection = $connection->getConnection();

  $caja = new Caja(); 


  $id_caja = $_POST['id_caja'];
  
  if(!empty($id_caja)) {

    $rol = $_SESSION['rol'];  

  switch ($rol) {
    case  "admin":
           echo "Es Admin el baboso ";
            $descripcion = $_POST['descripcion'];
            $precintoA = $_POST['precintoA'];
            $precintoB = $_POST['precintoB'];
            //$id_sector = $_POST['id_sector'];
            $ubicacion = $_POST['ubicacion'];
            $codigo = $_POST['codigo'];
            $id_categoria = $_POST['id_categoria'];
            
            $caja->update( $descripcion, $precintoA , $precintoB , $ubicacion ,$codigo,$id_categoria,$id_caja);
        break;
    case "jefe":
        echo "Es jefe el baboso";
           $descripcion = $_POST['descripcion'];
            $precintoA = $_POST['precintoA'];
            $precintoB = $_POST['precintoB'];         
            $id_categoria = $_POST['id_categoria'];
           $caja->updateJefe( $descripcion, $precintoA,$precintoB,$id_categoria ,$id_caja);
        break;
    case "archivador":
        echo "Es archivador el baboso";
            $precintoA = $_POST['precintoA'];
            $precintoB = $_POST['precintoB'];
            $ubicacion = $_POST['ubicacion'];
        $caja->updateArchivador( $precintoA,$precintoB,$ubicacion ,$id_caja);
        break;
}

header('location:../views/list_cajas.php');

  } else {
   echo "00000000000000000000000000000 No se pudo realizar las modificaciones  ";
  } 




?>
