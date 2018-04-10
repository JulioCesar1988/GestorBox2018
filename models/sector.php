<?php

include_once "gestor_base.php";

class Sector extends GestorBase {

  static public function listAll() {
    $query = Sector::connection()->prepare("SELECT * FROM sector");
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

  public function update($nombre, $cod, $descripcion , $id) {
    $query = Sector::connection()->prepare("UPDATE sector SET  nombre = ? , cod = ? , descripcion = ? WHERE (id = ?) ");
    $query->execute(array($nombre , $cod , $descripcion ,$id));
  }




}
?>