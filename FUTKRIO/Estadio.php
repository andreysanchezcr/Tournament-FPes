<?php 
  include 'js/EstadioJS.php';
  include ("conexion.php");
  $conn = OCILogon($user, $pass, $db);
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



<a href="#" onclick="add_Stadium_search('idi','COLOSUS','12000000','COLISEA','un estadio colosal')">add estadium</a>
<a href="#" onclick="anadir_pais('hola')">pais1</a>
<a href="#" onclick="anadir_pais('adios')">pais2</a>
<a href="#" onclick="anadir_ciudad('hola','hola1')">ciudad1</a>
<a href="#" onclick="anadir_ciudad('adios','hola2')">ciudad2</a>


<div class = "caja_Estadios">
  <div class ="DisplayEstadios">
  
    
  <img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/>
    <div class ="caja_Estadio_Info">
      <div class="editar showy"><a href="#" onclick="new_box_show()">Edit/New</a></div>
      <!--///////////////////////////-->
      
      <div id="EditerBox" class="hiddy">l
        <div class="select-label">Nombre</div>
        <input id="E_Nombre"></input>
        <div class="select-label">Capacidad</div>
        <input id="E_Capacidad"></input>
                  <div class="select-label">Pais</div>
                  <select onclick="elegirPais()" id="E_Pais" class="select_filtro_estadio">       
          
                    </select>
        <div class="select-label">Ciudad</div>
                  <select id="E_Ciudad" class="select_filtro_estadio" >               
                         </select>
        <input type="button" value ="Cargar Foto"></input>
        <input id="Nombre_Filotro"></input>
        <div class="select-label">Descripcion</div>
        <textarea id="E_Descripcion"rows="10" cols="41">
        </textarea>
        <input type="button" value ="Crear Estadio" onclick="new_Stadium()"></input>

</div>
      
      <!--///////////////////////////-->
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
                  </select>
      <div class="select-label">Ciudad</div>
                <select id="Ciudad_Filtro" class="select_filtro_estadio" >                
                    </select>
      <input id="Go_Stadium_Search" type="submit" onclick="get_Busqueda()" value="Buscar"></input>   
      <img class="resizesable" src= "http://www.bloguismo.com/wp-content/uploads/2012/10/Efecto-Lupa.jpg"/>
  </div>


<?php 


  if(isset($_GET["Nb"])){
    $costa=$_GET["ip"];
    $ciudad=$_GET["ci"];
    $m=$_GET["Nb"];



  }else{
    $costa=null;
    $ciudad=null;
    $m=null;

  }


    $outrefc = ocinewcursor($conn); //Declare cursor variable

  $mycursor = ociparse ($conn, "begin filtroEstadios(:curs,'$costa','$ciudad','$m'); end;"); // prepare procedure call
  ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
  $ret = ociexecute($mycursor); // Execute function
  $ret = ociexecute($outrefc); // Execute cursor
  $nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
  ocifreestatement($mycursor); // close procedure call
  ocifreestatement($outrefc); // close cursor
 // var_dump($data);

  echo " <div id ='subStadiumBox'class='subStadiumBox'>";

  for($p=0;$p<count($data["ID_STADIUM"]);$p++){
        $nombre=$data["NAME_STADIUM"][$p];
        $capacidad=$data["CAPASITY"][$p];
        $ciudad=$data["NAME_CITY"][$p];
        $descrip=$data["DESCRIPTION"][$p];
        echo "<a href='#'' onclick='set_Stadium_Grand(this.id)'' id='$nombre&&$capacidad&&$ciudad&&$descrip'>
      <div class='subStadium'>
        <img class ='resizesable' src  = 'http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg'/>
        <div class='subNameStm'>$nombre</div>  
      </div>
    </a> ";
  }



?>




   
    
    </div>
</div>
  </div>
<!--  
<div class = "Estadio_Carta" >
    <img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/>
    <div class ="caja_Estadio_Info">
      <div class = "caja_Nombre_Estadio">
          <h1>Donut Stadium</h1>
          <h4>capacidad: 13 000 personas</h3>
          <h3>never land city</h3>
      </div>
      <div class = "caja_Descripcion">
        Un estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigilloUn estadiesirigillo lleno de personirigillas y lindirigillas barririgillas en el techirigillo
      </div>
    </div>
  </div> -->
</div>