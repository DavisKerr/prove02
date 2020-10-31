$(document).ready(function(){
  getBoards();
});


function getBoards() 
{
  $.post("../gameLogic/getBoards.php",
  {

  },
  function(data, status)
  { 
    if(status == 'success')
    {
      document.getElementById('gameBoard').innerHTML = data.enemyBoard + data.playerBoard;
      
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
    }); 
}