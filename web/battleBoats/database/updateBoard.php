<?php
  function updateBoard($db, $board)
  {
    try
    {
      $query = "UPDATE public.board SET grid = :newBoard WHERE game_id = :game_id AND board_owner <> :user_id";
      $statement = $db->prepare($query);
      $statement->execute(array(':game_id'=>$_SESSION["current_game_id"], ":newBoard"=>$board, ':user_id'=>$_SESSION['user_id']));
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
    }
    
  }
?>