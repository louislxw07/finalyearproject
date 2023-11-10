<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 

require 'cons.php';
require_once 'authEmail.php';

$errors = array();

// Prevent user signup form refresh
$name                   = "";
$gender                 = "";
$dateofbirth            = "";
$email                  = "";
$password               = "";
$confirm_password       = "";
$member_plan            = "";
$membership_duration    = "";

// When user clicks on the 'Register Now' button
if (isset($_POST['register_btn'])) {
    $name                   = $_POST['name'];
    $gender                 = $_POST['gender'];
    $dateofbirth            = $_POST['dateofbirth'];
    $email                  = $_POST['email'];
    $password               = $_POST['password'];
    $confirm_password       = $_POST['confirm_password'];
    $member_plan            = $_POST['member_plan'];
    $membership_duration    = $_POST['membership_duration'];
    
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        echo '<script>alert("Email already exists, please try a different email!")</script>';
        return false;
    }

    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false; 

        $sql = "INSERT INTO users (name, gender, dob, email, password, memberplan, membershipDuration, token, verified) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssssb',$name, $gender, $dateofbirth, $email, $password, $member_plan, $membership_duration, $token, $verified);
        
        if ($stmt->execute()) {
            // login user
            $user_id = $conn->insert_id; 
            $_SESSION['id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            sendVerificationEmail($email, $token);

            // flash message
            echo "<script type='text/javascript'>alert('Account registered successfully, please verify your account through your email!');
            window.location='verification.php';
            </script>";
            exit();
        } else {
            $errors['db_error'] = "Database error: failed to register"; 
        }
    }

}

// When user clicks on the Login button 
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
        // validation
            if (count($errors)===0) {
            $sql = "SELECT * FROM users WHERE email=? OR name=? LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss',$email, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user['verified'] == "0" && password_verify($password, $user['password'])) {
                // login success
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['verified'] = $user['verified'];
                // flash message
                echo "<script type='text/javascript'>alert('Please verify your account through your email!');
                window.location='verification.php';
                </script>";
                exit();
            }

            if (password_verify($password, $user['password'])) {
                // login success
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['verified'] = $user['verified'];
                // flash message
                echo "<script type='text/javascript'>alert('Successfully logged in!');
                window.location='userdashboard.php';
                </script>";
                exit();
            } else {
                echo "<script type='text/javascript'>alert('Invalid credentials!');
                window.location='login.php';
                </script>";
                return false;
            }
        }
    

}

//logout user 
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: login.php');
    exit();
}


// verify user by token
function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $update_query)) {
          // log user in   
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
         // flash message
            echo "<script type='text/javascript'>alert('Account has been successfully verified!');
            window.location='userdashboard.php';
            </script>";
            exit();
        }
    } else {
        echo 'User not found';
    }
}

// if user clicks on the forgot password button
if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('Email address is invalid!');
            window.location='forgot_password.php';
            </script>";
    }

    if (count($errors) ==0) {
       $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1"; 
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        sendPasswordResetLink($email, $token);
        echo "<script type='text/javascript'>alert('An email has been successfully sent to your email address with a link to reset your password.');
            window.location='login.php';
            </script>";
        exit(0);
    }
}

// if user clicked on the reset password button
if (isset($_POST['reset-password'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if(count($errors)== 0) {
        $sql= "UPDATE users SET password='$password' WHERE email='$email'";
        $result= mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>alert('Your password has been successfully resetted! Please re-login into your account using your new password.');
            window.location='login.php';
            </script>";
            exit(0);
        }
    }
}

function resetPassword($token)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset-password.php');
    exit(0);
}