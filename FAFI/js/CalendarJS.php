<script type="text/javascript"> 
			
        function add_Day(dia,hora,teamA,teamB,estadio)
			{
        hora = hora.split('$$');
        teamA = teamA.split('$$');
        teamB = teamB.split('$$');
        estadio = estadio.split('$$');
    
        var partidos='';
        for(var i = 0; i<hora.length;i++)
          {
            partidos = partidos+      '   <li>'+
      '    <a href="#">'+          
      '      <span class="event-time">'+hora[i]+' - </span>'+
       '     <span class="event-name">'+teamA[i]+'</span>'+
       '     <span class ="vs">Vs</span>'+
       '     <span class="event-name">'+teamB[i]+'</span>'+
       '     <br />'+
       '     <span class="event-location">'+estadio[i]+'</span>'+
       '   </a>'+
      '  </li>';
          }
    var dateItem = ''+    
    '<li class="date"><h3>'+dia+'</h3></li>'+
    '<li class= "events cf">'+
    '  <ul class="events-detail">'+
partidos+
    '  </ul>'+
   '</li>';
        
       var Calendar_Box= document.getElementById("calendar");
       var old_html=Calendar_Box.innerHTML; 
       Calendar_Box.innerHTML= old_html+dateItem;        			}
</script>


<script type="text/javascript"> 
			
        function get_Rangos()
			{
        var DE = document.getElementById("desde").value;
        var A = document.getElementById("hasta").value;
        DE = DE.split("/");
        A = A.split("/");
        return((DE[1]+'/'+DE[0]+'/'+DE[2]+'&&'+A[1]+'/'+A[0]+'/'+A[2]));
       }
</script>
