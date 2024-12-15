<?php
// Coded by: Dana Archer

session_start();

include("connection.php"); // Include connection
include("functions.php"); // Include function for checking connection
$user_data = check_login($conn);

?>

<?php
$query = "select * from users";
$users = mysqli_query($conn, $query);

if(!$users){
    die("Failed to load users ". mysqli_error($conn));
}



?>


<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $regex = "/^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/";


    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
    $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);

    foreach($users as $user){
        $name = $user['firstname'] . ' ' . $user['lastname'];
        if (filter_var($_POST['assigned'], FILTER_SANITIZE_STRING) === $name){
            $assigned = $user['id'];
        }
    }
    $current_user = $_SESSION['id'];

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($telephone) && !empty($company) && ctype_digit($telephone) && preg_match($regex, $email)){

    $stmt = $conn -> prepare("insert into contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt -> bind_param("sssssssii", $title, $fname, $lname, $email, $telephone, $company, $type, $assigned, $current_user);

    if($stmt -> execute()){ 
    echo "<script>alert('User added successfully')</script>";
    }

    elseif(!ctype_digit($telephone)){
        echo "<script>alert('Invalid Phone Number')</script>";

    }

    elseif(!preg_match($regex, $email)){
        echo "<script>alert('Invalid Email Address')</script>";
        
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

<link rel="stylesheet" href="newUser.css">

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
            <option value = "Mr">Mr</option>
            <option value = "Mrs">Mrs</option>
            <option value = "Ms">Ms</option>
        </select>
</div>
        
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
        <label for = "telephone"> Telephone </label>
        <input type = "text" name = 'telephone' required> 
    </div>
    <div class = "input">
        <label for = "company"> Company </label>
        <input type = "text" name = 'company' required> 
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
        <?php foreach($users as $user): ?>
        <option><?php echo($user['firstname'] . ' ' . $user['lastname']); ?></option> <?php endforeach; ?>
        </select>
</div>
    <div class = "input">
        <input type = "submit" value = "Add Contact" id = "button" name = "submit">
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