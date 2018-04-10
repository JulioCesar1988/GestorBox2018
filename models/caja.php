<?php


include_once "gestor_base.php";


class Caja extends GestorBase  {
 
  public function listAll() {
    $query = Caja::connection()->prepare("SELECT * FROM caja");
    $query->execute();
    return $query->fetchAll();
  }

  public function insert($descripcion , $precintoA , $precintoB , $id_sector ,$ubicacion ,$codigo) {
    $query = Caja::connection()->prepare("INSERT INTO caja (descripcion , precintoA , precintoB , id_sector, ubicacion , codigo ) VALUES (?,?,?,?,?,?)");
    $query->execute(array($descripcion, $precintoA , $precintoB , $id_sector,$ubicacion,$codigo));
  
  }

  public function listCant() {
    $query = Caja::connection()->prepare("SELECT * FROM caja");
    $query->execute();
    return $query->rowCount();
  }

}
?>