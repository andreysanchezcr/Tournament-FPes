<script type="text/javascript"> 
			function Mostrar_Perfil_Jugador(nombre,apodo,nacionalidad,premios,numCamisa,nomCamisa)
			{
			  var Caja_Jugadores = document.getElementById("caja_Jugadores");
      
        var card_html = ''+
             '<div class = "Jugador_Carta">'+
      '<div class ="caja_Foto">'+
            '<img class ="resizesable" src= "	http://www.nosoloposters.com/3749-large_default/postal-real-madrid-keylor-navas-2014-15.jpg"/>'+
        '<div class="t-shirt-name">'+nomCamisa+'</div>'+
        '<div class="t-shirt">'+numCamisa+'</div>'+
      '</div>'+
      '<div class = "Jugador_Info">'+
        '<div class = "Jugador_Description">'+
          '<h1>'+nombre+'</h1>'+
          '<h4>Apodo: '+apodo +'</h4>'+
          '<h4>Nacionalidad: '+nacionalidad+'</h4>'+
          
        '</div>'+
        '<div class="caja_Premios"><div class="premios_titulo">Premios Ganados</div>'+;
        premios=premios.split("$$");
        for(var i=0;i<premios.lenght;i++){  
          card_html+='<div class="award">'+premios[i]+'</div>'+
        }
       card_html+=' </div>'+
      '</div>'+
    '</div> ';
Caja_Jugadores.innerHTML= card_html;
			}
		</script>
<script type="text/javascript"> 
			function clearr()
			{
			  var Caja_Jugadores = document.getElementById("caja_Jugadores");
      Caja_Jugadores.innerHTML="";
      
			}
		</script>