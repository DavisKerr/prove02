function joinGame(button)
{
  var game_id = button.value;
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
}