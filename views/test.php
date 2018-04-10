
<?php
 require_once("../models/users.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");

$connection = new Connection(); 
$connection = $connection->getConnection(); 

$user = new User();
$usuarios = $user->listAll();

foreach ($usuarios AS $u)
{
 echo "$u[id]"; 
 echo "$u[nombre]";
 echo "$u[email]";
 echo "$u[id_sector]";
}

echo "****************************************************";

$sectores = Sector::listAll();

foreach ($sectores AS $s)
{
 echo "$s[id]"; 
 echo "$s[nombre]";
 echo "$s[cod]";
 echo "$s[descripcion]";
}


 ?>
