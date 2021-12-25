<?php

session_start();

function doSQL($sql)
{
  $testMsgs = false;
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database = "Y2Poject";

  $conn = mysqli_connect($servername, $username, $password, $database);

  $result = mysqli_query($conn, $sql);
  
  return $result;
}

function addStats($snakes,$ladders){

  $username = $_SESSION['username'];

  doSql("UPDATE Y2Poject SET games = games + 1 WHERE username = '" . $username . "'");
  doSql("UPDATE Y2Poject SET snakes = snakes + " . $snakes . " WHERE username = '" . $username . "'");
  doSql("UPDATE Y2Poject SET ladders = ladders + " . $ladders . " WHERE username = '" . $username . "'");

  return 0;

}

  if (isset($_POST['snakes'])) {
      echo addStats($_POST['snakes'],$_POST['ladders']);
  }
?>
