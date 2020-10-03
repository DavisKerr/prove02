<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en-US">
  <!--
    TODO:
    - Extra
      * Add a search feature that lets users search by key word
      * Add quantity sliders
      * Move the navbar to a seperate php file.
      * Add security for the search bar.
      * Add PHP to generate my items in alphabetical order
  -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="browseStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="shopping.js"></script>
    <title>Browse</title>
  </head>
  <body>

  <?php
  if(isset($_SESSION["sku"]) != TRUE or isset($_GET["empty"]))
  {
    $_SESSION["sku"] = array(0); 
    $_SESSION["name"] = array("Blank");
    $_SESSION["qnt"] = array(0);
    $_SESSION["cost"] = array(0.0);
  }

  if($_SERVER["REQUEST_METHOD"] == "GET")
  {
    try 
    {
      if(isset($_GET["sku"]))
      {
        $exists = array_search($_GET["sku"], $_SESSION["sku"]);

        if($exists)
        {
          $i = $exists;
          $_SESSION["qnt"][$i] += $_GET['quantity'];
        }
        else
        {
          array_push($_SESSION["sku"], $_GET['sku']);
          array_push($_SESSION["name"], $_GET['name']);
          array_push($_SESSION["cost"], $_GET['cost']);
          array_push($_SESSION["qnt"], $_GET['quantity']);
        }
        
      }
    }
      catch (Exception $e)
    {
      echo 'Caught exception: ', $e->getMessage();
    }
  }
  
  $prices = array(14.39, 1200.99, 123.69, 34.26, 2999999.99, 353.77, 16000.98, 95.32,
  0.50, 132.22, 1.10 ,500.01, 1300.21, 430.20, 10.00,
  5.40, 16.70, 510.04);
  $names = array("20,000 Leagues Under the Sea", "Alienware Gaming Laptop", "Lenovo Chromebook",
                                "Dark Souls 3", "Ferrari", "Classic Electric Guitar", "Kia Soul", 
                                "Lord of the Rings Bluray Box Set - Extended", "Mask", "Men's Peacoat", 
                                "Penut M&Ms", "PS5", "NVIDIA RTX 3090", "Men's Suit",
                                "Necktie", "Totinos pizza","The Way of Kings", "Xbox Series X");
                                
  $pictures = array("20000leagues.jpg", "alien.jpg", "chrome.jpg",
                "ds3.jpg", "ferari.jpg", "guitar.jpg", "kia.jpg", 
                "lotr.jpg", "mask.jpg", "peacoat.jpg", 
                "penutmms.jpg", "ps5.jpg", "rtx.jpg", "suit.jpg",
                "tie.jpg", "totinos.jpg","wayofkings.jpg", "xbox.jpg");

  ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../navigator.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./cart.php">Cart<span class="sr-only">(current)</span></a>
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
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search for Product" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <header>
      <h1>Shop.Net</h1>
    </header>
    <hr>

    <div id="storeContent" class="d-flex flex-row justify-content-center flex-wrap">

    <?php 
      for ($x = 1; $x < count($names); $x++)
      {
        echo "<div class='item'>\n" . "<img src='Images/" . $pictures[$x] . "'><br>";
        echo "\n <p class='description'> " . $names[$x] . "</p>\n";
        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='get'> \n";
        echo "<label for='quantity'>Quantity:</label>\n";
        echo "<input type='number' name='quantity' id='quantity' min='1' max='50' value='1'>\n";
        echo "<input hidden value='" . $x . "' id='sku' name='sku'>\n";
        echo "<input hidden value='" . $names[$x] . "' id='name' name='name'>\n";
        echo "<input hidden value='" . $prices[$x] . "' id='cost' name='cost'>\n";
        echo "<button type='submit' class='cartBtn btn btn-warning'>Add to Cart </button>\n";
        echo "</form></div>";

      }
    ?>

      

      <a type="button" id="cartBtn" href="./cart.php" class="cartBtn btn btn-success">Go to Cart</a>
    </div>
    <br>
    <br>
    <br>


  </body>
</html>