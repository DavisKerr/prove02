<?php
  session_start();
  require "./getDB.php";
  


  /*
  function isSubmit($db)
  {
    try
    {
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
        $dataArr = array("username"=>'', "screenName"=>'', "password"=>'', "confirmPassword"=>'',  
        "usernameErr"=>'', "screenNameErr"=>'', "passwordErr"=>'', "confirmPasswordErr"=>'', "isValid"=>TRUE, "dbErr"=>"");
        $dataArr = validateForm($dataArr);
        if($dataArr["isValid"])
        {
          if(insertRecord($dataArr, $db))
          {
            header("location: ./login.php");
            exit;
          }
          else
          {
            $dataArr["dbErr"] = "That username is already in use!";
          }
        }
        return $dataArr;
      }
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
    }
  }
  
  function validateForm($data)
  {
    try
    {
       $data = validateUsername($data);
       $data = validateScreenName($data);
       $data = validatePasswords($data);
       return $data;
      
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
    } 
  }
  
  function validateUsername($data)
  {
    try
    {
      if(empty($_POST["username"]))
      {
        $data["usernameErr"] = "Username name cannot be blank";
        $data["isValid"] = FALSE;
      }
      else
      {
        $data["username"] = test_input($_POST["username"]);
      }
  
      return $data;
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
    } 
  }
  
  function validateScreenName($data)
  {
    try
    {
      if(empty($_POST["screen_name"]))
      {
        $data["screenNameErr"] = "Screen name cannot be blank";
        $data["isValid"] = FALSE;
      }
      else
      {
        $data["screenName"] = test_input($_POST["screen_name"]);
      }
  
      return $data;
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
    } 
  }
  
  function validatePasswords($data)
  {
    try
    {
      if(empty($_POST["password"]))
      {
        $data["passwordErr"] = "Password cannot be blank";
        $data["isValid"] = FALSE;
      }
      else
      {
        $data["password"] = test_input($_POST["password"]);
      }
  
      if(empty($_POST["confirmPassword"]))
      {
        $data["confirmPasswordErr"] = "Confirm password cannot be blank";
        $data["isValid"] = FALSE;
      }
      else
      {
        $data["confirmPassword"] = test_input($_POST["confirmPassword"]);
      }
  
      if($data["password"] != $data["confirmPassword"])
      {
        $data["confirmPasswordErr"] = "Passwords must match";
        $data["isValid"] = FALSE;
      }
  
      return $data;
    }
    catch(Exception $e)
    {
      echo "ERROR: " . $e->getMessage() . "\n";
    } 
  }
  
  function test_input($data) 
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  function insertRecord($data, $db)
  {
    try
    {
      $statement = $db->prepare("INSERT INTO public.user( username, password, display_name, date_created)
      VALUES( :username, :password, :screenName, (SELECT CURRENT_TIMESTAMP))");
      $statement->execute(array(':username' => $data["username"], ':password' => $data["password"], ':screenName' => $data["screenName"]));
      return TRUE;
    }
    catch(Exception $e)
    {
      //echo "ERROR: " . $e->getMessage() . "\n";
      return FALSE;
    }
  }*/
?>