<?php include("view/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario de Licencias</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src ="js/jquery.min.js"> </script>
  <script src="js/moment.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <script src="js/fullcalendar.min.js"></script>
  <script src="js/es.js"></script>
  <script src="js/bootstrap-clockpicker.js"></script>
  <link rel="stylesheet" href="css/bootstrap-clockpicker.css">

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

  <style>
    .fc th{
      padding: 10px 0px;
      vertical-align: middle;
      background: #F2F2F2;
    }
    .fc td{
      background: #E1E8EF;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col-7"><br/><div id="calendar"></div></div>
      <div class="col"></div>
    </div>
  </div>
<script>

  $(document).ready(function(){
  $('#calendar').fullCalendar(
    {
      header: {
      left: 'today,prev,next',
      center: "title",
      right: "month,basicWeek,agendaDay"
    }, 
    
    dayClick:function(date,jsEvent,view){
      $('#btnAgregar').prop("disabled", false);
      $('#btnModificar').prop("disabled", true);
      $('#btnEliminar').prop("disabled", true);

      limpiarFormulario();
      $('#txtFecha').val(date.format());
      $("#ModalEventos").modal();
    },
    events:'../licencias/eventos.php',

    eventClick:function(calEvent, jsEvent, view){
      $('#btnAgregar').prop("disabled", true);
      $('#btnModificar').prop("disabled", false);
      $('#btnEliminar').prop("disabled", false);
      //H2
      $('#tituloEvento').html(calEvent.title);
      // Mostrar la información del evento en los inputs
      $('#txtDescripcion').val(calEvent.descripcion);
      $('#txtID').val(calEvent.id_evento);
      $('#txtTitulo').val(calEvent.title);
      $('#txtColor').val(calEvent.color);

      FechaHora = calEvent.start._i.split(" ");
      $('#txtFecha').val(FechaHora[0]);
      $('#txtHora').val(FechaHora[1]);

      $("#ModalEventos").modal();
    }
  });
});

</script>

<!-- Modal 2 (Agregar, Modificar y Eliminar) -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="txtID" name="txtID">
        <input type="hidden" id="txtFecha" name="txtFecha"/>
      <div class="form-row">
       <div class="form-group col-md-8">
          <label>Título:</label>
          <input type="text" id="txtTitulo" class="form-control" placeholder="Título del evento">
       </div>
       <div class="form-group col-md-4">
        <label>Hora:</label>
         <div class = "input-group clockpicker" data-autoclose="true">
          <input type="text" id="txtHora" value="00:00" class="form-control"/> 
         </div>
       </div>
      </div>
      <div class="form-group">
        <label>Descripción:</label>
        <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Color:</label>
        <input type="color" value="#ff0000" id="txtColor" class="form-control" style="height:36px;">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
        <button type="button" id="btnModificar" class="btn btn-secondary">Modificar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script>
  var NuevoEvento;
  $('#btnAgregar').click(function() {
    RecolectarDatosGUI();
    EnviarInformacion('agregar', NuevoEvento);
  });

  $('#btnEliminar').click(function() {
    RecolectarDatosGUI();
    EnviarInformacion('eliminar', NuevoEvento);
  });

  $('#btnModificar').click(function() {
    RecolectarDatosGUI();
    EnviarInformacion('modificar', NuevoEvento);
  });

  function RecolectarDatosGUI() {
    NuevoEvento ={
      id_evento: $('#txtID').val(),
      title: $('#txtTitulo').val(),
      start: $('#txtFecha').val()+" "+$('#txtHora').val(),
      color: $('#txtColor').val(),
      descripcion: $('#txtDescripcion').val(),
      textColor:"#FFFFFF",
      end: $('#txtFecha').val()+" "+$('#txtHora').val()
    };    
  }

  function EnviarInformacion(accion,objEvento){
    $.ajax({
      type:'POST',
      url:'eventos.php?accion='+accion,
      data:objEvento,
      success:function(msg){
        if(msg){
          $('#calendar').fullCalendar('refetchEvents');
          $("#ModalEventos").modal('toggle');
        }
      },
      error:function(){
        alert("Hay un error...");
      }
    });
  }
  $('.clockpicker').clockpicker();
  function limpiarFormulario(){
    $('#txtID').val('');
    $('#txtTitulo').val('');
    $('#txtDescripcion').val('');
    $('#txtColor').val('');
  }
</script>
</body>


<!--------- WEB DEVELOPER ------>
<!--------- URIAN VIERA   ----------->
<!--------- PORTAFOLIO:  https://blogangular-c7858.web.app  -------->
