<?php

  function queryUsers($username, $database)
  {
    try
    {
      $stmt = $database->prepare('SELECT username FROM public.user WHERE username=:username');
      $stmt->execute(array(':username' => $username));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row['username'];
    }
    catch(PDOException $e)
    {
      return $e->getMessage();
    }
  }
?>