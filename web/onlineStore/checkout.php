<?php 
session_start();
?>

<?php
// define variables and set to empty values
$nameErr = $strtaddErr = $cityErr = $stateErr = $zipErr = "";
$name = $strtadd = $city = $state = $zip = "";
$isValid = TRUE;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $isValid = FALSE;
  } else {
    $name = test_input($_POST["name"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["strtadd"])) {
    $strtaddErr = "Street Address is required";
    $isValid = FALSE;
  } else {
    $strtadd = test_input($_POST["strtadd"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["city"])) {
    $cityErr = "City is required";
    $isValid = FALSE;
  } else {
    $city = test_input($_POST["city"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["state"])) {
    $stateErr = "State is required";
    $isValid = FALSE;
  } else {
    $state = test_input($_POST["state"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["zip"])) {
    $zipErr = "Zip is required";
    $isValid = FALSE;
  } else {
    $zip = test_input($_POST["zip"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid )
{
  $_SESSION["name"] = $name;
  $_SESSION["strtadd"] = $strtadd;
  $_SESSION["city"] = $city;
  $_SESSION["state"] = $state;
  $_SESSION["zip"] = $zip;
  header("Location: ./confPage.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en-US">
  <!--
    TODO:
    - Most important:
      * Convert the page to php.
      * Add security measures. 
      * Add form handling.
    - Extra
      * 
  -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkoutStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="homefunc.js"></script>
    <title>Checkout</title>
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
            <a class="nav-link" href="./cart.php">Cart<span class="sr-only">(current)</span></a>
          </li>
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

    <div id="checkoutContent" class="d-flex flex-column justify-content-center align-items-center">

      <h3>Checkout</h3>

      <h5>Please fill out all information completely.</h5>
      
      <div id="checkoutForm">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="row">
            <div class="col">
              <label for="name">Full Name:</label>
              <input type="text" value="" id="name" name="name" placeholder="Full Name" class="field">
            </div>
          </div>

          <span class="error"><?php echo $nameErr; ?></span>

          <div class="row">
            <div class="col">
              <label for="strtadd">Street Address:</label>
              <input type="text" value="" id="strtadd" name="strtadd" placeholder="Street Address" class="field">
            </div>
          </div>

          <span class="error"><?php echo $strtaddErr; ?></span>
          
          <div class="row">
            <div class="col">
              <label for="city">City:</label>
              <input type="text" value="" id="city" name="city" class="field" placeholder="City">
            </div>
          </div>

          <span class="error"><?php echo $cityErr; ?></span>
          
          <div class="row">
            <div class="col">
              <label for="state">State/Province:</label>
              <input type="text" value="" id="state" name="state" class="field" placeholder="State/Province">
            </div>
          </div>

          <span class="error"><?php echo $stateErr; ?></span>

          <div class="row">
            <div class="col">
              <label for="zip">Zip/Postal Code</label>
              <input type="text" value="" id="zip" name="zip" class="field" placeholder="Zip/Postal Code">
            </div>
          </div>

          <span class="error"><?php echo $zipErr; ?></span>
          
          <div class="row">
            <div class="col">
            <span id="total">Total - <?php echo $_SESSION["total"];?></span>
            </div>
          </div>


          <div class="row">
            <div class="col">
              <a type="button" href="cart.php" class="btn btn-lg btn-primary cartBtns">Return to Cart</a>
              <button type="submit" value="Complete Purchase" class="btn btn-lg btn-warning cartBtns">Complete Purchase</button>
            </div>
          </div>
          
        </form>

      
    </div>
    </div>

  </body>
</html>