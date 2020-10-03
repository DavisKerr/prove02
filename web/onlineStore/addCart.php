<?php

session_start();

try 
{
  if(isset($_GET["sku"]))
  {
    $exists = array_search($_GET["sku"], $_SESSION["sku"]);

    if($exists)
    {
      echo "Already here";
      $i = $exists;
      $_SESSION["qnt"][$i] += 1;
    }
    else
    {
      array_push($_SESSION["sku"], $_GET['sku']);
      array_push($_SESSION["name"], $_GET['name']);
      array_push($_SESSION["cost"], $_GET['cost']);
      array_push($_SESSION["qnt"], $_GET['qnt']);
    }
    
  }

  echo count($_SESSION['sku']);
}
catch (Exception $e)
{
  echo 'Caught exception: ', $e->getMessage();
}

?>