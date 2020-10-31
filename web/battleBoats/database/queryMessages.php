<?php
  function queryMessages($database)
  {
    try
    {
      $query = "    
      SELECT m.body, m.time_sent, u.display_name
      FROM public.messages AS m
      JOIN public.user AS u
      ON m.sent_by = u.id
      WHERE game_id =:game_id
      ORDER BY time_sent;
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':game_id'=>$_SESSION['current_game_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch (Exception $ex)
    {
      //echo 'Error!: ' . $ex->getMessage();
      return array('error'=>$ex->getMessage());
    }
    return $rows;
  }
?>