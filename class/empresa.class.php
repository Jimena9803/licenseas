<?php
require_once("database.class.php");
class Empresa extends Database{
  var $id_empresa;
  var $planta;
  var $ubicacion;

  function getIdEmpresa(){return $this->id_empresa;}
  function getPlanta(){return $this->planta;}
  function getUbicacion(){return $this->ubicacion;}

  function setIdEmpresa($id_empresa){$this->id_empresa=$id_empresa;}
  function setPlanta($planta){$this->planta=$planta;}
  function setUbicacion($ubicacion){$this->ubicacion=$ubicacion;}

  function createEmpresa()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into empresa(planta, ubicacion) values(?, ?)"))
    {
      $planta = $this->getPlanta();
      $ubicacion = $this->getUbicacion();
      $stmt->bindParam(1, $planta);
      $stmt->bindParam(2, $ubicacion);
      $stmt->execute();
    }
    $this->close();
  }

  function readEmpresa()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM empresa");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteEmpresa()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from empresa where id_empresa = ?"))
    {
     $id_empresa=$this->getIdEmpresa();
     $stmt->bindParam(1, $id_empresa);
     $stmt->execute();
    }
    $this->close();
  }
  
  function modifyEmpresa()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE empresa SET planta = ?, ubicacion = ? WHERE id_empresa = ?")) 
    {
      $datos = [
        "id_empresa"=>$this->getIdEmpresa(),
        "planta"=>$this->getPlanta(),
        "ubicacion"=>$this->getUbicacion()
      ];
      $stmt->bindParam(1, $datos["planta"]);
      $stmt->bindParam(2, $datos["ubicacion"]);
      $stmt->bindParam(3, $datos["id_empresa"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneEmpresa()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from empresa where id_empresa = ?"))
    {
      $id_empresa=$this->getIdEmpresa();
      $stmt->bindParam(1, $id_empresa);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$empresa = new Empresa;
?>