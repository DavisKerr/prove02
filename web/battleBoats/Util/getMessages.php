<?php
  session_start();
  header('Content-type: application/json');
  // Get variables ready.
  $returnArr = array('serverError'=>'', 'messages'=>'');

  try
  {
    require '../database/getDB.php';
    require '../database/queryMessages.php';
    require '../Util/generateMessageTable.php';
  }
  catch(Exception $e)
  {
    $returnArr['serverError'] .= 'There was an error in the file system\n';
  }

  $messages = queryMessages($db);

  $returnArr['messages'] = generateMessageTable($messages);

  echo json_encode($returnArr);

?>