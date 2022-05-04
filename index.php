<?php
session_start();

if (array_key_exists("auth_success", $_SESSION) 
        && $_SESSION["auth_success"] == "yes") {
    header("Location: ./table.php");
    exit();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accounts</title>
    <link href="style.css" rel="stylesheet">
    <link href="red-button.css" rel="stylesheet">
    <script src="index.js" defer></script>
<style>
div.container {
    text-align: center;   
}
#login_form > fieldset {
	display: inline;
}

#login_form > input[type=submit] {
	margin-top: 5px;
}   
    
</style>
</head>

<body>
    <h1>Authorise to see accounts data</h1>
<div class="container">
    <form id="login_form" method="post" action="handler.php">
	<fieldset >
		<legend>User name</legend>
		<input name="user_name" type="text"><br/>
	</fieldset><br/>
	<fieldset>
		<legend>Password</legend>
		<input type="password" name="password"/>
    	<br>
    	<input type="checkbox" id="chbxShowPass">
	    <label for="chbxShowPass">Show password</label>
	</fieldset><br/>
    
	<input type="submit" name="submit" value="Log in" 
	        class="like-red-button" id="btnLogIn">								
    </form>
</div>
    <h1>
        <?php
            if (array_key_exists("auth_success", $_SESSION)
                && $_SESSION["auth_success"] == "fail") {
                echo "Invalid login or password";
            }  
        ?>
    </h1>
</body>
</html>