$(document).ready(function(){
  $('#confirmBtn').click(function(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if(isValid(username, password))
    {
      $.post("../account/processLogin.php",
      {
      username: username,
      password: password
      },
      function(data, status)
      { 
        if(status == 'success')
        {
          alert(data.isValid);
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


function isValid(username, password)
{
  var valid = true;
  var usernameErr = document.getElementById("usrnmErr");
  var passErr = document.getElementById("passwdErr");
  var pattern1 = RegExp('^[0-9A-z]+$');
  var pattern2 = RegExp(' ');

  usernameErr.innerHTML = '';
  passErr.innerHTML = '';

  if(!pattern1.test(password))
  {
    passErr.innerHTML = "Password must only contian letters and numbers";
    valid = false;
  }

  if(pattern2.test(password))
  {
    passErr.innerHTML = "Password cannot be blank";
    valid = false;
  }

  if(!pattern1.test(username))
  {
    usernameErr.innerHTML = "Username must only contain letters and numbers."
    valid = false;
  }

  if(pattern2.test(username))
  {
    usernameErr.innerHTML = "Username cannot be blank."
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