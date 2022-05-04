<?php
session_start();
include "check_auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accs table</title>
    <link href="style.css" rel="stylesheet">
    <link href="table.css" rel="stylesheet">
    <link rel="stylesheet" href="red-button.css">
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="ext-link/ext-link.css">
    <script src="table.js" defer></script>
</head>
<body>
    <?php
        require "common.php";
        nav_bar();
    ?>
    
    <h1>Credential data table</h1>
    
    <div class="toolbar">
        <span>
            <input type="checkbox" id="hide1">
            <label for="hide1">Show web site only</label>

            <input type="checkbox" id="hide2">
            <label for="hide2">Hide note, change, delete columns</label>        
        </span>
        <a href="add-acc.php" class="like-red-button" 
            id="btnAddAcc" align="right"> 
            Add account
        </a> 
    </div>
    
    
    <table border="1">
        <thead>
            <tr>
                <td>Web site</td>
                <td>Login or email</td>
                <td>Password</td>
                <td>Note</td>
                <td></td>
                <td></td>          
            </tr>
        </thead>
        <tbody>
            <?php
                require "conn.php";
                require "open_ssl.php";
                
                $stm = 
"SELECT * FROM accs WHERE usr_id = :usr_id";
                    
                $pdo_stm = $pdo->prepare($stm);
                $pdo_stm->execute(array(
                    'usr_id' => $_SESSION['usr_id']
                ));
                $pdo_stm->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($pdo_stm as $row) {
                    echo "<tr>";
                    echo "<td><a target='_blank' class='ext-link' href='" 
                        . $row['link'] . "'>" 
                        . $row['title'] . "</a></td>";
                    echo "<td>" 
                        . decrypt_with_params($row['login'],
                                            $row['login_tag']) 
                        . "</td>";
                    echo "<td>" 
                        . decrypt_with_params($row['pwd'], 
                                            $row['pwd_tag']) 
                        . "</td>";
                    echo "<td>" . $row['note'] . "</td>";
                    
                    echo "<td><a href='change.php?id=${row['id']}'>Change</a></td>";
                    echo "<td><a href='del-query.php?id=${row['id']}'>Delete</a></td>";
                    
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>


