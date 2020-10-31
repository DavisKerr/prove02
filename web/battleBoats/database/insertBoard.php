<?php
  function insertBoard($board, $game, $db)
  {
    try
    {
      
      $query = "
      INSERT INTO board
      ( board_owner
      , game_id
      , grid
      )
      VALUES
      ( :user_id
      , :game_id
      , :board
      )
      ";
      $statement = $db->prepare($query);
      $statement->execute(array(':user_id'=>$_SESSION["user_id"], ':game_id'=>$game, ':board'=>$board));
      
      return TRUE;
    }
    catch(PDOException $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
      return FALSE;
    }

  }
?>