<?php
    $conn = mysqli_connect("localhost","root","","fitness");
    if($conn->connect_error){
        die("Connection Failed!".$conn->connect_error);
    }
?>