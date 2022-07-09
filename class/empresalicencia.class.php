<?php
require_once("database.class.php");
class EmpresaLicencia extends Database{
  var $id_emp_lic;
  var $empresa;
  var $licencia;
  var $total_licencias;
  var $comentarios;

  function getIdEmpLic(){return $this->id_emp_lic;}
  function getEmpresa(){return $this->empresa;}
  function getLicencia(){return $this->licencia;}
  function getTotalLicencias(){return $this->total_licencias;}
  function getComentarios(){return $this->comentarios;}

  function setIdEmpLic($id_emp_lic){$this->id_emp_lic=$id_emp_lic;}
  function setEmpresa($empresa){$this->empresa=$empresa;}
  function setLicencia($licencia){$this->licencia=$licencia;}
  function setTotalLicencias($total_licencias){$this->total_licencias=$total_licencias;}
  function setComentarios($comentarios){$this->comentarios=$comentarios;}

  function createEmpresaLic()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into empresa_licencia(empresa, licencia, total_licencias, comentarios) values(?, ?, ?, ?)"))
    {
      $empresa = $this->getEmpresa();
      $licencia = $this->getLicencia();
      $total_licencias = $this->getTotalLicencias();
      $comentarios = $this->getComentarios();
      $stmt->bindParam(1, $empresa);
      $stmt->bindParam(2, $licencia);
      $stmt->bindParam(3, $total_licencias);
      $stmt->bindParam(4, $comentarios);
      $stmt->execute();
    }
    $this->close();
  }

  function readEmpresaLic()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM empresa_licencia");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteEmpresaLic()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from empresa_licencia where id_emp_lic = ?"))
    {
     $id_emp_lic=$this->getIdEmpLic();
     $stmt->bindParam(1, $id_emp_lic);
     $stmt->execute();
    }
    $this->close();
  }
  
  function modifyEmpresaLic()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE empresa_licencia SET empresa = ?, licencia = ?, total_licencias = ?, comentarios = ?  WHERE id_emp_lic = ?")) 
    {
      $datos = [
        "id_emp_lic"=>$this->getIdEmpLic(),
        "empresa"=>$this->getEmpresa(),
        "licencia"=>$this->getLicencia(),
        "total_licencias"=>$this->getTotalLicencias(),
        "comentarios"=>$this->getComentarios()
      ];
      $stmt->bindParam(1, $datos["empresa"]);
      $stmt->bindParam(2, $datos["licencia"]);
      $stmt->bindParam(3, $datos["total_licencias"]);
      $stmt->bindParam(4, $datos["comentarios"]);
      $stmt->bindParam(5, $datos["id_emp_lic"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneEmpresaLic()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from empresa_licencia where id_emp_lic = ?"))
    {
      $id_emp_lic=$this->getIdEmpLic();
      $stmt->bindParam(1, $id_emp_lic);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$empresalic = new EmpresaLicencia;
?>