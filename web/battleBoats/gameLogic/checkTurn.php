<?php
  session_start();
  header('Content-type: application/json');

  $returnArr = array('success'=>true, 'serverError'=>'', 'isUserTurn'=>true, 'form'=>'', 'finished'=>'', 'numMoves'=>'', 'winner'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/queryGameOwner.php';
    require '../database/queryMoves.php';
    require '../gameLogic/generateMove.php';
    require '../database/checkFinished.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
    $returnArr['success'] = false;
  }

  $owner = queryGameOwner($db) == $_SESSION["user_id"];
  $results = checkFinished($db);

  $returnArr['winner'] = $_SESSION["user_id"];

  if($results['game_type'] != 'FINISHED')
  {
    $turnData = queryMoves($db);
    $returnArr['numMoves'] = $turnData['move_number'];
    $isTurn = false;

    if(empty($turnData) && $owner)
    {
      $isTurn = true;
    }
    elseif($turnData["move_number"] % 2 == 0 && $owner)
    {
      $isTurn = true;
    }
    elseif($turnData["move_number"] % 2 != 0 && !$owner)
    {
      $isTurn = true;
    }
    else
    {
      $isTurn = false;
    }

    $returnArr['isUserTurn'] = $isTurn;

    $returnArr['form'] = generateMove($isTurn);
  }
  else
  {
    if($results['winner'] == $_SESSION['user_id'])
    {
      $returnArr['form'] = "<h4> Congratulations, you won!</h4>";
    }
    else
    {
      $returnArr['form'] = "<h4> Sorry, you lost!</h4>";
    }
  }

  echo json_encode($returnArr);

?>