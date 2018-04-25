<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $sectores = Sector::listAll(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php include '../include/head.php';?>

</head>
<body>
  <?php include '../views/navbar.php';?>
<div class="container">
</div>
<?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
                 
   <center> <th><a  href="../views/add_sector.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>


<?php          } 
           else { ?> 
              <td> <?php echo  " "; ?> </td>
<?php
           } 
        }?>


<div class="container">
  <h2>Sectores </h2>
  <p> Sectores del sistemas .</p>
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>cod</th>
         
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($sectores AS $s) {   ?>
      <tr>
        <td><?php echo  $s["nombre"]?></td>
        <td><?php echo  $s["cod"] ?></td>
     

<?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
                 
     <th><a href="../views/show_sector.php?id_sector=<?php echo  $s["id_sector"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>
        <th><a  href="../views/delete_sector.php?id_sector=<?php echo  $s["id_sector"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../views/edit_sector.php?id_sector=<?php echo  $s["id_sector"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>


<?php          } 
           else { ?> 
              <td><?php echo  " "; ?></td>
<?php
           } 
        }?>


      
  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>