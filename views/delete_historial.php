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