<?php

include_once "gestor_base.php";

class Sector extends GestorBase {

  static public function listAll() {
    $query = Sector::connection()->prepare("SELECT * FROM sector");
    $query->execute();
    return $query->fetchAll();
  }



   static public function CodSector($busco) {
     $query = Sector::connection()->prepare("SELECT *  FROM sector where id_sector = $busco ");
     $query->execute();
    return $query->fetchAll();
  }


 
 
  public function insert($nombre, $cod, $descripcion ) {
    $query = Sector::connection()->prepare("INSERT INTO sector (nombre, cod , descripcion ) VALUES (?, ?, ? )");
    $query->execute(array($nombre, $cod, $descripcion ));
  
  }




   public function listCant() {
    $query = Sector::connection()->prepare("SELECT * FROM sector");
    $query->execute();  
    return $query->rowCount();
  }

  public function update($nombre, $cod, $descripcion , $id_sector) {
    $query = Sector::connection()->prepare("UPDATE sector SET  nombre = ? , cod = ? , descripcion = ? WHERE (id_sector = ?) ");
    $query->execute(array($nombre , $cod , $descripcion ,$id_sector));
  }




}
?>