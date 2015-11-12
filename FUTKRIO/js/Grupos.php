<script type="text/javascript">
	
		
var Arr_Grupos = [];

var equipos = [];

function anadirEquipo(nombre){
  equipos.push(nombre);
  var select = document.getElementById('S_Team_A');
  var option = document.createElement('option');
  option.text=nombre;
  option.value=nombre;
  select.add(option);
  var select2 = document.getElementById('S_Team_B');
  var option2 = document.createElement('option');
  option2.text=nombre;
  option2.value=nombre;
  select2.add(option2);
}
function Add_Group() 
{
    
  var nom_Grupo = document.getElementById("Add_Grupo").value;
  
  var Arr_Equipos = [];
 
  Arr_Equipos.push(nom_Grupo);
  Arr_Grupos.push(Arr_Equipos);
  
  var Caja_Grupos = document.getElementById("Caja_Grupos"); 
  var anadir= ''+
      '<div id ="'+nom_Grupo+'"class="Grupo">'+
        '<input class="Nombre_Grupo" placeholder="Nombre Grupo" value="'+nom_Grupo+'"></input>'+
        '<input id="di" type="button" onclick = "borrarGrupo(this)" class="BotonX_Grupos" value="X"></input>'+
        '<div class="Equipos_Caja">'+
        '</div>'+
        '<div class="cajaAddEquipo">'+
            '<select class="Add_Select_Equipo">';
    for(var i=0;i<equipos.length;i++){
      anadir+='<option value='+equipos[i]+'>'+equipos[i]+'</option>';
    }
    anadir+='</select>'+
            '<input class="BotonAgregarEquipo" type="button" class="AddTeam" onclick="Add_Team(this)" value="Agregar Equipo"></input>'+
        '</div>'+  
      '</div>';
  Caja_Grupos.innerHTML +=anadir;
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
  var TM =document.getElementById("Calendario_match").value;     
 
  ArregloVS.push(TA+'$$'+TB);
  ArregloVS.push(TA); 
  ArregloVS.push(TB); 
  ArregloVS.push(TM); 

  ArregloPartidos.push(ArregloVS);
  
  document.getElementById("cajapartidos").innerHTML+=''+
      '<div id="'+TA+'$$'+TB+'" class="MachtItem">'+
          '<div class="Math">'+TA+'-VS-'+TB+'  --  Dia: '+TM+
              '<input onclick="borrarMath(this)" type="button" class="BotonX_Equipo" value="X"></input>'+'</div>'+
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
function crearEvento(){
  var nombre = document.getElementById('NombreEquipo').value;
  var fechaIni = document.getElementById('Calendario_Desde').value;
  var fechaFin = document.getElementById('Calendario_Hasta').value;
  var descripcion = document.getElementById('descripcion').value;
  var genero = document.getElementById('genero').value;
  var grupos="";
  var partidos="";
  for(var i=0; i<Arr_Grupos.length;i++){
    grupos+=Arr_Grupos[i][0];
    if(Arr_Grupos[i].length>1){
        grupos+="$$";
    }
    for(var j=1; j<Arr_Grupos[i].length;j++){
      grupos+=Arr_Grupos[i][j];
      if(j<Arr_Grupos[i].length-1){
        grupos+="$$";
      }
    }
    if(i<Arr_Grupos.length-1){
      grupos+="!!";
    }
  }
  for(var i=0; i<ArregloPartidos.length;i++){
    for(var j=1; j<ArregloPartidos[i].length;j++){
      partidos+=ArregloPartidos[i][j];
      if(j<ArregloPartidos[i].length-1){
        partidos+="$$";
      }
    }
    if(i<ArregloPartidos.length-1){
        partidos+="!!";
      }
  }
  var link="guardarGrupo.php?nombre="+nombre+"&descripcion="+descripcion+"&fechaIni="+fechaIni+"&fechaFin="+fechaFin+"&grupos="+grupos+"&partidos="+partidos+"&genero="+genero;
  window.location=link;
}
</script>