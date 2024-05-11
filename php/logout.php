<?php

session_start();

//If this file is called, then all sessions must be unset so that they are logged out.
if(isset($_SESSION['user_type'])){
    unset($_SESSION['user_type']);
    unset($_SESSION['logged_in']);
    $_SESSION['user_type'] = ""; //Sets user type to empty so that header wont have a problem or displays user_type invalid
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
}

header("Location: ../login.php");
die;