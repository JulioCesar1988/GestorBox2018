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