function prepFire()
{
  $('#fireBtn').click(function(){
    var x = document.getElementById("x-coord").value;
    var y = document.getElementById("y-coord").value;
    alert("firing");
    fire(x, y);
  });
}

function fire(x, y)
{
  $.post("../gameLogic/fire.php",
  {
    'xcoord': x,
    'ycoord': y
  },
  function(data, status)
  { 
    alert("working...");
    if(status == 'success')
    {
      alert(JSON.stringify(data));
      processFire(data);
    }
    else
    {
      alert("Something went wrong!");
    }
    
  }); 
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
