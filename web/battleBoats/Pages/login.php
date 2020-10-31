<?php
  session_start();
  
  require '../Util/notAuth.php';
  echo 'The user is logged in: ' . $_SESSION["loggedIn"];

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if(!isset($_SESSION["loggedIn"]))
    {
      $_SESSION["loggedIn"] = true;
    }
    header("Location: ./home.php");
    exit();
  }
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
    <script src="../Scripts/login.js"></script>
    <title>Login</title>
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
            <a class="nav-link active" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-row justify-content-center flex-wrap">
      <div id="login_menu">
        <h2 id="formTitle">Login</h2>
        <span class="error"></span>
        <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="">
          <div class="d-flex flex-column justify-content-center flex-wrap">
            <div class="fieldContainer">
              <label for="username" class="fieldLabel">Username:</label>
              <input type="text" name="username" id="username" placeholder="Username" class="loginField" value="">
              <span class="error" id="usrnmErr"></span>
            </div>
            <div class="fieldContainer">
              <label for="password" class="fieldLabel">Password:</label>
              <input type="password" name="password" id="password" placeholder="Password" class="loginField">
              <span class="error" id="passwdErr"></span>
            </div>
            <button type="submit" class="btn btn-success" id="confirmBtn">Login</button>
          </div>
        </form>
        <hr>
        <a href="register.php" class="btn btn-info" id="changeBtn">Register</a>
      </div>
    </div>


  </body>
</html>