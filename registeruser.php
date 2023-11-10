<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $memberplan = $_POST['memberplan'];
    $membershipDuration = $_POST['membershipDuration'];

    $sql = "INSERT INTO users (name, gender, dob, email, password, memberplan, membershipDuration)
            VALUES ('$name', '$gender', '$dob', '$email', '$password', '$memberplan', '$membershipDuration')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
