<?php
session_start();
header('Content-type: application/json');
// Get variables ready.
$returnArr = array('serverError'=>'', 'isValid'=>false);

try
{
  require '../database/getDB.php';
  require '../database/insertMessage.php';
}
catch(Exception $e)
{
  $returnArr['serverError'] .= 'There was an error in the file system\n';
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Initialize and sanitize the input
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    
    $returnArr['isValid'] = insertMessage($db, $message);
}

echo json_encode($returnArr);
?>