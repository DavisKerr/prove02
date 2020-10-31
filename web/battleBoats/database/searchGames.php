<?php
  function searchGames($database, $search, $type)
  {
    try
    {
      $query = '';

      if($type == 1) # 1 means it is an active game.
      {
        $query = " 
        SELECT g.id, g.game_name, g.date_created, g.game_type, u.display_name AS Player1, u2.display_name AS player2
        FROM public.game AS g
        JOIN public.user AS u 
        ON g.game_owner = u.id
        JOIN public.user AS u2
        ON g.opponent = u2.id
        WHERE (g.opponent =:player_id
        or g.game_owner =:player_id)
        AND g.is_active = 1
        AND LOWER(g.game_name) like LOWER(:search)
        ORDER BY g.date_created";

        $stmt = $database->prepare($query);
        $stmt->execute(array(':player_id'=>$_SESSION['user_id'], ':search'=>$search));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      if($type == 2) # 2 means it is a public game that is joinable.
      {
        $query = " 
        SELECT g.id, g.game_name, g.date_created, u.display_name 
        FROM public.game AS g 
        JOIN public.user AS u 
        ON g.game_owner = u.id 
        WHERE g.is_active = 0 
        AND g.game_type LIKE 'PUBLIC' 
        AND LOWER(g.game_name) LIKE LOWER(:search)
        AND g.game_owner <> :user_id
        ORDER BY g.date_created";

        $stmt = $database->prepare($query);
        $stmt->execute(array(':player_id'=>$_SESSION['user_id'], ':search'=>$search));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      if($type == 3) # 3 means it is a private game that is joinable.
      {
        $query = "
        SELECT g.id, g.game_name, g.date_created, u.display_name 
        FROM public.game AS g 
        JOIN public.user AS u 
        ON g.game_owner = u.id 
        WHERE g.is_active = 0 
        AND g.game_type LIKE 'PRIVATE' 
        AND LOWER(g.game_code) LIKE LOWER(:search)
        ORDER BY g.date_created
        ";

        $stmt = $database->prepare($query);
        $stmt->execute(array(':search'=>$search));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      

      
      
      

      /*
      $query = "
      SELECT g.id, g.game_name, g.date_created, u.display_name 
      FROM public.game AS g 
      JOIN public.user AS u 
      ON g.game_owner = u.id 
      WHERE g.is_active = 0 
      AND g.game_type LIKE :type 
      AND LOWER(g.game_name) LIKE LOWER(:search)
      AND g.game_owner <> :user_id
      ORDER BY g.date_created
      ";*/

    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $rows;
    
  }
?>