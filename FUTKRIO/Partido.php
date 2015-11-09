<?php  
  include 'js/PartidoJS.php';
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
  <div id="Score" class="Score">
    <a href="Team.php">
      <div class="Flag_Grand">UNa Bandera</div>
      <div id="TeamA" class="Team_Name">Costa RIca</div>
    </a>
    <div id="Scoree" class="Score_Num">1 : 1</div>
    <a href="Team.php">
      <div id="TeamB" class="Team_Name">La Sele</div>
      <div class="Flag_Grand">Otra Bandera</div>
    </a>  
  </div>
  <div>
    <div id="Actions_In_Mach" class="Actions_In_Mach">
      <div class="Titles">Acciones</div>
      <div class="Action">
        <div>56</div>
        <div>Patadas</div>
        <div>405</div>  
      </div>
      <div class="Action">
        <div>570</div>
        <div>Codazos</div>
        <div>4007</div>  
      </div>
    </div>
  </div>
  <div class="Align_Used">
    <div class="Titles">Alineacion</div>
    <div id="ColumTeamA" class="Column">

      <a href="#">
      <div class="Align_Row">
      <div class="Player_Photo">.</div>
        <div class="Player_Info_Box">
          <div class="Player_Name">Keylos NAVAS</div>
          <div class="Player_Position">Dedensa</div>
        </div>
      </div>
      </a>
      
      <div class="Align_Row">
      <div class="Player_Photo">.</div>
        <div class="Player_Info_Box">
          <div class="Player_Name">Keylos NAVAS</div>
          <div class="Player_Position">Dedensa</div>
        </div>
      </div>      
      
    </div>
        <div id="ColumTeamB" class="Column">

      <div class="Align_Row">
      <div class="Player_Photo">.</div>
        <div class="Player_Info_Box">
          <div class="Player_Name">Keylos NAVAS</div>
          <div class="Player_Position">Dedensa</div>
        </div>
      </div>
      
      <div class="Align_Row">
      <div class="Player_Photo">.</div>
        <div class="Player_Info_Box">
          <div class="Player_Name">Keylos NAVAS</div>
          <div class="Player_Position">Dedensa</div>
        </div>
      </div>      
      
  
  
  </div>
  
  </div>
  
  
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