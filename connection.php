<?php
$dbhost = "localhost";
$dbname = "dolphincrm";
$dbuser = "root";
$dbpass = "";

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    die("failed to connect");
}

