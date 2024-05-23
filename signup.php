<?php

require 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $first_name = trim($_POST['firstname']);
    $last_name = trim($_POST['lastname']);
    $date_of_birth = trim($_POST['dob']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO User (username, email, password, first_name, last_name, date_of_birth) 
              VALUES ('$username', '$email', '$hashed_password', '$first_name', '$last_name', '$date_of_birth')";

    if ($mysqli->query($query)) {

        header('Location: login.html');
        exit; 
    } else {

        echo "Error: " . $mysqli->error; 
    }

    $mysqli->close();
} else {
    echo "No form data submitted.";
}
?>
