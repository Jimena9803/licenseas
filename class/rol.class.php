<?php
require_once("database.class.php");
class Rol extends Database{
  var $id_rol;
  var $rol;

  function getIdRol(){return $this->id_rol;}
  function getRol(){return $this->rol;}

  function setIdRol($id_rol){$this->id_rol=$id_rol;}
  function setRol($rol){$this->rol=$rol;}

  function createRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into rol(rol) values(?)"))
    {
      $rol = $this->getRol();
      $stmt->bindParam(1, $rol);
      $stmt->execute();
    }
    $this->close();
  }

  function readRol()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM rol");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from rol where id_rol = ?"))
    {
     $id_rol=$this->getIdRol();
     $stmt->bindParam(1, $id_rol);
     $stmt->execute();
    }
    $this->close();
  }
  
  function modifyRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE rol SET rol = ? WHERE id_rol = ?")) 
    {
      $datos = [
        "id_rol"=>$this->getIdRol(),
        "rol"=>$this->getRol()
      ];
      $stmt->bindParam(1, $datos["rol"]);
      $stmt->bindParam(2, $datos["id_rol"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from rol where id_rol = ?"))
    {
      $id_rol=$this->getIdRol();
      $stmt->bindParam(1, $id_rol);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$rol = new Rol;
?>