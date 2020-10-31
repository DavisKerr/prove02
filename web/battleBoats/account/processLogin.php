<?php
  session_start();
  header('Content-type: application/json');
  
  $returnArr = array('isValid'=>false, 'serverError'=>'');

  // Import the needed files
  try
  {
    require '../database/getDB.php';
    require '../database/queryLogin.php';
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

    // Check that the username is valid.
    $dbInfo = queryLogin($username, $password, $db);
    
    if(isset($dbInfo['db_err']))
    {
      $returnArr['serverError'] .= $dbInfo["db_error"] . '\n'; 
    }
    else
    {
      if(password_verify($password, $returnArr['password']))
      {
        $returnArr["isValid"] = true;
        $_SESSION["loggedIn"] = TRUE;
        $_SESSION["user_id"] = $dbInfo["id"];
        header("Location: ./home.php");
        exit();
      }
    }
  }

  echo json_encode($returnArr);
  


?>