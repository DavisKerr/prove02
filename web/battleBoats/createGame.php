<?php

require "generateBoard.php";

function isNewGame($db)
{
  try
  {
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["gameName"]))
    {
      echo "YEET!";
      $dataArr = array("gameName"=>'', "type"=>'PUBLIC', "code"=>'', "gameNameErr"=>'', "codeErr"=>'', "isValid"=>TRUE);
      $dataArr = validateForm($dataArr);
      if($dataArr["isValid"])
      {
        insertRecord($dataArr, $db);
      }
      return $dataArr;
    }
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
  }
}

function validateForm($data)
{
  try
  {
     $data = validateGameName($data);
     if(isset($_POST["private"]))
     {
       $data["type"] = 'PRIVATE';
       $data = validateCode($data);
     }
     
     return $data;
    
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
  } 
}

function validategameName($data)
{
  try
  {
    if(empty($_POST["gameName"]))
    {
      $data["gameNameErr"] = "Game name name cannot be blank";
      $data["isValid"] = FALSE;
    }
    else
    {
      $data["gameName"] = test_input($_POST["gameName"]);
    }

    return $data;
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
  } 
}

function validateCode($data)
{
  try
  {
    if(empty($_POST["gameCode"]))
    {
      $data["codeErr"] = "Code for a private game cannot be blank";
      $data["isValid"] = FALSE;
    }
    else
    {
      $data["code"] = test_input($_POST["gameCode"]);
    }

    return $data;
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
  } 
}


function insertRecord($data, $db)
{
  try
  {
    $board1 = getBoard();
    $board2 = getBoard();

    $statement = $db->prepare("
    INSERT INTO public.game
    ( game_owner
    , game_name
    , game_code
    , game_type
    , grid_owner
    , grid_opponent
    , is_active
    , date_created
    )
    VALUES
    ( :user_id
    , :gameName
    , :code
    , :type
    , :board1
    , :board2
    , 0
    , (SELECT CURRENT_TIMESTAMP)
    )");
    $statement->execute(array(':user_id'=>$_SESSION["user_id"], ':code'=>$data["code"], 
    ':gameName'=>$data["gameName"], ':type'=>$data["type"], ':board1'=>$board1, ':board2'=>$board2 ));
    return TRUE;
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
    return FALSE;
  }
}



?>