<?php
require 'config.php';
include("session.php");
// Check if the GET parameters are set
if (isset($_GET['amount'], $_GET['fitnessclass'], $_GET['timeslot'], $_GET['coach'], $_GET['name'], $_GET['email'])) {
    // Retrieve the data from the GET parameters
    $amount = $_GET['amount']; // Total Amount
    $fitnessclass = $_GET['fitnessclass'];
    $timeslot = $_GET['timeslot'];
    $coach = $_GET['coach'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $id = $_SESSION['id'];

    // Use the data as needed to insert into the booking table or perform other actions
    // For example, you can insert this data into the booking table

    $conn = mysqli_connect("localhost", "root", "", "fitness");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fitnessclass = mysqli_real_escape_string($conn, $fitnessclass);
    $timeslot = mysqli_real_escape_string($conn, $timeslot);
    $coach = mysqli_real_escape_string($conn, $coach);
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $amount = mysqli_real_escape_string($conn, $amount);
    $id = mysqli_real_escape_string($conn, $id);

    $sql = "INSERT INTO booking (class_type, class_timeslot, class_coach, user_name, user_email, userid, payment) 
            VALUES ('$fitnessclass', '$timeslot', '$coach', '$name', '$email', '$id', '$amount')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Transaction successful. Thank you.");</script>';
        echo '<script>window.location = "userdashboard.php";</script>';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    // Close the connection if you're done with the database
    mysqli_close($conn);

} else {
    // Handle cases where the GET parameters are not set
    echo 'Invalid access.';
}
?>