<?php
session_start();
require "check_auth.php";
require "conn.php";

$stm = "DELETE FROM accs
            WHERE id=?";
$pdo_stm = $pdo->prepare($stm);
$pdo_stm->setFetchMode(PDO::FETCH_ASSOC);   
$res = $pdo_stm->execute(array($_GET['id']));

$redir = "del-fail.htm";
if ($res) {
    $redir = ".";
}

header("Location: $redir");