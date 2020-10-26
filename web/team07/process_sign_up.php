<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

function console_log( $data ){  echo '<script>';    echo 'console.log("'. $data .'")';    echo '</script>';    }


print_r($_SESSION);
if (!empty($_POST)) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $db->prepare('INSERT INTO team_user (username, userpassword) VALUES (:username, :userpassword)');
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':userpassword', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();

        echo 'true';
        //header('Location: sign-in.php');
        //die();
    }
    catch(PDOException $e) {
        echo "Error: ".$e->getMessage();
    }   
}
?>