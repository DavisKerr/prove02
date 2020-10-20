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
    
    
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e . "\n";
  } 
}

function validateUsername()
{
  try
  {

  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e . "\n";
  } 
}

function validateScreenName()
{
  try
  {

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