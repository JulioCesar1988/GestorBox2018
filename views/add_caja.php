
<?php
 require_once("../models/user.php"); 
 require_once("../models/connection.php");
 require_once("../models/sector.php");
 require_once("../models/caja.php");
 require_once("../models/categoria.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = User::listAll();
 $sectores = Sector::ListAll();
 $categorias = Categoria::ListAll();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <?php include '../include/head.php';?>
 <script>
  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El valor " + numero + " No es valido , verifique que el numero de precinto sea valido Recuerde que solo sea numeros");
  }
</script>
  </head>
  <body>

     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar caja</h2>
        <div class="content">
          <form action="../controllers/create_caja.php" method="post">
           <label for="comment">Descripcion</label>
           <div class="form-group">
              
        <textarea rows="10" cols="90" name="descripcion" required="true"> </textarea>
            </div>
             

            <div class="form-group">
              <label>PrecintoA</label>
              <input class="form-control" type="text" name="precintoA" required onChange="validarSiNumero(this.value);"><br>
            </div>
               <div class="form-group">
              <label>PrecintoB</label>
              <input class="form-control" type="text" name="precintoB" required onChange="validarSiNumero(this.value);"><br>
            </div>

            


<div class="form-group">
  <label for="sel1">Categoria:</label>
  <select class="form-control" name="id_categoria" required="true" >
      <?php  foreach ($categorias AS $c)
{   ?>
    <option value=<?php echo "$c[id_categoria]"; ?> ><?php echo "$c[nombre]"; ?></option>
    <?php } ?>
  </select>
</div>




<div class="form-group">
              <label>ubicacion</label>
              <input class="form-control" type="text" name="ubicacion" disabled="**********"><br>
            </div>
<div class="form-group">
              <label>codigo</label>
              <input class="form-control" type="text" name="codigo" disabled="**********"><br>
            </div>
            <input type="submit"  class="btn btn-primary" role="button"  value="Agregar caja">  
          </form>
        </div>
      </div>
    </div>

  </body>
</html>