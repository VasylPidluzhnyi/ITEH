<?php
session_start();
include "check_auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add account</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="red-button.css">
    <script src="form.js" defer></script>
</head>
<body>
    <?php
        include "common.php";
    
        nav_bar();
        back_link();    
    ?>
    
    <h1>Fill in account details</h1>
    
    <?php
        require "form.php";
    ?>        
</body>
</html>