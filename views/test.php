<?php
 session_start();
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 require_once("../models/categoria.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 ?>

<?php
// Tomamos de la sesion el ID del sector 
 $busco = $_SESSION['id_sector'];
 // necesitamos la cantidad de cajas almacenadas para UN SECTOR 
 $cantidad = Caja::listCant();
 $elemento = 19;
 //buscamos el codigo de sector y la categoria
 $sectores = Sector::CodSector($busco);
 $categoria = Categoria::CodCategoria($elemento);

// Obtenemos el dato Recorriendo los resultados

foreach ($sectores as &$s) {
    echo ' Cod del Sector '.$s['cod'].'<br>';
    $cod1=$s['cod'];
}

foreach ($categoria as &$c) {
    echo ' Cod de categoria '.$c['cod'].'<br>';
     $cod2 =$c['cod'];
}

echo $cantidad.'<br>';

 $sector = $cod1;   // codigo del sector dos caracteres.
 $categoria = $cod2; // codigo de la categoria un caracter. 
 $num = $cantidad;    //  
 echo 'Codigo Generado -> '.$sector.$categoria.date('ym').'0000'.(string)$num;
 

?>