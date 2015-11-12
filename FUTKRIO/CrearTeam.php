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
  <div class="PlayerAdder">
  <select id ="AdderSelect"></select>
  <input type="button" onclick="contratarJugador()" value="Agregar Jugador"></input>  
  </div>
  <div id="PlayerHolder"></div>
  </div>
</form>

<?php
include ("conexion.php");
  $conn = OCILogon($user, $pass, $db);
  $outrefc = ocinewcursor($conn); //Declare cursor variable
  $mycursor = ociparse ($conn, "begin get_AllPlayers(:curs); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor
  //var_dump($data);
  for($p=0;$p<count($data["ID_PLAYER"]);$p++){
    $playerId=$data["ID_PLAYER"][$p];
    $nombre=$data["FIRST_NAME"][$p]." ".$data["LAST_NAME"][$p]." (".$data["NICKNAME"][$p].")";
    echo "<script type='text/javascript'>anadir('$nombre','$playerId');</script>";
  }
  OCILogoff($conn);
?>