<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!empty($email) && !empty($password)){
        $query = "select * from Users where email = '$email' limit 1";
        $result = mysqli_query($conn, $query);

        if($result){
            if($result && mysqli_num_rows($result) == 1){
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password){
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: index.php");
                    die;

                }

                else{
                    echo "<script>alert('Incorrect username or password');</script>";
                }
            }
        }

        
    }

    else{
        echo "Please enter some valid";
    }

}

//$user_data = check_login($conn)

?>

<!DOCTYPE html>
<html>
    <head>
        <link href = "login.css" rel = "stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <title>Dolphin Login</title>
    </head>

    <body>
        <header>
            <div class = "Header">
            <img src = "dolphin.png" alt = "Dolphin Logo" id = "dolphin">
                <h1>Dolphin CRM</h1>
            </div>

        </header>

        <main>
            <div id = "form">

            <form>

                <h1>Login</h1>
            
                <div class = "input">
                    <input type = "text" name = "email" placeholder = "email"> 
                </div>
                <div class = "input">
                    <input type = "password" name = "password" placeholder = "password"> 
                </div>
                <div class = "input">
                    <input type = "submit" value = "Login" id = "button" name = "submit">
                    <a href = "index.php">Login Temp </a>
                </div>


            </form>
            </div>

        </main>

        <footer>
            <p>Copyright @ 2024 Dolphin CRM <br>References <a href="https://www.flaticon.com/free-icons/dolphin" title="dolphin icons">Dolphin icons created by Freepik - Flaticon</a></p>
            

        </footer>
    </body>

</html>