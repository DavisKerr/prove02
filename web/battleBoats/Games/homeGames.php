<?php
  session_start();
  header('Content-type: application/json');
  
  $returnArr = array('isValid'=>false, 'serverError'=>'', 'active'=>'', 'public'=>'', 'private'=>'');
  $search = '%';
  // Import the needed files
  try
  {
    require '../database/getDB.php';
    require '../database/searchGames.php';
    require './generateGameList.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
  }

  if($_SERVER["REQUEST_METHOD"] == 'POST')
  {
    $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING) . '%';
    $type = htmlspecialchars($_POST['type']); 

    if($type != 0)
    {
      $result = searchGames($db, $search, $type);
      echo json_encode($result);
      /*if(!isset($result['error']))
      {
        switch($type)
        {
          case 1:
            $returnArr['active'] = generateGameList($result, false);
          break;
          case 2:
            $returnArr['public'] = generateGameList($result, true);;
          break;
          case 3:
            $returnArr['private'] = generateGameList($result, true);
          break;
        }
      }
      else
      {
        $returnArr['serverError'] .= $result['error'] . "\n";
      }*/
      
    }
  }

  //echo json_encode($returnArr);

  /*
  require 'getDB.php';

  require 'gameRequest.php';
  require 'joinGame.php';
  

  $public_data = array();
  $private_data = array();
  $user_data = array();

  require 'processSearch.php';

  function queryDatabaseForPublicGames($database, $search)
  {
    try
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
      ORDER BY g.date_created
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':search'=>$search, ':user_id'=>$_SESSION["user_id"]));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $rows;
    
  }

  function queryDatabaseForPrivateGames($database, $search)
  {
    try
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
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $rows;
    
  }


  function queryDatabaseForUserGames($database, $search)
  {
    try
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
      ORDER BY g.date_created
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':player_id'=>$_SESSION['user_id'], ':search'=>$search));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }



    return $rows;
    
  }

  joinGame($db);
  $public_data = queryDatabaseForPublicGames($db, $publicGameSearch);
  $private_data = queryDatabaseForPrivateGames($db, $privateGameSearch);
  $user_data = queryDatabaseForUserGames($db, $myGameSearch);
  */
?>