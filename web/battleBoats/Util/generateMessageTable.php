<?php

  function generateMessageTable($messages)
  {
    $result = '';
    foreach($messages as $message)
    {
      $result .= "<p><strong>" . $message["display_name"] . "</strong>: " . $message["body"] . "</p>\n";
    }
    return $result;
  }

?>