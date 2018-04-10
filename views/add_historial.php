<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = User::listAll();
 $cajas = Caja::ListAll();
 ?>
<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar historial</h2>
        <div class="content">
          <form action="../controllers/create_historial.php" method="post">
            <div class="form-group">
  <label for="sel1">Usuario:</label>
  <select class="form-control" name="id_usuario">
  <?php  foreach ($usuarios AS $u)
{   ?>
 <option value="<?php echo "$u[id]"; ?>"><?php echo "$u[email]"; ?></option>
<?php } ?>
  </select>
</div>

<div class="form-group">
  <label for="sel1">Caja:</label>
  <select class="form-control" name="id_caja">
      <?php  foreach ($cajas AS $c)
{   ?>
    <option value="<?php echo "$c[id]"; ?> "><?php echo "$c[codigo]"; ?></option>
    <?php } ?>
  </select>
</div>


<div class="form-group">
  <label for="sel1">Estado:</label>
  <select class="form-control" name="estado">
    <option>Pedido</option>
    <option>Entrega</option>
  </select>
</div>

            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>













 

                   





    

  

     





