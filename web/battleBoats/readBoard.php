<?php 
/*$board = '
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
$array = str_split($board);*/
echo "<table>\n";
echo "<tr>\n";
for($i = 1; $i <= 10, $i++ )
{
  echo "<th>" . $i . "/<th>\n";
}

echo "</table>\n"



?>