<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'OnlineMusicLessonsPlatform';

// Create a new connection using MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
?>

