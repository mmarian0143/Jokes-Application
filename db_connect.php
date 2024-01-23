<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
$host = "xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$port = "3306";
$username = "lshlp239yp7dm32v";
$user_pass = "jccgihxf1rpnlwpq";
$database_in_use = "dsvmuw2eonbjy51h";


$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

?>
