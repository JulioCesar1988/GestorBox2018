
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Login</title>
</head>
<body>
	 <?php include '../views/navbar.php';?>

<!--
<CENTER>
<p>Login</p>
<form action="../controllers/login_submit.php" method="post">
E-mail: <input type="text" name="email"><br>
Clave: <input type="password" name="clave"><br>

<input class="btn btn-primary" role="button"  type="submit">

</form> </CENTER>
-->


<div class="container">
  <h2>Login </h2>
  <form action="../controllers/login_submit.php" method="post">
    <div class="form-group">
      <label for="email">Usuario</label>
      <input type="email" class="form-control" id="email" placeholder="ingrese usuario" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña</label>
      <input type="password" class="form-control" id="pwd" placeholder="ingrese clave" name="clave">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    
    <button type="submit" class="btn btn-primary" >Ingresar</button>
  </form>
</div>


</body>
</html> 