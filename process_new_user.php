<?php
// add a new user to the database. requires input from register_new_user.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";
$new_username = $_GET['username'];
$new_password1 = $_GET['password1'];
$new_password2 = $_GET['password2'];

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

echo "<h2>Trying to add a new user " . $new_username . " pw =  " . $new_password1 . " and " . $new_password2 . "</h2>";

$sql = "SELECT * FROM users WHERE user_name = '$new_username'";
$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

if ($result->num_rows > 0) {
    echo "The username " . $new_username . " is already in use.  Try another.";
    exit;
} else if ($new_password1 != $new_password2) {
    echo "The passwords do not match. Please try again.";
    exit;
} else {
    preg_match('/[0-9]+/', $new_password1, $matches);
    if (sizeof($matches) == 0) {
        echo "The password must have at least one number<br>";
        exit;
    } else {
        preg_match('/[!@#$%^&*()]+/', $new_password1, $matches);
        if (sizeof($matches) == 0) {
            echo "The password must have at least one of these characters: !@#$%^&*()<br>";
            exit;
        } else if (strlen($new_password1) <= 8) {
            echo "The password needs to be at least 8 characters long";
            exit;
        } else {
            $sql = "INSERT INTO users (user_id, user_name, password) VALUES (null, '$new_username', '$hashed_password')";
            $result = $mysqli->query($sql) or die(mysqli_error($mysqli));
            if ($result) {
                echo "Registration success!";
            } else {
                echo "Something went wrong. Not registered.";
            }
        }
    }
}

echo "<a href='index.php'>Return to main</a>";
