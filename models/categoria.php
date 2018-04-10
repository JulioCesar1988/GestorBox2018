<?php

include_once "gestor_base.php";

class Categoria extends GestorBase  {

  public function listAll() {
    $query = Categoria::connection()->prepare("SELECT * FROM categoria");
    $query->execute();
    return $query->fetchAll();
  }
 
 
  public function insert($nombre, $cod, $descripcion ) {
    $query = Categoria::connection()->prepare("INSERT INTO categoria (nombre, cod , descripcion ) VALUES (?, ?, ? )");
    $query->execute(array($nombre, $cod, $descripcion ));
  
  }

   public function listCant() {
    $query = Categoria::connection()->prepare("SELECT * FROM categoria");
    $query->execute();
    return $query->rowCount();
  }


    public function update($nombre, $cod, $descripcion , $id) {
    $query = Categoria::connection()->prepare("UPDATE categoria SET  nombre = ? , cod = ? , descripcion = ? WHERE (id = ?) ");
    $query->execute(array($nombre , $cod , $descripcion ,$id));
  }



}
?>