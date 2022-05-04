<!--   Add account form handler -->
<?php
session_start();
include "check_auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="red-button.css">
</head>
<body>
    <?php
        require "conn.php";
        require "open_ssl.php";
        include "common.php";
        
        nav_bar();
    
        $stm = "
INSERT INTO accs(usr_id, title, link, login,  pwd, note, login_tag, pwd_tag) 
	VALUES(:usr_id, :title, :link, :login, :pwd, :note, :login_tag, :pwd_tag)";
        
        $login_tuple = encrypt_with_params($_POST['login']);
        $pwd_tuple = encrypt_with_params($_POST['pwd']);
            
        $pdo_stm = $pdo->prepare($stm);
        $res = $pdo_stm->execute(
            array(
                'usr_id' => $_SESSION['usr_id'],
                'title' => $_POST['title'],
                'link' => $_POST['link'],
                'login' => $login_tuple['ciphertext'],
                'pwd' => $pwd_tuple['ciphertext'],
                'note' => $_POST['note'],
                'login_tag' => $login_tuple['tag'],
                'pwd_tag' => $pwd_tuple['tag']
        ));
    ?>
    <h1>
        <?php
            if ($res) {
                echo "Account data was successfuly added.";
            } else {
                echo "Something went wrong.<br>";
                echo "PDOStatement::execute() returned false.";
            }
        ?>
    </h1>
    <br>
    <a href="add-acc.php">Add another account</a>
    <a href=".">
        <button class="like-red-button">To main page</button>
    </a>
</body>
</html>
