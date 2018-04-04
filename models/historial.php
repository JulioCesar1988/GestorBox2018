<?php
class Historial {

 // conexion con la bd 
  private function connection() {
    $connection = new Connection();
    $connection = $connection->getConnection();
    return $connection;
  }
 
  public function listAll() {
    $query = $this->connection()->prepare("SELECT * FROM Historial");
    $query->execute();
    return $query->fetchAll();
  }
 
 
  public function insert($id_usuario, $id_caja, $estado ) {
    $query = $this->connection()->prepare("INSERT INTO historial (id_usuario, id_caja , estado ) VALUES (?, ?, ? )");
    $query->execute(array($id_usuario, $id_caja, $estado ));
  
  }

   public function listCant() {
    $query = $this->connection()->prepare("SELECT * FROM historial");
    $query->execute();
    return $query->rowCount();
  }


}
?>