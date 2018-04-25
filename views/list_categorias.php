<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>


<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/categoria.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $categorias = Categoria::listAll(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GestorBox</title>
</head>
<body>
  <?php include '../include/head.php';?>
  <?php include '../views/navbar.php';?>
<div class="container">
</div>

 <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>                 
   <center> <th><a  href="../views/add_categoria.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>


<?php          } 
           else { ?> 
              <td><?php echo  " "; ?></td>
<?php
           } 
        }?>

<div class="container">
  <h2>Categorias </h2>
  <p>Las categorias son una forma en la que usted puede clasificar la informacion de su sector , recuerde que tiene que tener un nombre y un codigo de un solo caracter.</p>
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>cod</th>
     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($categorias AS $c )
{   ?>
      <tr>
        <td><?php echo  $c["nombre"] ?></td>
        <td><?php echo  $c["cod"] ?></td>
  
       

        <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
                 
  <th><a href="../views/show_categoria.php?id_categoria=<?php echo  $c["id_categoria"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>



   <?php if ( $_SESSION['rol'] == "admin") { ?>
     <th><a  href="../views/delete_categoria.php?id_categoria=<?php echo  $c["id_categoria"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
    <?php }  ?>

        



      







        <th><a  href="../views/edit_categoria.php?id_categoria=<?php echo  $c["id_categoria"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>


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