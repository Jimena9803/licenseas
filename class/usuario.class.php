<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require_once("database.class.php");
class Usuario extends Database{
  var $id_usuario;
  var $correo;
  var $contrasena;

  function getIdUsuario(){return $this->id_usuario;}
  function getCorreo(){return $this->correo;}
  function getContrasena(){return $this->contrasena;}

  function setIdUsuario($id_usuario){$this->id_usuario=$id_usuario;}
  function setCorreo($correo){$this->correo=$correo;}
  function setContrasena($contrasena){$this->contrasena=$contrasena;}

  function EnvioCorreoUsuario($destinatario, $nombre, $asunto, $mensaje)
  {
      require ($_SERVER['DOCUMENT_ROOT'].'/licencias/vendor/autoload.php');
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->SMTPDebug = SMTP::DEBUG_OFF;
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->SMTPAuth = true;
      $mail->Username = '17030020@itcelaya.edu.mx';
      $mail->Password = ' ';
      $mail->setFrom('17030020@itcelaya.edu.mx', 'CIE Automotive');
      $mail->addAddress($destinatario, $nombre);
      $mail->Subject = $asunto;
      $mail->msgHTML($mensaje);
      if (!$mail->send()) 
      {
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
          echo 'Message sent!';
      }
  }
  function createUsuario()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("INSERT into usuario(correo, contrasena) values(?, md5(?))"))
    {
      $correo = $this->getCorreo();
      $contrasena = $this->getContrasena();
      $stmt->bindParam(1, $correo);
      $stmt->bindParam(2, $contrasena);
      $stmt->execute();
      $mensaje = "Estimado usuario ha sido registrado para acceder al License Alert System con el siguiente hipervinculo
      <br> http://localhost:80/licencias/login/login.php con su Usuario: \n".$correo ."\n Contraseña: \n" .$contrasena;
      $this->EnvioCorreoUsuario($correo, 'Usuario generico', 'Usuario y Contraseña', $mensaje);
    }
    $this->close();
  }
  
  function readUsuario()
  {
    $this->connect();
    $datos = array();
    $resultado = $this->conn->query("SELECT * FROM usuario");
    $datos = $resultado->fetchAll();
    $this->close();
    return $datos;
  }

  function deleteUsuario()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("DELETE from usuario where id_usuario = ?"))
    {
     $id_usuario=$this->getIdUsuario();
     $stmt->bindParam(1, $id_usuario);
     $stmt->execute();
   }
   $this->close();
  }

  function modifyUsuario()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("UPDATE usuario SET correo = ?, contrasena = md5(?) WHERE id_usuario = ?")) 
    {
      $datos = [
        "id_usuario"=>$this->getIdUsuario(),
        "correo"=>$this->getCorreo(),
        "contrasena"=>$this->getContrasena()
      ];
      $stmt->bindParam(1, $datos["correo"]);
      $stmt->bindParam(2, $datos["contrasena"]);
      $stmt->bindParam(3, $datos["id_usuario"]);
      $stmt->execute();   
    } 
    $this->close();
  }

  function readOneUsuario()
  {
    $this->connect();
    if ($stmt = $this->conn->prepare("SELECT * from usuario where id_usuario = ?"))
    {
      $id_usuario=$this->getIdUsuario();
      $stmt->bindParam(1, $id_usuario);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      return $datos[0];  
    }
    $this->close();
  }
}
$usuario = new Usuario;
?>
