<?php  
	include 'js/CalendarJS.php';
?>

  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Calendario</title> 
    <meta charset = "utf-8"/>

    <link  rel="stylesheet" type="text/css" href="css/CalendarioCSS.css"/>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/calendar.js"></script>







<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/sunny/jquery-ui.css" />
<script src="//code.jquery.com/jquery-latest.min.js"></script>
<!-- script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>




  </head>

<body>

<a href="#" onclick="add_Day('Dec 19','7:00$$3:00','Rojos$$Ranas','Azules$$Pitufos','Donut$$Coliseum')">ADD DATE</a>
<a href="#" onclick="get_Rangos()">getRangos</a>
<form class ="sercher_Box">
Desde: <input id="desde"type="text" name="dateInput" class="datePicker" />
Hasta: <input id="hasta"type="text" name="dateInput" class="datePicker" />
<input type="button" name="Buscar" value= "Buscar"></input>  
</form>

<div id="#aBox">
<ul id="calendar"class="main">

  </ul>
</div>

</body>