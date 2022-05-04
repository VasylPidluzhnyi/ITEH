<?php
session_start();
$_SESSION['auth_success'] = "no";
header("Location: .");