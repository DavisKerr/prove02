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
  <?php 
    $board = '
    * * * * * * * * * * /
    * * * * * * * * * * / 
    * * * * * * * * * * / 
    * * O * * X * * * * / 
    * * * * * V * * * * /
    * * O * * V * * * * / 
    * * * * * * * * * * / 
    * V V V V V * * * * /
    * * * * * * * * * * / 
    * * * * * * * * * * /
    ';
    $array = str_split($board);
    /*echo "<table>\n";
    echo "<tr>\n";
    for($i = 1; $i <= 10, $i++ )
    {
      echo "<th>" . $i . "/<th>\n";
    }

    echo "</table>\n";*/
  ?>
      



  </body>
</html>