<script type="text/javascript"> 

function Set_Jugadores(Hombres,Mujeres,Total)
{
  document.getElementById("Hombres_Cant").innerHTML=Hombres;
  document.getElementById("Mujeres_Cant").innerHTML=Mujeres;
  document.getElementById("Total_Cant").innerHTML=Total;
}

function Set_Equipos(Equipos)
{
  document.getElementById("Equipos_Cant").innerHTML=Equipos;
}

function Set_Estadios(Estadios)
{
  document.getElementById("Estadios_Cant").innerHTML=Estadios;
}

function Set_Partidos(Partidos)
{
  document.getElementById("Partidos_Cant").innerHTML=Partidos;
}

function Set_Eventos(Eventos)
{
  document.getElementById("Eventos_Cant").innerHTML=Eventos;
}

function Set_Acciones(Accion,Cantidad)
{
  Accion = Accion.split("$$");
  Cantidad = Cantidad.split("$$");
  var  box=document.getElementById("CajaAcciones");
  var item='';
  for(var i = 0; i< Accion.length ; i++)
    {
       item+='<div>'+
              '<div>'+Accion[i]+'</div>'+
              '<div class="AccionJugada">'+Cantidad[i]+'</div>'+
            '<div>';
    }
  box.innerHTML+=item;
}

</script>