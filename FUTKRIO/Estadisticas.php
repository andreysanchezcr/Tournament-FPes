<?php 
	include 'js/EstadisticasJS.php';
	include 'html/menuPrincipal.php';
 ?>


  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Jugadores</title> 
    <meta charset = "utf-8"/>
 
    <link  rel="stylesheet" type="text/css" href="css/EstadisticasCSS.css"/>
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  </head>


<div id="CajaEstadisticas">
  <div class="Item">
    <div class="Title">Jugadores Registrados</div>
    <div class="Sup_Title">Hombres:</div>
    <div class="Resoult" id="Hombres_Cant"></div>
    <div class="Sup_Title">Mujeres:</div>
    <div class="Resoult" id="Mujeres_Cant"></div>
    <div class="Sup_Title">Total:</div>
    <div class="Resoult" id="Total_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Equipos Registrados</div>
    <div class="Cant" id="Equipos_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Estadios Registrados</div>
    <div class="Cant" id="Estadios_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Partidos Jugados</div>
    <div class="Cant" id="Partidos_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Eventos Registrados</div>
    <div class="Cant" id="Eventos_Cant"></div>
  </div>
  <div class="Item">
    <div class="Title">Acciones</div>
    <div class="Cant" id="CajaAcciones">
      <div class="AccionJugada">
      <div>
    </div>
  </div>

  
  
  
</div>

<?php
    include ("conexion.php");
    $conn = OCILogon($user, $pass, $db);

    $outrefc = ocinewcursor($conn); //Declare cursor variable

    $stid = oci_parse($conn, "begin :ret :=COUNTMEN(); end;");
    oci_bind_by_name($stid, ':ret', $men, 200);
    oci_execute($stid);

    $stid = oci_parse($conn, "begin :ret :=COUNTWOMEN(); end;");
    oci_bind_by_name($stid, ':ret', $women, 200);
    oci_execute($stid);

    $stid = oci_parse($conn, "begin :ret :=COUNTTEAM(); end;");
    oci_bind_by_name($stid, ':ret', $team, 200);
    oci_execute($stid);

    $stid = oci_parse($conn, "begin :ret :=COUNTSTADIUM(); end;");
    oci_bind_by_name($stid, ':ret', $stadium, 200);
    oci_execute($stid);

    $stid = oci_parse($conn, "begin :ret :=COUNTMATCH(); end;");
    oci_bind_by_name($stid, ':ret', $match, 200);
    oci_execute($stid);

    $stid = oci_parse($conn, "begin :ret :=COUNTEVENT(); end;");
    oci_bind_by_name($stid, ':ret', $event, 200);
    oci_execute($stid);

    $outrefc = ocinewcursor($conn); //Declare cursor variable
    $mycursor = ociparse ($conn, "begin get_AllActions(:curs) ; end;"); // prepare procedure call
    ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
    $ret = ociexecute($mycursor); // Execute function
    $ret = ociexecute($outrefc); // Execute cursor
    $nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
    ocifreestatement($mycursor); // close procedure call
    ocifreestatement($outrefc); // close cursor
    $actions="";
    $cantActions="";
    for($k=0;$k<count($data['ID_ACTIONTYPE']);$k++){
      $actions=$actions.$data['ACT_NAME'][$k];
      $accionId=$data['ID_ACTIONTYPE'][$k];
      $stid = oci_parse($conn, "begin :ret :=COUNTACTION('$accionId'); end;");
      oci_bind_by_name($stid, ':ret', $cantAct, 200);
      oci_execute($stid);
      $cantActions=$cantActions.$cantAct;

      if($k<count($data['ID_ACTIONTYPE'])-1){
        $actions=$actions."$$";
        $cantActions=$cantActions."$$";
      }
    }
    $total=$men+$women;
    echo "<script type='text/javascript'>Set_Jugadores('$men','$women','$total');</script>";
    echo "<script type='text/javascript'>Set_Equipos('$team');</script>";
    echo "<script type='text/javascript'>Set_Estadios('$stadium');</script>";
    echo "<script type='text/javascript'>Set_Partidos('$match');</script>";
    echo "<script type='text/javascript'>Set_Eventos('$event');</script>";
    echo "<script type='text/javascript'>Set_Acciones('$actions','$cantActions');</script>";
    
?>