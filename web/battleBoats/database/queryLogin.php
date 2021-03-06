<?php

  function queryLogin($username, $database)
  {
    $db_data = array(/*"db_username"=>'', "db_password"=>'', "db_id"=>'',*/ "db_err"=>'');
    try
    {
      $stmt = $database->prepare('SELECT id, username, password FROM public.user WHERE username=:username');
      $stmt->execute(array(':username' => $username));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
    }
    catch(PDOException $e)
    {
      return $db_data['db_err'] = $e->getMessage();
    }
  }
?>