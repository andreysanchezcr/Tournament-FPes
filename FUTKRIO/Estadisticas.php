<?php 
	include 'js/EstadisticasJS.php';
	include 'html/menuPrincipal.php';
 ?>


  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Jugadores</title> 
    <meta charset = "utf-8"/>
 
    <link  rel="stylesheet" type="text/css" href="css/EstadisticasCSS.css"/>
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  </head>


<a href="#" onclick="Set_Jugadores('506','404','1010')"> jugadores</a>
<a href="#" onclick="Set_Equipos('506')"> equipos</a>
<a href="#" onclick="Set_Estadios('546')"> estadios</a>
<a href="#" onclick="Set_Partidos('5426')"> partidoos</a>
<a href="#" onclick="Set_Eventos('26')"> Eventos</a>
<a href="#" onclick="Set_Acciones('patadas$$codazos','23$$43')"> Acciones</a>

<div id="CajaEstadisticas">
  <div class="Item">
    <div class="Title">Jugadores Registrados</div>
    <div class="Sup_Title">Hombres:</div>
    <div class="Resoult" id="Hombres_Cant"></div>
    <div class="Sup_Title">Mujeres:</div>
    <div class="Resoult" id="Mujeres_Cant"></div>
    <div class="Sup_Title">Total:</div>
    <div class="Resoult" id="Total_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Equipos Registrados</div>
    <div class="Cant" id="Equipos_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Estadios Registrados</div>
    <div class="Cant" id="Estadios_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Partidos Jugados</div>
    <div class="Cant" id="Partidos_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Eventos Registrados</div>
    <div class="Cant" id="Eventos_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Acciones</div>
    <div class="Cant" id="CajaAcciones">
      <div class="AccionJugada">
        <div class="Accion">patadas</div>
        <div class="Cantidad">500</div>
      <div>
    </div>
  </div>

  
  
  
</div>
