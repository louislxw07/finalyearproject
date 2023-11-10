<?php
include("config.php");
$id = intval($_GET['id']);

// Delete rows from 'user' and 'foodstall' tables using a JOIN condition
$sql = "DELETE FROM booking WHERE id = $id";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn));
}

echo '<script>alert("Booking successfully cancelled!");
window.location.href="userdashboard.php";
</script>';

mysqli_close($conn);
?>