<?php
  function queryUserInfo($database)
  {
    try
    {
      $query = "
      SELECT username, display_name, date_created 
      FROM public.user 
      WHERE id = :player_id 
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':player_id'=>$_SESSION['user_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch (Exception $ex)
    {
      return array('error'=>$ex->getMessage());
    }

    return $rows;
    
  }
?>