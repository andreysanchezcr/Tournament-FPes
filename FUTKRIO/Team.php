<?php  
	include 'js/TeamJS.php';
  include 'html/menuPrincipal.php';

?>

  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Team</title> 
    <meta charset = "utf-8"/>

    <link  rel="stylesheet" type="text/css" href="css/TeamCSS.css"/>
    <link rel="stylesheet" type="text/css" href="css/select-Style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>
    <script language="javascript" type="text/javascript" src="js/calendar.js"></script>



  </head>

<body>

	<a href ="#" onclick="add_Player('Roberto Carnier','12')">AddPlayer</a>
<a href ="#" onclick="add_Premios('STARDUST TOURNEMENT')">AddPREMIOS</a>
<a href ="#" onclick="set_TeamName('Barcelona')">change</a>

<div id="crearEquipo" class="Editor"> 
<a href="CrearTeam.php"><input type="button" value ="Crear Nuevo Equipo" class="newTeamButton">  </input></a>
<input type="button" value ="Editar Equipo Actual" class="EditTeamButton"></input>
<input type="button" value ="Eliminar  Equipo" class="DeleteTeamButton"></input></div>
<div id ="TeamBox"class="TeamBox" >
  <div class="Info">
    <div id="teamName"class="Team_Name">FC Barcelona</div>
    <div class="Team_Flag">
      <img class="resizesable"src='http://www.vexilologia.org/futbol/barcelona.png'>
    </div>
  </div>
  <div class="GrupalPhoto">
    <img class="resizesable"src='http://img02.mundodeportivo.com/2013/09/13/Foto-oficial-para-la-UEFA-del-_54383441586_54115221152_960_640.jpg'/>
  </div>
    <div id ="Players" class="Players"></div>
  <div id ="Premios"class="Premios_Box">
    
  <div><h1>Premios</h1></div>
  </div>
</div>
</body>


