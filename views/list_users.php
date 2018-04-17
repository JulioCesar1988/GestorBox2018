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
  <?php include '../views/navbar.php';?>
<div class="container">
</div>
          
       <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
                 <center> <th><a  href="../views/add_user.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>


<?php          } 
           else { ?> 
              <td><?php echo  " "; ?></td>
<?php
           } 
        }?>








<div class="container">
  <h2>Usuarios </h2>
  <p>Los usuarios del sistema , pertenecen a un sector , su funcion es almacenar cajas , las cuales podran hacer pedidos o modificar su descipcion , .</p>
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
        <td><?php echo  $u["clave"] ?></td>
        <td><?php echo  $u["id_sector"]?></td>
        <td><?php echo  $u["rol"]?></td>



        
            
       <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
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




