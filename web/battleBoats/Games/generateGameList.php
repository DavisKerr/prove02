<?php
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
?>