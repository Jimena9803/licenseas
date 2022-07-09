<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_per_rol)? "Modificar ":"Agregar "?>Permiso y Rol</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputPassword1">Permiso</label>
          <select name = "id_permiso" class="form-control" id = "permiso">
            <?php foreach($data_permiso as $resultado=>$fila):?>
              <option value = "<?php echo $fila["id_permiso"]; ?>" <?php if($fila["id_permiso"] == $data["id_permiso"]){echo "selected";} ?> ><?php echo $fila["permiso"]; ?></option>
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
        <?php if(is_numeric($id_per_rol)){ ?>
          <input type = "hidden" name = "id_per_rol" value="<?php echo $data["id_per_rol"]; ?>">
        <?php }?>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </div>
</div>  
<?php include("../view/footer.php");?>