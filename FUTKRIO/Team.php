<?php  
	include 'js/TeamJS.php';
  include 'html/menuPrincipal.php';
  include ("conexion.php");

  if(isset($_GET["id"])){
    $idEquipo=$_GET["id"];

  }

  $conn = OCILogon($user, $pass, $db);

  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin getInfoTeam(:curs, $idEquipo); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $infoEquipo); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor


  $nombre=$infoEquipo["NAME_TEAM"][0];
  $idEquipo=$infoEquipo["ID_TEAM"][0];
  $fkBandera=$infoEquipo["FK_FLAG"][0];

  $query = 'SELECT BLOBDATA FROM TEAM WHERE ID_TEAM = :MYBLOBID';
  $stmt = oci_parse ($conn, $query);
  oci_bind_by_name($stmt, ':MYBLOBID', $idEquipo);
  oci_execute($stmt, OCI_DEFAULT);
  $arr = oci_fetch_assoc($stmt);
  $prueba=$arr['BLOBDATA'];
  if($prueba!=""){
    $result = $arr['BLOBDATA']->load();
    $sourceEquipo="data:image/jpeg;base64,".base64_encode( $result );
  }else{
    $sourceEquipo="";
  }

    $query = 'SELECT BLOBDATA FROM FLAG WHERE ID_FLAG = :MYBLOBID';
    $stmt = oci_parse ($conn, $query);
    oci_bind_by_name($stmt, ':MYBLOBID', $fkBandera);
    oci_execute($stmt, OCI_DEFAULT);
    $arr = oci_fetch_assoc($stmt);
    $prueba=$arr['BLOBDATA'];
    if($prueba!=""){
      $result = $arr['BLOBDATA']->load();
      $sourceFlag="data:image/jpeg;base64,".base64_encode( $result );
    }else{
      $sourceFlag="";
    }

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

     <?php 
     echo "<div id='teamName'class='Team_Name'> $nombre </div>
    <div class='Team_Flag'>

       <img class='resizesable'src= $sourceFlag>";
?>
    </div>
  </div>
  <div class="GrupalPhoto">
 <?php 
      echo "<img class='resizesable' src= $sourceEquipo>
        </div>
    <div id ='Players' class='Players'></div>
  <div id ='Premios'class='Premios_Box'>
 ";
  $conn = OCILogon($user, $pass, $db);

  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin getAwardsbyTeam(:curs, $idEquipo); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $listaPremios); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor
  echo " <div><h1>PREMIOS</h1></div>";
  for($i=0;$i<count($listaPremios["NAME_AWARD"]);$i++){

  $nombrePremio=$listaPremios["NAME_AWARD"][$i];
      echo " <div><h2>$nombrePremio</h2></div>";
  }
  $link="Players.php?N=&ap=&nk=&gn=A&eq=$idEquipo&nf=&bAva=0";
  echo " <div><a href='$link'>Ver jugadores</a></div>";
?>


    
 
  </div>
</div>
</body>


