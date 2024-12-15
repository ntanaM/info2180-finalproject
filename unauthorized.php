<?php

// Coded by: Dana Archer

session_start();

include("connection.php");
include("functions.php");

header("HTTP/1.0 403 Forbidden"); // If user is not an Admin, they will be redirected to this page