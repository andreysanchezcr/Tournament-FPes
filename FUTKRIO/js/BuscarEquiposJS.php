<script type="text/javascript"> 
function addTeam(id,nombre)
{
    var item=''+
    '<a id="" href="Team.php?id='+id+'">'+
      '<div class=resoult>'+
        '<div class="flag"></div>'+
        '<div class="team">'+nombre+'</div>'+
      '</div>'+
    '</a>';
  document.getElementById("CajaEquipos").innerHTML+=item;
 
}

</script>
