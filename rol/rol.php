<?php
include("../class/rol.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
//$sindicato->VerificarPermiso("Rol");
switch($action){
    case 'new':
        $datos = [
            "rol"=>(isset($_POST["rol"]))?$_POST["rol"]:"NOT NULL"
        ];
        $rol->setRol($datos["rol"]);
        $rol->createRol();
        header("Location: rol.php");
      break;
    case 'modify':
        $datos = [
            "rol"=>(isset($_POST["rol"]))?$_POST["rol"]:"NOT NULL",
            "id_rol"=>($_POST["id_rol"])
        ];
        $rol->setRol($datos["rol"]);
        $rol->setIdRol($datos["id_rol"]);
        $rol->modifyRol();
        header("Location: rol.php");
      break;
    case 'form':
        $data = [
            "rol" => ""
        ];
        $id_rol = (isset($_GET["id_rol"]))?$_GET["id_rol"]:null;
        if(is_numeric($id_rol))
        {
            $rol->setIdRol($id_rol);
            $data=$rol->readOneRol();
            $script = "rol.php?action=modify";
            include("view/form.php");
        }else{
            $script = "rol.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_rol = (isset($_GET["id_rol"]))?$_GET["id_rol"]:null;
        if(is_numeric($id_rol))
        {
            $rol->setIdRol($id_rol);
            $rol->deleteRol();
        }
        header("Location: rol.php");
      break;
    case 'show':
        default:
        $data = $rol ->readRol();
        include("view/index.php");
      break;
}
?>