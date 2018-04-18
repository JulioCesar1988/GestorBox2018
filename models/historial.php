<?php


include_once "gestor_base.php";
class Historial extends GestorBase {

 
  public function listAll() {

     session_start();
    // Solo quiero mis historias , como usuario me interesan el historial de mis cajas . 
     $iduser = $_SESSION['id_usuario'];

    $query = Historial::connection()->prepare("SELECT *,usuario.nombre as id_usuario  , caja.codigo as id_caja FROM Historial inner join usuario on ( historial.id_usuario = usuario.id_usuario )  inner join caja on ( historial.id_caja = caja.id_caja) where ( historial.id_usuario = $iduser ) ");
    $query->execute();
    return $query->fetchAll();

  }
 
 
  public function insert($id_usuario, $id_caja, $estado ) {
    $query = Historial::connection()->prepare("INSERT INTO historial (id_usuario, id_caja , estado ) VALUES (?, ?, ? )");
    $query->execute(array($id_usuario, $id_caja, $estado ));
  }




// public function update($nombre, $cod, $descripcion , $id_sector) {
  //  $query = Sector::connection()->prepare("UPDATE sector SET  nombre = ? , cod = ? , descripcion = ? WHERE (id_sector = ?) ");
   // $query->execute(array($nombre , $cod , $descripcion ,$id_sector));
  //}






  public function update($id_usuario , $id_caja ,$estado ,$id_historial){
     $query = Historial::connection()->prepare("UPDATE  historial SET id_caja =? , id_usuario = ? , estado = ? where (id_historial = ? ) ");
      $query->execute(array($id_caja , $id_usuario , $estado ,$id_historial));
  }


   public function listCant() {
    $query = Historial::connection()->prepare("SELECT * FROM historial");
    $query->execute();
    return $query->rowCount();
  }


}
?>