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




 <center> <th><a  href="../views/add_sector.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>

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

         <th><a  href="../views/show_sector.php?id=<?php echo  $row["id"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
         <th><a  href="../views/delete_sector.php?id=<?php echo  $row["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
          <th><a  href="../views/edit_sector.php?id=<?php echo  $row["id"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
      
        
       


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