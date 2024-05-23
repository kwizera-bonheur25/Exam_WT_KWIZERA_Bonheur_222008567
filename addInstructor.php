<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection
    require 'config.php';

    // Retrieve and sanitize form data
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);

    // Construct the SQL query
    $sql = "INSERT INTO Instruments (name, description) 
            VALUES ('$name', '$description')";

    // Execute the SQL query
    if (mysqli_query($mysqli, $sql)) {
        echo "New instructor added successfully";
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
