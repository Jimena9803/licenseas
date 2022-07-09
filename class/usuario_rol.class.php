<?php
require_once("database.class.php");
class Usuario_Rol extends Database{
  var $id_usuario_rol;
  var $id_usuario;
  var $id_rol;

  function getIdUsuarioRol(){return $this->id_usuario_rol;}
  function getIdUsuario(){return $this->id_usuario;}
  function getIdRol(){return $this->id_rol;}

  function setIdUsuarioRol($id_usuario_rol){$this->id_usuario_rol=$id_usuario_rol;}
  function setIdUsuario($id_usuario){$this->id_usuario=$id_usuario;}
  function setIdRol($id_rol){$this->id_rol=$id_rol;}

  function createUsuarioRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into usuario_rol(id_usuario, id_rol) values(?, ?)"))
    {
      $id_usuario = $this->getIdUsuario();
      $id_rol = $this->getIdRol();
      $stmt->bindParam(1, $id_usuario);
      $stmt->bindParam(2, $id_rol);
      $stmt->execute();
    }
    $this->close();
  }

  function readUsuarioRol()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM usuario_rol");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteUsuarioRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from usuario_rol where id_usuario_rol = ?"))
    {
      $id_usuario_rol=$this->getIdUsuarioRol();
      $stmt->bindParam(1, $id_usuario_rol);
      $stmt->execute();
    }
    $this->close();
  }

  function modifyUsuarioRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE usuario_rol SET id_usuario = ?, id_rol = ?  WHERE id_usuario_rol = ?")) 
    {
      $datos = [
        "id_usuario_rol"=>$this->getIdUsuarioRol(),
        "id_usuario"=>$this->getIdUsuario(),
        "id_rol"=>$this->getIdRol()
      ];
      $stmt->bindParam(1, $datos["id_usuario"]);
      $stmt->bindParam(2, $datos["id_rol"]);
      $stmt->bindParam(3, $datos["id_usuario_rol"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneUsuarioRol()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from usuario_rol where id_usuario_rol = ?"))
    {
      $id_usuario_rol=$this->getIdUsuarioRol();
      $stmt->bindParam(1, $id_usuario_rol);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$usuario_rol = new Usuario_Rol;
?>