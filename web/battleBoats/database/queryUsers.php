<?php

  function queryUsers($username, $password, $database)
  {
    $db_data = array(/*"db_username"=>'', "db_password"=>'', "db_id"=>'',*/ "db_err"=>'');
    try
    {
      $stmt = $database->prepare('SELECT id, username, password FROM public.user WHERE username=:username AND password=:password');
      $stmt->execute(array(':username' => $username, ':password' => $password));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      /*foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
      {
        $db_data["db_username"] = $row["username"];
        $db_data["db_password"] = $row["password"];
        $db_data["db_id"] = $row["id"];
      }*/
      return $db_data;
    }
    catch(PDOException $e)
    {
      return $db_data['db_err'] = $e->getMessage();
    }
  }
?>