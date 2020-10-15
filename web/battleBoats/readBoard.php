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
        $array = str_split($board);
        echo "<table class='" . $type . "'>\n";
        echo "<tr> <th colspan='11'><h3>" . $name . "</h3></th></tr>";
        echo "<tr>\n";
      echo "<td></td>";
        for($i = 1; $i <= 10; $i++ )
        {
          echo "<th>" . $i . "</th>\n";
        }
        
        echo "</tr>";
    
        $count = 1;
        foreach($array as $item)
        {
          if(!empty($item))
          {
            if($item == '/')
            {
              if($count != 1)
                {
                  echo "</tr>\n";
                }
    
              echo "<td>" . $count . "</td>";
              $count++;
            }
            elseif($item == '*')
            {
              echo "<td class='blankSpace'></td>";
            }
            elseif($item == 'V')
            {
              if($is_player_board)
                {
                  echo "<td class='shipSpace'></td>";
                }
                else
                {
                  echo "<td class='blankSpace'></td>";
                }
            }
            elseif($item == 'O')
            {
              echo "<td class='missSpace'></td>";
            }
            elseif($item == 'X')
            {
              echo "<td class='hitSpace'></td>";
            }
          }
        }
    
        echo "</tr>\n";
    
        echo "</table>\n";
  ?>
      



  </body>
</html>