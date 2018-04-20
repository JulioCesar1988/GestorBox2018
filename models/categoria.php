

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<?php

include_once "gestor_base.php";
include_once "../include/params.php";

class Categoria extends GestorBase  {



// dependiendo del perfil , tengo que retornar la categoria de su sector.  
  public function listAll() {
    $ok = -1;
    if ($_SESSION['rol'] == "archivador") {$ok = 1; }else {  $ok=0; }
    $mi_sector = $_SESSION['id_sector'];
    $query = Categoria::connection()->prepare("SELECT * FROM categoria where (( id_sector = $mi_sector )||($ok = 1 ))");
    $query->execute();
    return $query->fetchAll();
      

  }



// para obtener el codigo de la categoria 
public function CodCategoria($elemento) {
    $query = Categoria::connection()->prepare("SELECT * FROM categoria where id_categoria = $elemento");
    $query->execute();
    return $query->fetchAll();
  }


 
 
  public function insert($nombre, $cod,$id_sector ) {
    $query = Categoria::connection()->prepare("INSERT INTO categoria (nombre, cod ,id_sector ) VALUES (?, ?,? )");
    $query->execute(array($nombre, $cod,$id_sector ));
  
  }

   public function listCant() {
    $query = Categoria::connection()->prepare("SELECT * FROM categoria");
    $query->execute();
    return $query->rowCount();
  }


    public function update($nombre, $cod , $id_categoria) {
    $query = Categoria::connection()->prepare("UPDATE categoria SET  nombre = ? , cod = ?  WHERE (id_categoria = ?) ");
    $query->execute(array($nombre , $cod ,$id_categoria));
  }



}
?>