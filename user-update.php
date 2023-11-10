<?php
// Retrieve form data
$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$memberplan = $_POST['memberplan'];
$membershipduration = $_POST['membershipduration'];

// Perform the update query
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'fitness';

// Create a new PDO instance
$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

// Prepare the update statement
$updateStmt = $pdo->prepare("UPDATE users SET name = ?, gender = ?, dob = ?, email = ?, memberplan = ?, membershipDuration = ? WHERE id = ?");

// Bind the parameters and execute the statement
$updateStmt->execute([$name, $gender, $dob, $email, $memberplan, $membershipduration, $id]);

// Check if the update was successful
if ($updateStmt->rowCount() > 0) {
  // Update successful
  $response = "User profile updated successfully.";
} else {
  // Update failed
  $response = "Failed to update user profile.";
}

// Return the response
echo $response;
?>
