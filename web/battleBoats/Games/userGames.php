<?php
  session_start();
  header('Content-type: application/json');
  
  $returnArr = array('isValid'=>false, 'serverError'=>'', 'active'=>'', 'pending'=>'', 'finished'=>'');
  // Import the needed files
  try
  {
    require '../database/getDB.php';
    require '../database/searchGames.php';
    require './generateGameList.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
  }

  if($_SERVER["REQUEST_METHOD"] == 'POST')
  {
    $search = '%' . filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
    if($search != '%')
    {
      $search .= '%';
    }
    


    $result = searchUserGames($db, $search);
    if(!isset($result['error']))
    {
      $returnArr['active'] = generateGameList($result['active'], false, false);
      $returnArr['pending'] = generateGameList($result['pending'], true, true);
      $returnArr['finished'] = generateGameList($result['finished'], true, false);
    }
    else
    {
      $returnArr['serverError'] .= $result['error'] . "\n";
    }
  }

  echo json_encode($returnArr);
?>