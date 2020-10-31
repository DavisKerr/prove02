<?php
  function queryMoves($db)
  {
    $move = array("sent_by"=>'', "game_id"=>'', "move_number"=>'', "coords"=>'');
    $query = "SELECT * FROM public.moves WHERE game_id = :game_id ORDER BY move_number";
    $statement = $db->prepare($query);
    $statement->execute(array(':game_id'=>$_SESSION["current_game_id"]));
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $row)
    {
      $move["sent_by"] = $row["sent_by"];
      $move["game_id"] = $row["game_id"];
      $move["move_number"] = $row["move_number"];
      $move["coords"] = $row["coords"];
    }

    return $move;
  }
?>