<?php
  function getLastGameInsert($db)
  {
    return $db->lastInsertId('game_id_seq');
  }
?>