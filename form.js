let chbxShowPass = document.getElementById("5");
chbxShowPass.checked = true;

chbxShowPass.onclick = function() {
    let value = "password";
    
    if (this.checked) {
        value = "text";
    } 
    
    document.querySelector("form input[name='pwd']")      
            .setAttribute("type", value);
    
}