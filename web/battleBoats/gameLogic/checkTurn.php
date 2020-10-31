<?php
  session_start();
  header('Content-type: application/json');

  $returnArr = array('success'=>false, 'serverError'=>'', 'isUserTurn'=>true);

  try
  {
    require '../database/getDB.php';
    require '../database/queryGameOwner.php';
    require '../database/queryMoves.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
    $returnArr['success'] = false;
  }

  $turnData = queryMoves($db);
  $owner = queryGameOwner($db) == $_SESSION["user_id"];

  if(empty($turnData) && $owner)
  {
   $returnArr['isUserTurn'] = TRUE;
  }
  elseif($turnData["move_number"] % 2 == 0 && $owner)
  {
    $returnArr['isUserTurn'] = TRUE;
  }
  elseif($turnData["move_number"] % 2 != 0 && !$owner)
  {
    $returnArr['isUserTurn'] = TRUE;
  }
  else
  {
    $returnArr['isUserTurn'] = FALSE;
  }




  echo json_encode($returnArr);

?>