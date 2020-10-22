<?php


function isFiring($db, $enemyData)
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

  $query = "INSERT INTO public.moves
  ( sent_by
  , game_id
  , time_sent
  , move_number
  , board_update_sent_by
  , coords
  )
  VALUES
  ( :user_id
  , :game_id
  , (SELECT CURRENT_TIMESTAMP)
  , :moveNum
  , :coords
  )";
}

?>