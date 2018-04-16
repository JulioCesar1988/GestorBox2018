<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";


?>



<?php
// mostrar los valores de la sesion .
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>



<!-- Modificacion de los valores -->
<?php
// to change a session variable, just overwrite it 
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);
?>



<!-- Eliminar la sesion -->

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>




</body>
</html>