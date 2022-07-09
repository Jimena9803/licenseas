<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Licencias CIE</title>
  </head>
  <body style="background-color:rgb(214, 219, 223);">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <svg style="color: white"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" fill="white"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" fill="white"/>
</svg>&nbsp<a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/index.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Licencias</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/licencias/licencias.php">Licencias</a>
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/licenciasuso/licenciasuso.php">Licencias por Empleado</a>
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/empresalicencia/empresalicencia.php">Licencias por Empresa</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/proveedor/proveedor.php">Proveedores de Licencias</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/calendar.php" tabindex="-1" aria-disabled="true">Calendario</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/usuario/usuario.php">Usuario</a>
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/rol/rol.php">Rol</a>
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/permiso/permiso.php">Permiso</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/usuario_rol/usuario_rol.php">Usuario y Rol</a>
          <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/permiso_rol/permiso_rol.php">Permiso y Rol</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/licencias/login/login.php?action=LogOut" tabindex="-1" aria-disabled="true">Salir</a>
      </li>
    </ul>
  </div>
</nav>
  