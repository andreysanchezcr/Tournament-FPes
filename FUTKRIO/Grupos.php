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
    Fecha de Inicio. . : <input type="text" id="Calendario_Desde" class="datePicker"><br>
    Fecha de clausura: <input type="text" id="Calendario_Hasta" class="datePicker"><br><br>
    Género:
    <select id ="genero">
      <option value="H">Hombre</option>
      <option value="M">Mujer</option>
    </select>
    </div>
    <div class="Title">Descripcion</div>
    <textarea id="descripcion" class="description"rows="4" cols="60"></textarea> 
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
<div>
    <div>
       <select id ="S_Team_A"></select>
       <div id="vs">VS</div>
       <select id ="S_Team_B"></select>
       Fecha: <input type="text" id="Calendario_match" class="datePicker">
       <input type="button" onclick="agregarpartido()"value=agregar></input>
    </div>
    <div id=cajapartidos></div>
  </div>
  <input type="button" onclick="crearEvento()" value="Crear evento"></input>
</div>
</body>

<?php
include ("conexion.php");

  $conn = OCILogon($user, $pass, $db);
  $outrefc = ocinewcursor($conn); //Declare cursor variable
  $mycursor = ociparse ($conn, "begin get_AllTeams(:curs); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor
  //var_dump($data);

  echo " <div id ='subStadiumBox'class='subStadiumBox'>";
  for($p=0;$p<count($data["NAME_TEAM"]);$p++){
    $nombre=$data["NAME_TEAM"][$p];
    echo "<script type='text/javascript'>anadirEquipo('$nombre');</script>";
  }
  OCILogoff($conn);
?>