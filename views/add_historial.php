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
              <label>id_usuario</label>
              <input class="form-control" type="text" name="id_usuario" required><br>
            </div>
            <div class="form-group">
              <label>id_caja</label>
              <input class="form-control" type="text" name="id_caja" required><br>
            </div>
            <div class="form-group">
              <label>estado</label>
              <input class="form-control" type="text" name="estado" required><br>
            </div>
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>