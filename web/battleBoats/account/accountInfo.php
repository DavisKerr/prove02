<?php
  session_start();

  require '../database/getDB.php';
  header('Content-type: application/json');

  $returnArr = array('success'=>false, 'serverError'=>'', 'userInfo'=>'');

  function queryDatabaseForUserInfo($database)
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

  $user_data = queryDatabaseForUserInfo($db);

  if(isset($user_data['error']))
  {
    $returnArr['serverError'] = $user_data['error'];
    echo $returnArr;
    die();
  }
  else
  {
    $returnArr['success'] = TRUE;
    foreach($user_data as $row)
    {
      $returnArr['userInfo'] .= "<p>Username: " . $row["username"] . "</p>\n";
      $returnArr['userInfo'] .= $row["display_name"] . "</p>\n";
      $returnArr['userInfo'] .= $row["date_created"] . "</p>\n";
    }

    echo json_encode($returnArr);
  }

  
?>