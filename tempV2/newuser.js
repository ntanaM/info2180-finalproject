document.addEventListener("DOMContentLoaded", function(){
    const button = document.getElementById("user");


    function newUser(){
        window.location.href = "newUser.php";
    }


    button.addEventListener("click", newUser);

});