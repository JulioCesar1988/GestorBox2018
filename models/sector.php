<?php
class Sector {

 // conexion con la bd 
  private function connection() {
    $connection = new Connection();
    $connection = $connection->getConnection();
    return $connection;
  }
 
  public function listAll() {
    $query = $this->connection()->prepare("SELECT * FROM sector");
    $query->execute();
    return $query->fetchAll();
  }
 
 
  public function insert($nombre, $cod, $descripcion ) {
    $query = $this->connection()->prepare("INSERT INTO sector (nombre, cod , descripcion ) VALUES (?, ?, ? )");
    $query->execute(array($nombre, $cod, $descripcion ));
  
  }

   public function listCant() {
    $query = $this->connection()->prepare("SELECT * FROM sector");
    $query->execute();
    return $query->rowCount();
  }


}
?>