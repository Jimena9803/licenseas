<?php 
header('Content-Type: application/json');
$pdo = new PDO("mysql:dbname=licenseas; host=localhost", "proyecto", "proyecto123");
$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

switch($accion){
    case 'agregar':
        $sentenciaSQL = $pdo -> prepare("INSERT INTO eventos (title, descripcion, color, textColor, start, end) values 
        (:title,:descripcion,:color,:textColor,:start,:end)");

        $respuesta=$sentenciaSQL->execute(array(
            "title"=>$_POST['title'],
            "descripcion"=>$_POST['descripcion'],
            "color"=>$_POST['color'],
            "textColor"=>$_POST['textColor'],
            "start"=>$_POST['start'],
            "end"=>$_POST['end']
        ));
        echo json_encode($respuesta);
        break;
    case 'eliminar':
        $respuesta = false;
        if(isset($_POST['id_evento'])){
            $sentenciaSQL = $pdo -> prepare("DELETE FROM eventos WHERE id_evento=:id_evento");
            $respuesta = $sentenciaSQL -> execute(array("id_evento"=>$_POST['id_evento']));
        }
        echo json_encode($respuesta);
        break;
    case 'modificar':
        $sentenciaSQL = $pdo -> prepare("UPDATE eventos SET
        title=:title,
        descripcion=:descripcion,
        color=:color,
        textColor=:textColor, 
        start=:start,
        end=:end
        where id_evento=:id_evento");

        $respuesta=$sentenciaSQL->execute(array(
            "id_evento"=>$_POST['id_evento'],
            "title"=>$_POST['title'],
            "descripcion"=>$_POST['descripcion'],
            "color"=>$_POST['color'],
            "textColor"=>$_POST['textColor'],
            "start"=>$_POST['start'],
            "end"=>$_POST['end']
        ));
        echo json_encode($respuesta);
        break;
    default:
        //Seleccionar eventos de calendario
        $sentenciaSQL = $pdo -> prepare("SELECT * FROM eventos");
        $sentenciaSQL->execute();
        $resultado = $sentenciaSQL ->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;

}

?>