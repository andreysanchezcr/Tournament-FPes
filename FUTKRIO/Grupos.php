<?php  
	include 'js/Grupos.php';
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
  	
<div id="Evento_U"class="Evento_U">
  <div id="NombreEvento"class="Evento_Nombre">Eventicimo</div>
  <div class="Fechas">
    <div class="Fecha">18/7/210</div>
    <div class="del_al"> hasta </div>
    <div class="Fecha">19/3123/qw</div>
  </div>
  <div id ="descripcion"class="Descripcion">ascascascascascascascascascascascascascsacccccccccccccccc</div>
  <div id="GroupBox" class="GroupBox">
    <div class="UnGrupo">
      <div class="GroupName">Grupo A</div>
      <div class="TeamRow">
        <div class="ElTeamName">Cos ddvsvsta Rica</div>
        <div class="stak partidos_Jugados">1</div>
        <div class="stak partidos_Ganados">2</div>
        <div class="stak partidos_Perdidos">3</div>
        <div class="stak partidos_Empatados">4</div>
        <div class="stak partidos_GolFavor">5</div>
        <div class="stak partidos_GolContra">6</div>
        <div class="stak partidos_GolDiferencia">7</div>
        <div class="stak partidos_FairPlay">8</div>
      </div>
    </div>
    
    
    
    
    
    
  </div>
</div>


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