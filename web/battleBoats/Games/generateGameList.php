<?php


  function generateGameList($rows, $buttonNeeded, $joinable, $showCode)
  {
    $result = '';
    foreach($rows as $row)
    {
      if(!empty($row['game_name']))
      {

      
        $result .= "<tr>\n";
        $result .= "<td>" .  $row["game_name"] . "</td>\n";
        $result .= "<td>" .  $row["date_created"] . "</td>\n";
        $result .= "<td>" .  $row["player1"] . "</td>\n";
        if(isset($row["player2"]))
        {
          $result .= "<td>" .  $row["player2"] . "</td>\n";
        }

        if($showCode)
        {
          $result .= "<td>" .  $row["game_code"] . "</td>\n";
        }

        $result .= "<td class='d-flex flex-column align-items-center justify-content-center'>";
        if($buttonNeeded)
        {
          if($joinable)
          {
            $result .= "<button class='btn btn-success joinBtn' value='". $row["id"] ."' type='button' onclick='joinGame(this)'>Join Game</button>";
          }
          else
          {
            $result .= "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            $result .= "<input type='number' hidden value='" . $row["id"] . "'>";
            $result .= "<button class='btn btn-success joinBtn' type='submit'>Play Game</button>";
            $result .= "</form>";
          }
        }
        
        
        $result .= "</tr>\n";
      }
    }

    return $result;
  }
/*
  foreach($user_data as $row)
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

  foreach($public_data as $row)
  {
    echo "<tr>\n";
    echo "<td>" .  $row["game_name"] . "</td>\n";
    echo "<td>" .  $row["date_created"] . "</td>\n";
    echo "<td>" .  $row["display_name"] . "</td>\n";
    echo "<td class='d-flex flex-column align-items-center justify-content-center'>";
    echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
    echo "<input hidden name='joinGame' id='joinGame' value='" . $row["id"] . "'>";
    echo "<button class='btn btn-success joinBtn'  type='submit'>Join Game</button>";
    echo "</form>"; 
    echo "</tr>\n";
  }

  foreach($private_data as $row)
  {
    echo "<tr>\n";
    echo "<td>" .  $row["game_name"] . "</td>\n";
    echo "<td>" .  $row["date_created"] . "</td>\n";
    echo "<td>" .  $row["display_name"] . "</td>\n";
    echo "<td class='d-flex flex-column align-items-center justify-content-center'>";
    echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
    echo "<input hidden name='joinGame' id='joinGame' value='" . $row["id"] . "'>";
    echo "<button class='btn btn-success joinBtn'  type='submit'>Join Game</button>";
    echo "</form>"; 
    echo "</tr>\n";
  }
  */
?>