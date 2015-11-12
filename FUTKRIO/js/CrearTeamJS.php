
<script type="text/javascript"> 
			
        function add_Player(Nombre,id)
			{
        var playerItem=''+
                '<div class="Jugador"><div class="Player_Photo">a player photo</div><div class="Player_Name">'+Nombre+'</div><input type="button" value="Expulsar"></input></div>';
       
        
        var PlayersBox = document.getElementById("Players");
        var oldhtl = PlayersBox.innerHTML;
        PlayersBox.innerHTML=oldhtl+playerItem;
			}
</script>
<script type="text/javascript"> 
			
        function add_Premios(premio)
			{
        var premioItem = ''+
       ' <div class="Premio">'+premio+'<input type="button" value="Remover Premio"></input></div>';
        
        var PremiosBox = document.getElementById("Premios");
        var oldHTML = PremiosBox.innerHTML;
        PremiosBox.innerHTML=oldHTML+premioItem;
			}
</script>


<script type="text/javascript"> 
			
function set_TeamName(name){
    document.getElementById("teamName").innerHTML=name;
}
var arrayJugadores =[];
var arrayJugadoresID =[];

function contratarJugador()
{
  var player = document.getElementById("AdderSelect").value;
  arrayJugadoresID.push(player);
  document.getElementById("PlayerHolder").innerHTML+=''+
      '<div id="'+player+'" class="PlayerItem">'+
          '<div class="Player">'+player+'</div>'+
              '<input onclick="borrarJugador(this)" type="button" class="BotonX_Jugador" value="X"></input>'+
            '</div>';
}

function borrarJugador(el)
{
  var padre = el.parentNode;
  for(var i=0; i<arrayJugadores.length;i++)
  { 
    if(arrayJugadores[i]==padre.id)      
    {
      arrayJugadores.splice(i,1);
    }
    
  }
  padre.remove();
}
function anadir(nombre,valor)
{
  var select = document.getElementById('AdderSelect');
  var option = document.createElement('option');
  option.text=nombre;
  option.value=valor;
  select.add(option);
}
</script>