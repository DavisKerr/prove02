<?php
session_start();
?>

<?php
/* PHP to remove items */
try 
{
  if(isset($_GET["rsku"]))
  {
    if($_GET["quantity"] <= 0)
    {
    
      $new_sku = array(0); 
      $new_name = array("Blank");
      $new_qnt = array(0);
      $new_cost = array(0.0);

      $i = array_search($_GET["rsku"], $_SESSION["sku"]);

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

      $_SESSION["sku"] = $new_sku;
      $_SESSION["name"] = $new_name;
      $_SESSION["cost"] = $new_cost;
      $_SESSION["qnt"] = $new_qnt;
    }
    else
    {
      $i = array_search($_GET["rsku"], $_SESSION["sku"]);
      $_SESSION["qnt"][$i] = $_GET["quantity"];
    }
  }
}
catch (Exception $e)
{
  echo 'Caught exception: ', $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <!--
    TODO:
    - Most important:
      * Add functionality to remove individual items from cart.
    - Extra
      * Add quantity adjuster.
  -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cartStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Cart</title>
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

    <header>
      <h1>Shop.Net</h1>
    </header>
    <hr>

    <div id="cartContent" class="d-flex flex-column justify-content-center align-items-center">

      <h3>Your Cart:</h3>

      <h5>
        To adjust the amount of an item, enter the new quantity and push 'change.'<br>
        To remove an item, set the quantity to 0 and hit 'change.'
    </h5>
      
      <!--Generate Actual list using PHP-->
      <ul id="cart">
        <?php

        $_SESSION["total"] = 0.0;

        try 
        {
          for ($i = 1; $i < count($_SESSION["sku"]); $i++)
          {
            $_SESSION["total"] += $_SESSION["cost"][$i] * $_SESSION["qnt"][$i];
            echo "<li>" . $_SESSION["name"][$i] . " - $" . $_SESSION["cost"][$i] . " X " . $_SESSION["qnt"][$i];
            echo "\n<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='get'>\n";
            echo "<input type='number' name='quantity' min='0' max='50' id='qunatity' value='" . $_SESSION["qnt"][$i] ."'>\n";
            echo "<input type='number' hidden value='" . $_SESSION["sku"][$i] . "' name='rsku' id='rsku'>";
            echo "<button type='submit' value='" . $_SESSION["sku"][$i] . "' class='btn btn-danger btn-sm'>Change</button></li>\n";
            echo "\n</form>\n"; 
          }
        }
        catch (Exception $e)
        {
          echo 'Caught exception: ', $e->getMessage();
        }
        ?>
      </ul>
      <span id="total">Total - <?php echo "$" . $_SESSION["total"];?></span>
      <!--End generate-->
      <br>
      <div id="cartOptions">
      <a type="button" href="./browse.php" class="btn btn-lg btn-primary cartBtns">Return to Browse</a>
      <a type="button" href="./checkout.php" class="btn btn-lg btn-warning cartBtns">Check Out</a>
      
    </div>
  </div>
    

  </body>
</html>