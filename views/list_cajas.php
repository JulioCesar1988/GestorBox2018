

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

<?php include '../include/head.php';?>
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

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>



</head>
<body>
  <?php include '../views/navbar.php';?>
<center>




<!--<h2>Enviando Pedido</h2>
<div class="loader"></div> -->



<div class="container">
</div>
  <form class="navbar-form " action="../views/estadisticas.php">
  <div class="input-group">
    <input id="myInput"  type="text" class="form-control" placeholder="Buscar Caja ">
    
    <div class="input-group-btn">
    </div>
  </div>
</form></center>



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
             


<div class="container">
  
   <th><a  href="../views/add_caja.php"  class="btn btn-primary btn-sm" role="button" >Agregar</a></th>
   <th><input type="button"  onclick="showAll()" class="default"  value="Ver Todo"></button></th>
  

  <!--<button type="button" class="btn btn-default">Default</button>
  <button type="button" class="btn btn-primary">Primary</button>
  <button type="button" class="btn btn-success">Success</button>
  <button type="button" class="btn btn-info">Info</button>
  <button type="button" class="btn btn-warning">Warning</button>
  <button type="button" class="btn btn-danger">Danger</button>
  <button type="button" class="btn btn-link">Link</button>      -->


</div>




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
       
      </tr>
    </thead>
    <tbody id="myTable" >
  <?php  foreach ($cajas AS $c )
{   ?>
      <tr>
        

        
            
       <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>
              <td><?php echo  substr($c["descripcion"], 0, 100) ?><span class="dall" onclick="show(this)"><span>....</span><span style="display: none;"><?php echo  substr($c["descripcion"], 2000) ?></span></td>
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
       
        

        
        <?php if (isset($_SESSION['email'])){    
           if ($_SESSION['rol'] != "archivador") { ?>



                <th><a  href="../controllers/PHPMailer.php?id_caja=<?php echo $c["id_caja"] ?>"  class="btn btn-success btn-sm" role="button" >Pedir</a></th>
                <th><a href="../views/show_caja.php?id_caja=<?php echo  $c["id_caja"] ?>"  class="btn btn-info btn-sm" role="button" >Informacion</a></th>
               <!-- <th><a href="../views/show_eventos.php?id_caja=<?php echo  $c["id_caja"] ?>"  class="btn btn-default btn-sm" role="button" >Eventos</a></th> -->
   
 <!--                       
<div class="container">
  <h2>Button Styles</h2>
  <button type="button" class="btn">Basic</button>
  <button type="button" class="btn btn-default">Default</button>
  <button type="button" class="btn btn-primary">Primary</button>
  <button type="button" class="btn btn-success">Success</button>
  <button type="button" class="btn btn-info">Info</button>
  <button type="button" class="btn btn-warning">Warning</button>
  <button type="button" class="btn btn-danger">Danger</button>
  <button type="button" class="btn btn-link">Link</button>      
</div>  -->

<?php          } 
           else { ?> 
              <td><?php echo  " "; ?></td>
<?php
           } 
        }?>

        <?php  if ($_SESSION['rol'] == "admin") { ?>  
         <th><a  href="../views/delete_caja.php?id_caja=<?php echo  $c["id_caja"] ?>" onclick="return confirm('¿Estas seguro?');" class="btn btn-danger btn-sm" role="button" >Eliminar</a></th>
                <?php  } ?>


        <th><a  href="../views/edit_caja.php?id_caja=<?php echo  $c["id_caja"] ?>"  class="btn btn-warning btn-sm" role="button" >Modificar</a></th>
        <th><a  href="../views/etiqueta.php?id=<?php echo  $c["codigo"] ?>"  class="btn btn-default btn-sm" role="button" >Etiqueta</a></th>
            <th><a href="../views/show_eventos.php?id_caja=<?php echo  $c["id_caja"] ?>"   class="btn btn-info btn-sm" role="button" >Eventos</a></th>       



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