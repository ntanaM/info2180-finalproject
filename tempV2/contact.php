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

<?php
$query = "select * from users";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Failed to load users ". mysqli_error($conn));
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

<?php include 'header.php';?>   

<main>




<div class="userForm">
 <h2>New Contact</h2>

 <div class="form">
    <form method = "post">
    <div class = "input">
        <select id = "title" name = "title">
            <option value = "Admin">Mr</option>
            <option value = "Member">Mrs</option>
            <option value = "Member">Ms</option>
        </select>
</div>
        
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
        <label for = "telephone"> Telephone </label>
        <input type = "text" name = 'telephone'> 
    </div>
    <div class = "input">
        <label for = "company"> Company </label>
        <input type = "text" name = 'company'> 
</div>
<div class = "input">
        <label for = "type"> Type </label>
        <select id = "type" name = "type">
            <option value = "Sales Lead">Sales Lead</option>
            <option value = "Support">Support</option>
        </select>
</div>
<div class = "input">
        <label for = "assigned"> Assigned To </label>
        <select id = "assigned" name = "assigned">
           <option>Ashle Johnson</option>
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