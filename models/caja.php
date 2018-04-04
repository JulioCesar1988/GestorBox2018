<?php
class Caja {

 
  private function connection() {
    $connection = new Connection();
    $connection = $connection->getConnection();
    return $connection;
  }
 
  public function listAll() {
    $query = $this->connection()->prepare("SELECT * FROM caja");
    $query->execute();
    return $query->fetchAll();
  }
 

 
  public function insert($descripcion , $precintoA , $precintoB , $id_sector ,$ubicacion ) {
    $query = $this->connection()->prepare("INSERT INTO caja (descripcion , precintoA , precintoB , id_sector, ubicacion ) VALUES (?,?,?,?,?)");
    $query->execute(array($descripcion, $precintoA , $precintoB , $id_sector,$ubicacion));
  
  }


  


  
  public function listCant() {
    $query = $this->connection()->prepare("SELECT * FROM caja");
    $query->execute();
    return $query->rowCount();
  }


}
?>