<?php

$html = <<<MARK
    <form method="post" action="add-acc-hndl.php">
        <label for="1">Web site title:</label>
        <input type="text" id="1" name="title" value="dl.nure">
        <br>
        <label for="2">Link to a web site (optional):</label>
        <input type="text" id="2" name="link"
            value="https://dl.nure.ua/">
        <br>
        <label for="3">Login or email:</label>
        <input type="text" id="3" name="login" 
            value="bohdan.akimeko@nure.ua">
        <br>
        <label for="4">Password:</label>
        <input type="text" id="4" name="pwd" value="1234">
        <br>
        <input type="checkbox" id="5">
        <label for="5">Show password</label>
        <br>
        <label for="6">Note (optional):</label>
        <input type="text" id="6" name="note">
        <br>
        <input type="submit" id="btnSubmit" 
            class="like-red-button" value="Add">
    </form>
MARK;

echo $html;