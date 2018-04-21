

<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/categoria.php");
 require_once("../models/caja.php");
 
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 
 $cajas = Caja::listAll(); 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GestorBox</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</head>
<body>
  <?php include '../views/navbar.php';?>
<center>
<div class="container">
</div>
  <form class="navbar-form " action="../views/estadisticas.php">
  <div class="input-group">
    <input id="myInput"  type="text" class="form-control" placeholder="Buscar Caja ">
    <div class="input-group-btn">
    </div>
  </div>
</form></center>
<input type="button" onclick="showAll()" value="Puto">
<center>



 


  <?php
     
     // si existe una sesion 
    if (isset($_SESSION['email'])){ 

     if ($_SESSION['rol'] == "archivador"){
              echo "Su tarea como ARCHIVADOR es asignar  ubicacion de los archivos (Cajas), y recibir los pedidos que realicen los sectores. ";
         }  else {
             if (($_SESSION['rol'] == "admin") || ($_SESSION['rol'] == "jefe")) {
             ?>
             <!--es administrador puede agregar cajas  -->
             <center> <th><a  href="../views/add_caja.php"  class="btn btn-primary" role="button" >Agregar</a></th></center>
          <?php 

         }else
          
          echo "es otro perfil ";  }  

                         }else {echo "No existe sesion";}



          ?>




</center>

<div class="container">
  <h2>Caja </h2>
  <p>Las cajas de su sector contiene informacion historica de su sector . </p>
  <table class="table">
    <thead>
      <tr>
        
        <th>Descripcion</th>
        <th>PrecintoA</th>
        <th>PrecintoB</th>
        <th>Ubicacion</th>
        <th>Sector</th>
        <th>Categoria</th>     
        <th>Codigo</th>  
        <th>Barra</th>   
      </tr>
    </thead>
    <tbody id="myTable" >
  <?php  foreach ($cajas AS $c )
{   ?>
      <tr>
        

        
            
       <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
              <td><?php echo  substr($c["descripcion"], 0, 5) ?><span class="dall" onclick="show(this)"><span>....</span><span style="display: none;"><?php echo  substr($c["descripcion"], 6) ?></span></td>
<?php          } 
           else { ?> 
              <td><?php echo  " "; ?></td>
<?php
           } 
        }?>

        
        <td><?php echo  $c["precintoA"] ?></td>
        <td><?php echo  $c["precintoB"] ?></td>

        
         <?php   if ($_SESSION['rol'] == "archivador" )  { ?>
        <td><?php echo  $c["ubicacion"] ?></td>
        <?php   } else { ?>  
                      <td><?php echo " "; ?></td> 
                      <?php } ?>


        <td><?php echo  $c["id_sector"] ?></td>
        <td><?php echo  $c["id_categoria"] ?></td>
        <td><?php echo  $c["codigo"] ?></td>
        <td><img alt="Coding Sips" src="../barcode/barcode.php?text=<?php echo  $c["codigo"]?>&print=false" /></td>
        

        
        <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
              
               <th><a  href="../controllers/PHPMailer.php?id_caja=<?php echo $c["id_caja"] ?>"  class="btn btn-success" role="button" >Pedir</a></th>
                <th><a href="../views/show_caja.php?id_caja=<?php echo  $c["id_caja"] ?>"  class="btn btn-info" role="button" >Informacion</a></th>

<?php          } 
           else { ?> 
              <td><?php echo  " "; ?></td>
<?php
           } 
        }?>

        <?php  if ($_SESSION['rol'] == "admin") { ?>  
         <th><a  href="../views/delete_caja.php?id_caja=<?php echo  $c["id_caja"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
                <?php  } ?>


        <th><a  href="../views/edit_caja.php?id_caja=<?php echo  $c["id_caja"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>
        <th><a  href="../views/etiqueta.php?id=<?php echo  $c["codigo"] ?>"  class="btn btn-default" role="button" >Etiqueta</a></th>
       



  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
<script>
function showAll(){
  $( ".dall" ).each(function() {
    show(this);
});
}

  function show(objtxt){
    var obj = $(objtxt);
    obj.children().eq(0).hide();
    obj.children().eq(1).show();
  }
</script>

</body>
</html>