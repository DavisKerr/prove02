<?php
  session_start();
  header('Content-type: application/json');
  
  $returnArr = array('invalid'=>true, 'userErr'=>'', 'passErr'=>'', 'username'=>'', 'user_id'=>'', 'password'=>'', 'success'=>false, 'serverError'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/queryUsers.php';
    require '../Util/test_input.php';
  }
  catch(Exception $e)
  {
    $returnArr['error'] = 'There was an error in the file system';
  }

  echo json_encode($returnArr); 
 
  /*if($_SERVER["REQUEST_METHOD"] == "POST")
  {

  }*/



 /*
  
  
    $usernameErr = $passwdErr = $wrongErr = "";
    $username = $passwd =  "";
    $isValid = TRUE;
    $isloggedIn = FALSE;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
      $isValid = FALSE;
    } else {
      $username = test_input($_POST["username"]);
    }
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (empty($_POST["password"])) 
    {
      $passwdErr = " Password is required";
      $isValid = FALSE;
    } else 
    {
      $passwd = test_input($_POST["password"]);
    }
  }
  
  
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