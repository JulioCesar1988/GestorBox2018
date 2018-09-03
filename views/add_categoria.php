<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>     <?php include '../include/head.php';?></head>
  <body>
  	 <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar Categoria</h2>
        <div class="content">
          <form action="../controllers/create_categoria.php" method="post">
            <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" type="text" name="nombre" required><br>
            </div>
            <div class="form-group">
              <label>Cod</label>
              <input class="form-control" type="text" name="cod" maxlength="1" required><br>
            </div>
               
            <input type="submit" class="btn btn-primary" value="Agregar ">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
