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



<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Generar Códigos de Barras - Denisse Estrada</title>
  <meta charset="UTF-8">
</head>
<style>
input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
button {
    width: 50%;
    background-color: #FF675B;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
<body>
  <center>
  
   <!--<div id="imagen"></div>-->
  </center>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
  <script>


    
   // Ex codigo para generar los codigo de barra   
    //var data = "<?php echo "$id" ?>";   
    //$("#imagen").html('<br><img src="../barcode/barcode.php?text=<?php echo "$id" ?>&size=150&codetype=Code128&print=true"/>');
    //$("#data").val('');
    //$.post( "../views/guardarImagen.php", { filepath: "../codigosGenerados/"+data+".png", text:data } );
  
  
  </script>
 <!-- <center><img alt="<?php echo "$id" ?>" src="../barcode/barcode.php?codetype=Codabar&size=100&text=<?php echo "$id" ?>"/> </center> -->
  <!-- <center><?php echo "$id"; ?> </center> --> 
 


<div class="container">
  <table class="table">
    <thead>
      <tr>
      
 
      </tr>
    </thead>
    <tbody id="myTable" >
  <?php  foreach ($cajas AS $c )
{   ?>
      <tr>
        
      
        
        <script>
   // Vamos a iterar por todas las cajas para generar todas las equiquetas de su sector .    
    var data = "<?php echo  $c["codigo"] ?>";  
    $("#imagen").html('<br><img src="../barcode/barcode.php?text=<?php echo  $c["codigo"] ?>"&size=200&codetype=Code39&print=true"/>');
    $("#data").val('');
    $.post( "../views/guardarImagen.php", { filepath: "../codigosGenerados/"+data+".png", text:data } );
    
  </script>
  <center><img alt="<?php echo  $c["codigo"] ?>"" src="../barcode/barcode.php?codetype=Codabar&size=80&text=<?php echo  $c["codigo"] ?>"/> </center>
  <center><?php echo  $c["codigo"] ?>  </center>

       
<center><p>---------------------------------------------------------------------------------------</p></center>


  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>


</body>
</html>