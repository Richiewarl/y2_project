<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>

  <title>Snakes and Ladders</title>

  <meta charset="UTF-8">


  <link rel="stylesheet" type="text/css" href="menuStyles.css">

  <style>
    canvas {
      border:1px solid #d3d3d3;
      background-color: #f1f1f1;
    }
</style>


</head>

<body>
  <?php
  if (!isset($_SESSION['user_logged_in']))
  {
    echo('<script>window.location.replace("LandingPage.php")</script>');
  }
  ?>
    <header>
      <h1 style="line-height: 80px;">Snakes and Ladders</h1>
    </header>

    <aside>
      <button class="button buttonselected">Play</button>
      <a href="rules.php"><button class="button button2">Rules</button></a>
      <a href="scoreboard.php"><button class="button button3">Scoreboard</button></a>
      <a href="achievements.php"><button class="button button5">Achievements</button></a>
      <button class="button button7" id="logOutBtn"> Log Out as <?=$_SESSION['username']?> </button>

      <script type="text/javascript">
                document.getElementById("logOutBtn").onclick = function () {
                    location.href = "doSignOut.php";
                };
      </script>

    </aside>

    <main>

      <canvas id="board" width="960" height="540"></canvas>
      <br />



    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="game_scripts/ImageHandler.js"></script>

    <script src="game_scripts/Button.js"></script>
    <script src="game_scripts/Menu.js"></script>

    <script src="game_scripts/Square.js"></script>
    <script src="game_scripts/Board.js"></script>
    <script src="game_scripts/Game.js"></script>

    <script src="game_scripts/Main.js"></script>
    <script>

      var playerColours = [
        "rgb(255, 0, 0)",
        "rgb(0, 255, 0)",
        "rgb(0, 0, 255)",
        "rgb(255, 255, 0)",
        "rgb(255, 0, 255)",
        "rgb(0, 255, 255)"
      ];

      canvas = document.getElementById("board");
      ctx = canvas.getContext("2d");

      //set up game object and make the loop method loop
      const main = new Main();


      imageHandler = new ImageHandler(); // stuff for loading images before running

      imageHandler.addImage("res/menuBackground.png","background");

      for (var i = 1; i <= 100; i++){
        imageHandler.addImage("res/t" + i.toString() + ".PNG","t"+i.toString());
      }
      for (var i = 1; i <= 3; i++){
        imageHandler.addImage("res/l" + i.toString() + ".png","l"+i.toString());
        imageHandler.addImage("res/s" + i.toString() + ".png","s"+i.toString());
      }

      imageHandler.done();


      function printMousePos(event) { // get clicks on thr canvas
        main.click(event.offsetX,event.offsetY);
      }

      canvas.addEventListener("click", printMousePos);

   </script>



</body>

</html>
