document.addEventListener("DOMContentLoaded", function(){
    // Get elements
    const assignButton = document.getElementById("assign");
    const switchButton = document.getElementById("switch");

    //Attaches assign button to notes.php
    function assignListener(){ 
        const request = new XMLHttpRequest();
        const url = `notes.php?query=assign`;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState === XMLHttpRequest.DONE){
                if(request.status === 200){
                    let response = request.responseText;
                    console.log(response);
                    window.location.href = url;                   
                }
        }

        }

    }
    //Attachs switch button to notes.php
    function switchListener(){
        const request = new XMLHttpRequest();
        const url = `notes.php?query=switch`;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState === XMLHttpRequest.DONE){
                if(request.status === 200){
                    let response = request.responseText;
                    console.log(response);
                    window.location.href = url;                   
                }
        }

        }

    }

    assignButton.addEventListener("click", assignListener); //Adds click function to assign button
    switchButton.addEventListener("click", switchListener); //Adds click function to switch button



});