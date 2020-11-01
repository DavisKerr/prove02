function generateMoves()
{
  var moveForm = document.getElementById('moveForm');
  moveForm.innerHTML = moveForm.innerHTML + "<h4>It's your turn! Where would you like to strike?</h4>"
  echo "<form id='moves' method='POST' action=". htmlspecialchars($_SERVER["PHP_SELF"]) . ">";
  echo "<div>";
  echo "<label for='x-coord'>X-Coordinate:</label>";
  echo "<select name='x-coord' id='x-coord'>";'

}