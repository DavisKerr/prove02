<?php
  session_start();
  require 'getDB.php';
  function queryDatabase($v_username, $v_passwrd, $database)
  {
    $stmt = $database->prepare('SELECT id, username, password FROM public.user WHERE username=:username AND password=:password');
    $stmt->execute(array(':username' => $v_username, ':password' => $v_passwrd));
    $db_data = array("db_username"=>'', "db_password"=>'', "db_id"=>'');
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
    {
      $db_data["db_username"] = $row["username"];
      $db_data["db_password"] = $row["password"];
      $db_data["db_id"] = $row["id"];
    }
    return $db_data;
  }
  
  $usernameErr = $passwdErr =  "";
  $username = $passwd =  "";
  $isValid = TRUE;
  $isloggedIn = FALSE;

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
    if (empty($_POST["password"])) 
    {
      $passwdErr = "Street Address is required";
      $isValid = FALSE;
    } else 
    {
      $passwd = test_input($_POST["password"]);

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
    $db_data = queryDatabase($username, $passwd, $db);
    if (!empty($db_data["db_username"]) && !empty($db_data["db_password"]))
    {
      echo "We are working!";
      $_SESSION["loggedIn"] = TRUE;
      $_SESSION["username"] = $db_data["db_username"];
      $_SESSION["user_id"] = $db_data["db_id"];
    }

  }


  if(isset($_SESSION["loggedIn"]))
  {
    if($_SESSION["loggedIn"])
    {
      header("location: ./home.php");
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
        <a href="register.php" class="btn btn-info" id="changeBtn">Register</a>
      </div>
    </div>


  </body>
</html>