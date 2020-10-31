<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST["logout"]))
  {
    if($_POST["logout"])
    {
      $_SESSION["loggedIn"] = FALSE;
    }
  }
}
?>