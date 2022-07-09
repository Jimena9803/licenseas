<?php
require_once("database.class.php");
class Permiso_Rol extends Database{
  var $id_per_rol;
  var $id_permiso;
  var $id_rol;

  function getIdPermisoRol(){return $this->id_per_rol;}
  function getIdPermiso(){return $this->id_permiso;}
  function getIdRol(){return $this->id_rol;}

  function setIdPermisoRol($id_per_rol){$this->id_per_rol=$id_per_rol;}
  function setIdPermiso($id_permiso){$this->id_permiso=$id_permiso;}
  function setIdRol($id_rol){$this->id_rol=$id_rol;}

  function createPermisoRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into permiso_rol(id_permiso, id_rol) values(?, ?)"))
    {
      $id_permiso = $this->getIdPermiso();
      $id_rol = $this->getIdRol();
      $stmt->bindParam(1, $id_permiso);
      $stmt->bindParam(2, $id_rol);
      $stmt->execute();
    }
    $this->close();
  }

  function readPermisoRol()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM permiso_rol");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deletePermisoRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from permiso_rol where id_per_rol = ?"))
    {
     $id_per_rol=$this->getIdPermisoRol();
     $stmt->bindParam(1, $id_per_rol);
     $stmt->execute();
   }
   $this->close();
  }

  function modifyPermisoRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE permiso_rol SET id_permiso = ?, id_rol = ?  WHERE id_per_rol = ?")) 
    {
      $datos = [
        "id_per_rol"=>$this->getIdPermisoRol(),
        "id_permiso"=>$this->getIdPermiso(),
        "id_rol"=>$this->getIdRol()
      ];
      $stmt->bindParam(1, $datos["id_permiso"]);
      $stmt->bindParam(2, $datos["id_rol"]);
      $stmt->bindParam(3, $datos["id_per_rol"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOnePermisoRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from permiso_rol where id_per_rol = ?"))
    {
      $id_per_rol=$this->getIdPermisoRol();
      $stmt->bindParam(1, $id_per_rol);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$permiso_rol = new Permiso_Rol;
?>