<?php
session_start();
include("connection.php");
include("functions.php");
#$user_data = check_login($conn);


?>

<!DOCTYPE html>

<head>
<html lang="en">
<meta charset="UTF-8">
<title>Dolphin CRM</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="user.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">



<script src=""></script>

</head>

<body>

<header class="header">

    <h1>Dolphin CRM</h1>


</header>

<main>




<div class="userForm">
 <h2>New User</h2>

 <div class="form">
    <form>
        
    <div class = "input">
        <input type = "text" name = 'fname' placeholder = "Jane"> 
    </div>
    <div class = "input">
        <input type = "text" name = 'lname' placeholder = "Doe"> 
    </div>
    <div class = "input">
        <input type = "text" name = 'email' placeholder = "something@example.com"> 
    </div>
    <div class = "input">
        <input type = "password" name = 'password'> 
    </div>
    <div class = "input">
        <input type = "submit" value = "Login" id = "button" name = "submit">
    </div>


</form>
 </div>



</div>

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

<footer>


</footer>

</body>
</html>