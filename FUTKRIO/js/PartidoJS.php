

<script type="text/javascript"> 
			function add_Time_Line(minuto, accion, jugador, equipo)
			{
			 var time_line_item =''+
             '<li><div class="date">'+minuto+'</div><div class="timeline-label"><h4>'+accion+'  -  '+ jugador+'  -  '+equipo+'</h4></div></li>';
        
        var TimerLine = document.getElementById("timeline");
        var oldTime = TimerLine.innerHTML;
        TimerLine.innerHTML=time_line_item+oldTime;
			}
		</script>



<script type="text/javascript"> 
			function add_Action(teamA,accion,teamB)
			{
			 var action_item =''+
             '<div class="Action"><div>'+teamA+'</div><div>'+accion+'</div><div>'+teamB+'</div></div>';
        
        var Actioner = document.getElementById("Actions_In_Mach");
        var oldAction = Actioner.innerHTML;
        Actioner.innerHTML=oldAction+action_item;
			}
		</script>

<script type="text/javascript"> 
			function add_Player_Align(team,name,position,id)
			{
			 var player_item =''+
             '<a href="lugar/'+id+'"><div class="Align_Row"><div class="Player_Photo">.</div><div class="Player_Info_Box"><div class="Player_Name">'+name+'</div><div class="Player_Position">'+position+'</div></div></div></a>';
        if(team=='A'){var Columner = document.getElementById("ColumTeamA");}
        else{var Columner = document.getElementById("ColumTeamB");}
        var oldAlign = Columner.innerHTML;
        Columner.innerHTML=oldAlign+player_item;
			}
		</script> 



<script type="text/javascript"> 
			function set_Teams(teamA,idTeamA,scorre,teamB,idTeamB)
			{ 
        document.getElementById("Score").innerHTML=''+
'<a href="Team.php"><div class="Flag_Grand">UNa Bandera</div><div id="TeamA" class="Team_Name">'+teamA+'</div></a>'+
'<div id="Scoree" class="Score_Num">1 : 1</div>'+
'<a href="Team.php">'+
'<div id="TeamB" class="Team_Name">'+teamB+'</div><div class="Flag_Grand">Otra Bandera</div></a>';  
}
		</script>