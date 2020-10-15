<?php
  session_start();

  require 'getDB.php';

  if(isset($_SESSION["loggedIn"]))
  {
    
  }
  else
  {
    $_SESSION["loggedIn"] = false;
  }

  

  function queryDatabaseForPublicGames()
  {
    $query = "
    SELECT g.id, g.game_name, g.date_created, u.display_name 
    FROM public.game AS g 
    JOIN public.user AS u 
    ON g.game_owner = u.id 
    WHERE g.is_active = 0 
    AND g.game_type = 'PUBLIC' 
    ORDER BY g.date_created;
    ";
    echo $query;
    /*$stmt = $database->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);*/

    /*$stmt->execute();

    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
    {
      echo "Game name" . $row["g.game_name"] . "\t";
      echo "game created " . $row["g.date_created"] . "\t";
      echo "Owned by " .  $row["u.display_name"] . "\t";
      echo "Id is " . $row["g.id"] . "\n";
    }*/
  }

  queryDatabaseForPublicGames();



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
            <a class="nav-link" href="./yourGames.html">My Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./howto.html">How to Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.html">Account</a>
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
        <form class="form-inline my-2 my-lg-0 gameSearch">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
          <?php

          ?>
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Public Games:</h3>
        <form class="form-inline my-2 my-lg-0 gameSearch">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
          <table class="gameTable">
            <tr>
              <th>Game Name</th>
              <th>Date Created</th>
              <th>Owner</th>
              <th>Join game</th>
            </tr>
            <?php
              
              /*foreach($db_arr as $row)
              {
                echo "<tr>\n";
                echo "<td>" .  $row["game_name"] . "</td>\n";
                echo "<td>" .  $row["date_created"]; . "</td>\n";
                echo "<td>" .  $row["game_owner"]; . "</td>\n";
                echo "</tr>\n";
              }*/

            ?>  
          </table>
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Enter Private Game Code:</h3>
        <form class="form-inline my-2 my-lg-0 gameSearch">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Game Code" aria-label="Game Code">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enter</button>
          </div>
        </form>
        <div class="gameFinderArea">
        </div> <!--End game finder area-->
      </div><!--End game search window-->

    </div>

      



  </body>
</html>