<?php
// Coded by: Dana Archer
session_start();

if(isset($_SESSION['id'])){ // Logs user out of the system, and destroys the active session.
    session_unset();
    session_destroy();

}

header("Location: login.php");