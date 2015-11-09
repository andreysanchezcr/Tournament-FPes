<?php  
	include 'js/PlayerProfileJS.php';
/*Variables*/
$Array_Equipos = array("Costa Rica", "La Sele", "Ticos","La Roja");
$Array_Nacionalidades = array("Costarricense", "Chileno", "Aleman","Franses");
$Array_Jugadores = array("Chiqui Brenes", "El chunque", "Guanchope","Navas");


?>




	<head>
		<title>Fafi Futball y Nachos</title>
		<title>Jugadores</title> 
		<meta charset = "utf-8"/>
		<meta description ="Love Ink una pagina web que no robara tu informacion para conquistar el mundo">

		<link  rel="stylesheet" type="text/css" href="css/PlayerProfile.css"/>
		<link  rel="stylesheet" type="text/css" href="css/input-Style.css"/>
		<link rel="stylesheet" type="text/css" href="css/select-Style.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>

	</head>
	<body>
<a href="#" onclick = "Mostrar_Perfil_Jugador('Keilor Navas','Keilorz','tico','array','13','navas')"> navas </a>
<a href="#" onclick = "clearr()"> clear </a>

  <div id = "caja_Jugadores">

  </div>

	</body>
