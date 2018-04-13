<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar Sector</h2>
        <div class="content">
          <form action="../controllers/create_sector.php" method="post">
            <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" type="text" name="nombre" required><br>
            </div>
            <div class="form-group">
              <label>Cod</label>
              <input class="form-control" type="text" name="cod" size="1"   required><br>
            </div>
            <div class="form-group">
              <label>descripcion</label>
              <input class="form-control" type="text" name="descripcion" required><br>
            </div>
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>