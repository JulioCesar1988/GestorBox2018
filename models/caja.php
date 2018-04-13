<?php


include_once "gestor_base.php";


class Caja extends GestorBase  {
 
  public function listAll() {
    $query = Caja::connection()->prepare("SELECT *,sector.nombre as id_sector FROM caja  left JOIN sector on (caja.id_sector = sector.id_sector )");
    $query->execute();
    return $query->fetchAll();
  }

  public function insert($descripcion , $precintoA , $precintoB , $id_sector ,$ubicacion ,$codigo,$id_categoria) {
    $query = Caja::connection()->prepare("INSERT INTO caja (descripcion , precintoA , precintoB , id_sector, ubicacion , codigo ,id_categoria ) VALUES (?,?,?,?,?,?,?)");
    $query->execute(array($descripcion, $precintoA , $precintoB , $id_sector,$ubicacion,$codigo,$id_categoria));
  
  }

  public function listCant() {
    $query = Caja::connection()->prepare("SELECT * FROM caja");
    $query->execute();
    return $query->rowCount();
  }

}
?>