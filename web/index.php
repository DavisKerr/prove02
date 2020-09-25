<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="homestyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="homefunc.js"></script>
    <title>Exploring America</title>
  </head>
  <body>
    <div class="sidemenu" id="menu"> <!--Menu-->
      <a href="javascript:void(0)" id="closeBtn">&times;</a>
      <a href='#'>Link Name</a>
      <a href='#'>Link Name</a>
      <a href='#'>Link Name</a>
      <button id="timeBtn" onclick="">Display Time</button>
      <p id="timeStamp"></p>
    </div> <!--Menu-->
    <div id="openBtn">
      <a href="#"> <img src="Images/menuicon.png" alt="Open Menu"> </a>
    </div>
    <div class="flex-column" id="contentBody"> <!--Content Body-->
      <div class="jumbotron text-center"> <!--Header-->
        <h1>My favorite places in America</h1>
      </div> <!--Header-->

      <div class="info row-sm"> <!--Info Box1-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          <p>
            At spot number four we have "Mistborn." Mistborn is set apart from other fantasy series because it was
            one of the first mainstream series to utilize the "Hard" magic system. This means the magic in the fantasy
            world is clearly defined and adheres to particular rules. The rules are never broken, but new rules and ways
             of using the magic system are introduced over time. It also begins at the end of another, untold, story.
          </p>
        </div> <!--Text Box-->
        <div class="picBox col-sm-4"> <!--Pic Box-->
          <img src="Images/crystal_lake.jpg" id="pic">
        </div> <!--Pic Box-->
      </div> <!--Info box1-->

      <div class="info row-sm"> <!--Info Box2-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          About me text
        </div> <!--Text Box-->
        <div class="picBox col-sm-4"> <!--Pic Box-->
          <img src="Images/lake.jpg" id="pic">
        </div> <!--Pic Box-->
      </div> <!--Info box2-->

      <div class="info row-sm"> <!--Info Box3-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          About me text
        </div> <!--Text Box-->
        <div class="picBox col-sm-4"> <!--Pic Box-->
          <img src="Images/rigby.jpg" id="pic">
        </div> <!--Pic Box-->
      </div> <!--Info box3-->

      <div class="info row-sm"> <!--Info Box4-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          About me text
        </div> <!--Text Box-->
        <div class="picBox col-sm-4"> <!--Pic Box-->
          <img src="Images/waterfall.jpg" id="pic">
        </div> <!--Pic Box-->
      </div> <!--Info box4-->

      <footer>

      </footer>

      

    </div> <!--Content Body-->
  </body>
</html>