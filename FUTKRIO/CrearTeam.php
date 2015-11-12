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

<form action='guardarNuevoEquipo.php' method='POST' enctype="multipart/form-data">
  <div id="crearEquipo" class="Editor">
  <input name="crearEquipo" type="submit" value ="Crear Equipo" class="newTeamButton"></input>
  <a href="BuscarEquipos.php"><input type="button" value ="Cancelar" class="newTeamButton"></input></a></div>
  <div id ="TeamBox"class="TeamBox" >
    <div class="Info">
      <input id="teamName"placeholder=" Nombre del Equipo" class="Team_Name" name="nombreEquipo"></input>
      <div class="Team_Flag">
        <img class="resizesable"src='' id="imagenBandera">
      </div>
        <div class="cargarTitle">Cargar Bandera</div>
        <input type="file" class="CargarImagen" name="cargarBandera"></input>
    </div>
    <div class="GrupalPhoto">
      <img class="resizesable"src='' id="imagenEquipo"/>
            <div class="cargarTitle2">Cargar Foto Grupal del Equipo</div>
        <input type="file" class="CargarImagen2" name="cargarFoto"></input>
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
</form>