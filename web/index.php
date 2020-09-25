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
      <button id="timeBtn" onclick="showDate()" class="btn btn-light">Display Date</button>
      <p id="timeStamp"></p>
    </div> <!--Menu-->
    <div id="openBtn">
      <a href="#"> <img src="Images/menuicon.png" alt="Open Menu"> </a>
    </div>
    <div class="flex-column" id="contentBody"> <!--Content Body-->
      <div class="jumbotron text-center"> <!--Header-->
        <h1>My favorite places near BYU-I</h1>
      </div> <!--Header-->

      <div class="info row-sm"> <!--Info Box1-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          <p>
            My yellowstone adventures led me to this crystal clear pond. This pond is so hot it 
            would kill anyone who touched it. It is important to note that the color is from acid. 
            It goes so deep down that you cannot see the fissure at the botom whre the water flows up from the hot spring.
            There is a walkway aound a few such pools. I think this particular one is my favorite because of how clear and deep it is.
            It makes me with that all water was that clear and blue. 
          </p>
        </div> <!--Text Box-->
        <div class="picBox col-sm-4"> <!--Pic Box-->
          <img src="Images/crystal_lake.jpg" id="pic">
        </div> <!--Pic Box-->
      </div> <!--Info box1-->

      <div class="info row-sm"> <!--Info Box2-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          <p>
            This is the opposite of the above picture. It is a more chromatic color of pool. It is also much larger.
            I took this picture from a vantage on a trail above the field of volcanic activity. I think the distance
            adds perspective as to what these kinds of fields look like. I think it is important to note that the hike was 
            really cool and leads to the last item on my list. 
          </p>
        </div> <!--Text Box-->
        <div class="picBox col-sm-4"> <!--Pic Box-->
          <img src="Images/lake.jpg" id="pic">
        </div> <!--Pic Box-->
      </div> <!--Info box2-->

      <div class="info row-sm"> <!--Info Box3-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          <p>
            This is the only place not in yellowstone. This is teh cress creek trail near rigby.
            The actual hike is very short and easy to walk. It is a small loop. When I go on this 
            trail, I do not stick to the trail. There are small game trails that go up at close to a 50 degree angle!
            Hiking up them is difficult, but you need to make the climb if you want this view from a rock shelf. 
            I would highly reccomend getting to the top, and away from the busy trail. There are some cool things to
            find if you are adventerous enough. Do not leave a trail unless you know how to get back though. 
          </p>
        </div> <!--Text Box-->
        <div class="picBox col-sm-4"> <!--Pic Box-->
          <img src="Images/rigby.jpg" id="pic">
        </div> <!--Pic Box-->
      </div> <!--Info box3-->

      <div class="info row-sm"> <!--Info Box4-->
        <div class="textBox col-sm-8"> <!--Text Box-->
          <p> 
            This hike in yellowstone is incredible. You may not be able to tell from the picture, but this waterfall
            is well over 100 feet tall! There is a pool below it that you can get in and stand close to the waterfall. It 
            does not matter how warm of a day it is, this spot is always cool. When it get's really cold, you don't want to get
            too close to the waterfall. Pictures will never do ths hike justice. It was a fun hike and you will find many people on it.
          </p>
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