<?php 
  function readBoard($board, $type, $name, $is_player_board)
  {
    $finalBoard = '';
    $array = str_split($board);
    $finalBoard .= "<table class='" . $type . "'>\n";
    $finalBoard .= "<tr> <th colspan='11'><h3>" . $name . "</h3></th></tr>";
    $finalBoard .= "<tr>\n";
    $finalBoard .= "<td></td>";
    for($i = 1; $i <= 10; $i++ )
    {
      $finalBoard .= "<th>" . $i . "</th>\n";
    }
    
    $finalBoard .= "</tr>";

    $count = 1;
    foreach($array as $item)
    {
      if(!empty($item))
      {
        if($item == '/')
        {
          if($count != 1)
            {
              $finalBoard .= "</tr>\n";
            }

            $finalBoard .= "<td>" . $count . "</td>";
          $count++;
        }
        elseif($item == '*')
        {
          $finalBoard .= "<td class='blankSpace'></td>";
        }
        elseif($item == 'V')
        {
          if($is_player_board)
            {
              $finalBoard .= "<td class='shipSpace'></td>";
            }
            else
            {
              $finalBoard .= "<td class='blankSpace'></td>";
            }
        }
        elseif($item == 'O')
        {
          $finalBoard .="<td class='missSpace'></td>";
        }
        elseif($item == 'X')
        {
          $finalBoard .= "<td class='hitSpace'></td>";
        }
      }
    }

    $finalBoard .= "</tr>\n";

    $finalBoard .= "</table>\n";

    return $finalBoard;
  }
      
?>
      