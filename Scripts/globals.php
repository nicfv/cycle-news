<?php
$servername = 'LOCALHOST'; // Server Name
$username = 'u560316230_test'; // Database Username
$pwfile = fopen(__DIR__."/dbpw.pw", "r") or die("Unable to read file."); // Database Password File
$password = fread($pwfile, filesize(__DIR__."/dbpw.pw")); // Database Password
$dbname = 'u560316230_test'; // Database Name
?>