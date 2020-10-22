<?php 
        
        $board = $board[0];
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
      