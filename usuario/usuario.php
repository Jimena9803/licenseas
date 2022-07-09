<?php
include("../class/usuario.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
switch($action){
    case 'new':
        $datos = [
            "correo"=>(isset($_POST["correo"]))?$_POST["correo"]:"NOT NULL",
            "contrasena"=>(isset($_POST["contrasena"]))?$_POST["contrasena"]:"NOT NULL"
        ];
        $usuario->setCorreo($datos["correo"]);
        $usuario->setContrasena($datos["contrasena"]);
        $usuario->createUsuario();
        header("Location: usuario.php");
      break;
    case 'modify':
        $datos = [
            "correo"=>(isset($_POST["correo"]))?$_POST["correo"]:"NOT NULL",
            "contrasena"=>(isset($_POST["contrasena"]))?$_POST["contrasena"]:"NOT NULL",
            "id_usuario"=>($_POST["id_usuario"])
        ];
        $usuario->setCorreo($datos["correo"]);
        $usuario->setContrasena($datos["contrasena"]);
        $usuario->setIdUsuario($datos["id_usuario"]);
        $usuario->modifyUsuario();
        header("Location: usuario.php");
      break;
    case 'form':
        $data = [
            "correo" => "",
            "contrasena" => ""
        ];
        $id_usuario = (isset($_GET["id_usuario"]))?$_GET["id_usuario"]:null;
        if(is_numeric($id_usuario))
        {
            $usuario->setIdUsuario($id_usuario);
            $data=$usuario->readOneUsuario();
            $script = "usuario.php?action=modify";
            include("view/form.php");
        }else{
            $script = "usuario.php?action=new";
            include("view/form.php");
        }
      break;
      case 'JSON':
        $metodo = $_SERVER["REQUEST_METHOD"];
        switch($metodo){
          case 'POST':
            if(isset($_POST["id_usuario"]))
            {
              $usuario->updateUsuarioJSON();
            }else{
              $usuario->insertUsuarioJSON();
            }
            break;
          case 'DELETE':
            $usuario->deleteUsuarioJSON();
            break;
          case 'GET':
            default:
            $usuario->readUsuarioJSON();
            break;
        }  
        break;
    case 'delete':
        $id_usuario = (isset($_GET["id_usuario"]))?$_GET["id_usuario"]:null;
        if(is_numeric($id_usuario))
        {
            $usuario->setIdUsuario($id_usuario);
            $usuario->deleteUsuario();
        }
        header("Location: usuario.php");
      break;
    case 'show':
        default:
        $data = $usuario ->readUsuario();
        include("view/index.php");
      break;
}
?>