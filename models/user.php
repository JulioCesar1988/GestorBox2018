<?php
include_once "gestor_base.php";
class User  extends GestorBase {
  // buscamos el email.  
  public function fetch($email){
    $query = User::connection()->prepare("SELECT * FROM usuario WHERE (email = ?)");
    $query->execute(array($email));
    return $query->fetch();
  }

  public function listAll() {
    $query = User::connection()->prepare("SELECT * FROM usuario");
    $query->execute();
    return $query->fetchAll();
  }

  public function insert($email, $nombre, $clave ,$id_sector) {
    $query = User::connection()->prepare("INSERT INTO usuario (email, nombre, clave ,id_sector) VALUES (?, ?, ?, ? )");
    $query->execute(array($email, $nombre, $clave, $id_sector));
  
  }

 public function loginCorrect($email, $clave){
    $query = User::connection()->prepare("SELECT * FROM usuario WHERE (email = ? and clave = ?)");
    $query->execute(array($email, $clave));

    return $query->fetch();
  }

  public function search($search_name, $search_last_name, $search_blocked) {
    $query = User::connection()->prepare("SELECT * FROM users WHERE (name LIKE ? AND last_name LIKE ? AND blocked = ?)");
    $query->execute(array("%$search_name%", "%$search_last_name%", $search_blocked));
    $users = $query->fetchAll();
  }

  public function listCant() {
    $query = User::connection()->prepare("SELECT * FROM usuario");
    $query->execute();
    return $query->rowCount();
  }

  public function delete($email) {
      $query = User::connection()->prepare("SELECT id from users WHERE (email = ?)");
      $query->execute(array($email));

  }

  public function update($email, $nombre, $clave, $id_sector , $id) {
    $query = User::connection()->prepare("UPDATE usuario SET  email = ? , nombre = ? , clave = ?, id_sector = ? WHERE (id = ?) ");
    $query->execute(array($email, $nombre , $clave , $id_sector,$id));

  }

}
?>