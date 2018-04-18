


<?php

session_start();
include_once "gestor_base.php";

class Categoria extends GestorBase  {



// dependiendo del perfil , tengo que retornar la categoria de su sector.  
  public function listAll() {
    


    $mi_sector = $_SESSION['id_sector'];
    echo 'valor de la categoria de mi sesion -> '.$mi_sector;
    $query = Categoria::connection()->prepare("SELECT * FROM categoria where ( id_sector = $mi_sector )");
    $query->execute();
    return $query->fetchAll();

  }



// para obtener el codigo de la categoria 
public function CodCategoria($elemento) {
    $query = Categoria::connection()->prepare("SELECT * FROM categoria where id_categoria = $elemento");
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