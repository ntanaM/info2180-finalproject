<?php
// Coded by: Tara-Lee Donald

include("connection.php"); // Include connection

$link = "uauthorized.php";

if($_SESSION['role'] === "Admin"){
    $link = 'users.php';
}




?>

<html lang = "en">
    <head>
        <meta charset="utf-8">
        <title>DolphinCRM</title>

        <link href="nav_design.css" rel = "stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    </head>

    <aside>
        <img class= "navicons" src="home.png" alt="Home picture">
        <a href="index.php" class="navitext">Home</a>
        <br>

        <img class= "navicons" src="user.png" alt="User picture">
        <a href="contact.php" class="navitext">New Contact</a> 
        <br>
        <img class= "navicons" src = "group-user.png" alt="Group Contacts">
        <a href="<?= $link ?>" class="navitext">Users</a>


        <hr>

        <img class= "navicons" src="log-out.png" alt="Log out picture">
        <a href="logout.php" class="navitext">Logout</a>
    </aside>
</html>