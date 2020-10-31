<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(isset($_POST["playGame"]))
  {
    $_SESSION["current_game_id"] = $_POST["playGame"]; 
    header("location: ../Pages/play.php");
    exit;
  }
}

?>