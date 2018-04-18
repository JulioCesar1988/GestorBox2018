
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
 <script>
  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
      alert("El valor " + numero + " No es valido , verifique que el numero de precinto sea valido Recuerde que solo sea numeros");
  }
</script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar caja</h2>
        <div class="content">
          <form action="../controllers/create_caja.php" method="post">
           
           <div class="form-group">
              <label for="comment">descripcion</label>
              
              <textarea rows="10" cols="70" name="descripcion" >
Ingrese una descripcion acorde al contenido del archivo , recuerde que esto ayudara en proceso de busqueda del archivo 
</textarea>
            </div>
             

            <div class="form-group">
              <label>PrecintoA</label>
              <input class="form-control" type="text" name="precintoA" required onChange="validarSiNumero(this.value);"><br>
            </div>
               <div class="form-group">
              <label>PrecintoB</label>
              <input class="form-control" type="text" name="precintoB" required onChange="validarSiNumero(this.value);"><br>
            </div>

            
<!--
<div class="form-group">
  <label for="sel1">Sector:</label>
  <select class="form-control" name="id_sector">
      <?php // foreach ($sectores AS $s)
{   ?>
    <option value=<?php// echo "$s[id_sector]"; ?> ><?php //echo "$s[nombre]"; ?></option>
    <?php } ?>
  </select>
</div>
 
-->


<div class="form-group">
  <label for="sel1">Categoria:</label>
  <select class="form-control" name="id_categoria">
      <?php  foreach ($categorias AS $c)
{   ?>
    <option value=<?php echo "$c[id_categoria]"; ?> ><?php echo "$c[nombre]"; ?></option>
    <?php } ?>
  </select>
</div>




<div class="form-group">
              <label>ubicacion</label>
              <input class="form-control" type="text" name="ubicacion" ><br>
            </div>
<div class="form-group">
              <label>codigo</label>
              <input class="form-control" type="text" name="codigo" ><br>
            </div>
            <input type="submit"  class="btn btn-primary" role="button"  value="Agregar caja">  
          </form>
        </div>
      </div>
    </div>

  </body>
</html>