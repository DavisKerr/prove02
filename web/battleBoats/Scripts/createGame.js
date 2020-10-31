$(document).ready(function(){
  $('#confirmBtn').click(function(){
    var gameName = document.getElementById("gameName").value;
    var private = document.getElementById("private").checked;
    var code = '';
    if(private)
    {
      code = document.getElementById("code").value;
    }
    if(isValid(gameName, private, code))
    {
      $.post("../Games/createGame.php",
      {
      gameName: gameName,
      private: private,
      code: code
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
    else
    {
      return false;
    }
  });

});


function isValid(gameName, private, code)
{
  var valid = true;
  var gameNameErr = document.getElementById("gameNameErr");
  var codeErr = document.getElementById("codeErr");
  var namePattern1 = RegExp('^[0-9A-z ]+$');
  var codePattern1 = RegExp('^[0-9A-z]+$');
  var pattern2 = RegExp('^ +$');

  gameNameErr.innerHTML = '';
  codeErr.innerHTML = '';

  if(!namePattern1.test(gameName))
  {
    gameNameErr.innerHTML = "Game name must only contian letters numbers and spaces";
    valid = false;
  }

  if(pattern2.test(gameName))
  {
    gameNameErr.innerHTML = "Game name cannot be blank";
    valid = false;
  }

  if(!codePattern1.test(code) && private)
  {
    codeErr.innerHTML = "Code must only contain letters and numbers."
    valid = false;
  }

  if(pattern2.test(code) && private)
  {
    codeErr.innerHTML = "Code for a private game cannot be blank."
    valid = false;
  }

  return valid;
}

function processData(data)
{
  if(data.serverError != '')
  {
    alert(data.serverError);
  }
  else if(data.isValid == false)
  {
    document.getElementById("formErr").innerHTML = 'Username or Password are invalid';
  }
  else
  {
    window.location.replace("./home.php");
  }
  
}

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