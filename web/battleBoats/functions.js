function addCode()
{
  var item = document.getElementById("private");
  area = document.getElementById("gameCodeField");
  if(item.checked)
  {
    area.innerHTML = "<label for='code'> Access Code: </label> ";
    area.innerHTML += "<input type='text' id='gameCode' name='gameCode'><br>";
  }
  else
  {
    area.innerHTML = "";
  }
}


var num_clicks = 0;
function selectLocation()
{
  if(num_clicks % 2 == 0)
  {
    //start
  }
  else
  {
    //end
  }
  num_clicks++;
}

function activeShip()
{

}

function validateShip()
{

}




