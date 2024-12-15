<?php
// Coded by: Dana Archer

$dbhost = "localhost"; // Host
$dbname = "dolphincrm"; // Database Name
$dbuser = "root"; // User
$dbpass = ""; // Password

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); // Establish connection to the server


if(!$conn){
    die("Connection failed. Reason: " . mysqli_connect_error());
}

