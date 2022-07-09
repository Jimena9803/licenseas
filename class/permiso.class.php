<?php
require_once("database.class.php");
class Permiso extends Database{
  var $id_permiso;
  var $permiso;

  function getIdPermiso(){return $this->id_permiso;}
  function getPermiso(){return $this->permiso;}

  function setIdPermiso($id_permiso){$this->id_permiso=$id_permiso;}
  function setPermiso($permiso){$this->permiso=$permiso;}

  function createPermiso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into permiso(permiso) values(?)"))
    {
      $permiso = $this->getPermiso();
      $stmt->bindParam(1, $permiso);
      $stmt->execute();
    }
    $this->close();
  }

  function readPermiso()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM permiso");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deletePermiso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from permiso where id_permiso = ?"))
    {
      $id_permiso=$this->getIdPermiso();
      $stmt->bindParam(1, $id_permiso);
      $stmt->execute();
    }
    $this->close();
  }
  
  function modifyPermiso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE permiso SET permiso = ? WHERE id_permiso = ?")) 
    {
      $datos = [
        "id_permiso"=>$this->getIdPermiso(),
        "permiso"=>$this->getPermiso()
      ];
      $stmt->bindParam(1, $datos["permiso"]);
      $stmt->bindParam(2, $datos["id_permiso"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOnePermiso()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from permiso where id_permiso = ?"))
    {
      $id_permiso=$this->getIdPermiso();
      $stmt->bindParam(1, $id_permiso);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$permiso = new Permiso;
?>