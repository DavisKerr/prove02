function joinGame(button)
{
  var game_id = button.value;
  $.post("../Games/joinGame.php",
  {
    id: game_id
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      if(data.success)
      {
        refreshList();
      }
      else
      {
        alert("Failed to join game!");
      }
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
  }); 
}