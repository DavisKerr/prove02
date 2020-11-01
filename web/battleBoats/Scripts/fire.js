function prepFire()
{
  $('#fireBtn').click(function(){
    document.getElementById("fireErr").innerHTML = '';
    var x = document.getElementById("x-coord").value;
    var y = document.getElementById("y-coord").value;
    fire(x, y);
  });
}

function fire(x, y)
{
  $.post("../gameLogic/fire.php",
  {
    xcoord: x,
    ycoord: y
  },
  function(data, status)
  { 
    if(status == 'success')
    {
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
  else if(data.isValidSpot == false)
  {
    document.getElementById("fireErr").innerHTML = 'Already tried there!';
  }
  else
  { 
    getBoards();
    checkGameEnd();
    checkTurn();
  }
  
}
