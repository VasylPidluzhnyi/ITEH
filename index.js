let form = document.getElementById("login_form");
form.onsubmit = function() {
    let inpLogin = document.querySelector("form input[name='user_name']");
    let inpPass = document.querySelector("form input[name='password']");
    if (!inpLogin.value) {
        alert("User name is empty!");
        return false;
    }
    if (!inpPass.value){
        alert("Password is empty!");   
        return false;
    }
    return true;
}

let chbxShowPass = document.getElementById("chbxShowPass");
chbxShowPass.onclick = function() {
    let value = "password";
    
    if (this.checked) {
        value = "text";
    } 
    
    document.querySelector("form input[name='password']")      
            .setAttribute("type", value);
    
}