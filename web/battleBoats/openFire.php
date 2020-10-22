<?php


function isFiring($db, $enemyData)
{
  if($_SERVER["REQUEST_METHOd"] == "POST")
  {
    if(isset($_POST["x-coord"]))
    {
      if(isset($_POST["y-coord"]))
      {
        $board = fire($_POST["x-coord"], $_POST["y-coord"], $enemyData["board"]);
        echo $board;
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
  
}

function fire($x, $y, $board)
{
  $board = str_split($board); 
  $coord = intval(strval($y - 1) . strval($x - 1));
  
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
  $query = "UPDATE public.game
  SET" . $which . "= :newBoard
  WHERE id = :game_id";
  $statement = $db->prepare($query);
  $statement->execute(array(':game_id'=>$_SESSION["current_game_id"], ":newBoard"=>$board));
}

?>