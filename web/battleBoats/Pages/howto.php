<!DOCTYPE html>
<html lang="en-US">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./home.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="./yourGames.php">My Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./howto.php">How to Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./profile.php">Account</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page_body" class="d-flex flex-column align-items-center">
      <h1>How to play</h1>
      <div id="rules">
        <h3>Joining a game</h3>
        <p>
          Joining a game can be done in one of two ways:
          <ol>
            <li>Clicking on the 'Join Game' Button of a pending public game on the home screen.</li>
            <li>
              Obtaining a code from the owner of a private game and entering it in to the private game search bar.
              Then click the 'Join Game' Button. 
            </li>
          </ol>
        </p>
        <h3> Creating a game </h3>
        <p>
          Creating a game is simple. Go to the tab marked "My Games," and scroll to the bottom. <br>
          Enter a game name and click create for a public game. If you wish to make the game
          private, simply check the box and enter the game search code you desire. Then click the
          create game button. 
        </p>
        <h3> Playing the Game </h3>
        <p>
          In Battle Boats, both you and your opponent have 5 ships on a grid of lengths 2, 3, 3, 4, and 5. These
          ships are randomly placed upon game creation. You must destroy every one of the other player's ships by guessing
          one grid space at a time. You take turns guessing. A grey square on your board means that is where a ship 
          segment is located. A yellow square on your board means your opponent fired and missed. If there is a yellow square on
          your opponent's board, it means you fired and missed. If there is a red square on your board, it means your opponent hit one 
          of your ships! If there is a red square on your opponent's board, it means you fired and hit! You must score 17 hits to win!
          When it is your turn, simply select the X and Y coordinates you desire to fire at and hit the "FIRE!" button.  
        </p>
      </div>
      

      

    </div>

      



  </body>
</html>