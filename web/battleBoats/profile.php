<?php
  session_start();

  require 'getDB.php';
  require 'auth.php';
 


  function queryDatabaseForUserInfo($database)
  {
    try
    {
      $query = "
      SELECT username, display_name, date_created 
      FROM public.user 
      WHERE id = :player_id 
      ";

      $stmt = $database->prepare($query);
      $stmt->execute(array(':player_id'=>$_SESSION['user_id']));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    catch (Exception $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }

    return $rows;
    
  }


  

  $user_data = queryDatabaseForUserInfo($db);

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
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./home.html">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="./yourGames.html">My Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./howto.html">How to Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./profile.html">Account</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-column align-items-center">
  
      <h1>Your account info:</h1>
      <?php
        foreach($user_data as $row)
        {
          echo "<p>Username: " . $row["username"] . "</p>\n";
          echo "<p>Display Name: " . $row["display_name"] . "</p>\n";
          echo "<p>Date Created: " . $row["date_created"] . "</p>\n";
        }
        
      ?>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input hidden value="true" id="logout" name="logout">
        <button type="submit" name="logoutBtn" id="logoutBtn" class="btn btn-danger">Logout</button>
      </form>

    </div>

      



  </body>
</html>