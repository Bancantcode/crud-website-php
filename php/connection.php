<?php

$dbhost = "localhost";
$dbusername = "root"; 
$dbpass = ""; 
$dbname = "satoriDB"; 

$con = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>