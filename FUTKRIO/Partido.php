<?php  
  include 'js/PartidoJS.php';

  include ("conexion.php");
  $conn = OCILogon($user, $pass, $db);

  $idPartido=10;

  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin infoMatch(:curs,'$idPartido'); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $infoPartido); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor
  var_dump($infoPartido);

  $e1=$infoPartido["FK_TEAMONE_ID"][0];
  $e2=$infoPartido["FK_TEAMTWO_ID"][0];
  $alin1=$infoPartido["FK_ALIGNONE_ID"][0];
  $alin2=$infoPartido["FK_ALIGNTWO_ID"][0];

  $stid = oci_parse($conn, "begin :ret :=getNameCountry('$e1'); end;");
  oci_bind_by_name($stid, ':ret', $equipo1, 200);
  oci_execute($stid);


  $stid = oci_parse($conn, "begin :ret :=getNameCountry('$e2'); end;");
  oci_bind_by_name($stid, ':ret', $equipo2, 200);
  oci_execute($stid);






?>

  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Partido</title> 
    <meta charset = "utf-8"/>
    <meta description ="Love Ink una pagina web que no robara tu informacion para conquistar el mundo">

    <link  rel="stylesheet" type="text/css" href="css/Partido.css"/>
    <link  rel="stylesheet" type="text/css" href="css/input-Style.css"/>
    <link rel="stylesheet" type="text/css" href="css/select-Style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>

  </head>


<a href="#" onclick="add_Time_Line('56','accion','jugador','equipo')">addtimeline</a>
<a href="#" onclick="add_Action('540','CODAZOS','542')">addaction</a>
<a href="#" onclick="add_Player_Align('B','Keylorz','portero','13')">addplayer</a>
<a href="#" onclick="set_Teams('Costa R','a','1:3','Sele','b')">setteams</a>
<div class="Principal_Container">
  <div class="Title">MaTCH Resoult</div>
  <?php  
  

  echo "
  <div id='Score' class='Score'>
    <a href='Team.php'>
      <div class='Flag_Grand'>UNa Bandera</div>
      <div id='TeamA' class='Team_Name'>$equipo1</div>
    </a>
    
    <div id='Scoree' class='Score_Num'>1 : 1</div>
    <a href='Team.php'>
      <div id='TeamB' class='Team_Name'>$equipo2</div>
      <div class='Flag_Grand'>Otra Bandera</div>
    </a>"

    ?>  
  </div>
  <div>
    <div id="Actions_In_Mach" class="Actions_In_Mach">
      <div class="Titles">Acciones</div>



<?php  
  $conn = OCILogon($user, $pass, $db);
  $var1=(int)$e1; //Equipo
  $var2=$idPartido; //Partido

  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin getAcciones(:curs,$var1,$var2); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $ePartido1); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor



  $conn = OCILogon($user, $pass, $db);

  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $var1=(int)$e2; //Equipo
  

  $mycursor = ociparse ($conn, "begin getAcciones(:curs,$var1,$var2); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $ePartido2); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor




  for($p=0;$p<count($ePartido1["DESCRIPTION"]);$p++){
    $tipo1=$ePartido1["DESCRIPTION"][$p];
    $tipo2=$ePartido2["DESCRIPTION"][$p];
    $valor1=$ePartido1["CONTADOR"][$p];
    $valor2=$ePartido2["CONTADOR"][$p];

    echo "<div class='Action'>
        <div>$valor1</div>
        <div>$tipo1</div>
        <div>$valor2</div>  
      </div>";

        
    

    }











?>







    </div>
  </div>
  <div class="Align_Used">
    <div class="Titles">Alineacion</div>
    <div id="ColumTeamA" class="Column">





<?php  

  $conn = OCILogon($user, $pass, $db);

 // $idPartido=10;
  $alin1=0;
  $alin2=0;

  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin getPotisions(:curs,'$alin1'); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $pos1); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor


  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin getPotisions(:curs,'$alin2'); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $pos2); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor




  for($p=0;$p<count($pos2["POSICION"]);$p++){
    $posicion1=$pos1["POSICION"][$p];
    $nombre1=$pos1["NOMBRE"][$p];
    $posicion2=$pos2["POSICION"][$p];
    $nombre2=$pos2["NOMBRE"][$p];

      echo "<div class='Align_Row'>
      <div class='Player_Photo'>.</div>
        <div class='Player_Info_Box'>
          <div class='Player_Name'> $nombre1 </div>
          <div class='Player_Position'> $posicion1</div>
        </div>
      </div> ";

        
    

    }
    echo  "</div>
        <div id='ColumTeamB' class='Column'>";


      for($p=0;$p<count($pos2["POSICION"]);$p++){
        $posicion1=$pos1["POSICION"][$p];
        $nombre1=$pos1["NOMBRE"][$p];
        $posicion2=$pos2["POSICION"][$p];
        $nombre2=$pos2["NOMBRE"][$p];

      echo "<div class='Align_Row'>
      <div class='Player_Photo'>.</div>
        <div class='Player_Info_Box'>
          <div class='Player_Name'> $nombre2 </div>
          <div class='Player_Position'> $posicion2 </div>
        </div>
      </div> ";

        
    

    }
    echo "  </div>
  
  </div>";



?>








  
  
  <div class="Timer_Line">
    <div class="Titles">Linea de Tiempo</div>
    <ul id="timeline" class="timeline">

  <li>
    <div class="date">56</div>
    <div class="timeline-label">
      <h4>Tarjeta amarilla para Gomez  (MEXICO)</h4>
    </div>
  </li>
  <li>
    <div class="date">40</div>
    <div class="timeline-label">
      <h4>Anotacion Cambell Costa Rica</h4>
    </div>
  </li>
      <li>
    <div class="date">09</div>
    <div class="timeline-label">
      <h4>Tarjeta roja Gonzalo Mexico</h4>
    </div>
  </li>
</ul>
  </div>
</div>