<?php
$branch = $argv[1];
echo shell_exec("git pull origin $branch");
echo shell_exec("php minifi.php 2>&1");
?>
