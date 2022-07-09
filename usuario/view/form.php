<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_usuario)? "Modificar ":"Agregar "?>Usuario</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
       <div class="form-group">
        <label for="exampleInputPassword1">Correo</label>
        <input name = "correo" value ="<?php echo $data ["correo"]; ?>"type="email" class="form-control" id="exampleInputPassword1" placeholder= "correo">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input name = "contrasena" value ="<?php echo $data ["contrasena"]; ?>"type="password" class="form-control" id="exampleInputPassword1" placeholder= "Contraseña">
      </div>
      <?php if(is_numeric($id_usuario)){ ?>
        <input type = "hidden" name = "id_usuario" value="<?php echo $data["id_usuario"]; ?>">
      <?php }?>
      <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </div>
</div>  
<?php include("../view/footer.php");?>