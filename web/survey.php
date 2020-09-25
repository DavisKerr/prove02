<?php
$datafile = fopen("data.txt", "r+");
$datatxt = fread($datafile, filesize("data.txt"));
$data = json_decode($datatxt);

$student = 0;

if($GET["student"] == "yes")
{
  $student = 1;
}

$times_visited = $GET["quantity"];
$hiking = 0;
if($GET["hiking"] == "yes")
{
  $student = 1;
}
$json_code = array("Student"=> $data[0] + $student, "Times_Visited"=> $data[1] + $times_visited, "Hiking"=> $data[2] + $hiking);
$toSave = json_encode($json_code);
fwrite($datafile, $toSave);
fclose($datafile)

echo $toSave;

?>