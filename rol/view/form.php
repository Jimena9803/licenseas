<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_rol)? "Modificar ":"Agregar "?>Rol</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
       <div class="form-group">
        <label for="exampleInputPassword1">Roles</label>
        <input name = "rol" value ="<?php echo $data ["rol"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Rol">
      </div>
      <?php if(is_numeric($id_rol)){ ?>
        <input type = "hidden" name = "id_rol" value="<?php echo $data["id_rol"]; ?>">
      <?php }?>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
</div>  
<?php include("../view/footer.php");?>