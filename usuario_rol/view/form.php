<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_usuario_rol)? "Modificar ":"Agregar "?>Usuario y Rol</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputPassword1">Usuario</label>
          <select name = "id_usuario" class="form-control" id = "usuario">
            <?php foreach($data_usuario as $resultado=>$fila):?>
              <option value = "<?php echo $fila["id_usuario"]; ?>" <?php if($fila["id_usuario"] == $data["id_usuario"]){echo "selected";} ?> ><?php echo $fila["correo"]; ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Rol</label>
          <select name = "id_rol" class="form-control" id = "rol">
            <?php foreach($data_rol as $resultado=>$fila):?>
              <option value = "<?php echo $fila["id_rol"]; ?>" <?php if($fila["id_rol"] == $data["id_rol"]){echo "selected";} ?> ><?php echo $fila["rol"]; ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <?php if(is_numeric($id_usuario_rol)){ ?>
          <input type = "hidden" name = "id_usuario_rol" value="<?php echo $data["id_usuario_rol"]; ?>">
        <?php }?>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </div>
</div>  
<?php include("../view/footer.php");?>