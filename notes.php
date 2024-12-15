<?php
// Coded by: Dana Archer

session_start();
include("connection.php");
include("functions.php");
require('nf.php');
$user_data = check_login($conn);


?>

<?php

// Code to get contact data

$query = $_GET['query']; //fetch query

if($query){ // Execute query
    $stmt = $conn -> prepare("select id, title, firstname, lastname, email, telephone, company, type, assigned_to, created_At, updated_At from contacts where email = ? limit 1");
    $stmt ->bind_param("s",$query);
    $stmt ->execute();
    $result = $stmt->get_result();
    $contact_data = mysqli_fetch_assoc($result);
    $stmt->close();

    if($contact_data){ // Fetch contact data
        $id = $contact_data['id'];
        $name = $contact_data['title'] . " " . $contact_data['firstname'] . " " . $contact_data['lastname'];
        $email = $contact_data['email'];
        $telephone = $contact_data['telephone'];
        $company = $contact_data['company'];
        $assigned = $contact_data['assigned_to'];
        $created = $contact_data['created_At'];
        $updated = $contact_data['updated_At'];
        $type = $contact_data['type'];

        


        // Get User Name
        $stmt = $conn->query("SELECT firstname, lastname FROM users WHERE id = $assigned");
        $user = mysqli_fetch_assoc($stmt);
        $stmt->close();

        if($user){
            $assigned = $user['firstname'] . " " . $user['lastname'];
        }



    }
    
}





// Get Notes
$stmt = $conn->query("SELECT comment, created_by, created_at FROM notes WHERE contact_id = $id");
$notes = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
$stmt->close();




// Add Note
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $newNote = filter_var($_POST["noteInput"], FILTER_SANITIZE_STRING);

    $stmt = $conn -> prepare("INSERT INTO notes (contact_id, comment, created_by) VALUES (?, ?, ?)");
    $stmt -> bind_param('sss', $id, $newNote, $_SESSION['id']);
    
    if($stmt->execute()){
        echo "<script>alert('Note added successfully')</script>";
    }

    else{
        echo "<script>alert('Could not record: ' . mysqli_error($conn)</script>";
    }


}


?>


<!DOCTYPE html>

<html>
    <head>
        <link href = "notes_design.css" rel = "stylesheet">
        <script src = "notes2.js"></script>

        <meta charset="utf-8">
        <title>DolphinCRM</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">


    </head>

    <body>
        <?php include 'header.php'?>
        <main>

            <div id = "user">

            <div id = "result">
                <img id = "profile" src = "profile.png" alt="Profile picture slot">
                <h2> <?php echo $name?></h2>
                <h3 class = "subheading"><?php echo ("Created on $created by $assigned")  ?></h3>
                <h3 class = "subheading"><?php echo ("Update on $created by $assigned")  ?></h3>
            </div>

            <div id = "control">
            <button id = "assign" > <img src = "hand.png"> Assign to me </button>
            <button id = "switch"> <img src="switch.png"> Switch to lead </button>               

            </div>

            </div>

            <div id = "userInfo">

                <div id = "email">
                <label for = "email">Email</label>
                <p><?php echo $email?></p>
                 </div>

                
                <div id = "telephone">
                <label for = "telephone">Telephone</label>
                <p><?php echo $telephone ?></p>
                </div>

                
                <div id = "company">
                <label for = "company">Company</label>
                <p><?php echo $company ?></p>
                </div>

                
                <div id = "assigned to ">
                <label for = "assigned to">Assigned to</label>
                <p><?php echo $assigned ?></p>
                </div>

            </div>

            <div id = "notesSection">
                <h4><img src = "notes.png">Notes</h4>
                <hr>

                <div id = "notes">
                    <?php if($notes != null){
                    foreach($notes as $note){                    
                    $num = $note['created_by'];
                    $stmt = $conn->query("SELECT firstname, lastname FROM users WHERE id = $num");
                    $result = mysqli_fetch_assoc($stmt);
                    $Uname = $result['firstname'] . " " . $result["lastname"];
                    ?>
                    <h3><?= $Uname;?></h3>
                    <p><?= $note['comment'];?></p>
                    <p class = "created_at"><?= $note['created_at'];?></p>
                    <?php }}?>
                        
                </div>
                

            <div id = "noteForm">
                <form method = "post">
                    <label for = "noteInput"><?php echo ("Add a note about " . $name); ?></label>
                    <br>
                    <textarea name = "noteInput"></textarea>
                    <br>
                    <input value = "Add Note" type = "submit" name = "Add Note" id = "button">
                </form>
            </div>
            </div>


        </main>
        <?php include 'navbar.php'?>
    </body>
</html>