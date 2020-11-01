<?php
  function generateMove($isTurn)
  {
    $form = '';
    if($isTurn)
    {
      $form .= "<h4>It's your turn! Where would you like to strike?</h4>";
      $form .= "<form id='moves' method='POST'";
      $form .= "<div>";
      $form .= "<label for='x-coord'>X-Coordinate:</label>";
      $form .= "<select name='x-coord' id='x-coord'>";
      for($i = 1; $i <= 10; $i++)
      {
        $form .= "<option value='" . $i . "'>" . $i . "</option>";
      }
      $form .= "</select>";
      $form .= "<label for='y-coord'>y-Coordinate:</label>";
      $form .= "<select name='y-coord' id='y-coord'>";
      for($i = 1; $i <= 10; $i++)
      {
        $form .= "<option value='" . $i . "'>" . $i . "</option>";
      }
      $form .= "</select><br>";
      $form .= "<span class='error' id='fireErr'></span><br>";
      $form .= "<button type='button' class='btn btn-danger' id='fireBtn'>Fire!</button>";
      $form .= "</div>";
      $form .= "</form>";
    }
    else
    {
      $form .= "<h4>It is not your turn right now. Check back again soon!</h4>";
    } 
    return $form;
  }
          
?>