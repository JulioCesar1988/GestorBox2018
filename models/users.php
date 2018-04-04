<?php
class Users {

  // conexion con la base de datos. 
  private function connection() {
    $connection = new Connection();
    $connection = $connection->getConnection();
    return $connection;
  }

  // buscamos el email.  
  public function fetch($email){
    $query = $this->connection()->prepare("SELECT * FROM usuario WHERE (email = ?)");
    $query->execute(array($email));
    return $query->fetch();
  }


// vamos a utilizar esto para verlo en la vista . 
  public function listAll() {
    $query = $this->connection()->prepare("SELECT * FROM usuario");
    $query->execute();
    return $query->fetchAll();
  }


   // funcion para dar de alta un usuario , gestorbox .
  public function insert($email, $nombre, $clave) {
    $query = $this->connection()->prepare("INSERT INTO usuario (email, nombre, clave) VALUES (?, ?, ? )");
    $query->execute(array($email, $nombre, $clave));
  
  }



// Verificamos datos del usuario . 
 public function loginCorrect($email, $clave){
    $query = $this->connection()->prepare("SELECT * FROM usuario WHERE (email = ? and clave = ?)");
    $query->execute(array($email, $clave));

    return $query->fetch();
  }



  public function search($search_name, $search_last_name, $search_blocked) {
    $query = $this->connection()->prepare("SELECT * FROM users WHERE (name LIKE ? AND last_name LIKE ? AND blocked = ?)");
    $query->execute(array("%$search_name%", "%$search_last_name%", $search_blocked));
    $users = $query->fetchAll();
  }

  public function listCant() {
    $query = $this->connection()->prepare("SELECT * FROM usuario");
    $query->execute();
    return $query->rowCount();
  }

 

  public function delete($email) {
      // borrar roles asociados
      $query = $this->connection()->prepare("SELECT id from users WHERE (email = ?)");
      $query->execute(array($email));

  }

  //public function update($email, $nombre, $ , $last_name, $password, $old_email, $roles) {
   // $query = $this->connection()->prepare("UPDATE users SET email = ?, username = ?, name = ?, last_name = ?, password = ? WHERE (email = ?)");
    //$query->execute(array($email, $username, $name, $last_name, $password, $old_email));
    //$this->updateRoles($email, $roles);
  //}



}
?>