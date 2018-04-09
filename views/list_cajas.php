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
  <p>Las cajas pertenecientes a los sectores del sistema e ingresadas por los usuarios , van a estar a disposiciones de los sectores para realizar las busquedas de las cajas.</p>    
                  


               <form>
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>


    
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
        <th><a  href="../views/delete_user.php?id=<?php echo  $row["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>

       

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

<center> <th><a  href="../views/add_caja.php"  class="btn btn-primary" role="button" >Agregar</a></th></center> 
</div>






       <!-- echo "descripcion -> " . $row["descripcion"]. " pricintoA -> " . $row["precintoA"]. " precintoB ->  " . --> <!--$row["precintoB"]." Ubicacion -> " . $row["ubicacion"] .". Sector -> -> " . $row["id_sector"] ."  <br>"; -->





</body>
</html>
