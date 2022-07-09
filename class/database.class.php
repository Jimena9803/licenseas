<?php
session_start();
class Database{
  var $host;
  var $port;
  var $db_name;
  var $user;
  var $password;
  var $conn;

  function connect()
  {
    $this->host = "localhost";
    $this->db_name ="licenseas";
    $this->user = "proyecto";
    $this->password = "proyecto123";
    $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->user, $this->password);
  }
  function close()
  {
   $this->conn=null;
  }
}
require_once("licencia.class.php");
?>