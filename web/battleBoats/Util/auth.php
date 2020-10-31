<?php 

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