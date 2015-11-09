<?php  
	include 'js/php_jscrips.php';
	include 'js/PlayersJS.php';
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

		<link  rel="stylesheet" type="text/css" href="css/MenuPrincipaJugadores.css"/>
		<link  rel="stylesheet" type="text/css" href="css/input-Style.css"/>
		<link rel="stylesheet" type="text/css" href="css/select-Style.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>

	</head>
	<body>
	<div class="Contenedor_Jugadores">
		<ul class="MenuPrincipal_Jugadores">
			<li><a href="#" onclick="todos_Jugadores()">Todos los jugadores</a></li>
			<li><a href="#" onclick="destacados_Jugadores()">Destacados</a></li>

			<li class="mat-div">
				    <div id="Label_Name_Search">
	    				<label for="first-name" class="mat-label">Nombre o Nick</label>
	    				<input type="text" class="mat-input" id="nombre_jugador_Menu">
	    				<input id="Go_Name_Search" type="submit" onclick="go_Nombre()" value="Go">
  					</div>
			</li>
			<li><a href="#"  onclick="Mostrar_Filtros();">Busqueda Avansada </a></li>
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
				   		<div class="select-label">Nacionalidad</div>	 
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

<a href="#" onclick="add_Editable_Player('13','Navas Keylor','Navitas','Tico','idi','Tico$$CostaRica$$Sele')">add_editablePlayer</a>
<a href="#" onclick="add_Player('13','Navas Keylor','Navitas','Tico','idi')">add_Player</a>
<a href="#" onclick="New_Player()">newplayer</a>
<a href="#" onclick="Set_Nations('Costarricese$$Panemenense$$mexicanense')">fill nations</a>
<a href="#" onclick="Hide()">hide</a>
<div id="newBox" class="NewBox">
  <div>
    <div class="cajafoto">
      <div class="foto">.</div>
      <input></input>
      <input type="button" value="Cargar foto"></input>
    </div>
    <div class="cajainputs">
      <div class="etiqueta">nombre<input id ="noombre"></input></div>
      <div class="etiqueta">nick<input id="mote"></input></div>
      <div  class="etiqueta">camiseta<input id="camisa"></input></div>
      <div  class="etiqueta">nacionalidad<select  id="nacion" class="select"></select></div>
    </div>
    <div class="cajabotones">
      <input type="button" class="button" value="Crear Jugador"></input>
    </div>
  </div>
</div>
<div id ="PlayersBox" class="PlayersBox">
  <div>
    
  </div>
</div>




</body>

	<?php
		//cargar Equipos
		foreach ($Array_Equipos as $key) {
			echo 	"<script type='text/javascript'>Cargar_Nombres_Equipos('$key')</script>";  
		}
		//cargar Paises
		foreach ($Array_Nacionalidades as $key) {
			echo 	"<script type='text/javascript'>Cargar_Nombres_Paises('$key')</script>";  
		}
	?>