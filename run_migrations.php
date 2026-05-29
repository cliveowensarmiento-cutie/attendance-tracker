<?php
// Script to run migrations
$output = shell_exec('cd c:\xampp\htdocs\attendance_tracker && php artisan migrate 2>&1');
echo $output;
?>
