<?php
  function queryPlayerBoard($database)
  {
    $board="";
    try
    {
      $query = "    
      SELECT grid
      FROM public.board
      WHERE game_id = :game_id
      AND
      board_owner = :user_id
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':game_id'=>$_SESSION['current_game_id'], ':user_id'=>$_SESSION['user_id']));
      $board = ($stmt->fetch(PDO::FETCH_ASSOC))['grid'];
    }
    catch (Exception $ex)
    {
      //echo 'Error!: ' . $ex->getMessage();
      return $ex->getMessage(); 
    }

    return $board;
  }
?>