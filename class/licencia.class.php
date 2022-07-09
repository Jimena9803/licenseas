<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
class Licencia extends Database{
  function VerificarPermiso($permiso)
  {
    $mensaje = "";
    if(isset($_SESSION))
    {
      if($_SESSION["validado"])
      {
        $permisos = $_SESSION["permiso"];
        $bandera = false;
        foreach($permisos as $key => $value)
        {
         if($value["permiso"]==$permiso)
         {
           $bandera = true;
         }
        }
        if(!$bandera)
        {
          $mensaje = "Usted no tiene el permiso para realizar esta acción";
          include($_SERVER['DOCUMENT_ROOT']."/licencias/login/login.php");
          die(); 
        }
      }else{
        $this->LogOut(); 
      }
    }else{
      $this->LogOut(); 
    }
  }

  function Validar($correo, $contrasena)
  {
    $contrasena = md5($contrasena);
    $this->connect();
    $_SESSION["validado"] = false;
    $datos = [];
    $sql="SELECT id_usuario, correo from usuario where correo = ? and contrasena = ?";
    if($stmt = $this->conn->prepare($sql))
    {
      $stmt->bindParam(1, $correo);
      $stmt->bindParam(2, $contrasena);
      $stmt->execute();
      $datos = $stmt->fetchAll();
      if(isset($datos[0]))
      {
        $_SESSION["validado"] = true;
        $_SESSION["id_usuario"]=$datos[0]["id_usuario"];
        $_SESSION["correo"]=$datos[0]["correo"];
        $rol = array();
        $permiso = array();
        $sql = "SELECT r.id_rol, r.rol FROM rol r inner join usuario_rol ur ON r.id_rol = ur.id_rol WHERE ur.id_usuario = ?";
        $sql2 = "SELECT p.id_permiso, p.permiso 
        FROM permiso p inner join permiso_rol pr ON p.id_permiso = pr.id_permiso
        inner join rol r ON pr.id_rol = r.id_rol
        inner join usuario_rol ur ON r.id_rol = ur.id_rol
        WHERE ur.id_usuario = ?";
        if($stmt = $this->conn->prepare($sql))
        {
          $stmt->bindParam(1, $datos[0]["id_usuario"]);
          $stmt->execute();
          $rol = $stmt->fetchAll();
          $_SESSION["rol"]=$rol;
        }
        if($stmt = $this->conn->prepare($sql2))
        {
          $stmt->bindParam(1, $datos[0]["id_usuario"]);
          $stmt->execute();
          $permiso = $stmt->fetchAll();
          $_SESSION["permiso"]=$permiso;
        }
        return true;
      }
      else{
        return false;
      }
    }
    $this->close();
  }

  function LogOut()
  {
    session_destroy();
    $mensaje = "Usted ha salido del sistema porfavor vuelva a ingresar";
    header("Location: ../login/login.php?mensaje=1");
    die();  
  }

  function VerificarCorreo($correo)
  {
    $this->connect();
    $datos = [];
    $sql = 'SELECT * FROM usuario WHERE correo = ?';
    if($stmt = $this->conn->prepare($sql)) 
    {
      $stmt -> bindParam(1, $correo);
      $stmt->execute();
      $datos = $stmt->fetchAll();
    }
    if(!isset($datos['0']))
    {
      return false;
    }
    $this->close();
    return true;
  }

  function RecuperarContrasena($correo)
  {
    $token =  substr(md5($correo.sha1($correo."cruzazul").rand(1,1000)),0,16);
    $this->connect();
    $sql = 'UPDATE usuario set token = ? where correo = ?';
    if($stmt = $this->conn->prepare($sql)) 
    {
      $stmt -> bindParam(1, $token);
      $stmt -> bindParam(2, $correo);
      $stmt->execute();
      $mensaje = "Estimado usuario por favor ingrese al siguiente hipervinculo para recuperar su contraseña
      <br> http://localhost/licencias/login/login.php?action=reestablecer&correo=$correo&token=$token";
      $this->EnvioCorreo($correo, 'Usuario generico', 'Recuperacion de contraseña', $mensaje);
    }
    $this->close();
  }

  function EnvioCorreo($destinatario, $nombre, $asunto, $mensaje)
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
    $mail->Password = '';
    $mail->setFrom('17030020@itcelaya.edu.mx', 'Jimena Hernandez');
    $mail->addAddress($destinatario, $nombre);
    $mail->Subject = $asunto;
    $mail->msgHTML($mensaje);
    if (!$mail->send())
    {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message sent!';
    }
  }

  function VerificarToken($correo, $token)
  {
    if($this->VerificarCorreo($correo)&!is_null($token))
    {
      $this->connect();
      $sql = 'SELECT * FROM usuario WHERE correo=? and token=?';
      if($stmt = $this->conn->prepare($sql)) {
        $stmt -> bindParam(1, $correo);
        $stmt -> bindParam(2, $token);
        $stmt->execute();
        $datos = $stmt->fetchAll();
        if(isset($datos['0'])){
          return true;
        }
      }
      $this->close();
    }
    return false;
  }

  function CambiarContrasena($correo, $contrasena)
  { 
    $contrasena = md5($contrasena);
    $this->connect();
    $sql = 'UPDATE usuario SET contrasena=?, token = null WHERE correo=?';
    if($stmt = $this->conn->prepare($sql)) {
      $stmt -> bindParam(1, $contrasena);
      $stmt -> bindParam(2, $correo);
      $stmt->execute();
    }
    $this->close(); 
  }
}
$licencia = new Licencia;
?>