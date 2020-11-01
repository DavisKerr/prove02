$(document).ready(function(){
  checkTurn();
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
      if(data.success)
      {
        alert(JSON.stringify(data));
        processData(data);
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

function processData(data)
{
  document.getElementById('moveForm').innerHTML = data.form;
}