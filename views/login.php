<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php include '../views/navbar.php';?>
<p>Login</p>
<form action="../controllers/login_submit.php" method="post">
E-mail: <input type="text" name="email"><br>
Clave: <input type="text" name="clave"><br>
<input type="submit">
</form>
</body>
</html>