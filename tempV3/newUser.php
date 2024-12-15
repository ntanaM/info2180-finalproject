<?php

// Coded by: Dana Archer
session_start();

include("connection.php"); // Include connection
include("functions.php");
$user_data = check_login($conn);



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $regex = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/";



    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING) ;
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $role = $_POST['role'];

    

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){

        if(preg_match($regex, $password)){

            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn -> prepare("insert into users (firstname, lastname, password, email, role) values(?, ?, ?, ?, '$role')");
            $stmt -> bind_param('ssss', $fname, $lname, $password, $email);
    

            if($stmt -> execute()){ 
                echo "<script>alert('User added successfully')</script>";
            }

            else{
                echo "<script>alert('Could not record: ' . mysqli_error($conn)</script>";
            }

        }

        else{

            echo "<script>alert('Not a valid password. Password must be at least 8 digits long, and include at least 1: lowercase letter, uppercase letter and 1 digit.')</script>";
            
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

<link rel="stylesheet" href="newUser.css">

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
        <input type = "text" name = 'fname' placeholder = "Jane" required> 
    </div>
    <div class = "input">
        <label for = "lname"> Last Name </label>
        <input type = "text" name = 'lname' placeholder = "Doe" required> 
    </div>
    <div class = "input">
        <label for = "email"> Email </label>
        <input type = "text" name = 'email' placeholder = "something@example.com" required> 
    </div>
    <div class = "input">
        <label for = "password"> Password </label>
        <input type = "password" name = 'password' required> 
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