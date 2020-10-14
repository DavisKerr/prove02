<?php
  require 'getDB.php';

  session_start();

  function queryDatabase($v_username, $v_passwrd, $database)
  {
    $stmt = $database->prepare('SELECT username, password FROM public.user WHERE username=:username AND password=:password');
    $stmt->execute(array(':username' => $v_username, ':password' => $v_passwrd));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($rows);
  }
  
  $usernameErr = $passwdErr =  "";
  $username = $passwd =  "";
  $isValid = TRUE;
  $isloggedIn = TRUE;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
      $isValid = FALSE;
    } else {
      $username = test_input($_POST["username"]);
  
      if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        $usernameErr = "Only letters and white space allowed";
        $isValid = FALSE;
      }
    }
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    if (empty($_POST["passwd"])) 
    {
      $passwdErr = "Street Address is required";
      $isValid = FALSE;
    } else 
    {
      $passwd = test_input($_POST["strtadd"]);

      if (!preg_match("/^[a-zA-Z-' ]*$/", $passwd)) 
      {
        $passwdErr = "Only letters and white space allowed";
        $isValid = FALSE;
      }
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
    $_SESSION["username"] = $username;
    queryDatabase($username, $passwd, $db);


  }


  if(isset($_SESSION["loggedIn"]))
  {
    if($_SESSION["loggedIn"])
    {
      header("location: ./home");
      exit;
    }
    
  }
  else
  {
    $_SESSION["loggedIn"] = false;
  }
?>

<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./landing.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-row justify-content-center flex-wrap">
      <div id="login_menu">
        <h2 id="formTitle">Login</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="d-flex flex-column justify-content-center flex-wrap">
            <div class="fieldContainer">
              <label for="username" class="fieldLabel">Username:</label>
              <input type="text" name="username" id="username" placeholder="Username" class="loginField">
              <span><?php echo $usernameErr; ?></span>
            </div>
            <div class="fieldContainer">
              <label for="password" class="fieldLabel">Password:</label>
              <input type="password" name="password" id="password" placeholder="Password" class="loginField">
              <span><?php echo $passwdErr; ?></span>
            </div>
            <button type="submit" class="btn btn-success" id="confirmBtn">Login</button>
          </div>
        </form>
        <hr>
        <a href="register.html" class="btn btn-info" id="changeBtn">Register</a>
      </div>
    </div>


  </body>
</html>