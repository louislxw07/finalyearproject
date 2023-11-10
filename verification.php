<?php
include('includes/header.php');
require_once 'authController.php';

// verify the user login token
if (isset($_GET['token'])) {
    $token = $_GET['token']; 
    verifyUser($token);
}

if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token']; 
    resetPassword($passwordToken);
}

if (!isset($_SESSION['id'])) {
    header('location: home.php');
    exit();
}
?>


<div class='py-5'> <br><br><br>
        <div class='container'>
            <div class='row justify-content-center'>
                <div class='col-md-7'>
            <div class='card shadow'>
                <div class='card-header'>
                    <h5>Verify Email</h5>
                </div>
                <div class='card-body'>
                    <div class='form-group mb-3'>
                    <label>Dear <strong><?php echo $_SESSION['name']; ?></strong>, you are required to verify your account before proceeding! Sign in to your email and click on the verification link that has been sent to you at <strong><?php echo $_SESSION['email']; ?></strong>.</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
