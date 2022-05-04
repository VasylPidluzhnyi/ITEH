<?php

require_once "conn.php";

$stm = "
SELECT id, password FROM users
    WHERE name=:name";

$usr_name = $_POST["user_name"];

$pdo_stm = $pdo->prepare($stm);
$res = $pdo_stm->execute(
    array(":name" => $usr_name)
); 
$pdo_stm->setFetchMode(PDO::FETCH_ASSOC);
$row = $pdo_stm->fetch();

$pwd_hashed_in_db = $row['password'];
$pepper = "c1isvFdxMDdmjOlvxpecFw";

session_start();
// redirect page
$redir_page = ".";
$_SESSION["auth_success"] = "fail";

$pwd_peppered = hash_hmac("sha256", $_POST["password"], $pepper);
if (password_verify($pwd_peppered, $pwd_hashed_in_db)) {
    $redir_page = "./table.php";
    $_SESSION["auth_success"] = "yes";
    $_SESSION["usr_name"] = $usr_name;
    $_SESSION['usr_id'] = $row['id'];
}

header("Location: " . $redir_page);