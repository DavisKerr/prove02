<?php
  session_start();
  header('Content-type: application/json');
  
  $returnArr = array('isValid'=>false, 'userErr'=>'', 'passErr'=>'', 'username'=>'', 'user_id'=>'', 'password'=>'', 'success'=>false, 'serverError'=>'');

  // Import the needed files
  try
  {
    require '../database/getDB.php';
    require '../database/queryUsers.php';
    require '../Util/test_input.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
  }

   
 
  //Process the input
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // Initialize and sanitize the input
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $returnArr['username'] = $username;
    $returnArr['password'] = $password;

    // Check that the username is valid.
    $dbInfo = queryUsers($username, $password, $db);
    echo json_encode($dbInfo);
    
    /*if(!empty($dbInfo['db_err']))
    {
      $returnArr['serverError'] .= $dbInfo["db_error"] . 'q\n'; 
    }
    else
    {
      if($username == $dbInfo["db_username"] && $password == $dbInfo["db_password"] && !empty($dbInfo["username"]))
      {
        $returnArr["isValid"] = true;
      }
    }*/
  }

  //echo json_encode($returnArr);
  


?>