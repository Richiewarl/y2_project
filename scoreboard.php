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


  function doScoreTable($value,$conn){ // function for drawing tables

    $sql = "SELECT username,$value FROM Y2Poject ORDER BY $value DESC LIMIT 3";
    $records = $conn->query($sql); // GET STATS

    $output = "<table id='scoreboards'>
          <th>name</th>
          <th>$value</th>";

    // Enter data into respective columns
    while ($row = $records->fetch_assoc())            // DRAWIN THE TABLE
    {
      $output .= "<tr>
              <td>$row[username]</td>
              <td>$row[$value]</td>
            </tr>";
    }

    $output .= "</table><br>";
    // Output table
    echo ($output);

  }

  // Function to connect to DB and output errors
  function doSQL($conn, $sql, $testMsgs)
  {
    if($testMsgs)
    {
      echo ("<br><code>SQL: $sql</code>");
      if ($result = $conn->query($sql))
        echo("<code> - OK</code>");
      else
        echo ("<code> - FAIL! " . $conn->error . " </code>");
    }
    else
      $result = $conn->query($sql);
    return $result;
  }

  ?>



    <header>
      <h1 style="line-height: 80px;">Snakes and Ladders</h1>
    </header>

    <aside>
      <a href="gamePage.php"><button class="button button1">Play</button></a>
      <a href="rules.php"><button class="button button2">Rules</button></a>
      <button class="button buttonselected">Scoreboard</button>
      <a href="achievements.php"><button class="button button5">Achievements</button></a>
      <button class="button button7" id="logOutBtn"> Log Out as <?=$_SESSION['username']?> </button>

      <script type="text/javascript">
                document.getElementById("logOutBtn").onclick = function () {
                    location.href = "doSignOut.php";
                };
      </script>

    </aside>

    <main>

      <?php

      $testMsgs = false; //true = On, false = Off TRY TO CONNECT TO DATABASE
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $database = "Y2Poject";

      // Create Connection
      $conn = mysqli_connect($servername, $username, $password, $database);

      // Check Connection
      if (!$conn)
      {
        die("Connection failed: " . mysqli_connect_error());
      }

      doScoreTable('games',$conn);
      doScoreTable('snakes',$conn);
      doScoreTable('ladders',$conn);

      ?>

    </main>




</body>

</html>
