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
      <a href="scoreboard.php"><button class="button button3">Scoreboard</button></a>
      <button class="button buttonselected">Achievements</button>
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

$sql = "SELECT games,snakes,ladders FROM Y2Poject WHERE username = '" . $_SESSION['username'] . "'";
$records = $conn->query($sql); // GET STATS


$row = $records->fetch_assoc();

  $games = $row['games'];
  $snakes = $row['snakes'];
  $ladders = $row['ladders'];

if ($ladders == 0){
  $luck = 0;
} else {
  $luck = floor(100 * $ladders / ($snakes + $ladders));
}

echo "<h2>" . $_SESSION['username'] . "'s stats:</h2>"; // DISPLAY STATS!!!!!!!!!!!!!!!!!!!!!!!!!
echo "<h3>Games played : " . $games . "</h3>";      // MAKE ME MORE PRETTY!!!!!!!!!!!!!!!!!!!!!!!!!
echo "<h3>Snakes hit : " . $snakes . "</h3>";
echo "<h3>Ladders climbed : " . $ladders . "</h3>";
echo "<h3>Luck : " . $luck . "% </h3>";


?>

</main>

</body>

</html>
