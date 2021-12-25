<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>

  <title>Snakes and Ladders</title>

  <meta charset="UTF-8">


  <link rel="stylesheet" type="text/css" href="menuStyles.css">

</head>

<body style="background-color:white;">
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
      <a href="gamePage.php"><button class="button button1">Play</button></a>
      <button class="button buttonselected">Rules</button>
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
      <h1> Game Rules </h1>
      <p>The rules are simple.</p>
      <p>The board consists of 100 squares and various ladders and snakes.</p>
      <p>If you land on a square that is the bottom of the ladder, you can move up the ladder and progress further.</p>
      <p>If you land on the head of a snake, you will have to travel down the snake and lose some spaces.</p>
      <p>There is also a few chance squares. If you land on this, a random action will occur - always good!</p>
      <p>Aside from this, all you need to do is roll the dice and move your counter that number of squares.</p>
    </main>


</body>

</html>
