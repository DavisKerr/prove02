<?php
session_start();
header('Content-type: application/json');

  $returnArr = array('success'=>true, 'serverError'=>'', 'isOver'=>false, 'isOwner'=>true);

  try
  {
    require '../database/getDB.php';
    require '../database/finishGame.php';
    require '../database/queryEnemyBoard.php';
    require '../database/queryGameOwner.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
    $returnArr['success'] = false;
  }

  $board = queryEnemyBoard($db)['grid'];

  $board = str_split($board);
  $counter = 0;
  foreach($board as $square)
  {
    if($square == 'X')
    {
      $counter++;
    }
  }

  if($counter == 17)
  {
    $returnArr['isOver'] = TRUE;
  }
  else
  {
    $returnArr['isOver'] = FALSE;
  }

  if($returnArr['isOver'])
  {
    finishGame($db);
  }

  $returnArr['isOwner']= queryGameOwner($db) == $_SESSION['user_id'];

  echo json_encode($returnArr);
?>