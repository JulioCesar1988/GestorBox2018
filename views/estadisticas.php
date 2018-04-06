<!DOCTYPE html>
<html lang="en">
<head>
  <title>GestorBox</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <?php include '../views/navbar.php';?>
<div class="container">
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestorboxdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 ?>

 <center><th><button type="button" class="btn btn-primary">agregar</button></th></center>

<div class="container">
  <h2>Categoris </h2>
  <p>Categorias del sistema , las categorias pertenecen a un sector , son generadas por ellos , es necesario para generar el codigo de la caja  .</p>            
  <table class="table">
    <thead>
      <tr>
        <th>nombre</th>
        <th>email</th>
        <th>clave</th>
        
      </tr>
    </thead>
    <tbody>
         <?php
$sql = "SELECT * FROM usuario"; $result = $conn->query($sql);
  ?>                     

<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {   ?>
      <tr>
        <td> <?php echo  $row["nombre"] ?> </td>
        <td><?php echo  $row["email"] ?></td>
        <td><?php echo  $row["clave"] ?></td>
        <td><?php echo  $row["id"] ?></td>
  
        <th><button id="<?php echo  $row["id"] ?>" type="button" class="btn btn-info information">Informacion</button></th>
        <th><button id="<?php echo  $row["id"] ?>" type="button" class="btn btn-warning update">Modificar</button></th>
        <th><button id="<?php echo  $row["id"] ?>" type="button" class="btn btn-danger delete">Eliminar</button></th>
        <th><p> <a href="../views/add_caja.php?id=<?php echo  $row["id"] ?>">Que ID ?</a>? <br /> </p></th>
<!--        
    
    TENES QUE VER COMO PLANTEASTE EL MVC 

    PORQUE POR LO QUE VEO VAS SALTANDO DE PAGINA EN PAGINA, LA IDEA DE MVC O POR LO MENOS LO QUE YO ENTIENDO ES TENER UN INDEX Y QUE VAYA LLAMANDO A MODULOS DE CONTROLLER Y DE AHI PASARLE LOS DATOS COMO PARAMETROS PERO SIEMPRE PARADO SOBRE EL INDEX

    LO QUE PODRIAS HACER PARA SEGUIR USANDO LO QUE HICISTE HASTA AHORA ES CREAR "FORM" PARA EL MODIFICAR, AGREGAR CAJA Y INFORMACION
    UN FORM PARA CADA UNO E IR SALTANDO A LA PAGINA Q TENES PARA CADA UNO Y PASARLE EL ID POR UN 
    INPUT TYPE=HIDDEN PARA QUE NO TE VEAN EL PARAMETRO Y UTILIZAR EL TIPO POST.




-->
        <!--<th><button type="button" class="btn btn-link">Link</button></th>
        <th><p> <a href="../views/add_caja.php">Agregar</a>? <br /> </p></th>
        <th><p> <a href="../views/add_user.php"> </a> ? <br /> </p></th>
       <th><a class="btn btn-primary" href="../views/add_user.php" role="button">Link</a></th> -->



      </tr>
     <?php


    }
} else {
    echo "0 results";
}
$conn->close();
?>

    </tbody>

  </table>

     
</div>






       <!-- echo "descripcion -> " . $row["descripcion"]. " pricintoA -> " . $row["precintoA"]. " precintoB ->  " . --> <!--$row["precintoB"]." Ubicacion -> " . $row["ubicacion"] .". Sector -> -> " . $row["id_sector"] ."  <br>"; -->





</body>
<script>
$(document).ready(function(){
    //AJAX TE VA AYUDAR A REALIZAR LA TAREA QUE NECESITES HACER EN PHP Y TE VA A DEVOLVER EL RESULTADO QUE NECESITES 
    //EN EL CASO DEL DELETE PODES MANDARLE EL ID DEL CAMPO A ELIMINAR Y DESPUES  PEGARLE A LA UNA PAGINA.PHP Y AHI ELIMINAR EL DATO POR EL ID
    var request = function (url,data){

        $.ajax({url: url, 
                type: 'POST',
                data: data,
                dataType: "json",
          success: function(result){
            console.log(result);
          },
          failed: function(result){
            console.log(result);
          }


        });

    }

    $(".delete").click(function(){
        var data = {id: $(this).attr('id') };
        var url = "home.php";
        //console.log("hola");
        request(url, data);
    });
    $(".information").click(function(){
        alert( $(this).attr('id') );
        //console.log("hola");
    });
    $(".update").click(function(){
        alert( $(this).attr('id') );
        //console.log("hola");
    });
});
</script>
</html>