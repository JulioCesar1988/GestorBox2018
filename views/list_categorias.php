<!DOCTYPE html>
<html lang="en">
<head>
  <title>GestorBox</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
   <?php include '../views/navbar.php';?>
<div class="container">
</div>
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
$sql = "SELECT * FROM categoria";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "Nombre -> " . $row["nombre"]. " Cod -> " . $row["cod"]. " Descripcion ->  " . $row["descripcion"]. "<br>"; 

    }
} else {
    echo "0 results";
}
$conn->close();
?>

<p> <a href="../views/add_categoria.php">Agregar</a>? <br /> </p>
<p> <a href="../views/add_categoria.php"> </a> ? <br /> </p>

<a class="btn btn-primary" href="../views/add_categoria.php" role="button">Link</a>
<button type="button" href="../views/add_categoria.php" class="btn" >Basic</button>
<button type="button" class="btn btn-default">Default</button>
<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-link">Link</button>

</body>
</html>
