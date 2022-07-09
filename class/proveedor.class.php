<?php
require_once("database.class.php");
class Proveedor extends Database{
  var $id_proveedor;
  var $num_proveedor;
  var $proveedor;
  var $correo;
  var $licencia;
  var $costo;
  var $moneda;

  function getIdProveedor(){return $this->id_proveedor;}
  function getNumProveedor(){return $this->num_proveedor;}
  function getProveedor(){return $this->proveedor;}
  function getCorreo(){return $this->correo;}
  function getLicencia(){return $this->licencia;}
  function getCosto(){return $this->costo;}
  function getMoneda(){return $this->moneda;}

  function setIdProveedor($id_proveedor){$this->id_proveedor=$id_proveedor;}
  function setNumProveedor($num_proveedor){$this->num_proveedor=$num_proveedor;}
  function setProveedor($proveedor){$this->proveedor=$proveedor;}
  function setCorreo($correo){$this->correo=$correo;}
  function setLicencia($licencia){$this->licencia=$licencia;}
  function setCosto($costo){$this->costo=$costo;}
  function setMoneda($moneda){$this->moneda=$moneda;}

  function createProveedor()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into proveedor(num_proveedor, proveedor, correo, licencia, costo, moneda) values(?, ?, ?, ?, ?, ?)"))
    {
      $num_proveedor = $this->getNumProveedor();
      $proveedor = $this->getProveedor();
      $correo = $this->getCorreo();
      $licencia = $this->getLicencia();
      $costo = $this->getCosto();
      $moneda = $this->getMoneda();
      $stmt->bindParam(1, $num_proveedor);
      $stmt->bindParam(2, $proveedor);
      $stmt->bindParam(3, $correo);
      $stmt->bindParam(4, $licencia);
      $stmt->bindParam(5, $costo);
      $stmt->bindParam(6, $moneda);
      $stmt->execute();
    }
    $this->close();
  }

  function readProveedor()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM proveedor");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteProveedor()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from proveedor where id_proveedor = ?"))
    {
     $id_proveedor=$this->getIdProveedor();
     $stmt->bindParam(1, $id_proveedor);
     $stmt->execute();
    }
    $this->close();
  }
  
  function modifyProveedor()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE proveedor SET num_proveedor = ?, proveedor = ?, correo = ?, licencia = ?, costo = ?, moneda = ? WHERE id_proveedor = ?")) 
    {
      $datos = [
        "id_proveedor"=>$this->getIdProveedor(),
        "num_proveedor"=>$this->getNumProveedor(),
        "proveedor"=>$this->getProveedor(),
        "correo"=>$this->getCorreo(),
        "licencia"=>$this->getLicencia(),
        "costo"=>$this->getCosto(),
        "moneda"=>$this->getMoneda()
      ];
      $stmt->bindParam(1, $datos["num_proveedor"]);
      $stmt->bindParam(2, $datos["proveedor"]);
      $stmt->bindParam(3, $datos["correo"]);
      $stmt->bindParam(4, $datos["licencia"]);
      $stmt->bindParam(5, $datos["costo"]);
      $stmt->bindParam(6, $datos["moneda"]);
      $stmt->bindParam(7, $datos["id_proveedor"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneProveedor()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from proveedor where id_proveedor = ?"))
    {
      $id_proveedor=$this->getIdProveedor();
      $stmt->bindParam(1, $id_proveedor);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$proveedor = new Proveedor;
?>