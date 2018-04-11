
<!DOCTYPE html>
<html>
<head>
  <title>Generar Códigos de Barras - Denisse Estrada</title>
  <link rel="icon" href="http://denisseestrada.com/wp-content/uploads/2017/02/favicon.png" sizes="32x32"/>
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
  <h2>Generar códigos de barra</h2>
  <input type="text" id="data" placeholder="Ingresa un valor"><br>
  <button type="button" id="generar_barcode">Generar código de barras</button><br>
  <div id="imagen"></div>
  </center>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
  <script>
    $("#generar_barcode").click(function() {
    var data = $("#data").val();
    $("#imagen").html('<br><img src="barcode\\barcode.php?text='+data+'&size=90&codetype=Code39&print=true"/>');
    $("#data").val('');
    //$.post( "guardarImagen.php", { filepath: "codigosGenerados/"+data+".png", text:data } );
    });
  </script>
</body>
</html>