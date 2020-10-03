<?php

session_start();

try 
{
  if(isset($_GET["sku"]))
  {
    array_push($_SESSION["sku"], $_GET["sku"]);
  }

  echo "All data =  " . print_r($_SESSION["sku"]);
}
catch (Exception $e)
{
  echo 'Caught exception: ', $e->getMessage();
}

?>