<?php
	session_start();
    unset($_SESSION['user_logged_in']);
    unset($_SESSION['username']);
    echo('<script>window.location.replace("LandingPage.php")</script>');
?>