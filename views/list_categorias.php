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
  <h2>Categorias </h2>
  <p>Las categorias de los sectores son formas de clasificar la informacion que estan en las cajas , cada usuario de un sector
  pueden generar sus categorias para clasificar mejor informacion .</p>            
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
$sql = "SELECT * FROM categoria"; $result = $conn->query($sql);
  ?>                     

<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {   ?>
      <tr>
        <td> <?php echo  $row["nombre"] ?> </td>
        <td><?php echo  $row["cod"] ?></td>
        <td><?php echo  $row["descripcion"] ?></td>
        <th><a  href="../views/show_categoria.php?id=<?php echo  $row["id"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
         <th><a  href="../views/delete_categoria.php?id=<?php echo  $row["id"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
          <th><a  href="../views/edit_categoria.php?id=<?php echo  $row["id"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>

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

</body>
</html>