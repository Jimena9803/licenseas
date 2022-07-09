<?php
include("../class/licenciasuso.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
switch($action){
    case 'new':
        $datos = [
          "nombre"=>(isset($_POST["nombre"]))?$_POST["nombre"]:"NOT NULL",
          "a_paterno"=>(isset($_POST["a_paterno"]))?$_POST["a_paterno"]:null,
          "a_materno"=>(isset($_POST["a_materno"]))?$_POST["a_materno"]:null,
          "empresa"=>(isset($_POST["empresa"]))?$_POST["empresa"]:null,
          "area"=>(isset($_POST["area"]))?$_POST["area"]:null,
          "puesto"=>(isset($_POST["puesto"]))?$_POST["puesto"]:null,
          "num_serie"=>(isset($_POST["num_serie"]))?$_POST["num_serie"]:"NOT NULL",
          "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:"NOT NULL",
          "ticket"=>(isset($_POST["ticket"]))?$_POST["ticket"]:"NOT NULL"
        ];
        $licenciauso->setNombre($datos["nombre"]);
        $licenciauso->setAPaterno($datos["a_paterno"]);
        $licenciauso->setAMaterno($datos["a_materno"]);
        $licenciauso->setEmpresa($datos["empresa"]);
        $licenciauso->setArea($datos["area"]);
        $licenciauso->setPuesto($datos["puesto"]);
        $licenciauso->setNumSerie($datos["num_serie"]);
        $licenciauso->setLicencia($datos["licencia"]);
        $licenciauso->setTicket($datos["ticket"]);
        $licenciauso->createLicenciaUso();
        header("Location: licenciasuso.php");
      break;
    case 'modify':
        $datos = [
            "nombre"=>(isset($_POST["nombre"]))?$_POST["nombre"]:"NOT NULL",
            "a_paterno"=>(isset($_POST["a_paterno"]))?$_POST["a_paterno"]:null,
            "a_materno"=>(isset($_POST["a_materno"]))?$_POST["a_materno"]:null,
            "empresa"=>(isset($_POST["empresa"]))?$_POST["empresa"]:null,
            "area"=>(isset($_POST["area"]))?$_POST["area"]:null,
            "puesto"=>(isset($_POST["puesto"]))?$_POST["puesto"]:null,
            "num_serie"=>(isset($_POST["num_serie"]))?$_POST["num_serie"]:"NOT NULL",
            "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:"NOT NULL",
            "ticket"=>(isset($_POST["ticket"]))?$_POST["ticket"]:"NOT NULL",
            "id_lic_uso"=>($_POST["id_lic_uso"])
        ];
        $licenciauso->setNombre($datos["nombre"]);
        $licenciauso->setAPaterno($datos["a_paterno"]);
        $licenciauso->setAMaterno($datos["a_materno"]);
        $licenciauso->setEmpresa($datos["empresa"]);
        $licenciauso->setArea($datos["area"]);
        $licenciauso->setPuesto($datos["puesto"]);
        $licenciauso->setNumSerie($datos["num_serie"]);
        $licenciauso->setLicencia($datos["licencia"]);
        $licenciauso->setTicket($datos["ticket"]);
        $licenciauso->setIdLicUso($datos["id_lic_uso"]);
        $licenciauso->modifyLicenciaUso();
        header("Location: licenciasuso.php");
      break;
    case 'form':
        $data = [
            "nombre" => "",
            "a_paterno" => "",
            "a_materno" => "",
            "empresa" => "",
            "area" => "",
            "puesto" => "",
            "num_serie" => "",
            "licencia" => "",
            "ticket" => ""
        ];
        $id_lic_uso = (isset($_GET["id_lic_uso"]))?$_GET["id_lic_uso"]:null;
        if(is_numeric($id_lic_uso))
        {
            $licenciauso->setIdLicUso($id_lic_uso);
            $data=$licenciauso->readOneLicenciaUso();
            $script = "licenciasuso.php?action=modify";
            include("view/form.php");
        }else{
            $script = "licenciasuso.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_lic_uso = (isset($_GET["id_lic_uso"]))?$_GET["id_lic_uso"]:null;
        if(is_numeric($id_lic_uso))
        {
            $licenciauso->setIdLicUso($id_lic_uso);
            $licenciauso->deleteLicenciaUso();
        }
        header("Location: licenciasuso.php");
      break;
    case 'show':
        default:
        $data = $licenciauso ->readLicenciaUso();
        include("view/index.php");
      break;
}