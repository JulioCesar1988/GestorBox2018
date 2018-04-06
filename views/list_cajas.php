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
        
      </tr>
    </thead>
    <tbody>
         <?php
$sql = "SELECT * FROM caja"; $result = $conn->query($sql);
  ?>                     

<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {   ?>
      <tr>
        <td> <?php echo  $row["descripcion"] ?> </td>
        <td><?php echo  $row["precintoA"] ?></td>
        <td><?php echo  $row["precintoB"] ?></td>
        <td><?php echo  $row["ubicacion"] ?></td>
        <td><?php echo  $row["id_sector"] ?></td>
        <th><button type="button" class="btn btn-primary">Pedir</button></th>
        <th><button type="button" class="btn btn-info">Informacion</button></th>
        <th><button type="button" class="btn btn-warning">Modificar</button></th>
        
        <!--<th><button type="button" class="btn btn-link">Link</button></th>
        <th><p> <a href="../views/add_caja.php">Agregar</a>? <br /> </p></th>
        <th><p> <a href="../views/add_user.php"> </a> ? <br /> </p></th>
       <th><a class="btn btn-primary" href="../views/add_user.php" role="button">Link</a></th> -->
     

      </tr>
     <?php


    }
} else {
    echo "0 results";
}
$conn->close();
?>

    </tbody>

  </table>


</div>






       <!-- echo "descripcion -> " . $row["descripcion"]. " pricintoA -> " . $row["precintoA"]. " precintoB ->  " . --> <!--$row["precintoB"]." Ubicacion -> " . $row["ubicacion"] .". Sector -> -> " . $row["id_sector"] ."  <br>"; -->





</body>
</html>
