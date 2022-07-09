<?php
include("../class/permiso.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
//$sindicato->VerificarPermiso("Permiso");
switch($action){
    case 'new':
        $datos = [
            "permiso"=>(isset($_POST["permiso"]))?$_POST["permiso"]:"NOT NULL"
        ];
        $permiso->setPermiso($datos["permiso"]);
        $permiso->createPermiso();
        header("Location: permiso.php");
      break;
    case 'modify':
        $datos = [
            "permiso"=>(isset($_POST["permiso"]))?$_POST["permiso"]:"NOT NULL",
            "id_permiso"=>($_POST["id_permiso"])
        ];
        $permiso->setPermiso($datos["permiso"]);
        $permiso->setIdPermiso($datos["id_permiso"]);
        $permiso->modifyPermiso();
        header("Location: permiso.php");
       break;
    case 'form':
        $data = [
            "permiso" => ""
        ];
        $id_permiso = (isset($_GET["id_permiso"]))?$_GET["id_permiso"]:null;
        if(is_numeric($id_permiso))
        {
            $permiso->setIdPermiso($id_permiso);
            $data=$permiso->readOnePermiso();
            $script = "permiso.php?action=modify";
            include("view/form.php");
        }else{
            $script = "permiso.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_permiso = (isset($_GET["id_permiso"]))?$_GET["id_permiso"]:null;
        if(is_numeric($id_permiso))
        {
            $permiso->setIdPermiso($id_permiso);
            $permiso->deletePermiso();
        }
        header("Location: permiso.php");
      break;
    case 'show':
        default:
        $data = $permiso ->readPermiso();
        include("view/index.php");
      break;
}
?>