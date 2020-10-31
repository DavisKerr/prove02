<?php
  function getLastGameInsert($db)
  {
    try
    {
      return $db->lastInsertId('game_id_seq');
    }
    catch(PDOException $e)
    {
      return 'ERROR GETTING LAST GAME!';
    }
    
  }
?>