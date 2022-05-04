<?php

function nav_bar() {
    
$html = <<<EOD
    <div class="flex-container">
        <div>
            Hello, ${_SESSION['usr_name']}
            
            <a href="log_out.php" class="log-out">Log out</a>
        </div>
    </div>
EOD;

echo $html;
}

function back_link() {
    echo <<<MARK
    <div class="back-link-cont">
        <a href=".">&lt Back</a>
    </div>
MARK;
}