<?php

session_start();

try 
{
  if(isset($_GET["sku"]))
  {
    echo "adding to array...";
    array_push($_SESSION["sku"], $_GET['sku']);
    array_push($_SESSION["name"], $_GET['cost']);
    array_push($_SESSION["cost"], $_GET['name']);
    array_push($_SESSION["qnt"], $_GET['qnt']);
  }

  echo count($_SESSION['sku']);
}
catch (Exception $e)
{
  echo 'Caught exception: ', $e->getMessage();
}

?>