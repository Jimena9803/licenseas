<?php
include("../class/proveedor.class.php");
$action = (isset($_GET["action"]))?$_GET["action"]:null;
switch($action){
    case 'new':
        $datos = [
            "num_proveedor"=>(isset($_POST["num_proveedor"]))?$_POST["num_proveedor"]:null,
            "proveedor"=>(isset($_POST["proveedor"]))?$_POST["proveedor"]:"NOT NULL",
            "correo"=>(isset($_POST["correo"]))?$_POST["correo"]:"NOT NULL",
            "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:"NOT NULL",
            "costo"=>(isset($_POST["costo"]))?$_POST["costo"]:null,
            "moneda"=>(isset($_POST["moneda"]))?$_POST["moneda"]:null
        ];
        $proveedor->setNumProveedor($datos["num_proveedor"]);
        $proveedor->setProveedor($datos["proveedor"]);
        $proveedor->setCorreo($datos["correo"]);
        $proveedor->setLicencia($datos["licencia"]);
        $proveedor->setCosto($datos["costo"]);
        $proveedor->setMoneda($datos["moneda"]);
        $proveedor->createProveedor();
        header("Location: proveedor.php");
      break;
    case 'modify':
        $datos = [
            "num_proveedor"=>(isset($_POST["num_proveedor"]))?$_POST["num_proveedor"]:null,
            "proveedor"=>(isset($_POST["proveedor"]))?$_POST["proveedor"]:"NOT NULL",
            "correo"=>(isset($_POST["correo"]))?$_POST["correo"]:"NOT NULL",
            "licencia"=>(isset($_POST["licencia"]))?$_POST["licencia"]:"NOT NULL",
            "costo"=>(isset($_POST["costo"]))?$_POST["costo"]:null,
            "moneda"=>(isset($_POST["moneda"]))?$_POST["moneda"]:null,
            "id_proveedor"=>($_POST["id_proveedor"])
        ];
        $proveedor->setNumProveedor($datos["num_proveedor"]);
        $proveedor->setProveedor($datos["proveedor"]);
        $proveedor->setCorreo($datos["correo"]);
        $proveedor->setLicencia($datos["licencia"]);
        $proveedor->setCosto($datos["costo"]);
        $proveedor->setMoneda($datos["moneda"]);
        $proveedor->setIdProveedor($datos["id_proveedor"]);
        $proveedor->modifyProveedor();
        header("Location: proveedor.php");
      break;
    case 'form':
        $data = [
            "num_proveedor" => "",
            "proveedor" => "",
            "correo" => "",
            "licencia" => "",
            "costo" => "",
            "moneda" => ""
        ];
        $id_proveedor = (isset($_GET["id_proveedor"]))?$_GET["id_proveedor"]:null;
        if(is_numeric($id_proveedor))
        {
            $proveedor->setIdProveedor($id_proveedor);
            $data=$proveedor->readOneProveedor();
            $script = "proveedor.php?action=modify";
            include("view/form.php");
        }else{
            $script = "proveedor.php?action=new";
            include("view/form.php");
        }
      break;
    case 'delete':
        $id_proveedor = (isset($_GET["id_proveedor"]))?$_GET["id_proveedor"]:null;
        if(is_numeric($id_proveedor))
        {
            $proveedor->setIdProveedor($id_proveedor);
            $proveedor->deleteProveedor();
        }
        header("Location: proveedor.php");
      break;
    case 'show':
        default:
        $data = $proveedor ->readProveedor();
        include("view/index.php");
      break;
}