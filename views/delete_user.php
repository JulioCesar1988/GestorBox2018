<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_GET['id_usuario'];
echo "$id";
// sql to delete a record
$sql = "DELETE FROM usuario WHERE id_usuario = $id AND   $id NOT IN ( select id_usuario  from  historial  ) ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('location:../views/list_users.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>