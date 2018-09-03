
<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/categoria.php");
 require_once("../models/caja.php");
 require_once("../models/user.php");
 require_once("../models/historial.php");
 
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 



if(( $_SESSION['rol'] == "archivador")|| ($_SESSION['rol'] == "admin") ){
 $cantCajas = Caja::CantTotal(); 
 $cantSectores = Sector::listCant();
 $cantUser = User::listCant();
 $cantCategorias = Categoria::CantTotal();
 $mis_historias = Historial::listCantHistoria();


}else {


 $cantCajas = Caja::listCant(); 
 $cantSectores = Sector::listCant();
 $cantUser = User::listCant();
 $cantCategorias = Categoria::listCant();
 $mis_historias = Historial::listCantHistoria();

}



 ?>

<!DOCTYPE html>
<html>
<head>
  <title> Estadisticas </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
 <?php include '../include/head.php';?>
 <?php include '../views/navbar.php';?>
<!-- Bueno tenemos que traer los datos del sistema --> 



<div class="w3-container"> 
  <canvas id="myChart"  height="400vw" width="800vw" style="max-width:100%;height: :auto;"></canvas>
  <script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ["Sectores del sistema ", "Cajas de su sector", "Usuarios del sistema","tus categorias ", " tus Historias"],
        datasets: [{
            label: '# of Votes',
            //aca tenemos que poner los valores con php 
            data: [<?php echo $cantSectores ?>,<?php echo $cantCajas ?> , <?php echo  $cantUser ?>, <?php echo $cantCategorias ?>, <?php   echo $mis_historias ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
</div>


</body>
</html>