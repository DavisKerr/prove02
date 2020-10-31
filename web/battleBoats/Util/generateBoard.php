<?php


  function checkValidSpaces($occupiedSpaces, $number)
  {
    foreach($occupiedSpaces as $space)
      {
        if($number == $space)
          {
            return FALSE;
          }
      }
      
      return TRUE;
  }

  function generateSpace($len, $occupiedSpaces)
  {
    $valid = FALSE;
    while(!$valid)
    {
      $finalNumbers = array();
      $start = rand(1,100);
      if(checkValidSpaces($occupiedSpaces, $start))
      {
        array_push($finalNumbers, $start);
      }
      else
      {
        continue;
      }
      $direction = rand(1, 4);
      for($i = 1; $i <= $len; $i++)
      {
        if($direction == 1)
        {
          $newNum = $start + $i;
          if($newNum % 10 == 0 && $i < $len + 1)
          {
            break;
          }
          else
          {
            if(checkValidSpaces($occupiedSpaces, $newNum))
            {
              array_push($finalNumbers, $newNum);
            }
            else
            {
              break;
            }
          }
        }
        elseif($direction == 2)
        {
          $newNum = $start - $i;
          if(($newNum) % 10 == 0)
          {
            break;
          }
          else
          {
            if(checkValidSpaces($occupiedSpaces, $newNum))
            {
            array_push($finalNumbers, $newNum);
            }
            else
            {
              break;
            }
          }
        } 
        elseif($direction == 3)
        {
          $newNum = $start + $i * 10;
          if($newNum > 100)
          {
            break;
          }
          else
          {
            if(checkValidSpaces($occupiedSpaces, $newNum))
            {
              array_push($finalNumbers, $newNum);
            }
            else
            {
              break;
            }
          }
        } 
        elseif($direction == 4)
        {
          $newNum = $start - $i * 10;
          if($newNum <= 0)
          {
            break;
          }
          else
          {
            if(checkValidSpaces($occupiedSpaces, $newNum))
            {
              array_push($finalNumbers, $newNum);
            }
            else
            {
              break;
            }
          }
        } //
      } 

      if(sizeof($finalNumbers) == $len)
      {
      $valid = TRUE;
      $occupiedSpaces = array_merge($occupiedSpaces, $finalNumbers);
      }
    }
    return $occupiedSpaces;
  }

  function getBoard()
  {
    $occupiedSpaces = array();
    $occupiedSpaces = generateSpace(5, $occupiedSpaces);
    $occupiedSpaces = generateSpace(4, $occupiedSpaces);
    $occupiedSpaces = generateSpace(3, $occupiedSpaces);
    $occupiedSpaces = generateSpace(3, $occupiedSpaces);
    $occupiedSpaces = generateSpace(2, $occupiedSpaces);
    sort($occupiedSpaces);
    $board = generateBoard($occupiedSpaces);
    return $board;
  }


  function generateBoard($occupiedSpaces)
  {
    $board = "/";
      $counter = 0;
    for($i=1; $i <= 100; $i++)
      {
        if($occupiedSpaces[$counter] == $i)
          {
            $board .= "V";
              $counter++;
          }
          else
          {
            $board .= "*";
          }
          
          if($i % 10 == 0 && $i != 100)
          {
            $board .= "/";
          }
      }
      return $board;
  }

?> 
