<?php

// Coded by: Dana Archer

session_start(); //starts session

include("connection.php"); 
include("functions.php");

header("HTTP/1.0 403 Forbidden"); //Shows this if a user is not authorized to enter the webpage