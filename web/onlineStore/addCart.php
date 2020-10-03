<?php

if isset($_GET["sku"])
{
  array_push($_SESSION["sku"], $_GET["SKU"]);
  echo "Success!";
}

?>