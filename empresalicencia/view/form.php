<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_emp_lic)? "Modificar ":"Agregar "?>Licencias por Empresa</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputPassword1">Empresa</label>
        <input name = "empresa" value ="<?php echo $data ["empresa"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Empresa">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Licencia</label>
        <input name = "licencia" value ="<?php echo $data ["licencia"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Licencia">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Total de Licencias</label>
        <input name = "total_licencias" value ="<?php echo $data ["total_licencias"]; ?>"type="int" class="form-control" id="exampleInputPassword1" placeholder= "Total de Licencias">
      </div>
      <div class="form-group">
      <label for="exampleInputPassword1">Comentarios</label>
      <input name = "comentarios" value ="<?php echo $data ["comentarios"]; ?>"type="text" class="form-control input-lg" id="exampleInputPassword1" placeholder= "Comentarios...." >
      </div> 
      <?php if(is_numeric($id_emp_lic)){ ?>
        <input type = "hidden" name = "id_emp_lic" value="<?php echo $data["id_emp_lic"]; ?>">
      <?php }?>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
</div>  
<?php include("../view/footer.php");?>