<?php
include 'js/Eventos_PHP_JS.php';
include 'html/menuPrincipal.php';
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
    <div class="Evento">
      
      <div class="Evento_Info_Box">
        <a href="#">
          <div class="Evento_fecha">marz 20</div>
          <div class="Evento_Nombre">ddddd</div>
        </a>
        <div class="Evento_Premios">
          <a href="#">
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
    </div>




  </div>
  <div class="Evento_Seg_Titulo">MUJERES</div>
  <div id="Eventos_Mujeres" class="ContenerdorEventos">

  </div>
</body>

