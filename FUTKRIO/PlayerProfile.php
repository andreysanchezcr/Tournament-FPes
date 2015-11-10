<?php  
	include 'js/PlayerProfileJS.php';
/*Variables*/
include ("conexion.php");
$conn = OCILogon($user, $pass, $db);
$outrefc = ocinewcursor($conn); //Declare cursor variable

$idPlayer=$_GET['id'];

$mycursor = ociparse ($conn, "begin get_Player(:curs,'$idPlayer'); end;"); // prepare procedure call
ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
$ret = ociexecute($mycursor); // Execute function
$ret = ociexecute($outrefc); // Execute cursor
$nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
ocifreestatement($mycursor); // close procedure call
ocifreestatement($outrefc); // close cursor

for($i;$i<count($data['ID_PLAYER']);$i++){
	$nombre=$data['first_name'][$i];
	$apellido=$data['last_name'][$i];
	$nickname=$data['nickname'][$i];
	$numeroCamisa=$data['t_shirt_num'][$i];
	$foto=$data['photo'][$i];
	$pais=$data['name_country'][$i];
}
$premios="";

$mycursor = ociparse ($conn, "begin get_Award_x_Player('$idPlayer',:curs); end;"); // prepare procedure call
ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
$ret = ociexecute($mycursor); // Execute function
$ret = ociexecute($outrefc); // Execute cursor
$nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
ocifreestatement($mycursor); // close procedure call
ocifreestatement($outrefc); // close cursor

for($i;$i<count($data['NAME_AWARD']);$i++){
	if($i<count($data['NAME_AWARD']-1){
		$premios=$premios.$data['NAME_AWARD'][$i]-"$$";
	}else{
		$premios=$premios.$data['NAME_AWARD'][$i];
	}
}

OCILogoff($conn);

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
  <div id = "caja_Jugadores">

  </div>
</body>
<?php
	$nombre=$nombre." ".$apellido;
	echo "<script type='text/javascript'>Mostrar_Perfil_Jugador('$nombre','$nickname','$pais','$premios','$numeroCamisa','$nickname');</script>"; 
?>