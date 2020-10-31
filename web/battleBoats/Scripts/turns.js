$(document).ready(function(){


});

function checkTurn()
{
  $.post("../gameLogic/checkTurn.php",
  {
    item: 1
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      if(data.isValid)
      {
        alert(JSON.stringify(data));
        //processData(data);
      }
      else
      {
        alert("something went wrong!");
      }
      
    }
    else
    {
      alert("Oops! Something happened!");
    }
  
  });
}