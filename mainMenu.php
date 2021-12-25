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
      <h1>Hello <?=$_SESSION['username']?>!</h1>
    </main>

</body>

</html>
