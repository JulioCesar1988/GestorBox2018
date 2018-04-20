<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestorboxdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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