<?php 
	include'js/BuscarEquiposJS.php';
	    include 'html/menuPrincipal.php';

 //   $session=1;
/*Variables*/


  if(isset($_GET["N"])){
    $nombre=$_GET["N"];

  }else{
    $nombre="";
  }

  include ("conexion.php");
  $conn = OCILogon($user, $pass, $db);

  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin get_TeamsFiltro(:curs, '$nombre'); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $listaEquipos); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor

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
    <input onclick="addTeam()" type ="button" value ="Buscar"> </input>


  </div>

  <div id="CajaEquipos" class = "FindedBox">

<?php 


for($i=0;$i<count($listaEquipos["ID_TEAM"]);$i++){

  $id_equipo=$listaEquipos["ID_TEAM"][$i];

  $nombrePais=$listaEquipos["NAME_TEAM"][$i];


  echo "<a id='$id_equipo' href='Team.php?id=id'>
      <div class=resoult>
        <div class='flag'></div>
        <div class='team'> $nombrePais </div>
      </div>
    </a>";

    echo "";




/*
    <a id="" href="Team.php?id='+id+'">'+
      '<div class=resoult>'+
        '<div class="flag"></div>'+
        '<div class="team">'+nombre+'</div>'+
      '</div>'+
    '</a>'

*/

  }


?>





  </div>

</div>


