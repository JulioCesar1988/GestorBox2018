<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_sector = $_GET['id_sector'];
echo "$id_sector";
// sql to delete a record
$sql = "DELETE FROM sector WHERE id_sector = $id_sector and $id_sector NOT IN ( select id_sector from caja) and $id_sector NOT IN (select id_sector from usuario ) ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('location:../views/list_sectores.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>