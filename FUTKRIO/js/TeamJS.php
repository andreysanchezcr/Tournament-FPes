<script type="text/javascript"> 
			
        function add_Player(Nombre,id)
			{
        var playerItem=''+
                '<a href="lugar'+id+'"><div class="Jugador"><div class="Player_Photo">a player photo</div><div class="Player_Name">'+Nombre+'</div></div></a>';
        var PlayersBox = document.getElementById("Players");
        var oldhtl = PlayersBox.innerHTML;
        PlayersBox.innerHTML=oldhtl+playerItem;
			}
</script>

<script type="text/javascript"> 
        function add_Premios(premio)
			{
        var premioItem = ''+
       ' <div class="Premio">'+premio+'</div>';
        
        var PremiosBox = document.getElementById("Premios");
        var oldHTML = PremiosBox.innerHTML;
        PremiosBox.innerHTML=oldHTML+premioItem;
			}
</script>

<script type="text/javascript"> 			
        function set_TeamName(name)
			{
        document.getElementById("teamName").innerHTML=name;
        			}
</script>

