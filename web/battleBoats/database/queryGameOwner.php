<?php
  function queryGameOwner($db)
  {
    $owner = '';
    $statement = $db->prepare("SELECT game_owner FROM public.game WHERE id = :game_id");
    $statement->execute(array(':game_id'=>$_SESSION["current_game_id"]));
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row)
    {
      $owner = $row["game_owner"];
    }
    return $owner;
  }
?>