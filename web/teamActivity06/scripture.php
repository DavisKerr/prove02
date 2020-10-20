<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

function insertScripture($db, $book, $chapter, $verse, $content)
{
	$statement = $db->prepare('INSERT INTO Scripture(Book, Chapter, Verse, Content) VALUES(:book, :chapter, :verse, :content)');
	$statement->execute(array(':book' => $book, ':chapter' => $chapter, ':verse' => $verse, ':content' => $content));
}

function insertScriptureTopic($db, $scripture, $topic)
{
	$statement = $db->prepare('INSERT INTO scripturetopic(scriptureid, topicid) VALUES(:scripture, :topic)');
	$statement->execute(array(':scripture' => $scripture, ':topic' => $topic));
}

function insertNewTopic($db, $topic)
{
	$statement = $db->prepare('INSERT INTO topic(topicname) VALUES(:topic)');
	$statement->execute(array(':topic' => $topic));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	insertScripture($db, $_POST['book'], $_POST['chapter'], $_POST['verse'], $_POST['content']);

	$lastScripture = $db->lastInsertId('scripture_scriptureid_seq');

	foreach ($_POST['topics'] as $topic) {
		insertScriptureTopic($db, $lastScripture, $topic);
  }
  
  if(isset($_POST["newTopic"]))
  {
    insertNewTopic($db, $_POST["newTopic"]);
    $lastTopic = $db->lastInsertId('topic_id_seq');
    insertScriptureTopic($db, $lastScripture, $lastTopic);
  }
	
	/*header("location: ./ScriptureDetails.php?scriptureid=" . $lastScripture);
  exit;*/
}

?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Scripture</title>
</head>
<body>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="scriptureForm">
		<label for="book">Book</label>
		<input type="text" name="book" id="book"><br>

		<label for="chapter">Chapter</label>
		<input type="text" name="chapter" id="chapter"><br>

		<label for="verse">Verse</label>
		<input type="text" name="verse" id="verse"><br>

		<label for="content">Book</label>
		<textarea id="content" name="content" rows="4" cols="50"></textarea><br>

		<?php

			foreach ($db->query('SELECT topicname, id FROM topic') as $row)
			{
				echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '" id="' . $row['topicname'] . '">';
				echo '<label for="' . $row['topicname'] . '">' . $row['topicname'] . '</label><br>';
      }
      
		?>

    <input type="checkbox" name="isnewTopic" id="isnewTopic" value="1" onchange="addTopic();">
    <label for="newTopic">Other</label><br>

    <span id="topicform"></span>

		<input type="submit" name="submit">

  </form>
  <div>
    <h1>Scripture List:</h1>
    <?php 

    foreach ($db->query('SELECT scriptureid, book, chapter, verse, content FROM scripture') as $row)
    {
      echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"';
      echo '<p/>';

      $stmt = $db->prepare('SELECT t.topicname
      FROM topic AS t 
      INNER JOIN scripturetopic AS st 
      ON st.topicid = t.id
      WHERE st.scriptureid = :scripture;');
      $stmt->bindValue(':scripture', $row['scriptureid'], PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($rows as $topic){
          echo $topic['topicname'] . "<br>";
      }
    }


    ?>
  </div>
    <script>
      function addTopic()
      {
        var item = document.getElementById("isnewTopic");
        area = document.getElementById("topicform");
        if(item.checked)
        {
          area.innerHTML = "<label for='newTopic'> Specifiy: </label> ";
          area.innerHTML += "<input type='text' id='newTopic' name='newTopic'><br>";
        }
        else
        {
          area.innerHTML = "";
        }
      }

/* attach a submit handler to the form */
$("#scriptureForm").submit(function(event) {

/* stop form from submitting normally */
event.preventDefault();

/* get the action attribute from the <form action=""> element */
var $form = $(this),
  url = $form.attr('action');

/* Send the data using post with element id name and name2*/
var posting = $.post(url, {
  name: $('#name').val(),
  name2: $('#name2').val()
  name: $('#name').val(),
  name2: $('#name2').val()
});

/* Alerts the results */
posting.done(function(data) {
  $('#result').text('success');
});
posting.fail(function() {
  $('#result').text('failed');
});
});
    </script>
  </body>
</html>