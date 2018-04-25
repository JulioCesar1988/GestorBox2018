<?php

 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 require_once("../models/categoria.php");

 $connection = new Connection(); 
 $connection = $connection->getConnection();  

 $usuarios = User::listAll();
 $sectores = Sector::ListAll();
 $cajas = Caja::ListAll();
 $categorias = Categoria::ListAll();
 ?>



<?php
include '../include/head.php';
include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);
// Check connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_caja = $_GET['id_caja'];

$sql = "SELECT *  FROM caja where id_caja = $id_caja ";
$result = $conn->query($sql);

$descripcion = "null ";
$precintoA = "null ";
$precintoB = "null";
$id_sector = "null";
$id_categoria = "null";
$codigo = "null";
$ubicacion = "null";
$id_caja = "null";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $descripcion = $row["descripcion"];
      $precintoA = $row["precintoA"];
      $precintoB =  $row["precintoB"];
      $id_sector = $row["id_sector"];
      $id_categoria = $row["id_categoria"]; 
      $ubicacion = $row["ubicacion"]; 
      $codigo = $row["codigo"]; 
      $id_caja = $row['id_caja'];

    }
} else {
    echo "0 results";
}
$conn->close();
?>

 
 <script>
  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El valor " + numero + " No es valido , verifique que el numero de precinto sea valido Recuerde que solo sea numeros");
  }
</script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Modificar caja</h2>
        <div class="content">
          <form action="../controllers/update_caja.php" method="post">
         

<?php   if ( $_SESSION['rol'] != "archivador") {  ?>

                <div class="form-group">
              <label for="comment">descripcion</label>
              
              <textarea rows="10" cols="70" name="descripcion" required="true"><?php echo $descripcion ?>" 
</textarea>
            </div>

<?php } ?>




            <div class="form-group">
              <label>PrecintoA</label>
              <input class="form-control" type="text" name="precintoA" required onChange="validarSiNumero(this.value);" value="<?php echo $precintoA ?>"><br>
            </div>
               <div class="form-group">
              <label>PrecintoB</label>
              <input class="form-control" type="text" name="precintoB" required onChange="validarSiNumero(this.value);" value="<?php echo $precintoB ?>"><br>
            </div>







<?php if($_SESSION['rol'] !=  "archivador") { ?>

<div class="form-group">
  <label for="sel1">Categoria:</label>
  <select class="form-control" name="id_categoria">
      <?php  foreach ($categorias AS $c)
{   ?>
    <option value=<?php echo "$c[id_categoria]"; ?> ><?php echo "$c[nombre]"; ?></option>
    <?php } ?>
  </select>
</div>


<?php           } ?>


<?php   if ( $_SESSION['rol'] == "archivador") {  ?>

<div class="form-group">
              <label>ubicacion</label>
              <input class="form-control" type="text" name="ubicacion"  value="<?php echo $ubicacion ?> " maxlength="4" required><br>
            </div>  

<?php } ?>


<!--
<div class="form-group">
              <label>codigo</label>
              <input class="form-control" type="text" name="codigo" value="<?php //echo $codigo ?>" required><br>
            </div>
-->

<div class="form-group">
              <label>ID</label>
              <input class="form-control" type="text" name="id_caja" value="<?php echo " $id_caja"; ?>"  required ><br>
            </div>
            <input type="submit"  class="btn btn-primary" role="button"  value="Modificar Caja">  
          </form>
        </div>
      </div>
    </div>

  </body>
</html>