<?php
// Coded by: Dana Archer

$dbhost = "localhost";
$dbname = "dolphin";
$dbuser = "root";
$dbpass = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); // Establish connection to the server


if(!$conn){
    die("Connection failed. Reason: " . mysqli_connect_error()); //Shows error message if connection is failed 
}

