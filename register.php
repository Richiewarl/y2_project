<?php 
  session_start();
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <title>Snakes and Ladders Register</title>
    <link rel="stylesheet" href="index.css" media="screen">
<link rel="stylesheet" href="register.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caesar+Dressing:400">
  </head>
  <body class="u-body"><header class="u-clearfix u-custom-color-2 u-header u-header" id="sec-68dc"><div class="u-clearfix u-sheet u-sheet-1">
  <?php
    if (!isset($_POST['username']))
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

  if (isset($_POST['username']))
  {
    $username = $_POST['username'];
    $psw = $_POST['psw'];
  }

  $regForm = "
        <a href='signIn.php' class='u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-font-courier-new u-hover-white u-radius-50 u-btn-1'>Sign in</a>
        <h1 class='u-custom-font u-text u-title u-text-1'>Snakes and Ladders</h1>
        <a href='#' class='u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-font-courier-new u-hover-white u-radius-50 u-btn-2'>Register</a>
        <a href='LandingPage.php' class='u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-font-courier-new u-hover-white u-radius-50 u-btn-3'>Home</a>
      </div></header>
      <section class='u-align-center u-clearfix u-custom-color-3 u-section-1' id='carousel_76ae'>
      <div class='u-clearfix u-sheet u-sheet-1'>
        <h2 class='u-align-left u-custom-font u-font-courier-new u-text u-text-1'>Register</h2>
        <div class='u-form u-form-1'>
          <form action='#' method='POST' class='u-clearfix u-form-spacing-22 u-form-vertical u-inner-form' style='padding: 12px;' source='custom' name='form'>
            <div class='u-form-group u-form-group-1'>
              <label for='email-f2a8' class='u-custom-font u-font-courier-new u-label u-label-1'>Username</label>
              <input type='text' placeholder='Enter username' id='email-f2a8' name='username' value='$username' class='u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-custom-font u-font-courier-new u-input u-input-rectangle' required='required'>
            </div>
            <div class='u-form-group u-form-name u-form-group-2'>
              <label for='name-f2a8' class='u-custom-font u-font-courier-new u-label u-label-2'>Password</label>
              <input type='password' placeholder='Enter password' id='name-f2a8' name='psw' value='$psw' class='u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-custom-font u-font-courier-new u-input u-input-rectangle' required='required'>
            </div>
            <div class='u-form-group u-form-group-3'>
              <label for='text-831a' class='u-custom-font u-font-courier-new u-label u-label-3'>Confirm Password</label>
              <input type='password' placeholder='Confirm password' id='text-831a' name='rePsw' class='u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-custom-font u-font-courier-new u-input u-input-rectangle u-input-3' required='required'>
            </div>
            <div class='u-align-center u-form-group u-form-submit u-form-group-4'>
              <button type='submit' class='u-black u-btn u-btn-rectangle u-btn-submit u-button-style u-custom-font u-font-courier-new u-hover-white u-btn-1'>Submit</a>
              <input type='submit' value='submit' class='u-form-control-hidden'>
            </div>
            <div class='u-form-send-message u-form-send-success'> Thank you! Your message has been sent. </div>
            <div class='u-form-send-error u-form-send-message'> Unable to send your message. Please fix errors then try again. </div>
            <input type='hidden' value='' name='recaptchaResponse'>
          </form>
        </div>
      </div>
      </section>


      <footer class='u-align-left u-clearfix u-footer u-grey-80 u-footer' id='sec-cede'><div class='u-clearfix u-sheet u-sheet-1'></div></footer>
      <section class='u-backlink u-clearfix u-grey-80'></section>
  ";

  echo($regForm);
}

function processUserDetails()
{ 
  $testMsgs = false;
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $database = "Y2Poject";

  $conn = mysqli_connect($servername, $username, $password, $database);

  $frmUsername = $_POST['username'];
  $frmPsw = $_POST['psw'];
  $frmRePsw = $_POST['rePsw'];

  if ($frmPsw != $frmRePsw)
  {
    echo ('<script>alert("Confirmation password does not match password! Try again!")</script>');
    getUserDetails();
  }
  else
  {
    $frmPsw = password_hash($frmPsw, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Y2Poject (username, password) VALUES ('$frmUsername', '$frmPsw')";
    $result = doSQL($conn, $sql, $testMsgs);

    if (strpos($result, 'Duplicate entry') !== false)
    {
      echo ('<script>alert("This username has been taken!")</script>');
      getUserDetails();
    }
    else {
      $_SESSION['user_logged_in'] = true;
      $_SESSION['username'] = $frmUsername;
      echo('<script>window.location.replace("mainMenu.php")</script>');
    }
    
  }
}

function doSQL($conn, $sql, $testMsgs)
{
  if($testMsgs) echo ("<br><code>SQL: $sql</code>");
  if ($result = $conn->query($sql))
  {
    if($testMsgs) echo ("<code> - OK</code>");
  }
  else
  {
    if($testMsgs) echo ("<code> - FAIL! " . $conn->error . " </code>");
    $result = $conn->error;
  }
  return $result;
}
?>
