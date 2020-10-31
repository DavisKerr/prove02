$(document).ready(function(){
  getBoards();
});

function getBoards() 
{
  $.post("../gameLogic/getBoards.php",
  {
    item: true
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      displayBoards(data)
    }
    else
    {
      alert("Oops! Something happened!");
    }
    
  }); 
}

function displayBoards(data)
{
  document.getElementById('gameBoard').innerHTML = data.enemyBoard + data.userBoard;
}