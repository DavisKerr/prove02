<?php
  session_start();
  require '../Util/auth.php';
  /*
  require 'openFire.php';
  require 'turnCount.php';
  require 'checkEnd.php';

  if(!isset($_SESSION["current_game_id"]))
  {
    header("location: ./home.php");
    exit;
  }



  

  

  $turnInfo = getMoves($db);
  $enemyData = queryEnemyBoard($db);
  $fireError = isFiring($db, $enemyData, $turnInfo);

  $defeat = FALSE;
  $victory = FALSE;*/
  
  
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../Scripts/getMessages.js"></script>
    <script src="../Scripts/sendMessage.js"></script>
    <script src="../Scripts/getBoards.js"></script>
    <script src="../Scripts/turns.js"></script>
    <script src="../Scripts/checkGameEnd.js"></script>
    <script src="../Scripts/fire.js"></script>
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./home.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="./yourGames.php">My Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./howto.php">How to Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.php">Account</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-column align-items-center">

      <h1><?php /*echo $enemyData["game_name"];*/ ?></h1>

      <div id="gameBoard" class="d-flex flex-row align-items-center">

      </div>

      <div id="moveForm">

            
      </div>

      <div id="gameMessages">
        <h3>Messages:</h3>
        <div id="gameMessageWindow">
        </div> 
        <br>
        <form method="POST">
          <textarea id="newMessage" placeholder="Enter Message" name="newMessage">
            
          </textarea><br>
          <span class="error" id="messageErr"></span><br>
          <br>
          <button type="button"  class="btn btn-success" id="sendMessageBtn">Send</button>
        </form>
      </div>

    </div>
    <footer></footer>



  </body>
</html>