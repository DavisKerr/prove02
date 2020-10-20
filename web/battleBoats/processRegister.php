<?php

function isSubmit()
{
  try
  {
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $dataArr = array("username"=>'', "screenName"=>'', "password"=>'', "confirmPassword"=>'',  
      "usernameErr"=>'', "screenNameErr"=>'', "passwordErr"=>'', "confirmPasswordErr"=>'', "isValid"=>TRUE);
      $dataArr = validateForm($dataArr);
    }
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e . "\n";
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
    echo "ERROR: " . $e . "\n";
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
    echo "ERROR: " . $e . "\n";
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
    echo "ERROR: " . $e . "\n";
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
    echo "ERROR: " . $e . "\n";
  } 
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function insertRecord()
{
  try
  {

  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e . "\n";
  }
}

?>