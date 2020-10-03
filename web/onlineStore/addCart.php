<?php
echo "running";
if isset($_GET["sku"])
{
  array_push($_SESSION["sku"], $_GET["sku"]);
  echo "Success in loading " . print_r($_SESSION["sku"]) . " into the server!";
}

?>