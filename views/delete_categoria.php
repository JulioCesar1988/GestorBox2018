<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
// Create connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_categoria = $_GET['id_categoria'];
echo "$id_categoria";
// sql to delete a record
$sql = "DELETE FROM categoria WHERE id_categoria = $id_categoria and $id_categoria NOT IN ( select id_categoria from caja  )";


if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('location:../views/list_categorias.php');
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>