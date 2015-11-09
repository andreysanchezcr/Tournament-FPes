<script type="text/javascript"> 
function ClearEventoHombres()
{
  var Caja_Eventos_Hombres = document.getElementById("Eventos_Hombres");
        Caja_Eventos_Hombres.innerHTML="";

};
 
</script>


<script type="text/javascript"> 
      function AgregarEventoHombres(nombre,fecha,id,arrray)
      {
     arrray = arrray.split(",");


      var counter = 1;
      var html_premios ='<tr>' ;
      for(i = 0; i < arrray.length; i++){
        if(counter < 4)
          {
            counter = counter+1;
            html_premios = html_premios +'<td>'+arrray[i]+i+'</td>';
          }
        else
          {
            counter = 1;
            html_premios = html_premios +'</tr><tr><td>'+arrray[i]+'</td>';
          }
      }
        html_premios = html_premios +'</tr>';
        
        
        
        
        
        var Caja_Eventos_Hombres = document.getElementById("Eventos_Hombres");
        var htiml = Caja_Eventos_Hombres.innerHTML;


        var lugar="evento.php?"+"id="+id;
        var Event_Item =''+
        
          '<div class="Evento">'+
            '<a href='+lugar+'>'+
              '<div class="Evento_Foto_Box">foto evento</div>'+
            '</a>'+
            '<div class="Evento_Info_Box">'+
              '<a href='+lugar+'>'+
               '<div class="Evento_fecha">'+fecha+'</div>'+
               '<div class="Evento_Nombre">'+nombre+'</div>'+
              '</a>'+
              '<div class="Evento_Premios">'+
                '<a href="#">'+
                  '<table>'+
                    '<caption>Premios</caption>'+
                    html_premios+
                  '</table>'+
                '</a>'+
              '</div>'+
            '</div>'+
          '</div>';

        
        Caja_Eventos_Hombres.innerHTML=htiml+Event_Item;
      };
</script>



