<!DOCTYPE html>
<html lang="en">
<head>
  <title>GestorBox</title>
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



$sql = "SELECT * FROM caja";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "descripcion -> " . $row["descripcion"]. " pricintoA -> " . $row["precintoA"]. " precintoB ->  " . $row["precintoB"]." Ubicacion -> " . $row["ubicacion"] .". Sector -> -> " . $row["id_sector"] ."  <br>"; 
    }
} else {
    echo "0 results";
}
$conn->close();
?>


<div class="container">
  <h2>Cajas </h2>
  <p>Cajas del sistema , podemos pedir una caja , modificar y cargar una caja , generar etiquetas .</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Descripcion</th>
        <th>PrecintoA</th>
        <th>PrecintoB</th>
        <th>Ubicacion</th>
        <th>Sector</th>
        <th>Codigo</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>

        <td>john@example.com</td>
        <td>john@example.com</td>
        <td>john@example.com</td>

        <th><button type="button" class="btn btn-success">Agregar</button></th>
        <th><button type="button" class="btn btn-info">Informacion</button></th>
        <th><button type="button" class="btn btn-warning">Modificar</button></th>
        <th><button type="button" class="btn btn-danger">Eliminar</button></th>



        <!--<th><button type="button" class="btn btn-link">Link</button></th>
        <th><p> <a href="../views/add_caja.php">Agregar</a>? <br /> </p></th>
        <th><p> <a href="../views/add_user.php"> </a> ? <br /> </p></th>
       <th><a class="btn btn-primary" href="../views/add_user.php" role="button">Link</a></th> -->


      </tr>
      
    </tbody>

  </table>


</div>



</body>
</html>
