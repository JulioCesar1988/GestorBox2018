<?php
$id = $_GET['id'];
?>
<center><?php echo "$id"; ?> </center>
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
    
    var data = "<?php echo "$id" ?>";   
    $("#imagen").html('<br><img src="../barcode/barcode.php?text=<?php echo "$id" ?>&size=90&codetype=Code128&print=true"/>');
    $("#data").val('');

    $.post( "../views/guardarImagen.php", { filepath: "../codigosGenerados/"+data+".png", text:data } );
    
  </script>
  <center><img alt="<?php echo "$id" ?>" src="../barcode/barcode.php?codetype=Codabar&size=40&text=<?php echo "$id" ?>"/> </center>


</body>
</html>