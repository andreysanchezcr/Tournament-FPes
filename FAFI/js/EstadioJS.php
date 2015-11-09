
<script type="text/javascript"> 
			function add_Stadium_search(nombre,capacidad,ciudad,descripcion)
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
			}
		</script>


