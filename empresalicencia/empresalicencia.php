<?php
include("../class/empresalicencia.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
switch($action){
    case 'new':
        $datos = [
            "empresa"=>(isset($_POST["empresa"]))?$_POST["empresa"]:null,
            "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:null,
            "total_licencias"=>(isset($_POST["total_licencias"]))?$_POST["total_licencias"]:"NOT NULL",
            "comentarios"=>(isset($_POST["comentarios"]))?$_POST["comentarios"]:"NOT NULL"
        ];
        $empresalic->setEmpresa($datos["empresa"]);
        $empresalic->setLicencia($datos["licencia"]);
        $empresalic->setTotalLicencias($datos["total_licencias"]);
        $empresalic->setComentarios($datos["comentarios"]);
        $empresalic->createEmpresaLic();
        header("Location: empresalicencia.php");
      break;
    case 'modify':
        $datos = [
            "empresa"=>(isset($_POST["empresa"]))?$_POST["empresa"]:null,
            "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:null,
            "total_licencias"=>(isset($_POST["total_licencias"]))?$_POST["total_licencias"]:"NOT NULL",
            "comentarios"=>(isset($_POST["comentarios"]))?$_POST["comentarios"]:"NOT NULL",
            "id_emp_lic"=>($_POST["id_emp_lic"])
        ];
        $empresalic->setEmpresa($datos["empresa"]);
        $empresalic->setLicencia($datos["licencia"]);
        $empresalic->setTotalLicencias($datos["total_licencias"]);
        $empresalic->setComentarios($datos["comentarios"]);
        $empresalic->setIdEmpLic($datos["id_emp_lic"]);
        $empresalic->modifyEmpresaLic();
        header("Location: empresalicencia.php");
      break;
    case 'form':
        $data = [
            "empresa" => "",
            "licencia" => "",
            "total_licencias" => "",
            "comentarios" => ""
        ];
        $id_emp_lic = (isset($_GET["id_emp_lic"]))?$_GET["id_emp_lic"]:null;
        if(is_numeric($id_emp_lic))
        {
            $empresalic->setIdEmpLic($id_emp_lic);
            $data=$empresalic->readOneEmpresaLic();
            $script = "empresalicencia.php?action=modify";
            include("view/form.php");
        }else{
            $script = "empresalicencia.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_emp_lic = (isset($_GET["id_emp_lic"]))?$_GET["id_emp_lic"]:null;
        if(is_numeric($id_emp_lic))
        {
            $empresalic->setIdEmpLic($id_emp_lic);
            $empresalic->deleteEmpresaLic();
        }
        header("Location: empresalicencia.php");
      break;
    case 'show':
        default:
        $data = $empresalic ->readEmpresaLic();
        include("view/index.php");
      break;
}