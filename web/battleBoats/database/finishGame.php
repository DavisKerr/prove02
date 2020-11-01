<?php
  function finishGame($db)
  {
    try
    {
      $query = "UPDATE public.game
      SET is_active = 0, game_type = 'FINISHED', winner = :user_id
      WHERE id = :game_id";
      $statement = $db->prepare($query);
      $statement->execute(array(':game_id'=>$_SESSION["current_game_id"], ':user_id'=>$_SESSION['user_id']));
      return true;
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
      return false;
    }
  }
?>