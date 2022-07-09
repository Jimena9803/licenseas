<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_lic_uso)? "Modificar ":"Agregar "?>Licencia por Empleado</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputPassword1">Nombre</label>
        <input name = "nombre" value ="<?php echo $data ["nombre"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Nombre">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Apellido Paterno</label>
        <input name = "a_paterno" value ="<?php echo $data ["a_paterno"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Apellido Paterno">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Apellido Materno</label>
        <input name = "a_materno" value ="<?php echo $data ["a_materno"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Apellido Materno">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Planta</label>
        <input name = "empresa" value ="<?php echo $data ["empresa"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Planta">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Area</label>
        <input name = "area" value ="<?php echo $data ["area"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Area">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Puesto</label>
        <input name = "puesto" value ="<?php echo $data ["puesto"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Puesto">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Equipo</label>
        <input name = "num_serie" value ="<?php echo $data ["num_serie"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Equipo">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Licencia</label>
        <input name = "licencia" value ="<?php echo $data ["licencia"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Licencia">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Ticket</label>
        <input name = "ticket" value ="<?php echo $data ["ticket"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Ticket">
      </div>
      <?php if(is_numeric($id_lic_uso)){ ?>
        <input type = "hidden" name = "id_lic_uso" value="<?php echo $data["id_lic_uso"]; ?>">
      <?php }?>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
</div>  
<?php include("../view/footer.php");?>