$(document).ready(function(){
  getBoards();
});


function getBoards() 
{
  alert('Working');
  $.post("../gameLogic/getBoards.php",
  {

  },
  function(data, status)
  { 
    if(status == 'success')
    {
      if(data.success == true)
      {
        alert(JSON.stringify(data));
        displayBoards(data)
      }
      else
      {
        alert("Error! Could not load game!");
      }
      
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
    }); 
}

function displayBoards(data)
{
  document.getElementById('gameBoard').innerHTML = data.enemyBoard + data.playerBoard;
}