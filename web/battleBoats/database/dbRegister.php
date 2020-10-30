<?php 

  
  function dbRegister($username, $screenName, $password, $db)
  {
    try
    {
      $statement = $db->prepare("INSERT INTO public.user( username, password, display_name, date_created)
      VALUES( :username, :password, :screenName, (SELECT CURRENT_TIMESTAMP))");
      $statement->execute(array(':username' =>$username, ':password' =>$password, ':screenName' => $screenName));
      return TRUE;
    }
    catch(Exception $e)
    {
      //echo "ERROR: " . $e->getMessage() . "\n";
      return FALSE;
    }
  }

?>