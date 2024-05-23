<?php
session_start();

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $email = $mysqli->real_escape_string($email);

    $sql = "SELECT * FROM User WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result && mysqli_num_rows($result) === 1) {

        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (password_verify($pass, $user['password'])) {

            print_r($_SESSION);

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($_SESSION['role'] === 'admin') {
                header('Location: admin_dashboard');
            } elseif ($_SESSION['role'] === 'student') {
                header('Location: student-dashboard');
            } elseif ($_SESSION['role'] === 'instructor') {
                header('Location: instructor-dashboard/');
            } else {
                header('Location: unknown_role_page.php');
            }
            exit;
        }
    }

    echo("Invalid email or password");
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>