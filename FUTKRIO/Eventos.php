<?php
include 'js/Eventos_PHP_JS.php';
include 'html/menuPrincipal.php';
include ("conexion.php");

$array_premios = array("Balon Oro", "$1000", "Un Barriton","Una Chica");

$mov_str = implode(",", $array_premios);
//$id=$_GET["id"];



?>


<head>
  <meta charset="utf-8" />
  <meta description="Love Ink una pagina web que no robara tu informacion para conquistar el mundo">
  <link rel="stylesheet" type="text/css" href="css/input-Style.css" />
  <link rel="stylesheet" type="text/css" href="css/Eventos.css">
  <title>Eventos</title>
</head>

<body>
  <a href="#" onclick="AgregarEventoHombres('Eventu','una fecha','7','<?php echo $mov_str ?>');">boton</a>   
  <a href="#" onclick="ClearEventoHombres();">clear</a>
  <div class="Evento_Seg_Titulo">HOMBRES</div>
  <div id="Eventos_Hombres" class="ContenerdorEventos">

<?php
$conn = OCILogon($user, $pass, $db);


$outrefc = ocinewcursor($conn); //Declare cursor variable

$mycursor = ociparse ($conn, "begin getInfoEvents(:curs,0); end;"); // prepare procedure call
ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
$ret = ociexecute($mycursor); // Execute function
$ret = ociexecute($outrefc); // Execute cursor
$nrows = ocifetchstatement($outrefc, $listaEventos); // fetch data from cursor
ocifreestatement($mycursor); // close procedure call
ocifreestatement($outrefc); // close cursor


  for($p=0;$p<count($listaEventos["NAME_EVENT"]);$p++){
    $nombreEvento=$listaEventos["NAME_EVENT"][$p];
    $fechaInicio=$listaEventos["START_DATE"][$p];
    $fechaFin=$listaEventos["END_DATE"][$p];
    echo "<div class='Evento'>   
      <div class='Evento_Info_Box'>
        <a href='#''>
          <div class='Evento_fecha'> $fechaInicio -- $fechaFin </div>
          <div class='Evento_Nombre'> $nombreEvento </div>
        </a>
        <div class='Evento_Premios'>
          <a href='#'>
            <table>
              <caption>Premios</caption>
              <tr>
                <td>,</td>
                <td>,</td>
                <td>,</td>
              </tr>
            </table>
          </a>
        </div>
      </div>
    </div>";

        
    

    }


?>
  





  </div>
  <div class="Evento_Seg_Titulo">MUJERES</div>
  <div id="Eventos_Mujeres" class="ContenerdorEventos">
<?php
$conn = OCILogon($user, $pass, $db);


$outrefc = ocinewcursor($conn); //Declare cursor variable

$mycursor = ociparse ($conn, "begin getInfoEvents(:curs,1); end;"); // prepare procedure call
ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
$ret = ociexecute($mycursor); // Execute function
$ret = ociexecute($outrefc); // Execute cursor
$nrows = ocifetchstatement($outrefc, $listaEventos); // fetch data from cursor
ocifreestatement($mycursor); // close procedure call
ocifreestatement($outrefc); // close cursor


  for($p=0;$p<count($listaEventos["NAME_EVENT"]);$p++){
    $nombreEvento=$listaEventos["NAME_EVENT"][$p];
    $fechaInicio=$listaEventos["START_DATE"][$p];
    $fechaFin=$listaEventos["END_DATE"][$p];
    echo "<div class='Evento'>   
      <div class='Evento_Info_Box'>
        <a href='#''>
          <div class='Evento_fecha'> $fechaInicio -- $fechaFin </div>
          <div class='Evento_Nombre'> $nombreEvento </div>
        </a>
        <div class='Evento_Premios'>
          <a href='#'>
            <table>
              <caption>Premios</caption>
              <tr>
                <td>,</td>
                <td>,</td>
                <td>,</td>
              </tr>
            </table>
          </a>
        </div>
      </div>
    </div>";

        
    

    }


?>

  </div>
</body>

