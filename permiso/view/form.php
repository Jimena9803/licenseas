<?php include("../view/header.php"); ?>
<h2 align="center"><?php echo is_numeric($id_permiso)? "Modificar ":"Agregar "?>Permiso</h2>
<div class = "container-fluid">
  <div class = "row">
    <div class = "col col-lg-12"> 
      <form action = "<?php echo $script; ?>" method = "POST" enctype="multipart/form-data">
       <div class="form-group">
        <label for="exampleInputPassword1">Permiso</label>
        <input name = "permiso" value ="<?php echo $data ["permiso"]; ?>"type="text" class="form-control" id="exampleInputPassword1" placeholder= "Permiso">
      </div>
      <?php if(is_numeric($id_permiso)){ ?>
        <input type = "hidden" name = "id_permiso" value="<?php echo $data["id_permiso"]; ?>">
      <?php }?>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
</div>  
<?php include("../view/footer.php");?>