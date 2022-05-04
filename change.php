<?php
session_start();
require "check_auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change account data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="form.css">
    <script src="form.js" defer></script>
    <script src="change.js" defer></script>
</head>
<body>
    <?php
        require "common.php";
        nav_bar();
        back_link();
    ?>
    <h1>Change fields you need.</h1>
    <?php 
        require "form.php";
    ?>
    <script>
        /* define id of the row in database
            that should be changed for JS */
        let id = <?php echo $_GET['id'] ?>;
        
        <?php
            require "open_ssl.php";
            require "conn.php";
            $stm = "
SELECT title, link, login, pwd, note, 
    login_tag, pwd_tag FROM accs
    WHERE id=?";
            $pdo_stm = $pdo->prepare($stm);
            $pdo_stm->execute(array($_GET['id']));
            $pdo_stm->setFetchMode(PDO::FETCH_ASSOC);
            $prev_data = $pdo_stm->fetchAll()[0];
            $prev_data['login'] = decrypt_with_params(
                                        $prev_data['login'], 
                                        $prev_data['login_tag']
            );
            $prev_data['pwd'] = decrypt_with_params(
                                        $prev_data['pwd'],
                                        $prev_data['pwd_tag']
            );
        ?>
        /* to fill in field with previous data 
                saving it to prevData variable */
        let prevData = <?php echo json_encode($prev_data); ?>;
    </script>
</body>
</html>