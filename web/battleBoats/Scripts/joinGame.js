$(document).ready(function(){
  $('.joinBtn').click(function(this){
    var game_id = this.value;
    alert(game_id);
    $.post("../Games/joinGame.php",
    {
      id: game_id
    },
    function(data, status)
    { 
      if(status == 'success')
      {
        //window.location.replace("./landing.php");
      }
      else
      {
        alert("Oops! Something happened!");
      }
      
      }); 
  });
});