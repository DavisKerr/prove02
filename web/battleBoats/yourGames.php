<?php
  session_start();

  require 'getDB.php';


  function queryDatabaseForPendingUserGames($database)
  {
    try
    {
      $query = "
      SELECT g.game_name, g.date_created, g.game_type, u.display_name AS Player1
      FROM public.game AS g
      JOIN public.user AS u 
      ON g.game_owner = u.id
      WHERE g.game_owner = :player_id
      AND g.is_active = 0
      ORDER BY g.date_created
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':player_id'=>$_SESSION['user_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $rows;
    
  }

  function queryDatabaseForActiveUserGames($database)
  {
    try
    {
      $query = "
      SELECT g.game_name, g.date_created, g.game_type, u.display_name AS Player1, u2.display_name AS player2
      FROM public.game AS g
      JOIN public.user AS u 
      ON g.game_owner = u.id
      JOIN public.user AS u2
      ON g.opponent = u2.id
      WHERE g.opponent = :player_id
      or g.game_owner = :player_id
      AND g.is_active = 1
      ORDER BY g.date_created
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':player_id'=>$_SESSION['user_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $rows;
    
  }


  if(isset($_SESSION["loggedIn"]))
  {
    
  }
  else
  {
    $_SESSION["loggedIn"] = false;
  }

  $pending_user_data = queryDatabaseForPendingUserGames($db);
  $active_user_data = queryDatabaseForActiveUserGames($db);
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
            <a class="nav-link" href="./howto.html">How to Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.html">Account</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-column align-items-center">
      <h1> All your games</h1>

      <div class="gameSearchWindow">
        <h3>Your Active Games:</h3>
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
              <th>Type</th>
              <th>Owner</th>
              <th>Opponent</th>
              <th>Play Game</th>
            </tr>
            <?php
              
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
              }

            ?>  
          </table>
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Your Pending Private Games:</h3>
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
              <th>Type</th>
              <th>Owner</th>
              <th>Play Game</th>
            </tr>
            <?php
              
              foreach($pending_user_data as $row)
              {
                echo "<tr>\n";
                echo "<td>" .  $row["game_name"] . "</td>\n";
                echo "<td>" .  $row["date_created"] . "</td>\n";
                echo "<td>" .  $row["game_type"] . "</td>\n";
                echo "<td>" .  $row["player1"] . "</td>\n";
                echo "<td class='d-flex flex-column align-items-center justify-content-center'>";
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
                echo "<input hidden name='playGame' id='playGame' value='" . $row["id"] . "'>";
                echo "<button class='btn btn-success joinBtn'  type='submit'>Play Game</button>";
                echo "</form>"; 
                echo "</tr>\n";
              }
            ?>  
          </table> 
        </div> <!--End game finder area-->
      </div><!--End game search window-->

      <div class="gameSearchWindow">
        <h3>Your Finished Games:</h3>
        <form class="form-inline my-2 my-lg-0 gameSearch">
          <div id="searchField">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </div>
        </form>
        <div class="gameFinderArea">
        </div> <!--End game finder area-->
      </div><!--End game search window-->


    </div>

      



  </body>
</html>