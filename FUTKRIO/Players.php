<?php  
	include 'js/php_jscrips.php';
	include 'js/PlayersJS.php';
    include 'html/menuPrincipal.php';
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


			<li><a href="#"  onclick="Mostrar_Filtros();">Busqueda Avansada </a></li>
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
  	<form action='registrarJugador.php' method='POST'>
	    <div class="cajafoto">
	      <div class="foto">
	      	<img src="" id="imagenNueva" class="resizesable">
	      </div>
	      <input type="file" id="upload" name="upload">
	      <a href="" onclick="changePicture(); return false">Cargar Imagen</a>
	    </div>
	    <div class="cajainputs">
	      <div class="etiqueta">Nombre<input id ="noombre" name="nombre"></input></div>
	      <div class="etiqueta">Apellido<input id ="apellidoo" name="apellido"></input></div>
	      <div class="etiqueta">NickName<input id="mote" name="nick"></input></div>
	      <div class="etiqueta">Número de camiseta<input id="camisa" name="numCamiseta"></input></div>
	      <div class="etiqueta">Nacionalidad<select id="nacion" class="select" name="nacionalidad"></select></div>
	    </div>
	    <div class="cajabotones">
	      <input type="submit" class="button" value="Crear Jugador" name="crearJugador"></input>
	    </div>
	</form>
  </div>
</div>
<div id ="PlayersBox" class="PlayersBox">
  <div>
    
  </div>
</div>

<script>
    function changePicture() {
        var link = document.getElementById('upload').value;
        document.getElementById("imagenNueva").src = link;
    }
</script>






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