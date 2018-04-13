<?php

include_once "gestor_base.php";

class Categoria extends GestorBase  {

  public function listAll() {
    $query = Categoria::connection()->prepare("SELECT * FROM categoria");
    $query->execute();
    return $query->fetchAll();
  }
 
 
  public function insert($nombre, $cod, $descripcion ,$id_sector ) {
    $query = Categoria::connection()->prepare("INSERT INTO categoria (nombre, cod , descripcion ,id_sector ) VALUES (?, ?, ?,? )");
    $query->execute(array($nombre, $cod, $descripcion ,$id_sector ));
  
  }

   public function listCant() {
    $query = Categoria::connection()->prepare("SELECT * FROM categoria");
    $query->execute();
    return $query->rowCount();
  }


    public function update($nombre, $cod, $descripcion , $id_categoria) {
    $query = Categoria::connection()->prepare("UPDATE categoria SET  nombre = ? , cod = ? , descripcion = ? WHERE (id_categoria = ?) ");
    $query->execute(array($nombre , $cod , $descripcion ,$id_categoria));
  }



}
?>