<?php

  function insertGame($gameName, $private, $code,  $db)
  {
    $type = 'PUBLIC';
    if($private == 'true')
    {
      $type = 'PRIVATE';
    }

    try
    {

      $query = "
      INSERT INTO public.game
      ( game_owner
      , game_name
      , game_code
      , game_type
      , is_active
      , date_created
      )
      VALUES
      ( :user_id
      , :gameName
      , :code
      , :type
      , 0
      , (SELECT CURRENT_TIMESTAMP)
      )
      ";

      $statement = $db->prepare($query);
      $statement->execute(array(':user_id'=>$_SESSION["user_id"], ':code'=>$code, 
      ':gameName'=>$gameName, ':type'=>$type));
      return TRUE;
    }
    catch(PDOException $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
      return FALSE;
    }
  }
?>