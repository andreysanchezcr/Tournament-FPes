<?php 
  include 'js/EstadioJS.php';
?>


  <head>
    <title>Fafi Futball y Nachos</title>
    <title>Jugadores</title> 
    <meta charset = "utf-8"/>
    <meta description ="Love Ink una pagina web que no robara tu informacion para conquistar el mundo">

    <link  rel="stylesheet" type="text/css" href="css/EstadioCSS.css"/>
    <link rel="stylesheet" type="text/css" href="css/select-Style.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/InputAnimation.js"></script>

  </head>



<a href="#" onclick="add_Stadium_search('COLOSUS','12000000','COLISEA','un estadio colosal')">add estadium</a>
<div class = "caja_Estadios">
  <div class ="DisplayEstadios">
  <img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/>
    <div class ="caja_Estadio_Info">
      <div class = "caja_Nombre_Estadio">
          <h1 id="nombreEstadio">Donut Stadium</h1>
          <h4 id="capacidadEstadio">capacidad: 13 000 personas</h3>
          <h3 id="cityEstadio">never land city</h3>
      </div>
      <div id="descripcion"class = "caja_Descripcion">
        Un estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigillo
      </div>
    </div>
  </div>

  <div class ="NavegadorEstadios">
    <div id="sercher">BUSCAR </br>
      <div class="select-label">Nombre</div>
      <input id="Nombre_Filtro"></input>
				    	  <div class="select-label">Pais</div>
				    	  <select id="Pais_Filtro" class="select_filtro_estadio">    		
							        <option value="A">Ambos</option>

						      </select>
      <div class="select-label">Ciudad</div>
				    	  <select id="Genero_Filtro" class="select_filtro_estadio" >				    		
							        <option value="A">Ambos</option>
							        <option value="H">Hombre</option>
							        <option value="M">Mujer</option>
						      </select>
      <input id="Go_Stadium_Search" type="submit" value="Buscar"></input>   
      <img class="resizesable" src= "http://www.bloguismo.com/wp-content/uploads/2012/10/Efecto-Lupa.jpg"/>
  </div>



    <div id ="subStadiumBox"class="subStadiumBox">
    <a href="#" onclick="set_Stadium_Grand(this.id)" id="DOnut&&13000&&nevercity&&un un es tadirigillo">
      <div class="subStadium">
        <img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/>
        <div class="subNameStm">Donut Stadium</div>  
      </div>
    </a>
    <a onclick="set_Stadium_Grand(this.id)" id="DINADOME&&47000&&Dinadome Ranch&&un un es tadirigillo">
      <div class="subStadium">
        <img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/>
        <div class="subNameStm">Donut Stadium</div>  
      </div>
    </a>
    <a href="#" onclick="">
      <div class="subStadium">
        <img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/>
        <div class="subNameStm">Donut Stadium</div>  
      </div>
    </a>
    <a href="#" onclick="">
      <div class="subStadium">
        <img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/>
        <div class="subNameStm">Donut Stadium</div>  
      </div>
    </a>
    </div>
</div>
  </div>
</div>