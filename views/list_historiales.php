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

 <center> <th><a  href="../views/add_historial.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
<div class="container">
  <h2> Historias </h2>
  <p>Los Historiales son los registros de movimientos de cajas es necesario ser cargados por el ARCHIVADOR.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Codigo</th>
        <th>Estado</th>
        
      </tr>
    </thead>
    <tbody>
         <?php
$sql = "SELECT * FROM historial"; 
$result = $conn->query($sql); ?>                     

<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {   ?>
      <tr>
        <td> <?php echo  $row["id_usuario"] ?> </td>
        <td><?php echo  $row["id_caja"] ?></td>
        <td><?php echo  $row["estado"] ?></td>

         <th><a  href="../views/show_historial.php?id=<?php echo  $row["id"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
         <th><a  href="../views/delete_historial.php?id=<?php echo  $row["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
          <th><a  href="../views/edit_historial.php?id=<?php echo  $row["id"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
      
        
       


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