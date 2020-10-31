<?php
  function insertJoin($db, $game_id)
  {
    try
    {
      $query = "
      UPDATE public.game
      SET opponent = :user_id
      , is_active = 1
      WHERE id = :game_id";
      $statement = $db->prepare($query);
      $statement->execute(array(':user_id'=>$_SESSION["user_id"], ":game_id"=>$game_id));
      return true;
    }
    catch (Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
      return false;
    }
  }
?>