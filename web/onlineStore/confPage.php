<!DOCTYPE html>
<html lang="en-US">
  <!--
    TODO:
    - Most important:
      * Convert to PHP
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
        <li>Laptop - $10.00 </li>
        <li>Laptop - $10.00 </li>
        <li>Laptop - $10.00 </li>
        <li>Laptop - $10.00 </li>
      </ul>
      <span> Total: $100.00</span>
      <span>Ship to:</span>
      <span><!--Address here-->2678 new court, spain</span>
      <!--End generate-->
      <br>
      <div id="cartOptions">
      <a type="button" href="./cart.php" class="btn btn-lg btn-danger cartBtns">No, return to cart</a>
      <a type="button" href="./browse.php" class="btn btn-lg btn-success cartBtns">confirm</a>
      
      </div>
    </div>
  </body>
</html>