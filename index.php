<?php
session_start();
include("connection.php");
include("functions.php");
#$user_data = check_login($conn);


?>

<!DOCTYPE html>

<html>
    <head>
    <link href = "styles.css" rel = "stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <title>Dolphin Main</title>
    </head>
    <div id = "container">
    <body>
        <?php include 'header.php';?>

        <div class = "main">
            <main>
            <div class = "aside">
            <article>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li><a href = "logout.php">Logout</a></li>
                </ul>
                <hr>
            </article>
        </div>
        <div id = "mainContent">
                <h1>This is the main page</h1>
                <p>Welcome User</p>
                

</div>

                
            </main>
        </div>

        

        <div class = "footer">
            <footer>
            <p>Copyright @ 2024 Dolphin CRM <br>References <a href="https://www.flaticon.com/free-icons/dolphin" title="dolphin icons">Dolphin icons created by Freepik - Flaticon</a></p>
            </footer>
        </div>

    </body>

</div>
</html>