<?php


include_once ("../include/params.php");

echo 'DB_Host -> '.Params::$DB_Host.'<br>';
echo 'DB_usuario -> '.Params::$DB_usuario.'<br>';
echo 'DB_clave -> '.Params::$DB_clave.'<br>';
echo 'DB_nombre -> '.Params::$DB_nombre.'<br>';


// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection
;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//static public $DB_Host = 'localhost';
//	static public $DB_nombre = 'gestorboxdb';
//	static public $DB_usuario = 'root';
//	static public $DB_clave = '';
//	static public $Mail_host = '';

//<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "gestorboxdb";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
 //   die("Connection failed: " . $conn->connect_error);
//} 



$id_caja = $_GET['id_caja'];

echo "$id_caja";
// sql to delete a record
$sql = "DELETE FROM caja WHERE id_caja = $id_caja and id_caja not in (select id_caja from historial )  ";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('location:../views/list_cajas.php');
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>