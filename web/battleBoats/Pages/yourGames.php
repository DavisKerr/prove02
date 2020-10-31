<?php
  session_start();
  require '../Util/auth.php';
  require '../Games/gameRequest.php';
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
    <script src="../Scripts/createGame.js"></script>
    <script src="../Scripts/yourGames.js"></script>
    <title>My Games</title>
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
            <a class="nav-link active" href="./yourGames.php">My Games</a>
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
      <h1> All your games</h1>

      <div class="gameSearchWindow">
        <h3>Your Active Games:</h3>
        <span class="error" id="activeGameErr"></span>
        <form class="form-inline my-2 my-lg-0 gameSearch" method="POST" >
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="activeGameSearch" name="activeGameSearch">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="activeSearch">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
        <table class="gameTable" id="activeGames">
            
            <?php
              /*
              foreach($active_user_data as $row)
              {
                echo "<tr>\n";
                echo "<td>" .  $row["game_name"] . "</td>\n";
                echo "<td>" .  $row["date_created"] . "</td>\n";
                echo "<td>" .  $row["game_type"] . "</td>\n";
                echo "<td>" .  $row["player1"] . "</td>\n";
                echo "<td>" .  $row["player2"] . "</td>\n";
                echo "<td class='d-flex flex-column align-items-center justify-content-center'>";
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<input hidden name='playGame' id='playGame' value='" . $row["id"] . "'>";
                echo "<button class='btn btn-success joinBtn'  type='submit'>Play Game</button>";
                echo "</form>"; 
                echo "</tr>\n";
              }*/

            ?>  
          </table>
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Your Pending Games:</h3>
        <span class="error" id="pendingGameErr"></span>
        <form class="form-inline my-2 my-lg-0 gameSearch" method="POST">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="pendingGameSearch", name="pendingGameSearch">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="pendingSearch">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
        <table class="gameTable" id="pendingGames">
            
            <?php
              
              /*foreach($pending_user_data as $row)
              {
                echo "<tr>\n";
                echo "<td>" .  $row["game_name"] . "</td>\n";
                echo "<td>" .  $row["date_created"] . "</td>\n";
                echo "<td>" .  $row["game_type"] . "</td>\n";
                echo "<td>" .  $row["player1"] . "</td>\n";
                echo "<td>" . $row["game_code"] . "</td>\n";
                echo "</tr>\n";
              }*/
            ?>  
          </table> 
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Your Finished Games:</h3>
        <span class="error" id="finishedGameErr"></span>
        <form class="form-inline my-2 my-lg-0 gameSearch" method="POST">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="finishedGameSearch" name="finishedGameSearch">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="finishedSearch">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
          <table class="gameTable" id="finishedGames">
            
            <?php
              
              /*foreach($finished_user_data as $row)
              {
                echo "<tr>\n";
                echo "<td>" .  $row["game_name"] . "</td>\n";
                echo "<td>" .  $row["date_created"] . "</td>\n";
                echo "<td>" .  $row["game_type"] . "</td>\n";
                echo "<td>" .  $row["player1"] . "</td>\n";
                echo "<td>" .  $row["player2"] . "</td>\n";
                echo "<td class='d-flex flex-column align-items-center justify-content-center'>";
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<input hidden name='playGame' id='playGame' value='" . $row["id"] . "'>";
                echo "<button class='btn btn-success joinBtn'  type='submit'>View Game</button>";
                echo "</form>"; 
                echo "</tr>\n";
              }*/
            ?>  
          </table> 
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div id="createGame">
        <h2>Create a game</h2>
        <span class="error" id="formErr"></span>
        <form method="POST">
          <label for="gameName">Game Name</label>
          <input type="text" name="gameName" id="gameName"><br>
          <span class="error" id="gameNameErr"></span><br>
          <br>
          <input type="checkbox" value="TRUE" id="private" name="private" onchange="addCode()">
          <label for="private">Private Game</label>
          <br>
          <span id="gameCodeField"></span><br>
          <span class="error" id="codeErr"></span><br>
          <button type="button" class="btn btn-success" id="confirmBtn">Create</button>
        </form>
      </div>


    </div>

      



  </body>
</html>