<?php
  function insertMoves($db, $x, $y, $moveNum)
  {
    $moveNum++;
    $coords = "(" . $x . ", " . $y . ")";
    try
    {
      $query = "INSERT INTO public.moves
    ( sent_by
    , game_id
    , time_sent
    , move_number
    , coords
    )
    VALUES
    ( :user_id
    , :game_id
    , (SELECT CURRENT_TIMESTAMP)
    , :moveNum
    , :coords
    )";
    $statement = $db->prepare($query);
    $statement->execute(array(':game_id'=>$_SESSION["current_game_id"], ":moveNum"=>$moveNum, ":coords"=>$coords, ":user_id"=> $_SESSION["user_id"]));
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
    }
    
  }
?>