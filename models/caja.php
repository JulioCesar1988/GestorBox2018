<?php
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 require_once("../models/categoria.php");
 include_once ("../include/params.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  

 ?>

<?php
include_once "gestor_base.php";
class Caja extends GestorBase  {

 protected $id_caja;
 protected $descripcion;
 protected $precintoA;
 protected $precintoB;
 protected $codigo;
 protected $id_sector;
 protected $id_categoria;

 static public function load($id){
    $query = User::connection()->prepare("SELECT * FROM caja WHERE (id_caja = ?)");
    $query->execute(array($id));
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    $aUsr = new Caja();
    $aUsr->id_caja = $resultado["id_caja"];
    $aUsr->descripcion = $resultado["descripcion"];
    $aUsr->precintoA = $resultado["precintoA"];
    $aUsr->precintoB = $resultado["precintoB"];
    $aUsr->codigo = $resultado["codigo"];
    $aUsr->id_sector = $resultado["id_sector"];
    $aUsr->id_categoria = $resultado["id_categoria"];
    return $aUsr;
  }

public function getId_caja(){
  return $this->id_caja;
}


 
  public function listAll() {


   $mi_sector = $_SESSION['id_sector'];

    if(($_SESSION['rol'] == 'archivador')||($_SESSION['rol'] == 'admin')){   

    $query = Caja::connection()->prepare("SELECT caja.descripcion,
                                                  caja.precintoA,
                                                  caja.precintoB,
                                                  caja.ubicacion,
                                                  caja.codigo,
                                                  caja.id_caja,
                                                  sector.nombre as id_sector,
                                                  categoria.nombre as id_categoria  
                                                  FROM caja inner join sector on (caja.id_sector = sector.id_sector)  
                                                            inner join categoria on (caja.id_categoria = categoria.id_categoria )");
    $query->execute(); 


    }else { 

        $query = Caja::connection()->prepare("SELECT caja.descripcion,
                                                     caja.precintoA,
                                                     caja.precintoB,
                                                     caja.ubicacion,
                                                     caja.codigo,
                                                     caja.id_caja,
                                                     sector.nombre as id_sector,
                                                     categoria.nombre as id_categoria  
                                                     FROM caja inner join sector on (caja.id_sector = sector.id_sector) 
                                                               inner join categoria on (caja.id_categoria = categoria.id_categoria)
                                                     where (caja.id_sector = $mi_sector ) ");
    $query->execute();


      }
   




    return $query->fetchAll();


  }


   // update full del administrador del sistema .
   public function update($descripcion, $precintoA, $precintoB, $id_sector , $ubicacion ,$codigo,$id_categoria ,$id_caja ) {
    $query = Caja::connection()->prepare("UPDATE caja SET  descripcion = ? , precintoA = ? , precintoB = ?, id_sector = ? , ubicacion = ? ,codigo = ? , id_categoria = ?  WHERE (id_caja = ?) ");
    $query->execute(array($descripcion,$precintoA,$precintoB,$id_sector,$ubicacion,$codigo,$id_categoria,$id_caja));

  }

// modificacion del los jefe de sectores sobre sus cajas. 
public function updateJefe($descripcion, $precintoA, $precintoB,$id_categoria,$id_caja ) {
    $query = Caja::connection()->prepare("UPDATE caja SET  descripcion = ? , precintoA = ? , precintoB = ? ,id_categoria = ?  WHERE (id_caja = ?) ");
    $query->execute(array($descripcion,$precintoA,$precintoB,$id_categoria,$id_caja));
  }
     
  

//  modificacion del archivador en una caja .    
public function updateArchivador($precintoA,$precintoB,$ubicacion,$id_caja){
$query = Caja::connection()->prepare("UPDATE caja SET   precintoA = ? , precintoB = ?  , ubicacion = ?  WHERE (id_caja = ?) ");
    $query->execute(array($precintoA,$precintoB,$ubicacion,$id_caja));

}

  
  
// tenemos que generar el codigo   XX  Sector  Y categoria  AAMMDD0 fecha 0000 incremental 


  public function insert($descripcion,$precintoA,$precintoB,$id_sector,$ubicacion,$codigo,$id_categoria) {
  
  
// Tomamos de la sesion el ID del sector 
 $busco = $id_sector;
 // necesitamos la cantidad de cajas almacenadas para UN SECTOR 
 $cantidad = Caja::listCant();
$elemento = $id_categoria;
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

//echo $cantidad.'<br>';



 $sector = $cod1;   // codigo del sector dos caracteres.
 $categoria = $cod2; // codigo de la categoria un caracter. 
 $num = $cantidad;    //  
 //echo 'Codigo Generado -> '.$sector.$categoria.date('ym').'0000'.(string)$num;
 

$codigo = $sector.$categoria.date('ym').'0000'.(string)$num;




    $query = Caja::connection()->prepare("INSERT INTO caja (descripcion,precintoA,precintoB,id_sector,ubicacion,codigo,id_categoria ) VALUES (?,?,?,?,?,?,?)");
    $query->execute(array($descripcion,$precintoA,$precintoB,$id_sector,$ubicacion,$codigo,$id_categoria));



  
  }

  public function listCant() {
    $mi_sector = $_SESSION['id_sector'];
    $query = Caja::connection()->prepare("SELECT * FROM caja where($mi_sector = caja.id_sector )");
    $query->execute();
    return $query->rowCount();
  }

}
?>