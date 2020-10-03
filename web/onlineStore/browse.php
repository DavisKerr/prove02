<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en-US">
  <!--
    TODO:
    - Most important:
      * Add sessions and variables.
      * Add functionality to the add to cart button
    - Extra
      * Add a search feature that lets users search by key word
      * Add quantity sliders
      * Move the navbar to a seperate php file.
      * Add security for the search bar.
      * Add or remove welcome message based on sessions.
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

  $_SESSION["skus"] = array();
  $_SESSION["name"] = array();
  $_SESSION["cost"] = array();
  $_SESSION["qnt"] = array();

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

      <div class= "item">
        <img src="Images/20000leagues.jpg" alt="#">
        <br>
        <p class="description">
          20,000 Leagues Under the Sea by Jules Verne 
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/alien.jpg" alt="#">
        <br>
        <p class="description">
          Alienware gaming Laptop
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/chrome.jpg" alt="#">
        <br>
        <p class="description">
          Lenovo Chromebook
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/ds3.jpg" alt="#">
        <br>
        <p class="description">
          Dark Souls 3
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/ferari.jpg" alt="#">
        <br>
        <p class="description">
          Blue Ferari
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>
      
      <div class= "item">
        <img src="Images/guitar.jpg" alt="#">
        <br>
        <p class="description">
          Classic Electric Guitar
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/kia.jpg" alt="#">
        <br>
        <p class="description">
          Kia Soul
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/lotr.jpg" alt="#">
        <br>
        <p class="description">
          Lord of the Rings bluray box set - Extended
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/mask.jpg" alt="#">
        <br>
        <p class="description">
          Mask
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/peacoat.jpg" alt="#">
        <br>
        <p class="description">
          Men's Peacoat
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/penutmms.jpg" alt="#">
        <br>
        <p class="description">
          Penut M&M's
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/ps5.jpg" alt="#">
        <br>
        <p class="description">
          Playstation 5
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/rtx.jpg" alt="#">
        <br>
        <p class="description">
          NVIDIA RTX 3090
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/suit.jpg" alt="#">
        <br>
        <p class="description">
          Men's Suit
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/tie.jpg" alt="#">
        <br>
        <p class="description">
          Necktie
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/totinos.jpg" alt="#">
        <br>
        <p class="description">
          Totinos Pizza
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/wayofkings.jpg" alt="#">
        <br>
        <p class="description">
          The Way of Kings by Brandon Sanderson
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <div class= "item">
        <img src="Images/xbox.jpg" alt="#">
        <br>
        <p class="description">
          Xbox Series X
          <br>
          $10.00
        </p>
        <button type="button" class="cartBtn btn btn-warning">Add to Cart</button>
      </div>

      <a type="button" id="cartBtn" href="./cart.php" class="cartBtn btn btn-success">Go to Cart</a>
    </div>
    <br>
    <br>
    <br>


  </body>
</html>