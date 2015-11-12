<script type="text/javascript">
	
		
var Arr_Grupos = [];


function Add_Group() 
{
    
  var nom_Grupo = document.getElementById("Add_Grupo").value;
  
  var Arr_Equipos = [];
 
  Arr_Equipos.push(nom_Grupo);
  Arr_Grupos.push(Arr_Equipos);
  
  var Caja_Grupos = document.getElementById("Caja_Grupos"); 
   
  Caja_Grupos.innerHTML += ''+
      '<div id ="'+nom_Grupo+'"class="Grupo">'+
        '<input class="Nombre_Grupo" placeholder="Nombre Grupo" value="'+nom_Grupo+'"></input>'+
        '<input id="di" type="button" onclick = "borrarGrupo(this)" class="BotonX_Grupos" value="X"></input>'+
        '<div class="Equipos_Caja">'+
        '</div>'+
        '<div class="cajaAddEquipo">'+
            '<select class="Add_Select_Equipo">'+
    '<option value=luis>luis</option>'+
    '</select>'+
            '<input class="BotonAgregarEquipo" type="button" class="AddTeam" onclick="Add_Team(this)" value="Agregar Equipo"></input>'+
        '</div>'+  
      '</div>';
}
function Add_Team(el)
{
  var padre = el.parentNode;
  var nommbre=padre.childNodes[0].value;
  
  for(var i=0; i<Arr_Grupos.length;i++)
  {
    if(Arr_Grupos[i][0]==padre.parentNode.id){Arr_Grupos[i].push(nommbre);}  
  }
   
  padre.parentNode.childNodes[2].innerHTML+=''+
    '            <div id="'+nommbre+'"class="Equipo">'+
              '<div class="selectTeam">'+nommbre+'</div>'+
              '<input onclick="borrarEquipo(this)" type="button" class="BotonX_Equipo" value="X"></input>'+
            '</div>';
  
}
function borrarGrupo(el)
{
  var padre = el.parentNode;
   for(var i=0; i<Arr_Grupos.length;i++)
  { 
    if(Arr_Grupos[i][0]==padre.id)      
    {
      Arr_Grupos[i].splice(i,1);
    }    
  }
 
  padre.remove();
}
function borrarEquipo(el)
{
    var padre = el.parentNode; 
    var bisabuelo = el.parentNode.parentNode.parentNode;

 
    for(var i=0; i<Arr_Grupos.length;i++)
  { 
    if(Arr_Grupos[i][0]==bisabuelo.id)      
    {
      for(var j=0; j<Arr_Grupos[i].length;j++)
      {
        if(Arr_Grupos[i][j]==padre.id)
        {
           Arr_Grupos[i].splice(j, 1);  
        }
      }  
    }    
  }

  
    padre.remove();
}


function holas()
{
  for(var i=0; i<Arr_Grupos.length;i++){
    for(var j=0; j<Arr_Grupos[i].length;j++){
      alert(Arr_Grupos[i][j]);
    }
  }
}

var ArregloPartidos=[];

function agregarpartido()
{
  var ArregloVS=[]
  var TA =document.getElementById("S_Team_A").value;
  var TB =document.getElementById("S_Team_B").value;     
 
  ArregloVS.push(TA+'$$'+TB);
  ArregloVS.push(TA); 
  ArregloVS.push(TB); 

  ArregloPartidos.push(ArregloVS);
  
  document.getElementById("cajapartidos").innerHTML+=''+
      '<div id="'+TA+'$$'+TB+'" class="MachtItem">'+
          '<div class="Math">'+TA+'_VS_'+TB+'</div>'+
              '<input onclick="borrarMath(this)" type="button" class="BotonX_Equipo" value="X"></input>'+
            '</div>';
  
}

function borrarMath(el)
{
  var padre = el.parentNode;
  for(var i=0; i<ArregloPartidos.length;i++)
  { 
    if(ArregloPartidos[i][0]==padre.id)      
    {
      ArregloPartidos.splice(i,1);
    }
    
  }
  padre.remove();
}

function holas2()
{
  for(var i=0; i<ArregloPartidos.length;i++){
    for(var j=0; j<ArregloPartidos[i].length;j++){
      alert(ArregloPartidos[i][j]);
    }
  }
}

</script>