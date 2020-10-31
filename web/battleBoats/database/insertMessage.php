<?php
  function insertMessage($db, $message)
  {
    try
    {
      $query = "
      INSERT INTO public.messages
      ( sent_by
      , game_id
      , body
      , time_sent
      )
      VALUES
      ( :user_id
      , :game_id
      , :message
      , (SELECT CURRENT_TIMESTAMP)
      )";
      $statement = $db->prepare($query);
      $statement->execute(array(':user_id'=>$_SESSION["user_id"], ":game_id" => $_SESSION['current_game_id'], ":message" => $message));
      return TRUE;
    }
    catch (Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
    }

    return FALSE;
    
  }
?>