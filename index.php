<?php
include("class/database.class.php");
$licencia->VerificarPermiso("Indice");
include_once 'view/header.php';?>

<link rel="stylesheet" type="text/css" href="css/carousel.css"/>
<main role="main">
      <div class="background">
        <img src="images/cie_automotive.png" alt="Imagen Encabezado" width="100%" height="60%"/>
      </div>
    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Misión</h2>
        <p class="lead"><b>Somos un equipo comprometido con un proyecto de automoción que crece de forma sostenida desde hace más de 25 años.</b></p>
        <p class="lead"><b>Somos un proveedor global y multitecnológico: </b></p>
        <ul>
          <li>4 continentes</li>
          <li>7 tecnologías</li>
        </ul>
        <p class="lead"><b>Somos un equipo participativo e innovador:</b></p>
        <ul>
          <li>Cada persona es un emprendedor.</li>
          <li>Estamos orgullosos de pertenecer a él.</li>
        </ul>
        <p class="lead"><b>Aportamos valor a todos nuestros grupos de interés.</b></p>
        <p class="lead"><b>Garantizamos calidad y servicio.</b></p>
        <p class="lead"><b>Cuidamos del planeta:</b></p>
        <ul>
          <li>Contribuimos a mejorar nuestro entorno.</li>
          <li>Minimizamos nuestro impacto ambiental.</li>
        </ul>
      </div>
      <div class="col-md-5">
        <img src="images/mision.png"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"  width="500" height="500"/>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Visión</h2>
        <p class="lead"><b>Suministrar las mejores soluciones para la movilidad del futuro, siendo:</b></p>
        <p class="lead"><b>Climáticamente neutrales:</b></p>
        <ul>
          <li>Circularidad máxima de los recursos.</li>
          <li>Cero emisiones netas.</li>
        </ul>
        <p class="lead"><b>Tractores de la cadena de valor:</b></p>
        <ul>
          <li>Concepción integral.</li>
          <li>Favoreciendo las economías locales.</li>
        </ul>
        <p class="lead"><b>Referente en la sociedad:</b></p>
        <ul>
          <li>Garantizando la integridad, la seguridad y la salud de personas.</li>
          <li>Escuchando, transmitiendo y actuando.</li>
        </ul>
        <p class="lead"><b>Excelentes en la gestión:</b></p>
        <ul>
          <li>Transparencia e integridad.</li>
          <li>Generando valor.</li>
        </ul>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="images/vision.png"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"  width="500" height="500"/>
      </div>
    </div>

    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">&nbsp Valores</h2>
        <ul>
          <li>Compromiso con las cosas bien hechas.</li>
          <li>La innovación como la respuesta a cualquier desafío.</li>
          <li>Foco en las personas, sus familias y su entorno.</li>
          <li>Diversidad, equidad e inclusión.</li>
          <li>Crecimiento sostenible y rentable.</li>
          <li>Ética y honestidad.</li>
          <li>Autocrítica y reconocimiento.</li>
          <li>Acción a favor del clima.</li>
          <li>Respeto a la legalidad.</li>
        </ul>
      </div>
      <div class="col-md-5">
        <img src="images/valores.png"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"  width="500" height="500"/>
      </div>
    </div>

<?php include_once 'view/footer.php'; ?>