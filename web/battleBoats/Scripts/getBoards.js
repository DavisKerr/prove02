$(document).ready(function(){
  getBoards();
});


function getMessages() 
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