<?php

  function checkEnd($db, $board)
  {
    /*$board = str_split($board);
    $counter = 0;
    foreach($board as $square)
    {
      if($square == 'X')
      {
        $counter++;
      }
    }

    if($counter == 17)
    {
      return TRUE;
      //finishGame($db);
    }
    else
    {
      return FALSE;
    }*/
  }

  /*function finishGame($db)
  {
    try
    {
      $query = "UPDATE public.game
      SET is_active = 0, game_type = 'FINISHED'
      WHERE id = :game_id;";
      $statement = $db->prepare($query);
      $statement->execute(array(':game_id'=>$_SESSION["current_game_id"]));
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
    }
  }*/

?>