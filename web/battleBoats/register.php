<?php
session_start();
require "getDB.php";
require "processRegister.php";

  function isLoggedIn()
  {
    try
    {
      if(isset($_SESSION["loggedIn"]))
      {
        if($_SESSION["loggedIn"])
        {
          header("location: ./home.php");
          exit;
        }
        
      }
      else
      {
        $_SESSION["loggedIn"] = false;
      }
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
    }
  }

  isLoggedIn();
  $formData = isSubmit($db);

?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Register</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./landing.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="./login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./register.html">Register</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-row justify-content-center flex-wrap">
      <div id="login_menu">
        <h2 id="formTitle">Register</h2>
        <span class="error" ><?php echo $formData["dbErr"]; ?></span>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="d-flex flex-column justify-content-center flex-wrap">
            <div class="fieldContainer">
              <label for="username" class="fieldLabel">Username:</label>
              <input type="text" name="username" id="username" placeholder="Username" class="loginField"><br>
              <span class="error" ><?php echo $formData["usernameErr"]; ?></span>
            </div>
            <div class="fieldContainer">
              <label for="screen_name" class="fieldLabel">Screen Name:</label>
              <input type="text" name="screen_name" id="screen_name" placeholder="Screen Name" class="loginField"><br>
              <span class="error" ><?php echo $formData["screenNameErr"]; ?></span>
            </div>
            <div class="fieldContainer">
              <label for="password" class="fieldLabel">Password:</label>
              <input type="password" name="password" id="password" placeholder="Password" class="loginField"><br>
              <span class="error" ><?php echo $formData["passwordErr"]; ?></span>
            </div>
            <div class="fieldContainer">
              <label for="confirmPassword" class="fieldLabel">Retype Password:</label>
              <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Retype Password" class="loginField"><br>
              <span class="error" ><?php echo $formData["confirmPasswordErr"]; ?></span>
            </div>
            <button type="submit" class="btn btn-success" id="confirmBtn">Register</button>
          </div>
        </form>
        <hr>
        <p class="btnLabel">Already have an account?</p>
        <a href="./login.php" class="btn btn-info" id="changeBtn">Log in</a>
      </div>
    </div>


  </body>
</html>