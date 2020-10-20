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

      foreach($dataArr as $data)
      {
        echo "<br>" . $data . "<br>";
      }
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
      $data["usernameErr"] = "Screen name cannot be blank";
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
      $data["screenNameErr"] = "Username cannot be blank";
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

function validatePasswords()
{
  try
  {

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