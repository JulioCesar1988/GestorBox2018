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




 <center><th><button type="button" class="btn btn-primary">agregar</button></th></center>

<div class="container">
  <h2>Sectores </h2>
  <p>Los Usuarios al igual que las cajas pertecen a un sector , los son generados por el administrador .</p>            
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>cod</th>
        <th>descripcion</th>
        
      </tr>
    </thead>
    <tbody>
         <?php
$sql = "SELECT * FROM sector"; $result = $conn->query($sql);
  ?>                     

<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {   ?>
      <tr>
        <td> <?php echo  $row["nombre"] ?> </td>
        <td><?php echo  $row["cod"] ?></td>
        <td><?php echo  $row["descripcion"] ?></td>
        
  
        <th><button type="button" class="btn btn-info">Informacion</button></th>
        <th><button type="button" class="btn btn-warning">Modificar</button></th>
        <th><button type="button" class="btn btn-danger">Eliminar</button></th>
        
       


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