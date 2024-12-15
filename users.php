<?php

// Coded by: Ashle Johnson
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


<div id = "head">
<h2>Users</h2> 
<button id='user' >Add User</button>
</div>

<div class="box">



<div id="results">

     
<table id = user_table>

<thead id ="head_table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                </tr>
</thead>

<?php
                    include('connection.php');
                    $query = "SELECT * FROM Users"; // Query to get all users 

                    $results = mysqli_query($conn, $query);

                    foreach($results as $row):?>
                    <tbody id="body_table">
                        <tr>
                            <td><?=$row['firstname']." ".$row['lastname'];?></td>
                            <td><?=$row['email'];?></td>
                            <td><?=$row['role'];?></td>
                            <td><?=$row['created_at'];?></td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                    
            </table>







</div>

</main>

<?php include 'navbar.php';?>


</body>
</html>
