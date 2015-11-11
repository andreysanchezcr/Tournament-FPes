<?php 
	include'js/BuscarEquiposJS.php';
	    include 'html/menuPrincipal.php';
 ?>

  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Jugadores</title> 
    <meta charset = "utf-8"/>
 

	<link  rel="stylesheet" type="text/css" href="css/input-Style.css"/>
	<link rel="stylesheet" type="text/css" href="css/select-Style.css">  
    <link  rel="stylesheet" type="text/css" href="css/BuscarEquiposCSS.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>

  </head>


<a href="#" onclick="addTeam('isid','Barsa')" >add</a>
<div class ="Editor ">
  
</div>

<div class = "SearchTeamsBox">

  <div class = "SearchMenu">
    		<div  class="mat-div">
				    <div id="Label_Name_Search">
	    				<label  for="first-name" class="mat-label">Buscar por Nombre</label>
	    				<input  type="text" class="mat-input" id="nombre_jugador_Menu"></input>
  					</div>
			</div>
    <input type ="button" value ="Buscar"> </input>


  </div>

  <div id="CajaEquipos" class = "FindedBox">

  </div>

</div>


