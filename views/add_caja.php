
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

    
<!--

<div class="form-group">
  <label for="comment">Descripcion del Contenido:</label>
  <textarea class="form-control" rows="5" id="descripcion"></textarea>
</div> -->

<div class="form-group">
              <label>descripcion</label>
              <input class="form-control" type="text" name="descripcion" required><br>
            </div>


            <div class="form-group">
              <label>PrecintoA</label>
              <input class="form-control" type="text" name="precintoA" required><br>
            </div>
               <div class="form-group">
              <label>PrecintoB</label>
              <input class="form-control" type="text" name="precintoB" required><br>
            </div>
<!--
            <div class="form-group">
  <label for="sel1">Sector:</label>
  <select class="form-control" id="id_sector">
    <option>Sistemas</option>
    <option>Control De Produccion </option>
    <option>Oficina Tecnica </option>
    <option>Ventas </option>
    <option>Compras</option>
    <option>Tesoreria</option>
    <option>RRHH</option>
    <option>Contabilidad</option>
  </select>
</div>--><div class="form-group">
              <label>id_sector</label>
              <input class="form-control" type="text" name="id_sector" required><br>
            </div>

<!--
                <div class="form-group">
              <label>ubicacion</label>
              <input class="form-control" type="text" disabled name="ubicacion" required><br>
            </div> --> 
<div class="form-group">
              <label>ubicacion</label>
              <input class="form-control" type="text" name="ubicacion" required><br>
            </div>



            <input type="submit"  class="btn btn-primary" role="button"  value="Agregar caja">

              
          </form>
        </div>
      </div>
    </div>

  </body>
</html>