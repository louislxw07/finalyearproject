<?php
// Include necessary files and establish a database connection (config.php, session.php)
require 'config.php'; 
include("session.php");

// Check if the form is submitted
if(isset($_POST['book_btn'])) {
    // Retrieve form data
    $classType = $_POST['fitnessclass'];
    $classTimeslot = $_POST['timeslot'];
    $classCoach = $_POST['coach'];
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];

    // Get the user's ID from the session
    $userId = $_SESSION['id'];

    // SQL query to insert data into the booking table
    $insertQuery = "INSERT INTO booking (class_type, class_timeslot, class_coach, user_name, user_email, userid) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($insertQuery);

    // Bind parameters and execute the statement
    $stmt->bind_param("sssssi", $classType, $classTimeslot, $classCoach, $userName, $userEmail, $userId);

    if ($stmt->execute()) {
        // Booking was successful
        echo '<script>alert("Booking successful!");</script>';
        echo '<script>window.location.href = "userdashboard.php";</script>';
    } else {
        // Booking failed
        echo '<script>alert("Booking failed. Please try again.");</script>';
    }

    // Close the prepared statement
    $stmt->close();
}

?>