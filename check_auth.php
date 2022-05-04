<?php

if (    !
    (array_key_exists("auth_success", $_SESSION) 
        && $_SESSION["auth_success"] == "yes")
    ) {
    header("Location: .");
    exit();
}
