
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


<CENTER>
<p>Login</p>
<form action="../controllers/login_submit.php" method="post">
E-mail: <input type="text" name="email"><br>
Clave: <input type="password" name="clave"><br>

<input class="btn btn-primary" role="button"  type="submit">

</form> </CENTER>


</body>
</html> 