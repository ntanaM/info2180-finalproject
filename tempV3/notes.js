// Coded by: Dana Archer

document.addEventListener("DOMContentLoaded", function(){

    const table = document.getElementById("result"); //gets result div from html


   // Add an event listener to the table
table.addEventListener("click", function(event) {
    
    const tar = event.target;

    
    if (tar.tagName.toLowerCase() === "td") {
        const row = tar.parentNode;
        const cellValue = row.cells[1].innerText;

        const request = new XMLHttpRequest();
        const url = `notes.php?query=${encodeURIComponent(cellValue)}`;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState === XMLHttpRequest.DONE){
                if(request.status === 200){
                    window.location.href = url;                   
                }
        }

    }
}
});




});