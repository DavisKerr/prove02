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

    // Check that the username is valid.
    $dbInfo = queryUsers($username, $password, $db);
    if(!empty($dbInfo['db_err']))
    {
      $returnArr['serverError'] .= $dbInfo["db_error"] . '\n'; 
    }
    else
    {
      if($username == $dbInfo["db_username"] && $password == $dbInfo["db_password"] && !empty($dbInfo["username"]))
      {
        $returnArr["isValid"] = true;
      }
    }
  }

  echo json_encode($returnArr);


 /*
  

  
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid )
  {
    $_SESSION["username"] = $username;
    $db_data = queryDatabase($username, $passwd, $db);
    if (!empty($db_data["db_username"]) && !empty($db_data["db_password"]))
    {
      echo "We are working!";
      $_SESSION["loggedIn"] = TRUE;
      $_SESSION["username"] = $db_data["db_username"];
      $_SESSION["user_id"] = $db_data["db_id"];
    }
    else
    {
      $wrongErr = "Incorrect username or password.";
    }

  }


  if(isset($_SESSION["loggedIn"]))
  {
    if($_SESSION["loggedIn"])
    {
      header("location: ./home.php");
      exit;
    }
    
  }
  else
  {
    $_SESSION["loggedIn"] = false;
  }*/
?>