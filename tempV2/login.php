<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM Users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result);
                
            if ($user_data['password'] === $password) {
                $_SESSION['email'] = $user_data['email'];
                header("Location: index.php");
                die;
            } else {
                echo "<script>alert('Incorrect username or password');</script>";
            }
        } else {
            echo "<script>alert('Incorrect username or password');</script>";
        }
    } else {
        echo "<script>alert('Please enter a valid email and password');</script>";
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
    <title>Dolphin Login</title>
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
                <h1>Login</h1>
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
