<?php  
	include 'js/TeamJS.php';
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







<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/sunny/jquery-ui.css" />
<script src="//code.jquery.com/jquery-latest.min.js"></script>
<!-- script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>




  </head>

<body>
<form>
Datum eingeben: <input type="text" name="dateInput" id="datePicker" />
</form>

	<a href ="#" onclick="add_Player('Navas Keylor','13')">AddPlayer</a>
<a href ="#" onclick="add_Premios('STARDUST TOURNEMENT')">AddPREMIOS</a>
<a href ="#" onclick="set_TeamName('Costa Rica')">change</a>


<div class="TeamBox">
  <div class="Info">
    <div id="teamName"class="Team_Name">Ticos</div>
    <div class="Team_Flag">
      <img class="resizesable"src='http://www.extralucha.com/wwe-fotos-images-smackdown-raw/2014/05/escudo-costarrica.jpg'>
    </div>
  </div>
  <div class="GrupalPhoto">
    <img class="resizesable"src='http://www.diez.hn/csp/mediapool/sites/dt.common.streams.StreamServer.cls?STREAMOID=5KodOnNSjXoVrDTRk_ZF6c$daE2N3K4ZzOUsqbU5sYsFqG00qTs5qV7TM$YTIeI2WCsjLu883Ygn4B49Lvm9bPe2QeMKQdVeZmXF$9l$4uCZ8QDXhaHEp3rvzXRJFdy0KqPHLoMevcTLo3h8xh70Y6N_U_CryOsw6FTOdKL_jpQ-&CONTENTTYPE=image/jpeg'/>
  </div>
    <div id ="Players" class="Players"></div>
  <div id ="Premios"class="Premios_Box">
    
  <div><h1>Premios</h1></div>
  </div>
</div>


</body>


<?php
$fechaInicio=strtotime("25-02-2008");
$fechaFin=strtotime("01-04-2008");
for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
    echo date("d-m-Y", $i)."<br>";
}
?>