<?php

session_start();

try 
{
  if(isset($_GET["sku"]))
  {
    echo "adding to array...";
    array_push($_SESSION["sku"], "Blue");
  }

  print_r($_SESSION["sku"]);
}
catch (Exception $e)
{
  echo 'Caught exception: ', $e->getMessage();
}

?>