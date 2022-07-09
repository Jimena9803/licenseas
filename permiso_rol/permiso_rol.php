<?php
include("../class/permiso_rol.class.php");
include("../class/permiso.class.php");
include("../class/rol.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
//$sindicato->VerificarPermiso("Permiso y Rol");
switch($action){
    case 'new':
        $datos = [
            "id_permiso"=>(isset($_POST["id_permiso"]))?$_POST["id_permiso"]:"NOT NULL",
            "id_rol"=>(isset($_POST["id_rol"]))?$_POST["id_rol"]:"NOT NULL"
        ];
        $permiso_rol->setIdPermiso($datos["id_permiso"]);
        $permiso_rol->setIdRol($datos["id_rol"]);
        $permiso_rol->createPermisoRol();
        header("Location: permiso_rol.php");
      break;
    case 'modify':
        $datos = [
            "id_permiso"=>(isset($_POST["id_permiso"]))?$_POST["id_permiso"]:"NOT NULL",
            "id_rol"=>(isset($_POST["id_rol"]))?$_POST["id_rol"]:"NOT NULL",
            "id_per_rol"=>($_POST["id_per_rol"])
        ];
        $permiso_rol->setIdPermiso($datos["id_permiso"]);
        $permiso_rol->setIdRol($datos["id_rol"]);
        $permiso_rol->setIdPermisoRol($datos["id_per_rol"]);
        $permiso_rol->modifyPermisoRol();
        header("Location: permiso_rol.php");
      break;
    case 'form':
        $data = [
            "id_permiso" => "",
            "id_rol" => ""
        ];
        $data_permiso = $permiso ->readPermiso();
        $data_rol = $rol ->readRol();
        $id_per_rol = (isset($_GET["id_per_rol"]))?$_GET["id_per_rol"]:null;
        if(is_numeric($id_per_rol))
        {
            $permiso_rol->setIdPermisoRol($id_per_rol);
            $data=$permiso_rol->readOnePermisoRol();
            $script = "permiso_rol.php?action=modify";
            include("view/form.php");
        }else{
            $script = "permiso_rol.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_per_rol = (isset($_GET["id_per_rol"]))?$_GET["id_per_rol"]:null;
        if(is_numeric($id_per_rol))
        {
            $permiso_rol->setIdPermisoRol($id_per_rol);
            $permiso_rol->deletePermisoRol();
        }
        header("Location: permiso_rol.php");
      break;
    case 'show':
        default:
        $data = $permiso_rol ->readPermisoRol();
        include("view/index.php");
      break;
}
?>