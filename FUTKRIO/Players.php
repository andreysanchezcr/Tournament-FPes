<?php  
	include 'js/php_jscrips.php';
	include 'js/PlayersJS.php';
    include 'html/menuPrincipal.php';
/*Variables*/
$Array_Equipos = array("Costa Rica", "La Sele", "Ticos","La Roja");
$Array_Nacionalidades = array("Costarricense", "Chileno", "Aleman","Franses");
$Array_Jugadores = array("Chiqui Brenes", "El chunque", "Guanchope","Navas");

  if(isset($_GET["N"]) or isset($_GET["ap"]) or isset($_GET["nk"]) or isset($_GET["gn"]) or isset($_GET["eq"]) or isset($_GET["nf"])){

  	$nombre=$_GET["N"];
  	$apellido=$_GET["ap"];
  	$nick=$_GET["nk"];
  	$gen=$_GET["gn"];
  	$equipo=$_GET["eq"];
  	$nacion=$_GET["nf"];
  	$bAvan=$_GET["bAva"];

  	if($bAvan=="0"){
  		$gen="";
	  	$equipo="";
	  	$nacion="";
  	}

  	if($gen=="A"){
  		$gen='';
  	}else if($gen=="H"){
  		$gen=0;
  	}else{
  		$gen=1;
  	}

  }else{
    $nombre="";
  	$apellido="";
  	$nick="";
  	$gen="";
  	$equipo="";
  	$nacion="";
  }

  include ("conexion.php");
  $conn = OCILogon($user, $pass, $db);

  $idPartido=10;
 $var="LuisMoto";
  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin get_Players_Filtros(:curs,'' ,'$equipo' ,'$nacion' ,'$nombre' ,'$apellido' ,'$nick' ); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $listaJugadores); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor

?>
	<head>
		<title>Fafi Futball y Nachos</title>
		<title>Jugadores</title> 
		<meta charset = "utf-8"/>
		<meta description ="Love Ink una pagina web que no robara tu informacion para conquistar el mundo">

		<link  rel="stylesheet" type="text/css" href="css/MenuPrincipaJugadores.css"/>
		<link  rel="stylesheet" type="text/css" href="css/input-Style.css"/>
		<link rel="stylesheet" type="text/css" href="css/select-Style.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>
		<script type="text/javascript">
			function Mostrar_Filtros(){
				$('#Busqueda_Avansada').toggleClass("Hidy_Class");
				if(document.getElementById("busquedaAvan").value=="0"){
					document.getElementById("busquedaAvan").value="1";
				}else{
					document.getElementById("busquedaAvan").value="0";
				}
			}
		</script>

	</head>
	<body>
	<div class="Contenedor_Jugadores">
		<ul class="MenuPrincipal_Jugadores">
			<li><a href="#" onclick="todos_Jugadores()" class="MenuItem">Todos  </a></li>
			<li><a href="#" onclick="destacados_Jugadores()">Destacados</a></li>

			<li class="mat-div">
				    <div id="Label_Name_Search">
	    				<label for="first-name" class="mat-label">Nombre</label>
	    				<input type="text" class="mat-input" id="nombre_jugador_Menu"></input>
  					</div>
			</li>

			<li class="mat-div">
				    <div id="Label_Name_Search">
	    				<label for="first-name" class="mat-label">Apellido</label>
	    				<input type="text" class="mat-input" id="apellido_jugador_Menu"></input>
  					</div>
			</li>
			

			<li class="mat-div">
				    <div id="Label_Name_Search">
	    				<label for="first-name" class="mat-label">Nick</label>
	    				<input type="text" class="mat-input" id="nick_jugador_Menu"></input>
  					</div>
			</li>


			<li><input id="busquedaAvan" value="0" style="display: none;"><a href="#" onclick="Mostrar_Filtros();">Búsqueda Avanzada </a></li>
			<li><a href="#"  onclick="go_All();">Buscar</a></li>
		</ul>
		<div id="Busqueda_Avansada" class="Hidy_Class">
			<table>
			  <tr>
				    <td>
				    	<div class="select-label">Genero</div>
				    	<select id="Genero_Filtro" class="select_filtro_Jugador" >				    		
							<option value="A">Ambos</option>
							<option value="H">Hombre</option>
							<option value="M">Mujer</option>
						</select>
				    </td>
				    <td>
				    	<div class="select-label">Equipo</div>
						<select id="Equipo_Filtro" class="select_filtro_Jugador" >
						<!--Catalogo de Equipos&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&66-->

						</select>
				    </td>
				   	<td>
				   		<div class="select-label">Pais Origen</div>	 
						<select id="Nacionalidad_Filtro" class="select_filtro_Jugador" >
						<!--Catalogo de Equipos&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&66-->

						</select>
				    </td>
				    <td>
				    	<input id="Hacer_Busqueda_Ava" type="submit" onclick="go_All()" value="Buscar">
				    </td>
			  </tr>

			</table>		
		</div>

<a href="#" onclick="add_Editable_Player('13','Navas Keylor','Navitas','Tico','idi','Tico$$CostaRica$$Sele')">add_editablePlayer 1</a>
<a href="#" onclick="add_Editable_Player('13','Juan Keylor','Navitas','Tico','idi','Tico$$CostaRica$$Sele')">add_editablePlayer 2</a>

<a href="#" onclick="add_Player('13','Navas Keylor','Navitas','Tico','idi')">navas</a>
<a href="#" onclick="add_Player('13','juan Keylor','Navitas','Tico','idi')">juan</a>

<a href="#" onclick="New_Player()">newplayer</a>
<a href="#" onclick="Set_Nations('Costarricese$$Panemenense$$mexicanense')">fill nations</a>
<a href="#" onclick="Hide()">hide</a>
<div id="newBox" class="NewBox">
  <div>
  	<form action='registrarJugador.php' method='POST' enctype="multipart/form-data">
	    <div class="cajafoto">
	      <div class="foto">
	      	<img src="" id="imagenNueva" class="resizesable">
	      </div>
	      <input type="file" name="imagenNueva">
	    </div>
	    <div class="cajainputs">
	      <div class="etiqueta">Nombre<input id ="noombre" name="nombre"></input></div>
	      <div class="etiqueta">Apellido<input id ="apellidoo" name="apellido"></input></div>
	      <div class="etiqueta">NickName<input id="mote" name="nick"></input></div>
	      <div class="etiqueta">Número de camiseta<input id="camisa" name="numCamiseta"></input></div>
	      <div class="etiqueta">Nacionalidad<select id="nacion" class="select" name="nacionalidad"></select></div>
	      <div class="etiqueta">Género<select id="genero" class="select" name="genero">
	      	<option value='h'>Hombre</option>
	      	<option value='m'>Mujer</option>
	      </select></div>
	    </div>
	    <div class="cajabotones">
	      <input type="submit" class="button" value="Crear Jugador" name="crearJugador"></input>
	    </div>
	</form>
  </div>
</div>
<div id ="PlayersBox" class="PlayersBox">
<?php  

	  for($p=0;$p<count($listaJugadores["FIRST_NAME"]);$p++){
		    $nombre=$listaJugadores["FIRST_NAME"][$p];
		    $apellido=$listaJugadores["LAST_NAME"][$p];
		    $nick=$listaJugadores["NICKNAME"][$p];
		    $camisa=$listaJugadores["T_SHIRT_NUM"][$p];
		    $nacionalidad=$listaJugadores["GETNOMBREPAIS(FK_COUNTRY_ID)"][$p];
		    $idPlayer=$listaJugadores["ID_PLAYER"][$p];

		    $query = 'SELECT BLOBDATA FROM PLAYER WHERE ID_PLAYER = :MYBLOBID';
	        $stmt = oci_parse ($conn, $query);
	        oci_bind_by_name($stmt, ':MYBLOBID', $idPlayer);
	        oci_execute($stmt, OCI_DEFAULT);
	        $arr = oci_fetch_assoc($stmt);
	        $prueba=$arr['BLOBDATA'];
	        if($prueba!=""){
	        	$result = $arr['BLOBDATA']->load();
	        	$source="data:image/jpeg;base64,".base64_encode( $result );
	        }else{
	        	$source="";
	        }
		    echo "<a href='lugar'+id+''>
					    <div class='Player'>
					    <div class='Jugador_Camiseta'> $camisa </div>
					    <div class='Jugador_Foto_Box'>
					    	<img src=$source id='imagenNueva' class='resizesable'>
					    </div>
					    <div class='Jugador_Nombre' > $nombre $apellido </div>
					    <div class='Jugador_Nombre'> $nick </div><div class='Jugador_Pais'> $nacionalidad </div></div>
			    	</a>
				  ";
    }
?>


	

 
</div>

</body>

	<?php
		//cargar Eq
		foreach ($Array_Equipos as $key) {
			echo 	"<script type='text/javascript'>Cargar_Nombres_Equipos('$key')</script>";  
		}
		//cargar Paises
		foreach ($Array_Nacionalidades as $key) {
			echo 	"<script type='text/javascript'>Cargar_Nombres_Paises('$key')</script>";  
		}
	?>