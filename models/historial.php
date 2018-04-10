<?php
include_once "gestor_base.php";
class Historial extends GestorBase {

 
  public function listAll() {
    $query = Historial::connection()->prepare("SELECT * FROM Historial");
    $query->execute();
    return $query->fetchAll();
  }
 
 
  public function insert($id_usuario, $id_caja, $estado ) {
    $query = Historial::connection()->prepare("INSERT INTO historial (id_usuario, id_caja , estado ) VALUES (?, ?, ? )");
    $query->execute(array($id_usuario, $id_caja, $estado ));
  
  }

   public function listCant() {
    $query = Historial::connection()->prepare("SELECT * FROM historial");
    $query->execute();
    return $query->rowCount();
  }


}
?>