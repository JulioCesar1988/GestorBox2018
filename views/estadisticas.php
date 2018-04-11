<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/categoria.php");
 require_once("../models/caja.php");
 require_once("../models/Historial.php");
 
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 
 $cajas = Caja::listCant(); 
 $sectores = Sector::listCant(); 
 $usuarios = User::listCant(); 
 $Historiales = Historial::listCant(); 

 
 

 ?>







<html>
<head>
  <title>Estadisticas</title>
</head>
<script type="text/javascript" src="https://www.google.com/jsapi"></script> 
<script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(dibujarGrafico);
   function dibujarGrafico() {
     // Tabla de datos: valores y etiquetas de la gráfica
     var data = google.visualization.arrayToDataTable([
       ['Texto', 'Valor numérico'],
       ['Usuarios', <?php echo $usuarios ?>],
       ['Sectores', <?php echo $sectores ?>],
       ['Cajas', <?php echo $cajas ?>],
       ['Historiales', <?php echo $Historiales ?>]    
     ]);
     var options = {
       title: 'GestorBox datos estadisticos'
     }
     // Dibujar el gráfico
     new google.visualization.ColumnChart( 
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-1')
     ).draw(data, options);
   }
 </script> 
<body>
	<?php include '../views/navbar.php';?>
<div id="GraficoGoogleChart-ejemplo-1" style="width: 800px; height: 600px">
</div>
</body>
</html>


