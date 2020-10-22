<?php


function isFiring($db, $enemyData, $moveData)
{
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if(isset($_POST["x-coord"]))
    {
      if(isset($_POST["y-coord"]))
      {
        $board = fire($_POST["x-coord"], $_POST["y-coord"], $enemyData["board"]);
        if($board == "ERROR")
        {
          return "ERROR: ALREADY TRIED THERE!";
        }
        else
        {
          updateBoard($db, $board, $enemyData["which"]);
          $move = $moveData["move_number"];
          if(empty($moveData))
          {
            $move = 0;
          }
          insertMoves($db, $_POST["x-coord"], $_POST["y-coord"], $move);

          if(checkEnd($db, $board))
          {
            finishGame($db);
          }
        }
      }
    }
  }
  return "";
  
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

function updateBoard($db, $board, $which)
{
  try
  {
    $query = "UPDATE public.game SET " . $which . " = :newBoard WHERE id = :game_id";
    $statement = $db->prepare($query);
    $statement->execute(array(':game_id'=>$_SESSION["current_game_id"], ":newBoard"=>$board));
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage();
  }
  
}

function insertMoves($db, $x, $y, $moveNum)
{
  $moveNum++;
  $coords = "(" . $x . ", " . $y . ")";
  try
  {
    $query = "INSERT INTO public.moves
  ( sent_by
  , game_id
  , time_sent
  , move_number
  , coords
  )
  VALUES
  ( :user_id
  , :game_id
  , (SELECT CURRENT_TIMESTAMP)
  , :moveNum
  , :coords
  )";
  $statement = $db->prepare($query);
  $statement->execute(array(':game_id'=>$_SESSION["current_game_id"], ":moveNum"=>$moveNum, ":coords"=>$coords, ":user_id"=> $_SESSION["user_id"]));
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage();
  }
  
}

?>