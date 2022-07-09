<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_licencia)? "Modificar ":"Agregar "?>Licencia</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
       <div class="form-group">
        <label for="exampleInputPassword1">Licencia</label>
        <input name = "licencia" value ="<?php echo $data ["licencia"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Licencia">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tipo Licencia</label>
        <input name = "tipo_licencia" value ="<?php echo $data ["tipo_licencia"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Tipo de licencia">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Cantidad de Licencias</label>
        <input name = "cantidad_licencias" value ="<?php echo $data ["cantidad_licencias"]; ?>"type="int" class="form-control" id="exampleInputPassword1" placeholder= "Cantidad de Licencias">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Costo</label>
        <input name = "costo" value ="<?php echo $data ["costo"]; ?>"type="decimal" class="form-control" id="exampleInputPassword1" placeholder= "Costo">
      </div>
      <div class="form-group">
      <label for="exampleInputPassword1">Comentarios</label>
      <input name = "comentarios" value ="<?php echo $data ["comentarios"]; ?>"type="text" class="form-control input-lg" id="exampleInputPassword1" placeholder= "Comentarios...." >
      </div> 
      <div class="form-group">
        <label for="exampleInputPassword1">Fecha de Adquisición</label>
        <input name = "adquisicion" value ="<?php echo $data ["adquisicion"]; ?>"type="date" class="form-control" id="exampleInputPassword1" placeholder= "Adquisicion">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Fecha de Vigencia</label>
        <input name = "vigencia" value ="<?php echo $data ["vigencia"]; ?>"type="date" class="form-control" id="exampleInputPassword1" placeholder= "Vigencia">
      </div>
      <?php if(is_numeric($id_licencia)){ ?>
        <input type = "hidden" name = "id_licencia" value="<?php echo $data["id_licencia"]; ?>">
      <?php }?>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
</div>  
<?php include("../view/footer.php");?>