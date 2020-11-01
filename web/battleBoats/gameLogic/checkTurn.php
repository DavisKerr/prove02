<?php
  session_start();
  header('Content-type: application/json');

  $returnArr = array('success'=>true, 'serverError'=>'', 'isUserTurn'=>true, 'form'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/queryGameOwner.php';
    require '../database/queryMoves.php';
    require '../gameLogic/generateMove.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
    $returnArr['success'] = false;
  }

  $turnData = queryMoves($db);
  $owner = queryGameOwner($db) == $_SESSION["user_id"];
  $isTurn = false;

  if(empty($turnData) && $owner)
  {
    $isTurn = TRUE;
  }
  elseif($turnData["move_number"] % 2 == 0 && $owner)
  {
    $isTurn = TRUE;
  }
  elseif($turnData["move_number"] % 2 != 0 && !$owner)
  {
    $isTurn = TRUE;
  }
  else
  {
    $isTurn = FALSE;
  }

  $returnArr['isUserTurn'] = $isTurn;

  $returnArr['form'] = generateMove($isTurn);
  


  echo json_encode($returnArr);

?>