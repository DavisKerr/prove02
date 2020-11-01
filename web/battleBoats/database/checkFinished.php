<?php
  function checkFinished($db)
  {
    try
    {
      $query = "SELECT game_type, winner FROM public.game WHERE id = :game_id";
      $stmt = $db->prepare($query);
      $stmt->execute(array(':game_id'=>$_SESSION['current_game_id'], ':user_id'=>$_SESSION['user_id']));
      $row = ($stmt->fetch(PDO::FETCH_ASSOC));

      return $row;
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
      return false;
    }
  }
?>