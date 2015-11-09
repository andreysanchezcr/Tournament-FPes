<?php /*Ocultar menu de busqueda avanzada*/ ?>

		<script type="text/javascript"> 
			function Mostrar_Filtros()
			{
				$('#Busqueda_Avansada').toggleClass("Hidy_Class");
			}
		</script>


<?php /*Funcion para cargar catalogo de Equipos para filtros en busqueda avansada*/ ?>
		<script type="text/javascript"> 
			function Cargar_Nombres_Equipos(key)
			{
					var option = document.createElement("option");
					option.text = key;
					option.value = key;
					
					//$('#Equipo_Filtro').appendChild(option); 
					var select = document.getElementById("Equipo_Filtro");
					select.appendChild(option);
					
			}
		</script>

<?php /*Funcion para cargar catalogo de Nacionalidades para filtros en busqueda avansada*/ ?>
		<script type="text/javascript"> 
			function Cargar_Nombres_Paises(key)
			{
					var option = document.createElement("option");
					option.text = key;
					option.value = key;
					
					//$('#Equipo_Filtro').appendChild(option); 
					var select = document.getElementById("Nacionalidad_Filtro");
					select.appendChild(option);
			}
		</script>



