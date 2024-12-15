<?php
// Coded by: Dana Archer
session_start();

include("connection.php"); // Include connection and functions php
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") { // Code to check login credentials.
    // Something was posted
    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $hash = password_hash($password, PASSWORD_DEFAULT); //Hashes password entered by user

    if (!empty($email) && !empty($password)) {
        $stmt = $conn -> prepare("SELECT * FROM Users WHERE email =? LIMIT 1 ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result);
            //checks to see if the password matches one in database 
            if ($user_data['password'] === $password || password_verify($password, $hash)) {
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['username'] = $user_data['firstname'] . $user_data['lastname'];
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['role'] = $user_data['role'];
                
                header("Location: index.php");
                die;
            } else {
                echo "<script>alert('Incorrect username or password');</script>"; //Shows alert if username or password doesn't match
            }
        } else {
            echo "<script>alert('Incorrect username or password');</script>"; 
        }
    } else {
        echo "<script>alert('Please enter a valid email and password');</script>"; //Shows alert is password or email is invalid 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="login.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <title>Dolphin Login</title> <!--- Login page for the website -->
</head>
<body>
    <header>
        <div class="Header">
            <img src="dolphin.png" alt="Dolphin Logo" id="dolphin">
            <h1>Dolphin CRM</h1>
        </div>
    </header>
    <main>
        <div id="form">
            <form method="post">
                <h1>Login</h1> <!--Displays login page ( email, password and submit button )-->
                <div class="input">
                    <input type="text" name="email" placeholder="Email"> 
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Password"> 
                </div>
                <div class="input">
                    <input type="submit" value="Login" id="button" name="submit">
                    
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2024 Dolphin CRM <br>References <a href="https://www.flaticon.com/free-icons/dolphin" title="dolphin icons">Dolphin icons created by Freepik - Flaticon</a></p>
    </footer>
</body>
</html>
