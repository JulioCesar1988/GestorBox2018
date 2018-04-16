<?php


include_once "gestor_base.php";


class Caja extends GestorBase  {


 
  public function listAll() {

    

    $query = Caja::connection()->prepare("SELECT caja.descripcion , caja.precintoA, caja.precintoB , caja.ubicacion ,caja.codigo ,caja.id_caja ,sector.nombre as id_sector  FROM caja inner join sector on (caja.id_sector = sector.id_sector)  ");
    $query->execute();
    return $query->fetchAll();


  }

   public function update($descripcion, $precintoA, $precintoB, $id_sector , $ubicacion ,$codigo,$id_categoria ,$id_caja ) {
    $query = Caja::connection()->prepare("UPDATE caja SET  descripcion = ? , precintoA = ? , precintoB = ?, id_sector = ? , ubicacion = ? ,codigo = ? , id_categoria = ?  WHERE (id_caja = ?) ");
    $query->execute(array($descripcion,$precintoA,$precintoB,$id_sector,$ubicacion,$codigo,$id_categoria,$id_caja));

  }





  public function insert($descripcion,$precintoA,$precintoB,$id_sector,$ubicacion,$codigo,$id_categoria) {
    $query = Caja::connection()->prepare("INSERT INTO caja (descripcion,precintoA,precintoB,id_sector,ubicacion,codigo,id_categoria ) VALUES (?,?,?,?,?,?,?)");
    $query->execute(array($descripcion,$precintoA,$precintoB,$id_sector,$ubicacion,$codigo,$id_categoria));
  
  }

  public function listCant() {
    $query = Caja::connection()->prepare("SELECT * FROM caja");
    $query->execute();
    return $query->rowCount();
  }

}
?>