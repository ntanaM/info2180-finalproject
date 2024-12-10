<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($conn);


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
<script src= "newuser.js"></script>
</head>

<body>

<?php include 'header.php';?>   

<main>




<div class="Users">
 <h2>Users</h2>

 <div class="box"></div>

</div>

<div id="results">

</div>

</main>

<button id = "user">New User</button>

<?php include 'navbar.php';?>
<footer>


</footer>

</body>
</html>