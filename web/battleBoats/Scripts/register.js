$(document).ready(function(){
  $("#confirmBtn").click(function(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var passwordConf = document.getElementById("confirmPassword").value;
    var screenName = document.getElementById("screen_name").value
    if(isValid(username, password, passwordConf, screenName))
    {
     $.post("../account/processRegister.php",
     {
      username: username,
      screenName: screenName,
      password: password
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
  });
  
});

function isValid(username, password, passwordConf, screenName)
{
  var valid = true;
  var usernameErr = document.getElementById("usernameErr");
  var screenNameErr = document.getElementById("screen_nameErr");
  var passErr = document.getElementById("passwordErr");
  var passConfErr = document.getElementById("passwordConfErr");
  var pattern1 = RegExp('^[0-9A-z]+$');
  var pattern2 = RegExp(' ');
  passwordPatt1 = RegExp('.{7,}');
  passwordPatt2 = RegExp('\d');

  usernameErr.innerHTML = '';
  screenNameErr.innerHTML = '';
  passErr.innerHTML = '';
  passConfErr.innerHTML = '';

  // Validate the password
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

  if(!passwordPatt1.test(password) || !passwordPatt2.test(password))
  {
    passErr.innerHTML = "Passwords must contain at least 7 digits and have a number.";
    valid = false;
  }

  //Validate the username

  if(!pattern1.test(username))
  {
    usernameErr.innerHTML = "Username must only contain letters and numbers.";
    valid = false;
  }

  if(pattern2.test(username))
  {
    usernameErr.innerHTML = "Username cannot be blank.";
    valid = false;
  }

  //Validate the screen name
  if(!pattern1.test(screenName))
  {
    screenNameErr.innerHTML = "Screen name must only contain letters and numbers.";
    valid = false;
  }

  if(pattern2.test(screenName))
  {
    screenNameErr.innerHTML = "Screen name cannot be blank.";
    valid = false;
  }

  //Validate the confirmation password:
  if(!pattern1.test(passwordConf))
  {
    passConfErr.innerHTML = "Confirmation Password must only contian letters and numbers";
    valid = false;
  }

  if(pattern2.test(passwordConf))
  {
    passConfErr.innerHTML = "Confirmation password cannot be blank";
    valid = false;
  }

  // Check that the passwords match.
  if(password != passwordConf)
  {
    passConfErr.innerHTML = "Passwords must match.";
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
  else if(data.nameErr != '')
  {
    document.getElementById("usernameErr").innerHTML = data.nameErr;
  }
  else
  {
    window.location.replace("./login.php");
  }
  
}