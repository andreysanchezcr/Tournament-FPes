<?php  
  include 'js/CrearTeamJS.php';
?>

  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Crear Equipo</title> 
    <meta charset = "utf-8"/>
    <meta description ="Love Ink una pagina web que no robara tu informacion para conquistar el mundo">

    <link  rel="stylesheet" type="text/css" href="css/CrearTeamCSS.css"/>
    <link  rel="stylesheet" type="text/css" href="css/input-Style.css"/>
    <link rel="stylesheet" type="text/css" href="css/select-Style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>

  </head>



<a href ="#" onclick="add_Player('Roberto Carnier','12')">AddPlayer</a>
<a href ="#" onclick="add_Premios('STARDUST TOURNEMENT')">AddPREMIOS</a>
<a href ="#" onclick="set_TeamName('Barcelona')">change</a>

<div id="crearEquipo" class="Editor"> 
<input type="button" value ="Crear Equipo" class="newTeamButton"></input>
<a href="javascript:history.back(-1);"><input type="button" value ="Cancelar" class="newTeamButton"></input></a></div>
<div id ="TeamBox"class="TeamBox" >
  <div class="Info">
    <input id="teamName"placeholder=" Nombre del Equipo"class="Team_Name"></input>
    <div class="Team_Flag">
      <img class="resizesable"src='http://www.vexilologia.org/futbol/barcelona.png'>
    </div>
    
      <div class="cargarTitle">Cargar Bandera</div>
      <input type="file" class="CargarImagen"></input>
    

  </div>
  <div class="GrupalPhoto">
    <img class="resizesable"src='http://img02.mundodeportivo.com/2013/09/13/Foto-oficial-para-la-UEFA-del-_54383441586_54115221152_960_640.jpg'/>
          <div class="cargarTitle2">Cargar Foto Grupal del Equipo</div>
      <input type="file" class="CargarImagen2"></input>
  </div>
    <div><h1 class="JugadorLabel">Jugadores</h1>
      <div>Agregar Jugador</div>
      <input placeholder="Nombre"></input>
      <input placeholder="Apellido"></input>
      <input placeholder="Apodo"></input>
      <input type="button" value="Buscar">
      </input>
      <div id="resultados">
        <div>Jugador Nombre
          <input type="button" value="Agregar al Equipo"></input>
        </div> 
        <div>Jugador Nombre
          <input type="button" value="Agregar al Equipo"></input>
        </div>  
      </div>
    </div>
    <div id ="Players" class="Players"></div>
    
  <div id ="Premios"class="Premios_Box">
    
  <div><h1>Premios</h1></div>
  </div>
</div>