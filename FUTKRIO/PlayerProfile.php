<?php  

	include 'html/menuPrincipal.php';
/*Variables*/
include ("conexion.php");
$conn = OCILogon($user, $pass, $db);

$idPlayer=$_GET['id'];

$outrefc = ocinewcursor($conn); //Declare cursor variable
$mycursor = ociparse ($conn, "begin GET_PLAYER(:curs,'$idPlayer'); end;"); // prepare procedure call
ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
$ret = ociexecute($mycursor); // Execute function
$ret = ociexecute($outrefc); // Execute cursor
$nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
ocifreestatement($mycursor); // close procedure call
ocifreestatement($outrefc); // close cursor
$largo=count($data['ID_PLAYER']);
for($i=0;$i<count($data['ID_PLAYER']);$i++){
	$nombre=$data['FIRST_NAME'][$i];
	$apellido=$data['LAST_NAME'][$i];
	$nickname=$data['NICKNAME'][$i];
	$numeroCamisa=$data['T_SHIRT_NUM'][$i];
	$foto=$data['PHOTO'][$i];
	$pais=$data['NAME_COUNTRY'][$i];
}
$premios="";

$outrefc = ocinewcursor($conn); //Declare cursor variable
$mycursor = ociparse ($conn, "begin get_Award_x_Player('$idPlayer',:curs); end;"); // prepare procedure call
ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
$ret = ociexecute($mycursor); // Execute function
$ret = ociexecute($outrefc); // Execute cursor
$nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
ocifreestatement($mycursor); // close procedure call
ocifreestatement($outrefc); // close cursor

for($i=0;$i<count($data['NAME_AWARD']);$i++){
	if($i<count($data['NAME_AWARD']-1)){
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
		<script type="text/javascript"> 
			function Mostrar_Perfil_Jugador(nombre,apodo,nacionalidad,premios,numCamisa,nomCamisa){
					var Caja_Jugadores = document.getElementById("caja_Jugadores");
				     var card_html = ''+
				            '<div class = "Jugador_Carta">'+
				      '<div class ="caja_Foto">'+
				            '<img class ="resizesable" src= "	http://www.nosoloposters.com/3749-large_default/postal-real-madrid-keylor-navas-2014-15.jpg"/>'+
				        '<div class="t-shirt-name">'+nomCamisa+'</div>'+
				        '<div class="t-shirt">'+numCamisa+'</div>'+
				      '</div>'+
				      '<div class = "Jugador_Info">'+
				        '<div class = "Jugador_Description">'+
				          '<h1>'+nombre+'</h1>'+
				          '<h4>Apodo: '+apodo +'</h4>'+
				          '<h4>Nacionalidad: '+nacionalidad+'</h4>'+
				          
				        '</div>'+
				        '<div class="caja_Premios"><div class="premios_titulo">Premios Ganados</div>';
				        premios=premios.split("$$");
				        for(var i=0;i<premios.lenght;i++){  
				          card_html+='<div class="award">'+premios[i]+'</div>';
				        }
				       card_html+=' </div>'+
				      '</div>'+
				    '</div> ';
				Caja_Jugadores.innerHTML= card_html;
			}
		</script>
	</head>
	<body>
  <div id = "caja_Jugadores">

  </div>
</body>
<?php


	$nombre=$nombre." ".$apellido;
	echo "<script type='text/javascript'>Mostrar_Perfil_Jugador('$nombre','$nickname','$pais','$premios','$numeroCamisa','$nickname');</script>";
?>
