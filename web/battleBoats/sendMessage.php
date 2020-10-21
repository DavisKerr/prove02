<?php
  function sendMessage($db)
  { $dataArr = array("message"=>'', "messageErr"=>'', "isValid"=>TRUE);
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(isset($_POST["newMessage"]))
      {
        $dataArr = validateForm($data);
        if($dataArr["isValid"])
        {
          insertMessage($db, $dataArr["message"]);
        }
      }
      
    }
    return $dataArr;
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function insertMessage($db, $message)
  {
    try
    {
      $query = "
      INSERT INTO public.messages
      ( sent_by
      , game_id
      , body
      , time_sent
      )
      VALUES
      ( :user_id
      , :game_id
      , :message
      , (SELECT CURRENT_TIMESTAMP)
      )";
      $statement = $db->prepare($query);
      $statement->execute(array(':user_id'=>$_SESSION["user_id"], ":game_id" => $_SESSION['current_game_id'], ":message" => $message));
    }
    catch (Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
    }
    
  }

  function validateForm($data)
{
  try
  {
     $data = validateMessage($data);
     return $data;
    
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
  } 
}

function validateMessage($data)
{
  try
  {
    if(empty($_POST["newMessage"]))
    {
      $data["messageErr"] = "Message name cannot be blank";
      $data["isValid"] = FALSE;
    }
    else
    {
      $data["message"] = test_input($_POST["newMessage"]);
      if(preg_match("/^ *$/", $data["message"]))
      {
        $data["messageErr"] = "Message name cannot be blank";
        $data["isValid"] = FALSE;
      }
    }

    return $data;
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
  } 
}
?>