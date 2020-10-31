
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Sign Up</h1>
    <p style="color:red;" id="formError"> </p>
    <form>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Password:</label>
        <span style="color:red;" id="passError"> </span>
        <input type="password" id="password" name="password">
        <br>
        <label for="passwordConf">Confirm Password:</label>
        <span style="color:red;" id="passconfError"> </span>
        <input type="password" id="passwordConf" name="passwordConf">
        <br>
        <button type="button" id="submitButton" value="Sign Up">Submit</button>
    </form>

    
  <script>
  $("#submitButton").click(function(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var passwordConf = document.getElementById("passwordConf").value;
    if(isValid(username, password, passwordConf))
    {
     $.post("process_sign_up.php",
     {
      username: username,
      password: password
     },
     function(data, status)
     {  
      if(data == 'true')
      {
        window.location.replace("./sign-in.php");
      }
     }); 
    }
  });

  function isValid(username, password, passwordConf)
  {
    var errorMsg = "";
    var valid = true;
    var formErr = document.getElementById("formError");
    var passErr = document.getElementById("passError");
    var passconfErr = document.getElementById("passconfError");

    var pattern1 = RegExp('.{7,}');
    var pattern2 = RegExp('\d');

    if(!pattern1.test(password) || !pattern2.test(password))
    {
      errorMsg = errorMsg.concat("Password must be at least 7 characters long and have at least 1 digit.<br>");
      valid = false;
    }

    if(password != passwordConf)
    {
      errorMsg = errorMsg.concat("Passwords must match");
      valid = false;
    }

    if(!valid)
    {
      passErr.innerHTML = '*';
      passconfErr.innerHTML = '*';
    }
    else
    {
      passErr.innerHTML = '';
      passconfErr.innerHTML = '';
    }

    formErr.innerHTML = errorMsg;

    return valid;


  }
  </script>
</body>
</html>