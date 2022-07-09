<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_proveedor)? "Modificar ":"Agregar "?>Proveedor</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
       <div class="form-group">
        <label for="exampleInputPassword1">Número de proveedor</label>
        <input name = "num_proveedor" value ="<?php echo $data ["num_proveedor"]; ?>"type="int" class="form-control" id="exampleInputPassword1" placeholder= "Número de proveedor">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Proveedor</label>
        <input name = "proveedor" value ="<?php echo $data ["proveedor"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Proveedor">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Correo</label>
        <input name = "correo" value ="<?php echo $data ["correo"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Correo">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Licencia</label>
        <input name = "licencia" value ="<?php echo $data ["licencia"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Licencia">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Costo</label>
        <input name = "costo" value ="<?php echo $data ["costo"]; ?>"type="decimal" class="form-control" id="exampleInputPassword1" placeholder= "Costo">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Moneda</label>
        <input name = "moneda" value ="<?php echo $data ["moneda"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Moneda">
      </div>
      <?php if(is_numeric($id_proveedor)){ ?>
        <input type = "hidden" name = "id_proveedor" value="<?php echo $data["id_proveedor"]; ?>">
      <?php }?>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
</div>  
<?php include("../view/footer.php");?>