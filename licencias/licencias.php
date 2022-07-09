<?php
include("../class/licencias.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
$licencia->VerificarPermiso("Licencias");
switch($action){
    case 'new':
        $datos = [
            "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:"NOT NULL",
            "tipo_licencia"=>(isset($_POST["tipo_licencia"]))?$_POST["tipo_licencia"]:"NOT NULL",
            "cantidad_licencias"=>(isset($_POST["cantidad_licencias"]))?$_POST["cantidad_licencias"]:null,
            "costo"=>(isset($_POST["costo"]))?$_POST["costo"]:null,
            "comentarios"=>(isset($_POST["comentarios"]))?$_POST["comentarios"]:null,
            "adquisicion"=>(isset($_POST["adquisicion"]))?$_POST["adquisicion"]:"NOT NULL",
            "vigencia"=>(isset($_POST["vigencia"]))?$_POST["vigencia"]:"NOT NULL"
        ];
        $licencias->setLicencia($datos["licencia"]);
        $licencias->setTipoLicencia($datos["tipo_licencia"]);
        $licencias->setCantidadLicencias($datos["cantidad_licencias"]);
        $licencias->setCosto($datos["costo"]);
        $licencias->setComentarios($datos["comentarios"]);
        $licencias->setAdquisicion($datos["adquisicion"]);
        $licencias->setVigencia($datos["vigencia"]);
        $licencias->createLicencia();
        header("Location: licencias.php");
      break;
    case 'modify':
        $datos = [
            "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:"NOT NULL",
            "tipo_licencia"=>(isset($_POST["tipo_licencia"]))?$_POST["tipo_licencia"]:"NOT NULL",
            "cantidad_licencias"=>(isset($_POST["cantidad_licencias"]))?$_POST["cantidad_licencias"]:null,
            "costo"=>(isset($_POST["costo"]))?$_POST["costo"]:null,
            "comentarios"=>(isset($_POST["comentarios"]))?$_POST["comentarios"]:null,
            "adquisicion"=>(isset($_POST["adquisicion"]))?$_POST["adquisicion"]:"NOT NULL",
            "vigencia"=>(isset($_POST["vigencia"]))?$_POST["vigencia"]:"NOT NULL",
            "id_licencia"=>($_POST["id_licencia"])
        ];
        $licencias->setLicencia($datos["licencia"]);
        $licencias->setTipoLicencia($datos["tipo_licencia"]);
        $licencias->setCantidadLicencias($datos["cantidad_licencias"]);
        $licencias->setCosto($datos["costo"]);
        $licencias->setComentarios($datos["comentarios"]);
        $licencias->setAdquisicion($datos["adquisicion"]);
        $licencias->setVigencia($datos["vigencia"]);
        $licencias->setIdLicencia($datos["id_licencia"]);
        $licencias->modifyLicencia();
        header("Location: licencias.php");
      break;
    case 'form':
        $data = [
            "licencia" => "",
            "tipo_licencia" => "",
            "cantidad_licencias" => "",
            "costo" => "",
            "comentarios" => "",
            "adquisicion" => "",
            "vigencia" => ""
        ];
        $id_licencia = (isset($_GET["id_licencia"]))?$_GET["id_licencia"]:null;
        if(is_numeric($id_licencia))
        {
            $licencias->setIdLicencia($id_licencia);
            $data=$licencias->readOneLicencia();
            $script = "licencias.php?action=modify";
            include("view/form.php");
        }else{
            $script = "licencias.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_licencia = (isset($_GET["id_licencia"]))?$_GET["id_licencia"]:null;
        if(is_numeric($id_licencia))
        {
            $licencias->setIdLicencia($id_licencia);
            $licencias->deleteLicencia();
        }
        header("Location: licencias.php");
      break;
    case 'show':
        default:
        $data = $licencias ->readLicencia();
        include("view/index.php");
      break;
}
?>