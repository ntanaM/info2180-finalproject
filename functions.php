<?php
// Coded by: Dana Archer

function check_login($conn){ //Ensures that a User is Logged into the system
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query = "select * from users where email = '$email' limit 1"; //Query to get session user

        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);

            return $user_data;

        }
    }

    else{
        //redirect to login
    header("Location: login.php"); // If user is not logged in, they are redirected to the login page.
    die;
    }
}