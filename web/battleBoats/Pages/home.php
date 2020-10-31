<?php
  session_start();
  require '../Util/auth.php';
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
    <script src="../Scripts/homeGames.js"></script>
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
            <a class="nav-link active" href="./home.php">Home</a>
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

      <div id="picHeader">
        <h1>Battle Boats</h1>
      </div> <!--End pic header-->

      <div class="gameSearchWindow">
        <h3>Your Active Games:</h3>
        <span class="error" id="activeGameErr"></span>
        <form class="form-inline my-2 my-lg-0 gameSearch" method="POST" action="">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="myGameSearch" name="myGameSearch">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="activeSearch">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
          <table class="gameTable" id="activeGames">
            <tr>
              <th>Game Name</th>
              <th>Date Created</th>
              <th>Type</th>
              <th>Owner</th>
              <th>Opponent</th>
              <th>Play Game</th>
            </tr>
          </table> 
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Public Games:</h3>
        <span class="error" id="publicGameErr"></span>
        <form class="form-inline my-2 my-lg-0 gameSearch" method="POST" action="">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="publicGameSearch" name="publicGameSearch">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="publicSearch">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
          <table class="gameTable" id="publicGames">
            <tr>
              <th>Game Name</th>
              <th>Date Created</th>
              <th>Owner</th>
              <th>Join game</th>
            </tr>
          </table>
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Enter Private Game Code:</h3>
        <span class="error" id="privateGameErr"></span>
        <form class="form-inline my-2 my-lg-0 gameSearch" method="POST" action="">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Game Code" aria-label="Game Code" id="privateGameSearch" name="privateGameSearch">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="privateSearch">Enter</button>
          </div>
        </form>
        <div class="gameFinderArea">
          <table class="gameTable" id="privateGames">
            <tr>
              <th>Game Name</th>
              <th>Date Created</th>
              <th>Owner</th>
              <th>Join</th>
            </tr>
          </table>
        </div> <!--End game finder area-->
      </div><!--End game search window-->

    </div>

      



  </body>
</html>