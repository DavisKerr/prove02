<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en-US">
  <!--
    TODO:
    - Most important:
      * Fix Security issues. 
    - Extra
      * 
  -->

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="homefunc.js"></script>
    <title>Confirmation</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../navigator.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./browse.php">Browse<span class="sr-only">(current)</span></a>
          </li>
         <!-- <li class="nav-item">
            <a class="nav-link" href="#">blank</a>
          </li>-->
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div> -->
          </li>
        </ul>
      </div>
    </nav>


    <div id="cartContent" class="d-flex flex-column justify-content-center align-items-center">

      <h3>Is your order correct?:</h3>

      <!--Generate Actual list using PHP-->
      <ul id="cart">
        <?php

        $_SESSION["total"] = 0.0;

        try 
        {
          for ($i = 1; $i < count($_SESSION["sku"]); $i++)
          {
            $_SESSION["total"] += $_SESSION["cost"][$i] * $_SESSION["qnt"][$i];
            echo "<li>" . $_SESSION["name"][$i] . " - $" . $_SESSION["cost"][$i] . " X " . $_SESSION["qnt"][$i] . "</li>";
          }
        }
        catch (Exception $e)
        {
          echo 'Caught exception: ', $e->getMessage();
        }
        ?>
      </ul>
      <span> Total: <?php $_SESSION["total"]; ?></span>
      <span>Ship to:</span>
      <span><?php 
        echo "Ship to: " . $_SESSION["username"] . " at " . $_SESSION["strtadd"] . ", " . $_SESSION["city"] . "<br>";
        echo $_SESSION["state"] . " " . $_SESSION["zip"];
      ?></span>
      <!--End generate-->
      <br>
      <div id="cartOptions">
      <a type="button" href="./cart.php" class="btn btn-lg btn-danger cartBtns">No, return to cart</a>
      <a type="button" href="./browse.php?empty=TRUE" class="btn btn-lg btn-success cartBtns">confirm</a>
      
      </div>
    </div>
  </body>
</html>