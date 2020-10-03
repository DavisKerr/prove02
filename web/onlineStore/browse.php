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
          echo "Already here";
          $i = $exists;
          $_SESSION["qnt"][$i] += 1;
        }
        else
        {
          array_push($_SESSION["sku"], $_GET['sku']);
          array_push($_SESSION["name"], $_GET['name']);
          array_push($_SESSION["cost"], $_GET['cost']);
          array_push($_SESSION["qnt"], $_GET['quantity']);
        }
        echo count($_SESSION['sku']);
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
        echo "<input type='number' name='quantity' id='quantity' min='1' max='5' value='1'>\n";
        echo "<input hidden value='" . $x . "' id='sku' name='sku'>\n";
        echo "<input hidden value='" . $names[$x] . "' id='name' name='name'>\n";
        echo "<input hidden value='" . $prices[$x] . "' id='cost' name='cost'>\n";
        echo "<button type='submit' class='cartBtn btn btn-warning'>Add to Cart </button>\n";
        echo "</form></div>";

      }
    ?>

      <div class= "item">
        <img src="Images/20000leagues.jpg" alt="#">
        <br>
        <p class="description">
          20,000 Leagues Under the Sea by Jules Verne 
          <br>
          $14.39
        </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <label for="quantity">Quantity:</label>
          <input type="number" name="quantity" id="quantity" min="1" max="50" value="1">
          <input hidden value="1" id="sku" name="sku">
          <input hidden value="14.39" id="sku" name="sku">
          <input hidden value="20,000 Leagues Under the Sea" id="sku" name="sku">
        </form>
        <button type="button" onclick="addItemToCart(1, 14.39,'20,000 Leagues Under the Sea', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
        
      </div>

      <div class= "item">
        <img src="Images/alien.jpg" alt="#">
        <br>
        <p class="description">
          Alienware gaming Laptop
          <br>
          $1200.99
        </p>
        <button type="button" onclick="addItemToCart(2, 1200.99,'Alienware gaming Laptop', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/chrome.jpg" alt="#">
        <br>
        <p class="description">
          Lenovo Chromebook
          <br>
          $123.69
        </p>
        <button type="button" onclick="addItemToCart(3, 123.69,'Lenovo Chromebook', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/ds3.jpg" alt="#">
        <br>
        <p class="description">
          Dark Souls 3
          <br>
          $34.26
        </p>
        <button type="button" onclick="addItemToCart(4, 34.26,'Dark Souls 3', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/ferari.jpg" alt="#">
        <br>
        <p class="description">
          Ferari
          <br>
          $2,999,999.99
        </p>
        <button type="button" onclick="addItemToCart(5, 2999999.99,'Ferari', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>
      
      <div class= "item">
        <img src="Images/guitar.jpg" alt="#">
        <br>
        <p class="description">
          Classic Electric Guitar
          <br>
          $353.77
        </p>
        <button type="button" onclick="addItemToCart(6, 353.77,'Classic Electric Guitar', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/kia.jpg" alt="#">
        <br>
        <p class="description">
          Kia Soul
          <br>
          $16000.98
        </p>
        <button type="button" onclick="addItemToCart(7, 16000.98,'Kia Soul', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/lotr.jpg" alt="#">
        <br>
        <p class="description">
          Lord of the Rings bluray box set - Extended
          <br>
          $95.32
        </p>
        <button type="button" onclick="addItemToCart(8, 95.32,'Lord of the Rings bluray box set - Extended', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/mask.jpg" alt="#">
        <br>
        <p class="description">
          Mask
          <br>
          $0.50
        </p>
        <button type="button" onclick="addItemToCart(9, 0.50,'Mask', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/peacoat.jpg" alt="#">
        <br>
        <p class="description">
          Men's Peacoat
          <br>
          $132.22
        </p>
        <button type="button" onclick="addItemToCart(10, 132.22,'Men's Peacoat', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/penutmms.jpg" alt="#">
        <br>
        <p class="description">
          Penut M&M's
          <br>
          $1.10
        </p>
        <button type="button" onclick="addItemToCart(11, 1.10,'Penut M&M\'s', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/ps5.jpg" alt="#">
        <br>
        <p class="description">
          Playstation 5
          <br>
          $500.01
        </p>
        <button type="button" onclick="addItemToCart(12, 500.01,'Playstation 5', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/rtx.jpg" alt="#">
        <br>
        <p class="description">
          NVIDIA RTX 3090
          <br>
          $1300.21
        </p>
        <button type="button" onclick="addItemToCart(13, 1300.21,'NVIDIA RTX 3090', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/suit.jpg" alt="#">
        <br>
        <p class="description">
          Men's Suit
          <br>
          $430.20
        </p>
        <button type="button" onclick="addItemToCart(14, 430.20,'Men\'s Suit', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/tie.jpg" alt="#">
        <br>
        <p class="description">
          Necktie
          <br>
          $10.00
        </p>
        <button type="button" onclick="addItemToCart(15, 10.00,'Necktie', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/totinos.jpg" alt="#">
        <br>
        <p class="description">
          Totinos Pizza
          <br>
          $5.40
        </p>
        <button type="button" onclick="addItemToCart(16, 5.40,'Totinos Pizza', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/wayofkings.jpg" alt="#">
        <br>
        <p class="description">
          The Way of Kings by Brandon Sanderson
          <br>
          $16.70
        </p>
        <button type="button" onclick="addItemToCart(17, 16.70,'The Way of Kings', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/xbox.jpg" alt="#">
        <br>
        <p class="description">
          Xbox Series X
          <br>
          $510.04
        </p>
        <button type="button" onclick="addItemToCart(18, 510.04,'Xbox Series X', 1)" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <a type="button" id="cartBtn" href="./cart.php" class="cartBtn btn btn-success">Go to Cart</a>
    </div>
    <br>
    <br>
    <br>


  </body>
</html>