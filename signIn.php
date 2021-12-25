<?php 
  session_start();
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <title>Snakes and Ladders Sign In</title>
    <link rel="stylesheet" href="index.css" media="screen">
<link rel="stylesheet" href="signIn.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caesar+Dressing:400">
  </head>

<body class="u-body"><header class="u-clearfix u-custom-color-2 u-header u-header" id="sec-68dc"><div class="u-clearfix u-sheet u-sheet-1">
  <?php
    if (!isset($_POST['usernameIn']))
    { 
      getUserDetails();
    }
    else
      processUserDetails();
  ?>
</body>
</html>

<?php
function getUserDetails()
{
  $username = $psw = "";

  $regForm = '
      <a href="#" class="u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-font-courier-new u-hover-white u-radius-50 u-btn-1">Sign in</a>
      <h1 class="u-custom-font u-text u-title u-text-1">Snakes and Ladders</h1>
      <a href="register.php" class="u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-font-courier-new u-hover-white u-radius-50 u-btn-2">Register</a>
      <a href="LandingPage.php" class="u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-font-courier-new u-hover-white u-radius-50 u-btn-3">Home</a>
    </div></header>
    <section class="u-align-center u-clearfix u-custom-color-3 u-section-1" id="carousel_76ae">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h2 class="u-align-left u-custom-font u-font-courier-new u-text u-text-1">Sign in</h2>
      <div class="u-form u-form-1">
        <form action="#" method="POST" class="u-clearfix u-form-spacing-22 u-form-vertical u-inner-form" style="padding: 12px;" source="custom" name="form">
          <div class="u-form-group u-form-group-1">
            <label for="email-f2a8" class="u-custom-font u-font-courier-new u-label u-label-1">Username</label>
            <input type="text" placeholder="Enter username" id="email-f2a8" name="usernameIn" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-custom-font u-font-courier-new u-input u-input-rectangle" required="required">
          </div>
          <div class="u-form-group u-form-name u-form-group-2">
            <label for="name-f2a8" class="u-custom-font u-font-courier-new u-label u-label-2">Password</label>
            <input type="password" placeholder="Enter password" id="name-f2a8" name="pswIn" class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-custom-font u-font-courier-new u-input u-input-rectangle" required="">
          </div>
          <div class="u-align-center u-form-group u-form-submit u-form-group-3">
            <button type="submit" class="u-black u-btn u-btn-rectangle u-btn-submit u-button-style u-custom-font u-font-courier-new u-hover-white u-btn-1">Submit</a>
            <input type="submit" value="submit" class="u-form-control-hidden">
          </div>
          <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
          <div class="u-form-send-error u-form-send-message">Please try again. </div>
          <input type="hidden" value="" name="recaptchaResponse">
        </form>
      </div>
    </div>
    </section>


    <footer class="u-align-left u-clearfix u-footer u-grey-80 u-footer" id="sec-cede"><div class="u-clearfix u-sheet u-sheet-1"></div></footer>
    <section class="u-backlink u-clearfix u-grey-80"></section>
  ';

  echo($regForm);
}

function processUserDetails()
{
  $testMsgs = true;
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database = "Y2Poject";

  $conn = mysqli_connect($servername, $username, $password, $database);

  $frmUsername = $_POST['usernameIn'];
  $frmPsw = $_POST['pswIn'];

  $sql = "SELECT password FROM Y2Poject WHERE username = '$frmUsername'";
  $result = doSQL($sql);

  if($row = mysqli_fetch_array($result))
  {
    if(password_verify($frmPsw, $row['password']))
    {
      $_SESSION['user_logged_in'] = true;
      $_SESSION['username'] = $frmUsername;
      // JS redirection
      echo('<script>window.location.replace("mainMenu.php")</script>');
    }
    else
    {
      echo('<script>alert("Incorrect username or password!")</script>');
      echo('<script>window.location.replace("signIn.php")</script>');
    }
  }
  else
  {
    echo('<script>alert("Incorrect username or password!")</script>');
    echo('<script>window.location.replace("signIn.php")</script>');
  }
}

function doSQL($sql)
{
  $testMsgs = true;
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database = "Y2Poject";

  $conn = mysqli_connect($servername, $username, $password, $database);
  echo ("<p>$sql - ");

  if($result = mysqli_query($conn, $sql))
  {
    echo ("ok</p>");
  }
  else
  {
    echo ("bad</p>");
    die(mysqli_error($conn));
  }
return $result;
}

?>
