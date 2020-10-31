<?php
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST["logout"]))
  {
    if($_POST["logout"])
    {
      $_SESSION["loggedIn"] = FALSE;
      header("location: ./landing.php");
      exit;
    }
  }
}
?>