


<script type="text/javascript"> 
  function add_Player(numCamiseta, Nombre, mote, Nacionalidad, id)
  {
        var player_item = ''+
            '<a href="lugar'+id+'"><div class="Player"><div class="Jugador_Camiseta">'+numCamiseta+'</div><div class="Jugador_Foto_Box">Foto</div><div class="Jugador_Nombre" >'+Nombre+'</div><div class="Jugador_Nombre">'+mote+'</div><div class="Jugador_Pais">'+Nacionalidad+'</div></div></a>';
        var Box=document.getElementById("PlayersBox");
        var old_HTML=Box.innerHTML;
        Box.innerHTML=old_HTML+player_item;
    }
</script>


<script type="text/javascript">
      function add_Editable_Player(numCamiseta, Nombre, mote, Nacionalidad, id,nations)
      {
        
        nations=nations.split('$$');
        
        var player_item = ''+
            '<div class="Player"><input class="E_Jugador_Camiseta" value="'+numCamiseta+'"></input><div class="Jugador_Foto_Box">Foto</div><input class="E_Jugador_Nombre" placeholder="Nombre" value="'+Nombre+'"><input class="E_Jugador_Nombre" placeholder="Nick name" value="'+mote+'"></input><select class="E_Jugador_Pais">';
        
        for(var i = 0; i<nations.length;i++)
        {    
          if(Nacionalidad==nations[i])
          {
            player_item=player_item+'<option value="'+nations[i]+'" selected>'+nations[i]+'</option>';           
          }
          else{player_item=player_item+'<option value="'+nations[i]+'">'+nations[i]+'</option>';}
        }
          
          
        player_item=player_item+'</select><a href="#" onclick="Alter_Player( this )">hola</a><a href="#" onclick="Delete_Player( this )">delete</a>   </div>';
        
      var Box=document.getElementById("PlayersBox").innerHTML+=player_item;
      }
</script>
<script type="text/javascript">
function Alter_Player(el)
{ 
  var padre = el.parentNode; 
  var camisseta=padre.firstChild.value;
  var nommbre=padre.childNodes[2].value;
  var motte=padre.childNodes[3].value;
  var nacionnalidad=padre.childNodes[4].value; return(camisseta+'$$'+nommbre+'$$'+motte+'$$'+nacionnalidad);
}
</script>
<script type="text/javascript">
function Delete_Player(el)
{ 
  var padre = el.parentNode; 
  padre.remove();
  }
</script>


<script type="text/javascript">
function New_Player()
{ 
    var Noombre = document.getElementById("noombre").value;
    var moote = document.getElementById("mote").value;
    var caamisa = document.getElementById("camisa").value;
    var naacion = document.getElementById("nacion").value;
    return(Noombre+'$$'+moote+'$$'+caamisa+'$$'+naacion);
}
</script>




<script type="text/javascript">
function Set_Nations(arrray)
{ 
    arrray=arrray.split("$$");
    var NationsSelect = document.getElementById("nacion");
    for(var i = 0; i < arrray.length;i++)
    {
      NationsSelect.innerHTML = NationsSelect.innerHTML+ '<option value="'+arrray[i]+'">'+arrray[i]+'</option>';
    }
}
</script>

<script type="text/javascript">
function Hide(arrray)
{
  $("#newBox").addClass("hiddy");
}
</script>

<script type="text/javascript">
function todos_Jugadores()
{
  //window.location='Players.php';

}
</script>

<script type="text/javascript">
function destacados_Jugadores()
{
  alert("Todos los jugadores pa aca solo los que tienen premio claro");
}
</script>


<script type="text/javascript">
function go_All()

{ 
  var noombre = document.getElementById("nombre_jugador_Menu").value;
  var appellido = document.getElementById("apellido_jugador_Menu").value;
  var niick = document.getElementById("nick_jugador_Menu").value;
  var Gen_Filtro = document.getElementById("Genero_Filtro").value;
  var Equi_Filtro = document.getElementById("Equipo_Filtro").value;
  var Nacion_Filtro = document.getElementById("Nacionalidad_Filtro").value;

  window.location='Players.php?N='+noombre+'&ap='+appellido+'&nk='+niick+'&gn='+Gen_Filtro+'+&eq='+Equi_Filtro+'&nf='+Nacion_Filtro;
 // window.location='Estadio.php?Nb='+noombre;


}
</script>

