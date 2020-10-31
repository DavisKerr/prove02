<?php
  session_start();
  header('Content-type: application/json');
  
  $returnArr = array('isValid'=>false, 'serverError'=>'', 'active'=>'', 'public'=>'', 'private'=>'');
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
    


    $result = searchHomeGames($db, $search);
    if(!isset($result['error']))
    {
      $returnArr['active'] = generateGameList($result['active'], false, false);
      $returnArr['public'] = generateGameList($result['public'], true, false);
      $returnArr['private'] = generateGameList($result['private'], true, false);
      
    }
    else
    {
      $returnArr['serverError'] .= $result['error'] . "\n";
    }
      
    
  }

  echo json_encode($returnArr);
?>