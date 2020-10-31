<?php
  session_start();
  header('Content-type: application/json');

  $returnArr = array('success'=>false, 'serverError'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/insertJoin.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] = 'There was an error in the file system\n';
  }


  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $game_id = htmlspecialchars($_POST["id"]);
    $returnArr["success"] == insertJoin($db, $game_id);
  }


?>