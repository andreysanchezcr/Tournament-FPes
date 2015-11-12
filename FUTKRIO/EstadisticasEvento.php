<?php  
		include 'html/menuPrincipal.php';


      include ("conexion.php");
      $conn = OCILogon($user, $pass, $db);


?>

  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Calendario</title> 
    <meta charset = "utf-8"/>

    <link  rel="stylesheet" type="text/css" href="css/EstadisticasEvento.css"/>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/calendar.js"></script>







<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/sunny/jquery-ui.css" />
<script src="//code.jquery.com/jquery-latest.min.js"></script>
<!-- script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>




  </head>

<body>




      <?php  

    $equipo=0;
    $evento=$_GET["id"];

    $outrefc = ocinewcursor($conn); //Declare cursor variable
    $mycursor = ociparse ($conn, "begin getInfoEventsById(:curs, $evento) ; end;"); // prepare procedure call
    ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
    $ret = ociexecute($mycursor); // Execute function
    $ret = ociexecute($outrefc); // Execute cursor
    $nrows = ocifetchstatement($outrefc, $infoEvento); // fetch data from cursor
    ocifreestatement($mycursor); // close procedure call
    ocifreestatement($outrefc); // close cursor

    //var_dump($infoEvento);

    $nombreEvento=$infoEvento['NAME_EVENT'][0];
    $inicio=$infoEvento['START_DATE'][0];
    $fin=$infoEvento['END_DATE'][0];


    $outrefc = ocinewcursor($conn); //Declare cursor variable
    $mycursor = ociparse ($conn, "begin getEquiposxGrupoxEvento(:curs, $evento) ; end;"); // prepare procedure call
    ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
    $ret = ociexecute($mycursor); // Execute function
    $ret = ociexecute($outrefc); // Execute cursor
    $nrows = ocifetchstatement($outrefc, $data2); // fetch data from cursor
    ocifreestatement($mycursor); // close procedure call
    ocifreestatement($outrefc); // close cursor

    //var_dump($data2);


    echo "<div id='Evento_U' class='Evento_U'>
  <div id='NombreEvento'class='Evento_Nombre'> $nombreEvento </div>
  <div class='Fechas'>
    <div class='Fecha'> $inicio </div>
    <div class='del_al'> hasta </div>
    <div class='Fecha'> $fin </div>
  </div>
  <div id='GroupBox' class='GroupBox'>
    <div class='UnGrupo'>
      <div class='GroupName'>Grupo 0</div>";



    




$temporal=0;


    for($k=0;$k<count($data2['FK_TEAM_ID']);$k++){
      $equipo=$data2['FK_TEAM_ID'][$k];
      $nuevoTemporal=$data2['FK_GROUP_ID'][$k];

      $stid = oci_parse($conn, "begin :ret :=getNameTeamById($equipo); end;");
      oci_bind_by_name($stid, ':ret', $nombreEquipo, 200);
      oci_execute($stid);



      $stid = oci_parse($conn, "begin :ret :=getTotalPartidos($equipo, $evento); end;");
      oci_bind_by_name($stid, ':ret', $jugados, 200);
      oci_execute($stid);

      $stid = oci_parse($conn, "begin :ret :=getGanados($equipo, $evento); end;");
      oci_bind_by_name($stid, ':ret', $ganados, 200);
      oci_execute($stid);

      $stid = oci_parse($conn, "begin :ret :=getPerdidos($equipo, $evento); end;");
      oci_bind_by_name($stid, ':ret', $perdidos, 200);
      oci_execute($stid);

      $stid = oci_parse($conn, "begin :ret :=getPartidoenEvento($equipo, $evento); end;");
      oci_bind_by_name($stid, ':ret', $aFavor, 200);
      oci_execute($stid);

      $stid = oci_parse($conn, "begin :ret :=getPartidoenEventoContra($equipo, $evento); end;");
      oci_bind_by_name($stid, ':ret', $enContra, 200);
      oci_execute($stid);

      $stid = oci_parse($conn, "begin :ret :=getDiferencia($equipo, $evento); end;");
      oci_bind_by_name($stid, ':ret', $diferencia, 200);
      oci_execute($stid);


echo "

      <div class='TeamRow'>
        <div class='ElTeamName'> $nombreEquipo </div>
        <div class='stak partidos_Jugados'> $jugados </div>
        <div class='stak partidos_Ganados'> $ganados </div>
        <div class='stak partidos_Perdidos'> $perdidos </div>
        <div class='stak partidos_GolFavor'> $aFavor </div>
        <div class='stak partidos_GolContra'> $enContra </div>
        <div class='stak partidos_GolDiferencia'> $diferencia </div>
      </div>";
      }






      ?>




    </div>

  </div>
</div>
</body>