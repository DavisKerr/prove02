<?php
  function sendMessage($db)
  { $dataArr = array("message"=>'', "messageErr"=>'', "isValid"=>TRUE);
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(isset($_POST["newMessage"]))
      {
        $dataArr = validateForm($data);
        if($data["isValid"])
        {
          insertMessage($db, $dataArr["message"]);
        }
      }
      return $data;
    }
  }

  function insertMessage($db, $message)
  {
    echo "SUCCESS!";
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
    }

    return $data;
  }
  catch(Exception $e)
  {
    echo "ERROR: " . $e->getMessage() . "\n";
  } 
}
?>