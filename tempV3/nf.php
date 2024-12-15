<?php
namespace App\Utilities;
include("connection.php");

$query1 = $_GET['query'];
//checks to see if assignment matches set id 
if($query1){
    if($query1 === "assign"){
        $stmt = $conn -> prepare("update contacts set assigned_to = ? where id = ?");
        $stmt -> bind_param('ii',$_SESSION['id'], $id);

        if($stmt -> execute()){
            echo "Reassignment Successful";
        }

        else{
            echo "There was an error with your request";
        }
       


        
        

    }
    //changes role from Support to Sales lead and vice versa
    if($query1 ==="switch"){
        $new_type = "";
        if($type === "Support"){
            $new_type = "Sales Lead";
        }

        if($type === "Sales Lead"){
            $new_type = "Support";
        }


        $stmt = $conn -> prepare("update contacts set type = ? where id = ?");
        $stmt ->bind_param('si', $new_type, $id);

        if($stmt ->execute()){
            echo "Role Change Successful";
        }

        else{
            echo "There was an error with your request";
        }


    }
}

else{

    echo "No Query Found";
    echo $query1;
    echo "hello";

}


