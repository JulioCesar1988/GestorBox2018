<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = User::listAll(); 
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
          
          <?php    if($_SESSION['rol'] == "admin"){ ?>
           <center> <th><a  href="../views/add_user.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
           <?php }  ?>
       
                
<div class="container">
  <h2>Usuarios </h2>
  <p> </p>
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>email</th>
        <th>clave</th>
        <th>Sector</th>
        <th>rol</th>     
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($usuarios AS $u)
{   ?>
      <tr>
        <td><?php echo  $u["nombre"] ?></td>
        <td><?php echo  $u["email"] ?></td>
       <!--Si sos Administrador  --> 
  

        <td><?php echo  $u["clave"] ?></td>
        <td> <?php echo  $u["id_sector"] ?></td> 
        <td><?php echo  $u["rol"] ?></td>
        
        
       <!-- Si  no es admin no puede hacer nada con los usuarios -->     
       <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] == "admin") { ?>

              <th><a href="../views/show_user.php?id_usuario=<?php echo  $u["id_usuario"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>                 
                 <th><a  href="../views/delete_user.php?id_usuario=<?php echo  $u["id_usuario"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../views/edit_user.php?id_usuario=<?php echo  $u["id_usuario"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>

       
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




