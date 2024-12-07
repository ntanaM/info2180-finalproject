<?php
session_start();
include("connection.php");
include("functions.php");
#$user_data = check_login($conn);


?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <title>DolphinCRM</title>

        <link href="dash_design.css" rel = "stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    </head>

    <body>
        <header>
            <h1>DolphinCRM</h1>
        </header>       

        <main>
            <div id = "head">
                <h2>Dashboard</h2>
                <button href = "New_User.html">+  Add Contact</button>
            </div>
            <div id = "filterOp">
                <p class = "filter" id="function">Filter By: </p>
                <p class = "filter">All</p>
                <p class = "filter">Sales Leads</p>
                <p class = "filter">Support</p>
                <p class = "filter">Assigned to me</p>
            </div>

            
            <table id = cust_table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                </tr>
            </table>

        </main>
        <aside>
            <div id= "navBar">
                <p><a href = "index.php">Home </a></p>
                <p> <a href = "newUser.php">New Contact </a></p>
                <p> <a href = "users.php"> Users </a> </p>
                <hr>
                <p> <a href = "login.php">Logout </a></p>  <!--To be changed to logout when login is fixed-->
            </div>
        </aside>
    </body>

</html>