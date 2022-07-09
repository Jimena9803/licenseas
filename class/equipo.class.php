<?php
require_once("database.class.php");
class Equipo extends Database{
  var $id_equipo;
  var $num_serie;
  var $modelo;
  var $submodelo;
  var $marca;
  var $tipo;

  function getIdEquipo(){return $this->id_equipo;}
  function getNumSerie(){return $this->num_serie;}
  function getModelo(){return $this->modelo;}
  function getSubmodelo(){return $this->submodelo;}
  function getMarca(){return $this->marca;}
  function getTipo(){return $this->tipo;}

  function setIdEquipo($id_equipo){$this->id_equipo=$id_equipo;}
  function setNumSerie($num_serie){$this->num_serie=$num_serie;}
  function setModelo($modelo){$this->modelo=$modelo;}
  function setSubmodelo($submodelo){$this->submodelo=$submodelo;}
  function setMarca($marca){$this->marca=$marca;}
  function setTipo($tipo){$this->tipo=$tipo;}

  function createEquipo()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into equipo(num_serie, modelo, submodelo, marca, tipo) values(?, ?, ?, ?, ?)"))
    {
      $num_serie = $this->getNumSerie();
      $modelo = $this->getModelo();
      $submodelo = $this->getSubmodelo();
      $marca = $this->getMarca();
      $tipo = $this->getTipo();
      $stmt->bindParam(1, $num_serie);
      $stmt->bindParam(2, $modelo);
      $stmt->bindParam(3, $submodelo);
      $stmt->bindParam(4, $marca);
      $stmt->bindParam(5, $tipo);
      $stmt->execute();
    }
    $this->close();
  }

  function readEquipo()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM equipo");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteEquipo()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from equipo where id_equipo = ?"))
    {
     $id_equipo=$this->getIdEquipo();
     $stmt->bindParam(1, $id_equipo);
     $stmt->execute();
    }
    $this->close();
  }
  
  function modifyEquipo()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE equipo SET num_serie = ?, modelo = ?, submodelo = ?, marca = ?, tipo = ? WHERE id_equipo = ?")) 
    {
      $datos = [
        "id_equipo"=>$this->getIdEquipo(),
        "num_serie"=>$this->getNumSerie(),
        "modelo"=>$this->getModelo(),
        "submodelo"=>$this->getSubmodelo(),
        "marca"=>$this->getMarca(),
        "tipo"=>$this->getTipo()
      ];
      $stmt->bindParam(1, $datos["num_serie"]);
      $stmt->bindParam(2, $datos["modelo"]);
      $stmt->bindParam(3, $datos["submodelo"]);
      $stmt->bindParam(4, $datos["marca"]);
      $stmt->bindParam(5, $datos["tipo"]);
      $stmt->bindParam(6, $datos["id_equipo"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneEquipo()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from equipo where id_equipo = ?"))
    {
      $id_equipo=$this->getIdEquipo();
      $stmt->bindParam(1, $id_equipo);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$equipo = new Equipo;
?>