document.addEventListener("DOMContentLoaded", function(){
    // Get elements
    const assignButton = document.getElementById("assign");
    const switchButton = document.getElementById("switch");

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

    assignButton.addEventListener("click", assignListener);
    switchButton.addEventListener("click", switchListener);



});