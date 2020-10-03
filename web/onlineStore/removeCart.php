<?php

session_start();

try 
{
  if(isset($_GET["sku"]))
  {
    $new_sku = array(0); 
    $new_name = array("Blank");
    $new_qnt = array(0);
    $new_cost = array(0.0);

    $i = array_search($_GET["sku"], $_SESSION["sku"]);

    for($x = 1; $x < count($_SESSION["sku"]); $x++)
    {
      if($x != $i)
      {
        array_push($new_sku, $_SESSION["sku"][$x]);
        array_push($new_name, $_SESSION["name"][$x]);
        array_push($new_qnt, $_SESSION["qnt"][$x]);
        array_push($new_cost, $_SESSION["cost"][$x]);
      }
     
    }

    $_SESSION["sku"] = $new_sku ;
    $_SESSION["name"] = $new_name;
    $_SESSION["cost"] = $new_cost;
    $_SESSION["qnt"] = $new_cost

    
}
catch (Exception $e)
{
  echo 'Caught exception: ', $e->getMessage();
}

?>