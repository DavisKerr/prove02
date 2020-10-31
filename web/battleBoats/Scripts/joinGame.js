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
        processRefresh();
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

function processRefresh()
{
  $.post("../Games/homeGames.php",
  {
  search: ''
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      updateAll(data);
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
  });
}