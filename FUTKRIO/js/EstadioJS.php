
<script type="text/javascript"> 
      
      function add_Stadium_search(idi,nombre,capacidad,ciudad,descripcion)
      { 
        
       var estadium_item =''+
             '<a href="#" onclick="set_Stadium_Grand(this.id)" id="'+nombre+'&&'+capacidad+'&&'+ciudad+'&&'+descripcion+'"><div class="subStadium"><img class ="resizesable" src  = "http://4.bp.blogspot.com/_tVg7XFxzu0E/S7R8hN85h0I/AAAAAAAADuQ/hqj5ByalmXk/s1600/Moses_Mabhida_World_Cup_Stadium.jpg"/><div class="subNameStm">'+nombre+'</div>  </div></a>';
      
      var Box=document.getElementById("subStadiumBox");
      var oldHTML=Box.innerHTML;
      Box.innerHTML=oldHTML+estadium_item;
      }
</script>
<script type="text/javascript"> 
      
      function set_Stadium_Grand(arrray)
      {
         
        arrray = arrray.split("&&");
        document.getElementById("nombreEstadio").innerHTML=arrray[0];
        document.getElementById("capacidadEstadio").innerHTML='Capacidad: '+arrray[1]+' personas';
        document.getElementById("cityEstadio").innerHTML=arrray[2];   
        document.getElementById("descripcion").innerHTML=arrray[3];
        document.getElementById("imagenGrande").src=arrray[4];
      }
</script>


<script type="text/javascript">
function fill_Selecters(nations,cities)
{ 
  nations = nations.split("$$");
  cities  = cities.split("$$");
  var NationsS = document.getElementById("E_Pais");
  var CitiesS = document.getElementById("E_Ciudad");
  var NationsS2 = document.getElementById("Pais_Filtro");
  var CitiesS2 = document.getElementById("Ciudad_Filtro");
 
  for(var i = 0; i < nations.length;i++)
    {
      NationsS.innerHTML = NationsS.innerHTML+ '<option value="'+nations[i]+'">'+nations[i]+'</option>';
      NationsS2.innerHTML = NationsS2.innerHTML+ '<option value="'+nations[i]+'">'+nations[i]+'</option>';
    }
  for(var j = 0; j < cities.length;j++)
    {
      CitiesS.innerHTML = CitiesS.innerHTML+ '<option value="'+cities[j]+'">'+cities[j]+'</option>';
      CitiesS2.innerHTML = CitiesS2.innerHTML+ '<option value="'+cities[j]+'">'+cities[j]+'</option>';
    }    
}                             

</script>


<script type="text/javascript"> 
      
function get_Busqueda()
      {
        var noombre = document.getElementById("Nombre_Filtro").value;
        var paais = document.getElementById("Pais_Filtro").value;
        var ciuudad = document.getElementById("Ciudad_Filtro").value;

        window.location='Estadio.php?Nb='+noombre+'&ip='+paais+'&ci='+ciuudad;
    //    alert("entro");

       }
</script>




<script type="text/javascript">       
function new_Stadium()
      {
        var noombre = document.getElementById("E_Nombre").value;
        var capacidad = document.getElementById("E_Capacidad").value;
        var paais = document.getElementById("E_Pais").value;
        var ciuudad = document.getElementById("E_Ciudad").value;
        var descripcion = document.getElementById("E_Descripcion").value;
        
        alert(noombre+'$$'+capacidad+'$$'+paais+'$$'+ciuudad+'$$'+descripcion);
       }
</script>
<script type="text/javascript">       
function edit_Stadium()
      {
        //var noombre = document.getElementById("E_Nombre").value;
        //var capacidad = document.getElementById("E_Capacidad").value;
        //var paais = document.getElementById("E_Pais").value;
        //var ciuudad = document.getElementById("E_Ciudad").value;
        //var descripcion = document.getElementById("E_Descripcion").value;
        
        alert("edicion terminada"/*noombre+'$$'+capacidad+'$$'+paais+'$$'+ciuudad+'$$'+descripcion*/);
       }
</script>




<script type="text/javascript"> 
      
      function new_box_show()
      {
        if(document.getElementById('EditerBox').className=='hiddy')
        {
          document.getElementById('EditerBox').className='';

          document.getElementById("E_Nombre").value='';
          document.getElementById("E_Capacidad").value='';
         // document.getElementById("E_Nombre").value=document.getElementById("cityEstadio").innerHTML;   
          document.getElementById("E_Descripcion").value='';
          document.getElementById("botonNewEdit").setAttribute('onclick', 'new_Stadium();');  //&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&6
          document.getElementById("botonNewEdit").setAttribute('value', 'Crear Estadio');
          
        }
        else
        {
          document.getElementById('EditerBox').className+='hiddy';
        }
         
      }
</script>
<script type="text/javascript"> 

var paises = new Array();
var cantPaises=0;

function anadir_pais(pais)
{
  paises[cantPaises]=new Array();
  paises[cantPaises][0]=pais;
  paises[cantPaises][1]=0;
  var select = document.getElementById('E_Pais');
  var option = document.createElement('option');
  option.text=pais;
  option.value=pais;
  select.add(option);
  cantPaises++;
}
function anadir_ciudad(pais,ciudad)
{
  for(var i = cantPaises-1;i>=0; i--)
    {
      if(pais==paises[i][0])
        {
          paises[i][paises[i][1]+2]=ciudad;
          paises[i][1]++;
          i=-1;
        }
    }
}
function elegirPais(){
        var select = document.getElementById('E_Ciudad');
        var pais = document.getElementById('E_Pais');
        var seleccion = pais.options[pais.selectedIndex].value;
        while(select.selectedIndex != -1){
          select.remove(select.selectedIndex);
        }
        for(i=0;i<cantPaises;i++){
          if(paises[i][0] == seleccion){
            var select2 = document.getElementById('E_Ciudad');
            for(k=0;k<paises[i][1];k++){
              var option = document.createElement('option');
              option.text = paises[i][k+2];
              option.value = paises[i][k+2];
              select2.add(option);
            }
            i=cantPaises;
          }
        }
      }

</script>



<script type="text/javascript"> 
      
function edit_box_show()
      {
        if(document.getElementById('EditerBox').className=='hiddy')
        {
          document.getElementById('EditerBox').className='';
          
          document.getElementById("E_Nombre").value=document.getElementById("nombreEstadio").innerHTML;
          document.getElementById("E_Capacidad").value=document.getElementById("capacidadEstadio").innerHTML;
         // document.getElementById("E_Nombre").value=document.getElementById("cityEstadio").innerHTML;   
          document.getElementById("E_Descripcion").value=document.getElementById("descripcion").innerHTML;

          document.getElementById("botonNewEdit").setAttribute('onclick', 'edit_Stadium();');  //&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&6
          document.getElementById("botonNewEdit").setAttribute('value', 'Terminar Edición');
          var ciiudad = document.getElementById("cityEstadio").innerHTML;
         
          

        }
        else
        {
          document.getElementById('EditerBox').className+='hiddy';
        }
         
      }
</script>
