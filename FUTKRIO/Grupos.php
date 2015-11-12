<?php  
	include 'js/Grupos.php';
	include 'html/menuPrincipal.php';
?>

  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Calendario</title> 
    <meta charset = "utf-8"/>

    <link  rel="stylesheet" type="text/css" href="css/GruposCSS.css"/>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/calendar.js"></script>

<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/sunny/jquery-ui.css" />
<script src="//code.jquery.com/jquery-latest.min.js"></script>
<!-- script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  </head>
  <body>
<a href="#" onclick="holas()">hoal</a>
<div class="Caja_Principal_Editar">
  <div class="Caja_Info_Editar">
    <input class="NombreEquipo" id="NombreEquipo"type ="text" placeholder="Nombre del Evento"></input>
    
    <div class="clockBox">
    Fecha de Inicio. . : <input type="text" id="Calendario_Desde" class="datePicker" />
    Fecha de clausura: <input type="text" id="Calendario_Hasta" class="datePicker" />
    </div>
    <div class="Title">Descripcion</div>
    <textarea class="description"rows="4" cols="60"></textarea> 
  </div>

  

  <div class="Despliegue_Grupos">
    <div id ="Caja_Grupos"class="Caja_Grupos">
        
    </div>
    <div class="Caja_Agregar_Grupo">
      <input id ="Add_Grupo" class="Add_Grupo" placeholder="Nombre Grupo"></input>
      <input type="button" class="Agregar_Grupo" onclick ="Add_Group()" value="Agregar Grupo"></input>
    </div>
  </div>

</div>


  </body>