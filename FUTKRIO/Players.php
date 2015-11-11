<?php  
	include 'js/php_jscrips.php';
	include 'js/PlayersJS.php';
    include 'html/menuPrincipal.php';
    $session=$_SESSION['ID'];
/*Variables*/
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

  $mycursor = ociparse ($conn, "begin get_Players_Filtros(:curs,'' ,'$nacion' ,'$nombre' ,'$apellido' ,'$nick' ); end;"); // prepare procedure call
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
<div id="newBox" class="NewBox">
  <div>
  	<form action='registrarJugador.php' method='POST' enctype="multipart/form-data">
	    <div class="cajafoto">
	      <div class="foto">
	      	<img src="" id="imgNew" class="resizesable">
	      </div>
	      <input type="file" name="imagenNueva" id="imagenNueva">
	    </div>
	    <div class="cajainputs">
	      <div class="etiqueta">Nombre<input id ="noombre" name="nombre"></input></div>
	      <div class="etiqueta">Apellido<input id ="apellidoo" name="apellido"></input></div>
	      <div class="etiqueta">NickName<input id="mote" name="nick"></input></div>
	      <div class="etiqueta">Número de camiseta<input id="camisa" name="numCamiseta"></input></div>
	      <div class="etiqueta">Nacionalidad<select id="nacion" class="select" name="nacionalidad"></select></div>
	      <div class="etiqueta">Género<select id="genero" class="select" name="genero">
	      	<option value='H'>Hombre</option>
	      	<option value='M'>Mujer</option>
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
  if($session==0){
  	echo "<script type='text/javascript'>Hide();</script>";
  }
  $conn = OCILogon($user, $pass, $db);

  $idPartido=10;
 $var="LuisMoto";
  $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin get_Countries(:curs); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $listaPaises); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor
  //var_dump($listaPaises);
	  for($p=0;$p<count($listaJugadores["FIRST_NAME"]);$p++){
	  		$id_persona=$listaJugadores["ID_PLAYER"][$p];
	  		$hago=1;
	  		if($equipo!=""){
	  			$stid = oci_parse($conn, "begin :ret :=EXISTEEQUIPO('$equipo','$id_persona'); end;");
		    	oci_bind_by_name($stid, ':ret', $equipo2, 200);
  				oci_execute($stid);
  				if($equipo2==0){
  					$hago=0;
  				}
  			}
  			if($hago==1){
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
		        if($session==0){
		        	$link='PlayerProfile.php?id='.$idPlayer;
				    echo "<a href=$link>
							    <div class='Player'>
								    <div class='Jugador_Camiseta'> $camisa </div>
								    <div class='Jugador_Foto_Box'>
								    	<img src=$source id='imagenNueva' class='resizesable'>
								    </div>
								    <div class='Jugador_Nombre' > $nombre $apellido </div>
								    <div class='Jugador_Nombre'> $nick </div>
								    <div class='Jugador_Pais'> $nacionalidad </div>
							    </div>
					    	</a>
						  ";
				}else{
					echo "<div class='Player'>
					<input class='E_Jugador_Camiseta' value=' $camisa '>
					</input>
					<div class='Jugador_Foto_Box'>
						<img src=$source id='imagenNueva' class='resizesable'>
					</div>
					<input class='E_Jugador_Nombre' placeholder='Nombre' value='$nombre'>
					<input class='E_Jugador_Nombre' placeholder='Apellido' value='$apellido'>
					<input class='E_Jugador_Nombre' placeholder='Nick name' value='$nick'>
					<select class='E_Jugador_Pais'>
					</div>
				";

			for($i=0;$i<count($listaPaises["NAME_COUNTRY"]);$i++){
				$nombrePais=$listaPaises["NAME_COUNTRY"][$i];
			          if($nacionalidad==$nombrePais){
			            echo"<option value=' $nombrePais ' selected> $nombrePais </option>";           
			          }
			          else{
						echo "<option value=' $nombrePais '> $nombrePais </option>";	
			          }
		 	}
			echo "</select><a href='#' onclick='Alter_Player( this )'>hola</a><a href='#' onclick='Delete_Player( this )'>delete</a>   </div>';
			";
			}
		}
    }
?>

</div>

</body>

	<?php

		//CARGAR PAISES Y CIUDADES DEL CATÁLOGO
	  $outrefc = ocinewcursor($conn); //Declare cursor variable
	  $mycursor = ociparse ($conn, "begin get_AllCountries(:curs) ; end;"); // prepare procedure call
	  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
	  $ret = ociexecute($mycursor); // Execute function
	  $ret = ociexecute($outrefc); // Execute cursor
	  $nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
	  ocifreestatement($mycursor); // close procedure call
	  ocifreestatement($outrefc); // close cursor

	  for($i=0;$i<count($data['ID_COUNTRY']);$i++){
	    $pais=$data['NAME_COUNTRY'][$i];
	    echo "<script type='text/javascript'>anadir_pais('$pais');</script>";
	  }
	  OCILogoff($conn);
	?>