<?php
require_once("database.class.php");
class LicenciaUso extends Database{
  var $id_lic_uso;
  var $nombre;
  var $a_paterno;
  var $a_materno;
  var $empresa;
  var $area;
  var $puesto;
  var $num_serie;
  var $licencia;
  var $ticket;

  function getIdLicUso(){return $this->id_lic_uso;}
  function getNombre(){return $this->nombre;}
  function getAPaterno(){return $this->a_paterno;}
  function getAMaterno(){return $this->a_materno;}
  function getEmpresa(){return $this->empresa;}
  function getArea(){return $this->area;}
  function getPuesto(){return $this->puesto;}
  function getNumSerie(){return $this->num_serie;}
  function getLicencia(){return $this->licencia;}
  function getTicket(){return $this->ticket;}

  function setIdLicUso($id_lic_uso){$this->id_lic_uso=$id_lic_uso;}
  function setNombre($nombre){$this->nombre=$nombre;}
  function setAPaterno($a_paterno){$this->a_paterno=$a_paterno;}
  function setAMaterno($a_materno){$this->a_materno=$a_materno;}
  function setEmpresa($empresa){$this->empresa=$empresa;}
  function setArea($area){$this->area=$area;}
  function setPuesto($puesto){$this->puesto=$puesto;}
  function setNumSerie($num_serie){$this->num_serie=$num_serie;}
  function setLicencia($licencia){$this->licencia=$licencia;}
  function setTicket($ticket){$this->ticket=$ticket;}

  function createLicenciaUso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into licencias_uso(nombre, a_paterno, a_materno, empresa, area, puesto, num_serie, licencia, ticket) values(?, ?, ?, ?, ?, ?, ?, ?, ?)"))
    {
      $nombre = $this->getNombre();
      $a_paterno = $this->getAPaterno();
      $a_materno = $this->getAMaterno();
      $empresa = $this->getEmpresa();
      $area = $this->getArea();
      $puesto = $this->getPuesto();
      $num_serie = $this->getNumSerie();
      $licencia = $this->getLicencia();
      $ticket = $this->getTicket();
      $stmt->bindParam(1, $nombre);
      $stmt->bindParam(2, $a_paterno);
      $stmt->bindParam(3, $a_materno);
      $stmt->bindParam(4, $empresa);
      $stmt->bindParam(5, $area);
      $stmt->bindParam(6, $puesto);
      $stmt->bindParam(7, $num_serie);
      $stmt->bindParam(8, $licencia);
      $stmt->bindParam(9, $ticket);
      $stmt->execute();
    }
    $this->close();
  }

  function readLicenciaUso()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM licencias_uso");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteLicenciaUso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from licencias_uso where id_lic_uso = ?"))
    {
     $id_lic_uso=$this->getIdLicUso();
     $stmt->bindParam(1, $id_lic_uso);
     $stmt->execute();
    }
    $this->close();
  }
  
  function modifyLicenciaUso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE licencias_uso SET nombre = ?, a_paterno = ?, a_materno = ?, empresa = ?, area = ?, puesto = ?, num_serie = ?, licencia = ?, ticket = ? WHERE id_lic_uso= ?")) 
    {
      $datos = [
        "id_lic_uso"=>$this->getIdLicUso(),
        "nombre"=>$this->getNombre(),
        "a_paterno"=>$this->getAPaterno(),
        "a_materno"=>$this->getAMaterno(),
        "empresa"=>$this->getEmpresa(),
        "area"=>$this->getArea(),
        "puesto"=>$this->getPuesto(),
        "num_serie"=>$this->getNumSerie(),
        "licencia"=>$this->getLicencia(),
        "ticket"=>$this->getTicket()
      ];
      $stmt->bindParam(1, $datos["nombre"]);
      $stmt->bindParam(2, $datos["a_paterno"]);
      $stmt->bindParam(3, $datos["a_materno"]);
      $stmt->bindParam(4, $datos["empresa"]);
      $stmt->bindParam(5, $datos["area"]);
      $stmt->bindParam(6, $datos["puesto"]);
      $stmt->bindParam(7, $datos["num_serie"]);
      $stmt->bindParam(8, $datos["licencia"]);
      $stmt->bindParam(9, $datos["ticket"]);
      $stmt->bindParam(10, $datos["id_lic_uso"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneLicenciaUso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from licencias_uso where id_lic_uso = ?"))
    {
      $id_lic_uso=$this->getIdLicUso();
      $stmt->bindParam(1, $id_lic_uso);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$licenciauso = new LicenciaUso;
?>