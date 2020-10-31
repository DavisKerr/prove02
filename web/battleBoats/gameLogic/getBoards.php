<?php
  session_start();
  header('Content-type: application/json');
  
  $returnArr = array('success'=>false, 'serverError'=>'', 'userBoard'=>'', 'enemyBoard'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/queryPlayerBoard.php';
    require '../database/queryEnemyBoard.php';
    require './readBoard.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
    $returnArr['success'] = false;
  }

  try
  {
    $playerBoard = queryPlayerBoard($db)['grid'];
    $enemyBoard = queryEnemyBoard($db)['grid'];

    $returnArr['userBoard'] = readBoard($playerBoard, 'playerBoard', 'Your Board', true);
    $returnArr['enemyBoard'] = readBoard($enemyBoard, 'opponentBoard', 'Enemy Board', false);
    $returnArr['success'] = true;
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
    $returnArr['success'] = false;
  }
  

  echo json_encode($returnArr)
?>