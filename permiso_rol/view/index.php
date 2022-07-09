<?php include("../view/header.php"); ?>
<h2 align="center"><b>Permisos y roles </b></h2>
<div class = "container-fluid">
  <div class = "row text-left">
   <div class = "col col-lg-12">
     <a class="btn btn-success" href="permiso_rol.php?action=form" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Agregar Permiso y Rol</a>
   </div>
 </div>
 <div class = "row">
  <div class = "col col-lg-12"> &nbsp;
  </div>
</div>
<div class = "row">
  <div class = "col col-lg-12">
  <style type="text/css">
    table th {
        text-align: center;
    }
  </style>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Id Permiso</th>
          <th scope="col">Id Rol</th>
          <th scope="col">Modificar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($data as $resultado=>$fila){
          ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td style="text-align:center;"><?php echo $fila["id_permiso"];  ?></td>
            <td style="text-align:center;"><?php echo $fila["id_rol"];  ?></td>
            <td style="text-align:center;"><a class="btn btn-secondary" href="permiso_rol.php?action=form&id_per_rol=<?php echo $fila["id_per_rol"];  ?>" role="button">Modificar</a></td>
            <td style="text-align:center;"><a class="btn btn-danger" href="permiso_rol.php?action=delete&id_per_rol=<?php echo $fila["id_per_rol"];  ?>" role="button">Eliminar</a></td>
          </tr>
          <?php
          $i++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<?php include("../view/footer.php"); ?>