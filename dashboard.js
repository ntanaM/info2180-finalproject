document.addEventListener('DOMContentLoaded', (e)=>{
    var table = document.getElementById(cust_table);

    for(var i = 1; i<table.ariaRowCount;i++){
        var cell = table.rows[i].cells[3];

        if(cell.textContent == "SUPPORT"){
            cell.style.backgroundColor = "blue";
        }
    }
});