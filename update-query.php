<?php
session_start();
require "check_auth.php";
require "conn.php";
require "open_ssl.php";

$stm = "UPDATE accs 
    SET title=?, link=?,
    login=?, pwd=?, note=?,
    login_tag=?, pwd_tag=?
    WHERE id=?";
$pdo_stm = $pdo->prepare($stm);
$login_tuple = encrypt_with_params($_POST['login']);
$pwd_tuple = encrypt_with_params($_POST['pwd']);
$res = $pdo_stm->execute(array(
    $_POST['title'], $_POST['link'],
    $login_tuple['ciphertext'],
    $pwd_tuple['ciphertext'], $_POST['note'],
    $login_tuple['tag'], 
    $pwd_tuple['tag'], $_GET['id']
));

$redir = "./upd_fail.htm";
if ($res) {
    $redir = "./upd_success.htm";
}

header("Location: $redir");