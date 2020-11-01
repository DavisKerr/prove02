$(document).ready(function(){
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
        if(status == 'success')
        {
          processFire(data);
        }
        else
        {
          alert("Oops! Something happened!");
        }
      
      }); 
  });

});



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