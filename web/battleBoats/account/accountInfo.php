<?php
  session_start();
  header('Content-type: application/json');


  $returnArr = array('success'=>false, 'serverError'=>'', 'userInfo'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/queryUserInfo.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
  }

  $user_data = queryUserInfo($db);

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
      $returnArr['userInfo'] .= "<p>Display Name: " . $row["display_name"] . "</p>\n";
      $returnArr['userInfo'] .= "<p>Date Created: " . $row["date_created"] . "</p>\n";
    }

    echo json_encode($returnArr);
  }

  
?>