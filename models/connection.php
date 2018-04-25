


<?php
include_once ("../include/params.php");
class Connection {
  private $connection;
  function __construct(){
    try {
  
      $con = new PDO("mysql:host=".Params::$DB_Host.';'."dbname=".Params::$DB_nombre . ";charset=utf8", Params::$DB_usuario,Params::$DB_clave);
      
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connection = $con;
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }
  }
  public function getConnection(){
    if (!isset(self::$connection)) {
      $this->connection = new self();
    }
    return $this->connection->connection;
  }
  public function Close(){
    $this->connection = null;
  }
}
?>
