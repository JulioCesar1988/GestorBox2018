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

  static public function load($id){
   $query = Sector::connection()->prepare("SELECT * FROM sector WHERE id_sector =  $id");
    $query->execute();
    return $query->fetchAll(); 
  }
 
 
  public function insert($nombre, $cod ) {
    $query = Sector::connection()->prepare("INSERT INTO sector (nombre, cod  ) VALUES (?, ? ) ");
    $query->execute(array($nombre, $cod));
  
  }




   public function listCant() {
    $query = Sector::connection()->prepare("SELECT * FROM sector");
    $query->execute();  
    return $query->rowCount();
  }

  public function update($nombre, $cod , $id_sector) {
    $query = Sector::connection()->prepare("UPDATE sector SET  nombre = ? , cod = ? WHERE (id_sector = ?) ");
    $query->execute(array($nombre , $cod  ,$id_sector));
  }




}
?>