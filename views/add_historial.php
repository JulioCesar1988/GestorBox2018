<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../views/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Agregar historial</h2>
        <div class="content">
          <form action="../controllers/create_historial.php" method="post">
           
          
           

            <div class="form-group">
  <label for="sel1">Usuario:</label>
  <select class="form-control" name="id_usuario">
    <option>jcontreras@millerbi.net</option>
    <option>j@millerbi.net</option>
    <option>q@millerbi.net</option>
    <option>julio.unlp2010@gmail.com</option>
  </select>
</div>


<div class="form-group">
  <label for="sel1">Caja:</label>
  <select class="form-control" name="id_caja">
    <option>OFTO234234231</option>
    <option>OFTO234234232</option>
    <option>OFTO234234233</option>
    <option>OFTO234234234</option>
  </select>
</div>


<div class="form-group">
  <label for="sel1">Estado:</label>
  <select class="form-control" name="estado">
    <option>Pedido</option>
    <option>Entrega</option>
  </select>
</div>















            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>