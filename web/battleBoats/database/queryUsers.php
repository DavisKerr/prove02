<?php

  function queryUsers($v_username, $v_passwrd, $database)
  {
    try
    {
      $stmt = $database->prepare('SELECT id, username, password FROM public.user WHERE username=:username AND password=:password');
      $stmt->execute(array(':username' => $v_username, ':password' => $v_passwrd));
      $db_data = array("db_username"=>'', "db_password"=>'', "db_id"=>'');
      foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
      {
        $db_data["db_username"] = $row["username"];
        $db_data["db_password"] = $row["password"];
        $db_data["db_id"] = $row["id"];
      }
      return $db_data;
    }
    catch(PDOException $e)
    {
      echo json_encode(array("error"=>$e->getMessage));
    }
    
  }
?>