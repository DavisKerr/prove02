<?php

  function queryUsers($username, $password, $database)
  {
    $db_data = array(/*"db_username"=>'', "db_password"=>'', "db_id"=>'',*/ "db_err"=>'');
    try
    {
      $stmt = $database->prepare('SELECT id, username, password FROM public.user WHERE username=:username AND password=:password');
      $stmt->execute(array(':username' => $username, ':password' => $password));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
    }
    catch(PDOException $e)
    {
      return $db_data['db_err'] = $e->getMessage();
    }
  }
?>