<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST["logout"]))
  {
    $_SESSION["loggedIn"] = FALSE;
    header("location: ./landing.php");
    exit;
  }
}

if(!isset($_SESSION["loggedIn"]))
{
  $_SESSION["loggedIn"] = false;
  header("location: ./landing.php");
  exit;
}
else
{
  if(!$_SESSION["loggedIn"])
  {
    header("location: ./landing.php");
    exit;
  }
}
?>