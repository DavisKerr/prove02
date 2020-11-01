
<?php
session_start();
header('Content-type: application/json');

$returnArr = array('success'=>false, 'serverError'=>'', 'isValidSpot'=>false, 'x'=>'', 'y'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/queryEnemyBoard.php';
    require './readBoard.php';
    require '../database/updateBoard.php';
    require '../database/insertMoves.php';
    require '../database/queryMoves.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
    $returnArr['success'] = false;
  }

    $enemyBoard = queryEnemyBoard($db); 
    $x = htmlspecialchars($_POST["xcoord"]);
    $y = htmlspecialchars($_POST["ycoord"]);
    $moveData = queryMoves($db);
    $returnArr['x'] = $x;
    $returnArr['y'] = $y;
    $board = fire($x, $y, $enemyBoard);

    if($board != "ERROR")
    {
      $returnArr['serverError'] = updateBoard($db, $board);
      $move = $moveData["move_number"];
      if(empty($moveData))
      {
        $move = 0;
      }
      insertMoves($db, $x, $y, $move);
      $returnArr['isValidSpot'] = true;
    }
    else
    {
      $returnArr["isValidSpot"] = false;
    }
  

  function fire($x, $y, $board)
  {
    $board = str_split($board); 
    $coord = intval(strval($y - 1) . strval($x - 1)) + 1;
    
    $counter = 0;
    for($i = 0; $i < sizeof($board); $i++)
    {
      if($board[$i] != "/")
      {
        $counter++;
      }
      
      if($coord == $counter)
      {
        if($board[$i] == "V")
        {
          $board[$i] = 'X';
        }
        elseif($board[$i] == "*")
        {
          $board[$i] = 'O';
        }
        else
        {
          return "ERROR";
        }
        break;
      }
    }
    $board = implode("", $board);
    return $board;
  }

  echo json_encode($returnArr);


?>