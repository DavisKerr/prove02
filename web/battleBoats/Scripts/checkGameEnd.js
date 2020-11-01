function checkGameEnd()
{
  $.post("../gameLogic/checkGameEnd.php",
  {
  item: 1
  },
  function(data, status)
  { 
    if(status == 'success')
    {
      processData(data);
    }
    else
    {
      alert("Oops! Something happened!");
    }
  }); 
}

function processData(data)
{
  
}