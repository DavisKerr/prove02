$(document).ready(function(){
  checkTurn();

  $('#fireBtn').click(function(){
    var x = document.getElementById("x-coord").value;
    var y = document.getElementById("y-coord").value;
    alert(x);
      $.post("../gameLogic/fire.php",
      {
      x: x,
      y: y
      },
      function(data, status)
      { 
        processFire(data);
      }); 
  });

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
        changeForm(data);
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

function changeForm(data)
{
  document.getElementById('moveForm').innerHTML = data.form;
}

function processFire(data)
{
  if(data.serverError != '')
  {
    alert(data.serverError);
  }
  else if(data.isValid == false)
  {
    document.getElementById("fireErr").innerHTML = 'Already tried there!';
  }
  else
  { 
    checkGameEnd();
    checkTurn();
  }
  
}