
<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = User::listAll();
 $sectores = Sector::ListAll();
 ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar caja</h2>
        <div class="content">
          <form action="../controllers/create_caja.php" method="post">
<div class="form-group">
              <label>descripcion</label>
              <input class="form-control" type="textarea"  rows="5" name="descripcion" required><br>
            </div>


            <div class="form-group">
              <label>PrecintoA</label>
              <input class="form-control" type="text" name="precintoA" required><br>
            </div>
               <div class="form-group">
              <label>PrecintoB</label>
              <input class="form-control" type="text" name="precintoB" required><br>
            </div>
<div class="form-group">
  <label for="sel1">Sector:</label>
  <select class="form-control" name="id_sector">
      <?php  foreach ($sectores AS $s)
{   ?>
    <option value=<?php echo "$s[id]"; ?> ><?php echo "$s[nombre]"; ?></option>
    <?php } ?>
  </select>
  
</div>


<div class="form-group">
              <label>ubicacion</label>
              <input class="form-control" type="text" name="ubicacion" required><br>
            </div>
<div class="form-group">
              <label>codigo</label>
              <input class="form-control" type="text" name="codigo" required><br>
            </div>
            <input type="submit"  class="btn btn-primary" role="button"  value="Agregar caja">  
          </form>
        </div>
      </div>
    </div>

  </body>
</html>