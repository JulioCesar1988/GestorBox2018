
<?php
 require_once("../models/connection.php");
 ?>

<html>
<body>

Bienvenido a GestorBox  <?php echo $_POST["clave"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

<?php 


  $connection = new Connection();
  $connection = $connection->getConnection();

    $query = $this->connection()->prepare("SELECT * FROM usuario WHERE (email = ? and clave = ?)");
    
   

    


  ?>

</body>
</html>