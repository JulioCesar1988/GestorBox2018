<?php
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_historial = $_GET['id_historial'];
echo "$id_historial";
// sql to delete a record
$sql = "DELETE FROM historial WHERE id_historial = $id_historial";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('location:../views/list_historiales.php');
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>