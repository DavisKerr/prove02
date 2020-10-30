<?php

if(isset($_SESSION["loggedIn"]))
  {
    if($_SESSION["loggedIn"])
    {
      header("location: ./home.php");
    }
    
  }
  else
  {
    $_SESSION["loggedIn"] = false;
  }
  
?>