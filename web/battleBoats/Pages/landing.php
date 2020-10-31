<?php
  session_start();
  require '../Util/notAuth.php';
  echo $_SESSION["loggedIn"];
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
            <a class="nav-link" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-row justify-content-center flex-wrap">
      <div id="login_menu">
        <h2 id="formTitle">Welcome to Battle Boats!</h2>
        <p class="btnLabel">Create an account!</p>
        <a href="./register.php" class="btn btn-success" id="confirmBtn">Register</a>
        <p class="btnLabel">Already have an account?</p>
        <a href="./login.php" class="btn btn-info" id="changeBtn">Log in</a>
        
      </div>
    </div>


  </body>
</html>