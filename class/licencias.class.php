<?php
require_once("database.class.php");
class Licencias extends Database{
  var $id_licencia;
  var $licencia;
  var $tipo_licencia;
  var $cantidad_licencias;
  var $costo;
  var $comentarios;
  var $adquisicion;
  var $vigencia;

  function getIdLicencia(){return $this->id_licencia;}
  function getLicencia(){return $this->licencia;}
  function getTipoLicencia(){return $this->tipo_licencia;}
  function getCantidadLicencias(){return $this->cantidad_licencias;}
  function getCosto(){return $this->costo;}
  function getComentarios(){return $this->comentarios;}
  function getAdquisicion(){return $this->adquisicion;}
  function getVigencia(){return $this->vigencia;}

  function setIdLicencia($id_licencia){$this->id_licencia=$id_licencia;}
  function setLicencia($licencia){$this->licencia=$licencia;}
  function setTipoLicencia($tipo_licencia){$this->tipo_licencia=$tipo_licencia;}
  function setCantidadLicencias($cantidad_licencias){$this->cantidad_licencias=$cantidad_licencias;}
  function setCosto($costo){$this->costo=$costo;}
  function setComentarios($comentarios){$this->comentarios=$comentarios;}
  function setAdquisicion($adquisicion){$this->adquisicion=$adquisicion;}
  function setVigencia($vigencia){$this->vigencia=$vigencia;}

  function createLicencia()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into licencias(licencia, tipo_licencia, cantidad_licencias, costo, comentarios, adquisicion, vigencia) values(?, ?, ?, ?, ?, ?, ?)"))
    {
      $licencia = $this->getLicencia();
      $tipo_licencia = $this->getTipoLicencia();
      $cantidad_licencias = $this->getCantidadLicencias();
      $costo = $this->getCosto();
      $comentarios = $this->getComentarios();
      $adquisicion = $this->getAdquisicion();
      $vigencia = $this->getVigencia();
      $stmt->bindParam(1, $licencia);
      $stmt->bindParam(2, $tipo_licencia);
      $stmt->bindParam(3, $cantidad_licencias);
      $stmt->bindParam(4, $costo);
      $stmt->bindParam(5, $comentarios);
      $stmt->bindParam(6, $adquisicion);
      $stmt->bindParam(7, $vigencia);
      $stmt->execute();
    }
    $this->close();
  }

  function readLicencia()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM licencias");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteLicencia()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from licencias where id_licencia = ?"))
    {
     $id_licencia=$this->getIdLicencia();
     $stmt->bindParam(1, $id_licencia);
     $stmt->execute();
    }
    $this->close();
  }
  
  function modifyLicencia()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE licencias SET licencia = ?, tipo_licencia = ?, cantidad_licencias = ?, costo = ?, comentarios = ?, adquisicion = ?, vigencia = ? WHERE id_licencia = ?")) 
    {
      $datos = [
        "id_licencia"=>$this->getIdLicencia(),
        "licencia"=>$this->getLicencia(),
        "tipo_licencia"=>$this->getTipoLicencia(),
        "cantidad_licencias"=>$this->getCantidadLicencias(),
        "costo"=>$this->getCosto(),
        "comentarios"=>$this->getComentarios(),
        "adquisicion"=>$this->getAdquisicion(),
        "vigencia"=>$this->getVigencia()
      ];
      $stmt->bindParam(1, $datos["licencia"]);
      $stmt->bindParam(2, $datos["tipo_licencia"]);
      $stmt->bindParam(3, $datos["cantidad_licencias"]);
      $stmt->bindParam(4, $datos["costo"]);
      $stmt->bindParam(5, $datos["comentarios"]);
      $stmt->bindParam(6, $datos["adquisicion"]);
      $stmt->bindParam(7, $datos["vigencia"]);
      $stmt->bindParam(8, $datos["id_licencia"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneLicencia()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from licencias where id_licencia = ?"))
    {
      $id_licencia=$this->getIdLicencia();
      $stmt->bindParam(1, $id_licencia);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$licencias = new Licencias;
?>