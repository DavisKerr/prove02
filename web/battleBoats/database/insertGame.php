<?php

  try
  {
    require '../Util/generateBoeard.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
  }

  function insertGame($gameName, $private, $code,  $db)
  {
    $type = 'PUBLIC';
    if($private)
    {
      $type = 'PRIVATE';
    }

    try
    {
      $board1 = getBoard();
      $board2 = getBoard();

      $query = "
      INSERT INTO public.game
      ( game_owner
      , game_name
      , game_code
      , game_type
      , grid_owner
      , grid_opponent
      , is_active
      , date_created
      )
      VALUES
      ( :user_id
      , :gameName
      , :code
      , :type
      , :board1
      , :board2
      , 0
      , (SELECT CURRENT_TIMESTAMP)
      )
      ";

      $statement = $db->prepare($query);
      $statement->execute(array(':user_id'=>$_SESSION["user_id"], ':code'=>$code, 
      ':gameName'=>$gameName, ':type'=>$type, ':board1'=>$board1, ':board2'=>$board2 ));
      return TRUE;
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
      return FALSE;
    }
  }
?>