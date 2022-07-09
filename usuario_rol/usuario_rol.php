<?php
include("../class/usuario_rol.class.php");
include("../class/usuario.class.php");
include("../class/rol.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
switch($action){
    case 'new':
        $datos = [
            "id_usuario"=>(isset($_POST["id_usuario"]))?$_POST["id_usuario"]:"NOT NULL",
            "id_rol"=>(isset($_POST["id_rol"]))?$_POST["id_rol"]:"NOT NULL"
        ];
        $usuario_rol->setIdUsuario($datos["id_usuario"]);
        $usuario_rol->setIdRol($datos["id_rol"]);
        $usuario_rol->createUsuarioRol();
        header("Location: usuario_rol.php");
      break;
    case 'modify':
        $datos = [
            "id_usuario"=>(isset($_POST["id_usuario"]))?$_POST["id_usuario"]:"NOT NULL",
            "id_rol"=>(isset($_POST["id_rol"]))?$_POST["id_rol"]:"NOT NULL",
            "id_usuario_rol"=>($_POST["id_usuario_rol"])
        ];
        $usuario_rol->setIdUsuario($datos["id_usuario"]);
        $usuario_rol->setIdRol($datos["id_rol"]);
        $usuario_rol->setIdUsuarioRol($datos["id_usuario_rol"]);
        $usuario_rol->modifyUsuarioRol();
        header("Location: usuario_rol.php");
      break;
    case 'form':
        $data = [
            "id_usuario" => "",
            "id_rol" => ""
        ];
        $data_usuario = $usuario ->readUsuario();
        $data_rol = $rol ->readRol();
        $id_usuario_rol = (isset($_GET["id_usuario_rol"]))?$_GET["id_usuario_rol"]:null;
        if(is_numeric($id_usuario_rol))
        {
            $usuario_rol->setIdUsuarioRol($id_usuario_rol);
            $data=$usuario_rol->readOneUsuarioRol();
            $script = "usuario_rol.php?action=modify";
            include("view/form.php");
        }else{
            $script = "usuario_rol.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_usuario_rol = (isset($_GET["id_usuario_rol"]))?$_GET["id_usuario_rol"]:null;
        if(is_numeric($id_usuario_rol))
        {
            $usuario_rol->setIdUsuarioRol($id_usuario_rol);
            $usuario_rol->deleteUsuarioRol();
        }
        header("Location: usuario_rol.php");
      break;
    case 'show':
        default:
        $data = $usuario_rol ->readUsuarioRol();
        include("view/index.php");
      break;
}
?>