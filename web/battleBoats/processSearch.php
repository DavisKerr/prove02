<?php
  
  $myGameSearchErr = $publicGameSearchErr = $privateGameSearchErr =  "";
  $myGameSearch = $publicGameSearch = $privateGameSearch = "%";
  $isValid = TRUE;
  $allowSearch = FALSE;

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if(isset($_POST["myGameSearch"]))
    {
      if (empty($_POST["myGameSearch"])) 
      {
        $myGameSearchErr  = "Nothing Searched";
        $isValid = FALSE;
      } else 
      {
        $myGameSearch = '%' . test_input($_POST["myGameSearch"]) . '%';
      }
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if(isset($_POST["publicGameSearch"]))
    {
      if (empty($_POST["publicGameSearch"])) 
      {
        $publicGameSearchErr  = "Nothing Searched";
        $isValid = FALSE;
      } else 
      {
        $publicGameSearch = test_input($_POST["publicGameSearch"]);
      }
    }
  }
    
/*
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if(isset($_POST["privateGameSearch"]))
    {
      if (empty($_POST["privateGameSearch"])) 
      {
        $privateGameSearchErr  = "Nothing Searched";
        $isValid = FALSE;
      } else 
      {
        $privateGameSearch = test_input($_POST["privateGameSearch"]);
      }
    }
  }*/
  
  
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid )
  {
    $allowSearch = True;
  }


?>