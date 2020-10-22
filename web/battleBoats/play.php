<?php
  session_start();

  require 'auth.php';
  require 'getDB.php';
  require 'sendMessage.php';
  require 'openFire.php';

  if(!isset($_SESSION["current_game_id"]))
  {
    header("location: ./home.php");
    exit;
  }


  function queryPlayerBoard($database)
  {
    $board="";
    try
    {
      $query = "    
      SELECT grid_owner, grid_opponent, game_owner
      FROM public.game
      WHERE id = :game_id
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':game_id'=>$_SESSION['current_game_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach($rows as $row)
      {
        if($row["game_owner"] == $_SESSION["user_id"])
        {
          $board = $row["grid_owner"];
        }
        else
        {
          $board = $row["grid_opponent"];
        }
      }

    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $board;
  }



  function queryEnemyBoard($database)
  {
    $enemyData = array("board"=>'', "which"=>'');
    try
    {
      $query = "    
      SELECT grid_owner, grid_opponent, game_owner
      FROM public.game
      WHERE id = :game_id
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':game_id'=>$_SESSION['current_game_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach($rows as $row)
      {
        if($row["game_owner"] == $_SESSION["user_id"])
        {
          $enemyData["board"] = $row["grid_opponent"];
        }
        else
        {
          $enemyData["board"] = $row["grid_owner"];
        }
      }

    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $enemyData;
  }

  function queryDatabaseForMessages($database)
  {
    try
    {
      $query = "    
      SELECT m.body, m.time_sent, u.display_name
      FROM public.messages AS m
      JOIN public.user AS u
      ON m.sent_by = u.id
      WHERE game_id =:game_id
      ORDER BY time_sent;
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':game_id'=>$_SESSION['current_game_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $rows;
  }

  $fireError = openFire();
  $messageErr = sendMessage($db);
  $messages = queryDatabaseForMessages($db);
  
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
    <script src="functions.js"></script>
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

      <h1>Game Title</h1>

      <div id="gameBoard" class="d-flex flex-row align-items-center">

      <?php
        $type = "opponentBoard";
        $name = "Enemy Board";
        $is_player_board = FALSE;
        $enemyData = queryEnemyBoard($db);
        $board = $enemyData["board"];
        require 'readBoard.php';
        
      ?>

        <?php
        $type = "playerBoard";
        $name = "Your Board";
        $is_player_board = TRUE;
        $board = queryPlayerBoard($db);
        require 'readBoard.php';
        ?>
      </div>

      <div id="moveForm">
      <?php 
        
          echo "<h4>It's your turn! Where would you like to strike?</h4>";
          echo "<form id='moves'>";
          echo "<div>";
          echo "<label for='x-coord'>X-Coordinate:</label>";
          echo "<select name='x-coord' id='x-coord'>";
          for($i = 1; $i <= 10; $i++)
          {
            echo "<option value='" . $i . "'>" . $i . "</option>";
          }
          echo "</select>";
          echo "<label for='y-coord'>y-Coordinate:</label>";
          echo "<select name='y-coord' id='y-coord'>";
          for($i = 1; $i <= 10; $i++)
          {
            echo "<option value='" . $i . "'>" . $i . "</option>";
          }
          echo "</select><br>";
          echo "<span class='error'>" . $fireError . "</span><br>";
          echo "<button type='submit' class='btn btn-danger' id='fireBtn'>Fire!</button>";
          echo "</div>";
          echo "</form>";
        
      
      ?>

            
      </div>

      <div id="gameMessages">
        <h3>Messages:</h3>
        <div id="gameMessageWindow">
        <?php
              foreach($messages as $message)
              {
                echo "<p><strong>" . $message["display_name"] . "</strong>: " . $message["body"] . "</p>";
              }
            ?>
        </div> 
        <br>
        <form method="POST" action=" <?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <textarea id="newMessage" placeholder="Enter Message" name="newMessage">
            
          </textarea><br>
          <span class="error"><?php echo $messageErr["messageErr"]; ?></span><br>
          <br>
          <button type="submit"  class="btn btn-success" id="sendMessageBtn">Send</button>
        </form>
      </div>

    </div>
    <footer></footer>



  </body>
</html>