function chbxOnChange() {
    let value = false;
    if (this.checked) {
        value = true;
    }
    
    let rows =
        document.getElementsByTagName("table")[0]
        .getElementsByTagName("tr");

    for (let i = 0; i < rows.length; ++i) {
        let cells = rows[i].getElementsByTagName("td"); 
        cells[3].hidden = value;
        cells[4].hidden = value;
        cells[5].hidden = value;
        
        if ("hide1" == this.getAttribute("id")) {
            cells[1].hidden = value;
            cells[2].hidden = value;
        }
    }
}

document.getElementById("hide1")
        .onclick = chbxOnChange;
document.getElementById("hide2")
        .onclick = chbxOnChange;