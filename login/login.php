<?php
include_once($_SERVER['DOCUMENT_ROOT']."/licencias/class/database.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
switch($action){
    case 'validate':
      $correo = $_POST["correo"];
      $contrasena = $_POST["contrasena"];
      if($licencia->Validar($correo, $contrasena)){
          header("Location:../index.php");
      }else{
          $licencia->LogOut();
      }
      break;
    case 'LogOut':
        $licencia->LogOut();
      break;
    case 'recuperar':
        include ("view/recuperar.php");
      break;
    case 'verificarcorreo':
      $correo = $_POST["correo"]; 
      if(!$licencia->VerificarCorreo($correo)){
          $mensaje = "El correo electronico no existe";
          include ("view/recuperar.php");
          die();
      }
      $licencia->RecuperarContrasena($correo);
      break;
    case 'reestablecer':
        $correo = $_GET['correo'];
        $token = $_GET['token'];
        if($licencia->VerificarToken($correo, $token)){
            include("view/reestablecer.php");
            die();
        }else{
            die("ERROR DESCONOCIDO");
        }
      break;
    case 'cambiarcontrasena':
        $correo = $_POST['correo'];
        $token = $_POST['token'];
        $contrasena = $_POST['contrasena'];
        if($licencia->VerificarToken($correo, $token)){
            $licencia->CambiarContrasena($correo, $contrasena);
            die("La contraseña ha sido cambiada");
        }else{
            die("ERROR DESCONOCIDO");
        } 
      break;
    default: 
    include ("view/login.php");
}
?>