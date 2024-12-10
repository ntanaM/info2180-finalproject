<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($conn);



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){

    $query = "insert into users (firstname, lastname, password, email, role) values('$fname', '$lname', '$password', '$email', '$role')";

    if(mysqli_query($conn, $query)){ 
    echo "<script>alert('User added successfully')</script>";
    }

    else{
        echo "<script>alert('Could not record: ' . mysqli_error($conn)</script>";
    }

}

else{
    echo "<script>alert('All fields must be completed')</script>";
}


}


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
<?php include 'header.php'?>

<main>




<div class="userForm">
 <h2>New User</h2>

 <div class="form">
    <form method = "post">
        
    <div class = "input">
        <label for = "fname"> First Name </label>
        <input type = "text" name = 'fname' placeholder = "Jane"> 
    </div>
    <div class = "input">
        <label for = "lname"> Last Name </label>
        <input type = "text" name = 'lname' placeholder = "Doe"> 
    </div>
    <div class = "input">
        <label for = "email"> Email </label>
        <input type = "text" name = 'email' placeholder = "something@example.com"> 
    </div>
    <div class = "input">
        <label for = "password"> Password </label>
        <input type = "password" name = 'password'> 
    </div>
    <div class = "input">
        <select id = "roles" name = "role">
            <option value = "Admin">Admin</option>
            <option value = "Member">Member</option>
        </select>
</div>
    <div class = "input">
        <input type = "submit" value = "Add User" id = "button" name = "submit">
    </div>



</form>
 </div>



</div>

</main>

<?php include 'navbar.php';?>

<footer>


</footer>

</body>
</html>