<?php
include_once "gestor_base.php";

include_once ("../models/historial.php");
include_once ("../include/params.php");

class Evento extends GestorBase {
   
  public function listEventBox( $id_caja ) {
    $query = Evento::connection()->prepare("SELECT (evento.id_usuario) AS id_usuario ,
    											   (caja.codigo) AS id_caja, 
    											   (evento.tipo_evento) as tipo_evento , 
    											   (evento.fecha) as fecha ,
    											   (evento.id_evento) as id_evento 
    from evento inner join caja on (evento.id_caja = caja.id_caja ) where (evento.id_caja = $id_caja)");
    $query->execute(); 
    return $query->fetchAll();
  }
 
 
  public function insert($id_usuario, $id_caja, $tipo_evento,$fecha ) {
    $query = Evento::connection()->prepare("INSERT INTO Evento (id_usuario, id_caja , tipo_evento,fecha ) VALUES (?,?,?,?)");
    $query->execute(array($id_usuario, $id_caja , $tipo_evento ,$fecha));
  }


}
?>