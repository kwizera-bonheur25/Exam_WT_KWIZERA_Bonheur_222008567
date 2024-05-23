<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = htmlspecialchars($_SESSION['user_id']);
} else {
    // Redirect to login page if session ID is not set
    header("Location: login.php");
    exit();
}                        


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection
    require 'config.php';

    // Retrieve and sanitize form data
    $title = mysqli_real_escape_string($mysqli, $_POST['title']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $duration = mysqli_real_escape_string($mysqli, $_POST['duration']);
    $schedule = mysqli_real_escape_string($mysqli, $_POST['schedule']);

    // Construct the SQL query
    $sql = "INSERT INTO Lessons (instructor_id,title, description, price, duration, schedule) 
            VALUES ('$user_id','$title', '$description', '$price','$duration', '$schedule')";

    // Execute the SQL query
    if (mysqli_query($mysqli, $sql)) {
        echo "New instrument added successfully";
        header("Location: admin-dashboard.php");
        exit();
    } else {
        echo "Fail to add new instructor";
        exit();
    }

    // Close the database connection
    mysqli_close($mysqli);
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: addInstructorForm.html");
    exit;
}
?>
